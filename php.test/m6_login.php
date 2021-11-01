<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @charset "UTF-8";
        body{
            background-color:#8dfbc2 ;
            display: flex;
            justify-content: center;
        }
        .logo{
            font-size: 40px;
            margin: 15px;
        }
        form{
            margin:40px;
        }

        .login{
            width:400px;
            height: 550px;
            margin-top: 100px;
            margin-bottom: 20px;
            padding:50px;
            text-align: center;
            background-color: #fff;
            border: 8px solid black;
            border-radius: 50px;
    
        }

        .text{
            width:300px;
            height: 30px;
            margin:5px;
            border-radius: 50px;
            outline: none;
        }

        .text:focus{
            background-color:gray;
        }

        .button{
            width:100px;
            height: 30px;
            background-color: #8dfbc2;
            border-radius: 20px;
            margin: 30px;
        }
    </style>
    <title>LOOK! ログイン</title>
</head>
<body>

    <?php
    
    //セッション管理開始
    session_start();
    
    //データベースに接続
    $dsn='mysql:dbname=harami029ju4_in;host=mysql1.php.xdomain.ne.jp';
    $user = 'harami029ju4_1';
    $password = 'haraminosax';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //ログイン情報を確認
    if(!empty($_POST["mail"]) && !empty($_POST["password"])){
    
        //入力内容を取得
        $mail=$_POST["mail"];
        $password=$_POST["password"];
        
        //レコードを抽出
        $sql = 'SELECT * FROM info WHERE mail=:mail AND password=:password ';
        $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);// ←その差し替えるパラメータの値を指定してから、
        $stmt->execute();                             // ←SQLを実行する。
        $results = $stmt->fetchAll(); 
        foreach ($results as $row){
            
            $userName=$row["name"];
            $userMail=$row["mail"];
            $userPass=$row["password"];
                
                //DBのデータと一致したら
                if($userMail === $mail && $userPass === $password){
            
                    //ユーザーネームをセッションに保存
                    $_SESSION['userName']=$userName;
                    
                    //メインページへ移動
                    header('Location: m6_main.php');
                    
                    break;
                    
                }
            else{
                
                    $error="登録されていません<br>";
                    
                    break;
            

            }        
        }
    }
 
?>
    
    

<div class="login">
    <h1 class="logo"><img src="img/logo.png" alt="logo"></h1>
    <p>おかえりなさい</p>
    <form action="" method="post">
            <input type="text" name="mail" placeholder="メールアドレス" class="text"><br>
            <input type="password" name="password" placeholder="パスワード" class="text"><br>
            <?php
            if(!empty($error)){
            echo "$error";
            }
            ?>
            
            <input type="submit" name="login" value="ログイン" class="button">
    </form>
    <a href="m6_new.php">新規登録はこちら</a>

        
</div>

</body>
</html>