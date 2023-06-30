<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
extract($_POST);
$errors = [];

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'test';

$mysqli = @new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_db
);

$wheres = [];
if (!empty($name)) {
  $wheres[] = "(first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%')";
}

// 開始と終了がどちらも入っているとき
if (!empty($created_at_start) && !empty($created_at_end)) {
  $wheres[] = "created_at >= '{$created_at_start}'";
  $wheres[] = "created_at <= '{$created_at_end}'";

  $wheres[] = "created_at BETWEEN '{$created_at_start}' AND '{$created_at_end}'";
}
// 開始しか入っていないとき
else if (!empty($created_at_start)) {
  $wheres[] = "created_at >= '{$created_at_start}'";
}
// 終了しか入っていないとき
else if (!empty($created_at_end)) {
  $wheres[] = "created_at <= '{$created_at_end}'";
}


if ($mysqli->connect_error) {
  $errors[] = "[{$mysqli->connect_errno}]::MySQLのエラーです";
} else {
  // 接続成功時の処理
  $query  = "SELECT * FROM form";
  $stmt   = $mysqli->prepare($query);

  if (!empty($wheres)) {
    $where  = implode(" AND ", $wheres);
    $query  = "SELECT id, created_at, last_name, first_name, show_content, select_time, member_num FROM form WHERE {$where} ORDER BY id ASC";
    $stmt   = $mysqli->prepare($query);
  }
  try {
    $stmt->execute();

    $rows = [];
    $result = $stmt->get_result();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $rows[] = $row;
    }
  } catch (Exception $e) {
    $errors[] = "[99999]::{$e->getMessage()}";
  }
}

$mysqli->close();

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
    <h1>映画観覧予約フォーム（一覧）</h1>
    <form class="form" method="post" action="list.php">
      <legend>検索フォーム</legend>

      <div class="mb-3 row">
        <label for="name" class="col-2 col-form-label">名前</label>
        <div class="col-10">
          <input type="text" class="form-control" placeholder="予約名" aria-label="name" name="name" value="<?php echo $name; ?>">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="created_at_start" class="col-2 col-form-label">予約日時</label>
        <div class="col-10">
          <div class="input-group mb-3">
            <input type="date" class="form-control" placeholder="予約日時（検索開始）" aria-label="created_at_start" name="created_at_start">
            <span class="input-group-text">〜</span>
            <input type="date" class="form-control" placeholder="予約日時（検索終了）" aria-label="created_at_end" name="created_at_end">
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-info">検索</button>
    </form>
    <hr>

    <?php if (empty($errors)) { ?>
      <table class="table table-primary table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>予約日時</th>
            <th>名前</th>
            <th>映画タイトル</th>
            <th>来場予定時間</th>
            <th>会員証番号</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $row) { ?>
            <tr>
              <td><?php echo htmlspecialchars($row['id'], ENT_HTML5); ?></td>
              <td><?php echo htmlspecialchars($row['created_at'], ENT_HTML5); ?></td>
              <td><?php echo htmlspecialchars("{$row['last_name']}　{$row['first_name']}", ENT_HTML5); ?></td>
              <td><?php echo htmlspecialchars($row['show_content'], ENT_HTML5); ?></td>
              <td><?php echo htmlspecialchars($row['select_time'], ENT_HTML5); ?></td>
              <td><?php echo htmlspecialchars($row['member_num'], ENT_HTML5); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo implode("<br>", $errors); ?>
      </div>
    <?php } ?>
    <script>
      var aa = "<?php echo json_encode($rows); ?>";
      var aa = '<?php echo json_encode($rows); ?>';
    </script>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>