<?php


namespace App\Http\Controllers;

use App\Repository\NoteRepository;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected $noteRepository;

    // Injeção de dependência do NoteRepository
    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    // Exibir todas as notas do usuário
    public function index()
    {
        $notes = $this->noteRepository->getUserNotes(); // Usando o repositório
        return view('notes.index', compact('notes'));
    }

    // Mostrar o formulário para criar uma nova nota
    public function create()
    {
        return view('notes.create');
    }

    // Armazenar a nova nota no banco de dados
    public function store(Request $request)
    {
        // Validação para conteúdo da nota e arquivos
        $request->validate([
            'content' => 'required|string|max:255',
            'files' => 'nullable|array|max:5', // Permitindo até 5 arquivos
            'files.*' => 'file|mimes:jpeg,png,jpg,pdf|max:2048', // Tipos de arquivos e tamanho
        ]);
    
        // Criando a nota associada ao usuário
        $note = $this->noteRepository->create([
            'content' => $request->content,
        ]);
    
        // Verificando se existem arquivos e associando a nota
        if ($request->hasFile('files')) {
            $this->noteRepository->storeFiles($request->file('files'), $note->id); // Usando o repositório
        }
    
        return redirect()->route('notes.index')->with('success', 'Nota criada com sucesso!');
    }
}
