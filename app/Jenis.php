<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class, 'jenis_id', 'id');
    }
}
