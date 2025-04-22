
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">My Account</h4>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm"
                       onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')) document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Welcome, {{ $user->name }} 👋</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Account Created:</strong> {{ $user->created_at->format('F d, Y') }}</p>

                    <hr>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="#" class="btn btn-outline-primary">Edit Profile</a>
                        <a href="#" class="btn btn-outline-secondary">Change Password</a>
                        <a href="#" class="btn btn-outline-info">My Orders</a>
                    </div>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>

<style>
    body {
    background: #f4f6f9;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    margin-top: 50px;
}

.card {
    border: none;
    border-radius: 15px;
    background: #ffffff;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.card-header {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    background: linear-gradient(to right, #4b6cb7, #182848);
    color: white;
    font-weight: bold;
}

.card-body {
    padding: 2rem;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333;
}

.card-text {
    font-size: 1rem;
    color: #555;
    margin-bottom: 1rem;
}

.btn {
    border-radius: 30px;
    padding: 10px 20px;
    transition: 0.3s all ease-in-out;
}

.btn-outline-primary:hover,
.btn-outline-secondary:hover,
.btn-outline-info:hover {
    transform: scale(1.05);
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}

</style>