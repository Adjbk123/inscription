<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Liste des Candidatures - {{ date('d/m/Y') }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #4761FF;
            padding-bottom: 10px;
        }

        .logo {
            width: 70px;
            margin-bottom: 10px;
        }

        h2 {
            margin: 0;
            color: #4761FF;
            text-transform: uppercase;
            font-size: 18px;
        }

        h3 {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }

        .date {
            font-size: 10px;
            color: #999;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f8f9fa;
            color: #4761FF;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 10px;
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 10px;
        }

        .status {
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
            font-size: 12px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 9px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    @php
        $logo = $parametres?->photo
            ? public_path('uploads/' . $parametres->photo)
            : public_path('uploads/default.png');
        $siteName = $parametres?->website_name ?? 'SYSTEME DE GESTION';
    @endphp

    <div class="header">
        @if(file_exists($logo))
            <img src="{{ $logo }}" class="logo">
        @endif
        <h2>{{ $siteName }}</h2>
        <h3>Liste Globale des Candidatures</h3>
        <div class="date">Document officiel généré le : {{ date('d/m/Y à H:i') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nom Complet</th>
                <th>Email & Téléphone</th>
                <th>Localisation</th>
                <th>Spécialité</th>
                <th style="text-align: center;">Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inscriptions as $inscription)
                <tr>
                    <td style="font-weight: bold;">{{ $inscription->name }}</td>
                    <td>
                        {{ $inscription->email }}<br>
                        <span style="color: #666;">{{ $inscription->numero }}</span>
                    </td>
                    <td>
                        {{ $inscription->departement->nom ?? 'N/A' }}<br>
                        <span style="color: #888; font-size: 9px;">{{ $inscription->commune->nom ?? 'N/A' }}</span>
                    </td>
                    <td>{{ $inscription->specialite->nom ?? 'N/A' }}</td>
                    <td style="text-align: center;">
                        <span
                            style="color: {{ $inscription->statut == 'accepte' ? '#28a745' : ($inscription->statut == 'refuse' ? '#dc3545' : '#ffc107') }}">
                            {{ $inscription->statut == 'en_attente' ? 'EN ATTENTE' : ($inscription->statut == 'accepte' ? 'ACCEPTE' : 'REFUSE') }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Nombre total de candidatures : {{ count($inscriptions) }}
    </div>

    <div class="footer">
        Ce document est une extraction automatique du système de gestion des inscriptions.
    </div>
</body>

</html>