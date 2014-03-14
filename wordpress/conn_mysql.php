<html>
<head>
<title> conn mysql </title>
</head>

<body>

<?php

class fundbao{
    public $cdate;
    public $income10000;
    public $income7day;

}

$host = '115.29.237.28';
$user = 'userrd';
$pass = 'Guest_2050';
$dbname = 'fundmanager';

echo "$user<br>";
print "connected successful";

$link = mysql_connect($host, $user, $pass)  or die("could not connect");

mysql_select_db($dbname) or die("could not select database");

// $query = "select * from baidubaofund order by cdate desc limit 7";
$query = "select * from baidubaofund order by cdate desc";
$result = mysql_query($query) or die("query failed...");

print "<table border='1' width='500px' cellpadding='5' style='line-height: 24px; border-collapse: collapse;'>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $arrResult[$line["cdate"]] = $line;
    $arrResult['2014-03-06'] = array(
        'cdate' => '2014-03-06', 
        'income10000' => 0.0,
        'income7day' => 0.0
    );


    //
    print "\t<tr>\n";
    foreach($line as $col_value) {
            print "\t\t<td>$col_value</td>\n";
        }
        print "\t</tr>\n";
    }
print "</table>\n";
mysql_free_result($result);
mysql_close($link);

print_r($arrResult);

/*
foreach ($arrResult as $value) {
    print $value['cdate']."</br>";
}
$weekResult = array();
for ($i=0; $i<7; ++$i) {
    $weekResult[] = 0;
}
$arr = array(
    '2012-01-19' => array(
        'cdate' => "2012-01-19", 
        'xx'=> 'xx',
        ....
    ),
    '2012-09-20' =>
);
$arrResult['kkkk'] = $line;
foreach ($arrResult as $key => $value) {
    var_dump($key);
    $date = $value['cdate'];

}
 */
?>

</body>
</html>
