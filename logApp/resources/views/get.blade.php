@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron"> 
    <div>
        <form class="form" action="/get" method="post">
            <input type="text" name="name">
            @csrf
            <button class="btn btn-success" type="submit">submit</button>
        </form>
       <p style="color: red"> @error('name'){{ $message }} @enderror </P>
    </div>

    @foreach($services as $service)
        <p > This is {{ $service->name }} </P>
    @endforeach
    </div>
</div>

@endsection