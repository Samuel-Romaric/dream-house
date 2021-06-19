<div class="">
    <nav class="py-1 bg-gray-100 relative border border-gray-200">

        <ul class="flex space-x-1 h-10">
            <li class="py-2 {{ is_active('dashboard') }}">
                <a class="mx-2" href="{{ route('dashboard') }}">
                    Accueil
                </a>
            </li>
            <li class="py-2 {{ is_active('booking.index') }}">
                <a class="mx-2" href="{{ route('booking.index') }}">
                    Resevations
                </a>
            </li>
            <li class="py-2 {{ is_active('room.index') }}">
                <a class="mx-2" href="{{ route('room.index') }}">
                    Chambres
                </a>
            </li>
            <li class="py-2 {{ is_active('type.index') }}">
                <a class="mx-2" href="{{ route('type.index') }}">
                    Type de Chambre
                </a>
            </li>
            <li class="py-2 {{ is_active('amenitie.index') }}">
                <a class="mx-2" href="{{ route('amenitie.index') }}">
                    Commodités
                </a>
            </li>
        </ul>

    </nav>

</div>