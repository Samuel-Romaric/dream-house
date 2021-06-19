<?php

namespace App\Http\Livewire\Type;

use App\Models\Type as ModelsType;
use Livewire\Component;

class Type extends Component
{
    public $search;

    public $type;

    public function mount()
    {
        $this->type = new ModelsType();
    }

    public function openModalEditType($url, $id)
    {
        $title = $this->type->where('id', $id)->first()->title;
        $description = $this->type->where('id', $id)->first()->description;

        $this->dispatchBrowserEvent('edit-type', ['title' => $title, 'description' => $description, 'url' => $url]);
    }

    public function openModalDeleteType($url, $title)
    {
        $this->dispatchBrowserEvent('delete-type', ['url' => $url, 'title' => $title]);
    }

    public function render(ModelsType $types)
    {
        return view('livewire.type.type', [
            'types' => $types->all(),
        ]);
    }
}
