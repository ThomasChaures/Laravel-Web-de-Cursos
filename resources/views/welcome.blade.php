@extends('layout.app')

@section('title', 'Impulsa tu aprendizaje')

@section('content')

   @include('partials.home._hero')
   @include('partials.home._carousel')
   @include('partials.home._benefits')
   @include('partials.home._popular-courses')
   @include('partials.home._instructors')
   @include('partials.home._testimonials')
 

@vite('resources/js/app.js')

@endsection
