<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table = 'songs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'album_id',
        'name',
        'singer',
        'songUrl',
        'imageUrl',
        'views'
    ];
    public $timestamps = true;

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
