<?php
/**
 * @author J.Okabe
 */

namespace MyMailForm;
session_start();
//ファイルを実行したらサンクスページへ遷移
header( 'Location:http://suijo-calbi.com/thanks' );

define( 'MY_NAME', '水上カルビ' );
define( 'MY_MAIL_ADDRESS', 'suijocalbi@gmail.com' );
define( 'MAIL_SUBJECT', '【水上カルビ】お問い合わせありがとうございます' );



try {
	$formContents = $_POST['formContents'];
	if( !empty( $formContents['address'] ) ) {

		if( $_SESSION['token'] != $formContents['token'] ) throw new \Exception('Token is not correct!');

		$mailAddress = $formContents['address'];
		$mailAddress = sanitize( $mailAddress );
		$name = $formContents['name'] . '様';
		if( isMailAddress( $mailAddress ) ) {			
			sendJapaneseMail( MY_NAME, MY_MAIL_ADDRESS, $formContents['name'], $formContents['address'], $formContents['subject'], adminMailContents( $formContents ) );
			sendJapaneseMail( $name, $mailAddress, MY_NAME, MY_MAIL_ADDRESS, MAIL_SUBJECT, returnMailContents( $formContents ) );
		}else{
			throw new \Exception('E-mail address is incorrect!');
		}
	}else{
		throw new \Exception('E-mail address is incorrect!');
	}
	
}catch ( \Exception $e ) {
	echo $e->getMessage();
}

/**
 * 日本語でメール送信
 * 
 * @param string $toName フォームに入力された名前
 * @param string $toAddr フォームに入力されたメールアドレス
 * @param string $fromName　メール送信者の名前
 * @param string $formAddr メール送信者のメールアドレス
 * @param string $subject メールのタイトル
 * @param string $body メール本文
 * @return bool
 */
function sendJapaneseMail( $toName, $toAddr, $fromName, $fromAddr, $subject, $body ){

	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	$toNameEnc = mb_encode_mimeheader($toName,"ISO-2022-JP");
	$to = "$toNameEnc<$toAddr>";
	$fromNameEnc = mb_encode_mimeheader($fromName, "ISO-2022-JP");
	$from = "$fromNameEnc<$fromAddr>";
	$header  = "From: $from\n";
	$header .= "Reply-To: $from";

	$ret = mb_send_mail($to, $subject, $body, $header);
	
	return $ret;
}

/**
 * 
 * @param string $text 
 * @return bool 
 */
function isMailAddress( $text ) {
	
	return preg_match( '|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', $text );
}

/**
 * 
 * @param string $text 
 * @return Mixed エスケープした文字列、javascriptが入っていたら空文字
 */
function sanitize( $text = '' ) {
	
	if( preg_match_all( '/javascript/', $text ) === 0 ) {
		return htmlspecialchars( $text, ENT_QUOTES);
	} else {
		return '';
	}
}

/**
 * 自動返信メールの内容
 * 
 * @return string $ret
 */
function returnMailContents( $data = array() ) {
	$ret = 
<<<EOM
{$data["name"]}様

〜〜このメールは自動返信です〜〜

お問い合わせありがとうございます。
水上カルビです。

お問い合わせ頂きました内容、下記で承りました。
内容を確認次第、折り返しご連絡をさせて頂きますので今しばらくお待ち下さい。

------ 件名：{$data["subject"]} ------

{$data["message"]}


------------------------------
埼玉県発 4ピースロックバンド
【水上カルビ】
下北沢・新宿を拠点に全国を回りながら活動中。
現代っ子ならではの ヘタレ感・負け組感をまとう歌詞と
それを発散させるような歌声が特徴。

mail:suijocalbi@gmail.com
Twitter:https://twitter.com/suijocalbi
youtube:https://www.youtube.com/channel/UCt-ov37GEnkxBg3xeBBU_Ag

EOM;
	
	return $ret;
}

/**
 * 
 * @param array $data 
 * @return string $contents
 */
function adminMailContents( $data ) {
	
	$contents = '';
	if( !empty( $data ) ) {
		foreach ($data as $key => $value) {
			switch ( $key ) {
				case 'name':
					$contents .='差出人様：' . $value . PHP_EOL;
					break;
				case 'kana':
					$contents .='カナ：' . $value . PHP_EOL;
					break;
				case 'message':
					$contents .='〜お問い合わせ内容〜'  . PHP_EOL . $value . PHP_EOL;
					break;
				default:
					
					break;
			}
		}
	}
	return $contents;
	
}
