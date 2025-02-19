<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', serif;
            background-color: #f0f4f8;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
            text-align: center;
        }

        .input-container {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 15px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #fafafa;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .input-field:focus {
            border-color: #4285f4;
            background-color: #fff;
            outline: none;
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

        .icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            cursor: pointer;
        }

        .login-button {
            width: 100%;
            padding: 15px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .register-text {
            margin-top: 15px;
            font-size: 14px;
        }

         /* Remember Me and Forgot Password */
         .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .forgot-password {
            font-size: 14px;
            color: #4285f4;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Error Message */
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

         /* Register Link */
         .register-link {
            font-size: 14px;
            color: #4285f4;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        /* Text Container */
        .register-text {
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('image/logo.png') }}" alt="Logo" class="logo" width="100px" height="100px">
        <h2>Sign in</h2>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-container">
                <input type="email" name="email" id="email" class="input-field" placeholder="Email" value="{{ old('email') }}" required>
                <i class="fas fa-envelope icon"></i>
            </div>

            <div class="input-container">
                <input type="password" name="password" id="password" class="input-field" placeholder="Password" required>
                <i class="fas fa-eye icon" id="togglePassword"></i>
            </div>

            <div class="remember-forgot">
                <!-- Remember Me Checkbox -->
                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember" style="margin-right: 8px;">
                    <label for="remember">Remember me</label>
                </div>

                <!-- Forgot Password Link -->
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>

            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit" class="login-button">Sign in</button>
        </form>

        <div class="register-text" id="registerText">
            <p>Don't have an account? <a href="{{ route('register') }}" class="register-link">Sign up</a></p>
        </div>
    </div>

    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            var passwordField = document.getElementById("password");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            }
        });

        document.getElementById("email").addEventListener("input", function () {
            let email = this.value.toLowerCase(); // Konversi ke lowercase agar pencocokan tidak case-sensitive
            let registerText = document.getElementById("registerText");

            if (email.includes("admin")) {
                registerText.style.display = "none";
            } else {
                registerText.style.display = "block";
            }
        });
    </script>
</body>
</html>
