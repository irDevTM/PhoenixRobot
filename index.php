<?php
/*

*/
ob_start();
$API_KEY = 'TOKEN'; // توکن بات را اینجا بگذارید
##------------------------------##
define('API_KEY',$API_KEY);
include 'jdf.php';
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

 function sendMessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}
function sendphoto($chat_id, $photo, $action){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'action'=>$action
	]);
	}
function kick($chat_id, $from_id){
	bot('kickChatMember',[
	'chat_id'=>$chat_id,
	'user_id'=>$from_id
	]);
	}
	function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
function save($filename,$TXTdata)
	{
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
function remove($FileName){
$FileHandle = fopen($FileName, 'w') or die("can't open file");
fclose($FileHandle);
unlink($FileName);
}
function ping($host, $port, $timeout) {
  $tB = microtime(true);
  $fP = fSockOpen($host, $port, $errno, $errstr, $timeout);
  if (!$fP) { return "down"; }
  $tA = microtime(true);
  return round((($tA - $tB) * 1000), 0)." ms";
}
function getcreator($chat_id){
  $up = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getChatAdministrators?chat_id='.$chat_id),true);
  $result = $up['result'];
  foreach($result as $key=>$value){
    $found = array_search("creator",$result[$key]);
    if($found !== false){
      return $result[$key]['user'];
    }
  }
}
function deleteMessage($chat_id,$message_id) {
  $url = 'https://api.telegram.org/bot'.API_KEY.'/deletemessage?chat_id='.$chat_id.'&message_id='.$message_id;
  file_get_contents($url);
  //$up = json_decode(file_get_contents($url));
  //return $up['ok'];
}
function getgpadmin($chat_id){
  $up = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getChatAdministrators?chat_id='.$chat_id),true);
  $result = $up['result'];
  foreach($result as $key=>$value){
    $found = array_search("administrator",$result[$key]);
    if($found !== false){
      return $result[$key]['user'];
    }
  }
}
function getChat($chat_id){
  $up = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getChat?chat_id='.$chat_id),true);
  if($up['ok'] == false){
	  return false;
  }
  else{
  $result = $up['result'];
return $result;
}
}
function getChatMembersCount($chat_id){
  $up = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getChatMembersCount?chat_id='.$chat_id),true);
  if($up['ok'] == false){
	  return false;
  }
  else{
  $result = $up['result'];
return $result;
}
}
	//====================ᵗᶦᵏᵃᵖᵖ======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$text_len = strlen($text);
$caption = $update->message->caption;
$caption_len = strlen($caption);
$edited = $update->edited_message;
$photo = $update->message->photo;
$english = preg_match("/\w+/",$text);
$english2 = preg_match("/\w+/",$caption);
$number = preg_match("/[0-9]/", $text);
$number2 = preg_match("/[0-9]/", $caption);
$arabic = preg_match("/[\u0600-\u06FF\uFB8A\u067E\u0686\u06AF]+/", $text);
$isbot = preg_match("/[a-zA-Z_]+[Bb][Oo][Tt]+/", $new_chat_member_username);
$echat_id = $update->edited_message->chat->id;
$echatType = $update->edited_message->chat->type;
$efrom_id = $update->edited_message->from->id;
$emessage_id = $update->edited_message->message_id;
$egpadmin = getgpadmin($echat_id);
$egpadmin_id = $egpadmin['id'];
$ecreator = getcreator($echat_id);
$eowner_id = file_get_contents("data/$chat_id/owner.txt");
$emodlist_id = file_get_contents("data/$echat_id/modlist.txt");
$from_id = $message->from->id;
$from_fname = $message->from->first_name;
$from_uname = $message->from->username;
$chatType = $message->chat->type;
$new_chat_member = $message->new_chat_member;
$new_chat_member_id = $new_chat_member->id;
$new_chat_member_first_name = $new_chat_member->first_name;
$new_chat_member_username = $new_chat_member->username;
$left_chat_member = $message->left_chat_member;
$left_chat_member_id = $left_chat_member->id;
$left_chat_member_first_name = $left_chat_member->first_name;
$left_chat_member_username = $left_chat_member->username;
$groupname = $message->chat->title;
$me_username = "PhoenixRobot"; // یوزرنیم بات خود را بدون @ بگذارید
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$cchatType = $update->callback_query->message->chat->type;
$messageid = $update->callback_query->message->message_id;
$creator = getcreator($chat_id);
$creator_id = $creator['id'];
$gpadmin = getgpadmin($chat_id);
$gpadmin_id = $gpadmin['id'];
$ADMIN = 188740934; // ایدی عددی مدیر ربات را در اینجا بگذارید
$sudos = file_get_contents("sudos.txt");
$sudoss = explode("\n", $sudos);
$owner_id = file_get_contents("data/$chat_id/owner.txt");
$modlist_id = file_get_contents("data/$chat_id/modlist.txt");
$mlid = explode("\n", $modlist_id);
$whitelist = file_get_contents("data/$chat_id/whitelist.txt");
$wlid = explode("\n", $wlid);
$modlistid = file_get_contents("data/$chatid/modlist.txt");
$mlid2 = explode("\n", $modlistid);
$muteusers = file_get_contents("data/$chat_id/mute.txt");
$muteusersss = explode("\n", $muteusers);
$filters = file_get_contents("data/$chat_id/filters.txt");
$filterss = explode("\n", $filters);
$reply = $update->message->reply_to_message;
$reply_fname = $reply_id = $update->message->reply_to_message->from->first_name;
$reply_id = $update->message->reply_to_message->from->id;
$reply_msgid = $update->message->reply_to_message->message_id;
$message_id = $update->message->message_id;
$reply_uname = $update->message->reply_to_message->from->username;
$creatorr = getcreator($chatid);
$ownerid = file_get_contents("data/$chatid/owner.txt");
$floods = file_get_contents("data/$chat_id/floods.txt");
$warns = file_get_contents("data/$chat_id/warns.txt");
$ruserwarn = file_get_contents("data/$chat_id/warns/$reply_id.txt");
$userwarn = file_get_contents("data/$chat_id/warns/$from_id.txt");
$lock_links = file_get_contents("data/$chat_id/locks/links.txt");
$lock_flood = file_get_contents("data/$chat_id/locks/flood.txt");
$lock_tag = file_get_contents("data/$chat_id/locks/tag.txt");
$lock_username = file_get_contents("data/$chat_id/locks/username.txt");
$lock_number = file_get_contents("data/$chat_id/locks/number.txt");
$lock_chat = file_get_contents("data/$chat_id/locks/chat.txt");
$lock_chat = file_get_contents("data/$chat_id/locks/chat.txt");
$lock_forward = file_get_contents("data/$chat_id/locks/forward.txt");
$lock_reply = file_get_contents("data/$chat_id/locks/reply.txt");
$lock_edit= file_get_contents("data/$chat_id/locks/edit.txt");
$lock_english = file_get_contents("data/$chat_id/locks/english.txt");
$lock_arabic = file_get_contents("data/$chat_id/locks/arabic.txt");
$lock_join = file_get_contents("data/$chat_id/locks/join.txt");
$lock_bots = file_get_contents("data/$chat_id/locks/bots.txt");
$lock_cmd = file_get_contents("data/$chat_id/locks/cmd.txt");
$lock_emoji = file_get_contents("data/$chat_id/locks/emoji.txt");
$characters = file_get_contents("data/$chat_id/locks/characters.txt");
$lock_char = file_get_contents("data/$chat_id/locks/character.txt");
$lock_videomessage = file_get_contents("data/$chat_id/locks/videomsg.txt");
$mute_stickers = file_get_contents("data/$chat_id/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chat_id/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chat_id/locks/media/video.txt");
$mute_music = file_get_contents("data/$chat_id/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chat_id/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chat_id/locks/media/document.txt");
$mute_location = file_get_contents("data/$chat_id/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chat_id/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chat_id/locks/media/game.txt");
$groups = file_get_contents("groups.txt");
$groups2= explode("\n",$groups);
$users = file_get_contents("users.txt");
$users2= explode("\n",$users);
$banall = file_get_contents("banall.txt");
$inqurey = $update->inline_query->query;
$time_zone = '12600';
$today = date("Y-m-d", time()+$time_zone);
$expire = file_get_contents("data/$chat_id/expire.txt");
//====================check banall========================//
if (strpos($banall , "$from_id") !== false && $chatType == "private") {
sendMessage($chat_id,"شما از ربات و تمامی گروه های آن ، بن شده اید.
لطفا پیام ندهید!", "MarkDown");
	}
elseif(strpos($banall , "$from_id") !== false && $chatType != "private"){
	sendMessage($chat_id,"شما از ربات و تمامی گروه های آن ، بن شده اید.
بزودی اخراج می شوید", "MarkDown");
	sleep(3);
	bot('kickChatMember',[
	'chat_id'=>$chat_id,
	'user_id'=>$from_id
	]);
	}
//====================local commands======================//
if ($inqurey == "Ads") {
   bot('answerInlineQuery', [
        'inline_query_id' => $update->inline_query->id,
        'results' => json_encode([[
            'type' => 'article',
            'id' => base64_encode(rand(5, 555)),
            'title' => 'بنر تبلیغاتی',
            'input_message_content' => ['parse_mode' => 'MarkDown', 'message_text' => "ربات مدیریت گروه فوق حرفه ای PhoenixRobot
      آنتی اسپم
      آنتی لینک
      دارای حدود 30 قفل
      بهترین ربات برای مدیریت گروه شما
      با قیمتی کم"],
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        ['text' => "عضویت در ربات", 'url' => 'https://telegram.me/PhoenixRobot']
                    ],
                    [
                        ['text' => "اشتراک با دیگران", 'switch_inline_query' => 'Ads']
                    ]
                ]
            ]
        ]])
    ]);
}
if ($inqurey == "Me"){
	$inqurey_fname = $update->inline_query->from->first_name;
	$inqurey_uname = $update->inline_query->from->username;
	$inqurey_fid = $update->inline_query->from->id;
	bot('answerInlineQuery', [
        'inline_query_id' => $update->inline_query->id,
        'results' => json_encode([[
            'type' => 'article',
            'id' => base64_encode(rand(5, 555)),
            'title' => 'Me',
            'input_message_content' => ['parse_mode' => 'MarkDown', 'message_text' => "*Name*:
			$inqurey_fname
			*UserName:*
			$inqurey_uname
			*ID:*
			$inqurey_fid"],
        ]])
    ]);
}
//====================local commands======================//
if($text == '/start'){
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"باسلام کاربر گرامی $from_fname ✋️

به ربات ضد اسپم پیشرفته Phoenix خوش آمدید 🌺
امکانات بی نظیری برای مدیریت و نظارت بر گروه های شما فراهم نموده ایم.🌐
شما می توانید با پرداخت هزینه ای اندک ربات را برای گروه خود اجاره کنید. مطمئنیم که بزودی مشتری دائمی ما خواهید بود!❤️
تعرفه های اجاره ربات برای گروهتان را می توانید در قسمت سفارش گروه ببینید.
با خرید بیشتر از ما تخفیف های خوبی نیز خواهید گرفت!
قبل از خرید نیز میتوانید در گروه تست ما، ربات را تست کنید و از امکانات بی نظیر ربات ما باخبر شوید.
ضمنا پیشنهاد می شود حتما در کانال پشتیبانی ما عضو شوید! گروه های رایگانی در آنجا می گذاریم!
باتشکر از اینکه وقت خود را صرف خواندن این متن نمودید!🌹",
	'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [
                        ['text'=>"سفارش گروه",'callback_data'=>"sefaresh"]
                ],
                [
                    ['text'=>"سازنده و پشتیبانی",'url'=>"https://telegram.me/phoenixsup"],['text'=>"کانال پشتیبانی",'url'=>"https://telegram.me/phoenix_official"]

                ]
            ]
        ])
		]);
