<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app">
        <nav>
            <!-- <navigation-component/> -->
        </nav>

        <section id="section-weather" style="background-image:linear-gradient(#87cbf8, rgba(5, 4, 46, 0.7)), url('img/bg.png')">

            <div class="weather-container">
                <div class="weather-greetings">
                    <greeting-component />
                </div>
                <div class="weather-display">
                    <weather-box-component />
                </div>
            </div>
        </section>
        <section>
            <venue-component/>
        </section>

        <footer>
            <footer-component />
        </footer>




    </div>


</body>
<script src="{{asset('js/app.js')}}"></script>

</html>