<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lates extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'date_time_late',
        'information',
        'bukti',
    ];

    public function students()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
