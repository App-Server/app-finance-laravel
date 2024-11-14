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
        Schema::create('balance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_model_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('revenue_account_model_id')->nullable()->constrained('create_revenue_account')->onDelete('cascade');
            $table->date('date_of_receipt')->nullable();
            $table->decimal('value_received', 10, 2)->nullable();
            $table->foreignId('expense_account_model_id')->nullable()->constrained('create_expense_account')->onDelete('cascade');
            $table->date('pantry_date')->nullable();
            $table->decimal('expense_amount', 10, 2)->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance');
    }
};
