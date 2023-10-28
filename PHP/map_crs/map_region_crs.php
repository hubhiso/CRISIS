
<?php


$dcode =  $_GET["dcode"];
$dyear =  $_GET["dyear"];
$province = $_GET["province"];
$chart_type = $_GET["type"];
$chart_name = $_GET["chart_name"];
$dtype = $_GET["dtype"];

if ($chart_type == "1"){
	$text_unit = "จำนวน";
}else if ($chart_type == "2"){
	$text_unit = "อัตราต่อแสนประชากร";
}

$pr = $_GET["pr"];
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
<!--link href="highcharts.css" rel="stylesheet" type="text/css"-->

<div id="container"></div>
<script>
				jQuery.noConflict();
				var example = 'geojson', 
					theme = 'default';
				(function($){ // encapsulate jQuery
					// Prepare random data
var data = [

	<?php echo $data_import; ?>
	
];


<?php 
if ($province == "") {
	$province = "thailand100meter";
	$height = 670;
}else{
	$height = 500;
	
}


?>


$.getJSON('shape_region/<?php echo $province;?>.json', function (geojson) {
	

Highcharts.setOptions({
        lang: {
            thousandsSep: ',',
            decimalPoint: '.'
        }
    });
	
    // Initiate the chart
 var chart2  =  Highcharts.mapChart('container', {
        chart: {
            map: geojson,
			
            height: <?php echo $height; ?>
        
        },

		
        title: {
        text: '<?php echo $chart_name."  ".$dyear; ?>',
		style: {
			  fontSize: '15px' 
		   }
		},
		subtitle: {
			
			text: ''
			
			
		},

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

       
		 credits: {
				text:'<?php if (trim($province) == "thailand100meter"){ echo "แบ่งเฉดสีตาม Quartile ระดับจังหวัด";}else{ echo "แบ่งเฉดสีตาม Quartile ระดับจังหวัดทั้งประเทศ";}?>',
				href:'#',
				style: {
                        fontSize: '12px'
                    }
			},
			
			 legend: {
                title: {
                    text: ['<?php echo $text_unit; ?>'],
                    style: {
						
                        color: ( // theme
                            Highcharts.defaultOptions &&
                            Highcharts.defaultOptions.legend &&
                            Highcharts.defaultOptions.legend.title &&
                            Highcharts.defaultOptions.legend.title.style &&
                            Highcharts.defaultOptions.legend.title.style.color
                        ) || '#cc3366'
                    },
				
                },
				
               
			   	<?php if ($chart_type == "1"){ ?>
                	valueDecimals: 0,
				
				<?php }?>
                //symbolHeight: 14
               
            },

            colorAxis: {
            min: 0,
            minColor: '#eee',
            maxColor: '#047e47'
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
                <?php if ($result != ""){ ?>
				//enabled: true,
				<?php } ?>
                format: '{point.properties.PROV_NAMT}',
				
            }
        }],
		
		tooltip: {
        pointFormat: '{point.properties.PROV_NAMT},{point.value}'
    	}
		
    });
});
				})(jQuery);
			</script>
            <?php //echo "upper".$upper;?>
           