<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
?>
<!DOCTYPE html>
<html dir="rtl" lang="FA">
<head>
    <meta charset="utf-8">
    <title>Capital</title>
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
		#currencyFilter, #filterDate{font-size:14px; font-weight:bold; padding:2px; padding-right:5px; border-radius:10px}
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
                    <li><a href="home.php" class="">متفرقه</a></li>
                    <li><a href="clients.php" class="">معامله داران</a></li>
                    <li><a href="transmissionCompanies.php" class="">حواله</a></li>
                    <li><a href="capital.php" class="active">سرمایه</a></li>
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
                                <li class="userAccess" type="disc" style="font-size:16px; font-weight:bolder; padding:5px"><a target="_blank" href="addCapitalForm.php">ثبت سرمایه</a></li>
                                <li type="disc" style="font-size:16px; font-weight:bolder; padding:5px"><a target="_blank" href="dailyReport.php">گزارش روزمره سرمایه</a></li>
                                <li type="disc" style="font-size:16px; font-weight:bolder; padding:5px"><a id="print" href="#">چاپ</a></li>
                            </ul>
                        </div>
                        <div class="art-layout-cell art-content">
                        	<article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                    <h2 class="art-postheader"><span class="art-postheadericon">سرمایه</span></h2>
                                </div>                
                				<div class="art-postcontent art-postcontent-0 clearfix">
                                	<div class="art-content-layout">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-0" style="width: 100%" >
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">ردیف</th>
                                                            <th width="10%">مقدار پول</th>
                                                            <th width="10%">
                                                                واحد پول
                                                                <select class="noPrint" id="currencyFilter">
                                                                    <option value="">همه</option>
																	<?php 
                                                                        require_once("../PHP/classes.php");
                                                                        $currency = new Capital();
                                                                        $currency->SelectCurrency();
                                                                    ?>
                                                                </select>
                                                            </th>
                                                            <th width="10%">نرخ تبادله</th>
                                                            <th width="10%">معادل به دالر</th>
                                                            <th width="10%">
                                                                تاریخ
                                                                <input class="noPrint" id="filterDate" type="text" size="10" />
                                                            </th>
                                                            <th class="noPrint" width="13%">امکانات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $capital = new Capital();
                                                            $capital->DisplayCapital();
                                                        ?>
                                                  </tbody>
                                                  <tfoot>
                                                        <tr>
                                                            <th class="noPrint numbers" colspan="7">
                                                                <?php
                                                                    require_once("../PHP/classes.php");
                                                                    $profit = new Capital();
                                                                    $profit->Profit();
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
<script src="../JQuery/capitals.js"></script>
<script src="../JQuery/Print/jQuery.print.js"></script>