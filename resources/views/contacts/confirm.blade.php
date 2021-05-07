@extends('layouts.contact-frame')

@section('main')
<div class="contacts-confirm">
    <h1>入力内容の確認</h1>
    <form method="post" action="{{route('contacts.store')}}">
        @csrf
        <div class="contacts-confirm-table">
            <table>
                <tbody>
                    <tr>
                        <th>お名前</th>
                        <td>{{$inputs['name']}}</td>
                        <input type="hidden" name="name" value="{{$inputs['name']}}">
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{$inputs['email']}}</td>
                        <input type="hidden" name="email" value="{{$inputs['email']}}">
                    </tr>
                    <tr>
                        <th>お問い合わせジャンル</th>
                        <td>{{$inputs['type']}}</td>
                        <input type="hidden" name="type" value="{{$inputs['type']}}">
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="contacts-confirm-content-title">お問い合わせ内容</div>
        <div class="contacts-confirm-content">
            <p>{{$inputs['content']}}</p>
            <input type="hidden" name="content" value="{{$inputs['content']}}">
        </div>
        <ul class="contacts-confirm-btn">
            <li><button onclick="history.back()">入力画面に戻る</button></li>
            <li><button name="action" type="submit" value="submit" onclick="return confirm('本当に送信してもよろしいですか？')">送信</button></li>
        </ul>
    </form>
</div>
@endsection
