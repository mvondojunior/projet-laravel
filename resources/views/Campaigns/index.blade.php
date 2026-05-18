<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Plateforme de Dons</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #0d1b2a;
            color: #ffffff;
        }

        .navbar {
            background-color: #1b263b;
        }

        .card {
            background-color: #1b263b;
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .btn-primary {
            background-color: #415a77;
            border: none;
        }

        .progress {
            height: 10px;
        }

        .progress-bar {
            background-color: #00b4d8;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark">
    <div class="container">
        <span class="navbar-brand mb-0 h1"> Plateforme de Dons</span>
    </div>
</nav>

<!-- Contenu -->
<div class="container mt-5">
    <h2 class="mb-4">Campagnes disponibles</h2>

    <div class="row">
        @foreach($campaigns as $campaign)
            <div class="col-md-4 mb-4">
                <div class="card p-3 shadow">
                    <h4>{{ $campaign->title }}</h4>

                    <p>{{ Str::limit($campaign->description, 100) }}</p>

                    <!-- Progression -->
                    @php
                        $percent = ($campaign->current_amount / $campaign->goal_amount) * 100;
                    @endphp

                    <div class="progress mb-2">
                        <div class="progress-bar" style="width: {{ $percent }}%"></div>
                    </div>

                    <p>
                        {{ $campaign->current_amount }} FCFA /
                        {{ $campaign->goal_amount }} FCFA
                    </p>

                    <a href="/campaign/{{ $campaign->id }}" class="btn btn-primary w-100">
                        Voir la campagne
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>