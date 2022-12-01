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
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('dose');
            $table->date('date');
            $table->unsignedBigInteger('society_id');
            $table->unsignedBigInteger('spot_id');
            $table->unsignedBigInteger('vaccine_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('officer_id');

            $table->foreign('society_id')->references('id')->on('societies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('spot_id')->references('id')->on('spots')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('vaccine_id')->references('id')->on('vaccines')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('doctor_id')->references('id')->on('medicals')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('officer_id')->references('id')->on('medicals')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('vaccinations');
    }
};
