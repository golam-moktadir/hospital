<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public function OperationCategory(){
    	return $this->belongsTo('App\OperationCategory','category_id','id');
    }
}