if(!in_array($from_id, $users2)){
$myfile2 = fopen("users.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
}
elseif ($data == "sefaresh") {
if(file_get_contents("buy.txt") == "on"){
bot('editMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"تعرفه های سفارش ربات :
ماهانه : 1500 تومان
2 ماهه : 2500 تومان
3 ماهه : 4000 تومان
راهنمای سفارش ربات :
لینک گروه خود را مطابق دستور زیر بفرستید:
/save LINK
به جای LINK لینک گروه خود را بگذارید.
بزودی با شما تماس خواهیم گرفت. لطفا یوزرنیم خود را تا آن موقع تغییر ندهید!
توجه!: جهت درخواست 3 روز تست رایگان ربات طبق راهنمای زیر عمل کنید:
/test LINK", 'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [
                     ['text'=>"برگشت",'callback_data'=>"back"]
                ]
            ]
        ])
]);
}
else{
	bot('editMessageText',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"خرید گروه غیر فعال است!", 'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [
                     ['text'=>"برگشت",'callback_data'=>"back"]
                ]
            ]
        ])
]);
}
}
elseif ($data == "back") {
$fromfname = $update->callback_query->from->first_name;
bot('editMessageText',[
	'chat_id'=>$chatid,
        'message_id'=>$messageid,
	'text'=>"باسلام کاربر گرامی $fromfname ✋️

به ربات ضد اسپم پیشرفته Phoenix خوش آمدید 🌺
امکانات بی نظیری برای مدیریت و نظارت بر گروه های شما فراهم نموده ایم.🌐
شما می توانید با پرداخت هزینه ای اندک ربات را برای گروه خود اجاره کنید. مطمئنیم که بزودی مشتری دائمی ما خواهید بود!❤️
تعرفه های اجاره ربات برای گروهتان را می توانید در قسمت سفارش گروه ببینید.
با خرید بیشتر از ما تخفیف های خوبی نیز خواهید گرفت!
قبل از خرید نیز میتوانید در گروه تست ما، ربات را تست کنید و از امکانات بی نظیر ربات ما باخبر شوید.
ضمنا پیشنهاد می شود حتما در کانال پشتیبانی ما عضو شوید! گروه های رایگانی در آنجا می گذاریم!
باتشکر از اینکه وقت خود را صرف خواندن این متن نمودید!🌹",
	'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [
                        ['text'=>"سفارش گروه",'callback_data'=>"sefaresh"]
                ],
                [
                    ['text'=>"سازنده و پشتیبانی",'url'=>"https://telegram.me/phoenixsup"],['text'=>"کانال پشتیبانی",'url'=>"https://telegram.me/phoenix_official"]

                ]
            ]
        ])
		]);
}
elseif(strpos($text, "/save") !== false && $chatType == "private"){
if(file_get_contents("buy.txt") == "on"){
$sefaresh_link = str_replace("/save ","",$text);
if(strpos($sefaresh_link, ".me") !== false){
if($from_uname != ''){
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"لینک گروه با موفقیت به پشتیبانی ربات ارسال شد!
منتظر باشید تا با شما تماس بگیریم.
لطفا تا آن وقت لینک گروه و یوزرنیم خود را تغییر ندهید!",
	'parse_mode'=>'MarkDown'
		]);
$fp = fopen( "sudos.txt", 'r');
while( !feof( $fp)) {
 $sud = fgets( $fp);
		bot('sendMessage',[
		'chat_id'=>$sud,
		'text'=>"#سفارش
لینک گروه:
$sefaresh_link
یوزرنیم فرستنده:
@$from_uname",
		'parse_mode'=>'HTML'
		]);
}
bot('sendMessage',[
	'chat_id'=>$ADMIN,
	'text'=>"#سفارش
لینک گروه:
$sefaresh_link
یوزرنیم فرستنده:
@$from_uname",
	'parse_mode'=>'HTML'
		]);
}
else{
		bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"شما یوزرنیمی ندارید!
	لطفا قبل از سفارش برای خود یوزرنیمی انتخاب کنید تا تیم ما بتواند با شما تماس بر قرار کند.",
	'parse_mode'=>'HTML'
		]);
}
}
else{
		bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"لطفا لینک تلگرامی معتبر بفرستید",
	'parse_mode'=>'HTML'
		]);
}
}
else{
	bot('sendMessage',[
	'chat_id'=>$ADMIN,
	'text'=>"خرید گروه غیر فعال است!",
	'parse_mode'=>'HTML'
		]);
}
}
elseif(strpos($text, "/test") !== false && $chatType == "private"){
if(file_get_contents("buy.txt") == "on"){
$sefaresh_link = str_replace("/test ","",$text);
if(strpos($sefaresh_link, ".me") !== false){
if($from_uname != ''){
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"لینک گروه با موفقیت به پشتیبانی ربات ارسال شد!
منتظر باشید تا با شما تماس بگیریم.
لطفا تا آن وقت لینک گروه و یوزرنیم خود را تغییر ندهید!",
	'parse_mode'=>'MarkDown'
		]);
		$fp = fopen( "sudos.txt", 'r');
while( !feof( $fp)) {
 $sud = fgets( $fp);
		bot('sendMessage',[
		'chat_id'=>$sud,
		'text'=>"#سفارش
لینک گروه:
$sefaresh_link
یوزرنیم فرستنده:
@$from_uname",
		'parse_mode'=>'HTML'
		]);
}
bot('sendMessage',[
	'chat_id'=>$ADMIN,
	'text'=>"#سفارش_گروه_تست
لینک گروه:
$sefaresh_link
یوزرنیم فرستنده:
@$from_uname",
	'parse_mode'=>'HTML'
		]);
}
else{
		bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"شما یوزرنیمی ندارید!
	لطفا قبل از سفارش برای خود یوزرنیمی انتخاب کنید تا تیم ما بتواند با شما تماس بر قرار کند.",
	'parse_mode'=>'HTML'
		]);
}
}
else{
		bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"لطفا لینک تلگرامی معتبر بفرستید",
	'parse_mode'=>'HTML'
		]);
}
}
else{
	bot('sendMessage',[
	'chat_id'=>$ADMIN,
	'text'=>"خرید گروه غیر فعال است!",
	'parse_mode'=>'HTML'
		]);
}
}
//=========================Expire==================//
if(strpos($text,"/charge") !== false && ($from_id == $ADMIN || in_array($from_id, $sudoss)) && $chatType != 'private'){
 $date2 = trim(str_replace("/charge ","",$text));
 if(is_numeric($date2)){
  if($date2 > 0){
   $date3 = $date2*86400;
   $time_zone = '12600';
   $expire = date("Y-m-d", time()+$date3+$time_zone);
   save("data/$chat_id/expire.txt",$expire);
   sendMessage($chat_id,"تاریخ انقضا گروه به $date2 روز دیگر تنظیم شد!", "MarkDown");
  }else{
   sendMessage($chat_id,"تعداد روز وارد شده باید از 0 روز بیشتر باشد!", "MarkDown");
  }
 }else{
  sendMessage($chat_id,"لطفا تعداد روز هارا با عدد وارد نماييد", "MarkDown");
 }
}
$time_zone = '12600';
$today = date("Y-m-d", time()+$time_zone);
$expire = file_get_contents("data/$chat_id/expire.txt");
if($text == "/expire"){
	if($from_id == $owner_id || in_array($from_id, $mlid)){
		$exp = explode("-", $expire);
		$expi = gregorian_to_jalali($exp[0] , $exp[1] , $exp[2] , "/");
		sendMessage($chat_id, "تاریخ انقضای گروه: \n $expi", "MarkDown");
	}
}
while($true){
	$time_zone = '12600';
	$today = date("Y-m-d", time()+$time_zone);
	$expire = file_get_contents("data/$chat_id/expire.txt");
	if($today == $expire){
	 unlink("data/$chat_id/expire.txt");
	 sendMessage($chat_id,"تاریخ انقضای این گروه به پایان رسید و ربات از گروه خارج خواهد شد! جهت شارژ مجدد گروه از داخل ربات اقدام نمایید.", "MarkDown");	
	 bot('LeaveChat',[
	 'chat_id'=>$chat_id
	  ]);
	}
}
//=========================Expire==================//
if($text == "/stats sudos" && $from_id == $ADMIN){
	$tsudos = count($sudoss)-1;
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"Count Of Sudos: $tsudos
	*Sudos ID:*
	$sudos",
	'parse_mode'=>"MarkDown"
	]);
}
elseif($text == "/stats all" && $from_id == $ADMIN || $text == "/stats all" && in_array($from_id, $sudoss)){
$tusers = count($users2)-1;
$tgroups = count($groups2)-1;
		bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"<b>Stats Of The Bot</b>",
		'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Groups/SuperGroups",'callback_data'=>'text'], ['text'=>"$tgroups", 'callback_data'=>"text"]
 ],
 [
 ['text'=>"Members", 'callback_data'=>"text"], ['text'=>"$tusers", 'callback_data'=>"text"]
 ]
	]
	])
		]);
}
elseif(strpos($text, "/banall") !== false && $from_id == $ADMIN || strpos($text, "/banall") !== false && in_array($from_id, $sudoss)){
$bid = str_replace("/banall", "", $text);
if (strpos($banall , "$bid") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل از ربات و تمام گروه های ربات محروم بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $myfile2 = fopen("banall.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$bid\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $bid با موفقیت از ربات و تمام گروه های ربات محروم شد!", 'parse_mode'=>'HTML'
  ]);
  bot('sendMessage',[
 'chat_id'=>$bid,
 'text'=>"شما از ربات و تمامی گروه های ربات بن شدید!", 'parse_mode'=>'HTML'
  ]);
}
}
elseif(strpos($text, "/unbanall") !== false && $from_id == $ADMIN || strpos($text, "/unbanall") !== false && in_array($from_id, $sudoss)){
$bid = str_replace("/unbanall", "", $text);
if (strpos($banall , "$bid") === false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل از ربات و تمام گروه های ربات محروم نبود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $uba = str_replace($bid."\n","",$banall);
save("banall.txt",$uba);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $bid با موفقیت از ربات و تمام گروه های ربات محروم شد!", 'parse_mode'=>'HTML'
  ]);
  bot('sendMessage',[
 'chat_id'=>$bid,
 'text'=>"شما از ربات و تمامی گروه های ربات آن بن شدید!", 'parse_mode'=>'HTML'
  ]);
}
}
elseif(strpos($text, "/tomembers") !== false && $from_id == $ADMIN || strpos($text, "/tomembers") !== false && in_array($from_id, $sudoss)){
			bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"پیام شما با موفقیت به کاربران ربات ارسال شد!",
		'parse_mode'=>'MarkDown'
		]);
	$tt = str_replace("/tomembers","",$text);
$fp = fopen( "users.txt", 'r');
while( !feof( $fp)) {
 $userss = fgets( $fp);
		bot('sendMessage',[
		'chat_id'=>$userss,
		'text'=>"$tt",
		'parse_mode'=>'HTML'
		]);
}
}
elseif($text == "/panel"){
	if($from_id == $ADMIN){
		bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"Hello my Developer
		Welcome to your panel",
		'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Stats Of Sudos",'callback_data'=>'statssudos'], ['text'=>"Stats All", 'callback_data'=>"statsall"]
 ],
 [
 ['text'=>"Buy Statue", 'callback_data'=>"buystatue"], ['text'=>"BanAll List", 'callback_data'=>"balist"]
 ],
 [
 ['text'=>"Cmds Help", 'callback_data'=>"help"]
 ],
 [
 ['text'=>"Close", 'callback_data'=>"pclose"]
 ]
	]
	])
		]);
	}
	elseif(in_array($from_id, $sudoss)){
		bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"Hello my Sudo
		Welcome to your panel",
		'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Stats All", 'callback_data'=>"statsall"]
 ],
 [
 ['text'=>"BanAll List", 'callback_data'=>"balist"]
 ],
 [
 ['text'=>"Cmds Help", 'callback_data'=>"help"]
 ],
 [
 ['text'=>"Close", 'callback_data'=>"pclose"]
 ]
	]
	])
		]);
	}
}
elseif($data == "pback"){
	if($fromid == $ADMIN){
		bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"Hello my Developer
		Welcome to your panel",
	'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Stats Of Sudos",'callback_data'=>'statssudos'], ['text'=>"Stats All", 'callback_data'=>"statsall"]
 ],
 [
 ['text'=>"Buy Statue", 'callback_data'=>"buystatue"], ['text'=>"BanAll List", 'callback_data'=>"balist"]
 ],
 [
 ['text'=>"Cmds Help", 'callback_data'=>"help"]
 ],
 [
 ['text'=>"Close", 'callback_data'=>"pclose"]
 ]
	]
	])
	]);
	}
	elseif(in_array($fromid, $sudoss)){
		bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"Hello my Sudo
		Welcome to your panel",
	'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Stats All", 'callback_data'=>"statsall"]
 ],
 [
['text'=>"BanAll List", 'callback_data'=>"balist"]
 ],
 [
 ['text'=>"Cmds Help", 'callback_data'=>"help"]
 ],
 [
 ['text'=>"Close", 'callback_data'=>"pclose"]
 ]
	]
	])
	]);
	}
}
elseif($data == "pclose"){
	if($fromid == $ADMIN || in_array($fromid, $sudoss)){
		deleteMessage($chatid, $messageid);
		deleteMessage($chatid, $messageid-1);
	}
}
elseif($data == "help"){
	if($fromid == $ADMIN){
		bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"*Bot Dev Help:*
		(/)addsudo (reply|ID)
		افزودن سودو به ربات
		(/)delsudo (reply|ID)
		حذف یک فرد از لیست سودو ربات
		(/)stats sudos
		آمار سودو ها
		(/)stats all
		آمار کاربران و گروه های ربات
		(/)tomembers (TEXT)
		ارسال به همه کاربران ربات
		(/)togroups (TEXT)
		ارسال به همه گروه های ربات
		(/)add
		افزودن یک گروه به لیست مدیریت ربات
		(/)rem
		حذف یک گروه از لیست مدیریت ربات
		(/)leave
		لفت دادن ربات از گروه
		(/)buyon
		فعال سازی امکان خرید گروه
		(/)buyoff
		غیر فعال سازی امکان خرید گروه
		(/)banall (ID)
		محروم کردن فردی از ربات و تمام گروه های آن
		(/)unbanall (ID)
		از محرومیت در آوردن کسی
		(/)balist
		لیست افراد محروم",
	'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Back",'callback_data'=>'pback']
 ]
	]
	])
	]);
	}
	elseif(in_array($fromid, $sudoss)){
		bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"*Bot Sudo Help:*
		(/)stats all
		آمار کاربران و گروه های ربات
		(/)tomembers (TEXT)
		ارسال به همه کاربران ربات
		(/)togroups (TEXT)
		ارسال به همه گروه های ربات
		(/)add
		افزودن یک گروه به لیست مدیریت ربات
		(/)rem
		حذف یک گروه از لیست مدیریت ربات
		(/)leave
		لفت دادن ربات از گروه
		(/)banall (ID)
		محروم کردن فردی از ربات و تمام گروه های آن
		(/)unbanall (ID)
		از محرومیت در آوردن کسی
		(/)balist
		لیست افراد محروم",
	'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Back",'callback_data'=>'pback']
 ]
	]
	])
	]);
	}
}
elseif($data == "balist"){
	if($fromid == $ADMIN || in_array($fromid, $sudoss)){
		bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"*Ban All List :*
	$banall",
	'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Back",'callback_data'=>'pback']
 ]
	]
	])
	]);
	}
}
elseif($data == "buystatue"){
	if($fromid == $ADMIN){
		$bstatue = file_get_contents("buy.txt");
		bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"*Buy Statue*",
	'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[
	['text'=>"$bstatue", 'callback_data'=>"bon/off"]
	],
 [
 ['text'=>"Back",'callback_data'=>'pback']
 ]
	]
	])
	]);
	}
}
elseif($data == "bon/off"){
	$bstatue = file_get_contents("buy.txt");
	if($fromid == $ADMIN){
		if($bstatue == "on"){
			save("buy.txt", "off");
			$bstatue = file_get_contents("buy.txt");
		bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"*Buy Statue*",
	'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[
	['text'=>"$bstatue", 'callback_data'=>"bon/off"]
	],
 [
 ['text'=>"Back",'callback_data'=>'pback']
 ]
	]
	])
	]);
		}
		else{
			save("buy.txt", "on");
			$bstatue = file_get_contents("buy.txt");
		bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"*Buy Statue*",
	'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[
	['text'=>"$bstatue", 'callback_data'=>"bon/off"]
	],
 [
 ['text'=>"Back",'callback_data'=>'pback']
 ]
	]
	])
	]);
		}
	}
}
elseif($data == "statssudos"){
	if($fromid == $ADMIN){
	$tsudos = count($sudoss)-1;
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"Count Of Sudos: $tsudos
	*Sudos ID:*
	$sudos",
	'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Back",'callback_data'=>'pback']
 ]
	]
	])
	]);
	}
}
elseif($data == "statsall"){
	if($fromid == $ADMIN || in_array($fromid, $sudoss)){
	$tusers = count($users2)-1;
$tgroups = count($groups2)-1;
		bot('editMessageText',[
		'chat_id'=>$chatid,
		'message_id'=>$messageid,
		'text'=>"<b>Stats Of The Bot</b>",
		'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Groups/SuperGroups",'callback_data'=>'text'], ['text'=>"$tgroups", 'callback_data'=>"text"]
 ],
 [
 ['text'=>"Members", 'callback_data'=>"text"], ['text'=>"$tusers", 'callback_data'=>"text"]
 ],
 [
 ['text'=>"Back",'callback_data'=>'pback']
 ]
	]
	])
		]);
	}
}
if($text == "!help sudos" || $text == "/help sudos"){
	if ($from_id == $ADMIN){
			bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"*Bot Dev Help:*
		(/)addsudo (reply|ID)
		افزودن سودو به ربات
		(/)delsudo (reply|ID)
		حذف یک فرد از لیست سودو ربات
		(/)stats sudos
		آمار سودو ها
		(/)stats all
		آمار کاربران و گروه های ربات
		(/)tomembers (TEXT)
		ارسال به همه کاربران ربات
		(/)togroups (TEXT)
		ارسال به همه گروه های ربات
		(/)add
		افزودن یک گروه به لیست مدیریت ربات
		(/)rem
		حذف یک گروه از لیست مدیریت ربات
		(/)leave
		لفت دادن ربات از گروه
		(/)buyon
		فعال سازی امکان خرید گروه
		(/)buyoff
		غیر فعال سازی امکان خرید گروه
		(/)banall (ID)
		محروم کردن فردی از ربات و تمام گروه های آن
		(/)unbanall (ID)
		از محرومیت در آوردن کسی
		(/)balist
		لیست افراد محروم",
		'parse_mode'=>'MarkDown'
		]);
	}
	elseif(in_array($from_id, $sudoss)){
					bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"*Bot Sudo Help:*
		(/)stats all
		آمار کاربران و گروه های ربات
		(/)tomembers (TEXT)
		ارسال به همه کاربران ربات
		(/)togroups (TEXT)
		ارسال به همه گروه های ربات
		(/)add
		افزودن یک گروه به لیست مدیریت ربات
		(/)rem
		حذف یک گروه از لیست مدیریت ربات
		(/)leave
		لفت دادن ربات از گروه
		(/)banall (ID)
		محروم کردن فردی از ربات و تمام گروه های آن
		(/)unbanall (ID)
		از محرومیت در آوردن کسی
		(/)balist
		لیست افراد محروم",
		'parse_mode'=>'MarkDown'
		]);
	}
}
elseif(strpos($text, "/togroups") !== false && $from_id == $ADMIN || strpos($text, "/togroups") !== false && in_array($from_id, $sudoss)){
			bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"پیام شما با موفقیت به گروه های ربات ارسال شد!",
		'parse_mode'=>'MarkDown'
		]);
	$t = str_replace("/togroups","",$text);
