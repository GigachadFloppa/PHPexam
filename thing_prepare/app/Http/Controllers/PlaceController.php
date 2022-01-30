<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

//Admin part

    public function index()
    {
        $places = Place::all();

        return view('place.index', compact('places'));
    }

    /**
     * Выводит форму для создания нового ресурса
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $this->authorize('create', [self::class]);
        return view('place.create');
    }


    public function store($id=null)
    {
        if ($id == null) {
            $thing = new Place();
        }
        else $thing = Place::findOrFail($id);

        $thing->repair = request('repair');
        $thing->description = request('description');
        $thing->work = request('work');
        $thing->name = request('name');
        $result = $thing->save();

        $user = User::where('id', '==', auth()->user()->id)->get();
        //  $testMail = new OrderShipped('На вас назначена новая вещь'.$thing->name);
        // Mail::send($testMail);
        return redirect()->route('place.index');
    }

    public function show(Place $place)
    {
        return view('place.show',compact('place'));
    }

    /**
     * Выводит форму для редактирования указанного ресурса
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('place.edit',compact('place'));
    }


    public function update(Request $request, Place $place)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $place->update($request->all());

        return redirect()->route('place.index');
    }


    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()->route('place.index')
            ->with('success','post deleted successfully');
    }

    //api


    public function api_create(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'master' => 'required',
            'wrnt' => 'required'
        ]);

        $thing = Thing::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'master' => $request->input('master'),
            'wrnt' => $request->input('wrnt'),
        ]);

        $response = [
            $thing
        ];

        return response($response, 201);
    }

}
