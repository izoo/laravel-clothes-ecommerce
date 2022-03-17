<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apitoken extends Model
{
    use HasFactory;

    protected $fillable= ['api_userid','api_productid','api_token','expires_on'];
}
