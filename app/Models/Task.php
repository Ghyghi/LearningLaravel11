<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'task';

    protected $fillable = ['title', 'body', 'user_id', 'priority', 'status', 'assignedTo'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assignedTo');
    }

    public function images()
    {
        return $this->getMedia('images');
    }

    public function firstImageUrl()
    {
        return $this->getFirstMediaUrl('images');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images'); // Define the collection name
    }
}