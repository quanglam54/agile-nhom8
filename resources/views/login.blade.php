<div class="login-container">
    <div class="login-box">
        <div class="login-form">
            <h1 class="login-title">Đăng Nhập</h1>
            
            @if(session('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{ route('postLogin') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="email" placeholder="Nhập email của bạn" name="email" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Ghi nhớ đăng nhập</label>
                </div>
                
                <button type="submit" class="login-btn">Đăng nhập</button>
            </form>
            
            <div class="register-link">
                <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        width: 100%;
        padding: 20px;
    }

    .login-box {
        max-width: 400px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
        padding: 40px;
        transform: translateY(-20px);
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(-20px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(-20px); }
    }

    .login-title {
        color: #2C3E50;
        text-align: center;
        font-size: 2.5em;
        margin-bottom: 30px;
        font-weight: 600;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #2C3E50;
        font-weight: 500;
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        color: #4ECDC4;
    }

    .input-group input {
        width: 100%;
        padding: 15px 15px 15px 45px;
        border: 2px solid #E0E0E0;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .input-group input:focus {
        border-color: #4ECDC4;
        outline: none;
        box-shadow: 0 0 10px rgba(78, 205, 196, 0.2);
    }

    .form-check {
        margin: 20px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-check input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #4ECDC4;
    }

    .login-btn {
        width: 100%;
        padding: 15px;
        background: linear-gradient(45deg, #4ECDC4, #2AB7CA);
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .login-btn:hover {
        background: linear-gradient(45deg, #2AB7CA, #4ECDC4);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 205, 196, 0.4);
    }

    .register-link {
        text-align: center;
        margin-top: 25px;
    }

    .register-link p {
        color: #2C3E50;
    }

    .register-link a {
        color: #4ECDC4;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .register-link a:hover {
        color: #2AB7CA;
        text-decoration: underline;
    }

    .alert {
        background: #FFE1E1;
        border-left: 4px solid #FF6B6B;
        color: #FF6B6B;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    @media (max-width: 480px) {
        .login-box {
            padding: 30px 20px;
        }

        .login-title {
            font-size: 2em;
        }
    }
</style>