$fp = fopen( "groups.txt", 'r');
while( !feof( $fp)) {
 $groupss = fgets( $fp);
		bot('sendMessage',[
		'chat_id'=>$groupss,
		'text'=>"$t",
		'parse_mode'=>'HTML'
		]);
}
}
elseif($text == "/buyon" && $from_id == $ADMIN){
	save("buy.txt", "on");
		bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"خرید گروه با موفقیت فعال شد",
		'parse_mode'=>'MarkDown'
		]);
}
elseif($text == "/buyoff" && $from_id == $ADMIN){
	save("buy.txt", "off");
		bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"خرید گروه با موفقیت غیر فعال شد",
		'parse_mode'=>'MarkDown'
		]);
}
elseif($text == "/addsudo" && $reply && $from_id == $ADMIN){
	if (strpos($sudos , "$reply_id") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در لیست سودو ها بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
	  $myfile2 = fopen("sudos.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$reply_id\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"$reply_id به لیست سودو ها پیوست!", 'parse_mode'=>'MarkDown'
  ]);
}
}
if(strpos($text, "/addsudo") !== false && $from_id == $ADMIN && !$reply){
$sid = str_replace("/addsudo ", "", $text);
if (strpos($sudos , "$pid") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در لیست سودو ها بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $myfile2 = fopen("sudos.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$sid\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $sid با موفقیت سودو شد!", 'parse_mode'=>'HTML'
  ]);
}
}
if($text == "/delsudo" && $from_id == $ADMIN && $reply){
if (strpos($sudos, "$reply_id") !== false) {
  $su = str_replace($reply_id."\n","",$sudos);
save("sudos.txt",$su);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $reply_id با یوزرنیم @$reply_uname با موفقیت از لیست سودو حذف شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در لیست ادمین ها نبود!", 'parse_mode'=>'MarkDown'
  ]);
}
}
if(strpos($text, "/delsudo") !== false && $from_id == $ADMIN && !$reply){
$sid = str_replace("/delsudo ", "", $text);
if (strpos($sudos , "$sid") !== false) {
  $su = str_replace($sid."\n","",$sudos);
save("sudos.txt",$su);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $sid با موفقیت از لیست سودو حذف شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در سودو نبود!", 'parse_mode'=>'MarkDown'
  ]);
}
}
elseif($text == "/help" || $text == "!help"){
		bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"I دستورات ربات
<b>^</b> => قابل استفاده فقط برای اونر
<b>&</b> => قابل استفاده فقط برای اونر و ناظران

دستوراتی که کنارشان علامتی وجود ندارد برای همه کاربران قابل استفاده هستند

➖➖➖➖➖➖
💠[/]kick (reply|ID) <b>&</b>
I اخراج کردن یک کاربر
💠[/]ban (reply|ID) <b>&</b>
I اخراج کردن دائمی یک کاربر
💠[/]unban (reply|ID) <b>&</b>
I در اورد از اخراج دائمی یک کاربر
➖➖➖➖➖➖
🌐[!/]settings <b>&</b>
I تنظیمات گروه
🔑[/]addfilter (word) <b>&</b>
I اضافه کردن یک کلمه به لیست فیلترها
🔑[/]remfilter (word) <b>&</b>
I حذف کردن یک کلمه از لیست فیلترها
🔑[!/]cleanfilters <b>&</b>
I حذف کردن کل کلمات فیلتر لیست
🔑[!/]filterlist <b>&</b>
Iلیست کلمات فیلتر شده
➖➖➖➖➖➖
⛔️[/]warn (reply) <b>&</b>
I اخطار دادن به کاربر
⛔️[/]unwarn (reply) <b>&</b>
I حذف یک اخطار از کل اخطار های کاربر
⛔️[/]del warns (reply) <b>&</b>
I حذف کل اخطار های کاربر
➖➖➖➖➖➖
برای تعیین متن خوش آمد گویی یا متن خداحافظی میتوانید از کلمات زیر استفاده کنید:
<b>FIRSTNAME = > نام عضو
USERNAME = > نام کاربری عضو
USERID = > ایدی عددی عضو
GROUPNAME</b> = > نام گروه

📜[/]setwlc (Text) <b>^</b>
I تعیین پیغام خوش آمد گویی
📜[/!]delwlc <b>^</b>
I حذف پیغام خوش آمد گویی
📜[/]setbye (Text) <b>^</b>
I تعیین پیغام خداحافظی
📜[/!]delbye <b>^</b>
I حذف پیغام خداحافظی گویی
📜[/]setlink (Group Link) <b>^</b>
I تعیین کردن لینک گروه
📜[!/]link
I نشان دادن لینک
📜[/]setrules (TEXT) <b>^</b>
I تعیین کردن قوانین
📜[!/]rules
I نشان دادن قوانین
➖➖➖➖➖➖
🔶[/]promote (reply|ID) <b>^</b>
I ادمین (ناظر) گروه کردن کسی
🔶[/]demote (reply|ID) <b>^</b>
I در اوردن از ادمین (ناظر) بودن کسی
🔶[!/]modlist
I لیست ادمین (ناظر) ها
🔶[!/]owner
I نشان دادن صاحب گروه
🔶[/]addwhitelist (reply|ID)
I افزودن یک فرد به لیست سفید
🔶[/]delwhitelist (reply|ID)
I حذف یک فرد از لیست سفید
🔶[!/]whitelist
I نمایش لیست سفید
➖➖➖➖➖➖
توجه! : <code>برای کار کردن این دستورات باید دسترسی لازم را به ربات بدهید</code>
🔶[/]setdes (text) <b>&</b>
I تنظیم توضیحات گروه
🔶[/]settitle (text) <b>&</b>
I تنظیم نام گروه
🔶[/]delphoto
I حذف عکس فعلی گروه
🔶[/]setphoto (reply)
I تنظیم عکس گروه
🔶[/]create link
I ساخت لینک جدید برای گروه
🔶[/]pin (reply)
I پین کردن پیام رپلی شده
🔶[/]unpin
I آن پین کردن پیام پین شده
➖➖➖➖➖➖
🔇[/]mute (reply|ID) <b>&</b>
I ساکت کردن کسی
🔇[/]unmute (reply|ID) <b>&</b>
I در اودن از ساکت بودن
🔇[!/]mutelist
I لیست افراد ساکت
🔇[!/]del (reply) <b>&</b>
I پاک کردن پیام با ریپلی
🔇[/]delete (Number) <b>&</b>
I پاک کردن پیام های اخیر به تعداد مشخص شده
➖➖➖➖➖➖
ℹ️[!/]info (reply) <b>&</b>
I مشخصات شخص
ℹ️[!/]id
I مشخصات خود
ℹ️[!/]me
I نمایش مشخصات خود به همراه عکس فعلی
ℹ️[/]getpic (NUMBER)
I نمایش عکس مشخص شده
🔰[!/]kickme
I اخراج کردن خود
🔰[!/]ping
I اطلاع پیدا کردن از وضعیت ربات و سرور
➖➖➖➖➖➖
🛑[!/]tools
I نمایش امکانات جانبی ربات",
		'parse_mode'=>'HTML'
		]);
}
//====================data text==========================//
if($data == "text"){
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"دستوری تعریف نشده است!"
	  ]);
}
//====================tools options======================//
if($text == "/tools" || $text == "!tools"){
	if($chatType != "private"){
		bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"ابزارهای کاربردی ربات به پیوی شما ارسال شد",
		'parse_mode'=>'HTML']);
		bot('sendMessage',[
		'chat_id'=>$from_id,
		'text'=>"یکی از دکمه های زیر را انتخاب کنید",
		'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"MarkDown〰",'callback_data'=>'MarkDownn'], ['text'=>"Time/Date🕐", 'callback_data'=>"t/d"]
 ],
 [
 ['text'=>"Calculator📟", 'callback_data'=>"calc"], ['text'=>"WhoIs?", 'callback_data'=>"whois"]
 ]
	]
	])
		]);
	}
		else{
		bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"یکی از دکمه های زیر را انتخاب کنید",
		'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"MarkDown〰",'callback_data'=>'MarkDownn'], ['text'=>"Time/Date🕐", 'callback_data'=>"t/d"]
 ],
 [
 ['text'=>"Calculator📟", 'callback_data'=>"calc"], ['text'=>"WhoIs?", 'callback_data'=>"whois"]
 ]
	]
	])
		]);
		}
}
elseif($data == "MarkDownn"){
	bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"برای استفاده از قابلیت مارک داون دستورالعمل های زیر را بخوانید.
 <b>Bold</b> => /echo *TEXT*
 <b>Italic</b> => /echo _TEXT_
 <b>Code</b> => /echo TEXT
 <b>HyperLink</b> => /echo [TEXT](LINK)",
  'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"برگشت",'callback_data'=>'backt']
 ]
	]
	])
  ]);
}
elseif($data == "t/d"){
	$time = file_get_contents("https://provps.ir/td/?td=time");
	$date = file_get_contents("https://provps.ir/td/?td=date");
		bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"زمان: $time
 تاریخ: $date",
  'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"برگشت",'callback_data'=>'backt']
 ]
	]
	])
  ]);
}
elseif($data == "whois"){
	bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"با این امکان می توانید با دادن ایدی عددی فرد یوزرنیم او + نام او را تحویل بگیرید!!
 کافیست به صورت زیر عمل کنید:
 /whois ID
 برای مثال:
 /whois 188740934",
  'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"برگشت",'callback_data'=>'backt']
 ]
	]
	])
  ]);
}
elseif($data == "calc"){
	bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"برای استفاده از قابلیت ماشین حساب عبارت خود را به صورت زیر بفرستید:
 /calc NUM1 AMALGAR NUM2
 برای مثال برای یافتن توان دوم عدد 5 اینطور مینویسیم:
 /calc 5^2
 یا برای یافتن حاصل جمع 5 و 13 به صورت زیر مینویسیم:
 /cal 5+13
 و بقیه عبارت ها هم به همین صورت",
  'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"برگشت",'callback_data'=>'backt']
 ]
	]
	])
  ]);
}
elseif(preg_match('/^\/(calc)(.*)/s', $text)){
	preg_match('/^\/(calc)(.*)/s', $text, $mtch);
	$calc = urlencode($mtch[2]);
	$rs = file_get_contents('http://api.mathjs.org/v1/?expr='.$calc);
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"جواب: $rs",
	'parse_mode'=>"MarkDown"
	]);
}
elseif(strpos($text, "/echo") !== false){
	$echo = str_replace("/echo", "", $text);
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$echo,
	'parse_mode'=>"MarkDown"
	]);
}
elseif($data == "backt"){
		bot('editMessageText',[
		 'chat_id'=>$chatid,
		'message_id'=>$messageid,
		'text'=>"یکی از دکمه های زیر را انتخاب کنید",
		'parse_mode'=>'HTML',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"MarkDown〰",'callback_data'=>'MarkDownn'], ['text'=>"Time/Date🕐", 'callback_data'=>"t/d"]
 ],
 [
 ['text'=>"Calculator📟", 'callback_data'=>"calc"], ['text'=>"WhoIs?", 'callback_data'=>"whois"]
 ]
	]
	])
		]);
}
//====================welcome texts======================//
$welcome = file_get_contents("data/$chat_id/welcome.txt");
if($welcome != ""){
if ($new_chat_member_id != '' && $lock_join == "❌" && $lock_bots == "❌") {
  if ($me_username != $new_chat_member_username) {
      $w = str_replace("FIRSTNAME", $new_chat_member_first_name, $welcome);
      $w2 = str_replace("USERNAME", $new_chat_member_username, $w);
      $w3 = str_replace("USERID", $new_chat_member_id, $w2);
      $welcome_massage = str_replace("GROUPNAME", $groupname, $w3);
    bot('sendMessage',['chat_id'=>$chat_id,'text'=>$welcome_massage,'parse_mode'=>'HTML']);
  } else {
      $welcome_massage = 'ممنون که مرا به گروه خود ادد کردید!';
       bot('sendMessage',['chat_id'=>$chat_id,'text'=>$welcome_massage,'parse_mode'=>'HTML']);
}
}
}
elseif($new_chat_member_id != '' && $lock_join == "✅" && $me_username != $new_chat_member_username){
bot('kickChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$new_chat_member_id
  ]);
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"ادد شدن کاربر جدید به گروه ممنوع است!!", 'parse_mode'=>'HTML'
  ]);
}
elseif(isset($new_chat_member)){
    if (preg_match('/[Bb]ot$/',$new_chat_member_username)){
        if($lock_bots == "✅"){
			bot('kickChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$new_chat_member_id
  ]);
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"افزودن ربات به گروه ممنوع است!", 'parse_mode'=>'HTML'
  ]);
        }
    }
}
$leave = file_get_contents("data/$chat_id/leave.txt");
if($leave != ""){
if ($left_chat_member_id != '' && $me_username != $left_chat_member_username) {
          $w = str_replace("FIRSTNAME", $left_chat_member_first_name, $leave);
      $w2 = str_replace("USERNAME", $left_chat_member_username, $w);
      $w3 = str_replace("USERID", $left_chat_member_id, $w2);
      $leave_message = str_replace("GROUPNAME", $groupname, $w3);
bot('sendMessage',['chat_id'=>$chat_id,'text'=>$leave_message,'parse_mode'=>'HTML']);
}
}
elseif($left_chat_member_id != '' && $me_username == $left_chat_member_username){
	remove("data/$chat_id/floods.txt");
remove("data/$chat_id/whitelist.txt");
remove("data/$chat_id/link.txt");
remove("data/$chat_id/rules.txt");
remove("data/$chat_id/owner.txt");
remove("data/$chat_id/modlist.txt");
remove("data/$chat_id/mute.txt");
remove("data/$chat_id/warns.txt");
remove("data/$chat_id/filters.txt");
remove("data/$chat_id/welcome.txt");
remove("data/$chat_id/leave.txt");
$g = str_replace($chat_id."\n","",$groups);
save("groups.txt",$g);
remove("data/$chat_id/link.txt");
remove("data/$chat_id/locks/flood.txt");
remove("data/$chat_id/locks/links.txt");
remove("data/$chat_id/locks/tag.txt");
remove("data/$chat_id/locks/username.txt");
remove("data/$chat_id/locks/number.txt");
remove("data/$chat_id/locks/chat.txt");
remove("data/$chat_id/locks/forward.txt");
remove("data/$chat_id/locks/reply.txt");
remove("data/$chat_id/locks/edit.txt");
remove("data/$chat_id/locks/english.txt");
remove("data/$chat_id/locks/arabic.txt");
remove("data/$chat_id/locks/join.txt");
remove("data/$chat_id/locks/bots.txt");
remove("data/$chat_id/locks/cmd.txt");
remove("data/$chat_id/locks/emoji.txt");
remove("data/$chat_id/locks/character.txt");
remove("data/$chat_id/locks/characters.txt");
remove("data/$chat_id/locks/videomsg.txt");
remove("data/$chat_id/locks/media/stickers.txt");
remove("data/$chat_id/locks/media/photo.txt");
remove("data/$chat_id/locks/media/video.txt");
remove("data/$chat_id/locks/media/music.txt");
remove("data/$chat_id/locks/media/gif.txt");
remove("data/$chat_id/locks/media/document.txt");
remove("data/$chat_id/locks/media/location.txt");
remove("data/$chat_id/locks/media/contact.txt");
remove("data/$chat_id/locks/media/game.txt");
rmdir("data/$chat_id");
rmdir("data/$chat_id/warns");
rmdir("data/$chat_id/locks/media");
rmdir("data/$chat_id/locks");
}
//================================settings==============================//
if($text == "/settings" || $text == "!settings"){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/modlist.txt")){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"SuperGroup/Group Settings",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Settings🏷",'callback_data'=>'settings']
 ],
 [
 ['text'=>"Other Locks🔒",'callback_data'=>'otherlocks']
 ],
  [
 ['text'=>"Flood & Warns⚜️",'callback_data'=>'f/w']
 ],
 [
 ['text'=>"MuteList🔇", 'callback_data'=>'mutelist']
 ],
  [
 ['text'=>"WhiteList🔖", 'callback_data'=>'whitelist']
 ],
 [
  ['text'=>"FilterList🚫", 'callback_data'=>'filterlist']
 ],
 [
   ['text'=>"Group Info🔰", 'callback_data'=>'gpinfo']
 ],
 [
 ['text'=>"Close❌", 'callback_data'=>"close"]
 ]
	]
	])
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}}
}}
elseif($data == "otherlocks"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
}
	}
