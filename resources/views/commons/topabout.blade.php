<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>header</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    header.jumbotron {
      background: url({{ \Storage::disk('s3')->url("about2.jpeg") }});
      background-position: center center;
      background-size: cover;              
      width:100%;                              
      height:800px;            
      font-family: fangsong;
    }
    
    header .container {
      margin-top: 30px;
      background: rgba(255,255,255,0.5);
      padding: 180px;
      text-align: center;
    }
    
    header .midashi-btn {
      border: 1px solid #778899;
      color: black;
      border-radius: 0;
    }
    
    header .midashi-btn:hover {
      color: black;
      border-color: black;
    }
    
    .navbar-form {
      padding-right: 30px;
    }
    
    #nav-bar{
      font-family: monospace;
    }
    
    </style>
  </head>           
  <body>   
    <header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#778899;"> 
        <a class="navbar-brand" href="/">Tapilog</a>
        @if (Auth::check())
        <table>
        <tr>
	        {!! Form::open(['route' => ['tapiocas.search'],'method' => 'get']) !!}
                <td>{!! Form::select('category', ['' => 'カテゴリ選択してください', '黒糖' => '黒糖', 'ミルクティー' => 'ミルクティー','ティー' => 'ティー','フルーツティー' => 'フルーツティー','チーズフォーム' => 'チーズフォーム','スムージー' => 'スムージー'], null, ['class' => 'form-control']) !!}</td>
                <td><div class="info2">{!! Form::submit('検索',['class' => 'btn btn-default btn-sm']) !!}</div></td>
            {!! Form::close() !!}
        </tr>
    　　</table>
        @endif
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">{!! link_to_route('tapiocas.create','投稿する',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('tapiocas.mytapioca','投稿一覧') !!}</li>
                            <li class="dropdown-item">{!! link_to_route('users.favorites','お気に入り',['id' => Auth::id()]) !!}</li>
                            <li role="presentation" class="dropdown-header">▼ユーザー設定</li>
                           
                            <li class="dropdown-item"><a href="#">退会</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('about.get', 'tapilogについて', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('signup.get', '新規会員登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
       
    </nav>
    </header>
    <!-- ヘッダー部分 -->
    <header class="jumbotron">
      <div class="container">
        <h2>Tapilogとは？</h2>
        <p></p>
       
        @if (Auth::check())
        <p>{!! link_to_route('tapiocas.create','投稿する',[],['class'=>'btn btn-lg midashi-btn']) !!}</p>
        @else
        <p>{!! link_to_route('signup.get', '新規会員登録', [], ['class' =>'btn btn-lg midashi-btn']) !!}</p>
        <p>{!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg midashi-btn']) !!}</p>
        @endif
      </div>
    </header>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>