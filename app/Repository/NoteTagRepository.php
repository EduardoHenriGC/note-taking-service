<?php

namespace App\Repository;

use App\Models\Note;
use App\Models\Tag;
use App\Models\NoteTag;
use Illuminate\Support\Facades\Auth;

class NoteTagRepository
{
    // Obter as notas associadas a uma tag específica
    public function getNotesByTag($tagId)
    {
        return Note::whereHas('tags', function($query) use ($tagId) {
            $query->where('tags.id', $tagId);
        })->where('user_id', Auth::id())
          ->get();
    }

    // Recuperar todas as notas do usuário autenticado
    public function getAllNotesForUser()
    {
        return Note::where('user_id', Auth::id())->get();
    }

    // Recuperar todas as tags
    public function getAllTags()
    {
        return Tag::all();
    }

    // Criar a associação entre uma nota e uma tag
    public function createNoteTagAssociation($noteId, $tagId)
    {
        return NoteTag::create([
            'note_id' => $noteId,
            'tag_id' => $tagId,
        ]);
    }
    public function removeTagFromNote($noteId, $tagId)
    {
        // Recuperar a nota
        $note = Note::findOrFail($noteId);
        
        // Verificar se a nota está associada à tag
        if (!$note->tags()->where('tags.id', $tagId)->exists()) {
            return false; // Retornar falso se a tag não estiver associada à nota
        }

        // Desassociar a tag da nota
        $note->tags()->detach($tagId);
        
        return true; // Retornar verdadeiro quando a tag for desassociada com sucesso
    }
}
