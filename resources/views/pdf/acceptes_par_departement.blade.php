<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Candidatures par Département - {{ date('d/m/Y') }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #4761FF;
            padding-bottom: 10px;
        }

        .logo {
            width: 60px;
            margin-bottom: 10px;
        }

        h2 {
            margin: 0;
            color: #4761FF;
            text-transform: uppercase;
            font-size: 16px;
        }

        .dept-title {
            background-color: #4761FF;
            color: #fff;
            padding: 8px 15px;
            margin-top: 25px;
            margin-bottom: 0;
            font-size: 12px;
            border-radius: 5px 5px 0 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th {
            background-color: #f8f9fa;
            color: #4761FF;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 9px;
            padding: 8px;
            border-bottom: 1px solid #dee2e6;
            text-align: left;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #eee;
            font-size: 9px;
        }

        .total-box {
            text-align: right;
            font-weight: bold;
            margin-bottom: 15px;
            color: #666;
            font-size: 10px;
        }

        .total-gen {
            text-align: right;
            font-weight: bold;
            margin-top: 30px;
            font-size: 14px;
            color: #4761FF;
            border-top: 2px solid #4761FF;
            padding-top: 10px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 8px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 5px;
        }
    </style>
</head>

<body>
    @php
        $logo = $parametres?->photo ? public_path('uploads/' . $parametres->photo) : public_path('uploads/default.png');
        $siteName = $parametres?->website_name ?? 'SYSTEME DE GESTION';
    @endphp

    <div class="header">
        @if(file_exists($logo)) <img src="{{ $logo }}" class="logo"> @endif
        <h2>{{ $siteName }}</h2>
        <h3>Répartition des Candidatures par Département</h3>
        <div style="font-size: 9px; color: #999;">Extraction du {{ date('d/m/Y à H:i') }}</div>
    </div>

    @php $totalGeneral = 0; @endphp

    @foreach($inscriptions as $departement => $list)
        <div class="dept-title">Département : {{ $departement }}</div>
        <table>
            <thead>
                <tr>
                    <th>Nom Complet</th>
                    <th>Email / Tel</th>
                    <th>Commune</th>
                    <th>Spécialité</th>
                    <th style="text-align: center;">Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $inscription)
                    <tr>
                        <td style="font-weight: bold;">{{ $inscription->name }}</td>
                        <td>{{ $inscription->email }}<br>{{ $inscription->numero }}</td>
                        <td>{{ $inscription->commune->nom ?? 'N/A' }}</td>
                        <td>{{ $inscription->specialite->nom ?? 'N/A' }}</td>
                        <td style="text-align: center;">
                            <span
                                style="color: {{ $inscription->statut == 'accepte' ? '#28a745' : ($inscription->statut == 'refuse' ? '#dc3545' : '#ffc107') }}">
                                {{ $inscription->statut == 'en_attente' ? 'ATTENTE' : ($inscription->statut == 'accepte' ? 'ACCEPTE' : 'REFUSE') }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total-box">Total pour {{ $departement }} : {{ $list->count() }} candidate(s)</div>
        @php $totalGeneral += $list->count(); @endphp
    @endforeach

    <div class="total-gen">
        TOTAL GENERAL : {{ $totalGeneral }} Candidatures
    </div>

    <div class="footer">
        Document officiel généré par le système de gestion des inscriptions.
    </div>
</body>

</html>