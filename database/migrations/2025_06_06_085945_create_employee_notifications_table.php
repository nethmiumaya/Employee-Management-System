<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned(); // Match employees table
            $table->string('notifi_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->foreign('notifi_id')->references('notifi_id')->on('notifications')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_notifications');
    }
};
