<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->bigIncrements('announcement_id'); // auto-increment primary key
            $table->text('content');
            $table->date('date');
            $table->string('target_team_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->timestamps();

            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
