<script src="/js/easing.js" type="text/javascript"></script>
<div id="box">
<div class="user_list">
<?php
if(isset($user_list) && $user_list && count($user_list) > 0) {
	echo '<table>';
	echo '<tr class="head">';
		foreach($user_list[0] as $key => $value) {
			echo '<td>' . $key . '</td>';
		}
	echo '</tr>';
	foreach($user_list as $key => $value) {
		echo '<tr>';
		foreach($value as $colKey => $colValue) {
			echo '<td>' . $colValue . '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
}
?>
</div>
</div>
