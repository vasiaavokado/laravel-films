@extends("template")

@section('main')
    <h1>{{$film['name']}}</h1>
    <div class="film-info">
        <div class="film-img" style="background-image:url('{{$film['img']}}');"></div>
        <div class="film-chars">
            <dl>
                <dt><b>Год</b></dt>
                <dd>{{$film['year']}}</dd>
                <dt><b>Актеры</b></dt>
                <dd>{{implode(", ",$film['actors'])}}</dd>
                <dt><b>Жанры</b></dt>
                <dd>{{implode(", ",$film['genres'])}}</dd>
                <dt><b>Рейтинг</b></dt>
                <dd>{{$film['rate']}}</dd>
            </dl>
        </div>
    </div>
    <div class="film-desc">
        {{$film["description"]}}
    </div>
@endsection