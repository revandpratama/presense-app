@extends('user.layouts.main')

@section('container') 

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Account</h1>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form action="/dashboard/account/{{ $user->username }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                    @error('name')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" value="{{ $user->username }}"name="username" class="form-control" id="exampleFormControlInput1" placeholder="username">
                    @error('username') 
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    @error('email')
                         <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="submit" value="Update Account" name="submit" class="btn btn-primary" id="exampleFormControlInput1">
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection