<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link rel="stylesheet" href="/css/main.css?<?=filectime('css/animations.css')?>">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <style>
        {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body { font-family: sans-serif; }

        .gallery {
            background: #EEE;
        }

        .gallery-cell {
            width: 28%;
            height: 200px;
            margin-right: 10px;
            background: #8C8;
            counter-increment: gallery-cell;
        }

        .gallery-cell.is-selected {
            background: #ED2;
        }

        /* cell number */
        .gallery-cell:before {
            display: block;
            text-align: center;
            content: counter(gallery-cell);
            line-height: 200px;
            font-size: 80px;
            color: white;
        }
    </style>
</head>

<body>

<div>
    <h2>FreeScroll</h2>
    <flickity  class="flickity" ref="flickity" :options="flickityOptions">
        <div class="carousel-cell">asd</div>
        <div class="carousel-cell">asd</div>
        <div class="carousel-cell">asd</div>
        <div class="carousel-cell">asd</div>
        <div class="carousel-cell">asd</div>
    </flickity>
</div>

<!-- if you don't want to use the buttons Flickity provides -->


<script type="module">
    import Flickity from "/node_modules/vue-flickit";
    new Vue({
        components: {
            Flickity
        },
        data () {
            return {
                flickityOptions: {
                    initialIndex: 3,
                    prevNextButtons: true,
                    pageDots: true,
                    wrapAround: true,
                    freeScroll: true
                    // any options from Flickity can be used
                }
            }
        }
    })
</script>

</body>

</html>
<?php


?>
