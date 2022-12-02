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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['accepted', 'declined', 'pending'])->default('pending');
            $table->text('disease_history')->nullable();
            $table->text('current_symptoms')->nullable();
            $table->text('doctor_notes')->nullable();
            $table->unsignedBigInteger('society_id');
            $table->unsignedBigInteger('doctor_id')->nullable();

            $table->foreign('society_id')->references('id')->on('societies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('doctor_id')->references('id')->on('medicals')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('consultations');
    }
};
