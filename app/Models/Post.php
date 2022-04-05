<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'text'
    ];

    public function files () {
        return $this->hasMany(File::class,'post_id' );
    }
}
