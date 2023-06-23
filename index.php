<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container">
    <h1>映画観覧予約フォーム（入力）</h1>
    <form action="./confirm.php" method="post">
      <div class="mb-3 row">
        <label for="last_name" class="col-sm-2 col-form-label">名前（姓）</label>
        <div class="col-sm-10">
          <input type="text" name="last_name" class="form-control" id="last_name">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="first_name" class="col-sm-2 col-form-label">名前（名）</label>
        <div class="col-sm-10">
          <input type="text" name="first_name" class="form-control" id="first_name">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="last_name_kana" class="col-sm-2 col-form-label">名前（せい）</label>
        <div class="col-sm-10">
          <input type="text" name="last_name_kana" class="form-control" id="last_name_kana">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="first_name_kana" class="col-sm-2 col-form-label">名前（めい）</label>
        <div class="col-sm-10">
          <input type="text" name="first_name_kana" class="form-control" id="first_name_kana">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="address" class="col-sm-2 col-form-label">住所</label>
        <div class="col-sm-10">
          <input type="text" name="address" class="form-control" id="address">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="phone_number" class="col-sm-2 col-form-label">電話番号</label>
        <div class="col-sm-10">
          <input type="tel" name="phone_number" class="form-control" id="phone_number">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="seat_1" class="col-sm-2 col-form-label">席数（大人）</label>
        <div class="col-sm-10">
          <input type="number" name="seat_1" class="form-control" id="seat_1">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="seat_2" class="col-sm-2 col-form-label">席数（子供）</label>
        <div class="col-sm-10">
          <input type="number" name="seat_2" class="form-control" id="seat_2">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="select_time" class="col-sm-2 col-form-label">時間</label>
        <div class="col-sm-10">
          <input type="time" name="select_time" class="form-control" id="select_time">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="show_content" class="col-sm-2 col-form-label">鑑賞する映画名</label>
        <div class="col-sm-10">
          <select class="form-select" name="show_content" id="show_content">
            <option selected disabled>選択してください</option>
            <option value="ALWAYS 三丁目の夕日">ALWAYS 三丁目の夕日</option>
            <option value="新聞記者">新聞記者</option>
            <option value="告白">告白</option>
            <option value="万引き家族">万引き家族</option>
            <option value="博士の愛した数式">博士の愛した数式</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="payment" class="col-sm-2 col-form-label">支払い方法</label>
        <div class="col-sm-10">
          <select class="form-select" name="payment" id="payment">
            <option selected disabled>選択してください</option>
            <option value="カード">カード</option>
            <option value="現金">現金</option>
            <option value="交通系">交通系</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="member_num" class="col-sm-2 col-form-label">会員証番号</label>
        <div class="col-sm-10">
          <input type="text" name="member_num" class="form-control" id="member_num">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="jobs" class="col-sm-2 col-form-label">職業</label>
        <div class="col-sm-10">
          <select class="form-select" name="jobs" id="jobs">
            <option selected disabled>選択してください</option>
            <option value="経営者・役員">経営者・役員</option>
            <option value="会社員（総合、一般職）">会社員（総合、一般職）</option>
            <option value="契約社員・派遣社員">契約社員・派遣社員</option>
            <option value="パート・アルバイト">パート・アルバイト</option>
            <option value="公務員（教職員除く）">公務員（教職員除く）</option>
            <option value="教職員">教職員</option>
            <option value="医療関係者">医療関係者</option>
            <option value="自営業・自由業">自営業・自由業</option>
            <option value="専業主婦・主夫">専業主婦・主夫</option>
            <option value="学生">学生</option>
            <option value="無職（定年含む）">無職（定年含む）</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>