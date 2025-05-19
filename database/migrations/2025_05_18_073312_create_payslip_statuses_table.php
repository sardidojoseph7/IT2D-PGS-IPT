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
        Schema::create('payslip_statuses', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->foreignUuid('payslip_id')->constrained('payslips');
    $table->string('label');        // e.g. Pending, Released, Cancelled
    $table->text('notes')->nullable();
    $table->timestamps();
});
        // Add foreign key constraint to payslip_id
        Schema::table('payslip_statuses', function (Blueprint $table) {
            $table->foreign('payslip_id')->references('id')->on('payslips')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslip_statuses');
    }
};
