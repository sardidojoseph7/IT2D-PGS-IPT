<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('employee_statuses', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->foreignUuid('employee_id')->constrained('employees');
    $table->string('label'); // e.g. Active, Resigned, On-leave
    $table->text('notes')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_statuses');
    }
};
