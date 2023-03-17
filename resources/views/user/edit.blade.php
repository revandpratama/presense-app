@extends('user.layouts.main')

@section('container') 
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form action="/account/{{ $user->username }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">User</label>
                    <input type="email" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="email" name="username" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection