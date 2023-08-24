<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['type_question'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }//end of Unit

    public function options()
    {
        return $this->hasMany(Option::class);
    }//end of Options

    public function option()
    {
        return $this->hasOne(Option::class);
    }//end of Option

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'grades')->withPivot(['marks','answer']);
    }//end of quizzes

    public function getTypeQuestionAttribute(){
        switch ($this->type) {
            case '1':
                return 'True & False';
                break;
            case '2':
                return 'Multiple Choice';
                break;
            default:
                'Null';
                break;
        }
    }
}
