<?php


$province = $_GET["province"];

$nhso = $_GET["nhso"];
$date_start = $_GET["ds"];
$date_end = $_GET["de"];


//echo $dataage.$datayear;
//echo "&year=$year&age=$age&id=$id&datatype=$datatype&province=$province";
 require("phpsqli_dbinfo_crs.php");
			
			include("data_map_region_crs.php");

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



    $.getJSON('shape_region/<?php echo $province;?>.json', function(geojson) {


        Highcharts.setOptions({
            lang: {
                thousandsSep: ',',
                decimalPoint: '.'
            }
        });

        // Initiate the chart
        var chart2 = Highcharts.mapChart('container', {
            chart: {
                map: geojson,
                height: 500
            },

            title: {
            text: 'การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS'
            },
            subtitle: {
                text: 'แยกรายเขต    ',
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

            legend: {
                verticalAlign: 'middle',
                align: 'right',
                layout: 'vertical',
                
            },


            colorAxis: {	
                dataClasses: [{
                    from :0,
                    to: 0,
                    name: "ไม่มีข้อมูล",
                    color: '#ddd',
                }, {
                    from :1,
                    to: 2,
                    name: "1 - 2 เรื่อง",
                    color: '#e046a2',
                }, {
                    from :3,
                    to: 10000,
                    name: "3 เรื่องขึ้นไป",
                    color: '#de0867',
                }
                ]
            },



            series: [{
                data: data,
                keys: ['PROV_CODE', 'value'],
                joinBy: 'PROV_CODE',
                name: '<?php echo $text_unit; ?>',
                states: {
                    hover: {
                        color: '#a4edba',
                        tooltip: {
                            pointFormat: '{point.properties.PROV_NAMT}'
                        }

                    }
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.properties.PROV_NAMT}'
                }
            }],

            tooltip: {
                pointFormat: '{point.properties.PROV_NAMT}:{point.value}'
            }

        });
    });
})(jQuery);
</script>