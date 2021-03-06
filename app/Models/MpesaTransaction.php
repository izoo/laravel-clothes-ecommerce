<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['FirstName','MiddleName','LastName','TransactionType','TransID','TransTime','BusinessShortCode','BillRefNumber','InvoiceNumber','ThirdPartyTransID','MSISDN','TransAmount','OrgAccountBalance'];
}
