@extends('layout')
@section('content')




    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors-> all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif

    <form method="post" action="{{ route('ucivo.store') }}">
        <div class="form-group">
            <input type="text" name="Predmet" class="form-control" placeholder="Názov predmetu"/>
        </div>
        <div class="form-group">
            <input type="text" name="Ucivo" class="form-control" placeholder="Názov učiva"/>
        </div>
        <div class="form-group"  id="obsah">
            <input type="text" name="Obsah" class="form-control" placeholder="Obsah učiva"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn_primary"/>
        </div>
    </form>
@endsection



