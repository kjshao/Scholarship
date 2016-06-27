<?php
    include_once("header.php");
?>

<title><?=$site?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap-3.0.3/css/bootstrap.min.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<noscript>
    对不起, 您的浏览器不支持或禁用了JavaScript, 不能正常使用, 请打开相应开关或更换浏览器
</noscript>

<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="bootstrap-3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="index.js"></script>
<script type="text/javascript" src="md5.js"></script>

</head>

<?php $closed = true; ?>
<body>
    <?php
        if ($closed == false) {
    ?>
        <p>系统已关闭。</p>
    <?php
        }else{
    ?>

  <div class="container">
    <form method="post" class="form-signin" action="login.php">
      <p    class="form-signin-heading"><?=$site?></p>
    <label for="cardid" class="sr-only">身份证号码</label>
    <input type="text" id="cardid" name="cardid" class="form-control" placeholder="身份证号码" required autofocus>
    <label for="password" class="sr-only">密码</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="密码" required>
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="登录">
    <button class="btn btn-lg btn-default btn-block" data-toggle="modal" data-target="#register">注册</button>
      </form>
  </div>

  <!-- Modal Dialog -->
  <div class="modal fade" id="register" role="dialog" aria-labelledby="registerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">请填写个人资料</h4>
            </div>
            <div class="modal-body">
          <table id="reg-table" class="table table-striped" style="table-layout:fixed">
            <tbody>
              <tr>
                <td width="20%"><span class="red">*</span>身份证号</td>
                <td><input class="form-control" id="reg-cardid-mdl"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>姓名</td>
                <td><input class="form-control" id="reg-name-mdl"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>手机号</td>
                <td><input class="form-control" id="reg-phone-mdl"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>固定电话</td>
                <td><input class="form-control" id="reg-telp-mdl"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>邮箱</td>
                <td><input class="form-control" id="reg-email-mdl"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>攻读专业</td>
                <td><input class="form-control" id="reg-major-mdl"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>攻读方式</td>
                <td><input class="form-control" id="reg-readway-mdl" placeholder="硕博/直博"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>指导教师</td>
                <td><input class="form-control" id="reg-teacher-mdl"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>入学年份</td>
                <td><input class="form-control" id="reg-year-mdl" placeholder="硕博连读以硕士入学为准"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>登录密码</td>
                <td><input class="form-control" id="reg-password-mdl" type="password"></td>
              </tr>
              <tr>
                <td><span class="red">*</span>密码确认</td>
                <td><input class="form-control" id="reg-pwd-confirm-mdl" type="password"></td>
              </tr>
            </tbody>
          </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              <button type="button" class="btn btn-success" id="confirm">注册</button>
            </div>
        </div>
    </div>
  </div>
    <?php
      }
    ?>
</body>
</html>
