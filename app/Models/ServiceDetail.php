<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'title',
        'subtitle',
        'content_1',
        'detail_1',
        'content_2',
        'detail_2',
        'content_3',
        'detail_3',
        'content_4',
        'detail_4',
        'content_5',
        'detail_5'
    ];

}

