<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function roleUnits()
   {
       return $this->hasMany('App\Models\Unit', 'role_id', 'id');
   }

}
