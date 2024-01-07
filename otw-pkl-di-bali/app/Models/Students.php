<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id';
    protected $fillable = [
        'nis', 'name', 'rombel_id', 'rayon_id'
    ];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    public function lates()
    {
        return $this->hasMany(Lates::class);
    }
}
