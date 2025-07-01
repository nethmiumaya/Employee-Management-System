<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('report_id');
            $table->string('report_name'); // <-- Add this line
            $table->unsignedBigInteger('super_admin_id');
            $table->timestamps();

            $table->foreign('super_admin_id')
                ->references('super_admin_id')
                ->on('super_admins')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
