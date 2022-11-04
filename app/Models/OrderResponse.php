<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReponse extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'field_type',
        'field_name',
        'field_value',
    ];
}
