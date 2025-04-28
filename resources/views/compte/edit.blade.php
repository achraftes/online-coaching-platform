<!-- resources/views/compte/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">
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

        .form-section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .btn {
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .profile-img-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 2rem;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .upload-btn-wrapper {
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .upload-btn {
            background-color: #4b6cb7;
            color: white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-btn:hover {
            background-color: #3a5ca8;
        }

        #photoInput {
            display: none;
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

        .form-label {
            font-weight: 500;
        }

        .alert {
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="page-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <a href="{{ route('compte.index') }}" class="home-link">
                        <i class="fas fa-arrow-left me-2"></i>
                        <h3 class="text-white mb-0">Back to My Account</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mt-4">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-section">
            <h4 class="text-center mb-4">Edit Your Compte</h4>

            <!-- Photo Upload Form -->
            <form action="{{ route('compte.updatePhoto') }}" method="POST" enctype="multipart/form-data" id="photoForm">
                @csrf
                <div class="profile-img-container">
                    <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : asset('images/21 avr. 2025, 22_36_05.png') }}" 
                         alt="Profile Photo" class="profile-img" id="previewImage">
                    <div class="upload-btn-wrapper">
                        <div class="upload-btn" onclick="document.getElementById('photoInput').click()">
                            <i class="fas fa-camera"></i>
                        </div>
                        <input type="file" name="photo" id="photoInput" accept="image/*" onchange="previewPhoto(this)">
                    </div>
                </div>
                <div class="text-center mb-4">
                    <button type="submit" class="btn btn-primary px-4">Update Photo</button>
                </div>
            </form>

            <!-- Profile Info Form -->
            <form action="{{ route('compte.update') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $user->full_name ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nick_name" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="nick_name" name="nick_name" value="{{ $user->nick_name ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="" {{ $user->gender == null ? 'selected' : '' }}>Select Gender</option>
                            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            <option value="Prefer not to say" {{ $user->gender == 'Prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{ $user->country ?? '' }}">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="language" class="form-label">Language</label>
                        <select class="form-select" id="language" name="language">
                            <option value="" {{ $user->language == null ? 'selected' : '' }}>Select Language</option>
                            <option value="English" {{ $user->language == 'English' ? 'selected' : '' }}>English</option>
                            <option value="French" {{ $user->language == 'French' ? 'selected' : '' }}>French</option>
                            <option value="Spanish" {{ $user->language == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                            <option value="German" {{ $user->language == 'German' ? 'selected' : '' }}>German</option>
                            <option value="Italian" {{ $user->language == 'Italian' ? 'selected' : '' }}>Italian</option>
                            <option value="Portuguese" {{ $user->language == 'Portuguese' ? 'selected' : '' }}>Portuguese</option>
                            <option value="Arabic" {{ $user->language == 'Arabic' ? 'selected' : '' }}>Arabic</option>
                            <option value="Chinese" {{ $user->language == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="time_zone" class="form-label">Time Zone</label>
                        <select class="form-select" id="time_zone" name="time_zone">
                            <option value="" {{ $user->time_zone == null ? 'selected' : '' }}>Select Time Zone</option>
                            <option value="UTC-12:00" {{ $user->time_zone == 'UTC-12:00' ? 'selected' : '' }}>UTC-12:00</option>
                            <option value="UTC-11:00" {{ $user->time_zone == 'UTC-11:00' ? 'selected' : '' }}>UTC-11:00</option>  
                            <option value="UTC-10:00" {{ $user->time_zone == 'UTC-10:00' ? 'selected' : '' }}>UTC-10:00</option>
                            <option value="UTC-09:00" {{ $user->time_zone == 'UTC-09:00' ? 'selected' : '' }}>UTC-09:00</option>
                            <option value="UTC-08:00" {{ $user->time_zone == 'UTC-08:00' ? 'selected' : '' }}>UTC-08:00</option>
                            <option value="UTC-07:00" {{ $user->time_zone == 'UTC-07:00' ? 'selected' : '' }}>UTC-07:00</option>
                            <option value="UTC-06:00" {{ $user->time_zone == 'UTC-06:00' ? 'selected' : '' }}>UTC-06:00</option>
                            <option value="UTC-05:00" {{ $user->time_zone == 'UTC-05:00' ? 'selected' : '' }}>UTC-05:00</option>
                            <option value="UTC-04:00" {{ $user->time_zone == 'UTC-04:00' ? 'selected' : '' }}>UTC-04:00</option>
                            <option value="UTC-03:00" {{ $user->time_zone == 'UTC-03:00' ? 'selected' : '' }}>UTC-03:00</option>
                            <option value="UTC-02:00" {{ $user->time_zone == 'UTC-02:00' ? 'selected' : '' }}>UTC-02:00</option>
                            <option value="UTC-01:00" {{ $user->time_zone == 'UTC-01:00' ? 'selected' : '' }}>UTC-01:00</option>
                            <option value="UTC+00:00" {{ $user->time_zone == 'UTC+00:00' ? 'selected' : '' }}>UTC+00:00</option>
                            <option value="UTC+01:00" {{ $user->time_zone == 'UTC+01:00' ? 'selected' : '' }}>UTC+01:00</option>
                            <option value="UTC+02:00" {{ $user->time_zone == 'UTC+02:00' ? 'selected' : '' }}>UTC+02:00</option>
                            <option value="UTC+03:00" {{ $user->time_zone == 'UTC+03:00' ? 'selected' : '' }}>UTC+03:00</option>
                            <option value="UTC+04:00" {{ $user->time_zone == 'UTC+04:00' ? 'selected' : '' }}>UTC+04:00</option>
                            <option value="UTC+05:00" {{ $user->time_zone == 'UTC+05:00' ? 'selected' : '' }}>UTC+05:00</option>
                            <option value="UTC+06:00" {{ $user->time_zone == 'UTC+06:00' ? 'selected' : '' }}>UTC+06:00</option>
                            <option value="UTC+07:00" {{ $user->time_zone == 'UTC+07:00' ? 'selected' : '' }}>UTC+07:00</option>
                            <option value="UTC+08:00" {{ $user->time_zone == 'UTC+08:00' ? 'selected' : '' }}>UTC+08:00</option>
                            <option value="UTC+09:00" {{ $user->time_zone == 'UTC+09:00' ? 'selected' : '' }}>UTC+09:00</option>
                            <option value="UTC+10:00" {{ $user->time_zone == 'UTC+10:00' ? 'selected' : '' }}>UTC+10:00</option>
                            <option value="UTC+11:00" {{ $user->time_zone == 'UTC+11:00' ? 'selected' : '' }}>UTC+11:00</option>
                            <option value="UTC+12:00" {{ $user->time_zone == 'UTC+12:00' ? 'selected' : '' }}>UTC+12:00</option>
                        </select>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('compte.index') }}" class="btn btn-outline-secondary me-md-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewPhoto(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>