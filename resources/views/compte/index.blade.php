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
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .page-header {
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            padding: 1.5rem 0;
        }

        .profile-section {
            background-color: #fff;
            border-bottom: 1px solid #e6e6e6;
            padding: 2rem 0;
        }

        .section {
            padding: 2rem 0;
            border-bottom: 1px solid #e6e6e6;
        }

        .action-buttons {
            background-color: #f8f9fa;
            padding: 1.5rem 0;
        }

        .profile-details {
            background-color: #fff;
            padding: 2rem 0;
        }

        .btn {
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .detail-row {
            padding: 0.8rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 3px solid #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        .section-title {
            font-weight: 600;
            color: #4b6cb7;
            margin-bottom: 1.5rem;
        }

        .home-link {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .home-link:hover {
            color: #f0f0f0;
            transform: translateX(-3px);
        }

        @media (max-width: 768px) {
            .profile-img {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="page-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h3 class="text-white mb-0">My Account</h3>
                </div>
                <a href="{{ route('logout') }}" class="btn logout-btn px-4 py-2"
                   onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')) document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="profile-section">
        <div class="container">
            <div class="d-flex align-items-center flex-wrap">
                <div class="me-4 mb-3 mb-md-0">
                    <img src="{{ asset('images/21 avr. 2025, 22_36_05.png ') }}" alt="Profile Photo" class="rounded-circle profile-img">
                </div>
                <div>
                    <h4 class="mb-2">Welcome back, <strong>{{ $user->full_name ?? $user->name }}</strong> 👋</h4>
                    <p class="mb-1"><i class="fas fa-envelope me-2 text-secondary"></i>{{ $user->email }}</p>
                    <p class="mb-0"><i class="fas fa-calendar-alt me-2 text-secondary"></i>Joined: {{ $user->created_at->format('F d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
        <div class="container">
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('compte.updateProfile') }}" class="btn btn-primary px-4 py-2">
                    <i class="fas fa-user-edit me-2"></i>Edit Profile
                </a>
                <a href="{{ route('password.request') }}" class="btn btn-secondary px-4 py-2">
                    <i class="fas fa-key me-2"></i>Change Password
                </a>
                <a href="/" class="btn btn-outline-primary px-4 py-2">
                    <i class="fas fa-home me-2"></i>Return to Home
                </a>
            </div>
        </div>
    </div>

    <!-- Profile Details -->
    <div class="profile-details">
        <div class="container">
            <h5 class="section-title">Profile Details</h5>
            
            <div class="row detail-row">
                <div class="col-md-4 col-lg-3 fw-bold">Full Name</div>
                <div class="col-md-8 col-lg-9">{{ $user->full_name ?? 'Not set' }}</div>
            </div>
            
            <div class="row detail-row">
                <div class="col-md-4 col-lg-3 fw-bold">Nickname</div>
                <div class="col-md-8 col-lg-9">{{ $user->nick_name ?? 'Not set' }}</div>
            </div>
            
            <div class="row detail-row">
                <div class="col-md-4 col-lg-3 fw-bold">Gender</div>
                <div class="col-md-8 col-lg-9">{{ $user->gender ?? 'Not set' }}</div>
            </div>
            
            <div class="row detail-row">
                <div class="col-md-4 col-lg-3 fw-bold">Country</div>
                <div class="col-md-8 col-lg-9">{{ $user->country ?? 'Not set' }}</div>
            </div>
            
            <div class="row detail-row">
                <div class="col-md-4 col-lg-3 fw-bold">Language</div>
                <div class="col-md-8 col-lg-9">{{ $user->language ?? 'Not set' }}</div>
            </div>
            
            <div class="row detail-row">
                <div class="col-md-4 col-lg-3 fw-bold">Time Zone</div>
                <div class="col-md-8 col-lg-9">{{ $user->time_zone ?? 'Not set' }}</div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>