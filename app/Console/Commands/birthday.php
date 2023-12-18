<?php

namespace App\Console\Commands;

use App\Mail\happyBirthday;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class birthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validate if someone is birthday for send mail';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userBirthday = User::whereMonth('birthday', Carbon::now()->format('m'))->whereDay('birthday', Carbon::now()->format('d'))->get();
        if ($userBirthday) {
            $userRegister = User::where('id', '>', 1)->get();
            foreach ($userRegister as $recipient) {
                Mail::to($recipient->email)->send(new happyBirthday($userBirthday));
            }
        }
    }
}
