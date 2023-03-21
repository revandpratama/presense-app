
@extends('user.layouts.main')

@section('container')   

    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                @if ($users->isEmpty())
                    <h1>Empty</h1>
                @else

                
                    
                    <h3 class="my-3">{{ $users[0]->subject->name }} Appointment : {{ request('app') }}</h3>
                    <table class="table table-striped mb-5">
                        <tr>
                            <th>Name</th>
                            <th>Presense Time</th>
                        </tr>
                        @foreach ($users as $user)                           
                            <tr>
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->created_at->format('l, d-m-Y H:i') }}</td>
                            </tr>
                        @endforeach
                        
                    </table>
                @endif
                
            </div>
        </div>
    </div>

@endsection