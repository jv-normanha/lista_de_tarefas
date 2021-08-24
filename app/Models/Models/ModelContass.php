<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelContass extends Model
{
   protected $table='tasks';
    protected $fillable=['description','user_id','date'];

    public function relUsers()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
