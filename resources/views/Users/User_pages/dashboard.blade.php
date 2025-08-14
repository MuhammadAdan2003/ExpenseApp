@extends('Users.user_layout.userlayout')

@section('content')
    <!-- Stats Cards -->
    <div class="card-grid mb-3 col-3">
        <div class="card bg-dark-3 border-primary border-opacity-25">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-uppercase text-muted mb-0">Total Balance</h6>
                        <h2 class="mb-0 text-gradient">$12,345</h2>
                    </div>
                    <div class="icon-circle bg-primary bg-opacity-10">
                        <i class="fas fa-dollar-sign text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other stat cards -->
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-lg-8 mb-4">
            <div class="card bg-dark-3 border-primary border-opacity-25 h-100">
                <div class="card-header bg-transparent border-primary border-opacity-25">
                    <h6 class="m-0 text-light"><i class="fas fa-chart-line me-2 text-primary"></i>Monthly
                        Expenses Trend</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card bg-dark-3 border-primary border-opacity-25 h-100">
                <div class="card-header bg-transparent border-primary border-opacity-25">
                    <h6 class="m-0 text-light"><i class="fas fa-chart-pie me-2 text-primary"></i>Expense
                        Categories</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Charts Row -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card bg-dark-3 border-primary border-opacity-25 h-100">
                <div class="card-header bg-transparent border-primary border-opacity-25">
                    <h6 class="m-0 text-light"><i class="fas fa-chart-bar me-2 text-primary"></i>Yearly
                        Comparison</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-dark-3 border-primary border-opacity-25 h-100">
                <div class="card-header bg-transparent border-primary border-opacity-25">
                    <h6 class="m-0 text-light"><i class="fas fa-chart-pie me-2 text-primary"></i>Income
                        Sources</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Main Content -->

@section('bottomScriptsCustom')
    <script>
        // Initialize Charts
        document.addEventListener('DOMContentLoaded', function() {
            // Line Chart
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Expenses',
                        data: [3200, 2900, 3500, 4100, 3800, 4200, 3900],
                        borderColor: '#4361ee',
                        backgroundColor: 'rgba(67, 97, 238, 0.1)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e1e1e1'
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#e1e1e1'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#e1e1e1'
                            }
                        }
                    }
                }
            });

            // Pie Chart
            const pieCtx = document.getElementById('pieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Housing', 'Food', 'Transport', 'Entertainment', 'Utilities', 'Others'],
                    datasets: [{
                        data: [35, 20, 15, 10, 12, 8],
                        backgroundColor: [
                            '#4361ee',
                            '#4cc9f0',
                            '#7209b7',
                            '#f72585',
                            '#3f37c9',
                            '#4895ef'
                        ],
                        borderColor: 'rgba(30, 30, 30, 0.85)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: '#e1e1e1'
                            }
                        }
                    }
                }
            });

            // Bar Chart
            const barCtx = document.getElementById('barChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['2020', '2021', '2022', '2023'],
                    datasets: [{
                            label: 'Income',
                            data: [45000, 52000, 58000, 62000],
                            backgroundColor: 'rgba(76, 201, 240, 0.7)',
                            borderColor: '#4cc9f0',
                            borderWidth: 1
                        },
                        {
                            label: 'Expenses',
                            data: [38000, 42000, 47000, 51000],
                            backgroundColor: 'rgba(247, 37, 133, 0.7)',
                            borderColor: '#f72585',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e1e1e1'
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#e1e1e1'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#e1e1e1'
                            }
                        }
                    }
                }
            });

            // Doughnut Chart
            const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
            new Chart(doughnutCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Salary', 'Freelance', 'Investments', 'Other'],
                    datasets: [{
                        data: [65, 15, 15, 5],
                        backgroundColor: [
                            '#4361ee',
                            '#4cc9f0',
                            '#7209b7',
                            '#f72585'
                        ],
                        borderColor: 'rgba(30, 30, 30, 0.85)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: '#e1e1e1'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection


<!-- Footer -->
