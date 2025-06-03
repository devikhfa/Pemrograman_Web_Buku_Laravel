<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <style>
    body {
      background: #f2f2f2;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 300px;
      text-align: center;
    }

    h1 {
      margin-bottom: 24px;
      color: #333;
    }

    label {
      display: block;
      text-align: left;
      margin-bottom: 6px;
      font-weight: bold;
      color: #555;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 18px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #4CAF50;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #45a049;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>
    
    @if(Session::has('error'))
      <div class="alert alert-danger" style="color: red; margin-bottom: 15px; padding: 10px; border-radius: 5px; background: #ffebee;">
        {{ Session::get('error') }}
      </div>
    @endif

    <form action="{{ route('actionlogin') }}" method="POST">
      @csrf
      <label>Email</label>
      <input type="email" name="email" placeholder="Masukkan email" required />
      <label>Password</label>
      <input type="password" name="password" placeholder="Masukkan password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
