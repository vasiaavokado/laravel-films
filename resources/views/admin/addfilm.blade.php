<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Add film</h1>

<form action="{{url()->route('addfilmhandle')}}" method="post" enctype="multipart/form-data">
    @csrf
    <dl>
        <dt>Название</dt>
        <dd><input type="text" name="name"></dd>
        <dt>Год</dt>
        <dd><input type="text" name="year"></dd>
        <dt>Описание</dt>
        <dd>
            <textarea name="desc"></textarea>
        </dd>
        <dt>Картинка</dt>
        <dd><input type="file" name="img" accept="image/*"></dd>
        <dt>Баннер</dt>
        <dd><input type="file" name="banner" accept="image/*"></dd>
        <dt>Актеры через запятую</dt>
        <dd>
            <textarea name="actors"></textarea>
        </dd>
        <dt>Жанры</dt>
        <dd>
            @foreach($genres as $g)
                <input type="checkbox" name="genre[]" value="{{$g->id}}"> {{$g->name}}<br>
            @endforeach
        </dd>
    </dl>
    <input type="submit">
</form>

</body>
</html>