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
        Schema::create('consigning', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name', 50);
            $table->string('phone', 15);
            $table->string('country', 50);
            $table->string('province', 50);
            $table->string('city', 50);
            $table->string('postal_code', 10);
            $table->string('address', 150);
            $table->string('reference_point', 50);

            $table->foreign('user_id')->references('id')->on('user')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('package', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('consigning_id')->unsigned();
            $table->string('wr', 20)->unique();
            $table->string('type', 50);
            $table->string('note', 150);
            $table->decimal('cost', 10, 2);

            $table->foreign('user_id')->references('id')->on('user')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('consigning_id')->references('id')->on('consigning')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('description', 100);
            $table->timestamps();
        });

        Schema::create('package_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->integer('status_id')->unsigned();

            $table->foreign('package_id')->references('id')->on('package')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')
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
        Schema::drop('package_status');
        Schema::drop('status');
        Schema::drop('package');
        Schema::drop('consigning');
    }
}
