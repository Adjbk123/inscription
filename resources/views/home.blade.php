@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<div class="container-fluid py-4">
    {{-- Minimal Header --}}
    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold text-dark mb-1">Tableau de Bord</h4>
            <p class="text-muted small mb-0">Ravi de vous revoir, {{ userFullName() }}.</p>
        </div>
        <div class="col-auto">
            <div class="bg-white px-3 py-2 rounded-3 shadow-sm border small text-muted">
                <i class="far fa-calendar-alt me-2"></i>{{ now()->translatedFormat('d F Y') }}
            </div>
        </div>
    </div>

    {{-- Stats Cards Minimal --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-3">
                    <div class="text-muted small text-uppercase fw-bold mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">Inscriptions</div>
                    <div class="h4 fw-bold mb-0 text-primary">{{ $stats['total_inscriptions'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-3">
                    <div class="text-muted small text-uppercase fw-bold mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">En attente</div>
                    <div class="h4 fw-bold mb-0 text-warning">{{ $stats['pending_inscriptions'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 text-white" style="background: #4761FF;">
                <div class="card-body p-3">
                    <div class="opacity-75 small text-uppercase fw-bold mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">Acceptées</div>
                    <div class="h4 fw-bold mb-0 text-white">{{ $stats['accepted_inscriptions'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-3">
                    <div class="text-muted small text-uppercase fw-bold mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">Spécialités</div>
                    <div class="h4 fw-bold mb-0 text-dark">{{ $stats['total_specialites'] }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        {{-- Recent Activity Table --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold text-dark mb-0">Activités récentes</h6>
                    <a href="{{ route('employer.gestinscriptions.inscriptions.index') }}" class="btn btn-link btn-sm text-decoration-none p-0 fw-bold">Gérer tout <i class="fas fa-arrow-right ms-1" style="font-size: 0.7rem;"></i></a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light border-0">
                                <tr>
                                    <th class="ps-4 py-2 small border-0 text-muted">Candidat</th>
                                    <th class="py-2 small border-0 text-muted">Spécialité</th>
                                    <th class="py-2 small border-0 text-muted text-center">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['recent_inscriptions'] as $recent)
                                    <tr>
                                        <td class="ps-4 py-3">
                                            <div class="fw-bold text-dark small">{{ $recent->name }}</div>
                                            <div class="text-muted smallest">{{ $recent->created_at->diffForHumans() }}</div>
                                        </td>
                                        <td class="small">{{ $recent->specialite->nom ?? '---' }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $recent->statut == 'accepte' ? 'bg-success' : ($recent->statut == 'refuse' ? 'bg-danger' : 'bg-warning') }} rounded-pill" style="font-size: 0.65rem; font-weight: 500;">
                                                {{ $recent->statut == 'en_attente' ? 'En attente' : ucfirst($recent->statut) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Side Cards --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 mb-3">
                <div class="card-body p-4 text-center">
                    <div class="avatar-md bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-users text-primary"></i>
                    </div>
                    <h6>Équipe de gestion</h6>
                    <p class="text-muted small mb-3">Actuellement <strong>{{ $stats['total_users'] }}</strong> membres.</p>
                    <a href="{{ url('/gestutilisateurs/utilisateurs') }}" class="btn btn-outline-primary btn-sm rounded-pill px-4 w-100">Voir les utilisateurs</a>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-3 bg-white">
                <div class="card-body p-3">
                    <h6 class="fw-bold mb-3 small opacity-75 text-uppercase" style="letter-spacing: 1px;">Raccourcis</h6>
                    <a href="{{ route('employer.gestspecialites.specialites.index') }}" class="nav-link p-2 bg-light rounded-2 mb-2 d-flex align-items-center transition-all">
                        <i class="fas fa-plus-circle me-3 text-primary"></i>
                        <span class="small text-dark fw-bold">Nouvelle spécialité</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .smallest { font-size: 0.7rem; }
    .transition-all { transition: all 0.2s ease; }
    .transition-all:hover { transform: translateX(5px); background-color: #f1f4ff !important; }
</style>

@endsection