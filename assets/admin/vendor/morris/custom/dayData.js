// Morris Days
var day_data = [
	{"period": "2016-10-01", "licensed": 3213, "UniPro": 887},
	{"period": "2016-09-30", "licensed": 3321, "UniPro": 776},
	{"period": "2016-09-29", "licensed": 3671, "UniPro": 884},
	{"period": "2016-09-20", "licensed": 3176, "UniPro": 448},
	{"period": "2016-09-19", "licensed": 3376, "UniPro": 565},
	{"period": "2016-09-18", "licensed": 3976, "UniPro": 627},
	{"period": "2016-09-17", "licensed": 2239, "UniPro": 660},
	{"period": "2016-09-16", "licensed": 3871, "UniPro": 676},
	{"period": "2016-09-15", "licensed": 3659, "UniPro": 656},
	{"period": "2016-09-10", "licensed": 3380, "UniPro": 663}
];
Morris.Line({
	element: 'dayData',
	data: day_data,
	xkey: 'period',
	ykeys: ['licensed', 'UniPro'],
	labels: ['Licensed', 'UniPro'],
	resize: true,
	hideHover: "auto",
	gridLineColor: "#424665",
	pointFillColors:['#ffffff'],
	pointStrokeColors: ['#ee0000'],
	lineColors:['#4285F4', '#2b86f5', '#63a9ff'],
});