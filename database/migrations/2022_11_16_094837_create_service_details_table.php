<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')
                    ->constrained('services')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string("title")->nullable();
            $table->string("subtitle")->nullable();
            $table->string("content_1")->nullable();
            $table->string("detail_1")->nullable();
            $table->string("content_2")->nullable();
            $table->string("detail_2")->nullable();
            $table->string("content_3")->nullable();
            $table->string("detail_3")->nullable();
            $table->string("content_4")->nullable();
            $table->string("detail_4")->nullable();
            $table->string("content_5")->nullable();
            $table->string("detail_5")->nullable();
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
        Schema::dropIfExists('service_details');
    }
}
