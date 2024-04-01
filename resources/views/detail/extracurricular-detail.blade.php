@extends('layouts.main')

@section('title', 'Extracurricular')

@section('content')
    <h1>Detail Of Extracurricular {{ $extracurricular->name }}</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Students</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    @foreach ($extracurricular->students as $item)
                        <li>
                            {{ $item->name }}
                        </li>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
@endsection
