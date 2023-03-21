@extends('user.layouts.main')

@section('container')   

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Admin Lookout</h1>
                </div>

                <table class="table table-striped mb-5">
                    <tr>
                        <th>Subject</th>
                        <th>Appointment</th>
                    </tr>

                    @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td class="d-block">
                                @for ($i = 1; $i <= 16; $i++)
                                    <a class="mx-2"href="/dashboard/lookout/{{ $subject->slug }}?app={{ $i }}">{{ $i }}</a> 
                                @endfor

                                
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection