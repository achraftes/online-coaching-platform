<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Your </title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Global styles */
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            font-family: 'Poppins', sans-serif;
            color: #2d3748;
            min-height: 100vh;
        }

        /* Main container */
        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Logo area */
        .logo-area {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo-area img {
            max-height: 50px;
        }

        /* Card styling */
        .card {
            width: 100%;
            max-width: 480px;
            border-radius: 16px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        /* Card header */
        .card-header {
            background: linear-gradient(to right, #4776E6, #8E54E9);
            color: #fff;
            text-align: center;
            padding: 1.8rem 1.5rem;
            border-bottom: none;
        }

        .card-header h3 {
            margin-bottom: 0;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .card-header .icon {
            background-color: rgba(255, 255, 255, 0.2);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        /* Card body */
        .card-body {
            padding: 2.5rem;
            background-color: #fff;
        }

        /* Form elements */
        .form-floating {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 1rem 0.75rem;
            font-size: 1rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            height: 58px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #8E54E9;
            box-shadow: 0 0 0 3px rgba(142, 84, 233, 0.15);
            background-color: #fff;
        }

        .form-floating label {
            padding: 1rem 0.75rem;
            color: #64748b;
        }

        .invalid-feedback {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        /* Buttons */
        .btn {
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(to right, #4776E6, #8E54E9);
            border: none;
            box-shadow: 0 4px 15px rgba(71, 118, 230, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #3967d7, #7f45da);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(71, 118, 230, 0.4);
        }

        .btn-outline-secondary {
            border: 1px solid #cbd5e0;
            color: #4a5568;
        }

        .btn-outline-secondary:hover {
            background-color: #f7fafc;
            color: #2d3748;
            border-color: #a0aec0;
        }

        /* Button container */
        .btn-container {
            display: grid;
            gap: 1rem;
        }

        /* Success alert */
        .alert-success {
            background-color: #c6f6d5;
            color: #276749;
            border: none;
            border-radius: 9px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .alert-success i {
            font-size: 1.25rem;
            margin-right: 0.75rem;
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        /* Footer */
        .card-footer {
            background-color: #fff;
            border-top: 1px solid #f0f4f8;
            padding: 1.2rem 2.5rem;
            text-align: center;
            color: #718096;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="icon">
                    <i class="fas fa-lock fa-lg"></i>
                </div>
                <h3>{{ __('Reset Your Password') }}</h3>
                <p class="mb-0 mt-2 text-white-50">Enter your email to receive a reset link</p>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-floating">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">{{ __('Email Address') }}</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="btn-container mt-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-paper-plane me-2"></i>{{ __('Send Password Reset Link') }}
                        </button>
                        <a href="{{ route('compte.index') }}" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i>{{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
            
            <div class="card-footer">
                <p class="mb-0">Need assistance? <a href="{{ route('support.contact') }}" class="text-decoration-none">Contact Support</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>