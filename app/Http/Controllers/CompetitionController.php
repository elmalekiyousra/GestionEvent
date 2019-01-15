<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Competition;
use Illuminate\Support\Facades\DB;


class CompetitionController extends Controller
{
      public function index(Request $request)
    {
        $items = Competition::orderBy('id','DESC')->paginate(5);
        return view('competitions.index',['items' => $items] )
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
   
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('competitions.create');
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
            'type' => 'required',
            'date'=> 'required',
            'description' => 'required',

        ]);


        Competition::create($request->all());

       return redirect()->route('competitions.index')
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
        $item = Competition::find($id);
        return view('competitions.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Competition::find($id);
        return view('competitions.edit',compact('item'));
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
            'type' => 'required',
            'date'=> 'required',
            'description' => 'required'
        ]);


        Competition::find($id)->update($request->all());

        return redirect()->route('competitions.index')
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
        Competition::find($id)->delete();
        return back()->with('success','Item deleted successfully');
    }
    public function search(Request $request)
    {
        $search=$request->get('search');
        $items=DB::table('competitions')->where('type','like','%' .$search. '%')->paginate(5);
        return view('competitions.index',['items'=>$items]);
    }
}
