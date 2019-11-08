<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tapioca;
use Intervention\Image\ImageManagerStatic as Image;

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
        $this->validate($request,[
            'store_name' =>'required|max:191',
            'item_name' =>'required|max:191',
            'drink_taste' =>'required',
            'drink_comment' =>'required',
            'tapioca_taste' =>'required',
            'tapioca_size' =>'required',
            'tapioca_quantity' =>'required',
            'tapioca_comment' => 'required',
            'photo'=>'image|mimes:jpeg,png,jpg,gif|max:1024',
            'category' =>'required',
        ]);
        if($request->hasFile('photo')){
             $tapioca =new Tapioca;
             $name = $request->file('photo')->getClientOriginalName();
             $filename = $request->file('photo')->storeAs('public/image', $name);
             $tapioca->photo = basename($filename);
             }else{
                 $tapioca =new Tapioca;
                 $tapioca->photo = $request->photo;
        }
        $request->user()->tapiocas()->create([
            'store_name'=>$request->store_name,'item_name'=>$request->item_name,
            'drink_taste'=>$request->drink_taste,'drink_comment'=>$request->drink_comment,
            'tapioca_taste'=>$request->tapioca_taste,'tapioca_size'=>$request->tapioca_size,
            'tapioca_quantity'=>$request->tapioca_quantity,'tapioca_comment'=>$request->tapioca_comment,
            'category'=>$request->category,'photo'=>$tapioca->photo 
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
        if (\Auth::id() === $tapioca->user_id){
        
        return view('tapiocas.edit',['tapioca' => $tapioca]);
        }
        return redirect('/');
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
            'store_name' =>'required|max:191',
            'item_name' =>'required|max:191',
            'drink_taste' =>'required',
            'drink_comment' =>'required',
            'tapioca_taste' =>'required',
            'tapioca_size' =>'required',
            'tapioca_quantity' =>'required',
            'tapioca_comment' => 'required',
            'photo'=>'image|mimes:jpeg,png,jpg,gif|max:1024',
            'category' =>'required',
        ]);
        $tapioca =Tapioca::find($id);
        if($request->hasFile('photo')){
            
            \Storage::disk('local')->delete('public/image/'.$tapioca->photo);
             $name = $request->file('photo')->getClientOriginalName();
             $filename = $request->file('photo')->storeAs('public/image', $name);
             $tapioca->photo = basename($filename);
             
        }
                
        $tapioca->store_name = $request->store_name;
        $tapioca->item_name = $request->item_name;
        $tapioca->drink_taste = $request->drink_taste;
        $tapioca->drink_comment = $request->drink_comment;
        $tapioca->tapioca_taste = $request->tapioca_taste;
        $tapioca->tapioca_size = $request->tapioca_size;
        $tapioca->tapioca_quantity = $request->tapioca_quantity;
        $tapioca->tapioca_comment = $request->tapioca_comment;
        $tapioca->photo = $tapioca->photo;
        $tapioca->category = $request->category;
        $tapioca->save();
        
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
            \Storage::disk('local')->delete('public/image/'.$tapioca->photo);
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
