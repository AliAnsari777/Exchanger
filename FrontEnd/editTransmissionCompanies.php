<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
	
	if(isset($_GET['id']))
	{
		// 'htmlentities' is used for sanitizing the super global variables.
		// it converts all characters into html entities and prevent exploit attack.
		$companyId =  htmlentities($_GET['id']);
		$companyName =  htmlentities($_GET['name']);
	}
?>
<!DOCTYPE html>
<html dir="rtl" lang="FA">
<head>
    <meta charset="utf-8">
    <title>Edit Transmission Company</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<style>
		.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
		.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
		.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
		button{height:40px; width:80px; margin:10px; font-size:14px; font-weight:bold; background-color:rgba(40,164,235,0.7); border-radius:5px}
		table, tr, .art-article td{border-style:hidden; vertical-align:baseline}
		.art-article th {text-align:left}
		input[type="text"] {padding-right:7px; border-radius:7px;}
		h1{margin:10px; color:#AAFFA0}
	</style>
</head>

<body>
	<div id="art-main">
        <header class="art-header">
            <div class="art-shapes">
                <div class="art-object378817343" data-left="0.05%"></div>
                <div class="art-object1381239012" data-left="100%"></div>
                <div class="art-object667494252" data-left="23%"></div>
                <div class="art-object802498983" data-left="76.87%"></div>
            </div>
            <h1 class="art-headline" data-left="50.17%">Nasir Sultani Exchange</h1>
            <h2 class="art-slogan" data-left="48.95%">صرافی نصیر سلطانی</h2>            
        </header>
        <div class="art-sheet clearfix">
    	<div class="art-layout-wrapper">
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-content">
                    	<article class="art-post art-article">
                            <div class="art-postmetadataheader">
                                <h1 style="font-size:36px" align="center">مشخصات <?php echo $companyName ?></h1>
                            </div>                    
                			<div class="art-postcontent art-postcontent-0 clearfix">
                            	<div class="art-content-layout">
    								<div class="art-content-layout-row">
    									<div class="art-layout-cell layout-item-0" style="width: 100%" >
                                        	<div align="center">
												<?php
													require_once("../PHP/classes.php");
													$edit = new TransmissionCompanies();
													$edit->EditTransmissionCompany($companyId);
												?>
                                            </div>
    									</div>
    								</div>
								</div>
							</div>
						</article>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<footer class="art-footer">
  		<div class="art-footer-inner">
			<div style="position:relative;display:inline-block;padding-left:40px;padding-right:40px">
            	<p dir="ltr"><br>Ali Ansari © 2016. All Rights Reserved.<br> 077 9292 649 <br></p>
            </div>
  		</div>
	</footer>
    </div>
</body>
</html>
<script src="jquery.js"></script>
<script src="script.js"></script>
<script src="script.responsive.js"></script>
<script src="../JQuery/newClientForm.js"></script>