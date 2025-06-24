<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_name',
        'content',
        'rating',
        'point_id', // tambahkan ini agar bisa disimpan
    ];

    /**
     * Relasi: Review ini milik salah satu pantai (point)
     */
    public function point()
    {
        return $this->belongsTo(PointsModel::class, 'point_id');
    }
}
