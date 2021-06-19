<?php

namespace App\Http\Controllers;

// use App\Models\Allocation;
use App\Models\Type;
use App\Models\Amenitie;
use Illuminate\Http\Request;

class AmenitieController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $amenitiesNb = Amenitie::count();

        return view('amenities.index', compact('types', 'amenitiesNb'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required|min:3|max:100',
                'description' => 'required|min:3|max:200',
            ]
        );

        if ($validator->fails()) {
            flashy()->error($validator->errors()->first());
            return redirect()->back();
        }

        $amenitie = Amenitie::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        flashy()->success("Commodité enregistré avec succès !");

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

        if ($validator->fails()) {
            flashy()->error($validator->errors()->first());
            return redirect()->back();
        }

        $amenitie = Amenitie::where('id', $id)->first();

        $amenitie->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        flashy()->success("Commodité modifiée avec succçs");

        return redirect()->back();
    }

    public function delete($id)
    {
        $amenitie = Amenitie::find($id);

        $amenitie->delete();

        flashy()->success("Commodité supprimé avec succès !");

        return redirect()->back();
    }
}
