@extends("layouts.app")

<?php $no=1 ?>
@section("content")
<br>
<h3>Data Mahasiswa</h3>
<a href="{{route('student.create')}}" class="btn btn-primary"><svg id="i-file" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="25" height="25" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M6 2 L6 30 26 30 26 10 18 2 Z M18 2 L18 10 26 10" />
</svg>&nbsp;&nbsp;Tambah Data</a>
<br>
<div class="col-sm-12">

@if (session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success')}}
</div>    
@endif
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>NRP</center></th>
            <th><center>Nama</center></th>
            <th><center>Jenis Kelamin</center></th>
            <th><center>Tanggal Lahir</center></th>
            <th><center>Tempat Lahir</center></th>
            <th colspan="2"><center>Opsi</center></th>
        </tr>
    </thead>

    <tbody>
    @foreach ($students as $student)
    <tr>
        <td><center>{{ $no++}}</center></td>
        <td><center>{{ $student->code }}</center></td>
        <td><center>{{ $student->name }}</center></td>
        <td><center>{{ $student->gender == "P" ? "Pria" : "Wanita" }}</center></td>
        <td><center>{{ $student->birth_date }}</center></td>
        <td><center>{{ $student->birth_place }}</center></td>
        <td>
            <center><a href="{{route('student.edit',$student->id)}}" class="btn btn-warning">
                <svg id="i-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="25" height="25" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" />
                </svg>&nbsp;&nbsp; Edit</a></center>
        </td>
        <td>
            <form action="/student/{{$student->id}}/delete" method="POST">
            @csrf
            @method('DELETE')
            <center><button class="btn btn-danger" type="submit">
                <svg id="i-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="25" height="25" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M28 6 L6 6 8 30 24 30 26 6 4 6 M16 12 L16 24 M21 12 L20 24 M11 12 L12 24 M12 6 L13 2 19 2 20 6" />
                </svg>&nbsp;&nbsp;Delete</button></center>
        </form>
        </td>
    </tr>   
    @endforeach
    </tbody>
</table>
@stop