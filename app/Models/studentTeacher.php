<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentTeacher extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table="studentTeacher_register";
    protected $fillable=[
        'email','password','name','whoRegister','status'
    ];
}
