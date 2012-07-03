<?php
$conn=mysql_connect('localhost','satsolu_amistar','amistar_root123') or die('Could not connect: ' . mysql_error());

$name=$_POST['name'];
$phone_no=$_POST['phone_no'];
$email=$_POST['email'];
$website=$_POST['website'];
$message=$_POST['message'];
mysql_select_db("satsolu_amistar",$conn);

if (!$conn)
{
  die('Could not connect: ' . mysql_error());
}
//echo "Connection established!";
//echo "Database exists!";
$query="INSERT INTO contact_form(name,phone_no,email_id,website,message)values('$name','$phone_no','$email','$website','$message')";
if(!mysql_query($query,$conn))
{
  die('Error: ' . mysql_error());
}
//echo "1 record inserted in table!";

$contact_us_data= $name . $phone_no . $email . $website . $message ;


function PostRequest($url, $referer, $_data) {
// convert variables array to string:
$data = array();
while(list($n,$v) = each($_data)){
$data[] = "$n=$v";
}
$data = implode('&', $data);
// format --> test1=a&test2=b etc.
// parse the given URL
$url = parse_url($url);
if ($url['scheme'] != 'http') {
die('Only HTTP request are supported !');
}
// extract host and path:
$host = $url['host'];
$path = $url['path'];
// open a socket connection on port 80
$fp = fsockopen($host, 80);
// send the request headers:
fputs($fp, "POST $path HTTP/1.1\r\n");
fputs($fp, "Host: $host\r\n");
fputs($fp, "Referer: $referer\r\n");
fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
fputs($fp, "Content-length: ". strlen($data) ."\r\n");
fputs($fp, "Connection: close\r\n\r\n");
fputs($fp, $data);
$result = '';
while(!feof($fp)) {
// receive the results of the request
$result .= fgets($fp, 128);
}
// close the socket connection:
fclose($fp);
// split the result header from the content
$result = explode("\r\n\r\n", $result, 2);
$header = isset($result[0]) ? $result[0] : '';
$content = isset($result[1]) ? $result[1] : '';
// return as array:
return array($header, $content);
}
$data = array(
'user' => "amistartechnology",
'password' => "809759",
'msisdn' => "918793389912",
'sid' => "websms",
'msg' => $contact_us_data,
'fl' =>"0",
);
list($header, $content) = PostRequest(
"http://www.smslane.com//vendorsms/pushsms.aspx", // the url to post to
"http://www.amistar.in/scripts/insert.php", // its your url
$data
);
//echo $content;
mysql_close($conn);
header("Location: ../contactus.html");
?>