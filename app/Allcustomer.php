<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allcustomer extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'service_id',
        'info',
    ];

    /**
     * Get the field's option.
     *
     * @param  string  $value
     * @return string
     */
    public function getOptionsAttribute($value)
    {
        return json_decode($value);
    }
}
