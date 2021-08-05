<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarKurban extends Model
{
    use HasFactory;

    protected $table = 'bayar_kurbans';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function sohibulkurban()
    {
        return $this->belongsTo(SohibulKurban::class, 'sohibul_kurban_id');
    }
}
