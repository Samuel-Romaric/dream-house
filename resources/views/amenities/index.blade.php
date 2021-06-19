@extends('layouts.app')

@section('title', ' | Commodite')

@section('content')

<main x-data="data()">

    <div class="mx-10 my-2">

        <div class="mt-4 flex max-h-9 justify-between">
            <h3 class="text-md font-bold">Commoditées : <span
                    class="bg-gray-300 py-0 px-1 rounded-md text-sm">{{ $amenitiesNb }}</span>
            </h3>
            <div class="">
                <a class="bg-blue-600 text-white px-2 py-2 items-center rounded duration-200 hover:bg-blue-800 "
                    href="javascript:void(0)" @click="{ openModalAddAminitie() }">
                    <span class="text-2xl my-5">+</span>
                    Ajouter commoditée
                </a>
            </div>
        </div>

        <div class="py-10">
            <div class="bg-gray-200 max-w-full rounded-md shadow-2xl">
                @if ($amenitiesNb > 0)
                <livewire:amenitie.amenities />
                @else
                <div
                    class="bg-gray-200 text-center py-8 flex flex-col items-center justify-center h-72 rounded-lg group hover:bg-blue-300 duration-700">
                    <p class="text-gray-700 text-xl font-serif group-hover:text-gray-900">
                        Aucune commoditée n'a encore été créé !
                    </p>
                </div>
                @endif
            </div>
        </div>

    </div>

    @include('amenities.modals.add-amenitie')
    @include('amenities.modals.modify-amenitie')
    @include('amenities.modals.delete-amenitie')
    @include('amenities.modals.allocations.add-allocation')

</main>

@endsection

@section('script')

<script>
    function data() {
        return {
            // Modal add amenities
            isOpenModalAddAmenitie: false,
            openModalAddAminitie() {
                this.isOpenModalAddAmenitie = true;
            },
            addAmenitie() {
                $("#addAmenitieAction").attr("disabled", "disabled");
                $("#addAmenitieAction").addClass("opacity-75 pointer-events-none");
                $("#addAmenitieForm").submit();
            },
            closeModalAddAmenitie() {
                this.isOpenModalAddAmenitie = false;
            },
            // Modal modify amenitie
            isOpenModalModifyAmenitie: false,
            openModalModifyAmenitie(url, title, description, date_start, date_end) {
                console.log("modify : ", date_start, date_end);
                $("#modifyAmenitieForm").attr("action", url);
                $("#modifyAmenitieForm [name='title']").val(title);
                $("#modifyAmenitieForm [name='description']").val(description);
                $("#modifyAmenitieForm [name='date_start']").val(date_start);
                $("#modifyAmenitieForm [name='date_end']").val(date_end);
                this.isOpenModalModifyAmenitie = true;
            },
            modifyAmenitie() {
                $("#modifyAmenitieAction").attr("disabled", "disabled");
                $("#modifyAmenitieAction").addClass("opacity-75 pointer-events-none");
                $("#modifyAmenitieForm").submit();
            },
            closeModalModifyAmenitie() {
                this.isOpenModalModifyAmenitie = false;
            },
            // Modal delete amenitie
            isOpenModalDeleteAmenitie: false,
            openModalDeleteAmenitie(url, title) {
                // console.log(url);
                $("#deleteAmenitieForm").attr("action", url);
                $("#deleteAmenitieForm .iName").html(title);
                this.isOpenModalDeleteAmenitie = true;
            },
            deleteAmenitie() {
                $("#deleteAmenitieAction").attr("disabled", "disabled");
                $("#deleteAmenitieAction").addClass("opacity-75 pointer-events-none");
                $("#deleteAmenitieForm").submit();
            },
            closeModalDeleteAmenitie() {
                this.isOpenModalDeleteAmenitie = false;
            },
            // Modal add allocation
            isOpenModalAddAllocation: false,
            openModalAddAllocation(url, amenitie_id) {
                console.log("URI: ",url, "ID: ", amenitie_id);
                $("#addAllocationForm").attr("action", url);
                $("#addAllocationForm [name='amenitie']").val(amenitie_id);
                this.isOpenModalAddAllocation = true;
            },
            addAllocation() {
                $("#addAllocationAction").attr("disabled", "disabled");
                $("#addAllocationAction").addClass("opacity-75 pointer-events-none");
                $("#addAllocationForm").submit();
            },
            closeModalAddAllocation() {
                this.isOpenModalAddAllocation = false;
            },
        }
    }
</script>

@endsection