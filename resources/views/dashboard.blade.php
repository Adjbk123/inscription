
@extends('layouts.admin')

@section('title', 'Tableau de bord')
@section('content')

<div class="container pt-2 p-4">
    <div class="row">

        {{-- Total candidatures --}}
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-info elevation-1">
                    <i class="fas fa-file-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Candidatures</span>
                    <span class="info-box-number">{{ $totalInscriptions }}</span>
                </div>
            </div>
        </div>

        {{-- En attente --}}
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-warning elevation-1">
                    <i class="fas fa-hourglass-half"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">En attente</span>
                    <span class="info-box-number">{{ $enAttente }}</span>
                </div>
            </div>
        </div>

        {{-- Acceptés --}}
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success elevation-1">
                    <i class="fas fa-check-circle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Formateurs Acceptés</span>
                    <span class="info-box-number">{{ $acceptees }}</span>
                </div>
            </div>
        </div>

        {{-- Refusés --}}
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-danger elevation-1">
                    <i class="fas fa-times-circle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Candidatures Refusées</span>
                    <span class="info-box-number">{{ $refusees }}</span>
                </div>
            </div>
        </div>

    </div>

    {{-- Graphique des candidatures --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Statistiques des candidatures</h5>
                </div>
                <div class="card-body" style="height: 300px;">
                    <canvas id="candidatureChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('candidatureChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['En attente', 'Acceptés', 'Refusés'],
            datasets: [{
                label: 'Nombre de candidatures',
                data: [
                    {{ $enAttente }},
                    {{ $acceptees }},
                    {{ $refusees }}
                ],
                backgroundColor: [
                    '#f39c12', // jaune
                    '#00a65a', // vert
                    '#dd4b39'  // rouge
                ],
                borderRadius: 5,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: true }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>

<style>
/* Info-box plus jolie et responsive */
.info-box {
    border-radius: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.info-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 20px rgba(0,0,0,0.15);
}

/* Icones légèrement plus grandes */
.info-box-icon i {
    font-size: 2rem;
}

/* Card graphique responsive */
.card-body canvas {
    width: 100% !important;
}

/* Ajustements mobile */
@media (max-width: 576px) {
    .info-box {
        margin-bottom: 20px;
    }
}
</style>
@endsection
