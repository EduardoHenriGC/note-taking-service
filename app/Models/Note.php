<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content'];

    // Relação com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function files()
{
    return $this->hasMany(File::class);
}
public function tags()
{
    return $this->belongsToMany(Tag::class);
}
}
