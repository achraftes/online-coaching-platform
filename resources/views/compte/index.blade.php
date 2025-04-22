<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-4 overflow-hidden">
                <div class="card-header d-flex justify-content-between align-items-center px-4 py-3 bg-gradient-primary">
                    <h4 class="mb-0 text-white">My Account</h4>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm px-4"
                       onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')) document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Welcome back, <strong>{{ $user->name }}</strong> 👋</h5>
                    <p class="card-text mb-2"><i class="fas fa-envelope me-2"></i><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text"><i class="fas fa-calendar-alt me-2"></i><strong>Joined:</strong> {{ $user->created_at->format('F d, Y') }}</p>

                    <hr class="my-4">

                    <div class="d-flex justify-content-around flex-wrap gap-3">
                        <a href="#" class="btn btn-outline-primary px-4 py-2">Edit Profile</a>
                        <a href="#" class="btn btn-outline-secondary px-4 py-2">Change Password</a>
                        <a href="#" class="btn btn-outline-info px-4 py-2">My Orders</a>
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
        background: #f0f2f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        background-color: #fff;
        border: none;
        border-radius: 20px;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
    }

    .card-title {
        font-size: 1.7rem;
        color: #333;
    }

    .card-text {
        font-size: 1.1rem;
        color: #555;
    }

    .btn {
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-outline-primary,
    .btn-outline-secondary,
    .btn-outline-info {
        min-width: 150px;
        text-align: center;
    }

    @media (max-width: 576px) {
        .card-title {
            font-size: 1.3rem;
        }

        .btn {
            width: 100%;
        }
    }
</style>
