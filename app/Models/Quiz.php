<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['done'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }//end of unit

    public function student()
    {
        return $this->belongsTo(User::class);
    }//end of student

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }//end of grades

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }//end of grade

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'grades')->withPivot(['marks','answer']);

    }//end of questions

    public function getStatusAttribute(){
        switch ($this->done) {
            case '1':
                return 'Pass';
                break;
            case '2':
                return 'Failed';
                break;

            default:
                'Null';
                break;
        }
    }

}
