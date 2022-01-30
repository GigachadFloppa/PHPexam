<?php

namespace App\Http\Controllers;

use App\Events\EventPublicThing;
use App\Jobs\MailSend;
use App\Mail\OrderShipped;
use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use App\Models\Uses;
use App\Notifications\NewThing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;


class ThingController extends Controller
{
    protected $table = 'thing';

//Admin part

    public function index()
    {
        $things = Thing::all();

        return view('thing.index', compact('things'));
    }

    /**
     * Выводит форму для создания нового ресурса
     *
     * @return \Illuminate\Http\Response
     */
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
        $uses->amount = 10;
        $uses->save();

        $user = User::where('id', '==', auth()->user()->id)->get();
      //  $testMail = new OrderShipped('На вас назначена новая вещь'.$thing->name);
       // Mail::send($testMail);
        return redirect()->route('thing.index');
    }

    public function show(Thing $thing)
    {
        return view('thing.show',compact('thing'));
    }

    /**
     * Выводит форму для редактирования указанного ресурса
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
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


        $thing->update($request->all());

        return redirect()->route('thing.index');
    }


    public function destroy(Thing $thing)
    {
        $thing->delete();

        return redirect()->route('thing.index')
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
