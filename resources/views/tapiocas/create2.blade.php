@extends('layouts.app')

@section('content')




<div class="box17">
  {!! Form::model($tapioca, ['route'=>'tapiocas.store',"enctype"=>"multipart/form-data"]) !!}
  

    <span class="item-name">{!! Form::label('store_name','店舗名') !!}</span>
    <div class="text-wrap">
    {!! Form::text('store_name',null,['class' => '']) !!}
    </div>
    
    <span class="item-name">{!! Form::label('item_name','商品名') !!}</span>
    <div class="text-wrap">
    {!! Form::text('item_name',null,['class' => '']) !!}
    </div>
    
    <span class="item-name">{!! Form::label('drink_taste','ドリンク 味') !!}</span>
    <div class="select-wrap">
    {{ Form::select('drink_taste', ['' => '選択してください', '★' => '★', '★★' => '★★','★★★' => '★★★','★★★★' => '★★★★','★★★★★' => '★★★★★'], null, ['class' => '']) }}
    </div>
    
    <span class="item-name">{!! Form::label('drink_comment','ドリンク コメント') !!}</span>
    <div class="text-wrap">
    {!! Form::text('drink_comment',null,['class' => '']) !!}
    </div>
    
    <span class="item-name">{!! Form::label('tapioca_taste','タピオカ 味') !!}</span>
    <div class="text-wrap">
    {{ Form::select('tapioca_taste', ['' => '選択してください', '1甘' => '1甘', '2甘' => '2甘','3甘' => '3甘','4甘' => '4甘','5甘' => '5甘'], null, ['class' => '']) }}
    </div>
    
    <span class="item-name">{!! Form::label('tapioca_size','タピオカ 大きさ') !!}</span>
    <div class="select-wrap">
    {{ Form::select('tapioca_size', ['' => '選択してください', '小粒' => '小粒', '中粒' => '中粒','大粒' => '大粒'], null, ['class' => '']) }}
    </div>
    
    <span class="item-name">{!! Form::label('tapioca_quantity','タピオカ 量') !!}</span>
    <div class="select-wrap">
    {{ Form::select('tapioca_quantity', ['' => '選択してください', '★' => '★', '★★' => '★★','★★★' => '★★★','★★★★' => '★★★★','★★★★★' => '★★★★★'], null, ['class' => '']) }}
    </div>
    
    <span class="item-name">{!! Form::label('tapioca_comment','タピオカ コメント') !!}</span>
    <div class="text-wrap">
    {!! Form::text('tapioca_comment',null,['class' => '']) !!}
    </div>
    
    <span class="item-name">{!! Form::label('category','カテゴリ') !!}</span>
    <div class="select-wrap">
    {{ Form::select('category', ['' => '選択してください', '黒糖' => '黒糖', 'ミルクティー' => 'ミルクティー','ティー' => 'ティー','フルーツティー' => 'フルーツティー','チーズフォーム' => 'チーズフォーム','スムージー' => 'スムージー'], null, ['class' => '']) }}
    </div>
    
    <div class="file">
    {!! Form::label('photo', '画像アップロード',['id' => 'file-test-label']) !!}
    {!! Form::file('photo',['id' =>'file-test']) !!}
    <input type="text" id="file-test-name" disabled>
    </div>
    
    <div class="submit-wrap">
  　{!! Form::submit('投稿', ['class' => 'btn btn-default btn-sm']) !!}
　　</div>
　　
　{!! Form::close() !!}
    
   </div>
  
@endsection