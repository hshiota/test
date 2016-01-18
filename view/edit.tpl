<script src="/js/easing.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/val.js"></script>

<form id="user_form" action='/confirm.php' method='post'>
<div id="box">
  <div class="user_detail">
    <?php

    // idをhiddenで渡す（いいのか？）
    echo '<input type="hidden" name="id" value=' . $user_detail[0]['id']. '>';

    if(isset($user_detail) && $user_detail && count($user_detail) == 1) {
      echo '<table>';

      foreach($user_detail[0] as $key => $value) {
        // 更新日は飛ばす
        if ($key == 'updated_date' || $key == 'id') {
          continue;
        }

        if ($key == 'sex') {
          echo '<tr>';
          echo '<th>' . $this->convert_col_name[$key] . '</th>';
          echo '<td><select name=' . $key . '>';
          echo '<option value="">性別を選択してください</option>';
          echo '<option value="male">male</option>';
          echo '<option value="female">female</option>';
          echo '<option value="others">others</option>';
          echo '</select></td></tr>';
          continue;
        }

        echo '<tr>';
        echo '<th>' . $this->convert_col_name[$key] . '</th>';
        echo '<td><input type="text" name='.$key.' value=' . $value . '></td>';
        echo '<tr>';
      }

      echo '</table>';
    }


    ?>

  </div>
</div>


<div class='buttons'>
  <input type="submit" value="確認画面へ">
  <input type="reset" value="編集しなおす">
  <?php echo $this->createLinkButton('戻る', 'detail.php', array('id' => $_GET['id'])); ?>

</div>
</form>
