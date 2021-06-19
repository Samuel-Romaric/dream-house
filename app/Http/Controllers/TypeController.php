<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $typesNb = Type::count();

        $rooms = Room::all();

        return view('type.index', compact('typesNb', 'rooms'));
    }

    public function store(Request $request)
    {
        dd($request->room);
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required|min:3|max:100',
                'description' => 'required|min:3|max:100',
                'room' => 'required|numeric',
            ]
        );

        if (is_null($request->room)) {
            flashy()->error("Vous devez seletioner une chambre");
            return redirect()->back();
        }

        if ($validator->fails()) {
            flashy()->error($validator->errors()->first());
            return redirect()->back();
        }

        $room = Room::where('id', $request->room)->first();

        // dd($room);

        // $room->type()->create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        // ]);

        Type::create([
            'title' => $request->title,
            'description' => $request->description,
            'room_id' => $request->room,
        ]);

        flashy()->success("Type de chambre créé avec succès !");

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required|min:3|max:100',
                'description' => 'required|min:3|max:100',
            ]
        );

        $type = Type::where('id', $id)->first()->title;
        dd($type);

        $type->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        flashy()->success("Type modifié avec succès !");

        return redirect()->back();
    }

    public function delete($id)
    {
        $type = Type::find($id);

        $type->delete();

        flashy()->success("Type supprimé avec succès");

        return redirect()->back();
    }
}
