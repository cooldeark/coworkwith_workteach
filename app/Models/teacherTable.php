<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacherTable extends Model
{
    use HasFactory;
    public $table="teacher_user";
    protected $fillable=[
        'email','name','sex','birth','age','phone',
        'education','profession','address_main','address_sub','address_main_name','address_sub_name',
        'habit','write_position','teach_position','teach_experience','teach_years','cooperation_school','photo_path','lession_select'
    ];
}
