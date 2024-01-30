
const ctx = document.getElementById('myChart');
const sctx = document.getElementById("gender-chart");


  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['J', 'F', 'M', 'A', 
      'May', 'J', 'J','A', 'S', 'O', 'N' , 'D'],
      datasets: [{
        label: 'Epargnes',
        data: [12, 19, 3, 5, 2, 3,],
        borderWidth: 2,
        fill : false
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const data = {
    labels: [
      'Red',
      'Blue',
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300, 50],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
      ],
      hoverOffset: 4
    }]
  };

  new Chart(sctx , {
    type : 'doughnut',
    data : data,
  })

 