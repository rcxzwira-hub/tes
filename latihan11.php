<select name="tgl" id="tgl">
<?php
$th=date("Y") ;
$hsl= $th-30 ;
while ($th > $hsl ) {
  $th-- ;
  echo "
    <option value=$th> $th </option>
  ";
}
?>
</select>