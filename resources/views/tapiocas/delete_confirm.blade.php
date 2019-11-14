@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p>アカウントを削除すると、ログインができなくなり、データも全て削除されます。</p>
            <p>本当に削除してよろしいですか？</p>
        </div>
    </div>
    <div class="col-md-2 col-md-offset-5">
        {!! Form::open(['route' => ['users.delete', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-block']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-2 col-md-offset-5 spacer">
        
    </div>
@endsection