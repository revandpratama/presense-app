
@extends('user.layouts.main')

@section('container')   

    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                @if ($users->isEmpty())
                    <h1>Empty</h1>
                @else

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                
                    
                    <h3 class="my-3">{{ $users[0]->subject->name }} Appointment : {{ request('app') }}</h3>
                    <table class="table table-striped mb-5">
                        <tr>
                            <th>Name</th>
                            <th>Presense Time</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $user)                           
                            <tr>
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->created_at->format('l, d-m-Y H:i') }}</td>
                                <td>
                                    <form action="/dashboard/lookout/{{ $user->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="badge bg-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </table>
                @endif
                
            </div>
        </div>
    </div>

@endsection