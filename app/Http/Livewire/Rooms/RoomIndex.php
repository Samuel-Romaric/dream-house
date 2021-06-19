<?php

namespace App\Http\Livewire\Rooms;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class RoomIndex extends Component
{
    use WithPagination;

    public $search = "";

    public $room;

    public function mount()
    {
        $this->room = new Room();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openModalEditRoom($url, $id)
    {
        $room_number = $this->room->where('id', $id)->first()->room_number;
        $description = $this->room->where('id', $id)->first()->description;

        $this->dispatchBrowserEvent(
            'edit-room',
            [
                'url' => $url,
                'room_number' => $room_number,
                'description' => $description
            ]
        );
    }

    public function openModalDeleteRoom($url, $room_number)
    {
        $this->dispatchBrowserEvent('delete-room', ['url' => $url, 'room_number' => $room_number]);
        // dd($url, $room_number);
    }

    public function render()
    {
        $rooms = Room::where('room_number', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')->paginate(6);

        return view('livewire.rooms.room-index', compact('rooms'));
    }
}
