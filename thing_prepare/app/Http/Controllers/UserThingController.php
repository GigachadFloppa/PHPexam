<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use Illuminate\Http\Request;

class UserThingController extends Controller
{

    public function index(){
        $master_id = auth()->user()->id;
        $things = Thing::where('master', $master_id)->get();

        return view('thing.user.index', compact('things'));
    }


    public function create()
    {
        $places = Place::all();
        $users = User::all();
        return view('thing.user.create', compact('places','users'));
    }

    public function store($id=null)
    {
        if ($id == null) {
            $thing = new Thing();
        }
        else $thing = Thing::findOrFail($id);

        $thing->name = request('name');
        $thing->description = request('description');
        $thing->master = auth()->user()->id;
        $thing->wrnt = request('wrnt');
        $result = $thing->save();

        $user = User::where('id', '==', auth()->user()->id)->get();
        // $testMail = new OrderShipped('На вас назначена новая вещь'.$thing->name);
        // Mail::send($testMail);
        return redirect()->route('items.index');
    }

    public function show(Thing $item)
    {
        return view('thing.user.show',compact('item'));
    }

    public function edit(Thing $item)
    {
        $places = Place::all();
        $users = User::all();

        return view('thing.user.edit',compact('item','places','users'));
    }


    public function update(Request $request, Thing $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index');
    }


    public function destroy(Thing $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success','post deleted successfully');
    }
}
