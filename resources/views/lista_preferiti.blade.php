@extends('layouts.homepage')

@section('title', 'Lista preferiti')

@section('css')
<link rel="stylesheet" href="{{ asset('css/lista_preferiti.css')}}" />
@endsection

@section('script')
<script src="{{ asset('js/lista_preferiti.js')}}" defer></script>
@endsection

@section('links')
<a href="{{ route('home') }}">Torna alla home</a>
<a id="podcast"> Podcast ricette Giallo Zafferano</a>
<a id="ricetta"> Cerca una ricetta </a>
<a href="{{ route('logout') }}">Logout</a>
@endsection

@section('text')
<strong>Ecco la tua lista dei preferiti {{ $user["nome"] }}!</strong>
@endsection