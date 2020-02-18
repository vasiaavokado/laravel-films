@extends("template")

@section('main')
<div class="films">
    @each('film-card',$films,'film')
</div>
@endsection

