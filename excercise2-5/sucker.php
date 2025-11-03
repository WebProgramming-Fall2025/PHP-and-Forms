<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="./buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	<body>		
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$name = $_POST['name'];
				$section = $_POST['section'];
				$creditNum = $_POST['creditNum'];
				$creditType = $_POST['creditType'];

				if (empty($name) || empty($section) || empty($creditNum) || empty($creditType)) {
					echo "
						<h1>Sorry</h1>
						<p>You didn't fill out the form completely. <a href='./buyagrade.html' target='_self' rel='noopenner noreferrer'>Try again?</a></p>
						";
				} else {
					$capture = implode(';', $_POST) . "\n";
					file_put_contents('suckers.html', $capture, FILE_APPEND);
					$getHtml = file_get_contents('suckers.html');
					echo "
						<h1>Thanks, sucker!</h1>
						<p>Your information has been recorded.</p>
						<dl>
							<dt>Name</dt><dd>$name</dd>
							<dt>Section</dt><dd>$section</dd>
							<dt>Credit Card</dt><dd>$creditNum ($creditType)</dd>
						</dl>
						<p>Here are all the suckers who have submitted here:</p>
						<pre>$getHtml</pre>
						";
				}
			
			}
		?>
	</body>
</html>