@extends('layouts.app')

@section('content')

    <div class="table">
        <dl>
            {!! Form::model($tapioca,['route'=>['tapiocas.update',$tapioca->id],"enctype"=>"multipart/form-data",'method'=>'put']) !!}            
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
                 {!! Form::select('drink_taste', ['' => '選択してください', '★' => '★', '★★' => '★★','★★★' => '★★★','★★★★' => '★★★★','★★★★★' => '★★★★★'], null, ['class' => 'form-control']) !!}
                </td>
            </th>
             <th>
                 <td>
                 {!! Form::label('drink_comment','ドリンク　コメント') !!}
                 {!! Form::textarea('drink_comment',null,['class' => 'form-control','size' => '30x5']) !!}
                </td>
            </th>
            <th>
                <td>
                {!! Form::label('tapioca_taste','タピオカ　味') !!}
                {!! Form::select('tapioca_taste', ['' => '選択してください', '1甘' => '1甘', '2甘' => '2甘','3甘' => '3甘','4甘' => '4甘','5甘' => '5甘'], null, ['class' => 'form-control']) !!}
                </td>
            </th>
            <th>
                <td>
                {!! Form::label('tapioca_size','大きさ') !!}
                {!! Form::select('tapioca_size', ['' => '選択してください', '小粒' => '小粒', '中粒' => '中粒','大粒' => '大粒'], null, ['class' => 'form-control']) !!}
                </td>
            </th>
            <th>
                <td>
                {!! Form::label('tapioca_quantity','量') !!}
                {!! Form::select('tapioca_quantity', ['' => '選択してください', '★' => '★', '★★' => '★★','★★★' => '★★★','★★★★' => '★★★★','★★★★★' => '★★★★★'], null, ['class' => 'form-control']) !!}
                </td>
            </th>
            <th>
                <td>
                {!! Form::label('tapioca_comment','タピオカ　コメント') !!}
                {!! Form::textarea('tapioca_comment',null,['class' => 'form-control','size' => '30x5']) !!}
                </td>
            </th>
            <th>
                <td>
                {!! Form::label('category','カテゴリ') !!}
                {!! Form::select('category', ['' => '選択してください', '黒糖' => '黒糖', 'ミルクティー' => 'ミルクティー','ティー' => 'ティー','フルーツティー' => 'フルーツティー','チーズフォーム' => 'チーズフォーム','スムージー' => 'スムージー'], null, ['class' => 'form-control']) !!}
                </td>
            </th>
            <div class="file">
                {!! Form::label('file-test','画像アップロード',['id' =>'file-test-label']) !!}
                {!! Form::file('photo',['id' =>'file-test']) !!}
                {!! Form::text('file-test','null',['id' =>'file-test-name','disabled' => '']) !!}
            </div>
            <div class ="info">
                {!! Form::submit('更新', ['class' => 'btn btn-default btn-sm']) !!}
            </div>            
            {!! Form::close() !!}
        </dl>
    </div>
@endsection