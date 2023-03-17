
@extends('user.layouts.main')

@section('container')  

    <div class="col-lg-7">
        <h5>December 2023</h5>
        <table class="table table-striped">
            <tr class="text-center">
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
            <tr class="text-center">
                <td><span class="me-2">1</span><input type="checkbox" checked onclick="this.checked = !this.checked"></td>
                <td><span class="me-2">2</span><input type="checkbox" checked onclick="this.checked = !this.checked"></td>
                <td><span class="me-2">3</span><input type="checkbox" checked onclick="this.checked = !this.checked"></td>
                <td><span class="me-2">4</span><input type="checkbox" checked onclick="this.checked = !this.checked"></td>
                <td><span class="me-2">5</span><input type="checkbox" checked onclick="this.checked = !this.checked"></td>
            </tr>
        </table>
    </div>
@endsection 