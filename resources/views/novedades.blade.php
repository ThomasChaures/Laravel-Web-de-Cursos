@extends('layout.app')
@section('title', 'Novedades')

@section('content')
    <section class="bg-gray-100 py-14">
        <div class="container mx-auto">
            <div class="grid gap-4">
                <div class=" mx-auto">
                    @include('partials.novedades._featured')
                </div>
            </div>
        </div>
    </section>


@endsection
