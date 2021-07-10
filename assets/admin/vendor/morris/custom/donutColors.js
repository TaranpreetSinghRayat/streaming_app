// Morris Donut
Morris.Donut({
	element: 'donutColors',
	data: [
		{value: 30, label: 'foo'},
		{value: 15, label: 'bar'},
		{value: 10, label: 'baz'},
		{value: 5, label: 'A really really long label'}
	],
	backgroundColor: '#b7d8ff',
	labelColor: '#7980a2',
	colors:['#4285F4', '#2b86f5', '#63a9ff'],
	resize: true,
	hideHover: "auto",
	gridLineColor: "#424665",
	formatter: function (x) { return x + "%"}
});