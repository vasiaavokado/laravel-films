@extends("template")

@section('main')
    <h1>{{$film->name}}</h1>
    <div class="film-info">
        <div class="film-img" style="background-image:url('{{Storage::disk("public")->url($film->img)}}');"></div>
        <div class="film-chars">
            <dl>
                <dt><b>Год</b></dt>
                <dd>{{$film->year}}</dd>
                <dt><b>Актеры</b></dt>
                <dd>
                    @foreach($film->actors as $g)
                        {{$g->name}}
                        @if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                </dd>
                <dt><b>Жанры</b></dt>
                <dd>
                    @foreach($film->genres as $g)
                        {{$g->name}} {{$g->pivot->x}}
                        @if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                </dd>
                <dt><b>Рейтинг</b></dt>
                <dd>{{$film->rate}}</dd>
            </dl>
        </div>
    </div>
    <div class="film-desc">
        {{$film->description}}
    </div>
@endsection