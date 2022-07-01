<?php
     require_once __DIR__. "/classes/Auther.class.php";
     require_once __DIR__. "/classes/Users.class.php";

	 $auther = new Auther();
	 $users = new Users();
     $userList = $users->getList();
     $auther -> login_chk();
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
<title>管理者画面</title>
</head>

<body>
<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">ユーザーリスト</div>
</div>

    <table class="table table-dark table-bordered border-white">
        <thead>
            <th>ユーザーID</th>
            <th>ユーザー名</th>
            <th>作成日時</th>
            <th>更新日時</th>
        </thead>
        <table class="table table-dark table-striped table-bordered border-white">
            <?php foreach( $userList as $users ) { ?>
                <tr class="table-danger">
                        <td><?php echo $users['user_id']; ?></td>
                        <td>
							<a href="datail.php?user_id=<?php echo $users['user_id']; ?>">
							<?php echo $users['user_name']; ?>
							</a>
						</td>
                        <td><?php echo date("y/m/d H時i分"); $users['create_dt']; ?></td>
                        <td><?php echo $users['update_dt']; ?></td>
                </tr>
             <?php } ?>
        </table>
    </table>
</body>
</html>