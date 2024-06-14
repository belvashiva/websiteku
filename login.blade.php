@extends('layouts.main')

@section('title', 'Log in')

@section('content')
<div class="wrapper">
    <h1 class="rule-1">Log in</h1>
    <form action="{{ route('login.post') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
      
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
