@extends('layouts.my-auth')

@section('form')
    <div class="main">
        <div class="container">
            <div class="title-sign">
                <h1>MySite</h1>
            </div>
            <div>
                <form method="POST" action="{{ route('login') }}" >
                    @csrf
                    <div class="input" style=" margin-top: 63px">
                        <img class="icon" src="/img/at-sign.svg" alt="">
                        <input id="email" class="form-control input-field @error('email') s-invalid @enderror " type="text" name="email" placeholder="Твоя Почта">
                        </div>
                    <div class="input" style=" margin-top: 63px">
                        <img class="icon" src="/img/lock.svg" alt="">
                        <input id="name" class="input-field" type="password" name="password" placeholder="Новый пароль">
                    </div>
                    <div class="signup">
                        <button type="submit" name="button" class="hvr-fade signup-button">Sign in</button>
                    </div>
                </form>
            </div>
            <div>
                <p>You don’t have an account? <a class="hvr-hilight-pink my-a" href="signup.php">Sign up</a></p>
            </div>
        </div>
    </div>
@stop
