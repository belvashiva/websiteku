@extends('layouts.main', ['key' => 'cosmetics'])


@section('title', 'Ubah Kata Sandi')

@section('content')
<div class="card">
    <div class="card-header">Ubah Kata Sandi</div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/change-password" method="post">
            @csrf
            <div class="form-group">
                <label>Kata Sandi Saat Ini</label>
                <input type="password" name="current_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kata Sandi Baru</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Konfirmasi Kata Sandi Baru</label>
                <input type="password" name="new_password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
        </form>
    </div>
</div>
@endsection
