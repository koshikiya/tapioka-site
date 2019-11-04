@extends('layouts.app')

@section('content')

    <h1>タピオカ一覧</h1>
    
        @if(count($tapiokas)>0)
            <table class="table table-striped">
                 @foreach($tapiokas as $tapioka)   
                    <tr>
                        <th>店舗名</th>
                        <td>{{ $tapioka->store_name }}</td>
                    </tr>
                    <tr>
                        <th>商品名</th>
                        <td>{{ $tapioka->item_name }}</td>
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
                     <tr>
                         <td>
                         {!! Form::open(['route' => ['tapiokas.show', $tapioka->id], 'method' => 'get']) !!}
                             {!! Form::submit('詳細', ['class' => 'btn btn-primary btn-sm']) !!}
                         {!! Form::close() !!}
                         </td>
                     </tr>
                 @endforeach
            </table>
        @endif

@endsection