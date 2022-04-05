<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'post_id'
    ];

    public function post () {
        return $this->belongsTo(Post::class);
    }

}
