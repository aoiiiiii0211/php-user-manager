<?php
	// 外部のファイルを読み込む
    require_once __DIR__. "/classes/Auther.class.php";
	// 実際にファイル(設計書=class)を使う
	//　newで__constructを呼び出す*必須でない
	$auther = new Auther();

	$pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : "";
	$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : "";

	// ユーザー登録のバリデーションを入れる
	$errors = [
		'pass_word' =>[],
		'user_name' => [],
	];
	// メールアドレスのバリデーション
	// パスワードのバリデーション

	if( empty($errors['user_name']) && empty($errors['pass_word']) ){
		// ログインチェック
		if($auther -> login($user_name, $pass_word)){
			$_SESSION[Auther::LOGIN_CHK_KEY] = true;
		}
	}
	$auther->login_chk(true);

?>


<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
​
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ユーザー登録</title>
</head>

<body>
<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
    <div class="text-center" style="padding:50px 0">
	    <div class="logo">ユーザー登録</div>
	<!-- Main Form -->
	    <div class="login-form-1">
		    <form id="login-form" class="text-left">
			    <div class="login-form-main-message"></div>
			    <div class="main-login-form">
				    <div class="login-group">
						<div class="mb-3">
							<label for="exampleInputName" class="form-label">User Name</label>
							<input type="text" class="form-control <?php if( !empty($errors['user_name']) ) echo 'border-danger text-danger'; ?>" id="exampleInputName" name="user_name" aria-describedby="emailHelp" value="<?php echo $user_name; ?>">
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail" class="form-label">Email address</label>
							<input type="email" class="form-control <?php if( !empty($errors['mail_adress']) ) echo 'border-danger text-danger'; ?>" id="exampleInputEmail" name="mail_adress" aria-describedby="emailHelp" value="<?php echo $mail_address; ?>">
						</div>
					    <div class="mb-3">
							<label for="exampleInputPassword" class="form-label">Password</label>
							<input type="password" class="form-control <?php if( !empty($errors['pass_word']) ) echo 'border-danger text-danger'; ?>" id="exampleInputPassword" name="pass_word" value="<?php echo $pass_word; ?>">
						</div>
				    </div>
				    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			    </div>
		    </form>
	    </div>
	<!-- end:Main Form -->
    </div>
</body>
</html>