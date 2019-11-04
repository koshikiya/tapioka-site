<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tapioka;

class TapiokasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tapiokas = Tapioka::all();
        
        return view('tapiokas.index',['tapiokas'=>$tapiokas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tapioka = new Tapioka;
        
        return view('tapiokas.create',['tapioka'=>$tapioka]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->tapiokas()->create([
            'store_name'=>$request->store_name,'item_name'=>$request->item_name,
            'drink_taste'=>$request->drink_taste,'drink_comment'=>$request->drink_comment,
            'tapioka_taste'=>$request->tapioka_taste,'tapioka_size'=>$request->tapioka_size,
            'tapioka_quantity'=>$request->tapioka_quantity,'tapioka_comment'=>$request->tapioka_comment,
            'category'=>$request->category
            ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tapioka =Tapioka::find($id);
        
        
        return view('tapiokas.show',[
            'tapioka' => $tapioka,
            ]);
        
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tapioka= Tapioka::find($id);
        
        return view('tapiokas.edit',['tapioka' => $tapioka]);
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
        $tapioka =Tapioka::find($id);
        
        if(\Auth::id() === $tapioka->user_id){
            $tapioka->store_name = $request->store_name;
            $tapioka->item_name = $request->item_name;
            $tapioka->drink_taste = $request->drink_taste;
            $tapioka->drink_comment = $request->drink_comment;
            $tapioka->tapioka_taste = $request->tapioka_taste;
            $tapioka->tapioka_size = $request->tapioka_size;
            $tapioka->tapioka_quantity = $request->tapioka_quantity;
            $tapioka->tapioka_comment = $request->tapioka_comment;
            $tapioka->photo = $request->photo;
            $tapioka->category = $request->category;
            $tapioka->save();
        }
         return redirect('/');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tapioka = Tapioka::find($id);
        
        if(\Auth::id() === $tapioka->user_id){
            $tapioka->delete();
        }
        return redirect('/');
    }
    
    public function mytapioka(){
        
        $data = [];
        $user = \Auth::user();
        $tapiokas = $user->tapiokas()->get();
        $data =[
                'user'=> $user,
                'tapiokas'=> $tapiokas,
                ];
        return view('tapiokas.mytapioka',$data);
    }
    
    public function search(Request $request){
        
        $tapiokas = Tapioka::where('category', $request->category)-> get();
        return view('tapiokas.search', ['tapiokas' => $tapiokas]) ;
        
    }
}
