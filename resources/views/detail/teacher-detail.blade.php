@extends('layouts.main')

@section('title', 'Extracurricular')

@section('content')
    <h1>Detail Of Teacher {{ $teacher->name }}</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Class</th>
                <th>Students</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    @if ($teacher->classes)
                        {{ $teacher->classes->name }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($teacher->classes)
                        @foreach ($teacher->classes->students as $item)
                            <li>
                                {{ $item->name }}
                            </li>
                        @endforeach
                    @else
                        -
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
@endsection
