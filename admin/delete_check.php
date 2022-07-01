<?php
    require_once __DIR__. "/classes/Auther.class.php";
    require_once __DIR__. "/classes/Users.class.php";

    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";

    $auther = new Auther();
	$users = new Users();
    $user = $users->getDetail($user_id);

    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : "";
    $mail_addres = isset($_POST['mail_address']) ? $_POST['mail_address'] : "";
    $pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : "";

    $errors = [
		'pass_word' =>[],
		'user_name' => [],
		'pass_word' =>[],
	];

    if( $user_name === "" ) {
        $errors['user_name'][] = "UserNameが未入力です。";
    }
    if( $mail_address === "" ) {
        $errors['mail_adress'][] = "Mail Addressが未入力です。";
    }
    if (!preg_match('|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', $mail_address)) {
        $errors['mail_adress'][] = "Mail Addressのフォーマットが不正です。";
    }
    if( $pass_word === "" ) {
        $errors['pass_word'][] = "Passwordが未入力です。";
    }
?>

<?php { ?>
    <form method="POST" action="./check.php">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">User Name</label>
        <input type="name" class="form-control" id="exampleInputPassword1" name="user_name" aria-discrbedby="emailHelp" value="<?php echo $user_name; ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mail Address</label>
        <input type="email" class="form-control"  id="exampleInputEmail1" name="mail_address" aria-describedby="emailHelp" value="<?php echo @$mail_adress; ?>">
        <div id="emailHelp" class="form-text">※未公開</div>
    </div>
        <label for="exampleInputPassword1" class="form-label">password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="pass_word" aria-discrbedby="emailHelp" value="<?php echo $pass_word; ?>">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">利用規約に同意します</label>
    </div>
        <button type="submit" class="btn btn-primary">submit</button>
</form>

<a href="./detail.php?user_id=<?php echo $user_id; ?>" class="btn btn-prymary">Back</a>

<?php } ?>