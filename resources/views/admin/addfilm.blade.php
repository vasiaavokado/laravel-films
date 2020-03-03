<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<h1>Add film</h1>
<ul>
    @foreach($errors->all() as $e)
        <li>{{$e}}</li>
    @endforeach
</ul>


<form action="{{url()->route('addfilmhandle')}}" method="post" enctype="multipart/form-data">
    @csrf
    <dl>
        <dt>
            Название
            @if($errors->has('name'))
                <span class="error">{{$errors->first('name')}}</span>
            @endif
        </dt>
        <dd><input type="text" name="name" value="{{old('name')}}"></dd>

        <dt>Год
            @if($errors->has('year'))
                <span class="error">{{$errors->first('year')}}</span>
            @endif
        </dt>
        <dd><input type="text" name="year"></dd>

        <dt>Описание
            @if($errors->has('desc'))
                <span class="error">{{$errors->first('desc')}}</span>
            @endif
        </dt>
        <dd>
            <textarea name="desc"></textarea>
        </dd>
        <dt>Картинка</dt>
        <dd><input type="file" name="img" accept="image/*"></dd>
        <dt>Баннер</dt>
        <dd><input type="file" name="banner" accept="image/*"></dd>

        <dt>Актеры через запятую
            @if($errors->has('actors'))
                <span class="error">{{$errors->first('actors')}}</span>
            @endif
        </dt>
        <dd>

            <textarea name="actors"></textarea>
        </dd>
        <dt>Жанры</dt>
        <dd>
            @foreach($genres as $g)
                <input type="checkbox" name="genre[]" value="{{$g->id}}"
                       @if(old('genre') && in_array($g->id,old('genre')))
                            checked
                        @endif
                > {{$g->name}}<br>
            @endforeach
        </dd>
    </dl>
    <input type="submit">
</form>

</body>
</html>