<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminMailModel extends Model
{
    use HasFactory;
    public $table="adminmail";
    public $timestamps = false;
    protected $fillable=[
        'email'
    ];
}
