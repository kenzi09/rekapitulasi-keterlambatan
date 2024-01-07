<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $fillable = [
        'rayon', 'ps_rayon'
    ];

    public function students()
    {
        return $this->hasMany(Students::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'ps_rayon');
    }
}
