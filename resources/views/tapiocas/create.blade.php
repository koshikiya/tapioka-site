@extends('layouts.app')

@section('content')

    <h1>新規投稿</h1>
    
        <div class="row">
            <div class="col-6">
                {!! Form::model($tapioca, ['route'=>'tapiocas.store',"enctype"=>"multipart/form-data"]) !!}
                    
                    <div class="form-group">
                    <th>
                        <td>
                        {!! Form::label('store_name','店舗名') !!}
                        {!! Form::text('store_name',null,['class' => 'form-control']) !!}
                        </td>
                    </th>
                    <th>
                        <td>
                        {!! Form::label('item_name','商品名') !!}
                        {!! Form::text('item_name',null,['class' => 'form-control']) !!}
                        </td>
                    </th>
                    <th>
                        <td>
                        {!! Form::label('drink_taste','ドリンク　味') !!}
                        {{ Form::select('drink_taste', ['' => '選択してください', '★' => '★', '★★' => '★★','★★★' => '★★★','★★★★' => '★★★★','★★★★★' => '★★★★★'], null, ['class' => 'form-control']) }}
                        </td>
                    </th>
                    <th>
                        <td>
                        {!! Form::label('drink_comment','ドリンク　コメント') !!}
                        {!! Form::text('drink_comment',null,['class' => 'form-control']) !!}
                        </td>
                    </th>
                    <th>
                        <td>
                        {!! Form::label('tapioca_taste','タピオカ　味') !!}
                        {{ Form::select('tapioca_taste', ['' => '選択してください', '1甘' => '1甘', '2甘' => '2甘','3甘' => '3甘','4甘' => '4甘','5甘' => '5甘'], null, ['class' => 'form-control']) }}
                        </td>
                    </th>
                    <th>
                        <td>
                        {!! Form::label('tapioca_size','大きさ') !!}
                        {{ Form::select('tapioca_size', ['' => '選択してください', '小粒' => '小粒', '中粒' => '中粒','大粒' => '大粒'], null, ['class' => 'form-control']) }}
                        </td>
                    </th>
                    <th>
                        <td>
                        {!! Form::label('tapioca_quantity','量') !!}
                        {{ Form::select('tapioca_quantity', ['' => '選択してください', '★' => '★', '★★' => '★★','★★★' => '★★★','★★★★' => '★★★★','★★★★★' => '★★★★★'], null, ['class' => 'form-control']) }}
                        </td>
                    </th>
                    <th>
                        <td>
                        {!! Form::label('tapioca_comment','タピオカ　コメント') !!}
                        {!! Form::text('tapioca_comment',null,['class' => 'form-control']) !!}
                        </td>
                    </th>
                    <th>
                        <td>
                        {!! Form::label('category','カテゴリー') !!}
                        {{ Form::select('category', ['' => '選択してください', '黒糖' => '黒糖', 'ミルクティー' => 'ミルクティー','ティー' => 'ティー','フルーツティー' => 'フルーツティー','チーズフォーム' => 'チーズフォーム','スムージー' => 'スムージー'], null, ['class' => 'form-control']) }}
                        </td>
                    </th>
                    <th>
                        <td>
                        {!! Form::label('photo', '画像アップロード:') !!}
                        {!! Form::file('photo') !!}
                        </td>
                    </th>
                    </div>
                    
                    {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                    
                {!! Form::close() !!}
            </div>
        </div>

@endsection