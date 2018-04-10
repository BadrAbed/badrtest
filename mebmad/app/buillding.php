<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buillding extends Model
{
   protected $table="builling";
protected $fillable=['id', 'bu_name', 'bu_price', 'bu_rent', 'bu_aquare', 'bu_type', 'bu_desc', 'bu_meta', 'bu_langtitube', 'bu_latitube', 'bu_large_desc', 'bu_state', 'created_at', 'updated_at', 'user_id'];
}
