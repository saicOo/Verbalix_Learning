<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }//end of user

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }//end of admin

    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }//end of Comment
}
