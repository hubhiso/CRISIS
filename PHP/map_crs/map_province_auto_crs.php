<?php


$province = $_GET["province"];

$nhso = $_GET["nhso"];
$date_start = $_GET["ds"];
$date_end = $_GET["de"];


//echo $dataage.$datayear;
//echo "&year=$year&age=$age&id=$id&datatype=$datatype&province=$province";
require("phpsqli_dbinfo_crs.php");
			
include("data_map_province_auto_crs.php");

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>

<div id="container"></div>
<script>
jQuery.noConflict();
var example = 'geojson',
    theme = 'default';
(function($) { // encapsulate jQuery
    // Prepare random data
    var data = [

        <?php echo $data_import; ?>

    ];



    $.getJSON('shape_amphur/<?php echo $province;?>.json', function(geojson) {


        // Initiate the chart
        var chart2 = Highcharts.mapChart('container', {
            chart: {
                map: geojson,
                height: 480
            },

            title: {
            text: 'การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS'
            },
            subtitle: {
                text: 'แยกรายอำเภอ',
                style: {
                    fontSize: '15px' 
                }
            },


            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },

            colorAxis: {
                min: 0,
                minColor: '#eee',
                maxColor: '#cc3366'
            },

            credits: {
                text: 'แบ่งเฉดสีตามค่าต่อเนื่อง ของอำเภอในจังหวัด',
                href: '#',
                style: {
                    fontSize: '12px'
                }
            },

            legend: {
                title: {
                    text: '<?php echo $text_unit; ?>',
                    style: {
                        color: ( // theme
                            Highcharts.defaultOptions &&
                            Highcharts.defaultOptions.legend &&
                            Highcharts.defaultOptions.legend.title &&
                            Highcharts.defaultOptions.legend.title.style &&
                            Highcharts.defaultOptions.legend.title.style.color
                        ) || '#cc3366'
                    }
                },

                <?php if ($chart_type == "1"){ ?>
                valueDecimals: 0,

                <?php }?>

            },

            series: [{
                data: data,
                keys: ['AMP_CODE', 'value'],
                joinBy: 'AMP_CODE',
                name: '<?php echo $text_unit; ?>',
                states: {
                    hover: {
                        color: '#a4edba',
                        tooltip: {
                            pointFormat: '{point.properties.AMP_NAME_T}'
                        }

                    }
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.properties.AMP_NAME_T}'
                }
            }],

            tooltip: {
                pointFormat: '{point.properties.AMP_NAME_T} , {point.value}'
            }

        });
    });
})(jQuery);
</script>