<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Personal extends Component
{
    use WithFileUploads;

    public $search;
    public $type, $name, $lastName, $jobTitle, $extension, $department, $birthday, $email, $emailPersonal, $emergencyContact, $password, $repitPassword, $file, $edit_id, $old_file;
    public $isAdmin = false;
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
        'isAdmin' => 'required',
        'file' => 'file'
    ];
    function delimg()
    {
        $this->file = '';
    }
    public function storePersonalData()
    {
        $this->validate();
        $url_base_file = "public/personal";
        $url_public_file = "storage/personal/";

        if (empty($this->file)) {
            $url_image = null;
        } else {
            $name = $this->file->store($url_base_file);
            $storageName = basename($name);
            $url_image = $url_public_file . $storageName;;
        }

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
            'personal_contact' => $this->emergencyContact,
            'img_alt' => strtolower($this->name . "-" . $this->lastName),
            'title_alt' => strtolower($this->name . " " . $this->lastName),
            'route_img' => $url_image,
            'password' => Hash::make($this->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'is_admin' => $this->isAdmin,
            'estado' => 0

        ]);
        session()->flash('message', 'Colaborador creado correctamente');
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
        $this->emergencyContact = $data->personal_contact;
        $this->isAdmin = $data->is_admin;
        $this->file = $data->route_img;
        $this->old_file = $data->route_img;
    }
    function editPersonalData()
    {
        $url_base_file = "public/procedures/";
        $url_public_file = "storage/procedures/";
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
            'personal_contact' => $this->emergencyContact,
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
        $getProcesures = User::take(20)->where('name', 'like', '%' . $this->search . '%')->where('department_id', '>', 1)->get();
        return view(
            'livewire.personal',
            [
                'resultSearch' => $getProcesures,
                'department_get' => $department_get
            ]
        );
    }
}
