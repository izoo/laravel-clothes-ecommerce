<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionMpesa extends Model
{
    use HasFactory;

    protected $fillable = ['amount_paid','mpesa_receipt_number','date_transacted','phone_number','user_confirm_id','payment_for','order_no'];
}
