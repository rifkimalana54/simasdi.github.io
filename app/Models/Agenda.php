<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $casts = [
        'tgl_pelaksanaan' => 'date'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
