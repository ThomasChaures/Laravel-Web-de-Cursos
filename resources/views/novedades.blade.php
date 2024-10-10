@extends('layout.app')
@section('title', 'Novedades')

@section('content')
    <section class="bg-gray-100 py-14">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @include('partials.novedades._categories')
                <div class="md:col-span-12 mx-auto">
                    @include('partials.novedades._featured')
                    @include('partials.novedades._additional')
                </div>
            </div>
        </div>
    </section>

    @include('partials.novedades._search')
    @include('partials.novedades._recent')
@endsection
