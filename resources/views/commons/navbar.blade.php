<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#778899;"> 
        <a class="navbar-brand" href="/">Tapioca-site</a>
        <table>
        <tr>
	        {!! Form::open(['route' => ['tapiocas.search'],'method' => 'get']) !!}
                <td>{!! Form::select('category', ['' => 'カテゴリ選択してください', '黒糖' => '黒糖', 'ミルクティー' => 'ミルクティー','ティー' => 'ティー','フルーツティー' => 'フルーツティー','チーズフォーム' => 'チーズフォーム','スムージー' => 'スムージー'], null, ['class' => 'form-control']) !!}</td>
                <td><div class="info2">{!! Form::submit('検索',['class' => 'btn btn-default btn-sm']) !!}</div></td>
            {!! Form::close() !!}
        </tr>
    　　</table>
        
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
                            <li class="dropdown-item"><a href="#">パスワード再設定</a></li>
                            <li class="dropdown-item"><a href="#">退会</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '新規会員登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
    
</header>