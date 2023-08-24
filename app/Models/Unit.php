<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }//end of level

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }//end of Comments

    public function questions()
    {
        return $this->hasMany(Question::class);
    }//end of Questions
    
    public function question()
    {
        return $this->hasOne(Question::class);
    }//end of Question
}
