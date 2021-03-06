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

        Schema::create('country', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('iso', 2)->unique();
            $table->timestamps();
        });

        Schema::create('province', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('country_id')->unsigned();

            $table->foreign('country_id')->references('id')->on('country')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('reception', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('province_id')->unsigned();
            $table->string('city', 50);
            $table->string('postal_code', 10)->nullable();
            $table->string('address', 150);

            $table->foreign('province_id')->references('id')->on('province')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('dni', 15)->unique();
            $table->string('phone_c', 15);
            $table->string('phone_h', 15)->nullable();
            $table->integer('province_id')->unsigned();
            $table->string('city', 50)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('address', 150)->nullable();

            $table->foreign('province_id')->references('id')->on('province')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 30)->unique();
            $table->string('password', 60)->nullable();
            $table->integer('people_id')->unsigned();
            $table->integer('profile_id')->unsigned();
            $table->integer('reception_id')->unsigned();
            $table->enum('file', ['true', 'false'])->default('false');
            $table->rememberToken();

            $table->foreign('people_id')->references('id')->on('people')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('profile')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reception_id')->references('id')->on('reception')
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
        Schema::drop('user');
        Schema::drop('people');
        Schema::drop('reception');
        Schema::drop('province');
        Schema::drop('country');
        Schema::drop('profile');
    }
}
