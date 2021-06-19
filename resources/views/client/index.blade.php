@extends('layouts.app')

@section('title', ' | Reservation')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="h-8 text-2xl">Enregistrer le client</h1>
                <div>
                    <a class="bg-blue-400 pl-2 pr-2 rounded-lg" href="javascript:void(0)">
                        Ajouter une reservation
                    </a>
                </div>

                <div class="flex">
                    <form action="{{ route('client.store') }}" method="POST" validate>
                        @csrf
                        Information sur le client <br>
                        <label for="name">Nom : </label>
                        <input type="text" name="name" id="name" placeholder="Toto"> <br>

                        <label for="subname">Prenom : </label>
                        <input type="text" name="subname" id="subname" placeholder="Toti"> <br>

                        <label for="phone">Téléphone</label>
                        <input type="tel" name="phone" id="phone" placeholder="+225 07 0000 0000"> <br>

                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="toto@exemple.com"> <br>

                        Information sur la chambre <br>
                        <label for="room_number">N° de chambre :</label>
                        <input type="number" min="1" max="20" name="room_number" id="room_number" placeholder="15"> <br>

                        {{-- <label for="debut">Debut du sejour</label>
            <input type="date" name="date_debut" id="debut"> <br>
            <input type="time" name="" id="">

            <label for="fin">Fin du sejour</label>
            <input type="date" name="date_fin" id="fin"> --}}

                        <label for="duration">Durée du sejour</label>
                        <input type="text" name="duration" id="duration" placeholder="6"> Heure.s <br>

                        Les commodités
                        <label for="title">Titre :</label>
                        <select name="title" id="">
                            <option value="">Choisissez une option</option>
                            <option value="VIP">VIP</option>
                            <option value="Classique">Classique</option>
                        </select>

                        <br>

                        <label for="description">Description :</label>
                        <select name="description" id="">
                            <option value="">Choisissez une option</option>
                            <option value="Ventile + Television">Ventilé + télévision</option>
                            <option value="Climatiseur + baignoir">Climatiseur + baignoir</option>
                        </select>

                        <br>

                        <div class="flex justify-center mt-5">
                            <input class="text-white bg-red-600 pl-2 pr-2 h-8 rounded-lg mr-2 hover:bg-red-800"
                                type="reset" value="Annuler">

                            <input class="text-white bg-green-600 pl-2 pr-2 h-8 rounded-lg hover:bg-green-800 duration"
                                type="submit" value="Enregistrer">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection