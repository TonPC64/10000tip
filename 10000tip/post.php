<?
session_start();
$host="localhost";
$user="tonp";
$pass="123456";
$db="webboard";
$conn= mysql_connect($host,$user,$pass);

if(!$conn) die ("Can't connect mysql");

mysql_select_db($db,$conn) or die ("Can't connect DB");

mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
 
$sql = "select max(statusId) from status";
$result= mysql_query($sql,$conn);
$rs =mysql_fetch_array($result);
date_default_timezone_set("Asia/Bangkok");
$statusId=$rs[0]+1;

if($statusId<10) $statusId ="0000".$statusId;
else if($statusId<100) $statusId ="000".$statusId;
else if($statusId<1000) $statusId ="00".$statusId;
else if($statusId<10000) $statusId ="0".$statusId;
else if($statusId<100000) $statusId ="".$statusId;

$status=$_POST["status"];
$status = str_replace("<script>","",$status);
$status = str_replace("</script>","",$status);
$status = str_replace("\n","<br />",$status);



$status=embedYoutube($status);




$usernameId=$_SESSION["userid"];
$desinationId=$_POST["friend"];
$date=date("Y-m-d");
$time=date("H:");
$time.=date("i")+5;
$time.=date(":s");
$ip=$_SERVER["REMOTE_ADDR"];

$sql="insert into status values ('$statusId','$status','$usernameId','$desinationId','$date','$time','$ip','0','0')";
mysql_query($sql,$conn);
mysql_close($conn);




function embedYoutube($text)
{
    $search = '~
        # Match non-linked youtube URL in the wild. (Rev:20130823)
        (?:https?://)?    # Optional scheme.
        (?:[0-9A-Z-]+\.)? # Optional subdomain.
        (?:               # Group host alternatives.
          youtu\.be/      # Either youtu.be,
        | youtube         # or youtube.com or
          (?:-nocookie)?  # youtube-nocookie.com
          \.com           # followed by
          \S*             # Allow anything up to VIDEO_ID,
          [^\w\s-]        # but char before ID is non-ID char.
        )                 # End host alternatives.
        ([\w-]{11})       # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w-]|$)      # Assert next char is non-ID or EOS.
        (?!               # Assert URL is not pre-linked.
          [?=&+%\w.-]*    # Allow URL (query) remainder.
          (?:             # Group pre-linked alternatives.
            [\'"][^<>]*>  # Either inside a start tag,
          | </a>          # or inside <a> element text contents.
          )               # End recognized pre-linked alts.
        )                 # End negative lookahead assertion.
        [?=&+%\w.-]*      # Consume any URL (query) remainder.
        ~ix';

    $replace = '<br>
		<object width="425" height="344">
        <param name="movie" value="http://www.youtube.com/v/$1?fs=1"</param>
        <param name="allowFullScreen" value="true"></param>
        <param name="allowScriptAccess" value="always"></param>
        <embed src="http://www.youtube.com/v/$1?fs=1"
            type="application/x-shockwave-flash" allowscriptaccess="always" width="425" height="344">
        </embed>
		
        </object>
	
		<br>';

    return preg_replace($search, $replace, $text);
}

echo "<script langquage='javascript'>";
echo "window.location =history.back();";
echo "</script>";



?>