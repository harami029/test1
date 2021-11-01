<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="css/one.css" rel="stylesheet">
    <!---フォント---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap" rel="stylesheet">
    <title>milestone - ログイン</title>
</head>
<body>
    <?php
        session_start();

        //セッションの確認
        if(isset($_SESSION['username'])){

        //ログイン中のユーザー名を取得
        $loginmsg="MY PAGE";

            }
        else{
        //セッションがなかったらログイン表示
        $loginmsg="LOGIN";
        }
    ?>

    <header id="header">
            <nav>
                <div class="header-nav">
                    <div class="logo">
                        <h3><a href="index.php">MILESTONE KYOTO</a></h3>
                    </div>
                    <div class="main-nav">
                        <ul>
                            <li><a href="aboutus.php">ABOUT US</a></li>
                            <li><a href="sch.php">SCHEDULE</a></li>
                            <li><a href="drink.php">DRINK</a></li>
                            <li><a href="https://official.ameba.jp/">BLOG</a></li>
                           
                        </ul>
                    </div>
                </div>
            </nav>
    </header>


    <div id="main" class="wrapper">
        <h2 class="title">ABOUT MILESTONE</h2>
        <div class="about">
            <div classs="about-img"><img src="img/about.jpeg"></div>
            <h3>音楽を愛する人のための憩いの場所を</h3>
            <div class="about-text"><p>testtesttestest</p></div>
        </div>
    </div>

    <footer id="footer">
        <div class="footer-nav">
            <ul>
                <li><a href="index.php" class="arrow">TOP</a></li>
                <li><a href="aboutus.php" class="arrow">ABOUT US</a></li>
                <li><a href="sch.php" class="arrow">SCHEDULU</a></li>
            </ul>
            
            <ul>
                <li><a href="#" class="arrow">MILESTONE KOBE</a></li>
                <li><a href="#" class="arrow">MILESTONE UMEDA</a></li>
            </ul>
            <ul>
                <li><a href="#" class="arrow">お問い合わせ</a></li>
                <li><a href="#" class="arrow">よくある質問</a></li>
            </ul> 
            <div class="footer-logo">
                <h2>MILESTONE KYOTO</h2>
                <p>京都府京都市中京区下黒門町123</p>
                <br>
                <p>TEL:075-555-555<br>MAil:mailestone@kyomail.com</p>
            </div>
        </div>

    </footer>
</body>
</html>