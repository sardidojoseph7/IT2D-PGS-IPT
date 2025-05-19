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
        Schema::create('payslips', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->foreignUuid('employee_id')->constrained('employees');
    $table->date('period_start');
    $table->date('period_end');
    $table->decimal('basic_pay',12,2);
    $table->decimal('allowances',12,2)->default(0);
    $table->decimal('deductions',12,2)->default(0);
    $table->decimal('net_pay',12,2);
    $table->timestamps();
});
        // Add foreign key constraint to employee_id
        Schema::table('payslips', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslips');
    }
};
