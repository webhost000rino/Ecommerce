<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .register-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 30px;
            color: #333;
            font-size: 26px;
            font-weight: 600;
        }

        .input-group {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 15px 40px 15px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #fafafa;
            box-sizing: border-box;
            outline: none;
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            cursor: pointer;
        }

        .register-button {
            width: 100%;
            padding: 15px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register-button:hover {
            background-color: #357ae8;
        }

        /* HIDE default browser password toggle icon */
        input::-ms-reveal,
        input::-ms-clear {
            display: none;
        }
        input::-webkit-contacts-auto-fill-button,
        input::-webkit-credentials-auto-fill-button {
            visibility: hidden;
            display: none;
            pointer-events: none;
            position: absolute;
            right: 0;
        }

        .login-text {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link {
            color: #4285f4;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <img src="{{ asset('image/logo.png') }}" alt="Logo" width="100px" height="100px">
        <h2>Create Your Account</h2>
        
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="email" name="email" class="input-field" placeholder="Email" value="{{ old('email') }}" required>
                <i class="fa fa-envelope"></i>
            </div>

            <div class="input-group">
                <input type="password" name="password" class="input-field password" placeholder="Password" required>
                <i class="fa fa-eye toggle-password"></i>
            </div>

            <div class="input-group">
                <input type="password" name="password_confirmation" class="input-field password" placeholder="Confirm Password" required>
                <i class="fa fa-eye toggle-password"></i>
            </div>

            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            @error('password_confirmation')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit" class="register-button">Sign up</button>
        </form>

        <div class="login-text">
            <p>Already have an account? <a href="{{ route('login') }}" class="login-link">Sign in</a></p>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', function() {
                let passwordField = this.previousElementSibling;
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });
    </script>
</body>
</html>
