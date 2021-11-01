<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="css/style.css" rel="stylesheet">
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

    <div id="title">
        <h1 class="page-title outline">MILESTONE KYOTO</h1>
            <ul class="imp-news">
                <li><h3 class="imp-title">重要なお知らせ</h3></li>
                <li><p class="imp-text"><a href="#">21.06.21 「まん延防止等重点措置」適用期間の飲食サービスについて</a><br>
                 <a href="#">21.01.08　店舗での新型コロナウイルス感染症（COVID-19）に対する取り組み方について</a></p></li>
            </ul>
    </div>

    <div id="main" class="wrapper">
        <div class="main_contents">
            <section>
                <h2 class="title">TODAY 
                    <span style="font-size: 20px;"><script language="JavaScript">
                    mydate=new Date();
                    Ye=mydate.getFullYear()+"/";
                    Mo=mydate.getMonth()+1+"/";
                    Da=mydate.getDate();
                    Day=mydate.getDay();
                    Day2=new Array(7);
                    Day2[0]="Sun";Day2[1]="Mon";Day2[2]="Tue";
                    Day2[3]="Wed";Day2[4]="Thu";Day2[5]="Fri";
                    Day2[6]="Sat";
                    document.write(Ye+Mo+Da+"（"+Day2[Day]+"）");
                    </script></span>
                </h2>
                
                <div class="today">
                    <?php

                    //データベースに接続
                    $dsn='mysql:dbname=milestone;host=localhost;charset=utf8';
                    $user = 'root';
                    $password = 'root';
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

                    //入力したレコードを取得
                    $sql = 'SELECT * FROM schedule WHERE date = date(now())';
                    $stmt = $pdo->query($sql);
                    $results = $stmt->fetchAll();
                    foreach ($results as $row){
                
                    //投稿内容をそれぞれ取得
                    //投稿内容をそれぞれ取得
                    $date=$row['date'];
                    $dayname=$row['DAY'];
                    $filename=$row['filename'];
                    $title=$row['title'];
                    $member=$row['member'];
                    $open=$row['open'];
                    $start=$row['start'];
                    $intro=$row['introduction'];
                    $charge=$row['charge'];
                    $reserve=$row['reserve'];

                    if(!empty($title)){
                        echo "<div class='contents'><div class='sch-img'><img src='".$filename."'></div>";
                        echo "<div class='detail'><h3 class='sch-title'>".$title."</h3>";
                        echo "<h4 class='text'>";
                        echo "<h4>Open:".$open."/Start:".$start."/Charge:¥".$charge."<br>";
                        echo $member."</h4><br>";
                        echo "<p>".$intro."</p>";
                    }else{
                        echo "今日の公演はございません";
                    }
                    

                }

                    ?>
                </div>
            </section>


            <section>
                <h2 class="title">GARALLY</h2>
                <div class="show">
                    <div>
                        <img src="img/c1.jpeg" id="bigimg">
                    </div>
                    <ul>
                        <li><img src="img/c1.jpeg" class="thumb" data-image="img/c1.jpeg"></li>
                        <li><img src="img/c2.jpeg" class="thumb" data-image="img/c2.jpeg"></li>
                        <li><img src="img/c4.jpeg" class="thumb" data-image="img/c4.jpeg"></li>
                    </ul>
                </div>
            </section>


            <section>
                <h2 class="title">INFOMATION</h2>
                <dl>
                    <dt>2021.07.01</dt>
                    <dd>infoinfoinfoinfoinfoinfo</dd>
                    <dt>2021.07.01</dt>
                    <dd>infoinfoinfoinfoinfoinfo</dd>
                    <dt>2021.07.01</dt>
                    <dd>infoinfoinfoinfoinfoinfo</dd>
                    <dt>2021.07.01</dt>
                    <dd>infoinfoinfoinfoinfoinfo</dd>
                    <dt>2021.07.01</dt>
                    <dd>infoinfoinfoinfoinfoinfo</dd>
                    <dt>2021.07.01</dt>
                    <dd>infoinfoinfoinfoinfoinfo</dd>
                </dl>

            </section>
        </div>
        <div class="recomend">
            <section>
            <h2 class="title">RECOMAND</h2>  
            <ul class="info">
                <!---<li><img src="img/info_1.jpg"></li>--->
                <li><img src="img/info_2.jpg"></li>
                <li><img src="img/info_3.jpg"></li>
            </ul> 
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
    <script>
        'use strict';

        const thumbs =document.querySelectorAll('.thumb');//要素を取得
        console.log(thumbs);
        thumbs.forEach(function(item,index){
            item.onclick = function(){
                document.getElementById('bigimg').src=this.dataset.image;
            }
        });
    </script>
</body>
</html>