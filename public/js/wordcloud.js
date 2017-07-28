var width= 750,
    height=400;

var fill = d3.scale.category20();
var data = [{word:"PASTASAUCE|PEANUTBUTTER",weight:20},{word:"CORNFLAKES|PEANUTBUTTER",weight:10},{word:"Normally",weight:25},{word:"CHILLIEPOWDER|APPLECIDER",weight:15},{word:"BASMATIRICE|CORNOIL|VEGETABLEOIL",weight:30},{word:"CHEESE|CHOCOLATE",weight:12},{word:"TOMATOSAUCE|FISHCHIPS",weight:8},{word:"ENERGYDRINK|CORNFLAKES",weight:18},{word:"CORNOIL|BISCUITS|CHOCOLATE",weight:22},{word:"PASTASAUCE|SOYABEANOIL",weight:27}];

  d3.layout.cloud().size([width, height])
      .words(data.map(function(d) {
        return {text: d.word, size: d.weight};
      }))
      .rotate(function() { return ~~(Math.random() * 2) * 90; })
      .font("Impact")
      .fontSize(function(d) { return d.size; })
      .on("end", draw)
      .start();

  function draw(words) {
    d3.select("#wordcloud").append("svg")
        .attr("width", width)
        .attr("height", height)
      .append("g")
        .attr("transform", "translate("+ (width/2)+","+ (height/2)+")")
      .selectAll("text")
        .data(words)
      .enter().append("text")
        .style("font-size", function(d) { return d.size + "px"; })
        .style("font-family", "Impact")
        .style("fill", function(d, i) { return fill(i); })
        .attr("text-anchor", "middle")
        .attr("transform", function(d) {
          return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
        })
        .text(function(d) { return d.text; });
  }