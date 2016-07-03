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
        Schema::create('country', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('iso', 2)->unique();
            $table->timestamps();
        });

        Schema::create('city', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('country_id')->unsigned();

            $table->foreign('country_id')->references('id')->on('country')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('road', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('origin_id')->unsigned();
            $table->integer('destination_id')->unsigned();

            $table->foreign('origin_id')->references('id')->on('country')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('country')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

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
            $table->integer('shipment_id')->unsigned();
            $table->string('magaya', 50);
            $table->string('type', 50);
            $table->string('note', 150);
            $table->decimal('cost', 10, 2);
            $table->enum('status', [
                                        'ANULADO',
                                        'PRECHEQUEADO',
                                        'ENTREGADO EN CENTRO',
                                        'ENVIADO A CENTRO DE EMBARQUE',
                                        'RECIBIDO EN CENTRO DE EMBARQUE',
                                        'EMBARCADO',
                                        'RECIBIDO EN CENTRO PAÍS DESTINO',
                                        'ENTREGADO'
                                    ])->default('PRECHEQUEADO');


            $table->foreign('user_id')->references('id')->on('user')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('consigning_id')->references('id')->on('consigning')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('package_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->enum('status', [
                                        'ANULADO',
                                        'PRECHEQUEADO',
                                        'ENTREGADO EN CENTRO',
                                        'ENVIADO A CENTRO DE EMBARQUE',
                                        'RECIBIDO EN CENTRO DE EMBARQUE',
                                        'EMBARCADO',
                                        'RECIBIDO EN CENTRO PAÍS DESTINO',
                                        'ENTREGADO'
                                    ])->default('PRECHEQUEADO');

            $table->foreign('package_id')->references('id')->on('package')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('shipment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wb', 20)->unique();
            $table->string('magaya', 50);
            $table->timestamp('departure_date');
            $table->enum('status', ['ABIERTO', 'CERRADO'])->default('ABIERTO');
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
        Schema::drop('shipment');
        Schema::drop('package_status');
        Schema::drop('package');
        Schema::drop('consigning');
    }
}
