@extends('layout.app')
@section('title', 'Cursos')

@section('content')
    @include('partials.cursos._search')
    @include('partials.cursos._categories')
    @include('partials.cursos._popular')
    @include('partials.cursos._faq')
@endsection