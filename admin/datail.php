<?php
     require_once __DIR__. "/classes/Auther.class.php";
     require_once __DIR__. "/classes/Users.class.php";

	 $auther = new Auther();
	 $users = new Users();
	 $user = $users->getDetail($user_id);
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
    <title>ユーザー詳細情報</title>
</head>

<body>
	<h1>ユーザー詳細情報</h1>
	<d1>
		<dt>ユーザーID</dt>
		<dd><?php $user['user_id']; ?></dd>
	</d1>
	<d1>
		<dt>ユーザー名</dt>
		<input type="name" class="form-control" readonly id="exampleInputName" name="user_name" aria-discrbedby="emailHelp" value="<?php echo str_repeat(".", 6); ?>">
	</d1>
	<d1>
		<dt>メールアドレス</dt>
		<input type="email" class="form-control" readonly id="exampleInputName" name="mail_adress" aria-discrbedby="emailHelp" value="<?php echo $user['user_id']; ?>">
	</d1>
	<d1>
		<dt>パスワード</dt>
		<input type="password" class="form-control" readonly id="exampleInputName" name="pass_word" aria-discrbedby="emailHelp" value="<?php echo $user['user_id']; ?>">
	</d1>
	<d1>
		<dt>作成日時</dt>
		<input type="text" class="form-control" readonly id="exampleInputName" name="create_dt" aria-discrbedby="emailHelp" value="<?php echo date("y/m/d H時i分", $user['user_id']); ?>">
	</d1>
	<d1>
		<dt>更新日時</dt>
		<input type="text" class="form-control" readonly id="exampleInputName" name="update_dt" aria-discrbedby="emailHelp" value="<?php echo date("y/m/d H時i分", $user['user_id']); ?>">
	</d1>

	<form method="POST" action="update.php">
		<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
		<button type="submit" class="btn btn-info">編集画面へ</button>
	</form>
	<form method="POST" action="delete_check.php">
		<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
		<button type="submit" class="btn btn-danger">削除</button>
	</form>


</body>
</html>