elseif($data == "lchar"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
			$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		if($lock_char == "❌"){
		save("data/$chatid/locks/character.txt", "✅");
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"#انجام_شد
	  حساسیت کاراکتر با موفقیت فعال شد"
	  ]);
		}
		else{
			save("data/$chatid/locks/character.txt", "❌");
			$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
			$lock_char = file_get_contents("data/$chatid/locks/character.txt");
			$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"#انجام_شد
	  حساسیت کاراکتر با موفقیت غیرفعال شد"
	  ]);
		}
	}
}
elseif($data == "lvideomsg"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
			$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		if($lock_videomessage == "❌"){
		save("data/$chatid/locks/videomsg.txt", "✅");
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"#انجام_شد
	 ارسال Video Message قفل شد"
	  ]);
		}
		else{
			save("data/$chatid/locks/videomsg.txt", "❌");
			$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
			$lock_char = file_get_contents("data/$chatid/locks/character.txt");
			$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"#انجام_شد
	  ارسال Video Message آزاد شد"
	  ]);
		}
	}
}
elseif($data == "lcmd"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
			$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		if($lock_cmd == "❌"){
		save("data/$chatid/locks/cmd.txt", "✅");
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"#انجام_شد
	  ارسال دستور با موفقیت قفل شد"
	  ]);
		}
		else{
			save("data/$chatid/locks/cmd.txt", "❌");
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"#انجام_شد
	  ارسال دستور با موفقیت آزاد شد"
	  ]);
		}
	}
}
elseif($data == "lemoji"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		/*bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"این بخش موقتا غیرفعال است"
	  ]);
		*/
			$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/lock/character.txt");
		if($lock_emoji == "❌"){
		save("data/$chatid/locks/emoji.txt", "✅");
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"#انجام_شد
	  ارسال اموجی با موفقیت قفل شد"
	  ]);
		}
		else{
			save("data/$chatid/locks/emoji.txt", "❌");
			$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"#انجام_شد
	  ارسال اموجی با موفقیت آزاد شد"
	  ]);
		}
	}
}
elseif($data == "cu100"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		if($lock_char == "✅"){
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		save("data/$chatid/locks/characters.txt", $character+100);
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
		}
		else{
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"حساسیت کاراکتر فعال نیست"
	  ]);
		}
	}
}
elseif($data == "cd100"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		if($lock_char == "✅"){
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		if($character >= 100){
		save("data/$chatid/locks/characters.txt", $character-100);
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
		}
		else{
			bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"مقدار حساسیت فعلی کمتر از 100 است!"
	  ]);
		}
		}
		else{
			bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"حساسیت کاراکتر فعال نیست"
	  ]);
		}
	}
}
elseif($data == "cu500"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		if($lock_char == "✅"){
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		save("data/$chatid/locks/characters.txt", $character+500);
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
		}
else{
	bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"حساسیت کاراکتر فعال نیست"
	  ]);
}
	}
}
elseif($data == "cd500"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		if($lock_char == "✅"){
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		if($character >= 500){
		save("data/$chatid/locks/characters.txt", $character-500);
		$character = file_get_contents("data/$chatid/locks/characters.txt");
		$lock_cmd = file_get_contents("data/$chatid/locks/cmd.txt");
		$lock_emoji = file_get_contents("data/$chatid/locks/emoji.txt");
		$lock_char = file_get_contents("data/$chatid/locks/character.txt");
		$lock_videomessage = file_get_contents("data/$chatid/locks/videomsg.txt");
		bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*SuperGroup/Group Other Locks*",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"Cmd Lock🔸",'callback_data'=>'text'],['text'=>"$lock_cmd",'callback_data'=>'lcmd']
				],
				[
				['text'=>"Emoji Lock🔸",'callback_data'=>'text'],['text'=>"$lock_emoji",'callback_data'=>'lemoji']
				],
				[
				['text'=>"Video Message Lock🔸",'callback_data'=>'text'],['text'=>"$lock_videomessage",'callback_data'=>'lvideomsg']
				],
				[
				['text'=>"Characters🔤",'callback_data'=>'text'],['text'=>"$lock_char",'callback_data'=>'lchar']
				],
				[
				['text'=>"⬆️100", 'callback_data'=>'cu100'],['text'=>"⬇️100", 'callback_data'=>'cd100']
				],
				[
				['text'=>"$character", 'callback_data'=>'text']
				],
				[
				['text'=>"⬆️500", 'callback_data'=>'cu500'],['text'=>"⬇️500", 'callback_data'=>'cd500']
				],
			    [
			    ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
		   	    ],
				]
				])
		]);
		}
		else{
			bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"مقدار حساسیت فعلی کمتر از 500 است!"
	  ]);
		}
		}
		else{
			bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"حساسیت کاراکتر فعال نیست"
	  ]);
		}
	}
}
elseif($data == "gpinfo"){
		$gpname = $update->callback_query->message->chat->title;
		$gpmembers = getChatMembersCount($chatid);
	    bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"SuperGroup/Group And Bot Info
			 Owner: $ownerid

			 ModList:
			 $modlistid",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[
				['text'=>"⚜️Group Info",'callback_data'=>'text']
				],
				[
				['text'=>"⚜️Group ID",'callback_data'=>'text'],['text'=>"$chatid",'callback_data'=>'text']
				],
				[
				['text'=>"⚜️Group Name",'callback_data'=>'text'],['text'=>"$gpname",'callback_data'=>'text']
				],
				[
				['text'=>"⚜️Group Type",'callback_data'=>'text'],['text'=>"$cchatType",'callback_data'=>'text']
				],
				[
				['text'=>"⚜️Member Count",'callback_data'=>'text'],['text'=>"$gpmembers",'callback_data'=>'text']
				],
				[
				['text'=>"⚜️Message Count",'callback_data'=>'text'],['text'=>"$messageid",'callback_data'=>'text']
				],
				[
				['text'=>"❇️Bot Info",'callback_data'=>'text']
				],
				[
				['text'=>"❇️Creator",'callback_data'=>'text'],['text'=>"@PHPFather",'url'=>'https://telegram.me/PHPFather']
				],
				[
				['text'=>"❇️Version",'callback_data'=>'text'],['text'=>"2.2",'callback_data'=>'text']
				],
			  [
			 ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
			 ],
				]
				])
		]);
}
elseif($data == "mutelist"){
		$mutelist = file_get_contents("data/$chatid/mute.txt");
	    bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*MuteList:*
			 $mutelist",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
			  [
			 ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
			 ],
				]
				])
		]);
}
elseif($data == "filterlist"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$filterlist = file_get_contents("data/$chatid/filters.txt");
	    bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*FilterList:*
			 $filterlist",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
			  [
			 ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
			 ],
				]
				])
		]);
	}
}
elseif($data == "whitelist"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$whitelist = file_get_contents("data/$chatid/whitelist.txt");
	    bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"*WhiteList:*
			 $whitelist",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
			  [
			 ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
			 ],
				]
				])
		]);
	}
}
elseif($data == "close"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
deletemessage($chatid, $messageid);
deletemessage($chatid, $messageid-1);
	}
}
elseif($data == "f/w"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$floods = file_get_contents("data/$chatid/floods.txt");
		$warns = file_get_contents("data/$chatid/warns.txt");
	    bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"Flood & Warns Settings",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
			 [
			 ['text'=>"Flood Sensitivity🛑",'callback_data'=>'text']
			 ],
			  [
			 ['text'=>"⬇️",'callback_data'=>'fd'],['text'=>"$floods",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'fu']
			 ],
			 [
			 ['text'=>"Warns",'callback_data'=>'text']
			 ],
			 [
			 ['text'=>"⬇️",'callback_data'=>'wd'],['text'=>"$warns",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'wu']
			 ],
			  [
			 ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
			 ],
				]
				])
		]);
	}
}
elseif($data == "fd"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$floods = file_get_contents("data/$chatid/floods.txt");
		save("data/$chatid/floods.txt", $floods-1);
		$floods = file_get_contents("data/$chatid/floods.txt");
		$warns = file_get_contents("data/$chatid/warns.txt");
	    bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"Flood & Warns Settings",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
			 [
			 ['text'=>"Flood Sensitivity🛑",'callback_data'=>'text']
			 ],
			  [
			 ['text'=>"⬇️",'callback_data'=>'fd'],['text'=>"$floods",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'fu']
			 ],
			 [
			 ['text'=>"Warns",'callback_data'=>'text']
			 ],
			 [
			 ['text'=>"⬇️",'callback_data'=>'wd'],['text'=>"$warns",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'wu']
			 ],
			  [
			 ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
			 ],
				]
				])
		]);
	}
}
elseif($data == "fu"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$floods = file_get_contents("data/$chatid/floods.txt");
		save("data/$chatid/floods.txt", $floods+1);
		$floods = file_get_contents("data/$chatid/floods.txt");
		$warns = file_get_contents("data/$chatid/warns.txt");
	    bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"Flood & Warns Settings",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
			 [
			 ['text'=>"Flood Sensitivity🛑",'callback_data'=>'text']
			 ],
			  [
			 ['text'=>"⬇️",'callback_data'=>'fd'],['text'=>"$floods",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'fu']
			 ],
			 [
			 ['text'=>"Warns",'callback_data'=>'text']
			 ],
			 [
			 ['text'=>"⬇️",'callback_data'=>'wd'],['text'=>"$warns",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'wu']
			 ],
			  [
			 ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
			 ],
				]
				])
		]);
	}
}
elseif($data == "wd"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$floods = file_get_contents("data/$chatid/floods.txt");
		$warns = file_get_contents("data/$chatid/warns.txt");
		save("data/$chatid/warns.txt", $warns-1);
		$warns = file_get_contents("data/$chatid/warns.txt");
	    bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"Flood & Warns Settings",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
			 [
			 ['text'=>"Flood Sensitivity🛑",'callback_data'=>'text']
			 ],
			  [
			 ['text'=>"⬇️",'callback_data'=>'fd'],['text'=>"$floods",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'fu']
			 ],
			 [
			 ['text'=>"Warns",'callback_data'=>'text']
			 ],
			 [
			 ['text'=>"⬇️",'callback_data'=>'wd'],['text'=>"$warns",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'wu']
			 ],
			  [
			 ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
			 ],
				]
				])
		]);
	}
}
elseif($data == "wu"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
		$floods = file_get_contents("data/$chatid/floods.txt");
		$warns = file_get_contents("data/$chatid/warns.txt");
		save("data/$chatid/warns.txt", $warns+1);
		$warns = file_get_contents("data/$chatid/warns.txt");
	    bot('editMessageText',[
			 'chat_id'=>$chatid,
			 'message_id'=>$messageid,
			 'text'=>"Flood & Warns Settings",
			  'parse_mode'=>'MarkDown',
				'reply_markup'=>json_encode([
				'inline_keyboard'=>[
			 [
			 ['text'=>"Flood Sensitivity🛑",'callback_data'=>'text']
			 ],
			  [
			 ['text'=>"⬇️",'callback_data'=>'fd'],['text'=>"$floods",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'fu']
			 ],
			 [
			 ['text'=>"Warns",'callback_data'=>'text']
			 ],
			 [
			 ['text'=>"⬇️",'callback_data'=>'wd'],['text'=>"$warns",'callback_data'=>'text'],['text'=>"⬆️",'callback_data'=>'wu']
			 ],
			  [
			 ['text'=>"🔙Back To Menu",'callback_data'=>'backm']
			 ],
				]
				])
		]);
	}
}
elseif($data == "settings"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
  }
  else{
	  bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"فقط ادمین مجاز است!"
	  ]);
  }
}

