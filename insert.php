<?php
session_start();
$err_msg["id"] = "";
$err_msg["name"] = "";
$err_msg["price"] = "";
if(!empty($_SESSION["proId"])){
  $err_msg["id"] = $_SESSION["proId"];
}
if(!empty($_SESSION["name"])){
  $err_msg["name"] = $_SESSION["name"];
}
if(!empty($_SESSION["price"])){
  $err_msg["price"] = $_SESSION["price"];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品登録</title>
<link href="css/commons.css" rel="stylesheet">
</head>
<body>

  <div class="header">
    <h1 class="site_logo"><a href="menu.php">商品管理システム</a></h1>
    <div class="user">
      <p class="user_name"><?= $_SESSION["id"]?>さん、こんにちは</p>
      <form class="logout_form" action="logout.html" method="get">
        <button class="logout_btn" type="submit">
          <img src="images/ドアアイコン.png">ログアウト</button>
      </form>
    </div>
  </div>

  <hr>
  
  <div class="insert">
    <div class="discription">
      <p>
        登録情報を入力してください（<span class="required"></span>は必須です）
      </p>
    </div>
  
    <div class="form_body">
      <p class="error">エラーメッセージ</p>
  
      <form action="./db/db_in.php" method="get">
        <fieldset class="label-130">
          <div>
            <label class="required">商品ID</label>
            <input type="text" name="productId" class="base-text">
            <span class="error"><?= $err_msg["id"]?></span>
          </div>
          <div>
            <label class="required">商品名</label>
            <input type="text" name="name" class="base-text">
            <span class="error"><?= $err_msg["name"]?></span>
          </div>
          <div>
            <label class="required">単価</label>
            <input type="text" name="price" class="base-text">
            <span class="error"><?= $err_msg["price"]?></span>
          </div>
          <div class="select_block">
            <label class="required">カテゴリ</label>
            <select name="categoryId" class="base-text">
              <option value="1">筆記具</option>
              <option value="2">紙製品</option>
              <option value="3">事務消耗品</option>
              <option value="4">オフィス機器</option>
              <option value="5">雑貨</option>
            </select>
          </div>
          <div>
            <label>商品説明</label>
            <textarea name="description" class="base-text"></textarea>
          </div>
          <div>
            <label>画像</label>
            <input type="file" name="file">
            <span class="error">エラーメッセージ</span>
          </div>
        </fieldset>
        <div class="btns">
          <button type="button" onclick="openModal()" class="basic_btn">登録</button>
          <input type="button" onclick="location.href='./menu.php'" value="戻る" class="cancel_btn">
        </div>
        <div id="modal">
          <p class="modal_message">登録しますか？</p>
          <div class="btns">
            <button type="submit" class="basic_btn">登録</button>
            <button type="button" onclick="closeModal()" class="cancel_btn">キャンセル</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div id="fadeLayer"></div>
</body>
</html>
<script src="./js/commons.js"></script>
<?php 
unset($_SESSION["proId"]);
unset($_SESSION["name"]);
unset($_SESSION["price"]);
?>