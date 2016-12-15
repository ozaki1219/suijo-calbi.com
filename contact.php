<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="keywords" content="水上カルビ,邦ロック,ロキノン">
<meta name="description" content="埼玉県発 4ピースロックバンド「水上カルビ」。
下北沢・新宿を拠点に全国を回りながら活動中。
現代っ子ならではの ヘタレ感・負け組感をまとう歌詞とそれを発散させるような歌声が特徴。
「水上カルビ」という名前は、夢のなかで自分たちが水上カルビとして大きなステージに立っているシーンを見たことからつけられた
">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="google-site-verification" content="H8oVLksz4YjimoXHPvhNV_pUtqQROJl_repjcIw3_DA" /><title>水上カルビ | コンタクト</title>
<link href="./common/img/favicon.ico" rel="icon"  />
<link href="./common/css/import.css" rel="stylesheet" type="text/css">
<link href="./common/css/stylesheet.css" rel="stylesheet" type="text/css">
<script src="./common/js/jquery-1.11.0.min.js"></script>
<script src="./common/js/accordion.js"></script>
<script src="./common/js/smoothScroll.js"></script>
</head>
<body>
<header>
	<div id="header" class="clearfix">
	<h1 class="logo clearfix"><a href="index"><img src="./common/img/rogo.png" alt="水上カルビオフィシャルHP" /></a></h1>
	<nav id="gNaviPC" class="clearfix">
<ul  class="clearfix">
				<li class="clearfix"><a href="index"><img src="./common/img/gnavi01.png" alt="HOME"></a></li>
                 <li class="clearfix"><a href="live"><img src="./common/img/gnavi02.png" alt="LIVE" ></a></li>
				<li class="clearfix"><a href="biography"><img src="./common/img/gnavi03.png" alt="BIOGRAPHY" ></a></li>
				<li class="clearfix"><a href="discography"><img src="./common/img/gnavi04.png" alt="DISCOGRAPHY" ></a></li>
				<li class="clearfix"><a href="contact"><img src="./common/img/gnavi05.png" alt="CONTACT"></a></li>
                 <li><a href="https://twitter.com/suijocalbi" target="_blank"><img src="common/img/twitter.png" alt="twitter"></a></li>
   				<li class="lastList"><a href="https://www.youtube.com/channel/UCt-ov37GEnkxBg3xeBBU_Ag" target="_blank"><img src="common/img/youtube.png" alt="youtube"></a></li>
	</ul>
  	</nav>
	<nav id="gNaviSP" class="clearfix">
    	<p class="burger"><img src="./common/img/burger.png" alt="水上カルビオフィシャルHP" /></p>
        <ul  class="clearfix">
			<li><a href="index">HOME</a></li>
			<li><a href="live">LIVE</a></li>
            			<li><a href="biography">BIOGRAPHY</a></li>
			<li><a href="discography">DISCOGRAPHY</a></li>
	</ul>
  	</nav>
    </div>
</header>  
<article id="content" class="clearfix">
<h2 id="lowerVisual"><img src="./img/contact_lowerTIT.png"  alt="BIOGRAPHY" /></h2>
<div class="contact_sec01">
<p class="mb5">コンサート・ライブ・イベントなどのブッキング全般や、取材、お仕事などのお問い合わせは下記フォームをご利用ください。</p>
<p>チケット予約を希望の方は「件名」の欄に「チケット予約希望」と記載の上、「お問い合わせ内容」の欄に「公演名」と「チケット枚数」の記入をお願い致します。</p>
</div>
<div class="contact_form">
<form action="SendThxMail.php" method="POST">
<table>
<tbody>
<tr>
<th>お名前<span class="required">&nbsp;※必須</span></th>
<td><input type="text" name="formContents[name]" value=""  class="" required></td>
</tr>
<tr>
<th>フリガナ<span class="required">&nbsp;※必須</span></th>
<td><input type="text" name="formContents[kana]" value="" class="" required></td>
</tr>
<tr>
<th>メールアドレス<span class="required">&nbsp;※必須</span></th>
<td><input type="email" name="formContents[address]" value="" class="" required></td>
</tr>
<tr>
<th>件名</th>
<td><input type="title" name="formContents[subject]" value="" class=""></td>
</tr>
<tr>
<th>お問い合せ内容<span class="required">&nbsp;※必須</span></th>
<td><textarea name="formContents[message]" class=""></textarea>
<?php 
$_SESSION['token'] = session_id(); 
echo '<input  name="formContents[token]" type="hidden" value="' .  $_SESSION['token'] . '">';
?>	
</td>
</tr>
</tbody></table>
<div class="form_btn"><input type="submit" value="送信" class=""></div>
</form>
</div>
</article>
<footer id="footer"><p class="to_top"><a href="#header"><img src="./common/img/to_top.png"  alt="TO TOP" /></a></p><p>@ copyright 水上カルビ All Right Reserved.</p></footer>
</body>
</html>
