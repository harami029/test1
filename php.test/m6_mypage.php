<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--リセットCSS-->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    
    <title>LOOK! ホーム</title>
<!------------------CSSここから------------------------------->
    <style>
        @charset "UTF-8";

/*共通項目*/

body{
    background-color:#8dfbc2 ;
}

li{
    list-style:none;
}
a{
    text-decoration: none;
}



/*ヘッダー*/

#header{
    background-color:white;
}

.mainNav{
    display:flex;
    justify-content:space-around;
    align-items: center;
    border-bottom:3px dashed black;
}
.menu {
    display:flex;
    justify-content:space-around;
    align-items: center;
}
.menu li{
    margin:10px;
}
#header .logo{
    width: 50%;    /* 横幅を割合で指定 */
    height: auto;  /* 高さは自動指定 */
}



/*メイン*/
.wrapper{
    width:800px;
    margin:auto;
}

.postform{
    background-color:white;
    border:5px solid black;
    border-radius: 20px;
    margin:10px;
    padding:20px;
    text-align:center;
    
}

.file{
    padding:5px;
    margin:10px;
}

.form{
    border:1px solid black;
    padding:5px;
    margin:10px;
}

.button{
    background-color:#8dfbc2;
    border:2px solid black;
    margin:10px;
    padding:10px;
}

/*投稿内容*/
.contaner{
    width:1200px;
    margin:auto;
    display:flex;
    flex-wrap:wrap;
}
.timeline{
    width:370px;
    border:4px solid black;
    border-radius: 20px;
    background-color:white;
    text-align:center;
    margin:10px;
    padding:10px;
    

}
.img{
    width:300px;
    height:auto;
}

/* PC用のCSSはメディアクエリの外に記述する */

@media screen and (max-width: 959px) {
	/* 959px以下に適用されるCSS（タブレット用） */
}
@media screen and (max-width: 480px) {
	/* 480px以下に適用されるCSS（スマホ用） */
}


    </style>
<!------------------CSSここまで------------------------------->

</head>


<body>
    <?php
    session_start();
    
    //セッションがあるか確認
    if(isset($_SESSION['userName'])){
        
        //ログイン中のユーザー名を取得
        $userName=$_SESSION['userName'];
        
    }
    else{
        //セッションがなかったらログイン画面へ
        header('Location: m6_login.php');
    }
    ?>
    <header id="header">
        <nav>
            <ul class="mainNav">
            <h1><a href="m6_main.php"><img class="logo" src="img2/logo.png" alt="logo"></a></h1>
            <ul class="menu">
                <li><a href="m6_mypage.php">マイページ</a></li>
                <li><a href="m6_logout.php">ログアウト</a></li>
            </ul>
            </ul>
        </nav>
    </header>
    <main>
 
    <div class='contaner'>
         <?php
            
            //データベースに接続
            $dsn='mysql:dbname=test;host=localhost';
            $user = 'root';
            $password = 'haraminosaxha2tu';
            $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            
            
            
            //rレコード抽出
            $sql = 'SELECT * FROM post2';
            $stmt = $pdo->query($sql);
            $results = $stmt->fetchAll();
            foreach ($results as $row){
                
                    
                
                //投稿内容をそれぞれ取得
                $id=$row['id'];
                $name=$row['name'];
                $title=$row['title'];
                $text=$row['text'];
                $img="img/".$row['file_name'];
                $updated=$row['updated'];
                
                if($name=$userName){
        

                echo "<div class='timeline'>";
                echo "<h2 class='title'>".$title."</h2>";
                echo "<p>投稿者:".$name."</p>";
                echo "<p>投稿日:".$updated."</p>";
                echo "<img src='". $img ."' alt='画像' class='img'>";
                echo "<div class='text'>".$text."</div>";
                echo "</div>";
                
                }
        }
        ?>
        

    </div>
    </main>
</body>
</html>