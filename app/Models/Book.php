<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $description
 * @property string $isbn
 * @property Author[] $authors
 *
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'isbn', 'publisher_id'];

    protected $hidden = ['pivot'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
