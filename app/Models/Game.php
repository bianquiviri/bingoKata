<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable= ['id', 'create_at', 'update_at'];
    protected $hidden= ['create_at','update_at'];

    public function cards(){
        return $this->hasMany(Card::class,'game_id');
        
    }
}
