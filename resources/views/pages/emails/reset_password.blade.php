<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Your Password</h1>
    <p>Click the following link to reset your password:</p>
    <a href="{{ url('password/reset', $token) }}">Reset Password</a>
</body>
</html>
