<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        // $roomNb = Room::count();

        $roomNb = new Room();

        return view('room.index', compact('roomNb'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'room_number' => 'required|numeric',
                'description' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            flashy()->error($validator->errors()->first());
            return redirect()->back();
        }

        Room::create([
            'room_number' => $request->room_number,
            'description' => $request->description,
        ]);

        flashy()->success("Chambre créé avec succès !");

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'room_number' => 'required|numeric',
                'description' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            flashy()->error($validator->errors()->first());
            return redirect()->back();
        }

        $room = Room::where('id', $id)->first();

        // dd("Ok c'est fait", $room);
        $room->update([
            'room_number' => $request->room_number,
            'description' => $request->description,
        ]);

        flashy()->success("Chambre modifié avec succès !");

        return redirect()->back();
    }

    public function delete($id)
    {
        $room = Room::where('id', $id)->first();
        // dd("Delete", $room);

        $room->delete();

        flash()->success("Chambre modifié avec succès !");

        return redirect()->back();
    }
}
