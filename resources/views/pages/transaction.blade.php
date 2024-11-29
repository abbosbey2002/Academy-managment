<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Create</title>
</head>
<body>
    <form action="/transactions" method="POST">
        @csrf
        @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id">
        <br>
    
        @error('course_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="course_id">Course ID:</label>
        <input type="text" name="course_id" id="course_id">
        <br>
    
        @error('amount')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="amount">Amount:</label>
        <input type="text" name="amount" id="amount">
        <br>
    
        <button type="submit">Create Transaction</button>
    </form>
</body>
</html>
