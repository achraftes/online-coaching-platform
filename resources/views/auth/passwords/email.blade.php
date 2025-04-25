<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Your Password</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Global styles */
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        /* Main container */
        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Card styling */
        .card {
            width: 100%;
            max-width: 450px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Card header */
        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        /* Title in the header */
        .card-header h4 {
            margin-bottom: 0;
        }

        /* Card body */
        .card-body {
            padding: 30px;
            background-color: #fff;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        /* Input fields with label */
        .form-floating {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 14px;
        }

        /* Buttons */
        .btn-lg {
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

        /* Button grid */
        .d-grid {
            display: grid;
            gap: 12px;
        }

        /* Success alert */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center rounded-top-4">
                <h4 class="mb-0"><i class="fas fa-key me-2"></i>{{ __('Reset Your Password') }}</h4>
            </div>

            <div class="card-body p-4">
                @if (session('status'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-floating mb-4">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">{{ __('Email Address') }}</label>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>{{ __('Send Password Reset Link') }}
                        </button>
                        <a href="{{ route('compte.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>{{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
