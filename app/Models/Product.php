<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
         'name', 'description', 'price', 'cycle', 'bandwidth', 'status'
    ];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
