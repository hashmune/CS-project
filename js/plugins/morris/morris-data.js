// Morris.js Charts sample data for SB Admin template

$(function() {

    // Area Chart
    Morris.Line({
  element: 'morris-area-chart',
  data: [
    { y: '1900', a: 20, b: 34, c: 56 },
    { y: '1930', a: 43, b: 87, c: 10 },
    { y: '2000', a: 34, b: 51, c: 28 },
    { y: '2030', a: 25, b: 67, c: 42 },
    { y: '2100', a: 50, b: 40, c: 33 },
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c'],
  labels: ['Pattern 1', 'Pattern 2', 'Pattern 3']
});
 // });

Morris.Donut({
  element: 'donut-example',
  data: [
    {label: "Milk Powder", value: 4},
    {label: "Tea Bags", value: 10},
    {label: "Sugar", value: 8}
  ]
});

Morris.Donut({
  element: 'donut-example1',
  data: [
    {label: "Bread", value: 4},
    {label: "Sausage", value: 30},
    {label: "Butter", value: 12}
  ]
});

Morris.Donut({
  element: 'donut-example2',
  data: [
    {label: "Beer", value: 23},
    {label: "Soda", value: 9},
    {label: "Ice Cubes", value: 15}
  ]
});

});
    