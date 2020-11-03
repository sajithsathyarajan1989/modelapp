<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appmodel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'number', 'size','photo','publish_date','description','created_at','updated_at'
    ];
}
