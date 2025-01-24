<?php

namespace App\Http\Controllers;

use App\Repository\NoteTagRepository;
use App\Models\Note;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class NoteTagController extends Controller
{
    protected $noteTagRepository;

    // Injetando o repositório no construtor
    public function __construct(NoteTagRepository $noteTagRepository)
    {
        $this->noteTagRepository = $noteTagRepository;
    }


    public function index($tagId)
    {
        // Obter a tag e as notas associadas a ela
        $notes = $this->noteTagRepository->getNotesByTag($tagId);
    
        // Verificar se existem notas associadas à tag
        if ($notes->isEmpty()) {
            // Caso não haja notas, podemos definir $tag como null ou qualquer outro comportamento desejado
            $tag = null;
        } else {
            // Obter a tag associada à primeira nota, caso haja notas
            $tag = $notes->first()->tags->first();
        }
    
        $isTagRoute = true;
    
        // Retornar a view com as notas e a tag
        return view('notes.index', compact('notes', 'tag', 'isTagRoute'));
    }
    
    
    // Método para exibir o formulário de associação
    public function addTagForm($noteId)
    {
        // Recuperar todas as tags disponíveis
        $tags = $this->noteTagRepository->getAllTags();

        // Recuperar a nota que o usuário quer associar
        $note = Note::findOrFail($noteId);

        // Retornar a view com a nota e as tags
        return view('notes.addTag', compact('note', 'tags'));
    }

    // Método para associar uma tag à nota
    public function addTagToNote(Request $request, $noteId)
    {
        $request->validate([
            'tag_id' => 'required|exists:tags,id',
        ]);

        // Recuperar a nota
        $note = Note::findOrFail($noteId);

        // Associar a tag à nota
        $note->tags()->attach($request->tag_id);

        // Redirecionar para a página de notas com uma mensagem de sucesso
        return redirect()->route('notes.index')->with('success', 'Nota associada ao marcador com sucesso!');
    }
    public function removeTagFromNote($tagId, $noteId)
    {
        // Chama o repositório para remover a tag
        $result = $this->noteTagRepository->removeTagFromNote($noteId, $tagId);

        if (!$result) {
            return redirect()->back()->with('error', 'Esta nota não está associada ao marcador.');
        }

        // Redirecionar com uma mensagem de sucesso
        return redirect()->back()->with('success', 'A nota foi desassociada do marcador com sucesso.');
    }
    
}