@extends('layouts.app')

@section('content')

<main>

    <div class=" mx-10 my-2">

        <livewire:allocations.allocation-index :amenitie="$amenitie" />

    </div>

</main>

@endsection