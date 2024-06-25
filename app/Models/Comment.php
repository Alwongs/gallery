<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'photo_id', 'author'];

    public function post() 
    {
        return $this->BelongsTo(Post::class);
    }
}
