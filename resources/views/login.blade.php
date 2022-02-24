<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ssapp</title>
    <link rel="stylesheet" href="/css/animations.css?aaa">
    <link rel="stylesheet" href="/css/signin.css?aaa">

</head>
<body >
<div class="main">
    <div class="container">
        <div class="title-sign">
            <h1>MySite</h1>
        </div>
        <div>
            <form action="">
                <div class="input" style=" margin-top: 63px">
                    <img class="icon" src="/img/at-sign.svg" alt="">
                    <input class="input-field" type="text" name="email" placeholder="Твоя Почта">
                </div>
                <div class="input" style=" margin-top: 63px">
                    <img class="icon" src="/img/lock.svg" alt="">
                    <input class="input-field" type="password" name="password" placeholder="Новый пароль">
                </div>
                <div class="signup">
                    <button type="submit" name="button" class="hvr-fade signup-button">Sign in</button>
                </div>
            </form>
        </div>
        <div>
            <p>You don’t have an account? <a class="hvr-hilight-pink my-a" href="{{ route('signin') }}">Sign up</a></p>
        </div>
    </div>
</div>
</body>
<footer>
    2021        MySite form Студ. Совет ВШЭ КН
</footer>
</html>
