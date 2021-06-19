<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recommendArticleModel extends Model
{
    use HasFactory;
    public $table="recommendarticle";
    protected $fillable=[
        'article_title','article_summary','article_category','lession_type','link','status'
    ];
}
