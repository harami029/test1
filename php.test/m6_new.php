<?php
    
    session_start();
    
    //セッションがあるか確認
    if(isset($_SESSION['userName'])){
        
        //メイン画面へ
        header('Location: m6_main.php');
        
    }
?>

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
            height: 600px;
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
    <title>LOOK! 新規登録</title>
</head>
<body>

    <?php
    
    
    //データベースに接続
    //データベースに接続
    $dsn='mysql:dbname=harami029ju4_in;host=mysql1.php.xdomain.ne.jp';
    $user = 'harami029ju4_1';
    $password = 'harami1234';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //データベース内にテーブルを作成
    $sql = "CREATE TABLE IF NOT EXISTS info"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"
    . "name char(32),"
    . "mail varchar(255),"
    . "password char(32)"
    .");";
    $stmt = $pdo->query($sql);
    
    //新規登録
    if(!empty($_POST["name"]) && !empty($_POST["mail"]) && !empty($_POST["password"])){
    
        //メールアドレスが登録済みかチェック
        //メアドを取得
        $mail=$_POST["mail"];
        
        //レコードの抽出
        $sql = 'SELECT * FROM info';
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll();
        foreach ($results as $row){
            
            $userMail=$row["mail"];
                
                //DBのメールと入力したメールが一致したら
                if($userMail === $mail){
            
                    //エラーメッセージ表示
                    $error= "登録済みです"; 
                    var_dump($userMail);
                    
                    break;
                }
            elseif($userMail != $mail){
            
            //そのほかは、レコードを作成   
            $sql = $pdo -> prepare("INSERT INTO info (name,mail,password) VALUES (:name,:mail,:password)");
            $sql->bindParam(':name', $name, PDO::PARAM_STR);
            $sql->bindParam(':mail', $mail, PDO::PARAM_STR);
            $sql->bindParam(':password', $password, PDO::PARAM_STR);
            $name = $_POST["name"];
            $mail =$_POST["mail"];
            $password =$_POST["password"];
            $sql->execute();
            
            //ユーザーネームをセッションに保存
            $_SESSION['userName']=$name;
            
            //メインページへ移動
            header('Location: m6_main.php');
            
            break;
            
            }
        
        }
    
    }
    

?>
    
    

<div class="login">
    <h1 class="logo"><img src="img/logo.png" alt="logo"></h1>
    <p>ペット自慢をしよう</p>
    <form action="" method="post">
            <input type="text" name="name" placeholder="なまえ" class="text"><br>
            <input type="text" name="mail" placeholder="メールアドレス" class="text"><br>
            <input type="password" name="password" placeholder="パスワード" class="text"><br>
            <?php
            if(!empty($error)){
            echo "$error";
            }
            ?><br>
            <input type="submit" name="subscript" value="新規登録" class="button">
    </form>
    <a href="m6_login.php">ログインはこちら</a>

        
</div>

</body>
</html>