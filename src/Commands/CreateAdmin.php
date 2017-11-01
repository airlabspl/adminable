<?php

namespace Airlabs\Adminable\Commands;

use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    protected $signature = 'adminable:create';

    protected $description = 'Create a user with admin privileges.';

    protected $attributes = [];

    public function handle()
    {
        $this->showPackageInfo();

        $this->setDefaultAttributes();
        $this->fillRequiredFields();
        $this->fillPasswordField();

        $model = config('adminable.model', 'App\User');
        if ($model::forceCreate($this->attributes)) {
            $this->info("Admin account created. You may now log in.");

            return;
        }

        $this->error("Account could not be created. Check the package configuration.");
    }

    protected function fillRequiredFields()
    {
        foreach (config('adminable.required_fields') as $field) {
            $value = $this->ask("What is the user $field?");

            $this->attributes[$field] = $value;
        }
    }

    protected function setDefaultAttributes()
    {
        $this->attributes = [
            config('adminable.column', 'is_admin') => true
        ];
    }

    protected function fillPasswordField()
    {
        $password = $this->secret("What is the user password?");

        $this->attributes[config('adminable.password_field', 'password')] = bcrypt($password);
    }

    protected function showPackageInfo()
    {
        $this->info("airlabs/adminable 1.0.0");
        $this->line("Creating an administrator account.");
    }
}
