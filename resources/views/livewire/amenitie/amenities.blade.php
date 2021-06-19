<div>

    <div class="mb-10">
        <input type="text" id="" wire:model.debounce.500ms="search" class="rounded-lg w-full"
            placeholder="Rechercher une commodité">
    </div>

    <div class="grid grid-cols-3 gap-3 space-x-2 space-y-3 box-border">
        @forelse ($amenities as $amenitie)
        <div class="">
            <div class="card border border-gray-200 rounded-lg duration-300 shadow-sm hover:shadow-2xl">
                <div class="card-header rounded-t-lg px-4 bg-white py-5">
                    <div class="flex space-x-6 items-center">
                        {{-- <x-bi-journal-bookmark class="h-9 text-gray-500 w-auto" /> --}}
                        <div class="flex flex-col -space-y-1">
                            <h3 class="font-semibold text-gray-700 tracking-tight text-lg">
                                <a href="{{ route('allocation.index', $amenitie->id) }}">{{ $amenitie->title }}</a>
                            </h3>
                        </div>
                    </div>
                    <div class="">
                        {{ $amenitie->description }}
                    </div>
                </div>

                <div class="card-footer bg-gray-50 px-4 py-4 rounded-b-lg ">
                    <a class="font-medium text-primary tracking-tight hover:text-blue-700" href="#"
                        style="font-size: 15px;">Créé le {{ $amenitie->created_at->isoFormat("D MMM Y") }}
                    </a>
                    <div class="flex space-x-2 justify-center">
                        <div><a href="javascript:void(0)"
                                wire:click.prevent="openModalEditAmenitie(`{{ route('amenitie.update', $amenitie->id) }}`, `{{ $amenitie->id }}`)"
                                class="text-blue-500">Modifier</a>
                        </div>
                        <div>
                            @if ($amenitie->getAllocation() == 1)
                            <a href="javascript:void(0)"
                                wire:click.prevent="openModalChangeAmenitie(`{{ route('amenitie.update', $amenitie->id) }}`, `{{ $amenitie->id }}`)"
                                class="text-yellow-500">Changer</a>
                            @else
                            <div>
                                <a href="javascript:void(0)"
                                    wire:click.prevent="openModalAddAllocation(`{{ route('allocation.store') }}`, {{ $amenitie->id }})"
                                    class="text-green-500">Attribuer</a>
                            </div>
                            @endif
                        </div>

                        <div><a href="javascript:void(0)"
                                wire:click.prevent="openModalDeleteAmenitie(`{{ route('amenitie.delete', $amenitie->id) }}`, `{{ $amenitie->title }}`)"
                                class="text-red-500">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-gray-500 w-full grid grid-flow-row-dense">
            <p class="text-center">
                Aucune commodité trouvée
            </p>
        </div>
        @endforelse
    </div>
    <hr class="divide-y-1">
    <div
        class="grid px-6 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
        <span class="flex items-center col-span-3">
            {{ __('Affichage de ') }}
            {{ $amenities->firstItem() }}
            {{ __(' à ') }}
            {{ $amenities->lastItem() }}
            {{ __(' sur ') }}
            {{ $amenities->total() }}
        </span>
        <span class="col-span-2"></span>
        <!-- Pagination -->
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            {{ $amenities->links() }}
        </span>
    </div>

</div>