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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->string('symptoms')->nullable();
            $table->foreignId('test_id');
            $table->foreignId('result_id');
            $table->foreignId('diagnosis_id');
            $table->foreignId('treatment_id')->nullable();
            $table->foreignId('appointment_id')->nullable();
            $table->string('outcome')->nullable;
            $table->foreignId('user_id');
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
        Schema::dropIfExists('records');
    }
};
