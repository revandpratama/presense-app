@extends('partials.main')

@section('container')
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-5">
            <h2 class="my-4">{{ $subject->name }} Presense</h2>
            <form action="/presense" method="POST">
                @csrf
                <input type="hidden" name="user_id"  value="{{ auth()->user()->id }}">
                <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                <input type="hidden" name="status" value="present">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" name='subject_id' class="form-control" id="exampleFormControlInput1" disabled value="{{ auth()->user()->name }}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Appointment</label>
                    {{-- <select class="form-control" name="appointment" id="">
                        @for ($i = 1; $i <= 16; $i++)

                            @if ($subject->presense[0]->appointment == $i &&  $subject->presense[0]->user_id == auth()->user()->id)
                                <option value="{{ $i }}" class="text-success">{{ $i }} </option>
                            @else
                                <option value="{{ $i }}" class="text-danger">{{ $i }} </option>
                            @endif
                            
                        @endfor
                    </select> --}}
                    <select class="form-control" name="appointment" id="">
                        @for ($i = 1; $i <= 16; $i++)
                            @php $userPresent = false; @endphp
                            @foreach ($subject->presense as $presense)
                                @if ($presense->appointment == $i && $presense->user_id == auth()->user()->id)
                                    @php $userPresent = true; @endphp
                                    @break
                                @endif
                            @endforeach
                    
                            @if ($userPresent)
                                <option value="{{ $i }}" class="text-success">{{ $i }} Filled</option>
                            @else
                                <option value="{{ $i }}" class="text-danger">{{ $i }}</option>
                            @endif
                        @endfor
                    </select>
                    @error('appointment')
                       <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary form-control" type="submit" name="submit">Submit</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection
