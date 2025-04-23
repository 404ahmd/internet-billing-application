<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
       'name', 'username', 'phone', 'address',
        'package', 'group', 'join_date', 'status',
        'last_payment_date', 'due_date', 'notes'
    ];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