elseif($data == "backm"){
	if($fromid == $ownerid || in_array($fromid, $mlid2)){
bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"Settings🏷",'callback_data'=>'settings']
 ],
 [
 ['text'=>"Other Locks🔒",'callback_data'=>'otherlocks']
 ],
  [
 ['text'=>"Flood & Warns⚜️",'callback_data'=>'f/w']
 ],
 [
 ['text'=>"MuteList🔇", 'callback_data'=>'mutelist']
 ],
  [
 ['text'=>"WhiteList🔖", 'callback_data'=>'whitelist']
 ],
 [
  ['text'=>"FilterList🚫", 'callback_data'=>'filterlist']
 ],
 [
   ['text'=>"Group Info🔰", 'callback_data'=>'gpinfo']
 ],
 [
 ['text'=>"Close❌", 'callback_data'=>"close"]
 ]
	]
	])
  ]);
	}
  else{
	  bot('answerCallbackQuery',[
	  'callback_query_id'=>$update->callback_query->id,
	  'text'=>"فقط ادمین مجاز است!"
	  ]);
  }
}
//====================managing commands======================//
if ($text == "/add" && $from_id == $ADMIN || $text == "/add" && in_array($from_id, $sudoss)){
if($chatType == "supergroup" || $chatType == "group"){
if (!file_exists("data/$chat_id/link.txt")){
mkdir("data/$chat_id");
mkdir("data/$chat_id/warns");
save("data/$chat_id/welcome.txt", "سلام FIRSTNAME عزیز به گروه GROUPNAME خوش آمدید.

ایدی عددی شما: USERID
نام کاربری شما: @USERNAME");
save("data/$chat_id/leave.txt", "دوستان متاسفانه FIRSTNAME عزیز از گروه GROUPNAME رفت!

ایدی عددی ایشان: USERID
نام کاربری ایشان: @USERNAME");
save("data/$chat_id/floods.txt", "3");
save("data/$chat_id/whitelist.txt", "");
save("data/$chat_id/link.txt","Group Link not set!");
save("data/$chat_id/rules.txt","Group Rules not set!");
save("data/$chat_id/owner.txt", $creator['id']);
save("data/$chat_id/modlist.txt", "");
save("data/$chat_id/mute.txt", "");
save("data/$chat_id/warns.txt", "3");
save("data/$chat_id/filters.txt", "");
$myfile2 = fopen("groups.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$chat_id\n");
fclose($myfile2);
mkdir("data/$chat_id/locks");
save("data/$chat_id/locks/flood.txt", "✅");
save("data/$chat_id/locks/links.txt", "✅");
save("data/$chat_id/locks/tag.txt", "❌");
save("data/$chat_id/locks/username.txt", "❌");
save("data/$chat_id/locks/number.txt", "❌");
save("data/$chat_id/locks/chat.txt", "❌");
save("data/$chat_id/locks/forward.txt", "❌");
save("data/$chat_id/locks/reply.txt", "❌");
save("data/$chat_id/locks/edit.txt", "❌");
save("data/$chat_id/locks/english.txt", "❌");
save("data/$chat_id/locks/arabic.txt", "❌");
save("data/$chat_id/locks/join.txt", "❌");
save("data/$chat_id/locks/bots.txt", "❌");
save("data/$chat_id/locks/cmd.txt", "❌");
save("data/$chat_id/locks/emoji.txt", "❌");
save("data/$chat_id/locks/character.txt", "❌");
save("data/$chat_id/locks/videomsg.txt", "❌");
save("data/$chat_id/locks/characters.txt", "300");
mkdir("data/$chat_id/locks/media");
save("data/$chat_id/locks/media/stickers.txt", "❌");
save("data/$chat_id/locks/media/photo.txt", "❌");
save("data/$chat_id/locks/media/video.txt", "❌");
save("data/$chat_id/locks/media/music.txt", "❌");
save("data/$chat_id/locks/media/gif.txt", "❌");
save("data/$chat_id/locks/media/document.txt", "❌");
save("data/$chat_id/locks/media/location.txt", "❌");
save("data/$chat_id/locks/media/contact.txt", "❌");
save("data/$chat_id/locks/media/game.txt", "✅");
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"گروه/سوپر گروه با موفقیت ادد شد!",
	'parse_mode'=>'MarkDown'
		]);
}
else{
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"این گروه/سوپرگروه قبلا ادد شده است!",
	'parse_mode'=>'MarkDown'
		]);
}
}
elseif($chatType == "private"){
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"شما نمی توانید یک PV را ادد کنید!",
	'parse_mode'=>'MarkDown'
		]);
}
}
elseif($text == "/rem" && $from_id == $ADMIN || $text == "/rem" && in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/link.txt")){
remove("data/$chat_id/floods.txt");
remove("data/$chat_id/whitelist.txt");
remove("data/$chat_id/link.txt");
remove("data/$chat_id/rules.txt");
remove("data/$chat_id/owner.txt");
remove("data/$chat_id/modlist.txt");
remove("data/$chat_id/mute.txt");
remove("data/$chat_id/warns.txt");
remove("data/$chat_id/filters.txt");
remove("data/$chat_id/welcome.txt");
remove("data/$chat_id/leave.txt");
$g = str_replace($chat_id."\n","",$groups);
save("groups.txt",$g);
remove("data/$chat_id/link.txt");
remove("data/$chat_id/locks/flood.txt");
remove("data/$chat_id/locks/links.txt");
remove("data/$chat_id/locks/tag.txt");
remove("data/$chat_id/locks/username.txt");
remove("data/$chat_id/locks/number.txt");
remove("data/$chat_id/locks/chat.txt");
remove("data/$chat_id/locks/forward.txt");
remove("data/$chat_id/locks/reply.txt");
remove("data/$chat_id/locks/edit.txt");
remove("data/$chat_id/locks/english.txt");
remove("data/$chat_id/locks/arabic.txt");
remove("data/$chat_id/locks/join.txt");
remove("data/$chat_id/locks/bots.txt");
remove("data/$chat_id/locks/cmd.txt");
remove("data/$chat_id/locks/emoji.txt");
remove("data/$chat_id/locks/character.txt");
remove("data/$chat_id/locks/characters.txt");
remove("data/$chat_id/locks/videomsg.txt");
remove("data/$chat_id/locks/media/stickers.txt");
remove("data/$chat_id/locks/media/photo.txt");
remove("data/$chat_id/locks/media/video.txt");
remove("data/$chat_id/locks/media/music.txt");
remove("data/$chat_id/locks/media/gif.txt");
remove("data/$chat_id/locks/media/document.txt");
remove("data/$chat_id/locks/media/location.txt");
remove("data/$chat_id/locks/media/contact.txt");
remove("data/$chat_id/locks/media/game.txt");
rmdir("data/$chat_id");
rmdir("data/$chat_id/warns");
rmdir("data/$chat_id/locks/media");
rmdir("data/$chat_id/locks");
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"گروه/سوپر گروه با موفقیت از لیست مدیریت گروه حذف شد!",
	'parse_mode'=>'MarkDown'
		]);
}
else{
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"این گروه/سوپر گروه ادد نشده است!",
	'parse_mode'=>'MarkDown'
		]);
}
}
}

