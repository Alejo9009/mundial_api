<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Mundial 2026 - Explorador</title>
    <link rel="shortcut icon" href="https://assets.dev-filo.dift.io/img/2023/05/18/logomundial20269385_sq.jpg" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg:      #06080f;
            --surface: #0c0f1a;
            --card:    #111626;
            --card2:   #161d2e;
            --border:  rgba(255,255,255,0.06);
            --border2: rgba(255,255,255,0.11);
            --red:     #bf2026;
            --red2:    #8f0010;
            --blue:    #002868;
            --blue2:   #001540;
            --green:   #169B62;
            --green2:  #0d6b43;
            --gold:    #F4C12A;
            --gold2:   #c49510;
            --text:    #eef0f8;
            --muted:   #5a6080;
            --muted2:  #8892b0;
        }
        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
        html { scroll-behavior:smooth; }

        body {
            font-family:'DM Sans',sans-serif;
            background:var(--bg);
            color:var(--text);
            min-height:100vh;
            overflow-x:hidden;
        }

        /* ── HERO ──────────────────────────────────── */
        .hero {
            position:relative;
            min-height:520px;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            text-align:center;
            overflow:hidden;
            padding:4rem 1.5rem 3rem;
        }

        /* Bandera tricolor de fondo */
        .hero::before {
            content:'';
            position:absolute; inset:0;
            background:
                linear-gradient(180deg,
                    rgba(0,40,104,0.55) 0%,
                    rgba(6,8,15,0.85) 40%,
                    rgba(6,8,15,0.98) 100%
                ),
                /* campo de fútbol sutil */
                repeating-linear-gradient(0deg, transparent, transparent 59px, rgba(255,255,255,0.02) 59px, rgba(255,255,255,0.02) 60px),
                repeating-linear-gradient(90deg, transparent, transparent 59px, rgba(255,255,255,0.02) 59px, rgba(255,255,255,0.02) 60px);
        }

        /* Círculo central del campo */
        .hero::after {
            content:'';
            position:absolute;
            width:380px; height:380px;
            border:1px solid rgba(255,255,255,0.04);
            border-radius:50%;
            top:50%; left:50%;
            transform:translate(-50%,-50%);
            pointer-events:none;
        }

        /* Franja tricolor izquierda */
        .hero-stripe {
            position:absolute;
            left:0; top:0; bottom:0;
            width:5px;
            background:linear-gradient(180deg, var(--red) 0%, var(--blue) 50%, var(--green) 100%);
        }

        /* Franja tricolor derecha */
        .hero-stripe-r {
            position:absolute;
            right:0; top:0; bottom:0;
            width:5px;
            background:linear-gradient(180deg, var(--red) 0%, var(--blue) 50%, var(--green) 100%);
        }

        .hero-badge {
            position:relative; z-index:2;
            display:inline-flex; align-items:center; gap:0.5rem;
            background:rgba(244,193,42,0.1);
            border:1px solid rgba(244,193,42,0.3);
            border-radius:50px;
            padding:0.35rem 1rem;
            font-size:0.65rem;
            letter-spacing:0.15em;
            text-transform:uppercase;
            color:var(--gold);
            margin-bottom:1.5rem;
        }
        .hero-badge::before { content:'●'; font-size:0.5rem; animation:pulse 1.5s infinite; }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.3} }

        .hero-trophy {
            position:relative; z-index:2;
            font-size:4rem;
            margin-bottom:1rem;
            filter:drop-shadow(0 0 30px rgba(244,193,42,0.4));
        }

        .hero h1 {
            position:relative; z-index:2;
            font-family:'Bebas Neue';
            font-size:clamp(3rem,8vw,6.5rem);
            letter-spacing:0.03em;
            line-height:0.95;
            margin-bottom:0.5rem;
        }
        .hero h1 .line1 { color:#fff; display:block; }
        .hero h1 .line2 {
            display:block;
            background:linear-gradient(90deg, var(--red), var(--gold), var(--green));
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
            background-clip:text;
        }

        .hero-sub {
            position:relative; z-index:2;
            font-size:0.9rem; color:var(--muted2);
            margin-bottom:2.5rem; max-width:500px;
        }

        /* Sedes badges */
        .sedes {
            position:relative; z-index:2;
            display:flex; gap:0.75rem; flex-wrap:wrap; justify-content:center;
            margin-bottom:2.5rem;
        }
        .sede-chip {
            display:flex; align-items:center; gap:0.5rem;
            background:rgba(255,255,255,0.05);
            border:1px solid var(--border2);
            border-radius:50px;
            padding:0.4rem 1rem;
            font-size:0.78rem; font-weight:500;
        }
        .sede-chip .flag { font-size:1.1rem; }

        /* Stats */
        .hero-stats {
            position:relative; z-index:2;
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:1px;
            width:100%; max-width:700px;
            background:var(--border);
            border:1px solid var(--border);
            border-radius:14px;
            overflow:hidden;
        }
        .hero-stat {
            background:rgba(12,15,26,0.9);
            padding:1.25rem 1rem;
            text-align:center;
            transition:background 0.2s;
        }
        .hero-stat:hover { background:rgba(255,255,255,0.04); }
        .hero-stat-num {
            font-family:'Bebas Neue';
            font-size:2.2rem; letter-spacing:0.04em;
            line-height:1;
            background:linear-gradient(135deg,var(--gold),#fff);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
            background-clip:text;
        }
        .hero-stat-label {
            font-size:0.62rem; color:var(--muted);
            text-transform:uppercase; letter-spacing:0.1em;
            margin-top:0.25rem;
        }

        /* ── NAVIGATION ──────────────────────────────── */
        .nav-wrap {
            position:sticky; top:0; z-index:50;
            background:rgba(6,8,15,0.92);
            backdrop-filter:blur(12px);
            border-bottom:1px solid var(--border);
        }
        .nav-inner {
            max-width:1300px; margin:0 auto;
            padding:0 1.5rem;
            display:flex; align-items:center; gap:0;
            overflow-x:auto;
        }
        .nav-inner::-webkit-scrollbar { display:none; }

        .tab-btn {
            flex-shrink:0;
            background:transparent; border:none;
            padding:1rem 1.25rem;
            font-family:'DM Sans'; font-size:0.8rem; font-weight:600;
            color:var(--muted); cursor:pointer;
            border-bottom:2px solid transparent;
            transition:all 0.2s; text-decoration:none;
            display:inline-flex; align-items:center; gap:0.4rem;
        }
        .tab-btn:hover { color:var(--text); }
        .tab-btn.active { color:var(--gold); border-bottom-color:var(--gold); }

        /* ── MAIN CONTENT ────────────────────────────── */
        .main {
            max-width:1300px; margin:0 auto;
            padding:2.5rem 1.5rem;
        }

        .tab-content { display:none; animation:fadeUp 0.3s ease; }
        .tab-content.active { display:block; }
        @keyframes fadeUp {
            from{opacity:0;transform:translateY(10px)}
            to{opacity:1;transform:translateY(0)}
        }

        /* Section header */
        .sec-head {
            display:flex; align-items:flex-end; justify-content:space-between;
            margin-bottom:1.75rem; flex-wrap:wrap; gap:0.75rem;
        }
        .sec-title {
            font-family:'Bebas Neue'; font-size:1.8rem;
            letter-spacing:0.05em; line-height:1;
        }
        .sec-title small {
            display:block;
            font-family:'DM Sans'; font-size:0.72rem;
            color:var(--muted); letter-spacing:0; font-weight:400;
            margin-top:0.2rem;
        }

        /* ── FILTER BAR ───────────────────────────────── */
        .filter-bar {
            display:flex; gap:0.5rem; flex-wrap:wrap; margin-bottom:1.5rem;
        }
        .filter-chip {
            background:var(--card); border:1px solid var(--border2);
            border-radius:50px; padding:0.35rem 1rem;
            font-size:0.72rem; font-weight:600; color:var(--muted);
            cursor:pointer; transition:all 0.15s;
        }
        .filter-chip:hover { color:var(--text); border-color:rgba(255,255,255,0.2); }
        .filter-chip.on { background:rgba(244,193,42,0.12); border-color:var(--gold); color:var(--gold); }

        /* ── PARTICIPANTS GRID ───────────────────────── */
        .participants-grid {
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(200px,1fr));
            gap:1rem;
        }

        .p-card {
            background:var(--card);
            border:1px solid var(--border);
            border-radius:14px;
            padding:1.5rem 1rem 1.25rem;
            text-align:center;
            transition:all 0.25s;
            cursor:default;
            position:relative;
            overflow:hidden;
        }
        .p-card::before {
            content:'';
            position:absolute; left:0; right:0; top:0; height:2px;
            background:linear-gradient(90deg,var(--red),var(--blue),var(--green));
            opacity:0;
            transition:opacity 0.25s;
        }
        .p-card:hover { transform:translateY(-4px); border-color:rgba(255,255,255,0.15); box-shadow:0 12px 32px rgba(0,0,0,0.4); }
        .p-card:hover::before { opacity:1; }

        .p-flag-wrap {
            width:72px; height:72px;
            border-radius:50%;
            background:rgba(255,255,255,0.04);
            border:1px solid var(--border2);
            display:flex; align-items:center; justify-content:center;
            margin:0 auto 1rem; overflow:hidden;
        }
        .p-flag-wrap img {
            width:54px; height:54px; object-fit:contain;
        }
        .p-name {
            font-size:0.85rem; font-weight:700;
            line-height:1.3; margin-bottom:0.5rem;
        }
        .p-confed {
            font-size:0.6rem; font-weight:700;
            letter-spacing:0.1em; text-transform:uppercase;
            padding:2px 8px; border-radius:20px;
            display:inline-block; margin-bottom:0.5rem;
        }
        .c-conmebol { background:rgba(0,40,104,0.3); color:#7da8ff; border:1px solid rgba(0,40,104,0.5); }
        .c-uefa     { background:rgba(0,80,200,0.2); color:#60a5fa; border:1px solid rgba(0,80,200,0.4); }
        .c-concacaf { background:rgba(191,32,38,0.2); color:#fca5a5; border:1px solid rgba(191,32,38,0.4); }
        .c-caf      { background:rgba(244,193,42,0.12); color:var(--gold); border:1px solid rgba(244,193,42,0.3); }
        .c-afc      { background:rgba(22,155,98,0.15); color:#6ee7b7; border:1px solid rgba(22,155,98,0.35); }
        .c-ofc      { background:rgba(120,120,120,0.15); color:#aaa; border:1px solid rgba(255,255,255,0.12); }
        .p-id { font-size:0.58rem; color:var(--muted); margin-top:0.25rem; }

        /* ── STATS TAB ───────────────────────────────── */
        .stats-top {
            display:grid; grid-template-columns:repeat(auto-fit,minmax(160px,1fr));
            gap:1rem; margin-bottom:2rem;
        }
        .kpi {
            background:var(--card); border:1px solid var(--border);
            border-radius:12px; padding:1.25rem;
            text-align:center; transition:border-color 0.2s;
        }
        .kpi:hover { border-color:var(--border2); }
        .kpi-num {
            font-family:'Bebas Neue'; font-size:2.4rem;
            letter-spacing:0.04em; line-height:1;
            color:var(--gold);
        }
        .kpi-label { font-size:0.68rem; color:var(--muted); text-transform:uppercase; letter-spacing:0.08em; margin-top:0.3rem; }

        .confed-grid {
            display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
            gap:1rem; margin-bottom:2rem;
        }
        .confed-row {
            background:var(--card); border:1px solid var(--border);
            border-radius:12px; padding:1rem 1.25rem;
            display:flex; align-items:center; gap:1rem;
            transition:all 0.2s;
        }
        .confed-row:hover { border-color:var(--border2); transform:translateX(3px); }
        .confed-icon { font-size:1.6rem; flex-shrink:0; }
        .confed-info { flex:1; }
        .confed-name-text { font-size:0.85rem; font-weight:600; }
        .confed-bar-wrap {
            width:100%; height:4px; background:var(--card2);
            border-radius:2px; margin-top:0.4rem; overflow:hidden;
        }
        .confed-bar-fill {
            height:100%; border-radius:2px;
            background:linear-gradient(90deg,var(--gold),var(--red));
            transition:width 0.7s ease;
        }
        .confed-num {
            font-family:'Bebas Neue'; font-size:1.8rem;
            letter-spacing:0.04em; color:var(--gold); flex-shrink:0;
        }

        /* Distribucion visual */
        .dist-section { margin-top:1.5rem; }
        .dist-title { font-family:'Bebas Neue'; font-size:1.2rem; letter-spacing:0.06em; margin-bottom:1rem; color:var(--muted2); }
        .dist-cards {
            display:grid; grid-template-columns:repeat(auto-fit,minmax(130px,1fr));
            gap:0.75rem;
        }
        .dist-card {
            background:var(--card); border:1px solid var(--border);
            border-radius:10px; padding:1rem; text-align:center;
        }
        .dist-num { font-family:'Bebas Neue'; font-size:2rem; color:var(--gold); }
        .dist-label { font-size:0.65rem; color:var(--muted); margin-top:0.2rem; text-transform:uppercase; letter-spacing:0.08em; }

        /* ── DOCS TAB ────────────────────────────────── */
        .ep-group {
            border:1px solid var(--border); border-radius:10px;
            overflow:hidden; margin-bottom:0.75rem;
        }
        .ep-head {
            display:flex; align-items:center; gap:0.75rem;
            padding:0.85rem 1.25rem;
            background:var(--card2); cursor:pointer;
            transition:background 0.15s;
        }
        .ep-head:hover { background:rgba(255,255,255,0.04); }
        .ep-emoji { font-size:1rem; }
        .ep-name { font-size:0.88rem; font-weight:700; }
        .ep-tag {
            margin-left:auto;
            font-size:0.6rem; color:var(--muted);
            background:var(--bg); border:1px solid var(--border);
            padding:2px 8px; border-radius:20px;
            font-family:monospace;
        }
        .ep-arr { font-size:0.7rem; color:var(--muted); transition:transform 0.2s; }
        .ep-arr.open { transform:rotate(180deg); }
        .ep-body { display:none; background:var(--card); }
        .ep-body.open { display:block; }
        .route {
            display:flex; align-items:center; gap:0.75rem;
            padding:0.6rem 1.25rem; border-top:1px solid var(--border);
            font-size:0.78rem;
        }
        .route:hover { background:rgba(255,255,255,0.02); }
        .badge {
            font-size:0.6rem; font-weight:700; padding:3px 8px;
            border-radius:4px; min-width:52px; text-align:center;
            letter-spacing:0.05em; font-family:monospace;
        }
        .b-get    { background:rgba(34,197,94,0.12); color:#22c55e; }
        .b-post   { background:rgba(59,130,246,0.12); color:#3b82f6; }
        .b-put    { background:rgba(245,158,11,0.12); color:#f59e0b; }
        .b-delete { background:rgba(239,68,68,0.12);  color:#ef4444; }
        .r-path { font-family:monospace; font-size:0.7rem; flex:1; color:var(--text); }
        .r-desc { color:var(--muted); font-size:0.7rem; }

        .code-wrap {
            background:#060810; border:1px solid var(--border2);
            border-radius:8px; padding:1.25rem;
            font-family:monospace; font-size:0.72rem;
            line-height:1.8; overflow-x:auto;
            margin-top:0.75rem;
        }
        .ck  { color:#F4C12A; } /* key */
        .cs  { color:#fbbf24; } /* string */
        .cn  { color:#60a5fa; } /* number */
        .cc  { color:#4a5070; } /* comment */
        .cf  { color:#169B62; } /* function */

        /* ── LOADING / ERROR ─────────────────────────── */
        .loading-state {
            padding:4rem 2rem; text-align:center;
            color:var(--muted); font-size:0.85rem;
        }
        .loading-state::before {
            content:'⏳'; display:block;
            font-size:2rem; margin-bottom:0.75rem;
        }
        .error-state {
            background:rgba(191,32,38,0.08); border:1px solid rgba(191,32,38,0.2);
            border-radius:10px; padding:1.5rem; text-align:center;
            color:#fca5a5; font-size:0.82rem; margin:1rem 0;
        }

        /* ── FOOTER ──────────────────────────────────── */
        footer {
            border-top:1px solid var(--border);
            padding:2.5rem 1.5rem;
            text-align:center;
        }
        .footer-flags {
            display:flex; justify-content:center; align-items:center; gap:1rem;
            margin-bottom:1rem;
        }
        .footer-flag { font-size:1.8rem; }
        .footer-sep {
            width:1px; height:20px;
            background:var(--border2);
        }
        footer p { font-size:0.72rem; color:var(--muted); }
        footer a { color:var(--gold); text-decoration:none; }
        footer a:hover { text-decoration:underline; }

        /* ── RESPONSIVE ──────────────────────────────── */
        @media(max-width:768px){
            .hero-stats { grid-template-columns:repeat(2,1fr); }
            .participants-grid { grid-template-columns:repeat(auto-fill,minmax(150px,1fr)); }
            .main { padding:1.5rem 1rem; }
        }
        @media(max-width:480px){
            .hero h1 { font-size:3rem; }
            .sedes { gap:0.5rem; }
            .hero-stats { grid-template-columns:repeat(2,1fr); }
        }
    </style>
</head>
<body>

<!-- ══════════ HERO ══════════ -->
<div class="hero">
    <div class="hero-stripe"></div>
    <div class="hero-stripe-r"></div>

    <div class="hero-badge">En vivo · API REST · JSON</div>

    <div class="hero-trophy">🏆</div>

    <h1>
        <span class="line1">FIFA WORLD CUP</span>
        <span class="line2">2026</span>
    </h1>
    <p class="hero-sub">Explorador de datos oficial · Consumiendo la API REST en tiempo real</p>

    <div class="sedes">
        <div class="sede-chip"><span class="flag">🇺🇸</span> Estados Unidos</div>
        <div class="sede-chip"><span class="flag">🇲🇽</span> México</div>
        <div class="sede-chip"><span class="flag">🇨🇦</span> Canadá</div>
    </div>

    <div class="hero-stats">
        <div class="hero-stat">
            <div class="hero-stat-num" id="stat-selecciones">—</div>
            <div class="hero-stat-label">Selecciones</div>
        </div>
        <div class="hero-stat">
            <div class="hero-stat-num" id="stat-confeds">—</div>
            <div class="hero-stat-label">Confederaciones</div>
        </div>
        <div class="hero-stat">
            <div class="hero-stat-num">16</div>
            <div class="hero-stat-label">Estadios sede</div>
        </div>
        <div class="hero-stat">
            <div class="hero-stat-num">104</div>
            <div class="hero-stat-label">Partidos</div>
        </div>
    </div>
</div>

<!-- ══════════ NAV TABS ══════════ -->
<div class="nav-wrap">
    <div class="nav-inner">
        <button class="tab-btn active" onclick="showTab('participantes',this)">⚽ Selecciones</button>
        <button class="tab-btn" onclick="showTab('estadisticas',this)">📊 Estadísticas</button>
        <button class="tab-btn" onclick="showTab('documentacion',this)">📡 API Docs</button>
        <a class="tab-btn" href="../index.php">← Volver</a>
    </div>
</div>

<!-- ══════════ CONTENT ══════════ -->
<div class="main">

    <!-- TAB 1: PARTICIPANTES -->
    <div id="tab-participantes" class="tab-content active">
        <div class="sec-head">
            <div class="sec-title">
                Selecciones clasificadas
                <small>48 equipos · 6 confederaciones · 3 sedes</small>
            </div>
        </div>

        <div class="filter-bar" id="filterBar">
            <button class="filter-chip on" data-filter="ALL" onclick="filtrar(this)">Todas</button>
            <button class="filter-chip" data-filter="UEFA" onclick="filtrar(this)">🇪🇺 UEFA</button>
            <button class="filter-chip" data-filter="CONMEBOL" onclick="filtrar(this)">🌎 CONMEBOL</button>
            <button class="filter-chip" data-filter="Concacaf" onclick="filtrar(this)">🌐 Concacaf</button>
            <button class="filter-chip" data-filter="CAF" onclick="filtrar(this)">🌍 CAF</button>
            <button class="filter-chip" data-filter="AFC" onclick="filtrar(this)">🌏 AFC</button>
            <button class="filter-chip" data-filter="OFC" onclick="filtrar(this)">🏝️ OFC</button>
        </div>

        <div id="participantesGrid" class="participants-grid">
            <div class="loading-state">Conectando con la API…</div>
        </div>
    </div>

    <!-- TAB 2: ESTADÍSTICAS -->
    <div id="tab-estadisticas" class="tab-content">
        <div class="sec-head">
            <div class="sec-title">
                Estadísticas
                <small>Distribución por confederación</small>
            </div>
        </div>
        <div class="stats-top" id="kpiRow">
            <div class="loading-state">Cargando…</div>
        </div>
        <div class="confed-grid" id="confedGrid"></div>
        <div class="dist-section">
            <div class="dist-title">DISTRIBUCIÓN DETALLADA</div>
            <div class="dist-cards" id="distCards"></div>
        </div>
    </div>

    <!-- TAB 3: DOCS -->
    <div id="tab-documentacion" class="tab-content">
        <div class="sec-head">
            <div class="sec-title">
                Documentación API
                <small>Endpoints disponibles · REST · JSON</small>
            </div>
        </div>

        <div class="ep-group">
            <div class="ep-head" onclick="toggleEp(this)">
                <span class="ep-emoji">🌍</span>
                <span class="ep-name">Participantes</span>
                <span class="ep-tag">5 rutas</span>
                <span class="ep-arr">▼</span>
            </div>
            <div class="ep-body">
                <div class="route"><span class="badge b-get">GET</span><span class="r-path">/api/participantes.php</span><span class="r-desc">Listar todos</span></div>
                <div class="route"><span class="badge b-get">GET</span><span class="r-path">/api/participantes.php?id=1</span><span class="r-desc">Ver uno</span></div>
                <div class="route"><span class="badge b-post">POST</span><span class="r-path">/api/participantes.php</span><span class="r-desc">Agregar</span></div>
                <div class="route"><span class="badge b-put">PUT</span><span class="r-path">/api/participantes.php</span><span class="r-desc">Actualizar</span></div>
                <div class="route"><span class="badge b-delete">DELETE</span><span class="r-path">/api/participantes.php?id=1</span><span class="r-desc">Eliminar</span></div>
            </div>
        </div>

 


        <div class="ep-group">
            <div class="ep-head" onclick="toggleEp(this)">
                <span class="ep-emoji">📦</span><span class="ep-name">Ejemplo de respuesta JSON</span>
                <span class="ep-tag">Participante</span><span class="ep-arr">▼</span>
            </div>
            <div class="ep-body" style="padding:1rem 1.25rem">
                <div class="code-wrap">
{<br>
&nbsp;&nbsp;<span class="ck">"success"</span>: <span class="cf">true</span>,<br>
&nbsp;&nbsp;<span class="ck">"data"</span>: [<br>
&nbsp;&nbsp;&nbsp;&nbsp;{<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ck">"id"</span>: <span class="cn">13</span>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ck">"nombre"</span>: <span class="cs">"Argentina"</span>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ck">"confederacion"</span>: <span class="cs">"CONMEBOL"</span>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ck">"escudo_url"</span>: <span class="cs">"https://ejemplo.com/arg.png"</span>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ck">"fecha_creacion"</span>: <span class="cs">"2026-01-01 00:00:00"</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;]<br>
}
                </div>
            </div>
        </div>

        <div class="ep-group">
            <div class="ep-head" onclick="toggleEp(this)">
                <span class="ep-emoji">💻</span><span class="ep-name">Ejemplo de uso · JavaScript Fetch</span>
                <span class="ep-tag">JS</span><span class="ep-arr">▼</span>
            </div>
            <div class="ep-body" style="padding:1rem 1.25rem">
                <div class="code-wrap">
<span class="cc">// Listar todas las selecciones</span><br>
<span class="cf">fetch</span>(<span class="cs">'https://mundialapi2026.rf.gd/api/participantes.php'</span>)<br>
&nbsp;&nbsp;.then(res => res.<span class="cf">json</span>())<br>
&nbsp;&nbsp;.then(data => console.<span class="cf">log</span>(data));<br><br>
<span class="cc">// Agregar selección</span><br>
<span class="cf">fetch</span>(<span class="cs">'https://mundialapi2026.rf.gd/api/participantes.php'</span>, {<br>
&nbsp;&nbsp;method: <span class="cs">'POST'</span>,<br>
&nbsp;&nbsp;headers: { <span class="cs">'Content-Type'</span>: <span class="cs">'application/json'</span> },<br>
&nbsp;&nbsp;body: JSON.<span class="cf">stringify</span>({ nombre: <span class="cs">'Colombia'</span>, confederacion: <span class="cs">'CONMEBOL'</span> })<br>
});
                </div>
            </div>
        </div>
    </div>

</div><!-- /main -->

<!-- ══════════ FOOTER ══════════ -->
<footer>
    <div class="footer-flags">
        <span class="footer-flag">🇺🇸</span>
        <div class="footer-sep"></div>
        <span class="footer-flag">🇲🇽</span>
        <div class="footer-sep"></div>
        <span class="footer-flag">🇨🇦</span>
    </div>
    <p>FIFA World Cup 2026 · API REST · PHP + MySQL</p>
    <p style="margin-top:0.5rem">
        <a href="index.php">📖 Documentación</a> &nbsp;·&nbsp;
    </p>
</footer>

<script>
const API = 'https://mundialapi2026.rf.gd/api/participantes.php';
let allData = [];
let activeFilter = 'ALL';

const CONFED_MAP = {
    'UEFA':'c-uefa','CONMEBOL':'c-conmebol','Concacaf':'c-concacaf',
    'CAF':'c-caf','AFC':'c-afc','OFC':'c-ofc'
};
const CONFED_ICONS = {
    'UEFA':'🇪🇺','CONMEBOL':'🌎','Concacaf':'🌐','CAF':'🌍','AFC':'🌏','OFC':'🏝️'
};

async function init() {
    try {
        const r = await fetch(API);
        const d = await r.json();
        if (!d.success || !d.data) throw new Error('Sin datos');
        allData = d.data;
        document.getElementById('stat-selecciones').textContent = allData.length;
        const confeds = [...new Set(allData.map(p => p.confederacion).filter(Boolean))];
        document.getElementById('stat-confeds').textContent = confeds.length;
        renderCards(allData);
        renderStats(allData);
    } catch(e) {
        document.getElementById('participantesGrid').innerHTML =
            `<div class="error-state">❌ No se pudo conectar con la API<br><small>${e.message}</small></div>`;
    }
}

function renderCards(data) {
    const grid = document.getElementById('participantesGrid');
    if (!data.length) {
        grid.innerHTML = '<div class="error-state">⚠️ Sin resultados para este filtro</div>';
        return;
    }
    grid.innerHTML = data.map(p => {
        const cls = CONFED_MAP[p.confederacion] || 'c-ofc';
        return `<div class="p-card">
            <div class="p-flag-wrap">
                <img src="${esc(p.escudo_url)}"
                     onerror="this.src='https://placehold.co/54x54/111626/F4C12A?text=⚽'"
                     alt="${esc(p.nombre)}">
            </div>
            <div class="p-name">${esc(p.nombre)}</div>
            <div class="p-confed ${cls}">${esc(p.confederacion||'—')}</div>
            <div class="p-id">ID ${p.id}</div>
        </div>`;
    }).join('');
}

function filtrar(btn) {
    document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('on'));
    btn.classList.add('on');
    activeFilter = btn.dataset.filter;
    const filtered = activeFilter === 'ALL'
        ? allData
        : allData.filter(p => p.confederacion === activeFilter);
    renderCards(filtered);
}

function renderStats(data) {
    const stats = {};
    data.forEach(p => { const c = p.confederacion || 'Otro'; stats[c] = (stats[c]||0)+1; });
    const sorted = Object.entries(stats).sort((a,b) => b[1]-a[1]);
    const max = sorted[0]?.[1] || 1;

    // KPIs
    document.getElementById('kpiRow').innerHTML = [
        ['🌍', data.length, 'Selecciones'],
        ['🏅', sorted.length, 'Confederaciones'],
        ['🇺🇸🇲🇽🇨🇦', 3, 'Países sede'],
        ['🏟️', 16, 'Estadios'],
    ].map(([ic,n,l]) => `<div class="kpi">
        <div class="kpi-num">${n}</div>
        <div class="kpi-label">${ic} ${l}</div>
    </div>`).join('');

    // Confed rows
    document.getElementById('confedGrid').innerHTML = sorted.map(([c,n]) => `
        <div class="confed-row">
            <div class="confed-icon">${CONFED_ICONS[c]||'🏆'}</div>
            <div class="confed-info">
                <div class="confed-name-text">${c}</div>
                <div class="confed-bar-wrap">
                    <div class="confed-bar-fill" style="width:${(n/max)*100}%"></div>
                </div>
            </div>
            <div class="confed-num">${n}</div>
        </div>`).join('');

    // Dist cards
    document.getElementById('distCards').innerHTML = sorted.map(([c,n]) => `
        <div class="dist-card">
            <div class="dist-num">${n}</div>
            <div class="dist-label">${CONFED_ICONS[c]||''} ${c}</div>
        </div>`).join('');
}

function showTab(name, btn) {
    document.querySelectorAll('.tab-content').forEach(t=>t.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));
    document.getElementById('tab-'+name).classList.add('active');
    if(btn) btn.classList.add('active');
}

function toggleEp(head) {
    const body = head.nextElementSibling;
    const arr  = head.querySelector('.ep-arr');
    body.classList.toggle('open');
    arr.classList.toggle('open');
}

function esc(s) {
    const d = document.createElement('div');
    d.textContent = s||'';
    return d.innerHTML;
}

init();
</script>
</body>
</html>