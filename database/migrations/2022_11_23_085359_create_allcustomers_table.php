<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllcustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allcustomers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('service_id')
                    ->constrained('services')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->json('info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allcustomers');
    }
}
