<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites';
    protected $primaryKey = 'id';
    protected  $fillable = [
        'user_id',
        'song_id'
    ];
    public $timestamps = true;

    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id');
    }
}
