<?php
namespace App\Http\Controllers;

use App\Repository\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagRepository;

    // Injetar o repositório no construtor
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    // Armazenar uma nova tag
    public function store(Request $request)
    {
        // Validar os dados
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Criar a tag usando o repositório
        $this->tagRepository->createTag($request->name);

        // Redirecionar para a página de listagem de tags
        return redirect()->route('tags.index');
    }

    // Exibir todas as tags
    public function index()
    {
        // Recuperar todas as tags usando o repositório
        $tags = $this->tagRepository->getAllTags();
        
        // Retornar a view e passar a variável $tags
        return view('tags.index', compact('tags'));
    }

    // Exibir o formulário para criação de uma tag
    public function create()
    {
        return view('tags.create');
    }
    public function destroy($id)
    {
        // Excluir a tag pelo repositório
        $this->tagRepository->deleteTag($id);

        // Redirecionar para a página de listagem de tags com mensagem de sucesso
        return redirect()->route('tags.index')->with('success', 'Tag excluída com sucesso!');
    }
}
