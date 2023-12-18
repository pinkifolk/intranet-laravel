<?php

namespace App\Http\Livewire;

use App\Mail\resetPassword;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeNewPersonToPortal;

class Personal extends Component
{
    use WithFileUploads;

    public $search;
    public $type, $name, $lastName, $jobTitle, $extension, $department, $birthday, $email, $emailPersonal, $emergencyContact,$personalContact, $password, $repitPassword, $file, $edit_id, $old_file;
    public $isAdmin = false;
    public $token;
    public $dateType;
    protected $rules = [
        'type' => 'required',
        'name' => 'required',
        'lastName' => 'required',
        'jobTitle' => 'required',
        'department' => 'required',
        'birthday' => 'required',
        'email' => 'required|email',
        'emailPersonal' => 'required|email',
        'password' => 'required',
        'repitPassword' => 'required|same:password',
        'file' => 'file|mimes:jpg,jpeg,png,bmp,tiff'
    ];
    function delimg()
    {
        $this->file = '';
    }
    function resetId($id)
    {
        $userReset = User::find($id);
        $this->id_reset = $userReset->id;
        $this->email = $userReset->email;
    }
    function resetPass()
    {
        try{
             $userReset = User::find($this->id_reset);
            $token = app('auth.password.broker')->createToken($userReset);
            DB::table('password_resets')->insert([
                'email' => $userReset->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::to($userReset->email)->send(new resetPassword($userReset->name, $userReset->last_name, $token, $userReset->email));
            session()->flash('message', 'Mensaje enviado correctamente');     
        }catch (\Exception $e) {
            session()->flash('error', $e);
        }
       
    }
    public function storePersonalData()
    {
        $this->validate();
         try {
            
            $url_base_file = "public/personal";
            $url_public_file = "storage/personal/";

            if (empty($this->file)) {
                session()->flash('error', 'El campo imagen es obligatorio.');
            } else {
                $name = $this->file->store($url_base_file);
                $storageName = basename($name);
                $url_image = $url_public_file . $storageName;;
            }
            if(empty($this->isAdmin)){
                $this->isAdmin= 0;
            }
            if(User::where('email', '=', $this->email)->first()){
                   session()->flash('error', 'El correo ingresado ya está registrado');
            }else{
                 User::insert([
                'name' => $this->name,
                'last_name' => $this->lastName,
                'job_title' => $this->jobTitle,
                'extension' => $this->extension,
                'department_id' => $this->department,
                'type' => $this->type,
                'birthday' => $this->birthday,
                'email' => $this->email,
                'email_personal' => $this->emailPersonal,
                'emergency_contact' => $this->emergencyContact,
                'personal_contact' => $this->personalContact,
                'img_alt' => strtolower($this->name . "-" . $this->lastName),
                'title_alt' => $this->name . " " . $this->lastName,
                'route_img' => $url_image,
                'password' => Hash::make($this->password),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'is_admin' => $this->isAdmin,
                'estado' => 0

            ]);
            $user = User::where('email', '=', $this->email)->first();
            $token = app('auth.password.broker')->createToken($user);
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::to($user->email)->send(new welcomeNewPersonToPortal($user->name, $user->last_name, $token, $user->email));
            session()->flash('message', 'Colaborador creado correctamente');
            $this->resert();
            }
        } catch (\Exception $e) {
            session()->flash('error', $e);
        }
    }
    function edit($id)
    {
        $data = User::find($id);
        $this->edit_id = $data->id;
        $this->type = $data->type;
        $this->name = $data->name;
        $this->lastName = $data->last_name;
        $this->jobTitle = $data->job_title;
        $this->extension = $data->extension;
        $this->department = $data->department_id;
        $this->birthday = date('Y-m-d', strtotime($data->birthday));
        $this->email = $data->email;
        $this->emailPersonal = $data->email_personal;
        $this->emergencyContact = $data->emergency_contact;
        $this->personalContact = $data->personal_contact;
        $this->isAdmin = $data->is_admin;
        $this->file = $data->route_img;
        $this->old_file = $data->route_img;
    }
    function editPersonalData()
    {
        $url_base_file = "public/personal";
        $url_public_file = "storage/personal/";
        if ($this->file == $this->old_file) {
            $url_image = $this->old_file;
        } else {
            if (empty($this->file)) {
                $url_image = $this->old_file;
            } else {
                $name = $this->file->store($url_base_file);
                $storageName = basename($name);
                $url_image = $url_public_file . $storageName;
            }
        }

        User::where('id', $this->edit_id)->update([
            'type' => $this->type,
            'name' => $this->name,
            'last_name' => $this->lastName,
            'job_title' => $this->jobTitle,
            'extension' => $this->extension,
            'department_id' => $this->department,
            'birthday' => $this->birthday,
            'email' => $this->email,
            'email_personal' => $this->emailPersonal,
            'emergency_contact' => $this->emergencyContact,
            'personal_contact' => $this->personalContact,
            'is_admin' => $this->isAdmin,
            'route_img' =>  $url_image,
        ]);
        session()->flash('message', 'Colaborador editado correctamente');
        $this->resert();
    }
    function del($id)
    {
        $data = User::find($id);
        $this->edit_id = $data->id;
    }
    function delUserData()
    {
        User::where('id', $this->edit_id)->delete();
        session()->flash('message', 'Colaborador eliminado correctamente ☹');
    }
    function resert()
    {
        $this->type = '';
        $this->name = '';
        $this->lastName = '';
        $this->jobTitle = '';
        $this->extension = '';
        $this->department = '';
        $this->birthday = '';
        $this->email = '';
        $this->emailPersonal = '';
        $this->emergencyContact = '';
        $this->password = '';
        $this->repitPassword = '';
        $this->isAdmin = '';
        $this->file = '';
    }
    public function render()
    {
        $department_get = Department::where('id', '>', 1)->get();
        $getProcesures = User::take(35)->where('name', 'like', '%' . $this->search . '%')->where('department_id', '>', 1)->orderBy('created_at','asc')->get();
        return view(
            'livewire.personal',
            [
                'resultSearch' => $getProcesures,
                'department_get' => $department_get
            ]
        );
    }
}
