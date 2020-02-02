<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<center>
	<div style="color:#FFFFFF;">
	<?php echo $result1;?>

	<br />
	<?php echo $entryDate;?>

	</div>
</center>
<br /><br />
<div class="message">
<table cellspacing="0" cellpadding="10">
	<tr>
		<td>
			<b><?php echo $yournametxt;?></b> <?php echo $temp1;?> <br />
		<!--<b><?php echo $youremailtxt;?></b> <?php echo $temp2;?> <br /> -->
			<b><?php echo $yourMessagetxt;?></b> <?php echo $temp3;?> <br />
		</td>
	</tr>
</table>
</div>
<center>
	<br />
	<div style="color:#FFFFFF;">
	<?php echo $result2;?>

	</div>
</center>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>

