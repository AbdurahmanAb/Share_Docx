<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="{{ route('password.update') }}">

        <input type="email" name="email" placeholder="Email">
        <input type="hidden" name="token" value={{ $token }}>
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirmation" placeholder="confirm password">
        <input type="submit" value="Change">
    </form>
</body>

</html>
