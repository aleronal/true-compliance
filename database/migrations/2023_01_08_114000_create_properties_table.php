<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
                $table->id();
                $table->string('organisation');
                $table->string('property_type');
                $table->unsignedBigInteger('parent_property_id')->nullable();
                $table->integer('uprn')->unique()->nullable();
                $table->string('address')->nullable();
                $table->string('town')->nullable();
                $table->string('postcode')->nullable();
                $table->boolean('live')->nullable();


                $table->timestamps();
                $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
