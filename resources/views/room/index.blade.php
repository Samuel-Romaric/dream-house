@extends('layouts.app')

@section('title', ' | Chambre')

@section('content')

<main x-data="data()">

    <div class="mx-10 my-2">

        <div class="mt-4 flex max-h-9 justify-between">
            <h3 class="text-md font-bold">Chambres : <span
                    class="bg-gray-300 py-0 px-1 rounded-md text-sm">{{ $roomNb->total_room() }}</span>
            </h3>
            <div class="">
                <a class="bg-blue-600 text-white px-2 py-2 items-center rounded duration-200 hover:bg-blue-800 "
                    href="javascript:void(0)" @click="{ openModalAddRoom() }">
                    <span class="text-2xl my-5">+</span>
                    Ajouter une chambre
                </a>
            </div>
        </div>

        <div class="py-10">
            <div class="max-w-full">
                <div class="bg-white ">
                    @if ($roomNb->total_room() > 0)
                    <livewire:rooms.room-index />
                    @else
                    <div
                        class="bg-gray-100 text-center py-8 flex flex-col items-center justify-center h-72 group hover:bg-gray-200 duration-700 rounded-lg hover:shadow-2xl">
                        <p class="text-gray-500 text-xl font-serif group-hover:text-gray-600">
                            Aucune chambre n'a encore été créé !
                        </p>
                    </div>
                    @endif

                </div>
            </div>
        </div>

    </div>

    @include('room.modals.add-room')
    @include('room.modals.modify-room')
    @include('room.modals.delete-room')
</main>

@endsection

@section('script')
<script>
    function data() {
        return {
            // Modal add room
            isOpenModalAddRoom:false,
            openModalAddRoom() {
                this.isOpenModalAddRoom = true;
            },
            addRoom() {
                $("#addRoomAction").attr("disabled", "disabled");
                $("#addRoomAction").addClass("opacity-75 pointer-events-none");
                $("#addRoomForm").submit();
            },
            closeModalAddRoom() {
                this.isOpenModalAddRoom = false;
            },
            // Modal modify room
            isOpenModalModifyRoom: false,
            openModalModifyRoom(url, room_number, description) {
                $("#modifyRoomForm").attr("action", url);
                $("#room_number").val(room_number);
                $("#description").val(description);
                this.isOpenModalModifyRoom = true;
            },
            modifyRoom() {
                $("#modifyRoomAction").attr("disabled", "disabled");
                $("#modifyRoomAction").addClass("opacity-75 pointer-events-none");
                $("#modifyRoomForm").submit();
            },
            closeModalModifyRoom() {
                this.isOpenModalModifyRoom = false;
            },
            // Modal delete room
            isOpenModalDeleteRoom: false,
            openModalDeleteRoom(url, room_number) {
                $("#deleteRoomForm").attr("action", url);
                $("#deleteRoomForm .iName").html(room_number);
                this.isOpenModalDeleteRoom = true;
            },
            deleteRoom() {
                $("#deleteRoomAction").attr("disabled", "disabled");
                $("#deleteRoomAction").addClass("opacity-75 pointer-events-none");
                $("#deleteRoomForm").submit();
            },
            closeModalDeleteRoom() {
                this.isOpenModalDeleteRoom = false;
            },
        }
      }
</script>
@endsection