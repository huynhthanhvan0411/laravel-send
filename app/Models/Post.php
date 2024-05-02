<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['title', 'content'];

}
