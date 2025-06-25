@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Leave Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Leave ID: {{ $leave->leave_id }}</h5>
            <p class="card-text">Employee: {{ $leave->employee->employee_name ?? 'N/A' }}</p>
           @if($leave->supporting_doc)
               <div class="mb-3">
                   <label class="fw-bold">Supporting Document:</label>
                   <div>
                       <iframe src="{{ asset('storage/' . $leave->supporting_doc) }}" width="100%" height="500px"></iframe>
                   </div>
                   <a href="{{ asset('storage/' . $leave->supporting_doc) }}" class="btn btn-success mt-2" download>
                       Download PDF
                   </a>
               </div>
           @else
               <p class="card-text">Supporting Document: N/A</p>
           @endif
            <p class="card-text">Reason: {{ $leave->reason }}</p>
            <p class="card-text">Start Date: {{ $leave->start_date }}</p>
            <p class="card-text">End Date: {{ $leave->end_date }}</p>
        </div>
    </div>
    <a href="{{ route('leaves.index') }}" class="btn btn-secondary mt-3">Back to Leaves</a>
</div>
@endsection
