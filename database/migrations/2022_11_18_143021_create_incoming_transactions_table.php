<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('bank_in_transaction_date');
            $table->decimal('bank_in_amount', 15);
            $table->char('bank_in_currency', 3);
            $table->string('bank_in_beneficiary_name', 128);
            $table->string('bank_in_beneficiary_account', 25);
            $table->string('bank_in_sender_name', 128);
            $table->string('bank_in_sender_account', 25);
            $table->string('bank_in_transaction_reference', 25);
            $table->enum('bank_in_status', ['pending','unmatched', 'matched'])->default('pending');
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
        Schema::dropIfExists('incoming_transactions');
    }
}
