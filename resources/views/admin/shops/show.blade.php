@extends('layouts.admin')

@section('admin-title', 'カフェ登録')

@section('main')
<ul class="back-admin-top">
    <li><a href="{{route('admin.top')}}">管理画面トップへ</a></li>
    <li><a href="{{route('admin.shops.index')}}">カフェ一覧へ</a></li>
</ul>
<div class="admin-box-shops-show">
    <div class="admin-shops-name">
        <h1>【{{$shop->name}}】</h1>
        <p>＠&nbsp;{{$shop->area->name}}</p>
    </div>
    <div class="admin-shops-img">
        @if($shop->image == null)
            <img src="/storage/no-icon.png">
        @else
            <img src="{{$shop->image}}">
        @endif
    </div>
    @if($shop->url !== null)
        <a class="admin-shops-show-url" target="_blank" href="{{$shop->url}}">公式ホームページ</a>
    @endif
    <div class="admin-shops-show-icon">
        <ul>
            @if($shop->wifi === 0)
                <li><i class="fas fa-wifi"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-wifi"></i></li>
            @endif
            @if($shop->outlet === 0)
                <li><i class="fas fa-battery-full"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-battery-full"></i></li>
            @endif
            @if($shop->credit === 0)
                <li><i class="far fa-credit-card"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-credit-card"></i></li>
            @endif
            @if($shop->smoke === 0)
                <li><i class="fas fa-smoking-ban"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-smoking-ban"></i></li>
            @endif
            @if($shop->pet === 0)
                <li><i class="fas fa-dog"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-dog"></i></li>
            @endif
            @if($shop->liquor === 0)
                <li><i class="fas fa-glass-martini-alt"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-glass-martini-alt"></i></li>
            @endif
        </ul>
    </div>
    <div class="admin-shops-show-data">
        <div class="data-title">
            <p>フードの充実度</p>
            <ul>
                @foreach(range(1, $shop->cuisine) as $star)
                    <li><i class="fas fa-star"></i></li>
                @endforeach
                @foreach(\Illuminate\Support\Collection::times(5 - $shop->cuisine) as $unstar)
                    <li class="unstar"><i class="fas fa-star"></i></li>
                @endforeach
            </ul>
        </div>
        <div class="data-title">
            <p>コーヒーへのこだわり</p>
            <ul>
                @foreach(range(1, $shop->coffee) as $star)
                    <li><i class="fas fa-star"></i></li>
                @endforeach
                @foreach(\Illuminate\Support\Collection::times(5 - $shop->coffee) as $unstar)
                    <li class="unstar"><i class="fas fa-star"></i></li>
                @endforeach
            </ul>
        </div>
        <div class="data-title">
            <p>静かさ</p>
            <ul>
                @foreach(range(1, $shop->voice) as $star)
                    <li><i class="fas fa-star"></i></li>
                @endforeach
                @foreach(\Illuminate\Support\Collection::times(5 - $shop->voice) as $unstar)
                    <li class="unstar"><i class="fas fa-star"></i></li>
                @endforeach
            </ul>
        </div>
        <div class="data-title">
            <p>席数</p>
            <ul>
                @foreach(range(1, $shop->capacity) as $star)
                    <li><i class="fas fa-star"></i></li>
                @endforeach
                @foreach(\Illuminate\Support\Collection::times(5 - $shop->capacity) as $unstar)
                    <li class="unstar"><i class="fas fa-star"></i></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="admin-shops-show-table">
        <table>
            <tbody>
                <tr>
                    <th><p>住所</p></th>
                    <td>{{$shop->address}}</td>
                </tr>
                <tr>
                    <th><p>電話番号</p></th>
                    @if($shop->tel == null)
                        <td class="center">ー</td>
                    @else
                        <td><a class="under-link" href="tel:{{$shop->tel}}">{{$shop->tel}}</a></td>
                    @endif
                </tr>
                <tr>
                    <th><p>営業時間</p></th>
                    <td>{{substr($shop->start_time, 0, 5)}}&nbsp;〜&nbsp;{{substr($shop->end_time, 0, 5)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="admin-shops-show-content">
        <p>{{$shop->content}}</p>
    </div>
    @if($shop->caution !== null)
        <div class="admin-shops-show-caution">
            <h2>注意事項</h2>
            <p>{{$shop->caution}}</p>
        </div>
    @endif
    <ul class="admin-shops-show-btn">
        <li><a href="{{route('admin.shops.edit', ['shop' => $shop->id])}}">編集</a></li>
        <li>
            <form method="post" action="{{route('admin.shops.delete', ['id' => $shop->id])}}">
                @csrf
                <input type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
            </form>
        </li>
    </ul>
</div>
@endsection