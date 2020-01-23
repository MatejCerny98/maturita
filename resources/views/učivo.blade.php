@extends('layout')
@section('content')

    <div class="row">
            <div class="col-md-12">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif
                    @if($message = Session::get('danger'))
                        <div class="alert alert-danger">
                            <p>{{$message}}</p>
                        </div>
                    @endif
                <table class="table table-bordered">
                    <tr>
                        <th>Predmet</th>
                        <th>Učivo</th>
                        <th>Obsah</th>
                        <th>Editovať</th>
                        <th>Vymazať</th>
                    </tr>
                    @foreach($ucivos as $row)
                        <tr>
                        <td>{{$row['Predmet']}}</td>
                        <td>{{$row['Ucivo']}}</td>
                        <td>{{$row['Obsah']}}</td>
                            <td><a href="{{route('ucivo.edit', ['ucivo'=>$row['id']])}}">Edit</a></td>
                            <td>
                                <form method="post"  action="{{action('UcivoController@destroy', $row['id'])}}">
                                            {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <button type="submit" class="btn btn-danger">Vymazať</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
    </div>
    <script>

    </script>

@endsection



