<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    protected $fillable = ['title', 'body', 'user_id', 'priority', 'status', 'assignedTo'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assignedTo');
    }
}