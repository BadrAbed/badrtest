<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\question;
class questionanswers extends Model
{
     public $fillable=['ans_name','question_id'];

 public function ans(){
return $this->belongsTo('App\question');

  }
}
