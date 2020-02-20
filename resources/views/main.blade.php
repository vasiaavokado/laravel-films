@extends("template")

@section('main')
<div class="films">
    @each('film-card',$films,'film')
</div>
{!! $films->render() !!}
@endsection

@section('css')
    <link rel="stylesheet" href="test.css">
@endsection


