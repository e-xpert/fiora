<?

include("location/SxGeo.php");
$SxGeo = new SxGeo('location/SxGeoCity.dat');
$ip=getenv('REMOTE_ADDR');
$data=$SxGeo->get($ip);
extract($data);
extract($city);


print_r($tv);


//echo $id;





?>