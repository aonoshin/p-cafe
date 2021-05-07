@extends('layouts.contact-frame')

@section('main')
<div class="contacts-create">
    <h1>PCafe お問い合わせ</h1>
    <div class="contacts-form">
        <form method="post" action="{{route('contacts.confirm')}}">
            @csrf
            <p>
                @if($errors->has('name'))
                    <span class="error">{{$errors->first('name')}}</span>
                @endif
            </p>
            <ul>
                <li><p>お名前</p></li>
                <li>
                    <input type="text" name="name" value="{{old('name')}}" placeholder="例）カフェ太郎" autofocus>
                </li>
            </ul>
            <p>
                @if($errors->has('email'))
                    <span class="error">{{$errors->first('email')}}</span>
                @endif
            </p>
            <ul>
                <li><p>メールアドレス</p></li>
                <li>
                    <input type="text" name="email" value="{{old('email')}}" placeholder="例）○○○○○@gmail.com">
                </li>
            </ul>
            <p>
                @if($errors->has('email'))
                    <span class="error">{{$errors->first('email')}}</span>
                @endif
            </p>
            <ul>
                <li><p>お問い合わせジャンル</p></li>
                <li>
                    <select name="type">
                        <option disabled selected value>選択してください</option>
                        <!-- @foreach(config('contactType.contactTypes') as $key => $value)
                            <option value="{{$key}}" @if(old('type', $contact->type) == $key) selected @endif">{{$value}}</option>
                        @endforeach -->
                        @foreach(config('contactType.contactTypes') as $contactType)
                            <option value="{{$contactType}}" @if(old('type', $contact->type) == $contactType) selected @endif">{{$contactType}}</option>
                        @endforeach
                    </select>
                </li>
            </ul>
            <p>
                @if($errors->has('content'))
                    <span class="error">{{$errors->first('content')}}</span>
                @endif
            </p>
            <ul>
                <li><p>お問い合わせ内容</p></li>
                <li>
                    <textarea name="content">{{old('content')}}</textarea>
                </li>
            </ul>
            <div class="contact-submit">
                <input type="submit" value="確認画面へ">
            </div>
        </form>
    </div>
    <p class="back-top">
        @if(Auth::User())
            <a href="{{route('home')}}">ホームに戻る</a>
        @else
            <a href="{{route('top')}}">トップに戻る</a>
        @endif
    </p>
</div>
@endsection
