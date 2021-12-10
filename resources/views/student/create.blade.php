@extends("layouts.app")

@section("content")
<div class="col-md-8 offset-md-2">
    <br>
    <h3><center>Tambah Mahasiswa</center> </h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
        
    @endif

    <form action="{{route('student.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="code">NRP</label>
        <input type="text" class="form-control" name="code">
    </div>

    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label for="gender">Jenis Kelamin</label>
        <div>
        <input type="radio" class="form-control-inline" name="gender" value="P">Pria
        <input type="radio" class="form-control-inline" name="gender" value="W">Wanita
        </div>
    </div>

    <div class="form-group">
        <label for="birth_date">Tanggal Lahir</label>
        <input type="date" class="form-control" name="birth_date">
    </div>

    <div class="form-group">
        <label for="birth_place">Tempat Lahir</label>
        <input type="text" class="form-control" name="birth_place">
    </div>

    <button type="submit" class="btn btn-success"><svg id="i-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
        <path d="M2 20 L12 28 30 4" />
    </svg>&nbsp;&nbsp;Simpan</button>
    </form>
</div>
@stop