<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $events = Event::sortable()->paginate(10);
        return view('events.index')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description'  => 'required',
            'date'  => 'required',
            'pic'  => 'required',
            'venue'  => 'required',
            'type'  => 'required'
        ]);

        $event = new Event;
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        $event->pic = $request->input('pic');
        $event->organiser = auth()->user()->name;
        $event->venue = $request->input('venue');
        $event->type = $request->input('type');
        $event->user_id = auth()->user()->id;
        $event->save();

        return redirect('/events')->with('success', 'Event Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event =  Event::find($id);
        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event =  Event::find($id);
        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description'  => 'required',
            'date'  => 'required',
            'pic'  => 'required',
            'venue'  => 'required',
            'type'  => 'required'
        ]);

        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        $event->pic = $request->input('pic');
        $event->organiser = auth()->user()->name;
        $event->venue = $request->input('venue');
        $event->type = $request->input('type');
        $event->user_id = auth()->user()->id;;
        $event->save();

        return redirect('/events')->with('success', 'Event Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if(auth::user()->id == $event->user_id){
            return redirect('/events')->with('error','Unauthorized');
    }
        $event->delete();
        return redirect('/events')->with('success', 'Event Deleted');
    }
}
