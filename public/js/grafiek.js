
    //get the pie chart canvas
    let cData = JSON.parse(`<?php echo $chart_data; ?>`);
    let ctx = $("#line-chart");

    //line chart data
    let data = {
      labels: cData.label,
      datasets: [
        {
          label: "Totaal aantal uren geslapen",
          data: cData.data,
          
          borderColor: [
            "#CDA776",
            "#989898",
            "#CB252B",
            "#E39371",
            "#1D7A46",
            "#F4A460",
            "#CDA776",
          ],
          borderWidth: [1, 1, 1, 1, 1,1,1]
        }
  

      ]
    };

    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        fill: false,
        position: "top",
        text: "Grafiek van jouw slaaptijd",
        fontSize: 18,
        fontColor: "#111"
      },
      legend: {
        display: true,
        fill: false,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 16
        }
      }
    };

    //create line Chart class object
    let chart1 = new Chart(ctx, {
      type: "line",
      data: data,
      options: options
    });
