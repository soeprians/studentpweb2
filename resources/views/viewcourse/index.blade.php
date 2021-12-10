@extends("layouts.app")
@section("content")
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Kuliah</th>
        </tr>
    </thead>

    @foreach ($courses as $course)

    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $course->course_name }}</td>
    </tr>
        
    @endforeach
</table>
@stop