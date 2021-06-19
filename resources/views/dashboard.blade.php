@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

<main x-data="data()">

    <div class="mx-10 my-2">

        <div class="mt-10">
            @if ($nbClients > 0)
            <div class="">
                <livewire:reservation />
            </div>
            @else
            <div class="bg-blue-300 justify-items-center">
                <div class="text-center">
                    Aucune reservation trouvée !
                </div>
            </div>
            @endif
        </div>

    </div>

</main>

@endsection

@section('script')
<script>
    function data() {
        return {}
    }
</script>
@endsection