@extends('layouts.app')

@section('content')




 @if($tapioca->photo)
       <img src="/storage/image/{{$tapioca->photo}}" width="250" height="250"></td> 
        
    @else
       <img src="/storage/image/sample-image.jpg" width="200" height="200"></td>
       
    @endif 
<table class="table table-striped"> 
     <tr>
        <th>店舗名</th>
        <td>{{ $tapioca->store_name }}</td>
    </tr>
    <tr>
        <th>商品名</th>
        <td>{{ $tapioca->item_name }}</td>
    </tr>
    <tr>
        <th>ドリンク味</th>
        <td>{{ $tapioca->drink_taste }}</td>
    </tr>
    <tr>
        <th>ドリンク　コメント</th>
        <td>{{ $tapioca->drink_comment}}</td>
    </tr>
    <tr>
        <th>大きさ</th>
        <td>{{ $tapioca->tapioca_size }}</td>
    </tr>
    <tr>
        <th>味</th>
        <td>{{ $tapioca->tapioca_taste }}</td>
    </tr>
    <tr>
        <th>量</th>
        <td>{{ $tapioca->tapioca_quantity }}</td>
    </tr>
    <tr>
        <th>タピオカ　コメント</th>
        <td>{{ $tapioca->tapioca_comment }}</td>
    </tr>
    
    @if(Auth::id() === $tapioca->user_id)
  
    <tr>
        <td>
            {!! Form::open(['route' => ['tapiocas.edit', $tapioca->id], 'method' => 'get']) !!}
                <div class="info">{!! Form::submit('編集', ['class' => 'btn btn-default btn-sm']) !!}</div>
            {!! Form::close() !!}
        </td>
        <td>
            {!! Form::open(['route' => ['tapiocas.destroy', $tapioca->id], 'method' => 'delete']) !!}
                <div class="info">{!! Form::submit('削除', ['class' => 'btn btn-default btn-sm']) !!}</div>
            {!! Form::close() !!}
        </td>
    </tr>
    
    @endif
    @if (Auth::id() != $tapioca->user_id)
    
    <tr>
        <td>
            @if (Auth::user()->is_favorite($tapioca->id))

            {!! Form::open(['route' => ['favorites.unfavorite', $tapioca->id], 'method' => 'delete']) !!}
                <div class="info">{!! Form::submit('お気に入りを外す', ['class' => "btn btn-default btn-sm"]) !!}</div>
            {!! Form::close() !!}
            @else
            {!! Form::open(['route' => ['favorites.favorite', $tapioca->id]]) !!}
                <div class="info">{!! Form::submit('お気に入りをする', ['class' => "btn btn-default btn-sm"]) !!}</div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endif

@endif
</table>

@endsection