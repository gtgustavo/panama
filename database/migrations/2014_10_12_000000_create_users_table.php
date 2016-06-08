<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('description', 100);
            $table->timestamps();
        });

        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->integer('ced_id')->length(9)->unsigned()->unique();
            $table->string('phone', 11);
            $table->string('email', 30)->unique();
            $table->string('password', 60)->nullable();
            $table->enum('status', ['active', 'disabled', 'locked'])->default('disabled');
            $table->integer('profile_id')->unsigned();
            $table->rememberToken();

            $table->foreign('profile_id')->references('id')->on('profile')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('display_name', 50);
            $table->timestamps();
        });

        Schema::create('profile_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('profile_id')->references('id')->on('profile')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('role')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profile_role');
        Schema::drop('role');
        Schema::drop('client');
        Schema::drop('profile');
    }
}
