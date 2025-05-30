@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employees</h1>
    <ul>
        @foreach($employees as $employee)
        <li>{{ $employee->employee_name }}</li>
        @endforeach
    </ul>
</div>
@endsection
