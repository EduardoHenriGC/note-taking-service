<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Note;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['note_id', 'file_path'];

    // Relação com a nota
    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
