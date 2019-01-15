<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Programme;

use  App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProgrammeController extends Controller
{
         public function index(Request $request)
    {
        $items = Programme::orderBy('id','DESC')->paginate(5);
        return view('programmes.index',['items' => $items] )
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
   
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programmes.create');
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
            'description' => 'required',
            'photo'  => 'required|image|mimes:jpg,png,gif|max:2048'

        ]);


     $image = $request->file('select_file');

     $new_name = rand() . '.' . $image->getClientOriginalExtension();

     $image->move(public_path('images'), $new_name);




        Programme::create($request->all());

       return redirect()->route('programmes.index')
          ->with('success','Item created successfully')->with('path', $new_name);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Programme::find($id);
        return view('programmes.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Programme::find($id);
        return view('programmes.edit',compact('item'));
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
            'description' => 'required'
        ]);


        Programme::find($id)->update($request->all());

        return redirect()->route('programmes.index')
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
        Programme::find($id)->delete();
        return back()->with('success','Item deleted successfully');
    }

    public function search(Request $request)
    {
        $search=$request->get('search');
        $items=DB::table('programmes')->where('id_event','like','%' .$search. '%')->paginate(5);
        return view('programmes.index',['items'=>$items]);
    }



}
