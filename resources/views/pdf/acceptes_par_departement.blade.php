<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formateurs Acceptés par Département</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .logo { width: 80px; margin-bottom: 5px; }
        h2 { margin: 5px 0; }
        .date { font-size: 11px; margin-top: 5px; }
        h3 { margin-top: 20px; margin-bottom: 5px; background-color: #f2f2f2; padding: 5px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #e6e6e6; }
        .total { text-align: right; font-weight: bold; margin-bottom: 15px; }
        .footer { text-align: center; font-size: 10px; margin-top: 20px; border-top: 1px solid #000; padding-top: 5px; }
    </style>
</head>
<body>
@php
    $logo = $parametres?->photo 
        ? public_path('uploads/' . $parametres->photo) 
        : public_path('uploads/default.png');

    $siteName = $parametres?->website_name ?? 'MAFLYT SARL';
@endphp

<div class="header">
    <img src="{{ $logo }}" class="logo">
    <h2>{{ $siteName }}</h2>
    <h3>Liste Officielle des spécialités Acceptées</h3>
    <div>Classés par Département</div>
    <div class="date">Généré le : {{ date('d/m/Y') }}</div>
</div>
@php $totalGeneral = 0; @endphp

@foreach($inscriptions as $departement => $list)
    <h3>Département : {{ $departement }}</h3>
    <table>
        <thead>
            <tr>
                <th>Nom complet</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Commune</th>
                <th>Spécialité</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $inscription)
            <tr>
                <td>{{ $inscription->name }}</td>
                <td>{{ $inscription->email }}</td>
                <td>{{ $inscription->numero }}</td>
                <td>{{ $inscription->commune->nom ?? 'N/A' }}</td>
                <td>{{ $inscription->specialite->nom ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total">Total pour {{ $departement }} : {{ $list->count() }}</div>
    @php $totalGeneral += $list->count(); @endphp
@endforeach

<hr>
<div class="total">Total Général des Formateurs Acceptés : {{ $totalGeneral }}</div>

<div class="footer">
    Document généré automatiquement par le système de gestion des candidatures.
</div>
</body>
</html>
