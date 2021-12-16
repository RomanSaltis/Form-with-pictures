<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
       public function unitRole()
   {
       return $this->belongsTo('App\Models\Role', 'role_id', 'id');
   }

}
