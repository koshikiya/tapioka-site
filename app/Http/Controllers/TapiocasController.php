<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tapioca;

class TapiocasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tapiocas = Tapioca::all();
        
        return view('tapiocas.index',['tapiocas'=>$tapiocas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tapioca = new Tapioca;
        
        return view('tapiocas.create',['tapioca'=>$tapioca]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->tapiocas()->create([
            'store_name'=>$request->store_name,'item_name'=>$request->item_name,
            'drink_taste'=>$request->drink_taste,'drink_comment'=>$request->drink_comment,
            'tapioca_taste'=>$request->tapioca_taste,'tapioca_size'=>$request->tapioca_size,
            'tapioca_quantity'=>$request->tapioca_quantity,'tapioca_comment'=>$request->tapioca_comment,
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
        $tapioca =Tapioca::find($id);
        
        
        return view('tapiocas.show',[
            'tapioca' => $tapioca,
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
        $tapioca= Tapioca::find($id);
        
        return view('tapiocas.edit',['tapioca' => $tapioca]);
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
        $tapioca =Tapioca::find($id);
        
        if(\Auth::id() === $tapioca->user_id){
            $tapioca->store_name = $request->store_name;
            $tapioca->item_name = $request->item_name;
            $tapioca->drink_taste = $request->drink_taste;
            $tapioca->drink_comment = $request->drink_comment;
            $tapioca->tapioca_taste = $request->tapioca_taste;
            $tapioca->tapioca_size = $request->tapioca_size;
            $tapioca->tapioca_quantity = $request->tapioca_quantity;
            $tapioca->tapioca_comment = $request->tapioca_comment;
            $tapioca->photo = $request->photo;
            $tapioca->category = $request->category;
            $tapioca->save();
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
        $tapioca = Tapioca::find($id);
        
        if(\Auth::id() === $tapioca->user_id){
            $tapioca->delete();
        }
        return redirect('/');
    }
    
    public function mytapioca(){
        
        $data = [];
        $user = \Auth::user();
        $tapiocas = $user->tapiocas()->get();
        $data =[
                'user'=> $user,
                'tapiocas'=> $tapiocas,
                ];
        return view('tapiocas.mytapioca',$data);
    }
    
    public function search(Request $request){
        
        $tapiocas = Tapioca::where('category', $request->category)-> get();
        return view('tapiocas.search', ['tapiocas' => $tapiocas]) ;
        
    }
}
