<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class getMissionBox_user extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table="get_mission_box_user";
    protected $fillable=[
        'who_get_mission','mission_name','mission_description','bonus_score','lession_type',
        'achieve_category','achieve_words','level','education','whichTeacherCreate','complete_status'
    ];
}
