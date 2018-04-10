<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sitesittings extends Model
{
    protected $table="sitesittings";
    protected $fillable=['id', 'sitename', 'facebook', 'youtube', 'tiwtter', 'adderess', 'phone', 'desc', 'created_at', 'updated_at'];
}
