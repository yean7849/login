<?php
if( $_POST){
 //POST 정보가 있을 때
 // TODO 1.  입력 체크
 // TODO 2. 로그인 ID와 패스워드가 일치하는지 체크
 //3. 로그인 후 화면으로 리다이렉트
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), charlist:'/\\');
header(string:"Location: //$host$uri/memberonly.php");
exit;
} 

else{


}
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

 