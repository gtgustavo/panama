<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class InstallProjectTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company', 50);
            $table->string('rif', 12)->unique();
            $table->string('tracking', 25)->unique();
            $table->string('phone', 11);
            $table->timestamps();
        });

        Schema::create('road', function (Blueprint $table) {
            $table->increments('id');
            $table->string('route', 100);
            $table->timestamps();
        });

        Schema::create('provider_road', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned();
            $table->integer('road_id')->unsigned();

            $table->foreign('provider_id')->references('id')->on('provider')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('road_id')->references('id')->on('road')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->string('pointer', 50);

            $table->foreign('users_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('package', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('provider_id')->unsigned();
            $table->string('wr', 50)->unique();
            $table->date('date');
            $table->string('type', 50);
            $table->string('note', 100);
            $table->decimal('cost', 10, 2);

            $table->foreign('users_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('provider')
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
        Schema::drop('package');
        Schema::drop('agenda');
        Schema::drop('provider_road');
        Schema::drop('road');
        Schema::drop('provider');
    }
}
