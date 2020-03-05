@extends("admin.template")

@php
$writeAccess = Auth::user()->hasRole("write_admin_panel");
@endphp

@section('content')
    <form method="get">
        <input type="text" name="id" placeholder="id..." value="{{request()->get("id")}}">
        <input type="text" name="name" placeholder="name..." value="{{request()->get("name")}}">
        <input type="text" name="email" placeholder="email..." value="{{request()->get("email")}}">
        <input type="submit" value="search">
    </form>
    {!! $users->render() !!}
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Роли</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <th>{{$user->name}}</th>
                <th>{{$user->email}}</th>
                <th>
                    <form action="{{route('saveuserroles')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        @foreach($roles as $role)
                            @if($writeAccess && $user->id != Auth::user()->id)
                            <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                @if($user->roles->pluck('id')->contains($role->id)) checked @endif
                            >
                            @else
                                @if($user->roles->pluck('id')->contains($role->id))
                                    [+]
                                @else
                                    [ ]
                                @endif
                            @endif
                            {{$role->name}}
                        @endforeach
                        @if($writeAccess && $user->id != Auth::user()->id)
                            <input type="submit" value="сохранить">
                        @endif
                    </form>
                </th>
            </tr>
        @endforeach
    </table>
    {!! $users->render() !!}

@endsection