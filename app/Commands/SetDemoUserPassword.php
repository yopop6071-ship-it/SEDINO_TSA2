<?php

namespace App\Commands;

use App\Models\UserModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class SetDemoUserPassword extends BaseCommand
{
    protected $group = 'Custom';
    protected $name = 'user:set-demo-password';
    protected $description = 'Sets a hashed password for the TSA1 demo user.';

    public function run(array $params)
    {
        $password = $params[0] ?? 'admin123';

        $userModel = new UserModel();
        $user = $userModel->first();

        if (! $user) {
            CLI::error('No demo user was found.');
            return;
        }

        $userModel->update($user['id'], [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        CLI::write('Demo user password was hashed successfully.', 'green');
        CLI::write('Login password: ' . $password, 'yellow');
    }
}