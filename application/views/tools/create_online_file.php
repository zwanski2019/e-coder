<?php
foreach ($info as $inf);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$inf->title?></title>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666;
}
body {
	margin-left: 50px;
	margin-top: 50px;
	margin-right: 50px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
<p style="font-size:24px"><?=$inf->title?></p>
<?=html_entity_decode($inf->termsandcon)?>
</body>
</html>