@extends('layouts.app')

@section('title', ' | Type')

@section('css')
<style>
    .height {
        height: 100px;
    }
</style>
@endsection

@section('content')

<main x-data="data()">

    <div class="mx-10 my-2">

        <div class="mt-4 flex max-h-9 justify-between">
            <h3 class="text-md font-bold">Types de chambres : <span
                    class="bg-gray-300 py-0 px-1 rounded-md text-sm">{{ $typesNb }}</span>
            </h3>
            <div class="">
                <a class="bg-blue-600 text-white px-2 py-2 items-center rounded duration-200 hover:bg-blue-800 "
                    href="javascript:void(0)" @click="{ openModalAddType() }">
                    <span class="text-2xl my-5">+</span>
                    Ajouter un type
                </a>
            </div>
        </div>

        <div class="py-10">
            <div class="bg-gray-200 max-w-full rounded-md shadow-lg">
                @if ($typesNb > 0)
                <livewire:type.type />
                @else
                <div
                    class="bg-gray-200 text-center py-8 flex flex-col items-center justify-center h-72 rounded-lg group hover:bg-blue-300 duration-700">
                    <p class="text-gray-700 text-xl font-serif group-hover:text-gray-900">
                        Aucun type n'a encore été créé !
                    </p>
                </div>
                @endif
            </div>
        </div>

    </div>

    @include('type.modals.add-type')
    @include('type.modals.modify-type')
    @include('type.modals.delete-type')

</main>

@endsection

@section('script')

<script>
    function data() {
        return {
            tooltip: 0, // Review
            // Modal add type
            isOpenModalAddType: false,
            openModalAddType() {
                this.isOpenModalAddType = true;
            },
            addType() {
                $("#addTypeAction").attr("disabled", "disabled");
                $("#addTypeAction").addClass("opacity-75 pointer-events-none");
                $("#addTypeForm").submit();
            },
            closeModalAddType() {
                this.isOpenModalAddType = false;
            },
            // Modal modify type
            isOpenModalModifyType: false,
            openModalModifyType(url, title, description) {
                $("#modifyTypeForm").attr("action", url);
                $("#modifyTypeForm [name='title']").val(title);
                $("#modifyTypeForm [name='description']").val(description);
                this.isOpenModalModifyType = true;
            },
            modifyType() {
                $("#modifyTypeAction").attr("disabled", "disabled");
                $("#modifyTypeAction").addClass("opacity-75 pointer-events-none");
                $("#modifyTypeForm").submit();
            },
            closeModalModifyType() {
                this.isOpenModalModifyType = false;
            },
            // Modal delete type
            isOpenModalDeleteType: false,
            openModalDeleteType(url, title) {
                $("#deleteTypeForm").attr("action", url);
                $("#deleteTypeForm .iName").html(title);
                this.isOpenModalDeleteType = true;
            },
            deleteType() {
                $("#deleteTypeAction").attr("disabled", "disabled");
                $("#deleteTypeAction").addClass("opacity-75 pointer-events-none");
                $("#deleteTypeForm").submit();
            },
            closeModalDeleteType() {
                this.isOpenModalDeleteType = false;
            },
        }
    }
</script>

@endsection