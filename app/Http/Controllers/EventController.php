<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use  App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;




class EventController extends Controller
{
    public function index(Request $request)
    {
        $items = Event::orderBy('id','DESC')->paginate(5);
        return view('events.cat',['items' => $items] )
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
    public function insert(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'date'=> 'required',
            'lieu'=>'required',
            'description' => 'required',
            'photo' => 'required',

        ]);
        
        

        Event::create($request->all());

       return redirect()->route('events.cat')
          ->with('success','Item created successfully');;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Event::find($id);
        return view('events.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Event::find($id);
        return view('events.edit',compact('item'));
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
        $this->validate($request, [
            'nom' => 'required',
            'date'=> 'required',
            'lieu'=>'required',
            'description' => 'required'
        ]);


        Event::find($id)->update($request->all());

        return redirect()->route('events.cat')
                        ->with('success','Item updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return back()->with('success','Item deleted successfully');
    }

    public function search(Request $request)
    {
         $search=$request->get('search');
         $items=DB::table('events')->where('nom','like','%' .$search. '%')->paginate(5);
         return view('events.cat',['items'=>$items]);
    }


}
