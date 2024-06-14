@extends('layouts.main')

@section('title', 'Cosmetics')

@section('content')
<div class="wrapper">
    <h1 class="rule-1">Cosmetics List</h1>
    <a href="/addcosmetics" class="btn btn-success">Add Cosmetics</a>
    <table id="cosmetics-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Jenis</th>
                <th>Merek</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cs as $cosmetic)
            <tr>
                <td>{{ $cosmetic->id }}</td>
                <td>{{ $cosmetic->name }}</td>
                <td>{{ $cosmetic->jenis }}</td>
                <td>{{ $cosmetic->merek }}</td>
                <td><img src="{{ asset('storage/' . $cosmetic->foto) }}" alt="Foto" width="100"></td>
                <td>
                    <a href="/editcosmetics/{{ $cosmetic->id }}" class="btn btn-primary">Edit</a>
                    <form action="/deletecosmetics/{{ $cosmetic->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
