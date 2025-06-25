<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_team', function (Blueprint $table) {
            $table->bigInteger('employee_id')->unsigned(); // Match employees table
            $table->bigInteger('team_id')->unsigned();     // Match teams table
            $table->timestamps();

            $table->primary(['employee_id', 'team_id']);
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->foreign('team_id')->references('team_id')->on('teams')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_team');
    }
};
