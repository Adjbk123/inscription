@extends('layouts.app')

@section('title', 'Ma disponibilité')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0 rounded-4 text-center">
                <div class="card-body p-5">

                    <h3 class="mb-3">Bonjour {{ $inscription->name }}</h3>
                    <p class="text-muted">Confirmez votre disponibilité pour donner des formations.</p>

                    <form action="{{ route('frontend.formateur.toggleDisponibilite') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success d-inline-block my-4" style="transform: scale(1.5);">
                                <input type="checkbox"
                                       class="custom-control-input"
                                       id="dispoSwitch"
                                       onchange="this.form.submit()"
                                       {{ $inscription->disponible ? 'checked' : '' }}>
                                <label class="custom-control-label fw-bold" for="dispoSwitch">
                                    {{ $inscription->disponible ? 'Disponible' : 'Indisponible' }}
                                </label>
                            </div>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
