// Morris.js Charts sample data for SB Admin template

$(function() {

    // Area Chart
    Morris.Area({
        element: 'morris-area-chart',
        data: [
		{period: '2016-01',iphone: 2666},
		{period: '2016-02',iphone: 2778},
		{period: '2016-03',iphone: 4912},
		{period: '2016-04',iphone: 3767},
		{period: '2016-05',iphone: 6810},
		{period: '2016-06',iphone: 5670},
		{period: '2016-07',iphone: 4820},
		{period: '2016-08',iphone: 15073},
		{period: '2016-09',iphone: 10687},
		{period: '2016-10',iphone: 10687},
		{period: '2016-11',iphone: 10687},
		{period: '2016-12',iphone: 8432}
		],
        xkey: 'period',
        ykeys: ['iphone'],
        labels: ['2016','2017'],
        pointSize: 1,
        hideHover: 'auto',
        resize: true
    });
 });

    