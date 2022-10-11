/* GRAFICO DE ULTIMAS VENDAS */

const labelsvendas = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const datavendas = {
    labels: labelsvendas,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const configvendas = {
    type: 'line',
    data: datavendas,
    options: {}
  };

  const chartvendas = new Chart(
    document.getElementById('vendaslastdays'),
    configvendas
  );


  /* GRAFICO DE TIPOS DE PAGAMENTOS SENDO FEITO */


  const datapagto = {
    labelspagto: [
      'Red',
      'Blue',
      'Yellow'
    ],
    datasets: [{
      labelpagto: 'My First Dataset',
      data: [300, 50, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };

  const configpagto  = {
    type: 'doughnut',
    data: datapagto,
  };

  const chartpagto = new Chart(
    document.getElementById('tipopagtos'),
    configpagto 
  );