<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    protected $fillable = ['title', 'body', 'user_id'];

    public function user(){
        //Define a one-to-many relationship between the Task and User models
        return $this->belongsTo(User::class, 'user_id');
    }
}
