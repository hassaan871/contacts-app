<div class="login-container">
    <h1>Login</h1>
    <form action="login" method="post">
        @csrf
        @php
        $usernameError = session('error-username');
        $passwordError = session('error-password');
        @endphp
        @if($usernameError)
        <div class="error" id="username-error">{{ $usernameError }}</div>
        @endif
        <input class="form-input {{ $usernameError ? 'input-error' : ''}}" id="username-input" type="text" name="username" placeholder="Enter Username" value="{{ old('username') }}" required>
        <br>
        <br>
        @if($passwordError)
        <div class="error" id="password-error">{{ $passwordError }}</div>
        @endif
        <input class="form-input {{ $passwordError ? 'input-error' : '' }}" id="password-input" type="password" name="password" placeholder="Enter Password" value="{{ old('password') }}" required>
        <br>
        <br>
        <button class="login-button">Login</button>
        <br>
        <p>or</p>
        <p>Create new Account <a href="/signup">Signup</a></p>
    </form>
</div>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background: linear-gradient(135deg, #023E8A, #2a7ca8ff);
    }

    .login-container {
        border: 2px solid white;
        border-radius: 16px;
        background-color: #F5F5F5;
        width: 400px;
        height: 50vh;
        text-align: center;
        justify-content: center;
        box-shadow: 0 0 8px rgba(228, 229, 231, 0.5);
    }

    .form-input {
        width: 80%;
        height: 8vh;
        border-radius: 26px;
        border: 1px solid #F5F5F5;
        text-align: center;
        font-size: 16px;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-input:focus {
        border: 1px solid #023E8A;
        box-shadow: 0 0 8px rgba(2, 62, 138, 0.5);
    }

    .login-button {
        width: 250px;
        height: 5vh;
        border-radius: 26px;
        color: white;
        border: none;
        background-color: #023E8A;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
    }

    .error {
        color: red;
    }

    .input-error {
        border: 1px solid red;
        box-shadow: 0 0 8px rgba(255, 0, 0 0.3);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const usernameErrorDiv = document.getElementById('username-error');
        const passwordErrorDiv = document.getElementById('password-error');
        const usernameInput = document.getElementById('username-input');
        const passwordInput = document.getElementById('password-input');

        usernameInput.addEventListener('input', function() {
            usernameErrorDiv.style.display = 'none';
        });

        passwordInput.addEventListener('input', function() {
            passwordErrorDiv.style.display = 'none';
        });
    });
</script>