@extends('layouts.main')

@section('title', 'Add Cosmetics')

@section('content')
<div class="wrapper">
    <h1 class="rule-1">Add Cosmetics</h1>
    <form action="/savecosmetics" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis:</label>
            <input type="text" name="jenis" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="merek">Merek:</label>
            <input type="text" name="merek" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
