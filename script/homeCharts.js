
const ctx = document.getElementById('myChart');


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