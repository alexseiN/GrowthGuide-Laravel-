<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = [];

    /**
     * The fields that belong to the form.
     */
    public function fields()
    {
        return $this->belongsToMany('App\Field', 'form_fields')->withPivot('id', 'options');
    }
    public function dbfields()
    {
        return $this->belongsToMany('App\Field', 'db_form_fields')->withPivot('id', 'options');
    }
}
