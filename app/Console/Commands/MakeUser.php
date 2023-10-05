<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class MakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        do {
            $name = $this->ask('Name');
            $email = $this->ask('Email');
            $password = $this->secret('Password');

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'status' => 0
            ];

            $validator = Validator::make(['email' => $email, 'password' => $password], [
                'email' => 'required|email:rfc,dns|unique:users',
                'password' => 'required|min:8'
            ]);

            if ($validator->fails()) {
                $this->error('You entered invalid data, try again');
            } else {
                $admin = User::create($data);

                if ($admin->exists) {
                    $this->info('User has been successfully created');
                    return;
                }
            }

        } while ($validator->fails());

    }
}
