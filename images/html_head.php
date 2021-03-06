<?

//==== COOKIE GEO ===================================================================
$ip = getenv ( 'REMOTE_ADDR' ) == "127.0.0.1" ? '128.74.237.231' : getenv ( 'REMOTE_ADDR' );

if (    ( !isset ( $_COOKIE [ 'geo_country_id' ] ) )
    or ( !isset ( $_COOKIE [ 'geo_region_id'  ] ) )
    or ( !isset ( $_COOKIE [ 'geo_city_id'    ] ) )     )
{
    $SxGeo = new SxGeo ( 'api/location/SxGeoCity.dat' , SXGEO_BATCH | SXGEO_MEMORY );
    $geo_country_id = $SxGeo -> getCountryId( $ip );
    $geo_country_name = $SxGeo -> getCountry( $ip );
    $data = $SxGeo -> get ( $ip );
    extract ( $data );
    extract ( $city );
    $geo_city_id = $id;
    $geo_city_name = mb_strtolower( $name_ru , 'utf-8' );
    $data = $SxGeo -> getCityFull( $ip );
    extract ( $data );
    extract ( $region );
    $geo_region_id = $id;
    $geo_region_name = mb_strtolower( $name_ru , 'utf-8' );
    setcookie ( "geo_country_id"   , $geo_country_id   , time()+3600*24*31);
    setcookie ( "geo_country_name" , $geo_country_name , time()+3600*24*31);
    setcookie ( "geo_region_id"    , $geo_region_id    , time()+3600*24*31);
    setcookie ( "geo_city_id"      , $geo_city_id      , time()+3600*24*31);
    setcookie ( "geo_region_name"  , $geo_region_name  , time()+3600*24*31);
    setcookie ( "geo_city_name"    , $geo_city_name    , time()+3600*24*31);
} else {
    $geo_country_id   = $_COOKIE [ 'geo_country_id'   ];
    $geo_country_name = $_COOKIE [ 'geo_country_name' ];
    $geo_region_id    = $_COOKIE [ 'geo_region_id'    ];
    $geo_city_id      = $_COOKIE [ 'geo_city_id'      ];
    $geo_region_name  = $_COOKIE [ 'geo_region_name'  ];
    $geo_city_name    = $_COOKIE [ 'geo_city_name'    ];
}
//===================================================================================


//==== COOKIE Session ===============================================================
if ( !isset ( $_COOKIE [ 'SESSION_NAME' ] ) ) {
    $session_name=md5( time().$geo_country_id.$geo_city_id.mt_rand(10000000,99999999).mt_rand(10000000,99999999) );
    setcookie ( "SESSION_NAME"  , $session_name , time()+3600*24*31);
} else {
    $session_name=$_COOKIE [ 'SESSION_NAME' ];
}
//===================================================================================


//---- Check City---------------------------------------------
check_city ( $geo_city_id , $geo_city_name , $geo_region_id , $geo_region_name );

reg_user($session_name,$ip,$geo_country_id,$geo_region_id,$geo_city_id);

clear_outdated();

/*
echo "<hr><br><br><font color='black'>Debug Info:<br>";

echo "geo_city_id:".$geo_city_id."<br>";
echo "geo_city_name:".$geo_city_name."<br>";

echo "</font><hr>";
*/
// geo_city_id
// 1503901 - кемерово
// 1489425 - томск
// 1496747 - новосиб
// 524901  - москва
// 1486209 - екб

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $VAR_title; ?> | myfiora.com</title>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" media="all" />
    <!--project files-->
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!--owl-->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>

    <!--fancy-->
    <link rel="stylesheet" href="fancy/jquery.fancybox.css" type="text/css" media="all" />
    <script type="text/javascript" src="fancy/jquery.fancybox.js"></script>

    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            $(".phone-mask").mask("+7(999) 999-99-99");
        });
    </script>
    <script type="text/javascript" src="js/mokscript.js"></script>

    <?

    echo $HEAD_inject;

    if (isset($HEAD_require) && is_array($HEAD_require)) {
        foreach ($HEAD_require as $value) {
            require_once ($value);
        }
    }

    ?>

    <script type="text/javascript" src="js/device.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script>

        if (device.mobile()) {
            req = {provider: 'browser', autoReverseGeocode: true}
        } else {
            req = {provider: 'yandex', autoReverseGeocode: true}
        }

        ymaps.ready(function () {
            ymaps.geolocation.get(req).then(function (result) {
                properties = result.geoObjects.get(0).properties;
                locality_id = properties.get('metaDataProperty.GeocoderMetaData.id');
                locality_name = properties.get('metaDataProperty.GeocoderMetaData' +
                    '.AddressDetails' +
                    '.Country' +
                    '.AdministrativeArea' +
                    '.SubAdministrativeArea' +
                    '.Locality' +
                    '.LocalityName');

                console.log(locality_id,locality_name);
            });
        });

    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '661676284015784');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=661676284015784&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>