<script src="/js/easing.js" type="text/javascript"></script>

<div class="confirmingMessage">
  <p>こちらの内容に更新します。よろしいですか？</p>
</div>

<form method="post" action="update.php">
<div id="box">
  <div class="form_data">
    <?php

    if(isset($form_data) && $form_data && count($form_data) == 8) {
      echo '<table>';

      foreach($form_data as $key => $value) {
        echo '<tr>';
        echo '<th>' . $this->convert_col_name[$key] . '</th>';
        echo '<td>' . $value . '</td>';
        echo '<tr>';

        // hiddenに渡す
        echo '<input type="hidden" name=' . $key . ' value=' . $value . '>';
      }

      echo '</table>';
    }
    ?>
  </div>
</div>

<div class="buttons">
  <?php
    echo '<input type="submit" value="更新！">';
    echo $this->createLinkButton('戻ってやり直す', 'edit.php', array('id' => $form_data['id']));
  ?>
</div>
</form>
