@extends('layouts.main')

@section('title', 'Delete Student')

@section('content')
    <h1>Are you sure to delete student ( {{ $student->name }} ) ?</h1>

    <a href="/student-destroy/{{ $student->id }}" class="btn btn-secondary">Yes</a>
    <a href="/students" class="btn btn-secondary">Cancel</a>
@endsection
