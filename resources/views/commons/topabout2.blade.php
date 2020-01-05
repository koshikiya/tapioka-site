<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>about</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    .jumbotron1 {
      background: url({{ \Storage::disk('s3')->url("about2.jpeg") }});
      background-position: center center;
      background-size: cover;              
      width:100%;                              
      height:600px;            
      font-family: fangsong;
      margin-bottom: 30px;
    }
    
    .container1 {
      margin-top: 30px;
      background: rgba(255,255,255,0.5);
      height: 630px;
      text-align: center;
      padding-top: 50px;
    }
    
    .midashi-btn {
      border: 1px solid #778899;
      color: black;
      border-radius: 0;
    }
    
    .midashi-btn:hover {
      color: black;
      border-color: black;
    }
    
   
    .message{
      font-size: 18px;
      margin-bottom: 40px;
      letter-spacing: 4px;
    }
    h3{
      margin-bottom: 40px;
      margin-top: 40px;
    }
    
    </style>
  </head>           
  <body>   
   
    <!-- ヘッダー部分 -->
    <div class="jumbotron1">
      <div class="container1">
        <h3>Tapilogとは？</h3>
        <p class="message">投稿ボタン一つでタピオカを<br>手軽に記録し楽しめる文化を広めたいという思いと、<br>
          日常の中で毎日の幸せをシェアできる時間を目指して<br>
          「Tapilog」は誕生しました。<br>
          あなたもお気に入りの一杯を記録しませんか？</p>
        
        @if (Auth::check())
          <p>{!! link_to_route('tapiocas.create','投稿する',[],['class'=>'btn btn-lg midashi-btn']) !!}</p>
        @else
          <p>{!! link_to_route('signup.get', 'はじめる', [], ['class' =>'btn btn-lg midashi-btn']) !!}</p>
        @endif
      </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>