@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h3>新規登録</h3>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード(確認)') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                <div class="info">{!! Form::submit('登録', ['class' => 'btn btn-default btn-sm']) !!}</div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
