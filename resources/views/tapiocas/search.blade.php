@extends('layouts.app')

@section('content')

    <h1>タピオカ一覧</h1>
    
         @if(count($tapiocas)>0)
            <div class="info">
            @foreach($tapiocas as $tapioca)   
            
            <dl>
                <dd>{{ $tapioca->store_name }}</dd>
 
                <dd>{{ $tapioca->item_name }}</dd>
                   
                @if($tapioca->photo)
                <dd><img src="/storage/image/{{$tapioca->photo}}" width="200" height="200"></dd> 
                @else
                <dd><img src="/storage/image/sample-image.jpg" width="200" height="200"></dd>
                 @endif 
                    
                {!! Form::open(['route' => ['tapiocas.show', $tapioca->id], 'method' => 'get']) !!}
                    {!! Form::submit('詳細', ['class' => 'btn btn-default btn-sm']) !!}
                {!! Form::close() !!}
            </dl>
          
            @endforeach
        </div> 
        @else
            <p>検索結果はありません。</p>
        @endif

@endsection