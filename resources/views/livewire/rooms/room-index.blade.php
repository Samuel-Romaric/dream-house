<div>
    <div class="">
        <div class="mb-10">
            <input type="text" id="" wire:model.debounce.500ms="search" class="rounded-lg w-full"
                placeholder="Rechercher une commodité">
        </div>

        <div class="mb-2">
            <div class="grid grid-cols-3 gap-3 space-x-2">
                @forelse ($rooms as $room)
                <div
                    class="card border border-gray-300 bg-gray-200 rounded-lg shadow duration-500 group hover:shadow-lg transition-shadow">
                    <div class="card-header rounded-t-lg px-4 bg-white py-5">
                        <div class="flex space-x-6 items-center">
                            {{-- <x-bi-journal-bookmark class="h-9 text-gray-500 w-auto" /> --}}
                            <div class="flex flex-col -space-y-1">
                                <h3 class="font-semibold text-gray-700 tracking-tight text-lg">
                                    <a href="{{-- route('allocation.index', $room->id) --}}">
                                        Chambre N° {{ $room->room_number }}</a>
                                </h3>
                            </div>
                        </div>
                        <div class="">
                            <p>
                                {{ $room->description }}
                            </p>
                            <p class="text-right text-gray-400">
                                Status : {{ $room->room_state() }}
                            </p>
                        </div>
                    </div>

                    <div class="card-footer bg-gray-50 px-4 py-4 rounded-b-lg ">
                        <a class="font-medium text-primary tracking-tight hover:text-blue-700" href="#"
                            style="font-size: 15px;">Créé le {{ $room->created_at->isoFormat("d MMMM Y à H:m") }}
                        </a>
                        <div class="flex space-x-2 justify-center">
                            <div><a href="javascript:void(0)"
                                    wire:click.prevent="openModalEditRoom(`{{ route('room.update', $room->id) }}`, `{{ $room->id }}`)"
                                    class="text-blue-500">Modifier</a>
                            </div>
                            <div><a href="javascript:void(0)"
                                    wire:click.prevent="openModalDeleteRoom(`{{ route('room.delete', $room->id) }}`, `{{ $room->room_number }}`)"
                                    class="text-red-500">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-gray-500 w-full grid-cols-none">
                    <p class="text-center">
                        Aucune chambre trouvée
                    </p>
                </div>
                @endforelse
            </div>
        </div>
        <div
            class="grid px-6 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
            <span class="flex items-center col-span-3">
                {{ __('Affichage de ') }}
                {{ $rooms->firstItem() }}
                {{ __(' à ') }}
                {{ $rooms->lastItem() }}
                {{ __(' sur ') }}
                {{ $rooms->total() }}
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                {{ $rooms->links() }}
            </span>
        </div>
    </div>
</div>