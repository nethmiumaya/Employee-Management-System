<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In database/migrations/2025_05_26_053507_create_reports_table.php

    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('report_id');
            // Change this line:
            $table->unsignedBigInteger('super_admin_id');
            // other columns...

            $table->foreign('super_admin_id')
                  ->references('super_admin_id')
                  ->on('super_admins')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
