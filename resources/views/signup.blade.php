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
        height: 100vh;
        margin: 0;
        background: linear-gradient(135deg, #023E8A, #2a7ca8ff);
    }

    .signup-container {
        border: 2px solid white;
        border-radius: 16px;
        background-color: #F5F5F5;
        width: 400px;
        height: 60vh;
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

    .signup-button {
        width: 250px;
        height: 5vh;
        border-radius: 26px;
        border: none;
        color: white;
        background-color: #023E8A;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
    }
</style>