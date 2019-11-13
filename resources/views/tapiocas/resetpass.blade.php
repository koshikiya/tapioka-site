@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h4>本人確認のため現在のパスワードを入力してください。</h4>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'users.confirmpass']) !!}

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="info">{!! Form::submit('submit', ['class' => 'btn btn-default btn-sm']) !!}</div>
            {!! Form::close() !!}

           
        </div>
    </div>
@endsection