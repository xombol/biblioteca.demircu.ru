<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Publisher extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Getting a list of books from the current edition.
     */
    protected $fillable = ['name', 'city', "address"];

    public function books(){
        return $this->hasMany(Book::class);
    }

}
