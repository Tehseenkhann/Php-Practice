<!DOCTYPE html>
<html>
<body>
<?php
echo nl2br ("Write a PHP program to remove duplicates from a sorted list.\n\nInput: (1,1,2,2,3,4,5,5)\n\nOutput: (1,2,3,4,5)\n\n");
function remove_dup($l1) {
  $nums = array_values(array_unique($l1));
  return $nums ;
}
$dup = array(1,1,2,2,3,4,5,5);
print_r(remove_dup($dup));
?>
</body>
</html>