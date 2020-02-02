<?php if(!class_exists('raintpl')){exit;}?><html>
<head>
  <title><?php echo $title;?></title>
  <link rel="STYLESHEET" type="text/css" href="themes/default/./style.css">
  <link rel="STYLESHEET" type="text/css" href="themes/default/./font-awesome.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
	<p>
	<h3>Bekijk hieronder de ervaring van de huurders of schrijf zelf een review.</h3>
	</p>
	<nav>
		<ul>
			<li><a href="list.php?page=1&amp;order=asc"><i class="fa fa-align-center"></i>&nbsp;<b><?php echo $viewguestbooktxt;?></b></a></li><li>
			<li><a href="guestbook.php"><i class="fa fa-pencil"></i>&nbsp;<?php echo $addentrytxt;?></a></li>
			</li><li><a href="list.php?page=1&amp;order=asc"><i class="fa fa-chevron-down"></i>&nbsp;<?php echo $newpostfirsttxt;?></a></li>
			<li><a href="list.php?page=1&amp;order=desc"><i class="fa fa-chevron-up"></i>&nbsp;<?php echo $newpostlasttxt;?></a></li>
		</ul>
	</nav>
<br>
<br>