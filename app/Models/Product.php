<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
