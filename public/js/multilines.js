  var outerWidth = 500;
      var outerHeight = 250;
      var margin = { left: 60, top: 5, right: 70, bottom: 60 };
      var xColumn = "year";
      var yColumn = "population";
      var xAxisLabelText = "Time";
      var xAxisLabelOffset = 48;
      var yAxisLabelText = "Population";
      var yAxisLabelOffset = 40;
      var innerWidth  = outerWidth  - margin.left - margin.right;
      var innerHeight = outerHeight - margin.top  - margin.bottom;
      var svg = d3.select("body").append("svg")
        .attr("width", outerWidth)
        .attr("height", outerHeight);
      var g = svg.append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
      var path = g.append("path")
        .attr("class", "chart-line");
      var xAxisG = g.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + innerHeight + ")")
      var xAxisLabel = xAxisG.append("text")
        .style("text-anchor", "middle")
        .attr("transform", "translate(" + (innerWidth / 2) + "," + xAxisLabelOffset + ")")
        .attr("class", "label")
        .text(xAxisLabelText);
      var yAxisG = g.append("g")
        .attr("class", "y axis");
      var yAxisLabel = yAxisG.append("text")
        .style("text-anchor", "middle")
        .attr("transform", "translate(-" + yAxisLabelOffset + "," + (innerHeight / 2) + ") rotate(-90)")
        .attr("class", "label")
        .text(yAxisLabelText);
      var xScale = d3.time.scale().range([0, innerWidth]);
      var yScale = d3.scale.linear().range([innerHeight, 0]);
      // Use a modified SI formatter that uses "B" for Billion.
      var siFormat = d3.format("s");
      var customTickFormat = function (d){
        return siFormat(d).replace("G", "B");
      };
      var xAxis = d3.svg.axis().scale(xScale).orient("bottom")
        .ticks(5)
        .outerTickSize(0);
      var yAxis = d3.svg.axis().scale(yScale).orient("left")
        .ticks(5)
        .tickFormat(customTickFormat)
        .outerTickSize(0);
      var line = d3.svg.line()
        .x(function(d) { return xScale(d[xColumn]); })
        .y(function(d) { return yScale(d[yColumn]); });
      function render(data){
        xScale.domain(d3.extent(data, function (d){ return d[xColumn]; }));
        yScale.domain([0, d3.max(data, function (d){ return d[yColumn]; })]);
        xAxisG.call(xAxis);
        yAxisG.call(yAxis);
        path.attr("d", line(data));
      }
      function type(d){
        d.year = new Date(d.year);
        d.population = +d.population;
        return d;
      }
      d3.csv("worldPopulationByYear.csv", type, render);