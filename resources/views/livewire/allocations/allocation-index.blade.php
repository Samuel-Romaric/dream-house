<div>
    <div>
        <div class="card border border-gray-200 rounded-lg duration-300 shadow-sm hover:shadow-2xl hover:bg-light-">
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
                    style="font-size: 15px;">Créé le
                    {{ $amenitie->created_at->isoFormat("D MMM Y") }}
                </a>
                <div class="flex space-x-2 justify-center">
                    <div><a href="javascript:void(0)"
                            wire:click.prevent="openModalEditAmenitie(`{{ route('amenitie.update', $amenitie->id) }}`, `{{ $amenitie->id }}`)"
                            class="text-blue-500">Attribuer</a>
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

    <div class="mt-5 bg-blue-400 border border-red-700 h-5/6">
        <div class="bg-gray-200 ">
            <ul>
                <li class="h-10">
                    <a href="" class="my-2">Attribution</a>
                </li>
            </ul>
        </div>
    </div>
</div>