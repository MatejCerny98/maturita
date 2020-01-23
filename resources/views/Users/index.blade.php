@extends('layout')

@section('content')
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td id="email">{{$user->email}}</td>
            <td>
                @switch($user->role)
                    @case(3)
                    Student
                    @break
                    @case(2)
                    Teacher
                    @break
                    @case(1)
                    Admin
                    @break
                @endswitch
            </td>
            <td id="actions">
                @if($user->role ==0)
                    <form action="{{route('users.changerole', ['user' => $user->id, 'role' => 3])}}" method="post">
                        @csrf

                        <button type="submit">Set Student</button>
                    </form>
                @endif
                @if($user->role ==0)
                    <form action="{{route('users.changerole', ['user' => $user->id, 'role' => 2])}}" method="post">
                        @csrf

                        <button type="submit">Set Teacher</button>
                    </form>
                @endif
                @if($user->role ==0)
                    <form action="{{route('users.destroy', ['user' => $user->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit">Delete</button>
                    </form>
                @endif
                <br>
                @if($user->role ==2)
                    <form action="{{route('users.destroy', ['user' => $user->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit">Delete</button>
                    </form>
                @endif
                <br>
                @if($user->role ==3)
                    <form action="{{route('users.destroy', ['user' => $user->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit">Delete</button>
                    </form>
                @endif
            </td>

        </tr>
    @endforeach
</table>
<style>
    table, th, td {
        border: 5px solid black;
    }

    #actions {
        width: 35%;
    }

    #email {
        width: 50%;
    }
</style>
@endsection