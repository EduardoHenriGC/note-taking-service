<?php
namespace App\Repository;

use App\Models\Tag;

class TagRepository
{
    // Criar uma nova tag
    public function createTag($name)
    {
        return Tag::create([
            'name' => $name
        ]);
    }

    // Recuperar todas as tags
    public function getAllTags()
    {
        return Tag::all();
    }
    public function deleteTag($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
    }
    
}
