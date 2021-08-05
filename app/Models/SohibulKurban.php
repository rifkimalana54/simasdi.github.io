<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SohibulKurban extends Model
{
    use HasFactory;

    protected $table = 'sohibul_kurbans';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function type_hewans()
    {
        return $this->belongsTo(TypeHewan::class, 'type_hewan_id');
    }

    public function bayars()
    {
        return $this->hasMany('App\Models\BayarKurban');
    }
}
