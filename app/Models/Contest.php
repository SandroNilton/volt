<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['participants'];

    public function image(): Attribute
    {
        return new Attribute(
            get: fn () => $this->cover_image ?? 'default/cover.jpg',
        );
    }

    protected function status(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["Privado", "Publico"][$this->state],
        );
    }

    public function user(){
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function participants(){
      return $this->hasMany('App\Models\Participant');
    }

    public function sections()
    {
      return $this->hasMany('App\Models\Section');
    }

    public function folders()
    {
      return $this->hasMany('App\Models\Folder');
    }

    public function lessons(){
      return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

    public function requirements()
    {
        return $this->hasManyThrough('App\Models\Requirement', 'App\Models\Folder');
    }
}
