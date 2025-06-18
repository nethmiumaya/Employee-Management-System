<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_announcement_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned(); // Fix: match employees table
            $table->string('announcement_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->foreign('announcement_id')->references('announcement_id')->on('announcements')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_announcement_details');
    }
};
