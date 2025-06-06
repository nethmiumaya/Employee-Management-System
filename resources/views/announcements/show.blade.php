@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Announcement Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Announcement ID: {{ $announcement->announcement_id }}</h5>
            <p class="card-text">Content: {{ $announcement->content }}</p>
            <p class="card-text">Date: {{ $announcement->date }}</p>
<!--            <p class="card-text">-->
<!--                Target Team:-->
<!--                @if($announcement->teams->count())-->
<!--                {{ $announcement->teams->pluck('name')->join(', ') }}-->
<!--                @else-->
<!--                N/A-->
<!--                @endif-->
<!--            </p>-->
<!--            <p class="card-text">-->
<!--                Department:-->
<!--                @if($announcement->departments->count())-->
<!--                {{ $announcement->departments->pluck('name')->join(', ') }}-->
<!--                @else-->
<!--                N/A-->
<!--                @endif-->
<!--            </p>-->
        </div>
    </div>
    <a href="{{ route('announcements.index') }}" class="btn btn-secondary mt-3">Back to Announcements</a>
</div>
@endsection
