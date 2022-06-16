@extends('layouts.main')

@section('title', 'Registrati')

@section('css')
<link rel="stylesheet" href="{{ asset('css/signup.css')}}" />

@endsection

@section('script')
<script src="{{ asset('js/signup.js')}}" defer></script>
@endsection

@section('content')
<form name="signup_form" method="post" action="{{ route('signup') }}">
    @csrf
    <p> 
        <label>Nome <input type="text" name="nome" value="{{ old('nome') }}" class="nome_input"> </label> 
        <span id="nome_span"></span>
    </p>
    <p> 
        <label>Cognome <input type="text" name="cognome" value="{{ old('cognome') }}" class="cognome_input"> </label> 
        <span id="cognome_span"></span>
    </p>
    <p> 
        <label>E-mail <input type="text" name="email" value="{{ old('email') }}" class="email_input"> </label> 
        <span id="email_span"></span>
    </p>
    <p> 
        <label>Username <input type="text" name="username" value="{{ old('username') }}" class="username_input"> </label> 
        <span id="user_span"></span>
    </p>
    <p> 
        <label>Password <input type="password" name="password" class="password_input"> </label> 
        <span id="password_span"></span>
    </p>
    <p> <label> <input type="submit" value="Accedi"> </label> </p>
    <p> Hai un account? <a href="{{ route('login') }}"> Accedi </a> </p>
</form>
@endsection