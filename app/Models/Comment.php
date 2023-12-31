<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $casts = [
        'body' => 'array'
    ];

    protected $fillable = [
        'body',
        'user_id',
        'post_id'
    ];
    public function post()
    {
       return $this->belongsTo(Post::class, 'post_id',);
        # code...
    }
    public function 
user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
