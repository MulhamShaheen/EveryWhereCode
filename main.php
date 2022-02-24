<!doctype html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ssapp</title>
  <link rel="stylesheet" href="/css/main.css?<?=filectime('css/animations.css')?>">
    <link rel="stylesheet" href="css/animations.css?<?=filectime('css/animations.css')?>">
    <link rel="stylesheet" href="css/sidemenu.css?<?=filectime("css/sidemenu.css")?>">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
</head>
<header>
  <div class="header">
    <div class="title" id="app"><h1>MyApp</h1></div>
    <div class="mainmenu">
      <div class="button-menu hvr-fade">
        <h4 style="display: flex; align-items: center">Explore</h4>
      </div>
      <div class="button-menu hvr-fade">
        <h4 style="display: flex; align-items: center">Explore</h4>
      </div>
      <div class="button-menu hvr-fade">
        <h4 style="display: flex; align-items: center">Explore</h4>
      </div>
      <div class="button-menu hvr-fade">
        <h4 style="display: flex; align-items: center">Explore</h4>
      </div>
      <div class="search-main">

      </div>
      <div id="user-icon" class="user-main" v-on:click="showSide">
        <svg class="icon-main" width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M30.8333 32.375V29.2917C30.8333 27.6562 30.1836 26.0877 29.0271 24.9312C27.8706 23.7747 26.3021 23.125 24.6666 23.125H12.3333C10.6978 23.125 9.12927 23.7747 7.9728 24.9312C6.81633 26.0877 6.16663 27.6562 6.16663 29.2917V32.375" stroke="#252541" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M18.5 16.9583C21.9058 16.9583 24.6667 14.1974 24.6667 10.7917C24.6667 7.38591 21.9058 4.625 18.5 4.625C15.0943 4.625 12.3334 7.38591 12.3334 10.7917C12.3334 14.1974 15.0943 16.9583 18.5 16.9583Z" stroke="#252541" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
    </div>
  </div>
  <div class="side-container" id="side-menu" v-bind:style="{right: newRight}">
        <div class="cover-side">
            <img class="cover-side-img" src="img/cover.jpg" alt="">
            <div class="cover-side-card">
                Mulham Shaheen
                <div class="tags">
                    <p class="green">
                        #MTO
                    </p>
                    <p class="pink">
                        #Координаторство
                    </p>
                    <p class="green">
                        #Сценарий
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
<body>
  <div class="main">
    <div id="calendar" class="calendar container-inner" >
        <div v-bind:id="curEvent" class="calendar-card-container cal-centered">
            <div class="slider-container">
                <div  class="slider">
                    <div class="slider-date">
                        <div class="slider-date-text">
                            <h4 >{{cardCenter.date.substr(-2,2)}}</h4>
                            <p>{{cardCenter.month}}</p>
                        </div>
                    </div>
                    <div class="slider-name">
                        <div class="slider-name-text">
                            <p>{{cardCenter.name}}</p>
                        </div>
                    </div>
                    <div class="slider-info">
                        <div class="slider-text">
                            <ul>
                                <li>Подготовка идёт</li>
                                <br>
                                <li>Нужна помощь с переносом матералов из 3бв корпуса в главный,
                                    <a href="#" style="color: #4EB788">отписаться</a><br></li>
                                <br>
                                <li>Нужны пледы на день мероприятия, <a href="#" style="color:#E36588">отписаться</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-bind:id="curEvent-1" v-bind:class="[prev ? 'cal-left' : 'cal-null', 'calendar-card-container' ]" >
            <div class="slider-container">
                <div  class="slider">
                    <div class="slider-date">
                        <div class="slider-date-text">
                            <h4 >{{cardLeft.date.substr(-2,2)}}</h4>
                            <p>{{cardLeft.month}}</p>
                        </div>
                    </div>
                    <div class="slider-name">
                        <div class="slider-name-text">
                            <p>{{cardLeft.name}}</p>
                        </div>
                    </div>
                    <div class="slider-info">
                        <div class="slider-text">
                            <ul>
                                <li>Подготовка идёт</li>
                                <br>
                                <li>Нужна помощь с переносом матералов из 3бв корпуса в главный,
                                    <a href="#" style="color: #4EB788">отписаться</a><br></li>
                                <br>
                                <li>Нужны пледы на день мероприятия, <a href="#" style="color:#E36588">отписаться</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-bind:id="curEvent+1" v-bind:class="[nxt ? 'cal-right' : 'cal-null', 'calendar-card-container' ]" >
            <div class="slider-container">
                <div  class="slider">
                    <div class="slider-date">
                        <div class="slider-date-text">
                            <h4>{{cardRight.date.substr(-2,2)}}</h4>
                            <p>{{cardRight.month}}</p>
                        </div>
                    </div>
                    <div class="slider-name">
                        <div class="slider-name-text">
                            <p>{{cardRight.name}}</p>
                        </div>
                    </div>
                    <div class="slider-info">
                        <div class="slider-text">
                            <ul>
                                <li>Подготовка идёт</li>
                                <br>
                                <li>Нужна помощь с переносом матералов из 3бв корпуса в главный,
                                    <a href="#" style="color: #4EB788">отписаться</a><br></li>
                                <br>
                                <li>Нужны пледы на день мероприятия, <a href="#" style="color:#E36588">отписаться</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="background: none" class="calendar-prev-container" v-on:click="fprev">
            <img style="background: none" src="img/arrow-left-circle.svg" alt="">
        </div>
        <div style="background: none" class="calendar-next-container" v-on:click="fnext">
            <img style="background: none; transform: rotate(180deg)" src="img/arrow-left-circle.svg" alt="">
        </div>
    </div>
    <div class="protocol container-inner">
      <div class="protocol-inner">
        <div class="protocol-photo">
          <h1 style="color: #252541">ФОТКА</h1>
        </div>
        <div class="protocol-info">
          <ul>
            <li> Какая то информация</li><br>
            <li> Нам надо учиться</li><br>
            <li> Как у вас дела? </li><br>
          </ul>
        </div>
        <button class="hvr-fade">Прочитать</button>
      </div>
    </div>
    <div class="feedback container-inner">
      <div class="feedback-inner">
        <div class="feedback-title">
          У Меня Идея
        </div>
        <div class="feedback-info">
              <label for="title" style="grid-area:idea-label">Загаловок</label>
              <div class="feedback-idea">
                <input id="title" class="feedback-idea-field" type="text" name="title">
              </div>
            <label style="" for="idea">Описание</label>
            <div class="feedback-description">
              <textarea id="idea" class="feedback-idea-textarea" name="idea" cols="30" rows="3"></textarea>
            </div>
        </div>
        <button class="hvr-fade">Предлагать</button>
      </div>

    </div>
    <div class="area1 container-inner">

    </div>
  </div>
  <script>
      <?php include "js/main.js";?>
  </script>

</body>
<footer>
  <div class="footer">
    <div class="logo">
      <img src="/img/yami.png" style="mix-blend-mode: color-burn;" alt="">
    </div>
    <div class="site-info">
      Сайт был сделан в 2021 году для организации и
      удобства работы активистов в студенчиском совете ВШЭ КН
    </div>
    <div class="site-name">
      2021        MySite form Студ. Совет ВШЭ КН
    </div>
    <div class="susu">
      ЮУрГУ
    </div>
  </div>
</footer>

</html>
