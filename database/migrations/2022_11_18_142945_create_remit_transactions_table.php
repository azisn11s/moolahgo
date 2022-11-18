<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemitTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remit_transactions', function (Blueprint $table) {
            $table->unsignedInteger('transaction_id')->autoIncrement();
            $table->decimal('transaction_source_amount', 15);
            $table->char('transaction_source_currency', 3);
            $table->decimal('transaction_fee_amount', 15)->nullable();
            $table->char('transaction_fee_currency', 3)->nullable();
            $table->decimal('transaction_expected_amount', 15)->nullable();
            $table->char('transaction_expected_currency', 3)->nullable();
            $table->decimal('transaction_destination_amount', 15)->nullable();
            $table->char('transaction_destination_currency', 3)->nullable();
            $table->enum('transaction_financial_status', ['unpaid', 'paid', 'refunded'])->default('unpaid');
            $table->enum('transaction_processing_status', ['pending', 'active_origin', 'active_destination', 'completed', 'canceled'])->default('pending');
            $table->unsignedInteger('transaction_sender_id');
            $table->unsignedInteger('transaction_beneficiary_id');
            $table->string('transaction_reference_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remit_transactions');
    }
}
