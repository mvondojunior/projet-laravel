<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonsCFA — Plateforme de Dons</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600&family=Lora:wght@400;600&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Sora', sans-serif;
            background: #07111d;
            color: #fff;
            min-height: 100vh;
            padding-bottom: 4rem;
        }

        /* ── Navbar ── */
        nav {
            background: rgba(10, 22, 36, 0.95);
            border-bottom: 0.5px solid rgba(255,255,255,0.08);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(8px);
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #00c9a7, #0077ff);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .nav-logo-name {
            font-family: 'Lora', serif;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            letter-spacing: -0.3px;
        }

        .nav-actions { display: flex; gap: 10px; }

        .btn-outline {
            padding: 7px 18px;
            border: 0.5px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            background: transparent;
            color: rgba(255,255,255,0.75);
            font-family: 'Sora', sans-serif;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
            transition: border-color 0.2s, color 0.2s;
        }
        .btn-outline:hover { border-color: rgba(255,255,255,0.45); color: #fff; }

        .btn-solid {
            padding: 7px 18px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #00c9a7, #0077ff);
            color: #fff;
            font-family: 'Sora', sans-serif;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .btn-solid:hover { opacity: 0.88; }

        /* ── Hero ── */
        .hero {
            max-width: 960px;
            margin: 0 auto;
            padding: 3.5rem 2rem 2rem;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(0,201,167,0.1);
            border: 0.5px solid rgba(0,201,167,0.3);
            border-radius: 20px;
            padding: 4px 14px;
            font-size: 12px;
            color: #00c9a7;
            margin-bottom: 1rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .eyebrow::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #00c9a7;
        }

        .hero h1 {
            font-family: 'Lora', serif;
            font-size: 32px;
            font-weight: 600;
            color: #fff;
            margin: 0 0 0.4rem;
            letter-spacing: -0.5px;
        }

        .hero p {
            font-size: 14px;
            color: rgba(255,255,255,0.45);
            margin: 0 0 2rem;
        }

        .stats {
            display: flex;
            gap: 2.5rem;
            flex-wrap: wrap;
            padding-bottom: 0.5rem;
        }

        .stat-value {
            display: block;
            font-size: 22px;
            font-weight: 600;
            color: #fff;
        }

        .stat-label {
            display: block;
            font-size: 12px;
            color: rgba(255,255,255,0.4);
            margin-top: 2px;
        }

        /* ── Grid ── */
        .campaigns-grid {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        /* ── Card ── */
        .campaign-card {
            background: #0d1e30;
            border: 0.5px solid rgba(255,255,255,0.07);
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.25s ease, border-color 0.25s ease;
        }

        .campaign-card:hover {
            transform: translateY(-4px);
            border-color: rgba(0,201,167,0.25);
        }

        .card-thumb {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-thumb-placeholder {
            width: 100%;
            height: 150px;
            background: linear-gradient(135deg, #0f2740, #1a3d60);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 44px;
        }

        .card-body {
            padding: 1.1rem 1.25rem;
        }

        .card-tag {
            display: inline-block;
            font-size: 11px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 3px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        /* Variantes de tags — à adapter selon vos catégories */
        .tag-sante   { background: rgba(0,201,167,0.12); color: #00c9a7; }
        .tag-educ    { background: rgba(0,119,255,0.12); color: #4da6ff; }
        .tag-env     { background: rgba(80,200,120,0.12); color: #50c878; }
        .tag-social  { background: rgba(200,120,255,0.12); color: #c878ff; }
        .tag-default { background: rgba(255,255,255,0.07); color: rgba(255,255,255,0.5); }

        .card-title {
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            margin: 0 0 6px;
            line-height: 1.4;
        }

        .card-desc {
            font-size: 12.5px;
            color: rgba(255,255,255,0.45);
            line-height: 1.6;
            margin: 0 0 14px;
        }

        /* ── Progress ── */
        .progress-meta {
            display: flex;
            justify-content: space-between;
            font-size: 11.5px;
            color: rgba(255,255,255,0.4);
            margin-bottom: 6px;
        }

        .progress-meta strong {
            color: rgba(255,255,255,0.8);
            font-weight: 500;
        }

        .progress-bg {
            background: rgba(255,255,255,0.07);
            border-radius: 99px;
            height: 5px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 99px;
            background: linear-gradient(90deg, #00c9a7, #0077ff);
        }

        /* ── Card footer ── */
        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 14px;
        }

        .donor-count {
            font-size: 11.5px;
            color: rgba(255,255,255,0.35);
        }

        .btn-card {
            padding: 7px 16px;
            background: rgba(0,201,167,0.1);
            border: 0.5px solid rgba(0,201,167,0.3);
            color: #00c9a7;
            font-family: 'Sora', sans-serif;
            font-size: 12.5px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-card:hover { background: rgba(0,201,167,0.2); }
    </style>
</head>

<body>

<!-- ── Navbar ── -->
<nav>
    <a class="nav-logo" href="/">
        <div class="nav-logo-icon">🤝</div>
        <span class="nav-logo-name">DonsCFA</span>
    </a>
    <div class="nav-actions">
        <a href="/login"    class="btn-outline">Connexion</a>
        <a href="/campaign/create" class="btn-solid">Créer une campagne</a>
    </div>
</nav>

<!-- ── Hero ── -->
<div class="hero">
    <span class="eyebrow">Campagnes actives</span>
    <h1>Soutenez des causes qui comptent</h1>
    <p>Chaque don, grand ou petit, fait une différence.</p>

    <div class="stats">
        <div>
            <span class="stat-value">{{ $campaigns->count() }}</span>
            <span class="stat-label">Campagnes actives</span>
        </div>
        <div>
            <span class="stat-value">{{ number_format($campaigns->sum('current_amount')) }} CFA</span>
            <span class="stat-label">Collectés au total</span>
        </div>
    </div>
</div>

<!-- ── Grille de campagnes ── -->
<div class="campaigns-grid">
    @foreach($campaigns as $campaign)
        @php
            $percent = $campaign->goal_amount > 0
                ? min(100, round(($campaign->current_amount / $campaign->goal_amount) * 100))
                : 0;

            /* Adapter les catégories à votre modèle */
            $tagClass = match($campaign->category ?? '') {
                'sante'   => 'tag-sante',
                'educ'    => 'tag-educ',
                'env'     => 'tag-env',
                'social'  => 'tag-social',
                default   => 'tag-default',
            };
            $tagLabel = match($campaign->category ?? '') {
                'sante'  => 'Santé',
                'educ'   => 'Éducation',
                'env'    => 'Environnement',
                'social' => 'Social',
                default  => 'Divers',
            };
        @endphp

        <div class="campaign-card">

            @if($campaign->image)
                <img class="card-thumb"
                     src="{{ asset('storage/' . $campaign->image) }}"
                     alt="{{ $campaign->title }}">
            @else
                <div class="card-thumb-placeholder">🫶</div>
            @endif

            <div class="card-body">
                <span class="card-tag {{ $tagClass }}">{{ $tagLabel }}</span>

                <h3 class="card-title">{{ $campaign->title }}</h3>
                <p class="card-desc">{{ Str::limit($campaign->description, 110) }}</p>

                <!-- Progression -->
                <div>
                    <div class="progress-meta">
                        <span><strong>{{ number_format($campaign->current_amount) }} CFA</strong></span>
                        <span>{{ $percent }}%</span>
                    </div>
                    <div class="progress-bg">
                        <div class="progress-fill" style="width: {{ $percent }}%"></div>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="donor-count">
                        👥 {{ $campaign->donations_count ?? $campaign->donations()->count() }} donateurs
                    </span>
                    <a href="/campaign/{{ $campaign->id }}" class="btn-card">
                        Voir la campagne →
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>