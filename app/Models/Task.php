<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'project_id',
    ];
    public function project(){
        return $this->belongsTo(Project::class);
    }
    // public function tags(){
    //     return $this->hasMany(TaskTag::class);
    // }
    public function tags(){
        return $this->belongsToMany(Tag::class,'task_tags','task_id','tag_id');
    }
}
