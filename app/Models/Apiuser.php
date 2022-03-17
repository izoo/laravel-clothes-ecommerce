<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apiuser extends Model
{
    use HasFactory;

    protected $fillable = ['username','key','added_by'];
}
