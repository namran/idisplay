<?php
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
?>
<dataStore>
 <data timestamp='<?php echo date('c');?>'>
  <winddirection><?php echo(rand(1,36) ."0")  ?></winddirection>
  <windspeed><?php echo( sprintf("%.2f",rand(0.01,20.00)) ) ?></windspeed>
 </data>


</dataStore>
