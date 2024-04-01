@extends('layouts.main')

@section('title', 'Extracurricular')

@section('content')
    <h1>Detail Of Student {{ $student->name }}</h1>
    <div class="my-3 d-flex justify-content-center">
        @if ($student->image)
            <img src="{{ asset('storage/photos/' . $student->image) }}" alt="{{ $student->name . '.jpg' }}" width="250px">
        @else
            <img src="{{ asset('storage/photos/default/user-default.png') }}" alt="{{ $student->name . '.jpg' }}"
                width="250px">
        @endif
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Extracurriculars</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->nis }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->class->name }}</td>
                <td>
                    {{ $student->class->teachers->name }}
                </td>
                <td>
                    @foreach ($student->extracurriculars as $item)
                        <li>
                            {{ $item->name }}
                        </li>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
@endsection
