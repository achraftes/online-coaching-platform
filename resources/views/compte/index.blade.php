<div class="container">
    <h1>Welcome to Your Account, {{ $user->name }}!</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p>Account created on: {{ $user->created_at->format('d M Y') }}</p>

    <a href="{{ route('logout') }}" class="btn btn-danger mt-3"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>