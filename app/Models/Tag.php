<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relacionamento muitos-para-muitos com Note
    public function notes()
    {
        return $this->belongsToMany(Note::class, 'note_tag');
    }
    
}