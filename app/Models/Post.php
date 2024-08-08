<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'img_path',
        'url',
        'content',
        'user_id',
        'category_id',
        'author',//2024/08/08追加
        'publisher'//2024/08/08追加
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class,'post_genre','post_id','genre_id')->withTimestamps();
    }
}
