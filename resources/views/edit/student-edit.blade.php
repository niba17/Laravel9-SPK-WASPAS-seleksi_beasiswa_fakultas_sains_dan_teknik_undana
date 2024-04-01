@extends('layouts.main')

@section('title', 'Edit Student')

@section('content')
    <h1>Edit Student</h1>

    <div class="mt-3 col-8">
        <form action="/student-update/{{ $student->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ $student->name }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                @php
                    $genders = ['L', 'P'];
                @endphp
                <label for="gender">Gender</label>
                <select class="form-select" name="gender">
                    @foreach ($genders as $gender)
                        <option value="{{ $gender }}" @if ($student->gender == $gender) {{ 'selected' }} @endif>
                            {{ $gender }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nis">NIS</label>
                <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis"
                    value="{{ $student->nis }}" required>
                @error('nis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="class">Class</label>
                <select class="form-select" name="class_id">
                    <option value="" selected>Select One</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" @if ($class->id == $student->class_id) {{ 'selected' }} @endif>
                            {{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-secondary mb-3">Update</button>

        </form>
    </div>
@endsection
