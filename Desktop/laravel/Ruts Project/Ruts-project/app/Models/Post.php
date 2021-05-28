<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public static $rules = [
        'music_image' => 'image|file',
        'music_file' => 'file',
        'music_trial' =>'file'
    ];
}
