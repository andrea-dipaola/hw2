@extends('layouts.main')

@section('title', 'Accedi')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css')}}" />
@endsection

@section('script')
<script src="{{ asset('js/login.js')}}" defer></script>
@endsection

@if($error == 'errore')
<section> Username o password errati </section>
@endif

@section('content')
<form name='login_form' method='post' action="{{ route('login') }}">
    @csrf
    <p>
        <label> Username <input type='text' name='username' value="{{ old('username') }}"> </label> 
    </p>
    <p> 
        <label> Password <input type='password' name='password'> </label>
    </p>
    <p>
        <label> <input type='submit' value="Accedi"> </label> <br>
    </p>
    <p>
        Non hai un account? <a href = "{{ route('signup') }}"> Registrati </a>
    </p>
</form>
@endsection