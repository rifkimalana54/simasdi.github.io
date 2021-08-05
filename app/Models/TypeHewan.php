<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeHewan extends Model
{
    use HasFactory;

    protected $table = 'type_hewans';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function sohibulkurban()
    {
        return $this->hasMany('App\Models\SohibulKurban');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
