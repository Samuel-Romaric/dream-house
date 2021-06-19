<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Amenitie;
use App\Models\Client;
use App\Models\Type;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $nbClients = Client::count();
        // $types = Type::all();

        return view('dashboard', compact('nbClients'));
    }

    public function showAllocation($id)
    {
        $amenitie = Amenitie::where('id', $id)->first();

        return view('allocations.index', compact("amenitie"));
    }

    public function addAllocation(Request $request)
    {
        // dd($request->all());
        $validator = \Validator::make(
            $request->all(),
            [
                'amenitie' => 'required|numeric',
                'type_id' => 'required',
                'date_start' => 'required|date',
                'date_end' => 'required|date',
            ]
        );

        if (is_null($request->type_id)) {
            flashy()->error("Veuillez selectioner un type svp!");
            return redirect()->back();
        }

        if ($validator->fails()) {
            flashy()->error($validator->errors()->first());
            return redirect()->back();
        }

        $type = Type::where('id', $request->type_id)->first();

        // dd($type);
        $type->allocations()->create([
            'amenitie_id' => $request->get('amenitie'),
            // 'type_id' => $request->get('type_id'),
            'date_start' => $request->get('date_start'),
            'date_end' => $request->get('date_end'),
        ]);

        flashy()->success("Le type chambre à bien été attribué");

        return redirect()->back();
    }
}
