<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    use HasFactory;

    protected $table = 'role_user'; // Adjust this if your actual pivot table name is different

    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public $timestamps = false; // Assuming your pivot table doesn't have timestamps

    // You may define additional relationships or methods as needed
}
