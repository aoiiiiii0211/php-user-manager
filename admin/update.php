<?php
	// 外部のファイルを読み込む
    require_once __DIR__. "/classes/Auther.class.php";
	require_once __DIR__. "/classes/Users.class.php";

	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";

	// 実際にファイル(設計書=class)を使う
	//　newで__constructを呼び出す*必須でない
	$auther = new Auther();
	$users = new Users();
	$user = $users->getDetail($user_id);

	$pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : $user['user_name'];
	$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : $user['mail_adress'];
	$mail_address = isset($_POST['meil_adress']) ? $_POST['mail_adress'] : "";
	$pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : "";


	// ユーザー登録のバリデーションを入れる
	$errors = [
		'pass_word' =>[],
		'user_name' => [],
		'mail_adress' => [],
		'pass_word' => [],
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <!-- All the files that are required -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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
							<div class="form-group">
								<label for="username" class="form-control">Username</label>
								<input type="name" class="form-control" id="exampleInputName" name="user_name" aria-describedby="emailHelp" value="<?php echo $user_name; ?>">
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail" class="form-label">Email address</label>
								<input type="email" class="form-control" readonly id="exampleInputEmail" name="mail_adress" aria-describedby="emailHelp" value="<?php echo @$mail_address; ?>">
							</div>
							<div class="form-group">
								<label for="password" class="form-control">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword" name="pass_word" aria-describedby="emailHelp" value="<?php echo $pass_word; ?>">
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