@extends('layout')
@section('content')
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('test.store')}}" method="post">
        @csrf
        Názov:<input name="nazov">
        Predmet:<input name="predmet">
        <div class="questions">
            <div class="question">
                Otázka:<input name="otazky[0][otazka]">
                <div class="answer">
                    a):<input name="otazky[0][odpoved][0][odpoved]">
                    <input type="checkbox" name="otazky[0][odpoved][0][spravna]">
                </div>
                <div class="answer">
                    b):<input name="otazky[0][odpoved][1][odpoved]">
                    <input type="checkbox" name="otazky[0][odpoved][1][spravna]">
                </div>
                <div class="answer">
                    c):<input name="otazky[0][odpoved][2][odpoved]">
                    <input type="checkbox" name="otazky[0][odpoved][2][spravna]">
                </div>
                <div class="answer">
                    d):<input name="otazky[0][odpoved][3][odpoved]">
                    <input type="checkbox" name="otazky[0][odpoved][3][spravna]">
                </div>
            </div>
        </div>
        <button type="button" class="push">Pridať otázku</button>
        <button type="submit"ß>Pridať test</button>
    </form>
@endsection
@push('scripts')
    <script>
        $('.push').click(function () {
            var count = $('.questions').children().length;
            $('.questions').append('<div class="question">\n' +
                '                Otázka:<input name="otazky['+count+'][otazka]">\n' +
                '                <div class="answer">\n' +
                '                    a):<input name="otazky['+count+'][odpoved][0][odpoved]">\n' +
                '                    <input type="checkbox" name="otazky['+count+'][odpoved][0][spravna]">\n' +
                '                </div>\n' +
                '                <div class="answer">\n' +
                '                    b):<input name="otazky['+count+'][odpoved][1][odpoved]">\n' +
                '                    <input type="checkbox" name="otazky['+count+'][odpoved][1][spravna]">\n' +
                '                </div>\n' +
                '                <div class="answer">\n' +
                '                    c):<input name="otazky['+count+'][odpoved][2][odpoved]">\n' +
                '                    <input type="checkbox" name="otazky['+count+'][odpoved][2][spravna]">\n' +
                '                </div>\n' +
                '                <div class="answer">\n' +
                '                    d):<input name="otazky['+count+'][odpoved][3][odpoved]">\n' +
                '                    <input type="checkbox" name="otazky['+count+'][odpoved][3][spravna]">\n' +
                '                </div>\n' +
                '            </div>')
        })
    </script>
@endpush



