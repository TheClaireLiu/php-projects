<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    // inverse one-to-many relationship with Board
    public function board()
    {
        return $this->belongsTo(Board::class);
    } 

    // many-to-many relationship with user
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
