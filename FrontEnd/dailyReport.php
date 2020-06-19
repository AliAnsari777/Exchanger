<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
?>
<!DOCTYPE html>
<html dir="rtl" lang="FA">
<head>
    <meta charset="utf-8">
    <title>Daily Report of Capital</title>
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
		a{text-decoration:none;}
		#from, #to {border-radius:5px; padding-right:5px; font-size:14px; font-weight:bold}
		table{font-size:16px; width:60%}
		thead, tfoot{background-color:rgb(204, 231, 255)}
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
                        <div class="art-layout-cell art-sidebar1 noPrint">
                            <ul style="margin:20px 30px 0 0">
                                <li type="disc" style="font-size:16px; font-weight:bolder; padding:5px">تعیین محدوده زمانی</li>
                                <li style="font-size:16px; font-weight:bolder; padding:5px">از <input id="from"  size="15" /></li>
                                <li style="font-size:16px; font-weight:bolder; padding:5px">تا <input id="to"  size="15" /></li>
                                <li style="text-align:center; "><input id="sendDate" style="height:30px; width:60px; font-weight:bold; font-size:14px" type="button" value="فیلتر" /></li>
                                <li type="disc" style="font-size:16px; font-weight:bolder; padding:5px"><a id="print" href="#">چاپ</a></li>
                            </ul>
                        </div>
                        <div class="art-layout-cell art-content">
                        	<article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                    <h2 class="art-postheader"><span class="art-postheadericon">گزارش روزمره سرمایه</span></h2>
                                </div>                
                				<div class="art-postcontent art-postcontent-0 clearfix">
                                	<div class="art-content-layout">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-0" style="width: 100%" >
                                            	<div align="center">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th width="3%">ردیف</th>
                                                                <th width="10%">مجموع سرمایه</th>
                                                                <th width="10%">مجموع طلبات مردم</th>
                                                                <th width="10%">سرمایه خالص</th>
                                                                <th width="10%">تاریخ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                require_once("../PHP/classes.php");
                                                                $dailyRport = new Capital();
                                                                $dailyRport->DailyCapitalReport();
                                                            ?>
                                                        </tbody>
                                                      </table>
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
<script src="../JQuery/dailyReport.js"></script>
<script src="../JQuery/Print/jQuery.print.js"></script>