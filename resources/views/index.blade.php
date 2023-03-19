@extends('partials.main')

@section('container')
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h1>Presense</h1>
        <div class="row">
            @foreach ($subjects as $subject)
            <div class="col-md-4 mb-5 mt-3">
                <a href="/presense/{{ $subject->slug }}">              
                    <div class="card text-bg-dark" style="max-height:400;max-width:500">
                    <img src="https://source.unsplash.com/500x400?{{ $subject->name }}" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center p-0">
                      <h5 class="card-title flex-fill text-center p-4" style="background-color:rgba(0,0,0,0.7)">{{ $subject->name }}</h5>
                    </div>
                </div>
                </a>              
            </div>
            @endforeach            
        </div>
    </div>
@endsection
