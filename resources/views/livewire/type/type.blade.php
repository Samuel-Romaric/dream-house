<div>
    <div class="flex flex-col pt-20">
        <h1 class="text-center text-gray-600">Types</h1>
        <table class="min-w-full divide-y divide-x">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" width="30%"
                        class="px-6 py-3 text-center xs:text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Titre
                    </th>
                    <th scope="col" width="30%"
                        class="px-6 py-3 text-center xs:text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Description
                    </th>
                    <th scope="col" width="20%">
                        <div class="text-gray-600 uppercase">
                            Créé le
                        </div>
                    </th>
                    <th scope="col" width="20%">
                        <div class="sr-only">Action</div>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($types as $type)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap lg:whitespace-normal">
                        <div class="flex items-center">
                            {{ $type->title }}
                        </div>
                    </td>
                    <td>{{ $type->description }}</td>
                    <td>
                        <div class="text-center text-gray-600">
                            {{ $type->created_at->isoFormat("D MMM Y") }}
                        </div>
                    </td>
                    <td>
                        <div class="flex space-x-2">
                            <div><a href="javascript:void()"
                                    wire:click.prevent="openModalEditType(`{{ route('type.update', $type->id) }}`, `{{ $type->id }}`)"
                                    class="text-blue-500">Modifier</a></div>
                            <div><a href="javascript:void()"
                                    wire:click.prevent="openModalDeleteType(`{{ route('type.delete', $type->id) }}`, `{{ $type->title }}`)"
                                    class="text-red-500">Supprimer</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <div class="text-gray-400 text-center w-full">Aucun type trouvé</div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>