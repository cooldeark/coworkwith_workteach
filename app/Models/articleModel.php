<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articleModel extends Model
{
    use HasFactory;
    public $table="article";
    protected $fillable=[
        'title','content','category','checkByWho','createByWho','teacherComments','studentFeedback',
        'scores','teacherRating','status','lessionType','uploadType','photo_path','teacher_response_photo_path','google_link'
    ];
}
