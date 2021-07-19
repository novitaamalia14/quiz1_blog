<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "tb_post";
    protected $primaryKey = "id_post";
    protected $fillable = ['tanggal', 'slug', 'title', 'keterangan', 'id_cat'];

    //public function kategori()
      //{
        //return $this->belongsTo(Kategori::class);
    //}

    //public function Photo()
    //{
        //return $this->hasMany(Photo::class);
    //}
}
