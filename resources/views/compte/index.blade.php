<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
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
            cursor: pointer;
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
        
        /* Conversation view styles */
        .conversation-header {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .conversation-back {
            margin-right: 15px;
            cursor: pointer;
            color: #0a66c2;
        }
        
        .conversation-title {
            font-weight: 600;
            margin: 0;
        }
        
        .conversation-body {
            max-height: 400px;
            overflow-y: auto;
            padding: 15px;
        }
        
        .message-bubble {
            max-width: 80%;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 18px;
            position: relative;
        }
        
        .message-received {
            background-color: #f2f2f2;
            align-self: flex-start;
            border-bottom-left-radius: 5px;
        }
        
        .message-sent {
            background-color: #dcf8c6;
            align-self: flex-end;
            border-bottom-right-radius: 5px;
            margin-left: auto;
        }
        
        .message-timestamp {
            font-size: 11px;
            color: #999;
            margin-top: 2px;
            text-align: right;
        }

        .conversation-input {
            display: flex;
            padding: 10px 15px;
            border-top: 1px solid #e0e0e0;
        }
        
        .conversation-input input {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 8px 15px;
            margin-right: 10px;
        }
        
        .conversation-input button {
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }
        
        /* Notification detail styles */
        .notification-detail {
            padding: 20px;
        }
        
        .notification-detail-header {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 15px;
        }
        
        .notification-detail-time {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }
        
        .notification-detail-content {
            line-height: 1.5;
        }
        
        .notification-actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
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
                <!-- Messages List View -->
                <div id="messages-list-view">
                    <div class="modal-header">
                        <h5 class="modal-title" id="messagesModalLabel">
                            <i class="fas fa-envelope me-2"></i> Messages
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <!-- Message list would typically be loaded dynamically -->
                        <div class="message-item unread" data-conversation-id="1" onclick="showConversation(1, 'John Doe')">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="message-sender">John Doe</div>
                                <div class="message-time">10:30 AM</div>
                            </div>
                            <div class="message-content">Hi there! I'd like to discuss a potential collaboration opportunity...</div>
                        </div>
                        <div class="message-item" data-conversation-id="2" onclick="showConversation(2, 'Sarah Smith')">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="message-sender">Sarah Smith</div>
                                <div class="message-time">Yesterday</div>
                            </div>
                            <div class="message-content">Thank you for your quick response. I'll review the proposal...</div>
                        </div>
                        <div class="message-item" data-conversation-id="3" onclick="showConversation(3, 'Technical Support')">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="message-sender">Technical Support</div>
                                <div class="message-time">April 22</div>
                            </div>
                            <div class="message-content">Your request (#2345) has been resolved. Please let us know if you need further assistance.</div>
                        </div>
                        <div class="message-item" data-conversation-id="4" onclick="showConversation(4, 'Emily Johnson')">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="message-sender">Emily Johnson</div>
                                <div class="message-time">April 20</div>
                            </div>
                            <div class="message-content">I just saw your portfolio and was really impressed with your work...</div>
                        </div>
                        <div class="message-item" data-conversation-id="5" onclick="showConversation(5, 'Michael Chen')">
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
                
                <!-- Conversation View (Initially Hidden) -->
                <div id="conversation-view" style="display: none;">
                    <div class="conversation-header">
                        <div class="conversation-back" onclick="showMessagesList()">
                            <i class="fas fa-arrow-left"></i>
                        </div>
                        <h5 class="conversation-title" id="conversation-title">Conversation</h5>
                    </div>
                    <div class="conversation-body" id="conversation-body">
                        <!-- Messages will be loaded dynamically -->
                    </div>
                    <div class="conversation-input">
                        <input type="text" class="form-control" placeholder="Type a message...">
                        <button class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications Modal -->
    <div class="modal fade" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Notifications List View -->
                <div id="notifications-list-view">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notificationsModalLabel">
                            <i class="fas fa-bell me-2"></i> Notifications
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <!-- Notification list would typically be loaded dynamically -->
                        <div class="notification-item unread" data-notification-id="1" onclick="showNotificationDetail(1)">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="fw-bold">New Connection Request</div>
                                <div class="notification-time">Just now</div>
                            </div>
                            <div class="notification-content">
                                You have a new connection request from <strong>Jane Wilson</strong>.
                            </div>
                        </div>
                        <div class="notification-item unread" data-notification-id="2" onclick="showNotificationDetail(2)">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="fw-bold">Profile View</div>
                                <div class="notification-time">2 hours ago</div>
                            </div>
                            <div class="notification-content">
                                <strong>Alex Thompson</strong> viewed your profile.
                            </div>
                        </div>
                        <div class="notification-item" data-notification-id="3" onclick="showNotificationDetail(3)">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="fw-bold">Event Reminder</div>
                                <div class="notification-time">Yesterday</div>
                            </div>
                            <div class="notification-content">
                                Reminder: You have an upcoming event "<strong>Industry Networking</strong>" tomorrow at 6:00 PM.
                            </div>
                        </div>
                        <div class="notification-item" data-notification-id="4" onclick="showNotificationDetail(4)">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="fw-bold">Message Reaction</div>
                                <div class="notification-time">April 22</div>
                            </div>
                            <div class="notification-content">
                                <strong>Robert Lee</strong> reacted to your message.
                            </div>
                        </div>
                        <div class="notification-item" data-notification-id="5" onclick="showNotificationDetail(5)">
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
                
                <!-- Notification Detail View (Initially Hidden) -->
                <div id="notification-detail-view" style="display: none;">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-bell me-2"></i> <span id="notification-detail-title">Notification</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body notification-detail">
                        <!-- Notification details will be loaded dynamically -->
                        <div id="notification-detail-container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" onclick="showNotificationsList()">Back to Notifications</button>
                        <button type="button" class="btn btn-primary" id="notification-action-button">Mark as Read</button>
                    </div>
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
    <script>
        // JavaScript for Message Conversations
        // JavaScript pour gérer les messages et notifications avec fonctionnalités complètes
document.addEventListener('DOMContentLoaded', function() {
    // === Gestion des Messages ===
    const messagesList = document.getElementById('messages-list-view');
    const conversationView = document.getElementById('conversation-view');
    const messageInput = document.querySelector('.conversation-input input');
    const sendButton = document.querySelector('.conversation-input button');
    const markAllReadMessagesBtn = document.querySelector('#messages-list-view .modal-footer .btn-outline-primary');
    const newMessageBtn = document.querySelector('#messages-list-view .modal-footer .btn-primary');
    
    // Liste des conversations
    const conversations = {
        1: { name: 'John Doe', unread: true, lastMessage: 'Hi there! I\'d like to discuss a potential collaboration opportunity...' },
        2: { name: 'Sarah Smith', unread: false, lastMessage: 'Thank you for your quick response. I\'ll review the proposal...' },
        3: { name: 'Technical Support', unread: false, lastMessage: 'Your request (#2345) has been resolved. Please let us know if you need further assistance.' },
        4: { name: 'Emily Johnson', unread: false, lastMessage: 'I just saw your portfolio and was really impressed with your work...' },
        5: { name: 'Michael Chen', unread: false, lastMessage: 'Following up on our meeting last week. Have you had a chance to review the materials?' }
    };
    
    // Contenu des conversations
    const conversationMessages = {
        1: [
            { sender: 'John Doe', content: 'Hi there! I\'d like to discuss a potential collaboration opportunity with you.', time: '10:30 AM', isSent: false },
            { sender: 'You', content: 'Hello John! I\'m interested in hearing more about this collaboration.', time: '10:32 AM', isSent: true },
            { sender: 'John Doe', content: 'Great! Our company is working on a new project and we need someone with your expertise.', time: '10:35 AM', isSent: false },
            { sender: 'John Doe', content: 'Are you available for a call sometime this week to discuss details?', time: '10:36 AM', isSent: false },
            { sender: 'You', content: 'Yes, I could do a call. Would Thursday at 3 PM work for you?', time: '10:40 AM', isSent: true },
        ],
        2: [
            { sender: 'Sarah Smith', content: 'Thank you for your quick response. I\'ll review the proposal you sent.', time: 'Yesterday', isSent: false },
            { sender: 'You', content: 'You\'re welcome, Sarah! Let me know if you have any questions about it.', time: 'Yesterday', isSent: true },
            { sender: 'Sarah Smith', content: 'Actually, I was wondering about the timeline for implementation?', time: 'Yesterday', isSent: false },
            { sender: 'You', content: 'We can start as early as next month if that works for you.', time: 'Yesterday', isSent: true },
        ],
        3: [
            { sender: 'Technical Support', content: 'Your request (#2345) has been resolved. Please let us know if you need further assistance.', time: 'April 22', isSent: false },
            { sender: 'You', content: 'Thank you for resolving my issue. Everything seems to be working properly now.', time: 'April 22', isSent: true },
            { sender: 'Technical Support', content: 'Great to hear! Please don\'t hesitate to contact us if you encounter any other problems.', time: 'April 22', isSent: false },
        ],
        4: [
            { sender: 'Emily Johnson', content: 'I just saw your portfolio and was really impressed with your work.', time: 'April 20', isSent: false },
            { sender: 'You', content: 'Thank you for your kind words, Emily! I appreciate it.', time: 'April 20', isSent: true },
            { sender: 'Emily Johnson', content: 'I\'m working on a project that might be a good fit for your skills. Would you be interested in hearing more about it?', time: 'April 20', isSent: false },
            { sender: 'You', content: 'Absolutely! I\'m always open to new projects. Please share more details.', time: 'April 20', isSent: true },
        ],
        5: [
            { sender: 'Michael Chen', content: 'Following up on our meeting last week. Have you had a chance to review the materials?', time: 'April 18', isSent: false },
            { sender: 'You', content: 'Hi Michael, yes I did review them. I think the approach looks promising.', time: 'April 18', isSent: true },
            { sender: 'Michael Chen', content: 'Excellent! So are you interested in joining our team for this project?', time: 'April 18', isSent: false },
            { sender: 'You', content: 'Yes, I\'d be happy to join. When do we start?', time: 'April 18', isSent: true },
            { sender: 'Michael Chen', content: 'We\'re planning to kick off next Monday. I\'ll send you the calendar invite.', time: 'April 18', isSent: false },
        ]
    };

    // Fonction pour afficher la conversation
    function showConversation(conversationId, senderName) {
        // Masquer la liste des messages et afficher la vue de conversation
        messagesList.style.display = 'none';
        conversationView.style.display = 'block';
        
        // Définir le titre de la conversation
        document.getElementById('conversation-title').textContent = senderName;
        
        // Marquer la conversation comme lue
        const messageItem = document.querySelector(`.message-item[data-conversation-id="${conversationId}"]`);
        if (messageItem && messageItem.classList.contains('unread')) {
            messageItem.classList.remove('unread');
            conversations[conversationId].unread = false;
        }
        
        // Effacer les messages précédents
        const conversationBody = document.getElementById('conversation-body');
        conversationBody.innerHTML = '';
        
        // Ajouter les messages de la conversation
        const messages = conversationMessages[conversationId] || [];
        messages.forEach(msg => {
            const messageElement = document.createElement('div');
            messageElement.className = `message-bubble ${msg.isSent ? 'message-sent' : 'message-received'}`;
            
            const messageContent = document.createElement('div');
            messageContent.textContent = msg.content;
            
            const messageTime = document.createElement('div');
            messageTime.className = 'message-timestamp';
            messageTime.textContent = msg.time;
            
            messageElement.appendChild(messageContent);
            messageElement.appendChild(messageTime);
            conversationBody.appendChild(messageElement);
        });
        
        // Faire défiler jusqu'au bas de la conversation
        conversationBody.scrollTop = conversationBody.scrollHeight;
    }
    
    // Fonction pour revenir à la liste des messages
    function showMessagesList() {
        conversationView.style.display = 'none';
        messagesList.style.display = 'block';
    }
    
    // Envoyer un message
    function sendMessage() {
        if (messageInput.value.trim() === '') return;
        
        const conversationBody = document.getElementById('conversation-body');
        
        // Créer un nouvel élément de message
        const messageElement = document.createElement('div');
        messageElement.className = 'message-bubble message-sent';
        
        const messageContent = document.createElement('div');
        messageContent.textContent = messageInput.value;
        
        const messageTime = document.createElement('div');
        messageTime.className = 'message-timestamp';
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes() < 10 ? '0' + now.getMinutes() : now.getMinutes();
        messageTime.textContent = `${hours}:${minutes}`;
        
        messageElement.appendChild(messageContent);
        messageElement.appendChild(messageTime);
        conversationBody.appendChild(messageElement);
        
        // Effacer l'entrée et faire défiler vers le bas
        messageInput.value = '';
        conversationBody.scrollTop = conversationBody.scrollHeight;
        
        // Simuler une réponse après un court délai (pour démonstration uniquement)
        setTimeout(() => {
            const responseElement = document.createElement('div');
            responseElement.className = 'message-bubble message-received';
            
            const responseContent = document.createElement('div');
            responseContent.textContent = 'Merci pour votre message ! Je vous répondrai dès que possible.';
            
            const responseTime = document.createElement('div');
            responseTime.className = 'message-timestamp';
            const responseNow = new Date();
            const responseHours = responseNow.getHours();
            const responseMinutes = responseNow.getMinutes() < 10 ? '0' + responseNow.getMinutes() : responseNow.getMinutes();
            responseTime.textContent = `${responseHours}:${responseMinutes}`;
            
            responseElement.appendChild(responseContent);
            responseElement.appendChild(responseTime);
            conversationBody.appendChild(responseElement);
            
            conversationBody.scrollTop = conversationBody.scrollHeight;
        }, 1000);
    }
    
    // Fonction pour créer un nouveau message
    function createNewMessage() {
        // Créer la modal pour le nouveau message
        const modalHTML = `
            <div class="modal fade" id="newMessageModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="fas fa-pen me-2"></i> New Message
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient" class="form-label">To:</label>
                                <input type="text" class="form-control" id="recipient" placeholder="Enter recipient name">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject:</label>
                                <input type="text" class="form-control" id="subject" placeholder="Enter subject">
                            </div>
                            <div class="mb-3">
                                <label for="messageContent" class="form-label">Message:</label>
                                <textarea class="form-control" id="messageContent" rows="5" placeholder="Type your message here..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="sendNewMessage">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Ajouter la modal au corps du document
        const modalContainer = document.createElement('div');
        modalContainer.innerHTML = modalHTML;
        document.body.appendChild(modalContainer);
        
        // Afficher la modal
        const newMessageModal = new bootstrap.Modal(document.getElementById('newMessageModal'));
        newMessageModal.show();
        
        // Gestionnaire pour le bouton d'envoi
        document.getElementById('sendNewMessage').addEventListener('click', function() {
            const recipient = document.getElementById('recipient').value.trim();
            const subject = document.getElementById('subject').value.trim();
            const content = document.getElementById('messageContent').value.trim();
            
            if (recipient && content) {
                // Simuler l'envoi d'un message
                alert(`Message sent to ${recipient}!`);
                newMessageModal.hide();
                
                // Nettoyer après fermeture
                setTimeout(() => {
                    document.body.removeChild(modalContainer);
                }, 500);
            } else {
                alert('Please enter recipient and message content');
            }
        });
        
        // Nettoyer après fermeture
        document.getElementById('newMessageModal').addEventListener('hidden.bs.modal', function() {
            setTimeout(() => {
                if (document.body.contains(modalContainer)) {
                    document.body.removeChild(modalContainer);
                }
            }, 500);
        });
    }
    
    // Fonction pour marquer tous les messages comme lus
    function markAllMessagesAsRead() {
        const unreadMessages = document.querySelectorAll('.message-item.unread');
        unreadMessages.forEach(item => {
            item.classList.remove('unread');
            const id = item.getAttribute('data-conversation-id');
            if (conversations[id]) {
                conversations[id].unread = false;
            }
        });
        
        alert('All messages marked as read');
    }
    
    // === Gestion des Notifications ===
    const notificationsList = document.getElementById('notifications-list-view');
    const notificationDetailView = document.getElementById('notification-detail-view');
    const markAllReadNotificationsBtn = document.querySelector('#notifications-list-view .modal-footer .btn-outline-primary');
    const notificationSettingsBtn = document.querySelector('#notifications-list-view .modal-footer .btn-primary');
    
    // Liste des notifications
    const notifications = {
        1: {
            title: 'New Connection Request',
            time: 'Just now',
            unread: true,
            summary: 'You have a new connection request from Jane Wilson.',
            content: `
                <div class="notification-detail-header">Connection Request from Jane Wilson</div>
                <div class="notification-detail-time">Just now</div>
                <div class="notification-detail-content">
                    <p><strong>Jane Wilson</strong> would like to connect with you on our platform.</p>
                    <p>Jane is a Marketing Director at XYZ Corporation with 8+ years of experience in digital marketing and brand strategy.</p>
                    <div class="notification-actions">
                        <button class="btn btn-primary">Accept</button>
                        <button class="btn btn-outline-secondary">Decline</button>
                    </div>
                </div>
            `,
            actionText: 'Respond Now'
        },
        2: {
            title: 'Profile View',
            time: '2 hours ago',
            unread: true,
            summary: 'Alex Thompson viewed your profile.',
            content: `
                <div class="notification-detail-header">Alex Thompson viewed your profile</div>
                <div class="notification-detail-time">2 hours ago</div>
                <div class="notification-detail-content">
                    <p><strong>Alex Thompson</strong> viewed your profile.</p>
                    <p>Alex is a Product Manager at ABC Technologies. They might be interested in your skills and experience.</p>
                    <p>This is a good opportunity to update your profile and showcase your latest work.</p>
                    <div class="notification-actions">
                        <button class="btn btn-primary">View Alex's Profile</button>
                        <button class="btn btn-outline-primary">Update Your Profile</button>
                    </div>
                </div>
            `,
            actionText: 'View Profile'
        },
        3: {
            title: 'Event Reminder',
            time: 'Yesterday',
            unread: false,
            summary: 'Reminder: You have an upcoming event "Industry Networking" tomorrow at 6:00 PM.',
            content: `
                <div class="notification-detail-header">Industry Networking Event</div>
                <div class="notification-detail-time">Yesterday</div>
                <div class="notification-detail-content">
                    <p>Reminder: You have registered for the "<strong>Industry Networking</strong>" event.</p>
                    <p><strong>Date:</strong> Tomorrow, April 25, 2025</p>
                    <p><strong>Time:</strong> 6:00 PM - 9:00 PM</p>
                    <p><strong>Location:</strong> Grand Hotel Conference Center, 123 Main Street</p>
                    <p>Don't forget to bring your business cards and be ready to meet industry professionals from various companies.</p>
                    <div class="notification-actions">
                        <button class="btn btn-primary">Add to Calendar</button>
                        <button class="btn btn-outline-primary">View Event Details</button>
                    </div>
                </div>
            `,
            actionText: 'View Event'
        },
        4: {
            title: 'Message Reaction',
            time: 'April 22',
            unread: false,
            summary: 'Robert Lee reacted to your message.',
            content: `
                <div class="notification-detail-header">Robert Lee reacted to your message</div>
                <div class="notification-detail-time">April 22</div>
                <div class="notification-detail-content">
                    <p><strong>Robert Lee</strong> reacted with a 👍 to your message:</p>
                    <blockquote class="p-3 bg-light my-3 border-start border-primary border-4">
                        "Thank you for the detailed feedback on the project proposal. I'll incorporate your suggestions into the next revision."
                    </blockquote>
                    <p>This was in the conversation about the Marketing Strategy Project.</p>
                    <div class="notification-actions">
                        <button class="btn btn-primary">View Conversation</button>
                    </div>
                </div>
            `,
            actionText: 'View Message'
        },
        5: {
            title: 'System Update',
            time: 'April 20',
            unread: false,
            summary: 'We\'ve updated our privacy policy. Please review the changes.',
            content: `
                <div class="notification-detail-header">Privacy Policy Update</div>
                <div class="notification-detail-time">April 20</div>
                <div class="notification-detail-content">
                    <p>We've updated our privacy policy to better protect your data and provide more transparency about how we use information on our platform.</p>
                    <p>Key changes include:</p>
                    <ul>
                        <li>Enhanced data encryption for all communications</li>
                        <li>Updated information sharing policies with third parties</li>
                        <li>New options for managing your data and privacy preferences</li>
                        <li>Clearer explanations of how we use analytics</li>
                    </ul>
                    <p>These changes will take effect on May 1, 2025.</p>
                    <div class="notification-actions">
                        <button class="btn btn-primary">Review Privacy Policy</button>
                        <button class="btn btn-outline-primary">Adjust Settings</button>
                    </div>
                </div>
            `,
            actionText: 'Review Policy'
        }
    };

    // Fonction pour afficher les détails d'une notification
    function showNotificationDetail(notificationId) {
        // Masquer la liste des notifications et afficher la vue de détails
        notificationsList.style.display = 'none';
        notificationDetailView.style.display = 'block';
        
        // Marquer la notification comme lue
        const notificationItem = document.querySelector(`.notification-item[data-notification-id="${notificationId}"]`);
        if (notificationItem && notificationItem.classList.contains('unread')) {
            notificationItem.classList.remove('unread');
            notifications[notificationId].unread = false;
        }
        
        // Obtenir les détails de la notification
        const notification = notifications[notificationId] || {
            title: 'Notification',
            time: '',
            content: 'No details available for this notification.',
            actionText: 'Mark as Read'
        };
        
        // Mettre à jour la vue de détails
        document.getElementById('notification-detail-title').textContent = notification.title;
        document.getElementById('notification-detail-container').innerHTML = notification.content;
        document.getElementById('notification-action-button').textContent = notification.actionText;
        
        // Ajouter des gestionnaires d'événements pour les boutons d'action dans la notification
        setTimeout(() => {
            const actionButtons = document.querySelectorAll('.notification-actions button');
            actionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    alert(`Action '${button.textContent.trim()}' performed!`);
                });
            });
        }, 100);
    }
    
    // Fonction pour revenir à la liste des notifications
    function showNotificationsList() {
        notificationDetailView.style.display = 'none';
        notificationsList.style.display = 'block';
    }
    
    // Fonction pour marquer toutes les notifications comme lues
    function markAllNotificationsAsRead() {
        const unreadNotifications = document.querySelectorAll('.notification-item.unread');
        unreadNotifications.forEach(item => {
            item.classList.remove('unread');
            const id = item.getAttribute('data-notification-id');
            if (notifications[id]) {
                notifications[id].unread = false;
            }
        });
        
        alert('All notifications marked as read');
    }
    
    // Fonction pour ouvrir les paramètres de notification
    function openNotificationSettings() {
        // Créer la modal pour les paramètres de notification
        const modalHTML = `
            <div class="modal fade" id="notificationSettingsModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="fas fa-cog me-2"></i> Notification Settings
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-4">
                                <h6 class="fw-bold mb-3">Email Notifications</h6>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="emailMessages" checked>
                                    <label class="form-check-label" for="emailMessages">Messages</label>
                                </div>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="emailConnections" checked>
                                    <label class="form-check-label" for="emailConnections">Connection requests</label>
                                </div>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="emailProfileViews" checked>
                                    <label class="form-check-label" for="emailProfileViews">Profile views</label>
                                </div>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="emailEvents">
                                    <label class="form-check-label" for="emailEvents">Event reminders</label>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <h6 class="fw-bold mb-3">Push Notifications</h6>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="pushMessages" checked>
                                    <label class="form-check-label" for="pushMessages">Messages</label>
                                </div>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="pushConnections" checked>
                                    <label class="form-check-label" for="pushConnections">Connection requests</label>
                                </div>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="pushProfileViews">
                                    <label class="form-check-label" for="pushProfileViews">Profile views</label>
                                </div>
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="pushEvents" checked>
                                    <label class="form-check-label" for="pushEvents">Event reminders</label>
                                </div>
                            </div>
                            
                            <div>
                                <h6 class="fw-bold mb-3">Notification Frequency</h6>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="notificationFrequency" id="freqRealTime" checked>
                                    <label class="form-check-label" for="freqRealTime">Real-time</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="notificationFrequency" id="freqDaily">
                                    <label class="form-check-label" for="freqDaily">Daily digest</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="notificationFrequency" id="freqWeekly">
                                    <label class="form-check-label" for="freqWeekly">Weekly digest</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="saveNotificationSettings">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Ajouter la modal au corps du document
        const modalContainer = document.createElement('div');
        modalContainer.innerHTML = modalHTML;
        document.body.appendChild(modalContainer);
        
        // Afficher la modal
        const settingsModal = new bootstrap.Modal(document.getElementById('notificationSettingsModal'));
        settingsModal.show();
        
        // Gestionnaire pour le bouton de sauvegarde
        document.getElementById('saveNotificationSettings').addEventListener('click', function() {
            alert('Notification settings saved!');
            settingsModal.hide();
            
            // Nettoyer après fermeture
            setTimeout(() => {
                document.body.removeChild(modalContainer);
            }, 500);
        });
        
        // Nettoyer après fermeture
        document.getElementById('notificationSettingsModal').addEventListener('hidden.bs.modal', function() {
            setTimeout(() => {
                if (document.body.contains(modalContainer)) {
                    document.body.removeChild(modalContainer);
                }
            }, 500);
        });
    }
    
    // === Initialisation des gestionnaires d'événements ===
    
    // Gestionnaires pour l'envoi de messages
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && messageInput.value.trim() !== '') {
            sendMessage();
        }
    });
    
    sendButton.addEventListener('click', function() {
        if (messageInput.value.trim() !== '') {
            sendMessage();
        }
    });
    
    // Gestionnaires pour les boutons du modal de messages
    if (markAllReadMessagesBtn) {
        markAllReadMessagesBtn.addEventListener('click', markAllMessagesAsRead);
    }
    
    if (newMessageBtn) {
        newMessageBtn.addEventListener('click', createNewMessage);
    }
    
    // Gestionnaires pour les boutons du modal de notifications
    if (markAllReadNotificationsBtn) {
        markAllReadNotificationsBtn.addEventListener('click', markAllNotificationsAsRead);
    }
    
    if (notificationSettingsBtn) {
        notificationSettingsBtn.addEventListener('click', openNotificationSettings);
    }
    
    // Initialiser les gestionnaires de clic pour les éléments de message
    document.querySelectorAll('.message-item').forEach(item => {
        item.addEventListener('click', function() {
            const conversationId = this.getAttribute('data-conversation-id');
            const senderName = this.querySelector('.message-sender').textContent;
            showConversation(conversationId, senderName);
        });
    });
    
    // Initialiser les gestionnaires de clic pour les éléments de notification
    document.querySelectorAll('.notification-item').forEach(item => {
        item.addEventListener('click', function() {
            const notificationId = this.getAttribute('data-notification-id');
            showNotificationDetail(notificationId);
        });
    });
    
    // Lier les fonctions aux fonctions globales pour être accessibles depuis le HTML
    window.showConversation = showConversation;
    window.showMessagesList = showMessagesList;
    window.showNotificationDetail = showNotificationDetail;
    window.showNotificationsList = showNotificationsList;
});
    </script>
</body>
</html>