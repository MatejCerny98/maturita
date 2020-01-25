@extends('layout')
@section('content')
    <div class="centerblock">
<div class="row w-100">
    <div class="col-lg-4">
        <img src="https://m.smedata.sk/api-media/media/image/sme/2/40/4085342/4085342_1200x.jpeg?rev=3"
             class="rounded-circle mb-3" alt="Cinque Terre" width="140" height="140">
        <p><a class="btn btn-secondary" href="{{ route('učivo') }}" role="button">Učebné materiály</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
        <img src="https://structureofintellect.files.wordpress.com/2017/09/bubble-test.jpg?w=600&h=400"
             class="rounded-circle mb-3" alt="Cinque Terre" width="140" height="140">
        <p><a class="btn btn-secondary" href="{{ route('test.index') }}" role="button">Testy</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
        <img src="https://thewilsonbeacon.com/wp-content/uploads/2017/04/1541780_orig-900x601.png"
             class="rounded-circle mb-3" alt="Cinque Terre" width="140" height="140">
        <p><a class="btn btn-secondary" href="#" role="button">Známky</a></p>
    </div><!-- /.col-lg-4 -->
</div><!-- /.row -->
    </div>
@endsection



