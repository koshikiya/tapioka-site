@extends('layouts.app')

@section('content')
    
    <table class="table table-responsive">
    @if($tapioca->photo)
            <tr>
                <td><img src="{{$tapioca->photo}}" width="200" height="200"></td> 
            </tr>
        @else
            <tr>
                <td><img src="sample-image.jpg" width="200" height="200"></td>
            </tr>
    @endif 
    </table>
    <div class="table2">
    <table class="table table-responsive ">
         <tr>
            <td>店舗名</td>
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
            <td>{!! nl2br(e($tapioca->drink_comment)) !!}</td>
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
            <td>{!! nl2br(e($tapioca->tapioca_comment)) !!}</td>
        </tr>
        
        @if(Auth::id() === $tapioca->user_id)
            <tr>
                <td>
                    {!! Form::open(['route' => ['tapiocas.edit', $tapioca->id], 'method' => 'get']) !!}
                    <div class="info">{!! Form::submit('編集する', ['class' => 'btn btn-default btn-sm']) !!}</div>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['tapiocas.destroy', $tapioca->id], 'method' => 'delete']) !!}
                    <div class="info">{!! Form::submit('削除する', ['class' => 'btn btn-default btn-sm']) !!}</div>
                    {!! Form::close() !!}
                </td>
                <td>
                <div class="info"><button class="btn btn-default btn-sm" type="button" onclick="history.back()">戻る</button></div>
                </td>
            </tr>
        @endif
        @if (Auth::id() != $tapioca->user_id)
            
            @if (Auth::user()->is_favorite($tapioca->id))
                <tr>
                    <td>
                        {!! Form::open(['route' => ['favorites.unfavorite', $tapioca->id], 'method' => 'delete']) !!}
                            <div class="info">{!! Form::submit('お気に入りを外す', ['class' => "btn btn-default btn-sm"]) !!}</div>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        <div class="info"><button class="btn btn-default btn-sm" type="button" onclick="history.back()">戻る</button></div>
                    </td>
                </tr>
            @else
                <tr>
                    <td>
                        {!! Form::open(['route' => ['favorites.favorite', $tapioca->id]]) !!}
                            <div class="info">{!! Form::submit('お気に入りをする', ['class' => "btn btn-default btn-sm"]) !!}</div>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        <div class="info"><button class="btn btn-default btn-sm" type="button" onclick="history.back()">戻る</button></div>
                    </td>
                </tr>
            @endif
        @endif
    </table>
    </div>
@endsection