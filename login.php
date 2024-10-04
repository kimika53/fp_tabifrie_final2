<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/login.css" />
    <title>旅フレ‐ログイン</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅ふれロゴ" width="232px" class=""> 
        </h1>
        <nav class="nav">
            <ul id="login">
                <li><a href="login.php">プロフィール</a></li>
                <li><a href="login.php">オファーリスト</a></li>
                <li><a href="login.php">マッチング結果</a></li>
                <li><a href="login.php">メッセージ</a></li>
            </ul>
        </nav>
    </header>
    <section class="container">
        <div>
            <h2>旅ふれ</h2>
            <h3>費用シェアで旅行をもっと楽しく</h3>
            <form action="login_act.php" method="post">
                メールアドレス <input type="text" name="email" required/><br><br>
                パスワード <input type="password" name="password" required/><br><br><br>
                <button class="btn_s">ログイン</button>
                
            </form>
            <div><p>アカウントをお持ちでない方は<a href="signup.php">新規登録</a>してください。</p></div>
        </div>
        <div class ="banner">
            <img src="./img/banner.png" alt="トップページバナー" width="640px" > 
        </div>
    </section>

    <script language="javascript" type="text/javascript">   
        const login = document.getElementById("login");
        login.addEventListener('click', (e)=> {
            alert("ログインしてください。")
    });
    </script>
</body>

</html>
