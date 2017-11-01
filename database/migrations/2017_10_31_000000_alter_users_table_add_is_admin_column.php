<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddIsAdminColumn extends Migration
{
    public function up()
    {
        Schema::table($this->table(), function (Blueprint $table) {
            $table->boolean($this->column())->default(false);
        });
    }

    public function down()
    {
        Schema::table($this->table(), function (Blueprint $table) {
            $table->dropColumn($this->column());
        });
    }

    protected function table()
    {
        return config('adminable.table', 'users');
    }

    protected function column()
    {
        return config('adminable.column', 'is_admin');
    }
}