<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use App\Models\Uses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ThingController extends Controller
{
    protected $table = 'thing';


    public function index()
    {
        Cache::forget('things:all');
        $things = Cache::rememberForever('things:all', function(){
            return Thing::all();});
        return view('thing.index', compact('things'));
    }

    public function create()
    {
        $places = Place::all();
        $users = User::all();

        return view('thing.create', compact('places','users'));
    }


    public function store($id=null)
    {
        if ($id == null) {
            $thing = new Thing();
        }
        else $thing = Thing::findOrFail($id);

        $thing->name = request('name');
        $thing->description = request('description');
        $thing->master = request('master');
        $thing->wrnt = request('wrnt');
        $result = $thing->save();


        $uses = new Uses();
        $uses->thing_id = $thing->id;
        $uses->place_id = request('place');
        $uses->user_id = request('user');
        $uses->amount = 1;
        $uses->save();
        $user = User::where('id', '!=', auth()->user()->id)->get();
        Cache::forget('things:all');
        return redirect()->route('thing.index');
    }

    public function show(Thing $thing)
    {
        Cache::put('thing:'.$thing->id, $thing);
        return view('thing.show',compact('thing'));
    }


    public function edit(Thing $thing)
    {
        $places = Place::all();
        $users = User::all();

        return view('thing.edit',compact('thing', 'places','users'));
    }


    public function update(Request $request, Thing $thing)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $thing->uses_->place_id = request('place');
        $thing->uses_->user_id = request('user');

        Cache::forget('things:all');
        Cache::forget('thing:'.$thing->id);
        $thing->update($request->all());

        return redirect()->route('thing.index');
    }


    public function destroy(Thing $thing)
    {
        Cache::forget('things:all');
        Cache::forget('thing:'.$thing->id);
        $thing->delete();

        return redirect()->route('thing.index')
            ->with('success','post deleted successfully');
    }


}
