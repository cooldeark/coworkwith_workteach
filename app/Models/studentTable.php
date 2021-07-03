<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentTable extends Model
{
    use HasFactory;
    // public $timestamps = false;
    public $table="student_user";
    protected $fillable=[
        'email','name','sex','birth','age','phone',
        'education','profession','address_main','address_sub','address_main_name','address_sub_name',
        'habit','write_position','read_position','write_frequency','write_experience','write_purpose','cooperation_school','photo_path','member_rate','lession_select','memberValidTime','memberValidMission'
    ];
}
