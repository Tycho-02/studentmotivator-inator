let cData = JSON.parse(`<?php echo $chart_data; ?>`);
let ctx = document.getElementById("#grafiek__container__canvas");

//data van slaaptijd
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

//opties
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

//creeer lijn grafiek 
let chart1 = new Chart(ctx, {
  type: "line",
  data: data,
  options: options
  
});