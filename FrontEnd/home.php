<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
?>
<!DOCTYPE html>
<html dir="rtl" lang="FA">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<style>
		.art-content .art-postcontent-0 .layout-item-0 { margin-top: 10px;margin-bottom: 10px;margin-left: 10px;  }
		.art-content .art-postcontent-0 .layout-item-1 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#E3E3E3;border-right-color:#E3E3E3;border-bottom-color:#E3E3E3;border-left-color:#E3E3E3; padding-right: 10px;padding-left: 10px;  }
		.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
		.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
		a{text-decoration:none;}
		#search, #option{font-size:18px; vertical-align:sub; color:rgba(255,255,255,1)}
		#searchValue {border-radius:5px; padding:5px; font-size:14px; font-weight:bold; margin-left:10px; color:rgba(0,0,0,1) !important}
		#parameter {border-radius:5px; padding-right:5px; font-size:14px; font-weight:bold}
		table{font-size:16px}
		thead{background-color:rgb(204, 231, 255)}
		.art-article td{padding-right:10px}
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
		<nav class="art-nav noPrint">
        	<a href="../PHP/logout.php" style="float:left; margin:7px 0 0 15px"><img height="32px" width="32px" src="images/logout.ico"></a>
           	<a href="../PHP/logout.php" style="float:left; margin:10px 0 0 15px; font-size:18px; text-decoration:none">خروج</a>
    		<div class="art-nav-inner">
    			<ul class="art-hmenu">
                	<li><a href="home.php" class="active">متفرقه</a></li>
                    <li><a href="clients.php">معامله داران</a></li>
                    <li><a href="transmissionCompanies.php" class="">حواله</a></li>
                    <li><a href="capital.php">سرمایه</a></li>
                    <li class="userAccess"><a href="users.php">کاربران</a></li>
                </ul> 
        	</div>
    	</nav>
		<div class="art-sheet clearfix">
        	<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1 noPrint">
                        	<ul style="margin:20px 30px 0 0">
                           		<li  class="userAccess" type="disc" style="font-size:16px; font-weight:bolder"><a target="_blank" href="newTempClientForm.php">معامله جدید</a></li>
                                <li type="disc" style="font-size:16px; font-weight:bolder; padding:5px"><a id="print" href="#">چاپ</a></li>
                            </ul>
                        </div>
                        <div class="art-layout-cell art-content">
                        	<article class="art-post art-article">
                            	<div class="art-postmetadataheader">
                                    <h2 style="display:inline-table" class="art-postheader"><span class="art-postheadericon">لیست معامله داران موقت</span></h2>
                                    <div class="noPrint" style="float:left; margin:12px">
                                        <label id="search" for="searchValue">جستجو</label>
                                        <input type="text" id="searchValue" name="searchValue" size="10">
                                        <label id="option" for="parameter">توسط</label>
                                        <select id="parameter">
                                            <option selected="selected" value="name">نام</option>
                                            <option value="note">از درک</option>
                                            <option value="created">تاریخ</option>
                                        </select>
                                    </div>
                                </div>                          
				                <div class="art-postcontent art-postcontent-0 clearfix">
                                	<div class="art-content-layout-wrapper layout-item-0">
										<div class="art-content-layout">
    										<div class="art-content-layout-row">
    											<div id="TempClients" class="art-layout-cell layout-item-1" style="width: 100%" >
                                                	<?php
														require_once "../PHP/classes.php";
														$tempClient = new TemporaryClients();
														$tempClient->DisplayTemporaryClients();
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
<input id="userClass" hidden="" value="<?php echo htmlentities($_SESSION['groups']); ?>" />
</body>
</html>
<script src="jquery.js"></script>
<script src="script.js"></script>
<script src="script.responsive.js"></script>
<script src="../JQuery/home.js"></script>
<script src="../JQuery/Print/jQuery.print.js"></script>