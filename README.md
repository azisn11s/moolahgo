

# MoolahGo Test Result

## Installation
This is test result for section 1. If you wanna try in your local.

- In this directory, run composer install.
- Rename .env.example to .env
- Create MySQL database with name `main_app`
- Run php artisan migrate.


## Running Locally

### Remit Transaction
[POST] http://...../api/remit-transactions
<p>
<code>
Header
Accept:application/json,
Content-Type:application/json
</code>
</p>

### Payload Example (JSON)
<code>
{
    "transaction_source_amount": 10000,
    "transaction_source_currency": "IDR",
    "transaction_fee_amount": 100,
    "transaction_fee_currency": "IDR",
    "transaction_expected_amount": 10100,
    "transaction_expected_currency": "IDR",
    "transaction_destination_amount": 10000,
    "transaction_destination_currency": "IDR",
    "transaction_financial_status": "unpaid",
    "transaction_processing_status": "active_origin",
    "transaction_sender_id": 438576324,
    "transaction_beneficiary_id": 372468234,
    "transaction_reference_number": "BCA0102030405"
}
</code>
<p></p>

### Incoming Transaction
[POST] http://..../api/incoming-transactions
<p>
<code>
Header
Accept:application/json,
Content-Type:application/json
</code>
</p>

### Payload Example (JSON)
<code>
{
    "bank_in_amount": 10100,
    "bank_in_currency": "IDR",
    "bank_in_beneficiary_name": "Azis",
    "bank_in_beneficiary_account": "BCA0102030405",
    "bank_in_sender_name": "Aulia",
    "bank_in_sender_account": "BCA01020304050",
    "bank_in_transaction_reference": "Incoming transaction test"
}
</code>
