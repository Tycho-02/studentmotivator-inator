<article class="grafiek">
    <div class="grafiek__container">
      <canvas id="grafiek__container__canvas"></canvas>
    </div>
</article>

  <!--we moeten script IN component gebruiken, anders wordt deze NIET geimporteerd, niet fout rekenen aub - deze staat ook in /public/js/grafiek.js-->
<script>
    let cData = JSON.parse(`<?php echo $chart_data; ?>`);
    let ctx = $("#grafiek__container__canvas");

    //line chart data
    let data = {
      labels: cData.label,
      
      datasets: [
        {
          label: "Totaal aantal uren geslapen op deze dag",
          data: cData.data,
          
             borderColor: '#ffffff',
             backgroundColor: "#C3073F",


          borderWidth: [1, 1, 1, 1, 1,1,1]
        }
  

      ]
    };

    //options
    let options = {
      
      responsive: true,
      title: {
        display: true,
        fill: true,
        position: "top",
        text: "Grafiek van jouw slaaptijd",
        fontSize: 18,
        fontColor: "#ffffff",
        
        color: "#ffffff"
      },
      scales: {
              xAxes: [{ticks: { color: "white" }, ticks: {
                               fontColor: "#ffffff",
                               fontSize: 16
                              }}],
             yAxes: [{ticks: { color: "white" }, ticks: {
                               fontColor: "#ffffff",
                               fontSize: 20
                              }}],
              },
      legend: {
        display: true,
        fill: true,
        position: "bottom",
        
        labels: {
          fontColor: "#ffffff",
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
</script><?php /**PATH /home/pi/studentmotivator-inator/resources/views/tijdslapen/components/tijdslapenGrafiek--index.blade.php ENDPATH**/ ?>