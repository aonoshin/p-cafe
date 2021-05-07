@extends('layouts.admin')

@section('admin-title', '詳細編集フォーム')

@section('main')
<ul class="back-admin-top">
    <li><a href="{{route('admin.top')}}">管理画面トップへ</a></li>
    <li><a href="{{route('admin.shops.index')}}">カフェ一覧へ</a></li>
    <li><a href="{{route('admin.shops.show', ['shop' => $shop->id])}}">詳細へ戻る</a></li>
</ul>
<div class="admin-box-shops-form">
    <form method="POST" action="{{route('admin.shops.update', ['shop' => $shop->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <table>
            <tbody>
                <tr>
                    <th>店名&nbsp;<span class="must">必須</span></th>
                    <td>
                        <input class="width-100" type="text" name="name" value="{{old('name', $shop->name)}}" placeholder="例）渋谷カフェ" autofocus>
                        @if($errors->has('name'))
                            <span class="error">{{$errors->first('name')}}</span>
                        @endif
                    </td>
                    <th>所在エリア&nbsp;<span class="must">必須</span></th>
                    <td>
                        <select name="area_id">
                            <option disabled selected value>選択してください</option>
                            @foreach($areas as $area)
                                <option value="{{$area->id}}" @if(old('area_id', $shop->area_id) == $area->id) selected @endif>{{$area->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('area'))
                            <span class="error">{{$errors->first('area')}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>住所&nbsp;<span class="must">必須</span></th>
                    <td>
                        <input class="width-100" type="text" name="address" value="{{old('address', $shop->address)}}">
                        @if($errors->has('address'))
                            <span class="error">{{$errors->first('address')}}</span>
                        @endif
                    </td>
                    <th>営業時間&nbsp;<span class="must">必須</span></th>
                    <td>
                        <input type="time" name="start_time" value="{{old('start_time', $shop->start_time)}}">&nbsp;〜
                        <input type="time" name="end_time" value="{{old('end_time', $shop->end_time)}}">
                        @if($errors->has('start_time'))
                            <span class="error">{{$errors->first('start_time')}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>
                        <input class="width-100" type="text" name="tel" value="{{old('tel', $shop->tel)}}" placeholder="xx-xxxx-xxxx">
                    </td>
                    <th>ホームページ</th>
                    <td>
                        <input class="width-100" type="text" name="url" value="{{old('url', $shop->url)}}" placeholder="https://xxxxxxxx.com">
                    </td>
                </tr>
                <tr>
                    <th>Wi-Fi&nbsp;<span class="must">必須</span></th>
                    <td>
                        <input type="radio" name="wifi" value="0" @if(old('wifi', $shop->wifi) == 0) checked @endif>あり
                        <input type="radio" name="wifi" value="1" @if(old('wifi', $shop->wifi) == 1) checked @endif>なし
                        @if($errors->has('wifi'))
                            <span class="error">{{$errors->first('wifi')}}</span>
                        @endif
                    </td>
                    <th>電源&nbsp;<span class="must">必須</span></th>
                    <td>
                        <input type="radio" name="outlet" value="0" @if(old('outlet', $shop->wifi) == 0) checked @endif>あり
                        <input type="radio" name="outlet" value="1" @if(old('outlet', $shop->wifi) == 1) checked @endif>なし
                        @if($errors->has('outlet'))
                            <span class="error">{{$errors->first('outlet')}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>クレジットカード&nbsp;<span class="must">必須</span></th>
                    <td>
                        <input type="radio" name="credit" value="0" @if(old('credit', $shop->wifi) == 0) checked @endif>可
                        <input type="radio" name="credit" value="1" @if(old('credit', $shop->wifi) == 1) checked @endif>不可
                        @if($errors->has('credit'))
                            <span class="error">{{$errors->first('credit')}}</span>
                        @endif
                    </td>
                    <th>喫煙&nbsp;<span class="must">必須</span></th>
                    <td>
                        <input type="radio" name="smoke" value="0" @if(old('smoke', $shop->wifi) == 0) checked @endif>不可
                        <input type="radio" name="smoke" value="1" @if(old('smoke', $shop->wifi) == 1) checked @endif>可
                        @if($errors->has('smoke'))
                            <span class="error">{{$errors->first('smoke')}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>ペット&nbsp;<span class="must">必須</span></th>
                    <td>
                        <input type="radio" name="pet" value="0" @if(old('pet', $shop->wifi) == 0) checked @endif>可
                        <input type="radio" name="pet" value="1" @if(old('pet', $shop->wifi) == 1) checked @endif>不可
                        @if($errors->has('pet'))
                            <span class="error">{{$errors->first('pet')}}</span>
                        @endif
                    </td>
                    <th>お酒提供&nbsp;<span class="must">必須</span></th>
                    <td>
                        <input type="radio" name="liquor" value="0" @if(old('liquor', $shop->wifi) == 0) checked @endif>あり
                        <input type="radio" name="liquor" value="1" @if(old('liquor', $shop->wifi) == 1) checked @endif>なし
                        @if($errors->has('liquor'))
                            <span class="error">{{$errors->first('liquor')}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>コーヒーのこだわり&nbsp;<span class="must">必須</span></th>
                    <td>
                        <select name="coffee">
                            <option disabled selected value>選択してください</option>
                            <option value="1" @if(old('coffee', $shop->coffee) == 1) selected @endif>特に無し</option>
                            <option value="2" @if(old('coffee', $shop->coffee) == 2) selected @endif>少しあり</option>
                            <option value="3" @if(old('coffee', $shop->coffee) == 3) selected @endif>あり</option>
                            <option value="4" @if(old('coffee', $shop->coffee) == 4) selected @endif>とてもあり</option>
                            <option value="5" @if(old('coffee', $shop->coffee) == 5) selected @endif>非常にあり</option>
                        </select>
                        @if($errors->has('coffee'))
                            <span class="error">{{$errors->first('coffee')}}</span>
                        @endif
                    </td>
                    <th>店内の静かさ&nbsp;<span class="must">必須</span></th>
                    <td>
                        <select name="voice">
                            <option disabled selected value>選択してください</option>
                            <option value="1" @if(old('voice', $shop->voice) == 1) selected @endif>うるさめ</option>
                            <option value="2" @if(old('voice', $shop->voice) == 2) selected @endif>少しうるさめ</option>
                            <option value="3" @if(old('voice', $shop->voice) == 3) selected @endif>普通</option>
                            <option value="4" @if(old('voice', $shop->voice) == 4) selected @endif>静か</option>
                            <option value="5" @if(old('voice', $shop->voice) == 5) selected @endif>非常に静か</option>
                        </select>
                        @if($errors->has('voice'))
                            <span class="error">{{$errors->first('voice')}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>席数&nbsp;<span class="must">必須</span></th>
                    <td>
                        <select name="capacity">
                            <option disabled selected value>選択してください</option>
                            <option value="1" @if(old('capacity', $shop->capacity) == 1) selected @endif>非常に少ない</option>
                            <option value="2" @if(old('capacity', $shop->capacity) == 2) selected @endif>少ない</option>
                            <option value="3" @if(old('capacity', $shop->capacity) == 3) selected @endif>普通</option>
                            <option value="4" @if(old('capacity', $shop->capacity) == 4) selected @endif>多い</option>
                            <option value="5" @if(old('capacity', $shop->capacity) == 5) selected @endif>非常に多い</option>
                        </select>
                        @if($errors->has('capacity'))
                            <span class="error">{{$errors->first('capacity')}}</span>
                        @endif
                    </td>
                    <th>フードの充実度&nbsp;<span class="must">必須</span></th>
                    <td>
                        <select name="cuisine">
                            <option disabled selected value>選択してください</option>
                            <option value="1" @if(old('cuisine', $shop->cuisine) == 1) selected @endif>無し or 非常に少ない</option>
                            <option value="2" @if(old('cuisine', $shop->cuisine) == 2) selected @endif>少ない</option>
                            <option value="3" @if(old('cuisine', $shop->cuisine) == 3) selected @endif>普通</option>
                            <option value="4" @if(old('cuisine', $shop->cuisine) == 4) selected @endif>多い</option>
                            <option value="5" @if(old('cuisine', $shop->cuisine) == 5) selected @endif>非常に多い</option>
                        </select>
                        @if($errors->has('cuisine'))
                            <span class="error">{{$errors->first('cuisine')}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>イメージ写真</th>
                    <td colspan="3">
                        <input class="font-size-13" type="file" name="image" value="{{old('image', $shop->image)}}">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="admin-shops-form-other">
            <div class="form-content">
                <h2>ー 備考 ー</h2>
                <textarea name="content">{{old('content', $shop->content)}}</textarea>
            </div>
            <div class="form-caution">
                <h2>ー 注意事項 ー</h2>
                <textarea name="caution">{{old('caution', $shop->caution)}}</textarea>
            </div>
        </div>
        <div class="admin-shops-form-btn">
            <input type="submit" value="更新する" onclick="return confirm('更新してもよろしいですか？')">
        </div>
    </form>
</div>
@endsection