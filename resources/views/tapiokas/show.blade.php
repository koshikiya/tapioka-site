@extends('layouts.app')

@section('content')

    
<table class="table table-striped">
     <tr>
        <th>店舗名</th>
        <td>{{ $tapioka->store_name }}</td>
    </tr>
    <tr>
        <th>商品名</th>
        <td>{{ $tapioka->item_name }}</td>
    </tr>
    <tr>
        <th>ドリンク味</th>
        <td>{{ $tapioka->drink_taste }}</td>
    </tr>
    <tr>
        <th>ドリンク　コメント</th>
        <td>{{ $tapioka->drink_comment}}</td>
    </tr>
    <tr>
        <th>大きさ</th>
        <td>{{ $tapioka->tapioka_size }}</td>
    </tr>
    <tr>
        <th>味</th>
        <td>{{ $tapioka->tapioka_taste }}</td>
    </tr>
    <tr>
        <th>量</th>
        <td>{{ $tapioka->tapioka_quantity }}</td>
    </tr>
    <tr>
        <th>タピオカ　コメント</th>
        <td>{{ $tapioka->tapioka_comment }}</td>
    </tr>
    @if($tapioka->photo == null)
    <tr>
        <th>写真</th>
        <td>イメージはありません</td>
    </tr>
    @else
    <tr>
        <th>写真</th>
        <td>{{$tapioka->photo}}</td>
    </tr>
    @endif
    @if(Auth::id() === $tapioka->user_id)
    <tr>
        <td>
            {!! Form::open(['route' => ['tapiokas.edit', $tapioka->id], 'method' => 'get']) !!}
                {!! Form::submit('編集', ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
        </td>
        <td>
            {!! Form::open(['route' => ['tapiokas.destroy', $tapioka->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endif
    @if (Auth::id() != $tapioka->user_id)
    <tr>
        <td>
            @if (Auth::user()->is_favorite($tapioka->id))

            {!! Form::open(['route' => ['favorites.unfavorite', $tapioka->id], 'method' => 'delete']) !!}
                {!! Form::submit('お気に入りを外す', ['class' => "button btn btn-warning"]) !!}
            {!! Form::close() !!}
            @else
            {!! Form::open(['route' => ['favorites.favorite', $tapioka->id]]) !!}
                {!! Form::submit('お気に入りをする', ['class' => "button btn btn-success"]) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endif

@endif
</table>

@endsection