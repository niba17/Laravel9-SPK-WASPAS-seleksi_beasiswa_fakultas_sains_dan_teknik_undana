@extends('layouts.main')

@section('title', 'Extracurricular')

@section('content')
    <h1>Detail Of Classroom {{ $classroom->name }}</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Students</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $classroom->teachers->name }}
                </td>
                <td>
                    @foreach ($classroom->students as $item)
                        <li>
                            {{ $item->name }}
                        </li>
                    @endforeach
                </td>

                {{-- @foreach ($teacher->classes as $class)
                        @foreach ($class->students as $item)
                            <li>
                                {{ $item->name }}
                            </li>
                        @endforeach
                    @endforeach --}}

            </tr>
        </tbody>
    </table>
@endsection
