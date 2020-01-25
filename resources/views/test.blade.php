@extends('layout')
@section('content')
    <form action="{{route('test.validate', $test->id)}}" method="post">
        @csrf
    {{$test->nazov}}
    {{$test->predmet}}
    <div>
        @foreach($test->questions as $question)
            {{$question->otazka}}
            <div>
                @foreach($question->answers as $answer)
                    <input type="radio" name="odpoved[{{$question->id}}]" value="{{$answer->id}}">
                    {{$answer->odpoved}}
                @endforeach
            </div>
        @endforeach
    </div>
        <button type="submit">Vyhodnotiť</button>
    </form>
@endsection



