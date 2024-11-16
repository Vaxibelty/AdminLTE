<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="icon" type="image/png" href="{{ asset('images/weather-app.png') }}"> <!-- Gambar Logo -->
    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .hero{
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(12,3,51,0.3),rgba(12,3,51,0.3));
            position: relative;
            padding: 0 5%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav{
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            padding: 20px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav .logo{
            width: 50px;
        }

        nav ul li{
            list-style: none;
            display: inline-block;
            margin-left: 40px;
        }

        nav ul li a{
            text-decoration: none;
            color: #fff;
            font-size: 17px;
        }

        .content{
            text-align: center;
        }

        .content h1{
            font-size: 150px;
            color: #fff;
            font-weight: 600;
            transition: 0.5s;
        }

        .content h1:hover{
            -webkit-text-stroke: 2px #fff;
            color: transparent;
        }

        .content a{
            text-decoration: none;
            display: inline-block;
            color: #fff;
            font-size: 24px;
            border: 2px solid #fff;
            padding: 14px 30px;
            border-radius: 50px;
            margin-top: 20px;
        }

        .back-video{
            position: absolute;
            right: 0;
            bottom: 0;
            z-index: -1;
            width: 100%;
            height: auto;
        }

        /* Media Queries */
        @media(max-width:992px){
            html{
                font-size:60%;
            }
        }

        @media(max-width:768px){
            html{
                font-size:62.5%;
            }
        }

        @media(max-width: 576px){
            html{
                font-size: 60%;
            }
        }
    </style>
</head>
<body>

    <div class="hero">
        <!-- Menampilkan video menggunakan tag video dengan source dari folder public/videos -->
        <video autoplay loop muted playsinline class="back-video">
            <source src="{{ asset('videos/rusd.mp4') }}" type="video/mp4">
        </video>

        <nav>
            <!-- Menampilkan logo menggunakan asset helper -->
            <img src="{{ asset('img/weather-app.png') }}" alt="Logo" class="logo">
            <ul>
                <li>
                    <a href="{{ asset('login')}}">SKIP</a>
                </li>
            </ul>
        </nav>

        <div class="content">
            <h1>Welcome</h1>
            <a type="submit" class="btn" onclick="window.location.href='{{ url('advanture') }}'">Explore</a>
        </div>
    </div>

</body>
</html>
