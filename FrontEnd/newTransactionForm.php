<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	if(isset($_GET['id']))
	{
		$userId = htmlentities($_SESSION['userId']);
		$clientId = htmlentities($_GET['id']);
	}
?>

<!DOCTYPE html>
<html dir="rtl" lang="FA">
<head>
    <meta charset="utf-8">
    <title>New Transaction</title>
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
		#currency{width:99%; height:30px; border-radius:5px; padding:5px; font-size:16px;}
		#note{font-size:16px; resize:none; height:60px; width:95%; padding:5px; border-radius:5px} 
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
                                <h1 style="font-size:36px" align="center">معامله جدید</h1>
                            </div>                    
                			<div class="art-postcontent art-postcontent-0 clearfix">
                            	<div class="art-content-layout">
    								<div class="art-content-layout-row">
    									<div class="art-layout-cell layout-item-0" style="width: 100%" >
                                        	<div align="center">
											<form action="../PHP/newTransaction.php" method="post">
                                                <input type="hidden" id="userId" name="userId" value="<?php echo $userId; ?>" />
                                                <input type="hidden" id="clientId" name="clientId" value="<?php echo $clientId; ?>" />
                                            	<table align="center">
                                                	<tr>
                                                    	<th><label for="incoming">آمد پول</label></th>
                                                        <td><input type="text" id="incoming" name="incoming" size="30" /></td>
                                                    </tr>
                                                    <tr>
                                                    	<th><label for="outgoing">رفت پول</label></th>
                                                        <td><input type="text" id="outgoing" name="outgoing" size="30" /></td>
                                                    </tr>
                                                    <tr>
                                                    	<th><label for="currency">واحد پول</label></th>
                                                        <td>
                                                        	<select id="currency" name="currency">
                                                      		    <option selected value="دالر">دالر</option>
                                                                <option value="یورو">یورو</option>
                                                                <option value="پوند انگلیس">پوند انگلیس</option>
                                                                <option value="افغانی">افغانی</option>
                                                                <option value="روپیه">روپیه</option>
                                                                <option value="کلدار">کلدار</option>
                                                                <option value="تومان">تومان</option>
                                                                <option value="ریال عربستان">ریال عربستان</option>
                                                                <option value="متفرقه">متفرقه</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr id="otherCurrency" hidden="">
                                                    	<th><label for="otherCurrency">واحد پولی متفرقه</label></th>
                                                    	<td><input type="text" id="otherCurrency" name="otherCurrency" size="30"></td>
                                                    </tr>
                                                     <tr>
                                                    	<th><label for="exchangeRate">نرخ تبادله</label></th>
                                                        <td><input type="text" id="exchangeRate" name="exchangeRate" size="30" /></td>
                                                    </tr>
                                                    <tr>
                                                    	<th><label for="equalToDollar">معادل به دالر</label></th>
                                                        <td><input readonly type="text" id="equalToDollar" name="equalToDollar" size="30" /></td>
                                                    </tr>
                                                    <tr>
                                                    	<th><label for="note">از درک</label></th>
                                                        <td><textarea id="note" name="note" size="30"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                    	<td colspan="3" style="text-align:center">
                                                        	<button id="submit" type="submit">ثبت</button>
                                                            <button id="cancel" type="button">لغو</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                         	</form>
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
<script src="../JQuery/newTransactionForm.js"></script>