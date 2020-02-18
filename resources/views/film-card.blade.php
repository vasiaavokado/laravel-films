<div class="film">
    <a href="{{url("film/".$film['id'])}}">
        <div class="image" style="background-image: url('{{$film['img']}}');"></div>
        <div class="info">
            <div class="name">{{$film['name']}}</div>
            <div class="year-rate">
                <div class="year">{{$film['year']}}</div>
                <div class="rate">{{$film['rate']}}</div>
            </div>
        </div>
    </a>
</div>