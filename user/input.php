<?php
    ini_set('display_errors',"On");

    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : "";
    $mail_addres = isset($_POST['mail_adress']) ? $_POST['mail_adress'] : "";
    $pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : "";

    $errors = [
      'user_name' => [],
      'mail_adress' => [],
      'pass_word' => []
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



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ユーザー登録画面ﾝﾝﾝ</title>
  </head>
  <body>
    <h1>ユーザー登録</h1>
    <?php if( !empty($errors['user_name'])|| 
				  !empty($errors['mail_adress']) ||
				  !empty($errors['pass_word']) ) { ?>
			  <div class="alert alert-danger" role="alert">
  			  	<?php foreach($errors['user_name'] as $error) { ?>
					  <?php echo $error; ?><br>
				  <?php } ?>
			  	<?php foreach($errors['mail_adress'] as $error) { ?>
				  	<?php echo $error; ?><br>
				  <?php } ?>
				  <?php foreach($errors['pass_word'] as $error) { ?>
					  <?php echo $error; ?><br>
				  <?php } ?>
        <?php } ?>
       </div>

            <form method="POST" action="./check.php">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">User Name</label>
                    <input type="name" class="form-control" id="exampleInputPassword1" name="user_name" aria-discrbedby="emailHelp" value="<?php echo $user_name; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mail Address</label>
                    <input type="email" class="form-control"  id="exampleInputEmail1" name="mail_adress" aria-describedby="emailHelp" value="<?php echo @$mail_adress; ?>">
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
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>