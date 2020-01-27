@extends('layout')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>Predmet</th>
                    <th>Názov testu</th>
                    <th>Známka</th>
                </tr>
                @foreach($znamky as $row)
                    <tr>
                        <td>{{$row->test->predmet}}</td>
                        <td>{{$row->test->nazov}}</td>
                        <td>{{$row->spravne}}/{{$row->test->questions->count()}}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>

@endsection
