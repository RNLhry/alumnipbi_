<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = "testimoni";
    protected $primaryKey = 'id';
    protected $fillable = [
        'alumni_id',
        'testimoniy'
    ];
    public function alumni()
{
    return $this->belongsTo('App\Models\Alumni');
}
}
