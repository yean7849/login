<?php
if( $_POST){
 //POST 정보가 있을 때
 // TODO 1.  입력 체크
 if( !$_POST['e']){
  $errmessage[] = "이메일을 입력해주세요";
 } else if (strlen($_POST['e']) > 200 || !filter_var($_POST['e'], FILTER_VALIDATE_EMAIL)) {
  $errmessage[] = "200자 이내로 입력해주세요";
}

if (!$_POST['p']) {
  $errmessage[] = "패스워드를 입력해주세요";
} else if (strlen($_POST['p']) > 100) {
  $errmessage[] = "100자 이내로 입력해주세요";
}

 //2. 로그인 ID와 패스워드가 일치하는지 체크
$userfile = '../userinfo.txt';
 $users = file_get_contents( $userfile);
 $users = explode("\n", $users);
 foreach ($users as $k => $v) {
  $v_ary = str_getcsv($v);
  if ( $v_ary[0] == $_POST['e']){
    if (password_verify($_POST['p'], $v_ary[1])){

      header("Location: /memberonly.php");
      exit;
} 

    }
  }
 }

 $errmessage[] = "유저명 또는 패스워드가 틀렸습니다"
 //3. 로그인 후 화면으로 리다이렉트

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>로그인 폼</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <style>
      div.button {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="continer">
      <div class="mx-auto" style="width: 400px">
        <form action="./login.php" method="post">
          이메일
          <input
            type="email"
            name="e"
            value=""
            class="form-control form-control-lg"
          /><br />
          패스워드
          <input
            type="password"
            name="p"
            value=""
            class="form-control form-control-lg"
          /><br />
          <input
            type="submit"
            name="login"
            value="로그인"
            class="btn btn-primary"
          />
        </form>
      </div>
    </div>
  </body>
</html>

 