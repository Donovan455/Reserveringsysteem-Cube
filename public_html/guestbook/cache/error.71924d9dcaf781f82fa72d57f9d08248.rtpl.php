<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<br>
<br>
<font color=red>
<center>
	<?php echo $error_msg;?>

	<p>&nbsp;</p>
	<center><br><a href="javascript:history.go(-1)" class="text"><?php echo $goback;?></a></center>
</center>
</font>
<br>
<br>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>