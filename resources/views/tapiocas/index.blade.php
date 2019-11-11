@extends('layouts.app2')


@section('content')

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
    @endif
   
    {{ $tapiocas->links('pagination::bootstrap-4') }}

@endsection