if($text == '/leave' && $from_id == $ADMIN || $text == '/leave' && in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
bot('leaveChat',[
'chat_id'=>$chat_id
]);
}
}
elseif($text == '/leave' && $from_id != $ADMIN || $text == '/leave' && !in_array($from_id, $sudoss)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"فقط ادمین کل ربات می تواند از این دستور استفاده کند!", 'parse_mode'=>'MarkDown'
  ]);
}
if($lock_cmd == "❌"){
if(strpos($text, "/whois") !== false){
$whois = str_replace("/whois ", "", $text);
if(is_numeric($whois)){
$who = getChat($whois);
if($who !== false){
bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"[".$who['first_name']."](https://telegram.me/".$who['username'], 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"خطا!:
 /whois ایدی عددی", 'parse_mode'=>'MarkDown'
  ]);
}
}
if($text == "/me" || $text == "!me"){
$a = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getuserprofilephotos?user_id=".$from_id));
$b = objectToArrays($a);
$c = $b["ok"];
$d = $b["result"];
$e = $d["total_count"];
$f = $d["photos"][0][0]["file_id"];
if($e == 0){
	bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"https://seouc.ir/AntiSpam/NoPhoto.png",
'caption'=>"👤Name : $from_fname

🆔UserName : @$from_uname

🆔ID : $from_id

🏞Number Of Your Photos : $e"
]);
}
else{
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$f,
'caption'=>"👤Name : $from_fname

🆔UserName : @$from_uname

🆔ID : $from_id

🏞Number Of Your Photos : $e"
]);
}
}
if(strpos($text, "/getpic") !== false){
$n = str_replace("/getpic ", "", $text);
$a = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getuserprofilephotos?user_id=".$from_id));
$b = objectToArrays($a);
$c = $b["ok"];
$d = $b["result"];
$e = $d["total_count"];
$f = $d["photos"][$n-1][0]["file_id"];
if($e == 0){
	bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"You Don't Have Any Photo!"
]);
}
else{
if($n <= $e){
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$f,
'caption'=>"🏞Your Selected Photos Number : $n

🏞Number Of Your Photos : $e"
]);
}
else{
		bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"You Don't Have $n Photos!"
]);
}
}
}
if($text == '/id' || $text == "!id"){
if($chatType == "group" || $chatType == "supergroup"){
if(file_exists("data/$chat_id/filters.txt")){
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>-----Your Info-----</b>

👤<b>Name :</b> $from_fname

🆔<b>UserName :</b> @$from_uname

🆔<b>ID :</b> $from_id

<b>-----Group Info-----</b>

<b>👥Group Name :</b> $groupname

🆔<b>Group ID :</b> $chat_id

👥<b>Group Type :</b> $chatType

<b>-----Warn Info-----</b>

👮Warn From Admin
".$userwarn."|".$warns,
	'parse_mode'=>'HTML'
		]);
}
}
}
if($text == '/info' && $reply || $text == '!info' && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if(file_exists("data/$chat_id/filters.txt")){
if($from_id == $owner_id || in_array($from_id, $mlid)){
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>-----Replied Info-----</b>

👤<b>Name :</b> $reply_fname

🆔<b>UserName :</b> @$reply_uname

🆔<b>ID :</b> $reply_id

<b>-----Group Info-----</b>

<b>👥Group Name :</b> $groupname

🆔<b>Group ID :</b> $chat_id

👥<b>Group Type :</b> $chatType

<b>-----Warn Info-----</b>

👮Warn From Admin
".$ruserwarn."|".$warns,
	'parse_mode'=>'HTML'
		]);
}
}
}
}
if($text == "/link" || $text == "!link"){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/link.txt")){
$link = file_get_contents("data/$chat_id/link.txt");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"لینک گروه:
 $link", 'parse_mode'=>'MarkDown'
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if($text == "/rules" || $text == "!rules"){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/rules.txt")){
$rules = file_get_contents("data/$chat_id/rules.txt");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"قوانین گروه:
 $rules", 'parse_mode'=>'MarkDown'
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if($text == "/owner" || $text == "!owner"){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/owner.txt")){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"*Owner:*
$owner_id", 'parse_mode'=>'MarkDown'
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if(strpos($text,"/setlink") !== false && $from_id == $owner_id){
if($chatType == "group" || $chatType == "supergroup"){
$link = str_replace("/setlink","",$text);
save("data/$chat_id/link.txt", $link);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"لینک گروه تغییر یافت!", 'parse_mode'=>'MarkDown'
  ]);
}
}
if(strpos($text,"/setrules") !== false && $from_id == $owner_id){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/rules.txt")){
$rules = str_replace("/setrules","",$text);
save("data/$chat_id/rules.txt", $rules);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"قوانین گروه تغییر یافت!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if($text == "/modlist" || $text == "!modlist"){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/modlist.txt")){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"*ModList:*
$modlist_id", 'parse_mode'=>'MarkDown'
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if($text == "/promote" && $from_id == $owner_id && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/modlist.txt")){
if (strpos($modlist_id , "$reply_id") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در لیست ادمین ها بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $myfile2 = fopen("data/$chat_id/modlist.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$reply_id\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $reply_id با یوزرنیم @$reply_uname با موفقیت پرموت شد!", 'parse_mode'=>'HTML'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if(strpos($text, "/promote") !== false && $from_id == $owner_id && !$reply){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/modlist.txt")){
$pid = str_replace("/promote ", "", $text);
if (strpos($modlist_id , "$pid") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در لیست ادمین ها بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $myfile2 = fopen("data/$chat_id/modlist.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$pid\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $pid با موفقیت پرموت شد!", 'parse_mode'=>'HTML'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if($text == "/demote" && $from_id == $owner_id && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/modlist.txt")){
if (strpos($modlist_id , "$reply_id") !== false) {
  $demote = str_replace($reply_id."\n","",$modlist_id);
save("data/$chat_id/modlist.txt",$demote);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $reply_id با یوزرنیم @$reply_uname با موفقیت دموت شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در لیست ادمین ها نبود!", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if(strpos($text, "/demote") !== false && $from_id == $owner_id && !$reply){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/modlist.txt")){
$did = str_replace("/demote ", "", $text);
if (strpos($modlist_id , "$did") !== false) {
  $demote = str_replace($did."\n","",$modlist_id);
save("data/$chat_id/modlist.txt",$demote);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $did با موفقیت دموت شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در لیست ادمین ها نبود!", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
elseif(strpos($text, "/setwlc") !== false){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/whitelist.txt")){
if($from_id == $owner_id){
$txt = str_replace("/setwlc ", "", $text);
save("data/$chat_id/welcome.txt", $txt);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"متن خوش آمدگویی گروه با موفقیت تغییر کرد!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
elseif($text == "/delwlc" || $text == "!delwlc"){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/whitelist.txt")){
if($from_id == $owner_id){
save("data/$chat_id/welcome.txt", "");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"متن خوش آمدگویی گروه با موفقیت حذف شد!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
elseif(strpos($text, "/setbye") !== false){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/whitelist.txt")){
if($from_id == $owner_id){
$txt = str_replace("/setbye ", "", $text);
save("data/$chat_id/leave.txt", $txt);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"متن خداحافظی گروه با موفقیت تغییر کرد!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
elseif($text == "/delbye" || $text == "!delbye"){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/whitelist.txt")){
if($from_id == $owner_id){
save("data/$chat_id/leave.txt", "");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"متن خداحافظی گروه با موفقیت حذف شد!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if($text == "/whitelist" || $text == "!whitelist"){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/whitelist.txt")){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"*WhiteList:*
$whitelist", 'parse_mode'=>'MarkDown'
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if($text == "/addwhitelist" && $from_id == $owner_id && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/whitelist.txt")){
if (strpos($whitelist , "$reply_id") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در لیست whitelist بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $myfile2 = fopen("data/$chat_id/whitelist.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$reply_id\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $reply_id با یوزرنیم @$reply_uname با موفقیت به لیست whitelist اضافه شد!", 'parse_mode'=>'HTML'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if(strpos($text, "/addwhitelist") !== false && $from_id == $owner_id && !$reply){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/whitelist.txt")){
$wid = str_replace("/addwhitelist ", "", $text);
if (strpos($whitelist , "$reply_id") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل در لیست whitelist بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $myfile2 = fopen("data/$chat_id/whitelist.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$wid\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $wid با موفقیت به لیست whitelist اضافه شد!", 'parse_mode'=>'HTML'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if($text == "/delwhitelist" && $from_id == $owner_id && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/whitelist.txt")){
if (strpos($whitelist , "$reply_id") !== false) {
  $demote = str_replace($reply_id."\n","",$whitelist);
save("data/$chat_id/whitelist.txt",$demote);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $reply_id با یوزرنیم @$reply_uname با موفقیت از لیست whitelist حذف شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل درwhitelist نبود!", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if(strpos($text, "/delwhitelist") && $from_id == $owner_id && !$reply){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/whitelist.txt")){
$wid = str_replace("/delwhitelist ", "", $text);
if (strpos($whitelist , "$wid") !== false) {
  $demote = str_replace($wid."\n","",$whitelist);
save("data/$chat_id/whitelist.txt",$demote);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $wid با موفقیت از لیست whitelist حذف شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل درwhitelist نبود!", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if($text == "/filterlist" || $text == "!filterlist"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/modlist.txt")){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"*FilterList:*
$filters", 'parse_mode'=>'MarkDown'
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if($text == "/cleanfilters" || $text == "!cleanfilters"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/filters.txt")){
if($filters != ""){
	save("data/$chat_id/filters.txt", "");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"فیلتر لیست با موفقیت خالی شد!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"فیلترلیست خالیست!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
}
if(strpos($text, "/addfilter") !== false){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/filters.txt")){
$filter = str_replace("/addfilter ", "", $text);
if (strpos($filters , "$filter") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کلمه از قبل در لیست فیلتر ها بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $myfile2 = fopen("data/$chat_id/filters.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$filter\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کلمه $filter با موفقیت به لیست فیلتر ها افزوده شد", 'parse_mode'=>'HTML'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if(strpos($text, "/remfilter") !== false){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/filters.txt")){
$filter = str_replace("/remfilter ", "", $text);
if(strpos($filters , "$filter") !== false){
		  $f = str_replace($filter."\n","",$filters);
save("data/$chat_id/filters.txt", $f);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کلمه $filter باموفقیت از لیست فیلترها حذف شد", 'parse_mode'=>'HTML'
  ]);
}
else{
   bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کلمه در لیست فیلترها قرار ندارد!", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if($text == "/setowner" && $reply){
	if($from_id == $ADMIN || in_array($reply_id, $sudoss)){
		if($chatType == "group" || $chatType == "supergroup"){
			if (file_exists("data/$chat_id/owner.txt")){
			save("data/$chat_id/owner.txt", $reply_id);
			bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"صاحب گروه با موفقیت تغییر یافت.", 'parse_mode'=>'MarkDown'
  ]);
			}
		}
	}
}
if($text == "/mute" && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/mute.txt")){
if($reply_id != $ADMIN && !in_array($reply_id, $sudoss) && $reply_id != $owner_id && !in_array($reply_id, $mlid)){
if (strpos($muteusers , "$reply_id") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل mute بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $myfile2 = fopen("data/$chat_id/mute.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$reply_id\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $reply_id با یوزرنیم @$reply_uname با موفقیت mute شد!", 'parse_mode'=>'HTML'
  ]);
}
}
else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شما نمی توانید بر روی مقام داران این کار را انجام دهید.", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if(strpos($text, "/mute") !== false && !$reply && strpos($text, "/mutelist") === false){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/mute.txt")){
$mid = str_replace("/mute ", "", $text);
if($mid != $ADMIN && !in_array($mid, $sudoss) && $mid != $owner_id && !in_array($mid, $mlid)){
if (strpos($muteusers , "$mid") !== false) {
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل mute بود!", 'parse_mode'=>'MarkDown'
  ]);
}
else{
  $myfile2 = fopen("data/$chat_id/mute.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$mid\n");
fclose($myfile2);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $mid با موفقیت mute شد!", 'parse_mode'=>'HTML'
  ]);
}
}
else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شما نمی توانید بر روی مقام داران این کار را انجام دهید.", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if($text == "/unmute" && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/mute.txt")){
if (strpos($muteusers , "$reply_id") !== false) {
$mute = str_replace($reply_id."\n","",$muteusers);
save("data/$chat_id/mute.txt",$mute);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $reply_id با یوزرنیم @$reply_uname با موفقیت unmute شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل mute نبود!", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if(strpos($text, "/unmute") !== false && !$reply){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/mute.txt")){
$mid = trim(str_replace("/mute ", "", $text));
if (strpos($muteusers , "$mid") !== false) {
$mute = str_replace($mid."\n","",$muteusers);
save("data/$chat_id/mute.txt",$mute);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"کاربر $mid با موفقیت unmute شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"این کاربر از قبل mute نبود!", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if($text == "/mutelist" || $text == "!mutelist"){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/mute.txt")){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"*MuteList:*
$muteusers", 'parse_mode'=>'MarkDown'
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
if($text == "/kick" && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/modlist.txt")){
if($reply_id != $ADMIN && !in_array($reply_id, $sudoss) && $reply_id != $owner_id && !in_array($reply_id, $mlid) && $reply_id != $gpadmin_id){
bot('kickChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$reply_id
  ]);
bot('unbanChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$reply_id
  ]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"#انجام_شد
کاربر $reply_id با موفقیت کیک شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شما نمی توانید بر روی مقام داران این کار را انجام دهید.", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if(strpos($text, "/kick") !== false && !$reply && strpos($text, "/kickme") === false){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/modlist.txt")){
$kid = str_replace("/kick ", "", $text);
if($kid != $ADMIN && !in_array($kid, $sudoss) && $kid != $owner_id && !in_array($kid, $mlid) && $kid != $gpadmin_id){
bot('kickChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$kid
  ]);
bot('unbanChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$kid
  ]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"#انجام_شد
کاربر $kid با موفقیت کیک شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شما نمی توانید بر روی مقام داران این کار را انجام دهید.", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if($text == "/kickme" || $text == "!kickme"){
if($chatType == "group" || $chatType == "supergroup"){
	$done = bot('kickChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$from_id
  ])->ok;
bot('unbanChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$from_id
  ]);
  if($done == true){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"#انجام_شد
کاربر $reply_id با موفقیت کیک شد!", 'parse_mode'=>'HTML'
  ]);
}
}
}
if($text == "/ban" && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/modlist.txt")){
if($reply_id != $ADMIN && !in_array($reply_id, $sudoss) && $reply_id != $owner_id && !in_array($reply_id, $mlid) && $reply_id != $gpadmin_id){
bot('kickChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$reply_id
  ]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"#انجام_شد
کاربر $reply_id با موفقیت بن شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شما نمی توانید بر روی مقام داران این کار را انجام دهید.", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if($text == "/balist" && $from_id == $ADMIN || $text == "/balist" && in_array($from_id, $sudoss)){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"*Ban All List :*
	$banall",
	'parse_mode'=>"MarkDown"
	]);
}
elseif($text == "/pin" && $reply){
	if($chatType == "group" || $chatType == "supergroup"){
		if($from_id == $owner_id || in_array($from_id, $mlid)){
			if (file_exists("data/$chat_id/modlist.txt")){
				bot('pinChatMessage',[
				'chat_id'=>$chat_id,
				'message_id'=>$reply_msgid,
				'disable_notification'=>false
				]);
				bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"#انجام_شد
	پیام رپلی شده پین شد",
	'parse_mode'=>"HTML"
	]);
			}
		}
	}
}
elseif($text == "/unpin"){
	if($chatType == "group" || $chatType == "supergroup"){
		if($from_id == $owner_id || in_array($from_id, $mlid)){
			if (file_exists("data/$chat_id/modlist.txt")){
				bot('unpinChatMessage',[
				'chat_id'=>$chat_id
				]);
				bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"#انجام_شد
	پیام پین شده آن پین شد",
	'parse_mode'=>"HTML"
	]);
			}
		}
	}
}
elseif($text == "/create link"){
	if($chatType == "group" || $chatType == "supergroup"){
		if($from_id == $owner_id || in_array($from_id, $mlid)){
			if (file_exists("data/$chat_id/modlist.txt")){
        $getlink = file_get_contents("https://api.telegram.org/bot".API_KEY."/exportChatInviteLink?chat_id=$chat_id");
$jsonlink = json_decode($getlink, true);
$getlinkde = $jsonlink['result'];
				bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"#انجام_شد
	لینک جدید ساخته شد
	لینک جدید گروه:
	$getlinkde",
	'parse_mode'=>"HTML"
	]);
			}
		}
	}
}
elseif($text == "/setphoto" && $reply){
	if($chatType == "group" || $chatType == "supergroup"){
		if($from_id == $owner_id || in_array($from_id, $mlid)){
			if (file_exists("data/$chat_id/modlist.txt")){
				$photo = $reply->photo;
				$file = $photo[count($photo)-1]->file_id;
				$get = bot('getfile',['file_id'=>$file]);
				$patch = $get->result->file_path;
				file_put_contents("data/$chat_id/gpphoto.png", file_get_contents("https://api.telegram.org/file/bot".API_KEY."/$patch"));
				$done = bot('setChatPhoto',[
				'chat_id'=>$chat_id,
				'photo'=>new CURLFile("data/$chat_id/gpphoto.png")
				]);
				bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"#انجام_شد
	عکس گروه تغییر کرد",
	'parse_mode'=>"HTML"
	]);
			}
		}
	}
}
elseif($text == "/delphoto" && !$reply){
	if($chatType == "group" || $chatType == "supergroup"){
		if($from_id == $owner_id || in_array($from_id, $mlid)){
			if (file_exists("data/$chat_id/modlist.txt")){
				$done = bot('deleteChatPhoto',[
				'chat_id'=>$chat_id,
				])->ok;
				if($done == true){
				bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"#انجام_شد
	عکس گروه پاک شد",
	'parse_mode'=>"HTML"
	]);
				}
			}
		}
	}
}
elseif(strpos($text, '/settitle') !== false){
	if($chatType == "group" || $chatType == "supergroup"){
		if($from_id == $owner_id || in_array($from_id, $mlid)){
			if (file_exists("data/$chat_id/modlist.txt")){
				$title = str_replace("/settitle", "", $text);
				$done = bot('setChatTitle',[
				'chat_id'=>$chat_id,
				'title'=>$title
				]);
				bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"#انجام_شد
	نام گروه تغییر کرد",
	'parse_mode'=>"HTML"
	]);
			}
		}
	}
}
elseif(strpos($text, '/setdes') !== false){
	if($chatType == "group" || $chatType == "supergroup"){
		if($from_id == $owner_id || in_array($from_id, $mlid)){
			if (file_exists("data/$chat_id/modlist.txt")){
				$description = str_replace("/setdes", "", $text);;
				$done = bot('setChatDescription',[
				'chat_id'=>$chat_id,
				'description'=>$description
				]);
				bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"#انجام_شد
	توضیحات گروه تغییر کرد",
	'parse_mode'=>"HTML"
	]);
			}
		}
	}
}
if(strpos($text, "/ban") !== false && !$reply && strpos($text, "/banall") === false){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/modlist.txt")){
$bid = str_replace("/ban ", "", $text);
if($bid != $ADMIN && !in_array($bid, $sudoss) && $bid != $owner_id && !in_array($bid, $mlid) && $bid != $gpadmin_id){
bot('kickChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$bid
  ]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"#انجام_شد
کاربر $bid با موفقیت بن شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شما نمی توانید بر روی مقام داران این کار را انجام دهید.", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if($text == "/unban" && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/modlist.txt")){
bot('unbanChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$reply_id
  ]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"#انجام_شد
کاربر $reply_id با موفقیت آن بن شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
if(strpos($text, "/unban") !== false && !$reply && strpos($text, "/unbanall") === false){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
if (file_exists("data/$chat_id/modlist.txt")){
$bid = str_replace("/unban ", "", $text);
bot('unbanChatMember',[
 'chat_id'=>$chat_id,
 'user_id'=>$bid
  ]);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"#انجام_شد
کاربر $bid با موفقیت آن بن شد!", 'parse_mode'=>'HTML'
  ]);
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گروه/سوپرگروه ادد نشده است!", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}

else if ($text == '/warn' && $reply) {
  if($from_id == $owner_id || in_array($from_id, $mlid)){
    if($reply_id != $ADMIN && $reply_id != $owner_id && !in_array($from_id, $mlid)){
      //mkdir("data/$chat_id/warn");
      if(file_exists("data/$chat_id/warns/$reply_id.txt")){
        if($ruserwarn == $warns - 1){
          bot('kickChatMember',[
        	   'chat_id'=>$chat_id,
        	 'user_id'=>$reply_id
        	]);
        	remove("data/$chat_id/warns/$reply_id.txt");
          bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text' => "کاربر $reply_fname به دلیل داشتن حداکثر اخطار از گروه بن شد."
          ]);
        }
        else if ($ruserwarn < $warns - 1){
          $welwarn = file_get_contents("data/$chat_id/warns/$reply_id.txt");
          $wranlast = $welwarn + 1;
          save("data/$chat_id/warns/$reply_id.txt","$wranlast");
          bot('sendMessage',[
            'chat_id'=>$update->message->chat->id,
              'text'=>"#انجام_شد
               کاربر $reply_fname با موفقیت یک اخطار گرفت",
            'disable_web_page_preview'=>true
          ]);
        }
      }
      else if(!file_exists("data/$chat_id/warns/$reply_id.txt") || $ruserwarn == "0"){
        save("data/$chat_id/warns/$reply_id.txt", "1");
        bot('sendMessage',[
          'chat_id'=>$update->message->chat->id,
            'text'=>"#انجام_شد
             کاربر $reply_fname با موفقیت یک اخطار گرفت",
          'disable_web_page_preview'=>true
        ]);
      }
    }
  }
}
elseif ($text == '/unwarn' && $reply) {
  if($from_id == $owner_id || in_array($from_id, $mlid)){
    if($reply_id != $ADMIN && $reply_id != $owner_id && $reply_id != $modlist_id){
      //mkdir("data/$chat_id/warn");
      if(file_exists("data/$chat_id/warns/$reply_id.txt") && $ruserwarn > "0"){
        $welwarn = file_get_contents("data/$chat_id/warns/$reply_id.txt");
				$wranlast = $welwarn -1 ;
	      save("data/$chat_id/warns/$reply_id.txt","$wranlast");
        bot('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"#انجام_شد
           کاربر $reply_fname با موفقیت یک اخطارش حذف شد",
           'disable_web_page_preview'=>true
        ]);
      }
      else{
        bot('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"کاربر اخطاری ندارد!",
          'disable_web_page_preview'=>true
        ]);
      }
    }
  }
}
elseif ($text == '/del warns' && $reply) {
  if($from_id == $owner_id || in_array($from_id, $mlid)){
    if($reply_id != $ADMIN && $reply_id != $owner_id && $reply_id != $modlist_id){
      //mkdir("data/$chat_id/warn");
      if(file_exists("data/$chat_id/warns/$reply_id.txt") && $ruserwarn > "0"){
	      save("data/$chat_id/warns/$reply_id.txt","0");
        bot('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"#انجام_شد
           کاربر $reply_fname با موفقیت بدون اخطار شد!",
           'disable_web_page_preview'=>true
        ]);
      }
      else{
        bot('sendMessage',[
          'chat_id'=>$update->message->chat->id,
          'text'=>"کاربر اخطاری ندارد!",
          'disable_web_page_preview'=>true
        ]);
      }
    }
  }
}
else if($userwarn >= $warns){
  bot('kickChatMember',[
	   'chat_id'=>$chat_id,
	 'user_id'=>$update->message->from->id
	]);
	remove("data/$chat_id/warns/$from_id.txt");
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text' => "کاربر $from_id به دلیل داشتن حداکثر اخطار از گروه بن شد."
  ]);
}
elseif($text == "/del" && $reply || $text == "!del" && $reply){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
deleteMessage($chat_id, $reply_msgid);
deleteMessage($chat_id, $message_id);
}
}
}
elseif(strpos($text, "/delete") !== false){
if($chatType == "group" || $chatType == "supergroup"){
if($from_id == $owner_id || in_array($from_id, $mlid)){
$m = str_replace("/delete", "", $text);
if(is_numeric($m)){
if($m <= 100 && $m >= 1){
$i=$message_id-$m;
while($i<$message_id){
	deleteMessage($chat_id, $i);
	$i++;
}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"#DONE
 ".$m." پیام اخیر پاک شد!",
 'parse_mode'=>'MarkDown'
  ]);
}
else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"عدد مورد نظر باید از 1 تا 100 باشد!", 'parse_mode'=>'MarkDown'
  ]);
}
}
else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"خطا!:
 /delete ADAD", 'parse_mode'=>'MarkDown'
  ]);
}
}
}
}
elseif($text == "/ping" || $text == "!ping"){
	$ping = ping("www.seouc.ir", 80, 10);
               bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"*Ping:*
 $ping", 'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
 ['text'=>"My Channel",'url'=>'https://telegram.me/myir_official']
 ]
	]
	])
  ]);
}
}
elseif($lock_cmd == "✅" && $from_id != $owner_id && !in_array($from_id, $mlid) && !in_array($from_id, $wlid) && strpos($text, "/") !== false){
deleteMessage($chat_id, $message_id);
}
if($data == "llinks"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/links.txt")){
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
if($lock_links == "✅"){
save("data/$chatid/locks/links.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال لینک آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/links.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال لینک قفل شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "lflood"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/flood.txt")){
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
if($lock_flood == "✅"){
save("data/$chatid/locks/flood.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال اسپم آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/flood.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال اسپم قفل شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "ltag"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/tag.txt")){
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
if($lock_tag == "✅"){
save("data/$chatid/locks/tag.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال تگ آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/tag.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال تگ قفل شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "lusername"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/flood.txt")){
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
if($lock_username == "✅"){
save("data/$chatid/locks/username.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال یوزرنیم آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/username.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال یوزرنیم قفل شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "lnumber"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/number.txt")){
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
if($lock_number == "✅"){
save("data/$chatid/locks/number.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال شماره آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/number.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال شماره قفل شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "larabic"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/arabic.txt")){
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
if($lock_arabic == "✅"){
save("data/$chatid/locks/arabic.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال پیام عربی آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/arabic.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال پیام عربی قفل شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "lchat"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/chat.txt")){
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
if($lock_chat == "✅"){
save("data/$chatid/locks/chat.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
چت کردن آزاد شد!"]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/chat.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
چت کردن قفل شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "lforward"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/forward.txt")){
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
if($lock_forward == "✅"){
save("data/$chatid/locks/forward.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
فروارد کردن آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/forward.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
فروارد کردن قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "lreply"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/reply.txt")){
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
if($lock_reply == "✅"){
save("data/$chatid/locks/reply.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
رپلی کردن آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/reply.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
رپلی کردن قفل شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "ledit"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/edit.txt")){
$lock_edit = file_get_contents("data/$chatid/locks/edit.txt");
if($lock_edit == "✅"){
save("data/$chatid/locks/edit.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ادیت کردن آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/edit.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ادیت کردن قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "lenglish"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/english.txt")){
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
if($lock_english == "✅"){
save("data/$chatid/locks/english.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال پیام انگلیسی آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/english.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال پیام انگلیسی قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "ljoin"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/join.txt")){
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
if($lock_join == "✅"){
save("data/$chatid/locks/join.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
اضافه شدن عضو جدید آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/join.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
اضافه شدن عضو جدید قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "lbots"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/bots.txt")){
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
if($lock_bots == "✅"){
save("data/$chatid/locks/bots.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
افزودن ربات به گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/bots.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
افزودن ربات به گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "mstickers"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/media/stickers.txt")){
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
if($mute_stickers == "✅"){
save("data/$chatid/locks/media/stickers.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال استیکر در گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/media/stickers.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال استیکر گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "mphoto"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/media/photo.txt")){
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
if($mute_photo == "✅"){
save("data/$chatid/locks/media/photo.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال عکس در گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/media/photo.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال عکس  در گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "mvideo"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/media/video.txt")){
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
if($mute_video == "✅"){
save("data/$chatid/locks/media/video.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال ویدئو در گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/media/video.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال ویدئو  در گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "mmusic"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/media/music.txt")){
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
if($mute_music == "✅"){
save("data/$chatid/locks/media/music.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال موزیک در گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/media/music.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال موزیک  در گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "mgif"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/media/gif.txt")){
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
if($mute_gif == "✅"){
save("data/$chatid/locks/media/gif.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال گیف در گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/media/gif.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال گیف  در گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "mdocument"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/media/document.txt")){
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
if($mute_document == "✅"){
save("data/$chatid/locks/media/document.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال داکیومنت در گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/media/document.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال داکیومنت  در گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "mlocation"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/media/location.txt")){
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
if($mute_location == "✅"){
save("data/$chatid/locks/media/location.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال مکان در گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/media/location.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال مکان  در گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "mcontact"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/media/contact.txt")){
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
if($mute_contact == "✅"){
save("data/$chatid/locks/media/contact.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال مخاطب در گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/media/contact.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال مخاطب  در گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
if($data == "mgame"){
if($cchatType == "group" || $cchatType == "supergroup"){
if($fromid == $ownerid || in_array($fromid, $mlid2)){
if (file_exists("data/$chatid/locks/media/game.txt")){
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");
if($mute_game == "✅"){
save("data/$chatid/locks/media/game.txt", "❌");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال بازی در گروه آزاد شد!"
  ]);
$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
else{
save("data/$chatid/locks/media/game.txt", "✅");
bot('answerCallbackQuery',[
 'callback_query_id'=>$update->callback_query->id,
 'text'=>"#انجام_شد
ارسال بازی  در گروه قفل شد!"
  ]);

$lock_links = file_get_contents("data/$chatid/locks/links.txt");
$lock_flood = file_get_contents("data/$chatid/locks/flood.txt");
$lock_tag = file_get_contents("data/$chatid/locks/tag.txt");
$lock_username = file_get_contents("data/$chatid/locks/username.txt");
$lock_number = file_get_contents("data/$chatid/locks/number.txt");
$lock_chat = file_get_contents("data/$chatid/locks/chat.txt");
$lock_forward = file_get_contents("data/$chatid/locks/forward.txt");
$lock_reply = file_get_contents("data/$chatid/locks/reply.txt");
$lock_edit= file_get_contents("data/$chatid/locks/edit.txt");
$lock_english = file_get_contents("data/$chatid/locks/english.txt");
$lock_arabic = file_get_contents("data/$chatid/locks/arabic.txt");
$lock_join = file_get_contents("data/$chatid/locks/join.txt");
$lock_bots = file_get_contents("data/$chatid/locks/bots.txt");
$mute_stickers = file_get_contents("data/$chatid/locks/media/stickers.txt");
$mute_photo = file_get_contents("data/$chatid/locks/media/photo.txt");
$mute_video = file_get_contents("data/$chatid/locks/media/video.txt");
$mute_music = file_get_contents("data/$chatid/locks/media/music.txt");
$mute_gif = file_get_contents("data/$chatid/locks/media/gif.txt");
$mute_document = file_get_contents("data/$chatid/locks/media/document.txt");
$mute_location = file_get_contents("data/$chatid/locks/media/location.txt");
$mute_contact = file_get_contents("data/$chatid/locks/media/contact.txt");
$mute_game = file_get_contents("data/$chatid/locks/media/game.txt");

bot('editMessageText',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"SuperGroup/Group Settings And Media
❌ = unlock
✅ = lock",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
 [
	['text'=>"🏷Settings",'callback_data'=>'text']
 ],
 [
	['text'=>"🏷Flood",'callback_data'=>'text'],['text'=>"$lock_flood",'callback_data'=>'lflood']
 ],
 [
	['text'=>"🏷Links",'callback_data'=>'text'],['text'=>"$lock_links",'callback_data'=>'llinks']
 ],
 [
	['text'=>"🏷Tag",'callback_data'=>'text'],['text'=>"$lock_tag",'callback_data'=>'ltag']
 ],
 [
	['text'=>"🏷Username",'callback_data'=>'text'],['text'=>"$lock_username",'callback_data'=>'lusername']
 ],
 [
	['text'=>"🏷Number",'callback_data'=>'text'],['text'=>"$lock_number",'callback_data'=>'lnumber']
 ],
 [
	['text'=>"🏷Chat",'callback_data'=>'text'],['text'=>"$lock_chat",'callback_data'=>'lchat']
 ],
 [
	['text'=>"🏷Forward",'callback_data'=>'text'],['text'=>"$lock_forward",'callback_data'=>'lforward']
 ],
 [
	['text'=>"🏷Reply",'callback_data'=>'text'],['text'=>"$lock_reply",'callback_data'=>'lreply']
 ],
 [
	['text'=>"🏷Edit",'callback_data'=>'text'],['text'=>"$lock_edit",'callback_data'=>'ledit']
 ],
 [
	['text'=>"🏷English",'callback_data'=>'text'],['text'=>"$lock_english",'callback_data'=>'lenglish']
 ],
 [
	['text'=>"🏷Arabic",'callback_data'=>'text'],['text'=>"$lock_arabic",'callback_data'=>'larabic']
 ],
 [
	['text'=>"🏷Join",'callback_data'=>'text'],['text'=>"$lock_join",'callback_data'=>'ljoin']
 ],
 [
	['text'=>"🏷Bots",'callback_data'=>'text'],['text'=>"$lock_bots",'callback_data'=>'lbots']
 ],
 [
	['text'=>"💿Media Settings", 'callback_data'=>'text']
 ],
 [
	['text'=>"💿Stickers",'callback_data'=>'text'],['text'=>"$mute_stickers",'callback_data'=>'mstickers']
 ],
 [
	['text'=>"💿Photo",'callback_data'=>'text'],['text'=>"$mute_photo",'callback_data'=>'mphoto']
 ],
 [
	['text'=>"💿Video",'callback_data'=>'text'],['text'=>"$mute_video",'callback_data'=>'mvideo']
 ],
 [
	['text'=>"💿Music",'callback_data'=>'text'],['text'=>"$mute_music",'callback_data'=>'mmusic']
 ],
 [
	['text'=>"💿Gif",'callback_data'=>'text'],['text'=>"$mute_gif",'callback_data'=>'mgif']
 ],
 [
	['text'=>"💿Document",'callback_data'=>'text'],['text'=>"$mute_document",'callback_data'=>'mdocument']
 ],
 [
	['text'=>"💿Location",'callback_data'=>'text'],['text'=>"$mute_location",'callback_data'=>'mlocation']
 ],
 [
	['text'=>"💿Contact",'callback_data'=>'text'],['text'=>"$mute_contact",'callback_data'=>'mcontact']
 ],
 [
	['text'=>"💿Game",'callback_data'=>'text'],['text'=>"$mute_game",'callback_data'=>'mgame']
 ],
 [
	['text'=>"🔙Back To Menu",'callback_data'=>'backm']
 ],
	]
	])
  ]);
}
}
}
}
}
//===================locks=======================//
if (stripos($text, ".me" ) !== false || stripos($text, ".ir" ) !== false || stripos($text, ".com" ) !== false || stripos($text, ".org" ) !== false || stripos($text, ".net" ) !== false || stripos($text, ".tk" ) !== false || stripos($text, ".ml" ) !== false || stripos($caption, ".me" ) !== false || stripos($caption, ".ir" ) !== false || stripos($caption, ".com" ) !== false || stripos($caption, ".org" ) !== false || stripos($caption, ".net" ) !== false || stripos($caption, ".tk" ) !== false || stripos($caption, ".ml" ) !== false){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if($lock_links == "✅"){
if (file_exists("data/$chat_id/locks/links.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
}
if (stripos($text, "#" ) !== false && $lock_tag == "✅" || stripos($caption, "#" ) !== false && $lock_tag == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/tag.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
if (stripos($text, "@" ) !== false && $lock_username == "✅" || stripos($caption, "@" ) !== false && $lock_username == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/username.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
if($photo && $mute_photo == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/photo.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
if($english && $lock_english == "✅" || $english2 && $lock_english == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/english.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
if ( stripos($text, "ش" ) !== false || stripos($text, "س") !== false || stripos($text, "ی") !== false || stripos($text, "ب") !== false || stripos($text, "ل") !== false || stripos($text, "ا") !== false || stripos($text, "ت") !== false || stripos($text, "ن") !== false || stripos($text, "م") !== false || stripos($text, "پ") !== false || stripos($text, "ط") !== false || stripos($text, "ظ") !== false || stripos($text, "ز") !== false || stripos($text, "ژ") !== false || stripos($text, "د") !== false || stripos($text, "ر") !== false || stripos($text, "ک") !== false || stripos($text, "و") !== false || stripos($text, "ج") !== false || stripos($text, "گ") !== false || stripos($text, "چ") !== false || stripos($text, "ح") !== false || stripos($text, "ه") !== false || stripos($text, "خ") !== false
|| stripos($text, "ف") !== false || stripos($text, "ع") !== false || stripos($caption, "ش" ) !== false || stripos($caption, "س") !== false || stripos($caption, "ی") !== false || stripos($caption, "ب") !== false || stripos($caption, "ل") !== false || stripos($caption, "ا") !== false || stripos($caption, "ت") !== false || stripos($caption, "ن") !== false || stripos($caption, "م") !== false || stripos($caption, "پ") !== false || stripos($caption, "ط") !== false || stripos($caption, "ظ") !== false || stripos($caption, "ز") !== false || stripos($caption, "ژ") !== false || stripos($caption, "د") !== false || stripos($caption, "ر") !== false || stripos($caption, "ک") !== false || stripos($caption, "و") !== false || stripos($caption, "ج") !== false || stripos($caption, "گ") !== false || stripos($caption, "چ") !== false || stripos($caption, "ح") !== false || stripos($caption, "ه") !== false || stripos($caption, "خ") !== false
|| stripos($caption, "ف") !== false || stripos($caption, "ع") !== false) {
 if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if ($lock_arabic == "✅") {
deleteMessage($chat_id, $message_id);
}
}
}
}
if($number && $lock_number == "✅" || $number2 && $lock_number == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/number.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
if($edited && file_get_contents("data/$echat_id/locks/edit.txt") == "✅"){
if($efrom_id != $ADMIN && $efrom_id != $eowner_id && $efrom_id != $emodlist_id && $from_id != $egpadmin_id && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($echatType == "group" || $echatType == "supergroup"){
if (file_exists("data/$echat_id/locks/edit.txt")){
deleteMessage($echat_id, $emessage_id);
}
}
}
}
if($text && in_array($from_id , $muteusersss) || $caption && in_array($from_id , $muteusersss) || $photo && in_array($from_id , $muteusersss) || isset($update->message->forward_from) && in_array($from_id , $muteusersss) || isset($update->message->sticker) && in_array($from_id , $muteusersss) || isset($update->message->video) && in_array($from_id , $muteusersss) || isset($update->message->audio) && in_array($from_id , $muteusersss) || isset($update->message->document) && in_array($from_id , $muteusersss) || isset($update->message->location) && in_array($from_id , $muteusersss) || isset($update->message->contact) && in_array($from_id , $muteusersss) || isset($update->message->game) && in_array($from_id , $muteusersss) || isset($update->message->video_note) && in_array($from_id , $muteusersss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/mute.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
if($text && $lock_chat == "✅" || $caption && $lock_chat == "✅" || isset($update->message->forward_from) && $lock_chat == "✅" || $photo && $lock_chat == "✅" || isset($update->message->sticker) && $lock_chat == "✅" || isset($update->message->video) && $lock_chat == "✅" || isset($update->message->audio) && $lock_chat == "✅" || isset($update->message->document) && $lock_chat == "✅" || isset($update->message->location) && $lock_chat == "✅" || isset($update->message->contact) && $lock_chat == "✅" || isset($update->message->game) && $lock_chat == "✅" || isset($update->message->video_note) && $lock_chat == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/chat.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
if($lock_emoji == "✅"){
$expe = explode("\n",file_get_contents("emojis.txt"));
	if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/chat.txt")){
    for($i = 0;$i <= count($expe);$i++){
        if(strpos($text,$expe[$i]) !== false || strpos($caption, $expe[$i]) !== false){
deleteMessage($chat_id, $message_id);
        }
    }
}
}
}
}
    $exp = explode("\n",file_get_contents("data/$chat_id/filters.txt"));
	if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/chat.txt")){
    for($i = 0;$i <= count($exp);$i++){
        if(strpos($text,$exp[$i]) !== false || strpos($caption, $exp[$i]) !== false){
deleteMessage($chat_id, $message_id);
        }
    }
}
}
	}
if(isset($update->message->forward_from) && $lock_forward == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/forward.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
if($reply && $lock_reply == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/reply.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
if(isset($update->message->sticker) && $mute_stickers == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/stickers.txt")){
	deleteMessage($chat_id, $message_id);
}
}
}
}
if(isset($update->message->video) && $mute_video == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/video.txt")){
	deleteMessage($chat_id, $message_id);
}
}
}
}
if(isset($update->message->audio) && $mute_music == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/music.txt")){
	deleteMessage($chat_id, $message_id);
}
}
}
}
if(isset($update->message->document) && $mute_document == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/document.txt")){
	deleteMessage($chat_id, $message_id);
}
}
}
}
if(isset($update->message->location) && $mute_location == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/location.txt")){
	deleteMessage($chat_id, $message_id);
}
}
}
}
if(isset($update->message->contact) && $mute_contact == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/contact.txt")){
	deleteMessage($chat_id, $message_id);
}
}
}
}
if(isset($update->message->game) && $mute_game == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/game.txt")){
	deleteMessage($chat_id, $message_id);
}
}
}
}
if(isset($update->message->video_note) && $lock_videomessage == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/game.txt")){
	deleteMessage($chat_id, $message_id);
}
}
}
}
$document_mime = $update->message->document->mime_type;
if($document_mime == "video/mp4" && $mute_gif == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/media/game.txt")){
	deleteMessage($chat_id, $message_id);
}
}
}
}
elseif($lock_char == "✅"){
if($text_len >= $characters || $caption_len >= $characters)
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/characters.txt")){
deleteMessage($chat_id, $message_id);
}
}
}
}
if($lock_flood == "✅"){
if($from_id != $ADMIN && $from_id != $owner_id && !in_array($from_id, $mlid) && $from_id != $gpadmin_id && $from_id != 309952371 && !in_array($from_id, $wlid) && !in_array($from_id, $sudoss)){
if($chatType == "group" || $chatType == "supergroup"){
if (file_exists("data/$chat_id/locks/flood.txt")){
$timing = date("Y-m-d-h-i-sa");
$timing = str_replace("am","",$timing);
$theflood = file_get_contents("flood/$timing-$from_id.txt");
$timing_spam = $theflood+1;
file_put_contents("flood/$timing-$from_id.txt","$timing_spam");
$theflood2 = file_get_contents("flood/$timing-$from_id.txt");
$_floods2 = file_get_contents("data/$chat_id/floods.txt");
if($theflood2 >= $_floods2){
bot('kickChatMember',[
                    'chat_id'=>$update->message->chat->id,
                    'user_id'=>$update->message->from->id
                ]);
unlink("flood/$timing-$from_id.txt");
return false;
}
}
}
}
}

?>
