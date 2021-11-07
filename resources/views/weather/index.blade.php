<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>

<body>
    <div id="app">
        <nav>
            <div class="logo">
                <h1>Explore <span style="vertical-align:sub;">Japan</span></h1>
            </div>
            <div class="navigation">
                <ul>
                    <i class="fas fa-times"></i>
                    <li><a href="#">Login2</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <img class="hamburger-menu" src="./img/hamburger.png" alt="">
            </div>
        </nav>

        <section id="section-weather">

            <div class="box1">
                <div class="weather-greetings">
                    <h1>Welcome <i>&#9961;</i> </h1>
                    <h1>Go and Explore Japan </h1>
                    <p>Have the power to check the weather and the available venus near you</p>
                </div>
                <div class="weather-display">
                    <div>
                        <div class="search-box">
                            <input type="text" class="search-bar" placeholder="search" />
                        </div>

                        <div class="weather-wrap">
                            <div class="location-box">
                                <div class="location">Tokyo , JAPAN</div>
                                <div class="date"> dateBuilder</div>
                            </div>

                            <div class="weather-box">
                                <div class="temp"> 36°c</div>
                                <div class="weather"> Cloudy</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>





        </section>
    </div>


</body>
<script src="{{asset('js/app.js')}}"></script>

</html>