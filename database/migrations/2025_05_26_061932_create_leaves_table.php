<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->bigIncrements('leave_id');
            $table->bigInteger('employee_id')->unsigned(); // Fix: match employees table
            $table->string('supporting_doc')->nullable();
            $table->text('reason');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
