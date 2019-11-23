@extends('layouts.app')

@section('content')
    <div class="text-center">
        
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h5>＊確認</h5>
            <div class="confirm">アカウントを削除すると、ログインができなくなり、データも全て削除されます。
                本当に削除してよろしいですか？</div>
            
                

                {!! Form::open(['route' => ['users.delete', $user->id], 'method' => 'delete']) !!}
                    <div class="info">{!! Form::submit('退会する', ['class' => 'btn btn-default btn-sm']) !!}</div>
                {!! Form::close() !!}
            
          

        </div>
    </div>
@endsection