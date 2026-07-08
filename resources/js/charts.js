import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', function() {
    // Revenue Chart (line chart)
    const revenueCanvas = document.getElementById('revenueChart');
    if (revenueCanvas) {
        new Chart(revenueCanvas, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Revenue (RM)',
                    data: [12000, 15000, 18000, 22000, 28000, 35000, 42000],
                    borderColor: '#0a2e4a',
                    backgroundColor: 'rgba(10, 46, 74, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Category Chart (doughnut chart)
    const categoryCanvas = document.getElementById('categoryChart');
    if (categoryCanvas) {
        new Chart(categoryCanvas, {
            type: 'doughnut',
            data: {
                labels: ['Digital Marketing', 'Technology & AI', 'Sales & CS', 'Leadership'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: ['#0a2e4a', '#f5a623', '#28a745', '#17a2b8']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }

    // Add more charts as needed
});
