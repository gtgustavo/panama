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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('package');
        Schema::drop('consigning');
        //Schema::drop('provider_road');
        //Schema::drop('road');
        //Schema::drop('provider');
    }
}
