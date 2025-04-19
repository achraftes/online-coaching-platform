@extends('layouts.app')

@section('content')
    <div class="login-container">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="login-btn">Login</button>
            </div>
        </form>
    </div>
@endsection
