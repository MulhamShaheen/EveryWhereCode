<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ssapp</title>
    <link rel="stylesheet" href="/css/signup.css?<?=filectime('css/signup.css')?>">
    <link rel="stylesheet" href="/css/animations.css?<?=filectime('css/animations.css')?>">

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
                    <img class="icon" src="/img/user.svg" alt="">
                    <input class="input-feild" type="text" name="fullname" placeholder="ФИО" style="">
                </div>
                <div class="input" style=" margin-top: 63px">
                    <img class="icon" src="/img/at-sign.svg" alt="">
                    <input class="input-feild" type="text" name="email" placeholder="Твоя Почта">
                </div>
                <div class="input" style=" margin-top: 63px">
                    <img class="icon" src="/img/lock.svg" alt="">
                    <input class="input-feild" type="password" name="password" placeholder="Новый пароль">
                </div>
                <div class="input" style="margin-top: 63px;">
                    <img class="icon" src="/img/key.svg" alt="" style="">
                    <input class="input-feild" type="password" name="repassword" placeholder="Подъвердить пароль">
                </div>
                <div class="signup">
                    <button type="submit" name="button" class="signup-button hvr-fade">Sign up</button>
                </div>
            </form>
        </div>
        <div>
            <p class="hvr-hilight">You do have an accout already? <a class="hvr-hilight-green" href="signin.php" >Sign up</a></p>
        </div>
    </div>
</div>
</body>
<footer>
    2021        MySite form Студ. Совет ВШЭ КН
</footer>

</html>
