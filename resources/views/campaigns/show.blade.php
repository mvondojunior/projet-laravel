<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $campaign->title }} — DonsCFA</title>

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
            background: rgba(10,22,36,0.95);
            border-bottom: 0.5px solid rgba(255,255,255,0.08);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            gap: 14px;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(8px);
        }

        .nav-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: rgba(255,255,255,0.5);
            font-size: 13px;
            text-decoration: none;
            border: 0.5px solid rgba(255,255,255,0.12);
            border-radius: 8px;
            padding: 6px 14px;
            transition: color 0.2s, border-color 0.2s;
        }
        .nav-back:hover { color: #fff; border-color: rgba(255,255,255,0.3); }

        .nav-brand {
            font-family: 'Lora', serif;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
        }

        /* ── Layout ── */
        .layout {
            max-width: 960px;
            margin: 0 auto;
            padding: 2.5rem 2rem 0;
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 30px;
            align-items: start;
        }

        @media (max-width: 768px) {
            .layout { grid-template-columns: 1fr; }
            .sidebar { order: -1; }
        }

        /* ── Main ── */
        .campaign-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(0,201,167,0.1);
            border: 0.5px solid rgba(0,201,167,0.3);
            border-radius: 20px;
            padding: 4px 14px;
            font-size: 11px;
            color: #00c9a7;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        h1 {
            font-family: 'Lora', serif;
            font-size: 26px;
            font-weight: 600;
            color: #fff;
            line-height: 1.35;
            margin: 0 0 14px;
            letter-spacing: -0.4px;
        }

        .campaign-thumb {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 14px;
            border: 0.5px solid rgba(255,255,255,0.07);
            margin-bottom: 20px;
        }

        .campaign-thumb-placeholder {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #0f2740, #1a4060);
            border-radius: 14px;
            border: 0.5px solid rgba(255,255,255,0.07);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 64px;
        }

        .campaign-desc {
            font-size: 13.5px;
            color: rgba(255,255,255,0.55);
            line-height: 1.8;
            margin-bottom: 24px;
        }

        /* ── Stats ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #0d1e30;
            border: 0.5px solid rgba(255,255,255,0.07);
            border-radius: 10px;
            padding: 14px;
        }

        .stat-value {
            display: block;
            font-size: 17px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 3px;
        }

        .stat-label {
            display: block;
            font-size: 11px;
            color: rgba(255,255,255,0.35);
        }

        /* ── Progress ── */
        .progress-meta {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: rgba(255,255,255,0.4);
            margin-bottom: 8px;
        }

        .progress-meta strong { color: rgba(255,255,255,0.85); font-weight: 500; }
        .progress-meta .pct   { color: #00c9a7; font-weight: 600; }

        .progress-bg {
            background: rgba(255,255,255,0.07);
            border-radius: 99px;
            height: 7px;
            overflow: hidden;
            margin-bottom: 18px;
        }

        .progress-fill {
            height: 100%;
            border-radius: 99px;
            background: linear-gradient(90deg, #00c9a7, #0077ff);
        }

        .donors-hint {
            font-size: 12px;
            color: rgba(255,255,255,0.35);
        }

        /* ── Sidebar / Formulaire ── */
        .form-card {
            background: #0d1e30;
            border: 0.5px solid rgba(255,255,255,0.09);
            border-radius: 16px;
            padding: 1.5rem;
            position: sticky;
            top: 90px;
        }

        .form-title { font-size: 16px; font-weight: 600; color: #fff; margin: 0 0 4px; }
        .form-sub   { font-size: 12px; color: rgba(255,255,255,0.35); margin: 0 0 20px; }

        /* Montants rapides */
        .quick-amounts {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-bottom: 16px;
        }

        .amount-opt {
            padding: 9px 0;
            background: rgba(255,255,255,0.05);
            border: 0.5px solid rgba(255,255,255,0.1);
            border-radius: 8px;
            color: rgba(255,255,255,0.65);
            font-size: 13px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .amount-opt:hover {
            background: rgba(0,201,167,0.12);
            border-color: rgba(0,201,167,0.4);
            color: #00c9a7;
        }

        /* Champs */
        .field       { margin-bottom: 12px; }
        .field label { display: block; font-size: 11.5px; color: rgba(255,255,255,0.45); margin-bottom: 6px; }

        .field input {
            width: 100%;
            background: rgba(255,255,255,0.05);
            border: 0.5px solid rgba(255,255,255,0.12);
            border-radius: 8px;
            padding: 10px 14px;
            color: #fff;
            font-family: 'Sora', sans-serif;
            font-size: 13.5px;
            outline: none;
            transition: border-color 0.2s;
        }

        .field input::placeholder { color: rgba(255,255,255,0.25); }
        .field input:focus        { border-color: rgba(0,201,167,0.5); }

        hr.divider {
            border: none;
            border-top: 0.5px solid rgba(255,255,255,0.07);
            margin: 18px 0;
        }

        /* Erreurs de validation Laravel */
        .error-msg {
            font-size: 11px;
            color: #ff6b6b;
            margin-top: 4px;
        }

        .btn-donate {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #00c9a7, #0077ff);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-family: 'Sora', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 6px;
            transition: opacity 0.2s;
        }
        .btn-donate:hover { opacity: 0.88; }

        .secure-note {
            text-align: center;
            font-size: 11px;
            color: rgba(255,255,255,0.25);
            margin-top: 12px;
        }

        /* Alerte succès */
        .alert-success {
            background: rgba(0,201,167,0.1);
            border: 0.5px solid rgba(0,201,167,0.3);
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 13px;
            color: #00c9a7;
            margin-bottom: 16px;
        }
    </style>
</head>

<body>

<!-- ── Navbar ── -->
<nav>
    <a class="nav-back" href="{{ url()->previous() }}">← Retour</a>
    <a class="nav-brand" href="/">DonsCFA</a>
</nav>

<!-- ── Contenu ── -->
<div class="layout">

    <!-- Colonne principale -->
    <div class="main-col">

        <span class="campaign-tag">
            {{ $campaign->category ?? 'Campagne' }}
        </span>

        <h1>{{ $campaign->title }}</h1>

        @if($campaign->image)
            <img class="campaign-thumb"
                 src="{{ asset('storage/' . $campaign->image) }}"
                 alt="{{ $campaign->title }}">
        @else
            <div class="campaign-thumb-placeholder">🫶</div>
        @endif

        <p class="campaign-desc">{{ $campaign->description }}</p>

        @php
            $percent = $campaign->goal_amount > 0
                ? min(100, round(($campaign->current_amount / $campaign->goal_amount) * 100))
                : 0;
        @endphp

        <!-- Statistiques -->
        <div class="stats-row">
            <div class="stat-card">
                <span class="stat-value">{{ number_format($campaign->current_amount) }}</span>
                <span class="stat-label">FCFA collectés</span>
            </div>
            <div class="stat-card">
                <span class="stat-value">{{ number_format($campaign->goal_amount) }}</span>
                <span class="stat-label">FCFA objectif</span>
            </div>
            <div class="stat-card">
                <span class="stat-value">{{ $campaign->donations()->count() }}</span>
                <span class="stat-label">Donateurs</span>
            </div>
        </div>

        <!-- Barre de progression -->
        <div>
            <div class="progress-meta">
                <span><strong>{{ number_format($campaign->current_amount) }} FCFA</strong> sur {{ number_format($campaign->goal_amount) }} FCFA</span>
                <span class="pct">{{ $percent }}%</span>
            </div>
            <div class="progress-bg">
                <div class="progress-fill" style="width: {{ $percent }}%"></div>
            </div>
        </div>

        <p class="donors-hint">
            👥 {{ $campaign->donations()->count() }} personnes ont déjà soutenu cette campagne
        </p>

    </div>

    <!-- Sidebar : formulaire de don -->
    <div class="sidebar">
        <div class="form-card">

            <p class="form-title">Faire un don</p>
            <p class="form-sub">Choisissez un montant ou saisissez le vôtre</p>

            @if(session('success'))
                <div class="alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <!-- Montants rapides (JS optionnel pour remplir le champ) -->
            <div class="quick-amounts">
                @foreach([1000, 5000, 10000, 25000, 50000] as $preset)
                    <div class="amount-opt" onclick="setAmount({{ $preset }})">
                        {{ number_format($preset) }}
                    </div>
                @endforeach
                <div class="amount-opt" onclick="focusAmount()">Autre</div>
            </div>

            <form method="POST" action="/donate/{{ $campaign->id }}">
                @csrf

                <div class="field">
                    <label for="amount">Montant (FCFA)</label>
                    <input id="amount"
                           type="number"
                           name="amount"
                           min="100"
                           placeholder="Ex : 5 000"
                           value="{{ old('amount') }}"
                           required>
                    @error('amount')
                        <p class="error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="divider">

                <div class="field">
                    <label for="donor_name">Votre nom</label>
                    <input id="donor_name"
                           type="text"
                           name="donor_name"
                           placeholder="Jean Dupont"
                           value="{{ old('donor_name') }}"
                           required>
                    @error('donor_name')
                        <p class="error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="donor_email">Email <span style="opacity:.4">(optionnel)</span></label>
                    <input id="donor_email"
                           type="email"
                           name="donor_email"
                           placeholder="vous@exemple.com"
                           value="{{ old('donor_email') }}">
                    @error('donor_email')
                        <p class="error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-donate">
                    💛 Faire un don maintenant
                </button>

            </form>

            <p class="secure-note">🔒 Paiement sécurisé · Reçu envoyé par email</p>

        </div>
    </div>

</div>

<script>
    function setAmount(val) {
        document.getElementById('amount').value = val;
        document.querySelectorAll('.amount-opt').forEach(el => el.classList.remove('active-opt'));
    }
    function focusAmount() {
        document.getElementById('amount').focus();
        document.getElementById('amount').value = '';
    }
</script>

</body>
</html>