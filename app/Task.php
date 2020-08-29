<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $guarded = [];
    public function tweet(){
        return $this->belongsTo(Project::class);
    }
    public function getImageAttribute($value) {
        return asset($value);
    }
    public function project() {
        return $this->belongsTo(Project::class);
    }
    public function status() {
        return $this->belongsTo(Status::class);
    }
}
