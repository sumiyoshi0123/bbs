<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掲示板</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
    <header>
        <h1 class="header-item">掲示板</h1>
        @if(session('message'))
        <div class="alert-success">
            {{session('message')}}
        </div>
        @endif
    </header>

    <main>
        <form class="create__form" action="/posts" method="POST">
        @csrf
            <div class="form__item-name">
                <span class="form__item-label">名前：</span>
                <input class="form__item" type="text" name="name" placeholder="名前を入力">
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="form__item-title">
                <span class="form__item_label">件名：</span>
                <input class="form__item" type="text" name="title" placeholder="件名を入力">
            </div>
            <div class="form__error">
                @error('title')
                {{ $message }}
                @enderror
            </div>
            <div class="form__item-content">
                <div class="form__item-label">本文：</div>
                <textarea class="form__item" name="content" rows="5" placeholder="本文を入力"></textarea>
            </div>
            <div class="form__error">
                @error('content')
                {{ $message }}
                @enderror
            </div>
            <input class="form__item-submit" type="submit" value="投稿する">
        </form>
        <form class="search__form" action="/posts" method="get">
        @csrf
            <div class="search__form-item">
                <span class="search__name">投稿者検索：</span>
                <input type="text" name="keyword" value="{{ old('$keyword') }}">
            </div>
            <div class="serach__form-button">
                <button class="search__button-submit">検索</button>
            </div>
            <div class="reset__butonn">
                <a href="/">リセット</a>
            </div>
        </form>

        <div class="form__data">
        @foreach($posts as $post)
            <div class="form__data-item">
                <div class="form__data-name">{{$post->name}}さん</div>
                <div class="form__data-date">投稿日:{{$post->created_at}}</div>
                <div class="form__data-title">{{$post->title}}</div>
                <div class="form__data-content">{{$post->content}}</div>
            </div>
        @endforeach
        </div>
    </main>
</body>
</html>