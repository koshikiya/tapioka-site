@extends('layouts.app')


@section('content')

    @if(count($tapiocas)>0)
       <div class="info">
            @foreach($tapiocas as $tapioca)   
                <dl>
                    <dd>{{ $tapioca->store_name }}</dd>
     
                    <dd>{{ $tapioca->item_name }}</dd>
                
                    <dd><img src="{{$tapioca->photo}}" width="200" height="200"></dd> 
                    
                    {!! Form::open(['route' => ['tapiocas.show', $tapioca->id], 'method' => 'get']) !!}
                        <div class="info">{!! Form::submit('詳細', ['class' => 'btn btn-default btn-sm']) !!}</div>
                    {!! Form::close() !!}
                </dl>
            @endforeach
        </div> 
    @else
        <p>投稿はありません。</p>
    @endif
    {{ $tapiocas->links('pagination::bootstrap-4') }}
@endsection

