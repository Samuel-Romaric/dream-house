@extends('layouts.app')

@section('css')
<style>
    .full-heigth {
        height: 100%;
    }
</style>
@endsection

@section('content')

<main x-data="data()">

    <div class="mx-10 my-2">

        <div class="mt-4 flex justify-between">
            <h3 class="text-md font-bold">Reservations : <span class="bg-gray-300 py-0 px-1 rounded-md text-sm">0</span>
            </h3>
            <div class="">
                <a class="bg-blue-600 text-white px-2 py-2 items-center rounded duration-200 hover:bg-blue-800 "
                    href="javascript:void(0)" @click="{ openModalAddBooking() }">
                    <span class="text-2xl my-5">+</span>
                    Reserver
                </a>
            </div>
        </div>

        <div class="py-10">
            <div class="max-w-full bg-white full-heigth rounded-lg px-5">
                {{-- <div class=""> --}}
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam porro maiores quod omnis molestiae
                atque veniam commodi modi eius natus doloremque mollitia, quae non tenetur doloribus harum. Fugiat,
                sapiente cumque! <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo dignissimos corrupti similique nihil
                adipisci mollitia maiores ducimus! Nam possimus tenetur non beatae amet quidem quis, inventore, itaque
                fugit esse cumque. <br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate, quam culpa? Minima eum suscipit,
                itaque optio, animi dignissimos omnis velit repudiandae sequi, harum illo dolorum ducimus quis tempora
                aliquam aliquid? <br>

                {{-- </div> --}}
            </div>
        </div>

    </div>

    @include('booking.modals.add-booking')

</main>

@endsection

@section('script')
<script>
    function data() {
        return {
            // Modal booking
            isOpenModalAddBooking: false,
            openModalAddBooking() {
                this.isOpenModalAddBooking = true;
            },
            closeModalAddBooking() {
                this.isOpenModalAddBooking = false;
            },
        }
    }
</script>
@endsection
{{--
Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde qui quas a ipsa illo iste libero eius.
Quidem rem sed quasi, tempore unde, rerum tenetur ad accusamus, modi et qui?
<br>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, maxime fugiat. Odit et cum, esse
aliquid fugit ducimus quibusdam officia commodi earum vel, natus obcaecati, iure accusantium beatae
maxime est!
<br>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, magni amet cum suscipit harum possimus
reiciendis laborum labore dignissimos voluptas officiis itaque odit sequi. Eveniet illum odit ratione
nulla inventore?
<br>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, ratione magnam magni nemo reiciendis
distinctio vitae eveniet maiores sit assumenda minus consequatur, autem tenetur ducimus. Vel
consequuntur corporis repudiandae perspiciatis.
<br>
Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, nobis at? Dolores ea, labore atque
id, consectetur quasi deleniti cupiditate adipisci sunt debitis doloribus accusantium animi nostrum sit
excepturi quo!
<br>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, sit nam placeat soluta nesciunt molestias
laboriosam debitis culpa consequuntur ab, esse at fuga nulla facere modi dolore nostrum, pariatur natus.
<br>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae repudiandae tempore porro obcaecati. Ipsa
fuga nemo quos dolorum doloribus corporis nesciunt, similique delectus autem eos dicta, ipsum architecto
earum. Sed!
<br>
Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam hic modi obcaecati, ea nulla earum
sequi et reiciendis recusandae? Autem, quia sed. Autem nostrum labore blanditiis ut ullam molestias
pariatur!
<br>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque neque exercitationem tempora fugiat
culpa nobis non delectus quos dolores dolorum adipisci officiis pariatur, a accusamus! Architecto
repudiandae facere placeat blanditiis.
<br>
Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nobis placeat? Odio accusantium,
modi magnam magni unde cupiditate! Culpa, nisi. Qui voluptates temporibus, quae eligendi facere at
veritatis? Itaque, molestias! --}}