<?php
    require_once __DIR__. "/classes/Auther.class.php";
    require_once __DIR__. "/classes/Users.class.php";

	$auther = new Auther();
	$users = new Users();

    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : "";
    $mail_addres = isset($_POST['mail_address']) ? $_POST['mail_address'] : "";
    $pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : "";

    $errors=[];
    try{
        catch(\Exception $e){
            $errors[] = $e->getMassage();
        }
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
     
    <?php if(!empty($errors)){ ?>
      
            <form method="POST" action="./check.php">
                <div class="alert alert-danger" role="alert">
                    登録完了
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">User Name</label>
                    <input type="name" class="form-control" readonly id="exampleInputName" name="user_name" aria-discrbedby="emailHelp" value="<?php echo $user_name; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mail Address</label>
                    <input type="email" class="form-control" readonly id="exampleInputEmail" name="mail_adress" aria-describedby="emailHelp" value="<?php echo @$mail_address; ?>">
                    <div id="emailHelp" class="form-text">※未公開</div>
                </div>
                    <label for="exampleInputPassword1" class="form-label">password</label>
                    <input type="password" class="form-control" readonly id="exampleInputPassword" name="pass_word" aria-discrbedby="emailHelp" value="<?php echo $pass_word; ?>">
                </div>
            </form>
            <form method="POST" action="./input.php">
                <input type="hidden" class="from-control" readon id="exampleInputEmail">
                <input type="hidden" class="from-control" readon id="exampleInputPassword">
                 <button type="submit" class="btn btn-primary">back</button>
            </form>
    <?php }?>
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