@extends('layouts.main')

@section('title', 'Edit Cosmetics')

@section('content')
<div class="wrapper">
    <h1 class="rule-1">Edit Cosmetics</h1>
    <form action="/updatecosmetics/{{ $cosmetics->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $cosmetics->name }}" required>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis:</label>
            <input type="text" name="jenis" class="form-control" value="{{ $cosmetics->jenis }}" required>
        </div>
        <div class="form-group">
            <label for="merek">Merek:</label>
            <input type="text" name="merek" class="form-control" value="{{ $cosmetics->merek }}" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" class="form-control">
            <img src="{{ asset('storage/' . $cosmetics->foto) }}" alt="Foto" width="100">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
