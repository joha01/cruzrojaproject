<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// shared_options : highcharts global settings, like interface or language
$config['shared_options'] = array(
	'chart' => array(
		'backgroundColor' => array(
			'linearGradient' => array(0, 0, 500, 500),
			'stops' => array(
				array(0, 'rgb(255, 255, 255)'),
				array(1, 'rgb(240, 240, 255)')
			)
		),
		'shadow' => true
	)
);

// Template Example
$config['chart_template'] = array(
	'chart' => array(
		'renderTo' => 'graph',
		'defaultSeriesType' => 'column',
		'backgroundColor' => array(
			'linearGradient' => array(0, 500, 0, 0),
			'stops' => array(
				array(0, 'rgb(255, 255, 255)'),
				array(1, 'rgb(190, 200, 255)')
			)
		),
     ),
     'colors' => array(
     	 '#ED561B', '#50B432'
     ),
     'credits' => array(
     	'enabled'=> true,
     	'text'	=> 'Cruz Roja',
		'href' => 'http://localhost/cruzrojaproject/charts/active_record'
     ),
     'title' => array(
		'text' => 'Estadisticas'
     ),
     'legend' => array(
     	'enabled' => false
     ),
    'yAxis' => array(
		'title' => array(
			'text' => 'Nro. accidentes'
		)
	),
	'xAxis' => array(
		'title' => array(
			'text' => 'Tipo accidente'
		)
	),
	'tooltip' => array(
		'shared' => true
	)
);