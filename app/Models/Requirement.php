<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function folder()
    {
      return $this->belongsTo('App\Models\Folder');
    }

    public function spaces(){
      return $this->hasMany('App\Models\Space');
  }
}
