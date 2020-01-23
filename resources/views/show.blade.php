@extends('layout')
@section('content')


        {{ $ucivo->name }} <br/>
        {{ $ucivo->content }} <br/><br/>

        <a href="{{route('ucivo.edit', ['ucivo' => $ucivo->id] )}}">EDIT</a>

@endsection