<select name="tgl" id="tgl">
<?php
$x=0 ;
while ($x < 31 ) {
  $x++ ;
  echo "
    <option value=$x> $x </option>
  ";
}
?>
</select>