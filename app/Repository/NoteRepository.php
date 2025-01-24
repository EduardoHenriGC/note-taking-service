<?php

namespace App\Repository;

use App\Models\Note;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class NoteRepository
{
    // Método para pegar todas as notas do usuário
    public function getUserNotes()
    {
        return Auth::user()->notes;  // Retorna todas as notas do usuário logado
    }

    // Método para criar uma nova nota
    public function create(array $data)
    {
        // Cria a nota associada ao usuário logado
        return Note::create([
            'content' => $data['content'],
            'user_id' => Auth::id(),
        ]);
    }

    // Método para associar arquivos a uma nota
    public function storeFiles($files, $noteId)
    {
        foreach ($files as $file) {
            $filePath = $file->store('files', 'public');  // Armazenando os arquivos
            File::create([
                'note_id' => $noteId,
                'file_path' => $filePath,
            ]);
        }
    }
    
}
