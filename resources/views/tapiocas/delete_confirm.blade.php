@extends('layouts.app')

@section('content')
  
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h5>＊確認</h5>
            <div class="confirm">退会すると、{{ $user->name }}さんのアカウントはログインができなくなり、データも全て削除されます。
                本当に退会しますか？</div>
                {!! Form::open(['route' => ['users.delete', $user->id], 'method' => 'delete']) !!}
                    <div class="info">{!! Form::submit('はい', ['class' => 'btn btn-default btn-sm']) !!}</div>
                {!! Form::close() !!}
                
                {!! Form::open(['route' => ['index'], 'method' => 'get']) !!}
                    <div class="info">{!! Form::submit('いいえ', ['class' => 'btn btn-default btn-sm']) !!}</div>
                {!! Form::close() !!}
        </div>
    </div>
@endsection