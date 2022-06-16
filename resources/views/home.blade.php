@extends('layouts.homepage')

@section('title', 'Home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css')}}" />
@endsection

@section('script')
<script src="{{ asset('js/home.js')}}" defer></script>
@endsection

@section('links')
<a href="{{ route('create_review') }}">Nuova recensione</a>
<a id="podcast"> Podcast ricette Giallo Zafferano</a>
<a id="ricetta"> Cerca una ricetta </a>
<a href="{{ route('lista_preferiti') }}">Preferiti</a>
<a href="{{ route('logout') }}">Logout</a>
@endsection

@section('text')
<strong>Ciao {{ $user["username"] }}!</strong>
@endsection
