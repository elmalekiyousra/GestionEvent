<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Soiree;
use Illuminate\Support\Facades\DB;

class SoireeController extends Controller
{
       public function index(Request $request)
    {
        $items = Soiree::orderBy('id','DESC')->paginate(5);
        return view('soirees.index',['items' => $items] )
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
   
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soirees.create');
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


        Soiree::create($request->all());

       return redirect()->route('soirees.index')
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
        $item = Soiree::find($id);
        return view('soirees.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Soiree::find($id);
        return view('soirees.edit',compact('item'));
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


        Soiree::find($id)->update($request->all());

        return redirect()->route('soirees.index')
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
        Soiree::find($id)->delete();
        return back()->with('success','Item deleted successfully');
    }


    public function search(Request $request)
    {
        $search=$request->get('search');
        $items=DB::table('soirees')->where('type','like','%' .$search. '%')->paginate(5);
        return view('soirees.index',['items'=>$items]);
    }
}
