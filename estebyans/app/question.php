<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\questionanswers;
class question extends Model
{
   public function user(){
   return $this->hasMany('App\questionanswers');
 }
}
