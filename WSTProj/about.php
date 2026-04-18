<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to right, #eef2f3, #dfe9f3);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background: #e60b0b;
            display: flex;
            align-items: center;
            padding: 15px 40px;
        }

        .bsit {
            color: #ffffff;
            font-weight: 600;
            font-size: 22px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
        }

        .team {
            color: #ffffff;
            font-size: 14px;
            text-align: center;
        }

        .home {
            color: #e60b0b;
            text-decoration: none;
            font-size: 15px;
            padding: 10px 22px;
            border-radius: 25px;
            background: linear-gradient(135deg, #fff, #fff);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .home:hover {
            background: linear-gradient(135deg, #e60b0b, #e60b0b);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .about {
            color: #e60b0b;
            text-decoration: none;
            font-size: 15px;
            padding: 10px 22px;
            border-radius: 25px;
            background: linear-gradient(135deg, #fff, #fff);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .about:hover {
            background: linear-gradient(135deg, #e60b0b, #e60b0b);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        nav {
            display: flex;
            width: 100%;
            align-items: center;
        }

        .about-content {
            text-align: center;
            margin: 50px auto;
            max-width: 800px;
        }

        .developer {
            display: inline-block;
            margin: 20px;
            text-align: center;
        }

        .developer img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e60b0b;
        }

        .developer h3 {
            margin-top: 10px;
            color: #000000;
        }

        .developer p {
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <h3 class="bsit"><em>BSIT 2J-G2</em></h3>
            <h3 class="team" style="margin-left:10px;">
                DOMANILLO,KENNETH CARL || CAMUA,CALVIN JOHN
            </h3>
            <div style="margin-left:auto;">
                <a href="index.php" class="home">HOME</a>
                <a href="about.php" class="about">ABOUT</a>
            </div>
        </nav>
    </div>

    <div class="about-content">
        <h1>About the Developers</h1>
        <p>This project was developed by BSIT 2J-G2.</p>
        <br>
        <br>
        <div class="developer">
            <img src="kenneth.jpg" alt="Kenneth Domanillo">
            <h3>Kenneth Carl Domaniilo</h3>
            <p>BSIT 2J-G2</p>
            <p>Developer</p>
        </div>
        
        <div class="developer">
            <img src="calvin.jpg" alt="Calvin Camua">
            <h3>Calvin John Camua</h3>
            <p>BSIT 2J-G2</p>
            <p>Developer</p>
        </div>
    </div>
</body>
</html>
