<?

include("location/SxGeo.php");
$SxGeo = new SxGeo('location/SxGeoCity.dat');
$ip=getenv('REMOTE_ADDR');
$data=$SxGeo->get($ip);
extract($data);
extract($city);

$geo_city_id=$id;
$geo_city_name=mb_strtolower($name_ru,'utf-8');



$data=$SxGeo->getCityFull($ip);
extract($data);
extract($region);

$geo_region_id=$id;
$geo_region_name=mb_strtolower($name_ru,'utf-8');

echo 'city: '.$geo_city_id.' - '.$geo_city_name.'<br>';
echo 'region: '.$geo_region_id.' - '.$geo_region_name.'<br>';


//echo('name: '.mb_strtolower($name_ru,'utf-8').'<br>id: '.$id);
//echo('name: '.mb_strtolower($name_ru,'utf-8').'<br>id: '.$id);


//echo $id;





?>