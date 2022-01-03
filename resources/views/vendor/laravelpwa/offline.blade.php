@extends('layouts.app')
<!-- Title de la section -->
@section('titleSection')
<h2 class="text-center display-2 mb-4 title">Status: sin conexión</h2>  
@endsection
@section('content')
<div class="container">
    <p class="errorText">¡Upss!, imposible de establecer conexión, intenta de nuevo más tarde シ.</p>
    <div class="d-flex justify-content-center">
        <img src="{{asset('images/outline_image.gif')}}" alt="imagen offline" />
    </div>
</div>
@endsection