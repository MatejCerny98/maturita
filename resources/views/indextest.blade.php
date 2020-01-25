@extends('layout')
@section('content')

    <table class="table table-bordered">
        <tr>
            <th>Predmet</th>
            <th>Názov testu</th>
        </tr>
        @foreach($tests as $row)
            <tr>
                <td>{{$row['predmet']}}</td>
                <td>{{$row['nazov']}}</td>
                <td><a href="{{route('test.show', $row->id)}}">Detail</a></td>
            </tr>
        @endforeach
    </table>



@endsection