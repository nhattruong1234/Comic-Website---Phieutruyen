//Biểu đồ lượt xem

const labelsWeeks = [
  'Week 1',
  'Week 2',
  'Week 3',
  'Week 4',
  'Week 5',
  'Week 6'
];

const dataViews = {
  labels: labelsWeeks,
  datasets: [{
    label: 'Lượt xem',
    backgroundColor: 'white',
    borderColor: '#8860D0',
    data: [0, 0, 0, 0, 0, 60]
  }]
};

// </block:setup>

const Coptions = {
  maintainAspectRatio: false,
  scales: {
    y: {
      stacked: true,
      grid: {
        display: true,
      }
    },
    x: {
      grid: {
        display: false
      }
    }
  }
};
  
// <block:config:0>
const configView = {
  type: 'line',
  data: dataViews,
  options: Coptions
};
// </block:config>

// === include 'setup' then 'config' above ===

const Views_Chart = new Chart(
  document.getElementById('ViewsChart'),
  configView
);

//Biểu đồ đăng truyện
const dataNumOfChap = {
  labels: labelsWeeks,
  datasets: [{
    label: 'Số chương truyện đã đăng',
    backgroundColor: 'white',
    borderColor: '#5680E9',
    data: [0, 0, 1, 0, 1, 4]
  }]
};

const configNumOfChap = {
  type: 'line',
  data: dataNumOfChap,
  options: Coptions
};

const NumOfChap_Chart = new Chart(
  document.getElementById('NumOfChapChart'),
  configNumOfChap
);
