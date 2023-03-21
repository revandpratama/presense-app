
{{-- 
@extends('user.layouts.main')

@section('container')  

    <div class="col-lg-7">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">My Presense</h1>
          </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (count($presense)===0)
            <h5 class="text-center">No Presense Available</h5>
        @endif
        @foreach ($presense as $present)
        <h5 class="my-3">Subject : {{ $present->subject->name }}</h5>
        <table class="table table-striped mb-5">
            <tr class="text-center">
                <th>Appointment</th>
                <th>Presense Date</th>
            </tr>
            
            @for ($i = 1; $i <= 16; $i++)
            <tr class="text-center">
                
                @if ($present->appointment == $i && $present->status == 'present')
                    <td><span class="me-2">{{ $i }}</span><input type="checkbox" checked onclick="this.checked = !this.checked"></td>
                    <td>{{ $present->created_at->format('d-M-Y H:i') }}</td>
                @else
                    <td><span class="me-2">{{ $i }}</span><input type="checkbox" onclick="this.checked = !this.checked"></td>
                    <td class="text-danger">absent</td>
                @endif
                    
            </tr>   
            @endfor
            
        </table>
        @endforeach
        
    </div>
@endsection  --}}



@extends('user.layouts.main')

@section('container')  

    <div class="col-lg-7">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">My Presenses</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($presenses->isEmpty())
            <h5 class="text-center">No presense Available</h5>
        @else
            @foreach ($presenses->groupBy('subject_id') as $subjectId => $presensesBySubject)
                @php
                    $subject = App\Models\Subject::find($subjectId);
                @endphp
                <h5 class="my-3">Subject : {{ $subject->name }}</h5>
                <table class="table table-striped mb-5">
                    <tr class="text-center">
                        <th>Appointment</th>
                        <th>presense Date</th>
                    </tr>
                    @for ($i = 1; $i <= 16; $i++)
                        <tr class="text-center">
                            @php
                                $presense = $presensesBySubject->firstWhere('appointment', $i);
                            @endphp
                            @if ($presense && $presense->status == 'present')
                                <td><span class="me-2">{{ $i }}</span><input type="checkbox" checked onclick="this.checked = !this.checked"></td>
                                <td>{{ $presense->created_at->format('l, d-m-Y H:i') }}</td>
                            @else
                                <td><span class="me-2">{{ $i }}</span><input type="checkbox" onclick="this.checked = !this.checked"></td>
                                <td class="text-danger">absent</td>
                            @endif
                        </tr>   
                    @endfor
                </table>
            @endforeach
        @endif
    </div>
@endsection 


