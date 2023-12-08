<?php

$errmessage = array();

if ($_POST) {
    // POST 정보가 있을 때
    // 1. 입력 체크
    // 이메일 공란, 글자수200, 이메일 형식
    if (!$_POST['e']) {
        $errmessage[] = "이메일을 입력해주세요";
    } else if (strlen($_POST['e']) > 200 || !filter_var($_POST['e'], FILTER_VALIDATE_EMAIL)) {
        $errmessage[] = "200자 이내로 입력해주세요";
    }

    // 패스워드 공란, 글자수100
    if (!$_POST['p']) {
        $errmessage[] = "패스워드를 입력해주세요";
    } else if (strlen($_POST['p']) > 100) {
        $errmessage[] = "100자 이내로 입력해주세요";
    }

    // 패스워드와 일치하는지
    if ($_POST['p'] != $_POST['p2']) {
        $errmessage[] = "패스워드가 일치하지 않습니다";
    }




    // 2. 신규유저 등록ㅉ
    $userfile = '../userinfo.txt';
    if (!$errmessage) {
        $ph = password_hash($_POST['p'], PASSWORD_DEFAULT);
        $line = '"' . $_POST['e'] . '","' . $ph . '"' . "\n";
        $ret = file_put_contents($userfile, $line, FILE_APPEND);
    }
    // 3. 로그인 화면으로 리다이렉트
    if ($errmessage) {
        // Handle errors if needed
    } else {
        $_POST['e'] = '';
        header("Location: /login.php");
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>신규등록</title>
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
      <h1>유저 신규등록</h1>
      <?php 
if ($errmessage) {
    echo '<div class="alert alert-danger" role="alert">';
    echo implode('<br>', $errmessage);
    echo '</div>';
}   ?>
      
      <form action="./register.php" method="post">
          이메일
          <input
            type="email"
            name="e"
            value = ""
            class="form-control form-control-lg"
          /><br />
          패스워드
          <input
            type="password"
            name="p"
            value=""
            class="form-control form-control-lg"
          /><br />
          패스워드 확인
          <input
            type="password"
            name="p2"
            value=""
            class="form-control form-control-lg"
          /><br />
          <input
            type="submit"
            name="register"
            value="등록"
            class="btn btn-primary"
          />
        </form>
      </div>
    </div>
  </body>
</html>

 