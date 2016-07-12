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
            $table->integer('road_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->string('city', 50);
            $table->string('postal_code', 10);
            $table->string('address', 150);
            $table->string('reference_point', 50);

            $table->foreign('user_id')->references('id')->on('user')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('road_id')->references('id')->on('road')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('province')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('coin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('iso', 5)->unique();
            $table->string('symbol', 5);
            $table->timestamps();
        });

        Schema::create('box', function (Blueprint $table) {
            $table->increments('id');
            $table->string('box', 50);
            $table->string('dimensions', 20);
            $table->string('maximum_poundage', 20);
            $table->decimal('cost_extra_pound', 10, 2);
            $table->decimal('cost_standard', 10, 2);
            $table->decimal('cost_express', 10, 2);
            $table->integer('coin_id')->unsigned();
            $table->enum('status', ['ACTIVO', 'OCULTO'])->default('OCULTO');

            $table->foreign('coin_id')->references('id')->on('coin')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('package', function (Blueprint $table) {
            $table->increments('id');

            $table->string('wr', 20)->unique();
            $table->integer('shipment_id')->unsigned();

            $table->integer('user_id')->unsigned();
            $table->integer('consigning_id')->unsigned();
            $table->integer('box_id')->unsigned();
            $table->integer('reception_id')->unsigned();

            $table->string('magaya', 50);

            $table->enum('shipping_type', ['STANDARD', 'EXPRESS']);
            $table->string('extra_pounds', 10);
            $table->decimal('cost', 10, 2);

            $table->enum('status', [
                                        'ANULADO',
                                        'PRECHEQUEADO',
                                        'ENTREGADO EN CENTRO',
                                        'ENVIADO A CENTRO DE EMBARQUE',
                                        'RECIBIDO EN CENTRO DE EMBARQUE',
                                        'EMBARCADO',
                                        'EMBARQUE EN TRANSITO',
                                        'RECIBIDO EN CENTRO PAÍS DESTINO',
                                        'ENTREGADO'
                                    ])->default('PRECHEQUEADO');

            $table->string('note', 150);

            $table->foreign('user_id')->references('id')->on('user')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('consigning_id')->references('id')->on('consigning')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('box_id')->references('id')->on('box')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reception_id')->references('id')->on('reception')
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
                                        'EMBARQUE EN TRANSITO',
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
            $table->enum('status', ['ABIERTO', 'EMBARCADO', 'CERRADO'])->default('ABIERTO');
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
        Schema::drop('box');
        Schema::drop('coin');
        Schema::drop('consigning');
        Schema::drop('road');
    }
}
