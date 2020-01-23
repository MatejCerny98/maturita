@extends('layout')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <br>
            <h3>Editovanie</h3>
            <br>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors-> all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{action('UcivoController@update', $id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put"/>
                <div class="form-group">
                    <input type="text" name="Predmet" class="form-control" value="{{$ucivo->Predmet}}" placeholder="Uprav názov predmetu"/>
                </div>
                <div class="form-group">
                    <input type="text" name="Ucivo" class="form-control" value="{{$ucivo->Ucivo}}" placeholder="Uprav názov učiva"/>
                </div>
                <div class="form-group">
                    <input type="text" name="Obsah" class="form-control" value="{{$ucivo->Obsah}}" placeholder="Uprav obsah"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Editovať">
                </div>



            </form>
        </div>
    </div>
@endsection
