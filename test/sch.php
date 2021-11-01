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
    <title>milestone</title>
</head>
<body>

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
        </div>
    </header>

    <div id="main" class="wrapper">
        <div class="main_contents">
            <section>
                <h2 class="title">SCHEDULE</h2>
                <h3 class="year">2021 OCTORBER</h3>
                    <table>
                        <?php

                        

                        //データベースに接続
                        $dsn='mysql:dbname=milestone;host=localhost;charset=utf8';
                        $user = 'root';
                        $password = 'root';
                        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
                        //入力したレコードを取得
                        $sql = 'SELECT * FROM schedule';
                        $stmt = $pdo->query($sql);
                        $results = $stmt->fetchAll();
                        foreach ($results as $row){
                    
                        //投稿内容をそれぞれ取得
                        $date=$row['date'];
                        $dayname=$row['day'];
                        $filename=$row['filename'];
                        $title=$row['title'];
                        $member=$row['member'];
                        $open=$row['open'];
                        $start=$row['start'];
                        $intro=$row['introduction'];
                        $charge=$row['charge'];
                        $reserve=$row['reserve'];


                        echo "<tr><td>".$dayname."<br></td>";
                        echo "<td><div class='contents'><div class='sch-img'><img src='".$filename."'></div>";
                        echo "<div class='detail'><h3 class='sch-title'>".$title."</h3>";
                        echo "<h4 class='text'>";
                        if(!empty($title)){
                            echo "<h4>Open:".$open."/Start:".$start."/Charge:¥".$charge."<br>";
                            echo $member."</h4><br>";
                        }
                        echo "<p>".$intro."</p>";

                        if(!empty($reserve)){
                            echo "<br><div class='reserve'><a href='#'>".$reserve."</a></div></div></div></td><tr>";}
                
      
                    }
                    ?>
                </table>
                
                
            </section>
        </div>
    </div>


    <footer id="footer">
        <div class="footer-nav">
            <ul>
                <li><a href="index.php" class="arrow">TOP</a></li>
                <li><a href="aboutus.php" class="arrow">ABOUT US</a></li>
                <li><a href="sch.php" class="arrow">SCHEDULE</a></li>
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