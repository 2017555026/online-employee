<html>
	<head>
		<title>X Company</title>
		<link href="css/menu.css" media="all" rel="stylesheet" type="text/css" />		
		<link href="css/public.css" media="all" rel="stylesheet" type="text/css" />
		<link href="css/tables.css" media="all" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<script src="scripts/functions.js" type="text/javascript"></script>
		<div id="header2">
			<?php 
				if(!isset($_SESSION['name']) && !isset($_SESSION['surname']))
					session_start(); 
			?>
			<?php echo "<h1>".strtoupper($_SESSION['name'])." ".strtoupper($_SESSION['surname'])."</h1>";?>
		</div>
		<div id="main">
