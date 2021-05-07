@if(count($breadcrumbs))
    <ul class="breadcrumbs">
        @foreach($breadcrumbs as $breadcrumb)
            @if($breadcrumb->url && !$loop->last)
                <li><a href="{{$breadcrumb->url}}">{{$breadcrumb->title}}</a>&nbsp;＞</li>
            @else
                <li>{{$breadcrumb->title}}</li>
            @endif
        @endforeach
    </ul>
@endif
