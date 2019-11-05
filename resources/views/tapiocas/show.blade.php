@extends('layouts.app')

@section('content')

    
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
    @if($tapioca->photo == null)
    <tr>
        <th>写真</th>
        <td>イメージはありません</td>
    </tr>
    @else
    <tr>
        <th>写真</th>
        <td>{{$tapioca->photo}}</td>
    </tr>
    @endif
    @if(Auth::id() === $tapioca->user_id)
    <tr>
        <td>
            {!! Form::open(['route' => ['tapiocas.edit', $tapioca->id], 'method' => 'get']) !!}
                {!! Form::submit('編集', ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
        </td>
        <td>
            {!! Form::open(['route' => ['tapiocas.destroy', $tapioca->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endif
    @if (Auth::id() != $tapioca->user_id)
    <tr>
        <td>
            @if (Auth::user()->is_favorite($tapioca->id))

            {!! Form::open(['route' => ['favorites.unfavorite', $tapioca->id], 'method' => 'delete']) !!}
                {!! Form::submit('お気に入りを外す', ['class' => "button btn btn-warning"]) !!}
            {!! Form::close() !!}
            @else
            {!! Form::open(['route' => ['favorites.favorite', $tapioca->id]]) !!}
                {!! Form::submit('お気に入りをする', ['class' => "button btn btn-success"]) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endif

@endif
</table>

@endsection