<?php if(!class_exists('raintpl')){exit;}?><html>
<head>
  <title><?php echo $title;?></title>
  <link rel="STYLESHEET" type="text/css" href="themes/simple/./style.css">
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#8080ff" vlink="#0000ff" alink="#ffff00"><center>
<h1><?php echo $headingtitletxt;?></h1>


<br><br>
<center>
[ <a href="guestbook.php"><b><?php echo $addentrytxt;?></b></a> ]
[ <a href="list.php?page=1&order=asc"><b><?php echo $viewguestbooktxt;?></b></a> ]<br>
[ <a href="list.php?page=1&order=asc"><?php echo $newpostfirsttxt;?></a> ]
[ <a href="list.php?page=1&order=desc"><?php echo $newpostlasttxt;?></a> ]</center>
<br>
<form action="search.php" method=post>
<table border=0 cellpadding=2>
<tr>
	<td><font size="1"><?php echo $searchlabeltxt;?></font></td>
        <td align=left><input type="text" name="search_term" size=20 maxlength=50><input type=submit value="<?php echo $searchbuttontxt;?>"></td>
</tr>
</table>
</form>
<br>