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
    border:3px solid black;
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
            <h1><a href="m6_main.php"><img class="logo" src="img/logo.png" alt="logo"></a></h1>
            <ul class="menu">
                <!--<li><a href="m6_mypage.php">マイページ</a></li>-->
                <li><a href="m6_logout.php">ログアウト</a></li>
            </ul>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        
        //データベースに接続
        $dsn='mysql:dbname=test;host=localhost';
        $user = 'root';
        $password = 'haraminosaxha2tu';
        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        
        //データベース内にテーブルを作成
        $sql = "CREATE TABLE IF NOT EXISTS post2"
        ." ("
        . "id INT AUTO_INCREMENT PRIMARY KEY,"
        . "name TEXT,"
        . "title TEXT,"
        . "text TEXT,"
        . "file_name varchar(255),"
        . "updated DATETIME"
        .");";
        $stmt = $pdo->query($sql); 
        
        
        //フォームに情報が入力されたら
        if(!empty($_POST["title"]) && !empty($_POST["comment"]) && !empty($_FILES)){
    
        
        //レコードを作成   
            $sql = $pdo -> prepare("INSERT INTO post2 (name,title,text,file_name,updated) VALUES (:name,:title,:text,:file_name,:updated)");
            $sql->bindParam(':name', $name, PDO::PARAM_STR);
            $sql->bindParam(':title', $title, PDO::PARAM_STR);
            $sql->bindParam(':text', $text, PDO::PARAM_STR);
            $sql->bindParam(':file_name', $filename, PDO::PARAM_STR);
            $sql->bindParam(':updated', $updated, PDO::PARAM_STR);
            $name = $userName;
            $title = $_POST["title"];
            $text =$_POST["comment"];
            $filename =$_FILES['upload_image']["name"];
            $date = new DateTime();
            $updated= $date->format("Y-m-d H:i:s");
            $sql->execute();
            

            }
        
        //$_FILEに情報があれば
        if(!empty($_FILES)){
            
            //ファイル名を取得
            $filename = $_FILES['upload_image']['name'];
            
            //ファイルをローカルフォルダ(imgフォルダ)へ
            $uploaded_path = 'img/'.$filename;
            $result = move_uploaded_file($_FILES['upload_image']['tmp_name'],$uploaded_path);
            
        }
        
        ?>
        
        
    <div class="wrapper">
        <div class="postform">
            <h3><?php if(isset($_SESSION['userName'])){echo $userName;}?>さん、今日のペットの様子を教えてください。</h3><br>
            <form action="" method="post" enctype="multipart/form-data">
                <dl>
                    <dt>タイトル</dt>
                    <dd><input type="text" name="title" placeholder="タイトル" class="form"></dd><br>
                    <dt>コメント</dt>
                    <dd><textarea name="comment" cols="50" rows="5" class="form"></textarea></dd>
                </dl>
                <input type="file" name="upload_image" class="file">
                <input type="submit" name="post" value="投稿する" class="button">
            </form>
        </div>
    </div>
 
    <div class='contaner'>
         <?php
        
            //入力したレコードを取得
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
        

                echo "<div class='timeline'>";
                echo "<h2 class='title'>".$title."</h2>";
                echo "<p>投稿者:".$name."</p>";
                echo "<p>投稿日:".$updated."</p>";
                echo "<img src='". $img ."' alt='画像' class='img'>";
                echo "<div class='text'>".$text."</div>";
                echo "</div>";
      
        }
        ?>
        

    </div>
    </main>
</body>
</html>