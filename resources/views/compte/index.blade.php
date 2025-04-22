<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
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

        .list-group-item {
            font-size: 1rem;
            border-left: none;
            border-right: none;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .list-group {
            border: none;
        }

        .rounded-circle {
            object-fit: cover;
        }

        @media (max-width: 576px) {
            .card-title {
                font-size: 1.3rem;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }

            .list-group-item {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
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
                        <div class="d-flex align-items-center mb-4">
                            <div class="me-3">
                                <img src="{{ asset('images/21 avr. 2025, 22_36_05.png ') }}" alt="Profile Photo" class="rounded-circle" width="80" height="80">
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Welcome back, <strong>{{ $user->full_name ?? $user->name }}</strong> 👋</h5>
                                <p class="card-text mb-2"><i class="fas fa-envelope me-2"></i><strong>Email:</strong> {{ $user->email }}</p>
                                <p class="card-text"><i class="fas fa-calendar-alt me-2"></i><strong>Joined:</strong> {{ $user->created_at->format('F d, Y') }}</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-around flex-wrap gap-3">
                            <a href="{{ route('compte.updateProfile') }}" class="btn btn-outline-primary px-4 py-2">Edit Profile</a>
                            <a href="{{ route('password.request') }}" class="btn btn-outline-secondary px-4 py-2">Change Password</a>
                        </div>

                        <hr class="my-4">

                        <h6 class="mb-3">Profile Details</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Full Name:</strong> {{ $user->full_name ?? 'Not set' }}</li>
                            <li class="list-group-item"><strong>Nickname:</strong> {{ $user->nick_name ?? 'Not set' }}</li>
                            <li class="list-group-item"><strong>Gender:</strong> {{ $user->gender ?? 'Not set' }}</li>
                            <li class="list-group-item"><strong>Country:</strong> {{ $user->country ?? 'Not set' }}</li>
                            <li class="list-group-item"><strong>Language:</strong> {{ $user->language ?? 'Not set' }}</li>
                            <li class="list-group-item"><strong>Time Zone:</strong> {{ $user->time_zone ?? 'Not set' }}</li>
                        </ul>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>