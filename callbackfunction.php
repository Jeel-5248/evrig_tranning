<?php
    require_once('lib/common.php');
?>
<?php
function my_callback($item) {
  return ($item*2);
}

$strings = [1,5,6,7,8];
$lengths = array_map("my_callback", $strings);
print_r($lengths);
?>
<?php
    require_once('lib/footer.php');
?>