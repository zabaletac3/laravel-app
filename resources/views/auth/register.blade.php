<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    
    <form action="/register" action="/sendSms" method="POST">
        @csrf
        <input type="text" name="name" id="">
        <input type="email" name="email" id="">
        <input type="number" name="phone" id="">
        <input type="password" name="password" id="">
        <input type="password" name="password_confirmation" id="">
        <input type="submit" value="Registrar">
    </form>

</body>
</html>