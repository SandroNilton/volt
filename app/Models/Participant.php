<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function status(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["No evaluado", "Evaluacion", "Evaluado"][$this->state],
        );
    }

    public function files(){
      return $this->hasMany('App\Models\File', 'participant_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
