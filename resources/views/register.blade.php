<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        body {
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-out;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(130, 230, 239, 0.5);
            border-color: #8fd3f4;
        }

        .btn-custom {
            background: linear-gradient(to right, #84fab0, #8fd3f4);
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: linear-gradient(to right, #8fd3f4, #84fab0);
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(130, 230, 239, 0.4);
        }

        .link-custom {
            color: #4a90e2;
            text-decoration: none;
            transition: all 0.3s;
            display: block;
            text-align: center;
            margin-top: 1rem;
        }

        .link-custom:hover {
            color: #2c5282;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="login-box">
        <h2 class="text-center mb-4" style="color: #2c5282; font-weight: bold;">Trang đăng ký</h2>
        
        @if(session('message'))
        <div class="alert alert-danger">{{session('message')}}</div>
        @endif

        <form action="{{ route('postRegister') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên của bạn">
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Nhập email của bạn">
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
            </div>

            <button type="submit" class="btn-custom">Đăng ký</button>
        </form>
        
        <a href="{{ route('login') }}" class="link-custom">Đã có tài khoản? Đăng nhập</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
