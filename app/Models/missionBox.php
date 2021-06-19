<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class missionBox extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table="mission_box";
    protected $fillable=[
        'mission_name','mission_description','bonus_score','lession_type',
        'achieve_category','achieve_words','level','education','whichTeacherCreate','status'
    ];
}
