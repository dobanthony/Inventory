<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['admin_id', 'name', 'description', 'type'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
