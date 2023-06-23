<?php

extract($_POST);
$errors = [];

// 名前（姓）
if (empty($last_name)) {
  $errors['last_name'] = "名前（姓）が未入力です";
}
// 名前（名）
if (empty($first_name)) {
  $errors['first_name'] = "名前（名）が未入力です";
}
// 名前（せい）
if (empty($last_name_kana)) {
  $errors['last_name_kana'] = "名前（せい）が未入力です";
}
// 名前（めい）
if (empty($first_name_kana)) {
  $errors['first_name_kana'] = "名前（めい）が未入力です";
}
// 電話番号
if (empty($phone_number)) {
  $errors['phone_number'] = "電話番号が未入力です";
} else if (!preg_match('/^[0-9]{1,4}-?[0-9]{1,4}-?[0-9]{3,4}$/u', $phone_number)) {
  $errors['phone_number'] = "電話番号の形式が不正です";
}

// 時間
if (empty($select_time)) {
  $errors['select_time'] = "時間が未入力です";
}
// 鑑賞する映画名
if (empty($show_content)) {
  $errors['show_content'] = "鑑賞する映画名が未入力です";
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

  <title>Hello, world!</title>
</head>

<body>
  <div class="container">
    <h1>映画観覧予約フォーム（確認）</h1>
    <?php if (empty($errors)) { ?>
      <form action="./complate.php" method="post">
        <div class="mb-3 row">
          <label for="last_name" class="col-sm-2 col-form-label">名前（姓）</label>
          <div class="col-sm-10">
            <input type="text" name="last_name" readonly class="form-control-plaintext" id="last_name" value="<?php echo $_POST['last_name']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="first_name" class="col-sm-2 col-form-label">名前（名）</label>
          <div class="col-sm-10">
            <input type="text" name="first_name" readonly class="form-control-plaintext" id="first_name" value="<?php echo $_POST['first_name']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="last_name_kana" class="col-sm-2 col-form-label">名前（せい）</label>
          <div class="col-sm-10">
            <input type="text" name="last_name_kana" readonly class="form-control-plaintext" id="last_name_kana" value="<?php echo $_POST['last_name_kana']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="first_name_kana" class="col-sm-2 col-form-label">名前（めい）</label>
          <div class="col-sm-10">
            <input type="text" name="first_name_kana" readonly class="form-control-plaintext" id="first_name_kana" value="<?php echo $_POST['first_name_kana']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="address" class="col-sm-2 col-form-label">住所</label>
          <div class="col-sm-10">
            <input type="text" name="address" readonly class="form-control-plaintext" id="address" value="<?php echo $_POST['address']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="phone_number" class="col-sm-2 col-form-label">電話番号</label>
          <div class="col-sm-10">
            <input type="text" name="phone_number" readonly class="form-control-plaintext" id="phone_number" value="<?php echo $_POST['phone_number']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="seat_1" class="col-sm-2 col-form-label">席数（大人）</label>
          <div class="col-sm-10">
            <input type="text" name="seat_1" readonly class="form-control-plaintext" id="seat_1" value="<?php echo $_POST['seat_1']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="seat_2" class="col-sm-2 col-form-label">席数（子供）</label>
          <div class="col-sm-10">
            <input type="text" name="seat_2" readonly class="form-control-plaintext" id="seat_2" value="<?php echo $_POST['seat_2']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="select_time" class="col-sm-2 col-form-label">時間</label>
          <div class="col-sm-10">
            <input type="text" name="select_time" readonly class="form-control-plaintext" id="select_time" value="<?php echo $_POST['select_time']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="show_content" class="col-sm-2 col-form-label">鑑賞する映画名</label>
          <div class="col-sm-10">
            <?php echo $_POST['show_content']; ?>
            <input type="hidden" name="show_content" value="<?php echo $_POST['show_content']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="payment" class="col-sm-2 col-form-label">支払い方法</label>
          <div class="col-sm-10">
            <?php echo $_POST['payment']; ?>
            <input type="hidden" name="payment" value="<?php echo $_POST['payment']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="member_num" class="col-sm-2 col-form-label">会員証番号</label>
          <div class="col-sm-10">
            <input type="text" name="member_num" readonly class="form-control-plaintext" id="member_num" value="<?php echo $_POST['member_num']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jobs" class="col-sm-2 col-form-label">職業</label>
          <div class="col-sm-10">
            <?php echo $_POST['jobs']; ?>
            <input type="hidden" name="jobs" value="<?php echo $_POST['jobs']; ?>">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    <?php } else { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo implode("<br>", $errors); ?>
      </div>
      <form action="./confirm.php" method="post">
        <div class="mb-3 row">
          <label for="last_name" class="col-sm-2 col-form-label">名前（姓）</label>
          <div class="col-sm-10">
            <input
              type="text"
              name="last_name"
              class="form-control <?php echo in_array("last_name", array_keys($errors)) ? "is-invalid" : "" ?>"
              id="last_name"
              value="<?php echo $_POST['last_name']; ?>"
            >
          </div>
        </div>
        <div class="mb-3 row">
          <label for="first_name" class="col-sm-2 col-form-label">名前（名）</label>
          <div class="col-sm-10">
            <input
              type="text"
              name="first_name"
              class="form-control <?php echo in_array("first_name", array_keys($errors)) ? "is-invalid" : "" ?>"
              id="first_name"
              value="<?php echo $_POST['first_name']; ?>"
            >
          </div>
        </div>
        <div class="mb-3 row">
          <label for="last_name_kana" class="col-sm-2 col-form-label">名前（せい）</label>
          <div class="col-sm-10">
            <input
              type="text"
              name="last_name_kana"
              class="form-control <?php echo in_array("last_name_kana", array_keys($errors)) ? "is-invalid" : "" ?>"
              id="last_name_kana"
              value="<?php echo $_POST['last_name_kana']; ?>"
            >
          </div>
        </div>
        <div class="mb-3 row">
          <label for="first_name_kana" class="col-sm-2 col-form-label">名前（めい）</label>
          <div class="col-sm-10">
            <input
              type="text"
              name="first_name_kana"
              class="form-control <?php echo in_array("first_name_kana", array_keys($errors)) ? "is-invalid" : "" ?>"
              id="first_name_kana"
              value="<?php echo $_POST['first_name_kana']; ?>"
            >
          </div>
        </div>
        <div class="mb-3 row">
          <label for="address" class="col-sm-2 col-form-label">住所</label>
          <div class="col-sm-10">
            <input type="text" name="address" class="form-control" id="address" value="<?php echo $_POST['address']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="phone_number" class="col-sm-2 col-form-label">電話番号</label>
          <div class="col-sm-10">
            <input
              type="tel"
              name="phone_number"
              class="form-control <?php echo in_array("phone_number", array_keys($errors)) ? "is-invalid" : "" ?>"
              id="phone_number"
              value="<?php echo $_POST['phone_number']; ?>"
            >
          </div>
        </div>
        <div class="mb-3 row">
          <label for="seat_1" class="col-sm-2 col-form-label">席数（大人）</label>
          <div class="col-sm-10">
            <input type="number" name="seat_1" class="form-control" id="seat_1" value="<?php echo $_POST['seat_1']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="seat_2" class="col-sm-2 col-form-label">席数（子供）</label>
          <div class="col-sm-10">
            <input type="number" name="seat_2" class="form-control" id="seat_2" value="<?php echo $_POST['seat_2']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="select_time" class="col-sm-2 col-form-label">時間</label>
          <div class="col-sm-10">
            <input
              type="time"
              name="select_time"
              class="form-control <?php echo in_array("select_time", array_keys($errors)) ? "is-invalid" : "" ?>"
              id="select_time"
              value="<?php echo $_POST['select_time']; ?>"
            >
          </div>
        </div>
        <div class="mb-3 row">
          <label for="show_content" class="col-sm-2 col-form-label">鑑賞する映画名</label>
          <div class="col-sm-10">
            <select class="form-select <?php echo in_array("show_content", array_keys($errors)) ? "is-invalid" : "" ?>" name="show_content" id="show_content">
              <option selected disabled>選択してください</option>
              <option <?php if ($_POST["show_content"] === 'ALWAYS 三丁目の夕日') echo "selected"; ?> value="ALWAYS 三丁目の夕日">ALWAYS 三丁目の夕日</option>
              <option <?php if ($_POST["show_content"] === '新聞記者') echo "selected"; ?> value="新聞記者">新聞記者</option>
              <option <?php if ($_POST["show_content"] === '告白') echo "selected"; ?> value="告白">告白</option>
              <option <?php if ($_POST["show_content"] === '万引き家族') echo "selected"; ?> value="万引き家族">万引き家族</option>
              <option <?php if ($_POST["show_content"] === '博士の愛した数式') echo "selected"; ?> value="博士の愛した数式">博士の愛した数式</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="payment" class="col-sm-2 col-form-label">支払い方法</label>
          <div class="col-sm-10">
            <select class="form-select" name="payment" id="payment">
              <option selected disabled>選択してください</option>
              <option <?php if ($_POST["payment"] === 'カード') echo "selected"; ?> value="カード">カード</option>
              <option <?php if ($_POST["payment"] === '現金') echo "selected"; ?> value="現金">現金</option>
              <option <?php if ($_POST["payment"] === '交通系') echo "selected"; ?> value="交通系">交通系</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="member_num" class="col-sm-2 col-form-label">会員証番号</label>
          <div class="col-sm-10">
            <input type="text" name="member_num" class="form-control" id="member_num" value="<?php echo $_POST['member_num']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jobs" class="col-sm-2 col-form-label">職業</label>
          <div class="col-sm-10">
            <select class="form-select" name="jobs" id="jobs">
              <option selected disabled>選択してください</option>
              <option <?php if ($_POST["jobs"] === '経営者・役員') echo "selected"; ?> value="経営者・役員">経営者・役員</option>
              <option <?php if ($_POST["jobs"] === '会社員（総合、一般職）') echo "selected"; ?> value="会社員（総合、一般職）">会社員（総合、一般職）</option>
              <option <?php if ($_POST["jobs"] === '契約社員・派遣社員') echo "selected"; ?> value="契約社員・派遣社員">契約社員・派遣社員</option>
              <option <?php if ($_POST["jobs"] === 'パート・アルバイト') echo "selected"; ?> value="パート・アルバイト">パート・アルバイト</option>
              <option <?php if ($_POST["jobs"] === '公務員（教職員除く）') echo "selected"; ?> value="公務員（教職員除く）">公務員（教職員除く）</option>
              <option <?php if ($_POST["jobs"] === '教職員') echo "selected"; ?> value="教職員">教職員</option>
              <option <?php if ($_POST["jobs"] === '医療関係者') echo "selected"; ?> value="医療関係者">医療関係者</option>
              <option <?php if ($_POST["jobs"] === '自営業・自由業') echo "selected"; ?> value="自営業・自由業">自営業・自由業</option>
              <option <?php if ($_POST["jobs"] === '専業主婦・主夫') echo "selected"; ?> value="専業主婦・主夫">専業主婦・主夫</option>
              <option <?php if ($_POST["jobs"] === '学生') echo "selected"; ?> value="学生">学生</option>
              <option <?php if ($_POST["jobs"] === '無職（定年含む）') echo "selected"; ?> value="無職（定年含む）">無職（定年含む）</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    <?php } ?>

  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>