<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/signup.css" />
    <title>旅フレ‐新規登録</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅ふれロゴ" width="232px" class=""> 
        </h1>
        <nav class="nav">
            <ul id="signup">
                <li><a href="signup.php">プロフィール</a></li>
                <li><a href="signup.php">オファーリスト</a></li>
                <li><a href="signup.php">マッチング結果</a></li>
                <li><a href="signup.php">メッセージ</a></li>
            </ul>
        </nav>
    </header>
    <section class="container">
        <div>
            <h2>旅ふれ</h2>
            <h3>費用シェアで旅行をもっと楽しく</h3>
            <form action="signup_act.php" method="post">
                ニックネーム <input type="text" name="name" required><br><br>
                性別
                <label><input type="radio" name="gender" value="女" required>女</label>
                <label><input type="radio" name="gender" value="男">男</label><br><br>
                年齢
                <select name="age" required>
                    <option value=""></option>
                    <option value="20代">20代</option>
                    <option value="30代">30代</option>
                    <option value="40代">40代</option>
                    <option value="50代">50代</option>
                    <option value="60代or以上">60代or以上</option>
                </select><br><br>
                メールアドレス <input type="text" name="email" required><br><br>
                パスワード <input type="password" name="password" minlength="8" required><br><br><br>
                <button class="btn_s">新規登録</button>
            </form>
            <div><p>アカウントをお持ちの方は<a href="login.php">ログイン</a>してください。</p></div>
        </div>
        <div class="banner">
            <img src="./img/banner.png" alt="トップページバナー" width="640px" class=""> 
        </div>
    </section>

    <script language="javascript" type="text/javascript">   
        const signup = document.getElementById("signup");
        signup.addEventListener('click', (e)=> {
            alert("新規登録を行ってください。")
    });
    </script>
</body>

</html>
