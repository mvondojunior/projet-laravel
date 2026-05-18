<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails campagne</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #0d1b2a;
            color: white;
        }

        .card {
            background-color: #1b263b;
            border-radius: 15px;
        }

        .btn-success {
            background-color: #00b4d8;
            border: none;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="card p-4 shadow">

        <h2>{{ $campaign->title }}</h2>
        <p>{{ $campaign->description }}</p>

        <p><strong>Objectif :</strong> {{ $campaign->goal_amount }} FCFA</p>
        <p><strong>Collecté :</strong> {{ $campaign->current_amount }} FCFA</p>

        <!-- Formulaire de don -->
        <form method="POST" action="/donate/{{ $campaign->id }}">
            @csrf

            <div class="mb-3">
                <input type="text" name="donor_name" class="form-control" placeholder="Votre nom">
            </div>

            <div class="mb-3">
                <input type="number" name="amount" class="form-control" placeholder="Montant">
            </div>

            <button type="submit" class="btn btn-success w-100">
                Faire un don
            </button>
        </form>

    </div>
</div>

</body>
</html>