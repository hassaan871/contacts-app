<div class="signup-container">
    <h1>Signup</h1>

    <form action="signup" method="post">
        @csrf
        <input class="form-input" type="text" name="username" placeholder="Enter Username" required>
        <br>
        <br>
        <input class="form-input" type="email" name="email" placeholder="Enter Email" required>
        <br>
        <br>
        <input class="form-input" type="password" name="password" placeholder="Enter Password" required>
        <br>
        <br>
        <button class="signup-button">Signup</button>
        <br>
        <p>or</p>
        <p>Already have an Account <a href="/login">Login</a></p>

    </form>
</div>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .signup-container {
        border: 2px solid white;
        border-radius: 16px;
        background-color: #F5F5F5;
        width: 400px;
        height: 60vh;
        text-align: center;
        justify-content: center;
        box-shadow: 0 0 8px rgba(166, 214, 214, 0.5);
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
        border: 1px solid #A6D6D6;
        box-shadow: 0 0 8px rgba(166, 214, 214, 0.5);
    }

    .signup-button {
        width: 250px;
        height: 5vh;
        border-radius: 26px;
        border: none;
        background-color: #A6D6D6;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
    }
</style>