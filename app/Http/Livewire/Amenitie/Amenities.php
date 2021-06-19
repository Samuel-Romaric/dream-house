<?php

namespace App\Http\Livewire\Amenitie;

use App\Models\Amenitie;
use Livewire\Component;
use Livewire\WithPagination;

class Amenities extends Component
{
    use WithPagination;

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $amenitie;

    public function mount()
    {
        $this->amenitie = new Amenitie();
    }

    public function openModalEditAmenitie($url, $id)
    {
        $title = $this->amenitie->where('id', $id)->first()->title;
        $description = $this->amenitie->where('id', $id)->first()->description;

        $this->dispatchBrowserEvent(
            'edit-amenitie',
            [
                'url' => $url,
                'title' => $title,
                'description' => $description,
            ]
        );
    }

    public function openModalDeleteAmenitie($url, $title)
    {
        $this->dispatchBrowserEvent('delete-amenitie', ['url' => $url, 'title' => $title]);
    }

    public function openModalAddAllocation($url, $amenitie_id)
    {
        $this->dispatchBrowserEvent('add-allocation', ["url" => $url, "amenitie_id" => $amenitie_id]);
        // dd("Allocation d'élement", $url, $amenitie_id);
    }

    public function render()
    {
        $amenities = Amenitie::where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')->paginate(4);
        return view('livewire.amenitie.amenities', compact("amenities"));
    }
}
