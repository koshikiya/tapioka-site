@extends('layouts.app')

@section('content')

    <h1>タピオカ一覧</h1>
    
        @if(count($tapiocas)>0)
            <table class="table table-striped">
                 @foreach($tapiocas as $tapioca)   
                    <tr>
                        <th>店舗名</th>
                        <td>{{ $tapioca->store_name }}</td>
                    </tr>
                    <tr>
                        <th>商品名</th>
                        <td>{{ $tapioca->item_name }}</td>
                    </tr>
                   
                @if($tapioca->photo)
                    <tr>
                        <th>写真</th>
                        <td><img src="/storage/image/{{$tapioca->photo}}"></td> 
                    </tr>
                @else
                    <tr>
                        <td>イメージはありません</td>
                    </tr>
                 @endif 
                     <tr>
                         <td>
                         {!! Form::open(['route' => ['tapiocas.show', $tapioca->id], 'method' => 'get']) !!}
                             {!! Form::submit('詳細', ['class' => 'btn btn-primary btn-sm']) !!}
                         {!! Form::close() !!}
                         </td>
                     </tr>
                 @endforeach
            </table>
        @endif

@endsection