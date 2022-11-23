<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $fillable=[
        'ten', 'avatar', 'ngaysinh', 'diachi', 'songaynghi'
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
