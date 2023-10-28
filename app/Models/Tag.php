<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'task_id',
    ];
    // public function tasks(){
    //     return $this->hasMany(TaskTag::class);
    // }
    public function tasks(){
        return $this->belongsToMany(Task::class,'task_tags','tag_id','task_id');
    }
}
