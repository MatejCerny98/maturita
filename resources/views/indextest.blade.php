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
                <td>
                    @if($row['spusteny'])
                    <a href="{{route('test.show', $row->id)}}">Otvoriť test</a>
                    @endif
                </td>
                <td>
                    @if($row['spusteny'])
                        <form method="post" action="{{action('testController@stop', $row['id'])}}">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Vypnúť test</button>
                        </form>
                        @else
                        <form method="post" action="{{action('testController@start', $row['id'])}}">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Spustiť test</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>



@endsection