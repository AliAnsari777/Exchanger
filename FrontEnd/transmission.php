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
    <title>Money Transmissions</title>
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
		#search, #option{font-size:18px; vertical-align:sub; color:rgba(255,255,255,1)}
		#searchValue {border-radius:5px; padding:5px; font-size:14px; font-weight:bold; margin-left:10px; color:rgba(0,0,0,1) !important}
		#parameter {border-radius:5px; padding-right:5px; font-size:14px; font-weight:bold}
		table{font-size:16px}
		thead, tfoot{background-color:rgb(204, 231, 255)}
		#currencyFilter{font-size:14px; font-weight:bold; padding:2px; padding-right:5px; border-radius:10px}
		input[type="checkbox"]{height:20px; width:20px; margin:0px 7px 0px 0px} 
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
                                <li class="userAccess" type="disc" style="font-size:16px; font-weight:bolder; padding:5px"><a target="_blank" href="newTransmissionForm.php?companyId=<?php echo $companyId; ?>">حواله جدید</a></li>
                                <li type="disc" style="font-size:16px; font-weight:bolder; padding:5px"><a id="print" href="#">چاپ</a></li>
                            </ul>
                        </div>
                        <div class="art-layout-cell art-content">
                        	<article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                    <h2 style="display:inline-table" class="art-postheader"><span class="art-postheadericon">حواله جات : <?php echo $companyName; ?></span></h2>
                                    <div class="noPrint" style="float:left; margin:12px">
                                        <label id="search" for="searchValue">جستجو</label>
                                        <input type="text" id="searchValue" name="searchValue" size="10">
                                        <label id="option" for="parameter">توسط</label>
                                        <select id="parameter">
                                            <option selected="selected" value="sender">فرستنده</option>
                                            <option value="reciever">گیرنده</option>
                                            <option value="created">تاریخ</option>
                                        </select>
                                        <input hidden="" id="companyId" name="companyId" value="<?php echo $companyId; ?>" />
                                    </div>
                                </div>                
                				<div class="art-postcontent art-postcontent-0 clearfix">
                                	<div class="art-content-layout">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-0" style="width: 100%; padding:0px; oveflow-x: auto" >
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th width="10px">ردیف</th>
                                                            <th width="90px" style="max-width:100px">فرستنده</th>
                                                            <th width="80px" style="max-width:100px">گیرنده</th>
                                                            <th width="80px" style="max-width:100px">آمد حواله</th>
                                                            <th width="90px" style="max-width:100px">رفت حواله</th>                                                            
                                                            <th style="max-width:70px">
                                                                واحد پول
                                                                <select style="max-width:70px" class="noPrint" id="currencyFilter">
                                                                    <option value="">همه</option>
																	<?php 
                                                                        require_once("../PHP/classes.php");
                                                                        $currency = new MoneyTransmission();
                                                                        $currency->SelectCurrency($companyId);
                                                                    ?>
                                                                </select>
                                                            </th>
                                                            <th width="50px">نرخ تبادله</th>
                                                            <th style="max-width:100px">معادل به دالر</th>
                                                            <th style="max-width:100px">نمبر حواله</th>
                                                            <th style="max-width:60px">محل ارسال</th>
                                                            <th style="max-width:60px">محل دریافت</th>
                                                            <th style="max-width:30px">تسلیم شد</th>
                                                            <th style="max-width:90px">تاریخ</th>
                                                            <th class="noPrint" style="max-width:100px">امکانات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
															require_once "../PHP/classes.php";
                                                        	$transmission = new MoneyTransmission();
															$transmission->DisplayTransmission($companyId);
                                                        ?>
                                                  </tbody>
                                                  <tfoot>
                                                        <tr>
                                                            <th class="noPrint numbers" colspan="14">
                                                                <?php
																  require_once "../PHP/classes.php";
                                                                  $totalCurrency = new MoneyTransmission();
																  $totalCurrency->TransmissionTotalCurrency($companyId);
                                                                ?>
                                                            </th>
                                                        </tr>
                                                  </tfoot>
                                                  </table>
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
<script src="../JQuery/transmission.js"></script>
<script src="../JQuery/Print/jQuery.print.js"></script>
