<script src="/js/easing.js" type="text/javascript"></script>
<div id="box">
<div class="user_detail">
<?php

if(isset($user_detail) && $user_detail && count($user_detail) == 1) {
  echo '<table>';

  foreach($user_detail[0] as $key => $value) {
    echo '<tr>';
    echo '<th>' . $this->convert_col_name[$key] . '</th>';
    echo '<td>' . $value . '</td>';
    echo '<tr>';
  }

  echo '</table>';
}

?>

</div>
</div>

<?php
echo $this->createLinkButton('編集', 'edit.php?id=' . $_GET['id']);
echo$this->createLinkButton('一覧に戻る', 'index.php');

?>
