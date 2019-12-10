@extends('layouts.app2')


@section('content')

    @if (Auth::check())
        @if(count($tapiocas)>0)
           <div class="info">
                @foreach($tapiocas as $tapioca)   
                <dl>
                    <dd>{{ $tapioca->store_name }}</dd>
     
                    <dd>{{ $tapioca->item_name }}</dd>
                       
                    <dd><img src="{{$tapioca->photo}}" width="200" height="200"></dd> 
                      
                    {!! Form::open(['route' => ['tapiocas.show', $tapioca->id], 'method' => 'get']) !!}
                        {!! Form::submit('詳細', ['class' => 'btn btn-default btn-sm']) !!}
                    {!! Form::close() !!}
                </dl>
                @endforeach
            </div>
        @else
            <p>投稿はありません。</p>
        @endif
       
        {{ $tapiocas->links('pagination::bootstrap-4') }}
      
    @else
        <div class="info">
               
            @foreach($tapiocas2 as $tapioca2)   
                <dl>
                    <dd>{{ $tapioca2->store_name }}</dd>
     
                    <dd>{{ $tapioca2->item_name }}</dd>
                       
                    <dd><img src="{{$tapioca2->photo}}" width="200" height="200"></dd> 
                    
                </dl>
             
            @endforeach
           
            <div id="container">
                <div id="main">
                  {!! link_to_route('login', 'もっと見る', [], ['class' => 'btn btn-lg midashi-btn']) !!}
                </div>
            </div>
            
        </div>
        @include('commons.topabout2')
    @endif 
 
@endsection

