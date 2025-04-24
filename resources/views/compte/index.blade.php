<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte Professionnel</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f2ef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 0.5rem 0;
        }
        
        .navbar-brand {
            font-weight: 600;
            color: #0a66c2;
        }
        
        .navbar-toggler {
            border: none;
        }
        
        .profile-header {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            margin-top: 20px;
            overflow: hidden;
            position: relative;
        }
        
        .profile-cover {
            height: 200px;
            background: linear-gradient(135deg, #0a66c2 0%, #0077b5 100%);
            position: relative;
        }
        
        .profile-img-container {
            position: relative;
            margin-top: -75px;
            margin-left: 30px;
            margin-bottom: 15px;
        }
        
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid white;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .edit-photo {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: white;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .edit-photo:hover {
            background-color: #f3f2ef;
        }
        
        .profile-info {
            padding: 0 30px 30px;
        }
        
        .profile-name {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #191919;
        }
        
        .profile-headline {
            color: #666;
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .profile-location {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .profile-section {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            margin-top: 20px;
            padding: 25px 30px;
        }
        
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #191919;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn-edit {
            background-color: transparent;
            border: 1px solid #0a66c2;
            color: #0a66c2;
            border-radius: 30px;
            padding: 6px 16px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        
        .btn-edit:hover {
            background-color: rgba(10, 102, 194, 0.1);
        }
        
        .btn-primary {
            background-color: #0a66c2;
            border: none;
            border-radius: 30px;
            padding: 8px 24px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        .btn-primary:hover {
            background-color: #004182;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .btn-outline-primary {
            border: 1px solid #0a66c2;
            color: #0a66c2;
            border-radius: 30px;
            padding: 8px 24px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        .btn-outline-primary:hover {
            background-color: rgba(10, 102, 194, 0.1);
            border: 1px solid #0a66c2;
            color: #0a66c2;
        }
        
        .btn-danger {
            background-color: white;
            border: 1px solid #ca0c0c;
            color: #ca0c0c;
            border-radius: 30px;
            padding: 8px 24px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        .btn-danger:hover {
            background-color: rgba(202, 12, 12, 0.1);
            color: #ca0c0c;
        }
        
        .detail-row {
            padding: 12px 0;
            border-bottom: 1px solid #f3f2ef;
            display: flex;
            flex-wrap: wrap;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 600;
            color: #666;
            width: 180px;
            margin-right: 20px;
        }
        
        .detail-value {
            flex: 1;
            color: #191919;
        }
        
        .activity-section {
            margin-top: 10px;
        }
        
        .footer {
            background-color: white;
            padding: 20px 0;
            margin-top: 40px;
            border-top: 1px solid #e0e0e0;
            font-size: 14px;
            color: #666;
        }
        
        /* Message and Notification styles */
        .message-item, .notification-item {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
            transition: all 0.2s ease;
        }

        .message-item:hover, .notification-item:hover {
            background-color: #f3f2ef;
        }

        .message-item:last-child, .notification-item:last-child {
            border-bottom: none;
        }

        .message-sender {
            font-weight: 600;
            color: #191919;
        }

        .message-time, .notification-time {
            font-size: 12px;
            color: #666;
        }

        .notification-content {
            margin-top: 5px;
        }

        .unread {
            background-color: rgba(10, 102, 194, 0.05);
            position: relative;
        }

        .unread::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background-color: #0a66c2;
        }
        
        .modal-header {
            border-bottom: 1px solid #e0e0e0;
        }
        
        .modal-footer {
            border-top: 1px solid #e0e0e0;
        }
        
        @media (max-width: 768px) {
            .profile-img {
                width: 120px;
                height: 120px;
            }
            
            .profile-img-container {
                margin-top: -60px;
                margin-left: 20px;
            }
            
            .profile-info {
                padding: 0 20px 20px;
            }
            
            .detail-label {
                width: 100%;
                margin-bottom: 5px;
            }
            
            .detail-value {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                My Professional Profile
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-home me-1"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#notificationsModal">
                            <i class="fas fa-bell me-1"></i> Notifications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#messagesModal">
                            <i class="fas fa-envelope me-1"></i> Messages
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> {{ $user->full_name ?? $user->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('compte.edit') }}">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('password.request') }}">Change Password</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')) document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-cover"></div>
            <div class="profile-img-container">
                <img src="{{ asset('images/21 avr. 2025, 22_36_05.png ') }}" alt="Profile Photo" class="profile-img">
                <div class="edit-photo">
                    <i class="fas fa-camera"></i>
                </div>
            </div>
            <div class="profile-info">
                <h1 class="profile-name">{{ $user->full_name ?? $user->name }}</h1>
                <p class="profile-headline">{{ $user->title ?? 'Professional Title' }}</p>
                <p class="profile-location">
                    <i class="fas fa-map-marker-alt me-2"></i> {{ $user->country ?? 'Location' }}
                    <span class="mx-2">•</span>
                    <i class="fas fa-globe me-2"></i> {{ $user->language ?? 'Language' }}
                </p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="{{ route('compte.edit') }}" class="btn btn-primary">
                        <i class="fas fa-pen me-1"></i> Edit Profile
                    </a>
                    <a href="{{ route('password.request') }}" class="btn btn-outline-primary">
                        <i class="fas fa-key me-1"></i> Change Password
                    </a>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="profile-section">
            <div class="section-title">
                <span>About</span>
                <a href="#" class="btn-edit"><i class="fas fa-pen"></i></a>
            </div>
            <p>{{ $user->about ?? 'No information provided yet. Add a brief description about yourself to help others learn more about you.' }}</p>
        </div>

        <!-- Profile Details -->
        <div class="profile-section">
            <div class="section-title">
                <span>Profile Details</span>
                <a href="{{ route('compte.edit') }}" class="btn-edit"><i class="fas fa-pen"></i></a>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">Full Name</div>
                <div class="detail-value">{{ $user->full_name ?? 'Not set' }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">Nickname</div>
                <div class="detail-value">{{ $user->nick_name ?? 'Not set' }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">Email</div>
                <div class="detail-value">{{ $user->email }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">Gender</div>
                <div class="detail-value">{{ $user->gender ?? 'Not set' }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">Country</div>
                <div class="detail-value">{{ $user->country ?? 'Not set' }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">Language</div>
                <div class="detail-value">{{ $user->language ?? 'Not set' }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">Time Zone</div>
                <div class="detail-value">{{ $user->time_zone ?? 'Not set' }}</div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">Member Since</div>
                <div class="detail-value">{{ $user->created_at->format('F d, Y') }}</div>
            </div>
        </div>

        <!-- Account Management -->
        <div class="profile-section">
            <div class="section-title">Account Management</div>
            <div class="d-flex flex-wrap gap-3 mt-3">
                <a href="/" class="btn btn-outline-primary">
                    <i class="fas fa-home me-1"></i> Return to Home
                </a>
                <a href="{{ route('logout') }}" class="btn btn-danger"
                   onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')) document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Messages Modal -->
    <div class="modal fade" id="messagesModal" tabindex="-1" aria-labelledby="messagesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messagesModalLabel">
                        <i class="fas fa-envelope me-2"></i> Messages
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <!-- Message list would typically be loaded dynamically -->
                    <div class="message-item unread">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="message-sender">John Doe</div>
                            <div class="message-time">10:30 AM</div>
                        </div>
                        <div class="message-content">Hi there! I'd like to discuss a potential collaboration opportunity...</div>
                    </div>
                    <div class="message-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="message-sender">Sarah Smith</div>
                            <div class="message-time">Yesterday</div>
                        </div>
                        <div class="message-content">Thank you for your quick response. I'll review the proposal...</div>
                    </div>
                    <div class="message-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="message-sender">Technical Support</div>
                            <div class="message-time">April 22</div>
                        </div>
                        <div class="message-content">Your request (#2345) has been resolved. Please let us know if you need further assistance.</div>
                    </div>
                    <div class="message-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="message-sender">Emily Johnson</div>
                            <div class="message-time">April 20</div>
                        </div>
                        <div class="message-content">I just saw your portfolio and was really impressed with your work...</div>
                    </div>
                    <div class="message-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="message-sender">Michael Chen</div>
                            <div class="message-time">April 18</div>
                        </div>
                        <div class="message-content">Following up on our meeting last week. Have you had a chance to review the materials?</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary">Mark All Read</button>
                    <button type="button" class="btn btn-primary">New Message</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications Modal -->
    <div class="modal fade" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationsModalLabel">
                        <i class="fas fa-bell me-2"></i> Notifications
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <!-- Notification list would typically be loaded dynamically -->
                    <div class="notification-item unread">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="fw-bold">New Connection Request</div>
                            <div class="notification-time">Just now</div>
                        </div>
                        <div class="notification-content">
                            You have a new connection request from <strong>Jane Wilson</strong>.
                        </div>
                    </div>
                    <div class="notification-item unread">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Profile View</div>
                            <div class="notification-time">2 hours ago</div>
                        </div>
                        <div class="notification-content">
                            <strong>Alex Thompson</strong> viewed your profile.
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Event Reminder</div>
                            <div class="notification-time">Yesterday</div>
                        </div>
                        <div class="notification-content">
                            Reminder: You have an upcoming event "<strong>Industry Networking</strong>" tomorrow at 6:00 PM.
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Message Reaction</div>
                            <div class="notification-time">April 22</div>
                        </div>
                        <div class="notification-content">
                            <strong>Robert Lee</strong> reacted to your message.
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="fw-bold">System Update</div>
                            <div class="notification-time">April 20</div>
                        </div>
                        <div class="notification-content">
                            We've updated our privacy policy. Please review the changes.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary">Mark All Read</button>
                    <button type="button" class="btn btn-primary">Settings</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">© 2025 My Professional Profile. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-muted me-3">Privacy Policy</a>
                    <a href="#" class="text-muted">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>