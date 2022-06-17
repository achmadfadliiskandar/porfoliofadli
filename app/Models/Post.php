<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['nama','slug','image','isi'];

    public function reply()
    {
        return $this->hasOne(Reply::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
