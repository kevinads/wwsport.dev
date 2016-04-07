
@extends('master')

@section('index_content')
    <div class="head_container">
        <img src="{{asset('images/logo.png')}}" alt="Logo" class="logo">
        <div class="head_menu">
            <ul>
                <li><a href="#">Football</a></li>
                <li><a href="#">F1</a></li>
                <li><a href="#">Cricket</a></li>
                <li><a href="#">Rugby</a></li>
                <li><a href="#">Golf</a></li>
                <li><a href="#">Boxing</a></li>
                <li><a href="#">Tennis</a></li>
                <li><a href="#">Cycling</a></li>
            </ul>
        </div>
    </div>
    <div class="main_container">
        <div class="left_side">
            <div class="list_wrap">
                <h4 class="block-title"><span>LATEST ARTICLES</span></h4>
                <div class="list_thumbs">
                    <?php

                    $content->each(function($article) {
                        echo '<div class="list_thumb">';
                        echo '<a href="article/' . $article['data-id'] .'" class="to_link"></a>';
                        echo '<div>';
                        echo '<img src="' . $article->imgUrl . '" alt="' . $article->title . '">';
                        echo '</div>';
                        echo '<h3>' . $article->title . '</h3>';
                        echo '</div>';
                    });
                    ?>
                </div>
            </div>
        </div>
        <div class="right_side">
            <div class="block">
                <div class="goodthing">
                    <img src="{{asset('images/ad.png')}}" alt="">
                </div>
                <div class="feat_container">
                    <div class="feat_item">
                        <div class="feat_thumb"><img src="http://video.skysports.com/JvaDhxMTE60fVZ0c3BjP6rA0tES759Q8/QCdjB5HwFOTaWQ8X4xMDoxOjBzMTt2bJ" alt="l a asd;"></div>
                        <div class="feat_details">The Stoppani varnished Riva Aquariva Super is wowing London Boat Show...</div>
                    </div>
                    <div class="feat_item">
                        <div class="feat_thumb"><img src="http://e2.365dm.com/15/10/16-9/20/alvaro-gonzalez-la-liga_3364280.jpg?20151015161936" alt=""></div>
                        <div class="feat_details">Espanyol 2-1 Rayo Vallecano: Win eases Espanyol's relegation concerns</div>
                    </div>
                    <div class="feat_item">
                        <div class="feat_thumb"><img src="http://e1.365dm.com/15/10/16-9/20/julian-draxler-wolfsburg-bundesliga_3371163.jpg?20151031200554" alt=""></div>
                        <div class="feat_details">The Stoppani varnished Riva Aquariva Super is wowing London Boat Show...</div>
                    </div>
                    <div class="feat_item">
                        <div class="feat_thumb"><img src="http://e0.365dm.com/16/02/16-9/20/gent-wolfsburg-laurent-depoitre-ricardo-rodriguez-champions-league_3417507.jpg?20160217200342" alt=""></div>
                        <div class="feat_details">Espanyol 2-1 Rayo Vallecano: Win eases Espanyol's relegation concerns</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        //Вставляем ссылки в картинки из data-src
        var imgS = $('img.widge-figure__image');
        for (var i=0; i < imgS.length; i++) {
            var src = imgS[i].getAttribute('data-src');
            imgS[i].setAttribute('src', src);
        }

        //Отдельно вставляем картинки вместо видео
        var videoImg = $('.widge-figure__video img');
        if (videoImg.length) {
            if (videoImg.length > 1) {
                for (var i=0; i < videoImg.length; i++) {
                    var videoSrc = videoImg[i].getAttribute('data-src');
                    videoImg[i].setAttribute('src', videoSrc);
                }
            } else {
                var videoSrc = videoImg[0].getAttribute('data-src');
                videoImg[0].setAttribute('src', videoSrc);
            }
        }

        //Убираем лишнее
        //Убираем  соц кнопки
        $('.social-list').remove();
        //Убираем  соц кнопки виджет skybet
        $('.widge-skybet').remove();
        //Убираем related links
        $('.widge-related-links').remove();
        //Убираем оверлей под видеоФото
        $('.overlay-icon').remove();
        //Убираем виджет liveOnSky
        $('.widge-liveonsky').remove();
        //Убираем ???????
        $('.widge-marketing').remove();
        //Убираем все выделенные строки ?????надо ли
        $('strong').remove();

        //Удаляем соц сети
    </script>
@stop
