<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    use HasFactory;
    protected $primaryKey = 'address_book_id';
    
    protected $fillable = [
        'name',
        'contact_number',
        'address',
        'email',
        'status',
    ];
}
