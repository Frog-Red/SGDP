<?php

// app/roles.php

// app/roles.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
    ];
    
    protected $primaryKey = 'id';

    // Define the relationship with users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

