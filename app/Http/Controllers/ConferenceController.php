<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Conference;
use Illuminate\Support\Facades\DB;

class ConferenceController extends Controller
{
      public function index(Request $request)
    {
        $items = Conference::orderBy('id','DESC')->paginate(5);
        return view('conferences.index',['items' => $items] )
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
   
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conferences.create');
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
            'id_event' => 'required',
            'nom' => 'required',
            'type' => 'required',
            'date'=> 'required',
            'description' => 'required',

        ]);


        Conference::create($request->all());

       return redirect()->route('conferences.index')
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
        $item = Conference::find($id);
        return view('conferences.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Conference::find($id);
        return view('conferences.edit',compact('item'));
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
        	'id_event' => 'required',
            'nom' => 'required',
            'type' => 'required',
            'date'=> 'required',
            'description' => 'required'
        ]);


        Conference::find($id)->update($request->all());

        return redirect()->route('conferences.index')
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
        Conference::find($id)->delete();
        return back()->with('success','Item deleted successfully');
    }

    public function search(Request $request)
    {
        $search=$request->get('search');
        $items=DB::table('conferences')->where('nom','like','%' .$search. '%')->paginate(5);
        return view('conferences.index',['items'=>$items]);
    }


}
