<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardItems extends Model
{
    use HasFactory;
    
    protected $fillables = ['id', 'cards_id', 'b', 'i', 'n', 'g', 'o', 'created_at', 'update_at'];
    
}
