<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin · Mundial 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --red:    #c8102e;
            --red2:   #9b0e24;
            --blue:   #003087;
            --blue2:  #001f5b;
            --gold:   #f5a623;
            --gold2:  #d4891a;
            --bg:     #070a12;
            --surface:#0e1220;
            --card:   #131826;
            --border: rgba(255,255,255,0.06);
            --border2:rgba(255,255,255,0.11);
            --text:   #eef0f8;
            --muted:  #6a7190;
            --grass:  #1a7a2e;
        }
        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
        html { scroll-behavior:smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── FIELD LINES BG ─────────────────────────── */
        body::before {
            content:'';
            position:fixed; inset:0;
            background:
                radial-gradient(ellipse 120% 60% at 50% 100%, rgba(26,122,46,0.07) 0%, transparent 60%),
                repeating-linear-gradient(90deg, transparent, transparent 79px, rgba(255,255,255,0.015) 79px, rgba(255,255,255,0.015) 80px);
            pointer-events:none; z-index:0;
        }

        /* ── LAYOUT ─────────────────────────────────── */
        .layout { display:grid; grid-template-columns:240px 1fr; min-height:100vh; position:relative; z-index:1; }

        /* ── SIDEBAR ────────────────────────────────── */
        .sidebar {
            background: var(--surface);
            border-right: 1px solid var(--border);
            display:flex; flex-direction:column;
            position:sticky; top:0; height:200vh; overflow-y:auto;
        }

        .sidebar-top {
            padding: 1.75rem 1.5rem 1.5rem;
            border-bottom: 1px solid var(--border);
        }
        .sidebar-logo {
            display:flex; align-items:center; gap:1.95rem; margin-bottom:2.25rem;
        }
        .logo-ball {
            width:38px; height:38px; border-radius:50%;
            background: linear-gradient(135deg, var(--red), var(--blue));
            display:flex; align-items:center; justify-content:center;
            font-size:1.1rem; flex-shrink:0;
            box-shadow: 0 0 16px rgba(200,16,46,0.35);
        }
        .logo-text { line-height:1.1; }
        .logo-text strong { font-family:'Bebas Neue'; font-size:1.15rem; letter-spacing:0.04em; display:block; }
        .logo-text span { font-size:0.65rem; color:var(--gold); letter-spacing:0.12em; text-transform:uppercase; }

        /* banner image slot */
        .sidebar-banner {
            width:100%; height:110%; aspect-ratio:18/7; border-radius:8px;
            background: var(--card);
            border: 1px dashed rgba(245,166,35,0.3);
            display:flex; align-items:center; justify-content:center;
            overflow:hidden; position:relative;
        }
        .sidebar-banner img { width:100%; height:100%; object-fit:cover; display:none; }
        .sidebar-banner .img-placeholder {
            font-size:0.6rem; color:var(--muted); letter-spacing:0.1em;
            text-transform:uppercase; text-align:center; padding:0.5rem;
        }
        /* Si quieres poner imagen: <img src="TU_URL_AQUI"> dentro de .sidebar-banner */

        .nav { padding:1rem 0.75rem; flex:1; }
        .nav-section-label {
            font-size:0.58rem; letter-spacing:0.16em; text-transform:uppercase;
            color:var(--muted); padding:0 0.75rem; margin:0.5rem 0 0.4rem;
        }
        .nav-btn {
            display:flex; align-items:center; gap:0.65rem;
            width:100%; padding:0.55rem 0.75rem;
            background:transparent; border:none; border-radius:7px;
            color:var(--muted); font-family:'DM Sans'; font-size:0.82rem; font-weight:500;
            cursor:pointer; text-align:left; transition:all 0.15s;
            margin-bottom:2px;
        }
        .nav-btn:hover { background:rgba(255,255,255,0.05); color:var(--text); }
        .nav-btn.active {
            background: linear-gradient(90deg, rgba(200,16,46,0.18), rgba(0,48,135,0.12));
            color: var(--text);
            border-left: 2px solid var(--red);
        }
        .nav-icon { font-size:0.95rem; width:18px; text-align:center; flex-shrink:0; }
        .nav-count {
            margin-left:auto; font-size:0.6rem;
            background:rgba(255,255,255,0.07); border:1px solid var(--border2);
            color:var(--muted); padding:1px 6px; border-radius:20px;
        }
        .nav-divider { height:1px; background:var(--border); margin:0.75rem 0.75rem; }

        .sidebar-footer {
            padding:1rem 1.5rem;
            border-top:1px solid var(--border);
            font-size:0.65rem; color:var(--muted); line-height:1.8;
        }
        .sidebar-footer a { color:var(--gold); text-decoration:none; }

        /* ── MAIN ───────────────────────────────────── */
        .main { display:flex; flex-direction:column; min-height:100vh; }

        /* topbar */
        .topbar {
            padding:0.9rem 2rem;
            border-bottom:1px solid var(--border);
            display:flex; align-items:center; gap:1rem;
            background: rgba(14,18,32,0.8); backdrop-filter:blur(8px);
            position:sticky; top:0; z-index:10;
        }
        .topbar-section {
            font-family:'Bebas Neue'; font-size:1.35rem;
            letter-spacing:0.06em; color:var(--text); flex:1;
        }
        .topbar-section small {
            font-family:'DM Sans'; font-size:0.7rem;
            color:var(--muted); font-weight:400; letter-spacing:0;
            display:block; line-height:1; margin-top:-2px;
        }
        .topbar-actions { display:flex; gap:0.5rem; align-items:center; }
        .btn {
            padding:0.45rem 1rem; border-radius:6px; border:none;
            font-family:'DM Sans'; font-size:0.78rem; font-weight:600;
            cursor:pointer; transition:all 0.15s; text-decoration:none;
            display:inline-flex; align-items:center; gap:0.4rem;
        }
        .btn-primary { background:var(--red); color:#fff; }
        .btn-primary:hover { background:var(--red2); transform:translateY(-1px); }
        .btn-secondary { background:rgba(255,255,255,0.07); color:var(--text); border:1px solid var(--border2); }
        .btn-secondary:hover { background:rgba(255,255,255,0.11); }
        .btn-gold { background:linear-gradient(135deg,var(--gold),var(--gold2)); color:#000; font-weight:700; }
        .btn-gold:hover { opacity:0.88; transform:translateY(-1px); }
        .btn-danger { background:rgba(200,16,46,0.15); color:#f87171; border:1px solid rgba(200,16,46,0.3); }
        .btn-danger:hover { background:rgba(200,16,46,0.25); }
        .btn-warn { background:rgba(245,166,35,0.12); color:var(--gold); border:1px solid rgba(245,166,35,0.3); }
        .btn-warn:hover { background:rgba(245,166,35,0.2); }
        .btn-sm { padding:0.3rem 0.7rem; font-size:0.72rem; }

        /* ── CONTENT ────────────────────────────────── */
        .content { padding:2rem; flex:1; }

        /* section visibility */
        .section { display:none; }
        .active-section { display:block; }

        /* ── HERO BANNER (slot para imagen) ─────────── */
        .hero-banner {
            width:100%; height:100%; border-radius:14px; overflow:hidden;
            background: linear-gradient(135deg, var(--blue2) );
            border:1px solid var(--border2);
            position:relative; margin-bottom:1.75rem;
            min-height:160px;
            display:flex; align-items:flex-end;
        }
        .hero-banner-img {
            position:absolute; inset:0; width:100%; height:110%;
            object-fit:cover;  
        }
        /* Para poner imagen: <img class="hero-banner-img" src="TU_URL_AQUI"> */
        .hero-banner-img-placeholder {
            position:absolute; inset:0;
            display:flex; align-items:center; justify-content:center;
            font-size:1.65rem; color:rgba(255,255,255,0.2);
            letter-spacing:0.12em; text-transform:uppercase;
            border:2px dashed rgba(255,255,255,0.08); border-radius:14px;
            pointer-events:none;
        }
        .hero-banner-content {
            position:relative; z-index:2;
            padding:1.75rem 2rem; width:100%;
        }
        .hero-banner-eyebrow {
            font-size:0.62rem; letter-spacing:0.18em; text-transform:uppercase;
            color:var(--gold); margin-bottom:0.4rem;
            display:flex; align-items:center; gap:0.5rem;
        }
        .hero-banner-eyebrow::before { content:''; width:20px; height:1px; background:var(--gold); }
        .hero-banner h2 {
            font-family:'Bebas Neue'; font-size:2.4rem; letter-spacing:0.05em;
            line-height:1; color:#fff;
        }
        .hero-banner p { font-size:0.8rem; color:rgba(255,255,255,0.55); margin-top:0.3rem; }

        /* ── STATS ROW ───────────────────────────────── */
        .stats-row { display:grid; grid-template-columns:repeat(4,1fr); gap:0.75rem; margin-bottom:1.75rem; }
        .stat-card {
            background:var(--card); border:1px solid var(--border);
            border-radius:10px; padding:1rem 1.25rem;
            display:flex; align-items:center; gap:0.85rem;
            transition:border-color 0.15s;
        }
        .stat-card:hover { border-color:var(--border2); }
        .stat-icon {
            width:38px; height:38px; border-radius:8px;
            display:flex; align-items:center; justify-content:center;
            font-size:1.1rem; flex-shrink:0;
        }
        .stat-icon.red { background:rgba(200,16,46,0.15); }
        .stat-icon.blue { background:rgba(0,48,135,0.2); }
        .stat-icon.gold { background:rgba(245,166,35,0.15); }
        .stat-icon.green { background:rgba(26,122,46,0.2); }
        .stat-num { font-family:'Bebas Neue'; font-size:1.6rem; letter-spacing:0.04em; line-height:1; }
        .stat-label { font-size:0.7rem; color:var(--muted); margin-top:1px; }

        /* ── FORM CARD ───────────────────────────────── */
        .form-card {
            background:var(--card); border:1px solid var(--border);
            border-radius:12px; overflow:hidden; margin-bottom:1.5rem;
        }
        .form-card-header {
            padding:1rem 1.5rem;
            border-bottom:1px solid var(--border);
            display:flex; align-items:center; gap:0.6rem;
        }
        .form-card-header .dot {
            width:8px; height:8px; border-radius:50%; background:var(--red);
            box-shadow:0 0 6px var(--red); flex-shrink:0;
        }
        .form-card-header h3 { font-size:0.85rem; font-weight:600; }
        .form-card-body { padding:1.5rem; }

        .form-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1rem; }
        .form-group { display:flex; flex-direction:column; gap:0.35rem; }
        .form-group label {
            font-size:0.65rem; text-transform:uppercase; letter-spacing:0.1em;
            color:var(--muted); font-weight:600;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            background:rgba(255,255,255,0.04);
            border:1px solid var(--border2);
            border-radius:7px; padding:0.6rem 0.85rem;
            color:var(--text); font-family:'DM Sans'; font-size:0.82rem;
            transition:border-color 0.15s, box-shadow 0.15s;
            width:100%;
        }
        .form-group input:focus,
        .form-group select:focus {
            outline:none; border-color:var(--red);
            box-shadow:0 0 0 3px rgba(200,16,46,0.15);
        }
        .form-group select option { background:#1a1e2e; }
        .form-actions { margin-top:1.25rem; display:flex; gap:0.5rem; }

        /* ── TABLE ───────────────────────────────────── */
        .table-card {
            background:var(--card); border:1px solid var(--border);
            border-radius:12px; overflow:hidden;
        }
        .table-card-header {
            padding:1rem 1.5rem; border-bottom:1px solid var(--border);
            display:flex; align-items:center; justify-content:space-between;
        }
        .table-card-header h3 { font-size:0.85rem; font-weight:600; display:flex; align-items:center; gap:0.5rem; }
        .table-wrap { overflow-x:auto; }
        table { width:100%; border-collapse:collapse; }
        thead th {
            padding:0.65rem 1rem; text-align:left;
            font-size:0.62rem; text-transform:uppercase; letter-spacing:0.1em;
            color:var(--muted); font-weight:600; white-space:nowrap;
            background:rgba(255,255,255,0.02);
            border-bottom:1px solid var(--border);
        }
        tbody td {
            padding:0.7rem 1rem; font-size:0.8rem;
            border-bottom:1px solid var(--border); vertical-align:middle;
        }
        tbody tr:last-child td { border-bottom:none; }
        tbody tr:hover td { background:rgba(255,255,255,0.02); }
        .team-cell { display:flex; align-items:center; gap:0.6rem; }
        .team-logo {
            width:28px; height:28px; border-radius:4px; object-fit:contain;
            background:rgba(255,255,255,0.05); flex-shrink:0;
        }
        .actions-cell { display:flex; gap:0.4rem; }

        /* ── BADGE ───────────────────────────────────── */
        .badge {
            font-size:0.6rem; padding:2px 7px; border-radius:20px;
            font-weight:600; letter-spacing:0.05em; text-transform:uppercase;
        }
        .badge-conmebol { background:rgba(0,48,135,0.25); color:#7da8ff; border:1px solid rgba(0,48,135,0.35); }
        .badge-uefa     { background:rgba(0,80,200,0.2);  color:#60a5fa; border:1px solid rgba(0,80,200,0.3); }
        .badge-concacaf { background:rgba(200,16,46,0.2); color:#f87171; border:1px solid rgba(200,16,46,0.3); }
        .badge-caf      { background:rgba(245,166,35,0.15); color:var(--gold); border:1px solid rgba(245,166,35,0.3); }
        .badge-afc      { background:rgba(26,122,46,0.2); color:#86efac; border:1px solid rgba(26,122,46,0.3); }
        .badge-ofc      { background:rgba(100,100,100,0.2); color:#aaa; border:1px solid rgba(255,255,255,0.15); }

        /* ── GRUPO TABS ──────────────────────────────── */
        .grupos-container { display:flex; flex-direction:column; gap:1rem; }
        .grupo-block { background:var(--card); border:1px solid var(--border); border-radius:10px; overflow:hidden; }
        .grupo-header {
            padding:0.7rem 1rem; background:linear-gradient(90deg,rgba(200,16,46,0.15),rgba(0,48,135,0.15));
            border-bottom:1px solid var(--border);
            display:flex; align-items:center; gap:0.6rem;
        }
        .grupo-letter {
            font-family:'Bebas Neue'; font-size:1.4rem; letter-spacing:0.05em;
            width:32px; text-align:center; color:var(--gold);
        }
        .grupo-header h4 { font-size:0.82rem; font-weight:600; }

        /* ── TORNEO / BRACKET ────────────────────────── */
        .tournament-bracket {
            display:flex; overflow-x:auto; gap:1.5rem;
            padding:1.5rem 0; min-height:480px;
        }
        .round { min-width:260px; display:flex; flex-direction:column; gap:0; }
        .round-title {
            font-family:'Bebas Neue'; font-size:1rem; letter-spacing:0.08em;
            text-align:center; padding:0.6rem 1rem; border-radius:8px;
            margin-bottom:1rem; color:#fff;
        }
        .round-title.dec { background:linear-gradient(135deg,var(--blue2),var(--blue)); }
        .round-title.oct { background:linear-gradient(135deg,#1a3a6e,var(--blue)); }
        .round-title.qua { background:linear-gradient(135deg,var(--red2),#9b1020); }
        .round-title.sem { background:linear-gradient(135deg,#7a0010,var(--red)); }
        .round-title.fin { background:linear-gradient(135deg,var(--gold2),var(--gold)); color:#000; }
        .match {
            background:var(--card); border:1px solid var(--border);
            border-radius:10px; margin-bottom:1rem; overflow:hidden;
            cursor:pointer; transition:all 0.2s;
        }
        .match:hover { border-color:var(--red); box-shadow:0 0 16px rgba(200,16,46,0.2); transform:translateY(-1px); }
        .match-header {
            background:rgba(255,255,255,0.04);
            font-size:0.6rem; padding:5px 10px; text-align:center;
            color:var(--muted); letter-spacing:0.08em; text-transform:uppercase;
            border-bottom:1px solid var(--border);
        }
        .team-row {
            display:flex; align-items:center; gap:0.6rem;
            padding:0.6rem 0.85rem; border-bottom:1px solid var(--border);
        }
        .team-row:last-of-type { border-bottom:none; }
        .team-row.winner { background:rgba(26,122,46,0.1); border-left:3px solid #22c55e; }
        .team-row img { width:22px; height:22px; object-fit:contain; }
        .team-row .tname { flex:1; font-size:0.75rem; font-weight:500; }
        .team-row .tscore {
            font-family:'Bebas Neue'; font-size:1rem; letter-spacing:0.05em;
            background:rgba(255,255,255,0.07); padding:2px 8px; border-radius:4px;
        }
        .match-footer {
            font-size:0.6rem; padding:4px 10px; text-align:center;
            letter-spacing:0.05em;
        }
        .match-footer.pending { color:var(--muted); }
        .match-footer.done { color:#22c55e; }
        .empty-match {
            background:rgba(255,255,255,0.02); border:1px dashed var(--border);
            border-radius:10px; padding:1.5rem; text-align:center;
            font-size:0.72rem; color:var(--muted); margin-bottom:1rem;
        }

        /* best-third */
        .best-third {
            background:var(--card); border:1px solid var(--border);
            border-radius:12px; padding:1.25rem 1.5rem; margin-bottom:1.5rem;
        }
        .best-third h4 {
            font-family:'Bebas Neue'; font-size:1rem; letter-spacing:0.06em;
            color:var(--gold); margin-bottom:0.75rem;
        }
        .best-third-list { display:flex; flex-wrap:wrap; gap:0.5rem; }
        .third-chip {
            background:rgba(255,255,255,0.05); border:1px solid var(--border2);
            border-radius:20px; padding:0.35rem 0.85rem;
            display:flex; align-items:center; gap:0.5rem;
            font-size:0.72rem;
        }
        .third-chip img { width:18px; height:18px; object-fit:contain; }

        /* third-place section */
        .third-place-section {
            background:var(--card); border:1px solid var(--border);
            border-radius:12px; padding:1.5rem; margin-top:1.5rem; text-align:center;
        }
        .third-place-section h3 {
            font-family:'Bebas Neue'; font-size:1.3rem; letter-spacing:0.06em;
            color:#cd7f32; margin-bottom:1rem;
        }
        .champion-badge {
            display:inline-flex; align-items:center; gap:0.6rem;
            background:linear-gradient(135deg,var(--gold),var(--gold2));
            color:#000; padding:0.75rem 1.5rem; border-radius:50px;
            font-family:'Bebas Neue'; font-size:1.15rem; letter-spacing:0.08em;
            margin-top:1rem; box-shadow:0 0 24px rgba(245,166,35,0.4);
        }

        /* ── MODAL ───────────────────────────────────── */
        .modal {
            display:none; position:fixed; inset:0; z-index:1000;
            background:rgba(0,0,0,0.7); backdrop-filter:blur(4px);
            align-items:center; justify-content:center;
        }
        .modal.open { display:flex; }
        .modal-box {
            background:var(--surface); border:1px solid var(--border2);
            border-radius:16px; padding:2rem; width:90%; max-width:480px;
            position:relative; animation:popIn 0.2s ease;
        }
        @keyframes popIn {
            from { opacity:0; transform:scale(0.95) translateY(10px); }
            to   { opacity:1; transform:scale(1) translateY(0); }
        }
        .modal-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem; }
        .modal-header h2 { font-family:'Bebas Neue'; font-size:1.3rem; letter-spacing:0.05em; }
        .modal-close {
            width:28px; height:28px; background:rgba(255,255,255,0.07);
            border:none; border-radius:6px; color:var(--muted);
            cursor:pointer; font-size:1rem; display:flex; align-items:center; justify-content:center;
            transition:all 0.15s;
        }
        .modal-close:hover { background:rgba(200,16,46,0.2); color:var(--red); }

        /* score modal */
        .score-duel { display:flex; align-items:center; gap:1rem; margin:1.5rem 0; }
        .score-team { flex:1; text-align:center; }
        .score-team-logo {
            width:52px; height:52px; border-radius:8px; object-fit:contain;
             margin:0 auto 0.5rem; display:block;
        }
        .score-team-name { font-size:0.72rem; color:var(--muted); margin-bottom:0.5rem; }
        .score-team input {
            width:72px; height:52px; text-align:center;
            font-family:'Bebas Neue'; font-size:2rem; letter-spacing:0.04em;
            background:rgba(255,255,255,0.05); border:1px solid var(--border2);
            border-radius:10px; color:var(--text); margin:0 auto; display:block;
        }
        .score-team input:focus { outline:none; border-color:var(--red); box-shadow:0 0 0 3px rgba(200,16,46,0.15); }
        .score-vs {
            font-family:'Bebas Neue'; font-size:1.5rem; color:var(--muted);
            letter-spacing:0.08em; flex-shrink:0;
        }
        .score-actions { display:flex; gap:0.5rem; justify-content:center; margin-top:0.5rem; }

        /* loading/error */
        .loading { padding:3rem; text-align:center; color:var(--muted); font-size:0.85rem; }
        .loading::before { content:'⏳'; display:block; font-size:2rem; margin-bottom:0.5rem; }
        .error-msg {
            background:rgba(200,16,46,0.1); border:1px solid rgba(200,16,46,0.3);
            border-radius:10px; padding:1.25rem; font-size:0.82rem;
            color:#f87171; text-align:center;
        }

        /* ── SCROLLBAR ───────────────────────────────── */
        ::-webkit-scrollbar { width:4px; height:4px; }
        ::-webkit-scrollbar-track { background:transparent; }
        ::-webkit-scrollbar-thumb { background:rgba(255,255,255,0.1); border-radius:2px; }

        /* ── FADE IN ─────────────────────────────────── */
        @keyframes fadeUp {
            from { opacity:0; transform:translateY(12px); }
            to   { opacity:1; transform:translateY(0); }
        }
        .active-section { animation:fadeUp 0.3s ease; }

        /* ── RESPONSIVE ──────────────────────────────── */
        @media(max-width:900px) {
            .layout { grid-template-columns:1fr; }
            .sidebar { display:none; }
            .stats-row { grid-template-columns:repeat(2,1fr); }
            .content { padding:1rem; }
        }

        /* IMG SLOT HELPER ─────────────────────────────── */
        /* 
           CÓMO PONER IMÁGENES:
           1) Hero banner: busca <img class="hero-banner-img" ...>
              Cambia display:none → display:block y pon src="TU_URL"
           2) Sidebar banner: busca <img src="TU_URL_AQUI" ...> en .sidebar-banner
           3) Escudos en tablas: vienen del JS (data.escudo_url de la API)
        */
    </style>
</head>
<body>
<div class="layout">

  <!-- ══════════════════════ SIDEBAR ══════════════════════ -->
  <aside class="sidebar">
    <div class="sidebar-top">
      <div class="sidebar-logo">
        <div class="logo-ball">⚽</div>
        <div class="logo-text">
          <strong>MUNDIAL 2026</strong>
          <span>Panel Admin</span>
        </div>
      </div>
      <!-- SLOT IMAGEN SIDEBAR: pon tu URL en src="" y borra el style display:none -->
      <div class="sidebar-banner">
        <img src="https://a2.espncdn.com/combiner/i?img=%2Fi%2Fleaguelogos%2Fsoccer%2F500%2F4.png" alt="Banner" style="display:block" height="10" width="10">
        <div class="img-placeholder"></div>
      </div>
    </div>
    <br>
    <br>
    <br>


    <nav class="nav">
      <div class="nav-section-label">Gestión</div>
      <button class="nav-btn active" onclick="showSection('participantes', this)">
        <span class="nav-icon">🌍</span> Participantes <span class="nav-count" id="cnt-part">—</span>
      </button>
      <button class="nav-btn" onclick="showSection('convocados', this)">
        <span class="nav-icon">👕</span> Convocados <span class="nav-count" id="cnt-conv">—</span>
      </button>
      <button class="nav-btn" onclick="showSection('grupos', this)">
        <span class="nav-icon">📊</span> Grupos
      </button>
      <button class="nav-btn" onclick="showSection('estadios', this)">
        <span class="nav-icon">🏟️</span> Estadios <span class="nav-count" id="cnt-est">—</span>
      </button>
      <button class="nav-btn" onclick="showSection('partidos', this)">
        <span class="nav-icon">📅</span> Partidos <span class="nav-count" id="cnt-par">—</span>
      </button>

      <div class="nav-divider"></div>
      <div class="nav-section-label">Estadísticas</div>
      <button class="nav-btn" onclick="showSection('campeones', this)">
        <span class="nav-icon">🏆</span> Campeones
      </button>
      <button class="nav-btn" onclick="showSection('goleadores', this)">
        <span class="nav-icon">⚽</span> Goleadores
      </button>
      <button class="nav-btn" onclick="showSection('asistentes', this)">
        <span class="nav-icon">🎯</span> Asistentes
      </button>

      <div class="nav-divider"></div>
      <div class="nav-section-label">Torneo</div>
      <button class="nav-btn" onclick="showSection('eliminatorias', this)" style="color:var(--gold)">
        <span class="nav-icon">🏅</span> Eliminatorias
      </button>

      <div class="nav-divider"></div>
      <a href="../index.php" class="nav-btn" style="color:var(--muted)">
        <span class="nav-icon">←</span> Volver al inicio
      </a>
    </nav>

    <div class="sidebar-footer">
      USA · CANADA · MEXICO<br>
      <a href="https://mundialapi2026.rf.gd/api/" target="_blank">API pública →</a>
    </div>
  </aside>

  <!-- ══════════════════════ MAIN ══════════════════════ -->
  <div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
      <div class="topbar-section" id="topbar-title">
        Participantes
        <small>Selecciones clasificadas al Mundial 2026</small>
      </div>
      <div class="topbar-actions" id="topbar-actions"></div>
    </div>

    <div class="content">

      <!-- ── MODALES ─────────────────────────────────── -->
      <div id="editModal" class="modal">
        <div class="modal-box">
          <div class="modal-header">
            <h2 id="modalTitle">Editar</h2>
            <button class="modal-close" onclick="closeModal()">✕</button>
          </div>
          <form id="editForm">
            <input type="hidden" id="edit_id">
            <input type="hidden" id="edit_tabla">
            <div id="editFields" class="form-grid"></div>
            <div class="form-actions" style="margin-top:1.5rem">
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
              <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancelar</button>
            </div>
          </form>
        </div>
      </div>

      <div id="scoreModal" class="modal">
        <div class="modal-box">
          <div class="modal-header">
            <h2 id="scoreModalTitle">Resultado</h2>
            <button class="modal-close" onclick="closeScoreModal()">✕</button>
          </div>
          <div class="score-duel">
            <div class="score-team">
              <img id="localLogo" class="score-team-logo" src="" onerror="this.style.opacity=0">
              <div class="score-team-name" id="localTeamLabel">Local</div>
              <input type="number" id="localScore" min="0" value="0">
            </div>
            <div class="score-vs">VS</div>
            <div class="score-team">
              <img id="visitanteLogo" class="score-team-logo" src="" onerror="this.style.opacity=0">
              <div class="score-team-name" id="visitanteTeamLabel">Visitante</div>
              <input type="number" id="visitanteScore" min="0" value="0">
            </div>
          </div>
          <div class="score-actions">
            <button class="btn btn-primary" onclick="guardarResultado()">✅ Confirmar</button>
            <button class="btn btn-secondary" onclick="closeScoreModal()">Cancelar</button>
          </div>
        </div>
      </div>

      <!-- ══════════ SECCIONES ══════════ -->

      <!-- PARTICIPANTES -->
      <div id="participantes" class="section active-section">
        <!-- SLOT IMAGEN HERO -->
        <div class="hero-banner">
          <!-- Para imagen de fondo: quita display:none y pon tu URL -->
          <img class="hero-banner-img" src="https://d3sc99wzehqi2v.cloudfront.net/images/notas/nota_17750063270442_986.jpg" alt="" style="display:block">
          <div class="hero-banner-img-placeholder"></div>
          <div class="hero-banner-content">
            <div class="hero-banner-eyebrow">Mundial 2026</div>
            <h2>SELECCIONES</h2>
            <p>Gestiona las 48 selecciones clasificadas al torneo</p>
          </div>
        </div>

        <div class="stats-row">
          <div class="stat-card">
            <div class="stat-icon red">🌍</div>
            <div><div class="stat-num" id="total-participantes">—</div><div class="stat-label">Selecciones</div></div>
          </div>
          <div class="stat-card">
            <div class="stat-icon blue">🏅</div>
            <div><div class="stat-num">6</div><div class="stat-label">Confederaciones</div></div>
          </div>
          <div class="stat-card">
            <div class="stat-icon gold">📍</div>
            <div><div class="stat-num">3</div><div class="stat-label">Países sede</div></div>
          </div>
          <div class="stat-card">
            <div class="stat-icon green">🏟️</div>
            <div><div class="stat-num">16</div><div class="stat-label">Estadios</div></div>
          </div>
        </div>

        <div class="form-card">
          <div class="form-card-header">
            <div class="dot"></div>
            <h3>Agregar selección</h3>
          </div>
          <div class="form-card-body">
            <form id="formParticipante">
              <div class="form-grid">
                <div class="form-group">
                  <label>Nombre del país</label>
                  <input type="text" id="part_nombre" placeholder="ej. Colombia" required>
                </div>
                <div class="form-group">
                  <label>Confederación</label>
                  <select id="part_confed">
                    <option value="">Seleccionar</option>
                    <option value="CONMEBOL">CONMEBOL</option>
                    <option value="UEFA">UEFA</option>
                    <option value="Concacaf">Concacaf</option>
                    <option value="CAF">CAF</option>
                    <option value="AFC">AFC</option>
                    <option value="OFC">OFC</option>
                  </select>
                </div>
                <div class="form-group" style="grid-column:1/-1">
                  <label>URL del escudo</label>
                  <input type="url" id="part_escudo" placeholder="https://ejemplo.com/escudo.png">
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">+ Agregar</button>
              </div>
            </form>
          </div>
        </div>

        <div class="table-card">
          <div class="table-card-header">
            <h3>📋 Lista de selecciones</h3>
          </div>
          <div class="table-wrap">
            <table id="tablaParticipantes">
              <thead><tr><th>#</th><th>Selección</th><th>Confederación</th><th>Acciones</th></tr></thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- CONVOCADOS -->
      <div id="convocados" class="section">
        <div class="form-card">
          <div class="form-card-header"><div class="dot"></div><h3>Agregar jugador convocado</h3></div>
          <div class="form-card-body">
            <form id="formJugador">
              <div class="form-grid">
                <div class="form-group"><label>Nombre</label><input type="text" id="jug_nombre" placeholder="Nombre completo" required></div>
                <div class="form-group"><label>Selección</label><select id="jug_seleccion"></select></div>
                <div class="form-group"><label>Posición</label><input type="text" id="jug_posicion" placeholder="Portero / Defensa…"></div>
                <div class="form-group"><label>Dorsal</label><input type="number" id="jug_dorsal" placeholder="10" min="1" max="99"></div>
                <div class="form-group" style="grid-column:1/-1"><label>URL foto</label><input type="url" id="jug_escudo" placeholder="https://…"></div>
              </div>
              <div class="form-actions"><button type="submit" class="btn btn-primary">+ Agregar</button></div>
            </form>
          </div>
        </div>
        <div class="table-card">
          <div class="table-card-header"><h3>👕 Jugadores convocados</h3></div>
          <div class="table-wrap">
            <table id="tablaConvocados">
              <thead><tr><th>#</th><th>Jugador</th><th>Selección</th><th>Posición</th><th>Dorsal</th><th>Acciones</th></tr></thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- GRUPOS -->
      <div id="grupos" class="section">
        <div class="form-card">
          <div class="form-card-header"><div class="dot"></div><h3>Asignar equipo a grupo</h3></div>
          <div class="form-card-body">
            <form id="formGrupo">
              <div class="form-grid">
                <div class="form-group">
                  <label>Grupo</label>
                  <select id="grupo_nombre">
                    <option value="A">Grupo A</option><option value="B">Grupo B</option>
                    <option value="C">Grupo C</option><option value="D">Grupo D</option>
                    <option value="E">Grupo E</option><option value="F">Grupo F</option>
                    <option value="G">Grupo G</option><option value="H">Grupo H</option>
                    <option value="I">Grupo I</option><option value="J">Grupo J</option>
                    <option value="K">Grupo K</option><option value="L">Grupo L</option>
                  </select>
                </div>
                <div class="form-group"><label>Selección</label><select id="grupo_seleccion"></select></div>
                <div class="form-group"><label>Puntos</label><input type="number" id="grupo_puntos" value="0" min="0"></div>
              </div>
              <div class="form-actions"><button type="submit" class="btn btn-primary">+ Asignar</button></div>
            </form>
          </div>
        </div>
        <div id="gruposContainer" class="grupos-container"></div>
      </div>

      <!-- CAMPEONES -->
      <div id="campeones" class="section">
        <div class="form-card">
          <div class="form-card-header"><div class="dot"></div><h3>Registrar campeón</h3></div>
          <div class="form-card-body">
            <form id="formCampeon">
              <div class="form-grid">
                <div class="form-group"><label>Año</label><input type="number" id="camp_anio" placeholder="2026" required></div>
                <div class="form-group"><label>Selección</label><select id="camp_seleccion"></select></div>
                <div class="form-group" style="grid-column:1/-1"><label>URL escudo</label><input type="url" id="camp_escudo" placeholder="https://…"></div>
              </div>
              <div class="form-actions"><button type="submit" class="btn btn-gold">🏆 Registrar</button></div>
            </form>
          </div>
        </div>
        <div class="table-card">
          <div class="table-card-header"><h3>🏆 Historial de campeones</h3></div>
          <div class="table-wrap">
            <table id="tablaCampeones">
              <thead><tr><th>Año</th><th>Selección</th><th>Escudo</th><th>Acciones</th></tr></thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- GOLEADORES -->
      <div id="goleadores" class="section">
        <div class="form-card">
          <div class="form-card-header"><div class="dot"></div><h3>Registrar goleador</h3></div>
          <div class="form-card-body">
            <form id="formGoleador">
              <div class="form-grid">
                <div class="form-group"><label>Jugador</label><input type="text" id="gol_jugador" placeholder="Nombre" required></div>
                <div class="form-group"><label>Selección</label><select id="gol_seleccion"></select></div>
                <div class="form-group"><label>Goles</label><input type="number" id="gol_goles" placeholder="0" required></div>
                <div class="form-group"><label>Año</label><input type="number" id="gol_anio" placeholder="2026" required></div>
                <div class="form-group" style="grid-column:1/-1"><label>URL foto</label><input type="url" id="gol_escudo" placeholder="https://…"></div>
              </div>
              <div class="form-actions"><button type="submit" class="btn btn-primary">+ Registrar</button></div>
            </form>
          </div>
        </div>
        <div class="table-card">
          <div class="table-card-header"><h3>⚽ Máximos goleadores</h3></div>
          <div class="table-wrap">
            <table id="tablaGoleadores">
              <thead><tr><th>Jugador</th><th>Selección</th><th>Goles</th><th>Año</th><th>Acciones</th></tr></thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ASISTENTES -->
      <div id="asistentes" class="section">
        <div class="form-card">
          <div class="form-card-header"><div class="dot"></div><h3>Registrar asistente</h3></div>
          <div class="form-card-body">
            <form id="formAsistente">
              <div class="form-grid">
                <div class="form-group"><label>Jugador</label><input type="text" id="asi_jugador" placeholder="Nombre" required></div>
                <div class="form-group"><label>Selección</label><select id="asi_seleccion"></select></div>
                <div class="form-group"><label>Asistencias</label><input type="number" id="asi_asistencias" placeholder="0" required></div>
                <div class="form-group"><label>Año</label><input type="number" id="asi_anio" placeholder="2026" required></div>
                <div class="form-group" style="grid-column:1/-1"><label>URL foto</label><input type="url" id="asi_escudo" placeholder="https://…"></div>
              </div>
              <div class="form-actions"><button type="submit" class="btn btn-primary">+ Registrar</button></div>
            </form>
          </div>
        </div>
        <div class="table-card">
          <div class="table-card-header"><h3>🎯 Máximos asistentes</h3></div>
          <div class="table-wrap">
            <table id="tablaAsistentes">
              <thead><tr><th>Jugador</th><th>Selección</th><th>Asistencias</th><th>Año</th><th>Acciones</th></tr></thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ESTADIOS -->
      <div id="estadios" class="section">
        <div class="form-card">
          <div class="form-card-header"><div class="dot"></div><h3>Agregar estadio</h3></div>
          <div class="form-card-body">
            <form id="formEstadio">
              <div class="form-grid">
                <div class="form-group"><label>Nombre</label><input type="text" id="est_nombre" placeholder="Estadio…" required></div>
                <div class="form-group"><label>Ciudad</label><input type="text" id="est_ciudad" placeholder="Ciudad, País" required></div>
                <div class="form-group"><label>Capacidad</label><input type="number" id="est_capacidad" placeholder="60000" required></div>
              </div>
              <div class="form-actions"><button type="submit" class="btn btn-primary">+ Agregar</button></div>
            </form>
          </div>
        </div>
        <div class="table-card">
          <div class="table-card-header"><h3>🏟️ Estadios</h3></div>
          <div class="table-wrap">
            <table id="tablaEstadios">
              <thead><tr><th>Nombre</th><th>Ciudad</th><th>Capacidad</th><th>Acciones</th></tr></thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- PARTIDOS -->
      <div id="partidos" class="section">
        <div class="form-card">
          <div class="form-card-header"><div class="dot"></div><h3>Programar partido</h3></div>
          <div class="form-card-body">
            <form id="formPartido">
              <div class="form-grid">
                <div class="form-group"><label>Equipo local</label><select id="par_local" required></select></div>
                <div class="form-group"><label>Equipo visitante</label><select id="par_visitante" required></select></div>
                <div class="form-group"><label>Fecha</label><input type="date" id="par_fecha" required></div>
                <div class="form-group"><label>Hora</label><input type="time" id="par_hora" required></div>
                <div class="form-group"><label>Estadio</label><select id="par_estadio" required></select></div>
                <div class="form-group"><label>Fase</label><input type="text" id="par_fase" placeholder="GRUPOS / FINAL…"></div>
              </div>
              <div class="form-actions"><button type="submit" class="btn btn-primary">+ Programar</button></div>
            </form>
          </div>
        </div>
        <div class="table-card">
          <div class="table-card-header"><h3>📅 Calendario</h3></div>
          <div class="table-wrap">
            <table id="tablaPartidos">
              <thead><tr><th>Local</th><th>Visitante</th><th>Fecha</th><th>Hora</th><th>Estadio</th><th>Fase</th><th>Acciones</th></tr></thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ELIMINATORIAS -->
      <div id="eliminatorias" class="section">
        <div style="display:flex;gap:0.75rem;margin-bottom:1.5rem;flex-wrap:wrap;align-items:center">
          <button class="btn btn-secondary" onclick="cargarEliminatorias()">🔄 Actualizar desde grupos</button>
          <button class="btn btn-warn" onclick="reiniciarTorneo()">↺ Reiniciar torneo</button>
          <span style="font-size:0.75rem;color:var(--muted)">Haz clic en cualquier partido para ingresar el resultado</span>
        </div>
        <div id="tournamentContainer"><div class="loading">Cargando cuadro del torneo…</div></div>
      </div>

    </div><!-- /content -->
  </div><!-- /main -->
</div><!-- /layout -->

<script>
// ─── CONFIG ──────────────────────────────────────
const API_BASE = '../api/';

// ─── STATE ───────────────────────────────────────
let tournamentData = { dieciseisavos:[], octavos:[], cuartos:[], semifinales:[], final:null, tercerPuesto:null, campeon:null };
let participantesMap = {};
let currentMatchId   = null;
let gruposOriginales = null;

const SECTION_TITLES = {
  participantes: ['Participantes','Selecciones clasificadas al Mundial 2026'],
  convocados:    ['Convocados','Jugadores por selección'],
  grupos:        ['Grupos','Tabla de grupos · Mundial 2026'],
  campeones:     ['Campeones','Historial de campeones mundiales'],
  goleadores:    ['Goleadores','Máximos goleadores por edición'],
  asistentes:    ['Asistentes','Máximos asistentes por edición'],
  estadios:      ['Estadios','Sedes del Mundial 2026'],
  partidos:      ['Calendario','Programación de partidos'],
  eliminatorias: ['Eliminatorias','Cuadro del torneo · Mundial 2026'],
};

// ─── NAV ─────────────────────────────────────────
function showSection(section, btn) {
  document.querySelectorAll('.section').forEach(s=>s.classList.remove('active-section'));
  document.getElementById(section).classList.add('active-section');
  document.querySelectorAll('.nav-btn').forEach(b=>b.classList.remove('active'));
  if(btn) btn.classList.add('active');
  const [title,sub] = SECTION_TITLES[section]||[section,''];
  document.getElementById('topbar-title').innerHTML = `${title}<small>${sub}</small>`;
  cargarDatos(section);
  if(section==='eliminatorias') cargarEliminatorias();
}

async function cargarDatos(section) {
  switch(section) {
    case 'participantes': await cargarParticipantes(); break;
    case 'convocados':    await cargarConvocados(); await cargarSelect('jug_seleccion'); break;
    case 'grupos':        await cargarGrupos(); await cargarSelect('grupo_seleccion'); break;
    case 'campeones':     await cargarCampeones(); await cargarSelect('camp_seleccion'); break;
    case 'goleadores':    await cargarGoleadores(); await cargarSelect('gol_seleccion'); break;
    case 'asistentes':    await cargarAsistentes(); await cargarSelect('asi_seleccion'); break;
    case 'estadios':      await cargarEstadios(); break;
    case 'partidos':      await cargarPartidos(); await cargarSelect('par_local'); await cargarSelect('par_visitante'); await cargarSelectEstadios(); break;
  }
}

// ─── PARTICIPANTES ───────────────────────────────
async function cargarParticipantes() {
  const data = await get('participantes.php');
  if(!data.success) return;
  document.getElementById('total-participantes').textContent = data.data.length;
  document.getElementById('cnt-part').textContent = data.data.length;
  const tbody = document.querySelector('#tablaParticipantes tbody');
  tbody.innerHTML = '';
  data.data.forEach((p,i) => {
    const confBadge = confBadgeClass(p.confederacion);
    tbody.innerHTML += `<tr>
      <td style="color:var(--muted);font-size:0.7rem">${i+1}</td>
      <td><div class="team-cell">
        <img class="team-logo" src="${p.escudo_url||''}" onerror="this.style.opacity=0">
        <span>${p.nombre}</span>
      </div></td>
      <td><span class="badge ${confBadge}">${p.confederacion||'—'}</span></td>
      <td class="actions-cell">
        <button class="btn btn-warn btn-sm" onclick="editarParticipante(${p.id})">✏️</button>
        <button class="btn btn-danger btn-sm" onclick="eliminar('participantes',${p.id})">🗑️</button>
      </td>
    </tr>`;
  });
}

function confBadgeClass(c=''){
  const m = {'CONMEBOL':'badge-conmebol','UEFA':'badge-uefa','Concacaf':'badge-concacaf','CAF':'badge-caf','AFC':'badge-afc','OFC':'badge-ofc'};
  return m[c]||'badge-ofc';
}

// ─── CONVOCADOS ──────────────────────────────────
async function cargarConvocados() {
  const data = await get('convocados.php');
  if(!data.success||!data.data) return;
  document.getElementById('cnt-conv').textContent = data.data.length;
  const tbody = document.querySelector('#tablaConvocados tbody');
  tbody.innerHTML = '';
  data.data.forEach((j,i) => {
    tbody.innerHTML += `<tr>
      <td style="color:var(--muted);font-size:0.7rem">${i+1}</td>
      <td><div class="team-cell">
        <img class="team-logo" src="${j.escudo_url||''}" onerror="this.style.opacity=0">
        <span>${j.nombre}</span>
      </div></td>
      <td>${j.seleccion_nombre}</td>
      <td>${j.posicion||'—'}</td>
      <td><strong>${j.dorsal||'—'}</strong></td>
      <td class="actions-cell">
        <button class="btn btn-warn btn-sm" onclick="editarConvocado(${j.id})">✏️</button>
        <button class="btn btn-danger btn-sm" onclick="eliminar('convocados',${j.id})">🗑️</button>
      </td>
    </tr>`;
  });
}

// ─── GRUPOS ──────────────────────────────────────
async function cargarGrupos() {
  const data = await get('grupos.php');
  if(!data.success) return;
  let html = '';
  ['A','B','C','D','E','F','G','H','I','J','K','L'].forEach(g => {
    if(!data.data[g]||!data.data[g].length) return;
    const sorted = [...data.data[g]].sort((a,b)=>b.puntos-a.puntos);
    html += `<div class="grupo-block">
      <div class="grupo-header">
        <div class="grupo-letter">${g}</div>
        <h4>Grupo ${g}</h4>
      </div>
      <div class="table-wrap"><table>
        <thead><tr><th>Pos</th><th>Selección</th><th>Pts</th><th>Acciones</th></tr></thead>
        <tbody>`;
    sorted.forEach((e,idx)=>{
      html+=`<tr>
        <td><strong style="color:${idx<2?'var(--gold)':'var(--muted)'}">${idx+1}°</strong></td>
        <td><div class="team-cell">
          <img class="team-logo" src="${e.escudo_url||''}" onerror="this.style.opacity=0">
          ${e.nombre}
        </div></td>
        <td><strong style="color:${idx<2?'var(--gold)':'var(--text)'}">${e.puntos}</strong></td>
        <td class="actions-cell">
          <button class="btn btn-warn btn-sm" onclick="editarGrupo(${e.id})">✏️</button>
          <button class="btn btn-danger btn-sm" onclick="eliminar('grupos',${e.id})">🗑️</button>
        </td>
      </tr>`;
    });
    html += `</tbody></table></div></div>`;
  });
  document.getElementById('gruposContainer').innerHTML = html || '<div class="error-msg">⚠️ No hay equipos asignados a grupos.</div>';
}

// ─── CAMPEONES ───────────────────────────────────
async function cargarCampeones() {
  const data = await get('campeones.php');
  if(!data.success) return;
  const tbody = document.querySelector('#tablaCampeones tbody');
  tbody.innerHTML='';
  data.data.forEach(c=>{
    tbody.innerHTML+=`<tr>
      <td><strong style="color:var(--gold);font-family:'Bebas Neue';font-size:1rem">${c.anio}</strong></td>
      <td><div class="team-cell">
        <img class="team-logo" src="${c.escudo_url||''}" onerror="this.style.opacity=0">
        ${c.seleccion_nombre}
      </div></td>
      <td><img class="team-logo" src="${c.escudo_url||''}" onerror="this.style.opacity=0"></td>
      <td class="actions-cell">
        <button class="btn btn-warn btn-sm" onclick="editarCampeon(${c.id})">✏️</button>
        <button class="btn btn-danger btn-sm" onclick="eliminar('campeones',${c.id})">🗑️</button>
      </td>
    </tr>`;
  });
}

// ─── GOLEADORES ──────────────────────────────────
async function cargarGoleadores() {
  const data = await get('goleadores.php');
  if(!data.success) return;
  const tbody = document.querySelector('#tablaGoleadores tbody');
  tbody.innerHTML='';
  data.data.forEach(g=>{
    tbody.innerHTML+=`<tr>
      <td><div class="team-cell">
        <img class="team-logo" src="${g.escudo_url||''}" onerror="this.style.opacity=0">
        ${g.jugador_nombre}
      </div></td>
      <td>${g.seleccion_nombre}</td>
      <td><strong style="color:var(--gold);font-size:1rem">${g.goles}</strong></td>
      <td style="color:var(--muted)">${g.anio}</td>
      <td class="actions-cell">
        <button class="btn btn-warn btn-sm" onclick="editarGoleador(${g.id})">✏️</button>
        <button class="btn btn-danger btn-sm" onclick="eliminar('goleadores',${g.id})">🗑️</button>
      </td>
    </tr>`;
  });
}

// ─── ASISTENTES ──────────────────────────────────
async function cargarAsistentes() {
  const data = await get('asistentes.php');
  if(!data.success) return;
  const tbody = document.querySelector('#tablaAsistentes tbody');
  tbody.innerHTML='';
  data.data.forEach(a=>{
    tbody.innerHTML+=`<tr>
      <td><div class="team-cell">
        <img class="team-logo" src="${a.escudo_url||''}" onerror="this.style.opacity=0">
        ${a.jugador_nombre}
      </div></td>
      <td>${a.seleccion_nombre}</td>
      <td><strong style="color:var(--gold);font-size:1rem">${a.asistencias}</strong></td>
      <td style="color:var(--muted)">${a.anio}</td>
      <td class="actions-cell">
        <button class="btn btn-warn btn-sm" onclick="editarAsistente(${a.id})">✏️</button>
        <button class="btn btn-danger btn-sm" onclick="eliminar('asistentes',${a.id})">🗑️</button>
      </td>
    </tr>`;
  });
}

// ─── ESTADIOS ────────────────────────────────────
async function cargarEstadios() {
  const data = await get('estadios.php');
  if(!data.success) return;
  document.getElementById('cnt-est').textContent = data.data.length;
  const tbody = document.querySelector('#tablaEstadios tbody');
  tbody.innerHTML='';
  data.data.forEach(e=>{
    tbody.innerHTML+=`<tr>
      <td><strong>${e.nombre}</strong></td>
      <td style="color:var(--muted)">${e.ciudad}</td>
      <td>${Number(e.capacidad).toLocaleString()}</td>
      <td class="actions-cell">
        <button class="btn btn-danger btn-sm" onclick="eliminar('estadios',${e.id})">🗑️</button>
      </td>
    </tr>`;
  });
}

// ─── PARTIDOS ────────────────────────────────────
async function cargarPartidos() {
  const data = await get('partidos.php');
  if(!data.success) return;
  document.getElementById('cnt-par').textContent = data.data.length;
  const tbody = document.querySelector('#tablaPartidos tbody');
  tbody.innerHTML='';
  data.data.forEach(p=>{
    tbody.innerHTML+=`<tr>
      <td>${p.local_nombre}</td>
      <td>${p.visitante_nombre}</td>
      <td style="color:var(--muted)">${p.fecha}</td>
      <td style="color:var(--muted)">${p.hora}</td>
      <td>${p.estadio_nombre}</td>
      <td><span class="badge badge-conmebol">${p.fase||'—'}</span></td>
      <td class="actions-cell">
        <button class="btn btn-warn btn-sm" onclick="editarPartido(${p.id})">✏️</button>
        <button class="btn btn-danger btn-sm" onclick="eliminar('partidos',${p.id})">🗑️</button>
      </td>
    </tr>`;
  });
}

// ─── SELECTS ─────────────────────────────────────
async function cargarSelect(id) {
  const data = await get('participantes.php');
  if(!data.success) return;
  const sel = document.getElementById(id);
  if(!sel) return;
  sel.innerHTML = '<option value="">— Seleccionar —</option>';
  data.data.forEach(p=>{ sel.innerHTML+=`<option value="${p.id}">${p.nombre}</option>`; });
}

async function cargarSelectEstadios() {
  const data = await get('estadios.php');
  if(!data.success) return;
  const sel = document.getElementById('par_estadio');
  sel.innerHTML = '<option value="">— Seleccionar —</option>';
  data.data.forEach(e=>{ sel.innerHTML+=`<option value="${e.id}">${e.nombre}</option>`; });
}

// ─── TORNEO ──────────────────────────────────────
async function cargarEliminatorias() {
  const container = document.getElementById('tournamentContainer');
  container.innerHTML = '<div class="loading">Calculando clasificados…</div>';
  try {
    const gruposData = await get('grupos.php');
    gruposOriginales = gruposData;
    if(!gruposData.success){ container.innerHTML='<div class="error-msg">❌ Error al cargar grupos</div>'; return; }
    const parData = await get('participantes.php');
    participantesMap={};
    if(parData.success) parData.data.forEach(p=>{ participantesMap[p.id]=p; });
    const primeros=[],segundos=[],terceros=[];
    ['A','B','C','D','E','F','G','H','I','J','K','L'].forEach(g=>{
      if(!gruposData.data[g]||!gruposData.data[g].length) return;
      const ord=[...gruposData.data[g]].sort((a,b)=>b.puntos-a.puntos);
      if(ord[0]) primeros.push({...ord[0],grupo:g,posicion:1});
      if(ord[1]) segundos.push({...ord[1],grupo:g,posicion:2});
      if(ord[2]) terceros.push({...ord[2],grupo:g,posicion:3,puntos:ord[2].puntos});
    });
    const mejoresTerceros=terceros.sort((a,b)=>b.puntos-a.puntos).slice(0,8);
    const dConfig=[
      {l:{t:'primero',g:'E'},v:{t:'tercero'}},{l:{t:'primero',g:'F'},v:{t:'segundo',g:'C'}},
      {l:{t:'segundo',g:'A'},v:{t:'segundo',g:'B'}},{l:{t:'primero',g:'G'},v:{t:'tercero'}},
      {l:{t:'segundo',g:'K'},v:{t:'segundo',g:'L'}},{l:{t:'primero',g:'H'},v:{t:'segundo',g:'J'}},
      {l:{t:'primero',g:'B'},v:{t:'tercero'}},{l:{t:'primero',g:'I'},v:{t:'tercero'}},
      {l:{t:'primero',g:'C'},v:{t:'segundo',g:'D'}},{l:{t:'primero',g:'J'},v:{t:'segundo',g:'H'}},
      {l:{t:'segundo',g:'D'},v:{t:'segundo',g:'G'}},{l:{t:'primero',g:'K'},v:{t:'tercero'}},
      {l:{t:'primero',g:'A'},v:{t:'segundo',g:'L'}},{l:{t:'primero',g:'L'},v:{t:'tercero'}},
      {l:{t:'segundo',g:'E'},v:{t:'segundo',g:'F'}},{l:{t:'primero',g:'D'},v:{t:'tercero'}}
    ];
    if(!tournamentData.dieciseisavos.length){
      tournamentData.dieciseisavos=[];
      let ti=0;
      dConfig.forEach(cfg=>{
        let loc=null,vis=null;
        if(cfg.l.t==='primero') loc=primeros.find(p=>p.grupo===cfg.l.g);
        else if(cfg.l.t==='segundo') loc=segundos.find(s=>s.grupo===cfg.l.g);
        if(cfg.v.t==='segundo') vis=segundos.find(s=>s.grupo===cfg.v.g);
        else if(cfg.v.t==='tercero'&&ti<mejoresTerceros.length) vis=mejoresTerceros[ti++];
        tournamentData.dieciseisavos.push({
          id:`d${tournamentData.dieciseisavos.length}`,
          local:loc?{...loc,nombre:participantesMap[loc.seleccion_id]?.nombre||'?',escudo:participantesMap[loc.seleccion_id]?.escudo_url,goles:null,idEquipo:loc.seleccion_id}:null,
          visitante:vis?{...vis,nombre:participantesMap[vis.seleccion_id]?.nombre||'?',escudo:participantesMap[vis.seleccion_id]?.escudo_url,goles:null,idEquipo:vis.seleccion_id}:null,
          resultado:null,ganador:null
        });
      });
      tournamentData.octavos=Array(8).fill(0).map((_,i)=>({id:`o${i}`,local:null,visitante:null,resultado:null,ganador:null}));
      tournamentData.cuartos=Array(4).fill(0).map((_,i)=>({id:`c${i}`,local:null,visitante:null,resultado:null,ganador:null}));
      tournamentData.semifinales=Array(2).fill(0).map((_,i)=>({id:`s${i}`,local:null,visitante:null,resultado:null,ganador:null}));
      tournamentData.final={id:'f1',local:null,visitante:null,resultado:null,ganador:null};
      tournamentData.tercerPuesto={id:'t1',local:null,visitante:null,resultado:null,ganador:null};
      tournamentData.campeon=null;
    }
    renderTournament(mejoresTerceros);
  } catch(err){ container.innerHTML=`<div class="error-msg">❌ ${err.message}</div>`; }
}

function renderTournament(mej) {
  let html = `<div class="best-third"><h4>⭐ MEJORES TERCEROS</h4><div class="best-third-list">`;
  mej.forEach((t,i)=>{
    const eq=participantesMap[t.seleccion_id];
    html+=`<div class="third-chip"><img src="${eq?.escudo_url||''}" onerror="this.style.opacity=0"> <strong>${i+1}°</strong> ${eq?.nombre||'?'} <span style="color:var(--muted)">${t.puntos}pts</span></div>`;
  });
  html+='</div></div><div class="tournament-bracket">';
  html+=`<div class="round"><div class="round-title dec">DIECISEISAVOS</div>`;
  tournamentData.dieciseisavos.forEach((m,i)=>{ html+=matchHTML(m,`Partido ${i+1}`); });
  html+=`</div><div class="round"><div class="round-title oct">OCTAVOS</div>`;
  tournamentData.octavos.forEach((m,i)=>{ html+=matchHTML(m,`Octavo ${i+1}`); });
  html+=`</div><div class="round"><div class="round-title qua">CUARTOS</div>`;
  tournamentData.cuartos.forEach((m,i)=>{ html+=matchHTML(m,`Cuarto ${i+1}`); });
  html+=`</div><div class="round"><div class="round-title sem">SEMIFINALES</div>`;
  tournamentData.semifinales.forEach((m,i)=>{ html+=matchHTML(m,`Semifinal ${i+1}`); });
  html+=`</div><div class="round"><div class="round-title fin">FINAL</div>`;
  html+=matchHTML(tournamentData.final,'⚽ Gran Final');
  html+='</div></div>';
  html+=`<div class="third-place-section"><h3>🥉 TERCER PUESTO</h3>`;
  html+=`<div style="max-width:280px;margin:0 auto">${matchHTML(tournamentData.tercerPuesto,'3er Puesto')}</div>`;
  if(tournamentData.campeon) html+=`<div class="champion-badge">🏆 CAMPEÓN MUNDIAL: ${tournamentData.campeon.nombre}</div>`;
  html+='</div>';
  document.getElementById('tournamentContainer').innerHTML=html;
}

function matchHTML(m,titulo){
  if(!m) return `<div class="empty-match">Por definir</div>`;
  const lg=m.resultado?m.resultado.local:(m.local?.goles??'');
  const vg=m.resultado?m.resultado.visitante:(m.visitante?.goles??'');
  const haRes=lg!==''||vg!=='';
  let lc='',vc='';
  if(m.ganador){ if(m.ganador.idEquipo===m.local?.idEquipo)lc='winner'; else vc='winner'; }
  return `<div class="match" onclick="abrirModalResultado('${m.id}')">
    <div class="match-header">${titulo}</div>
    <div class="team-row ${lc}">
      <img src="${m.local?.escudo||''}" onerror="this.style.opacity=0" style="width:22px;height:22px;object-fit:contain">
      <span class="tname">${m.local?.nombre||'Por definir'}</span>
      <span class="tscore">${haRes&&lg!==''?lg:'—'}</span>
    </div>
    <div class="team-row ${vc}">
      <img src="${m.visitante?.escudo||''}" onerror="this.style.opacity=0" style="width:22px;height:22px;object-fit:contain">
      <span class="tname">${m.visitante?.nombre||'Por definir'}</span>
      <span class="tscore">${haRes&&vg!==''?vg:'—'}</span>
    </div>
    <div class="match-footer ${m.resultado?'done':'pending'}">
      ${m.resultado?`✅ ${m.resultado.local} - ${m.resultado.visitante}`:'Clic para ingresar resultado'}
    </div>
  </div>`;
}

function abrirModalResultado(id){
  let m=findMatch(id);
  if(!m||!m.local||!m.visitante){ alert('⚠️ Partido sin equipos definidos aún.'); return; }
  if(m.resultado&&!confirm('Ya hay resultado. ¿Modificar?')) return;
  currentMatchId=id;
  document.getElementById('scoreModalTitle').textContent=`${m.local.nombre} vs ${m.visitante.nombre}`;
  document.getElementById('localTeamLabel').textContent=m.local.nombre;
  document.getElementById('visitanteTeamLabel').textContent=m.visitante.nombre;
  document.getElementById('localLogo').src=m.local.escudo||'';
  document.getElementById('visitanteLogo').src=m.visitante.escudo||'';
  document.getElementById('localScore').value=m.resultado?.local||0;
  document.getElementById('visitanteScore').value=m.resultado?.visitante||0;
  document.getElementById('scoreModal').classList.add('open');
}

function guardarResultado(){
  const lg=parseInt(document.getElementById('localScore').value)||0;
  const vg=parseInt(document.getElementById('visitanteScore').value)||0;
  let {m,ronda,idx}=findMatchFull(currentMatchId);
  if(!m) return;
  m.resultado={local:lg,visitante:vg}; m.local.goles=lg; m.visitante.goles=vg;
  const ganador=lg>=vg?{...m.local}:{...m.visitante};
  m.ganador=ganador;
  if(ronda==='dieciseisavos'){
    const oi=Math.floor(idx/2);
    if(idx%2===0) tournamentData.octavos[oi].local=ganador; else tournamentData.octavos[oi].visitante=ganador;
  } else if(ronda==='octavos'){
    const ci=Math.floor(idx/2);
    if(idx%2===0) tournamentData.cuartos[ci].local=ganador; else tournamentData.cuartos[ci].visitante=ganador;
  } else if(ronda==='cuartos'){
    const si=Math.floor(idx/2);
    if(idx%2===0) tournamentData.semifinales[si].local=ganador; else tournamentData.semifinales[si].visitante=ganador;
    actualizarTercerPuesto();
  } else if(ronda==='semifinales'){
    if(idx===0) tournamentData.final.local=ganador; else tournamentData.final.visitante=ganador;
    actualizarTercerPuesto();
  } else if(ronda==='final'){
    tournamentData.campeon=ganador;
  }
  closeScoreModal();
  renderTournament(calcularMejoresTerceros());
}

function actualizarTercerPuesto(){
  const s=tournamentData.semifinales;
  if(s[0]?.resultado&&s[1]?.resultado){
    tournamentData.tercerPuesto.local=s[0].ganador.idEquipo===s[0].local?.idEquipo?s[0].visitante:s[0].local;
    tournamentData.tercerPuesto.visitante=s[1].ganador.idEquipo===s[1].local?.idEquipo?s[1].visitante:s[1].local;
  }
}

function calcularMejoresTerceros(){
  if(!gruposOriginales) return [];
  const t=[];
  ['A','B','C','D','E','F','G','H','I','J','K','L'].forEach(g=>{
    if(gruposOriginales.data[g]?.length>=3){
      const o=[...gruposOriginales.data[g]].sort((a,b)=>b.puntos-a.puntos);
      if(o[2]) t.push({...o[2],grupo:g,puntos:o[2].puntos});
    }
  });
  return t.sort((a,b)=>b.puntos-a.puntos).slice(0,8);
}

function reiniciarTorneo(){
  if(confirm('¿Reiniciar torneo? Se perderán todos los resultados.')){
    tournamentData={dieciseisavos:[],octavos:[],cuartos:[],semifinales:[],final:null,tercerPuesto:null,campeon:null};
    cargarEliminatorias();
  }
}

function findMatch(id){
  return tournamentData.dieciseisavos.find(m=>m.id===id)
      || tournamentData.octavos.find(m=>m.id===id)
      || tournamentData.cuartos.find(m=>m.id===id)
      || tournamentData.semifinales.find(m=>m.id===id)
      || (tournamentData.final?.id===id?tournamentData.final:null)
      || (tournamentData.tercerPuesto?.id===id?tournamentData.tercerPuesto:null);
}

function findMatchFull(id){
  for(const [ronda,arr] of [['dieciseisavos',tournamentData.dieciseisavos],['octavos',tournamentData.octavos],['cuartos',tournamentData.cuartos],['semifinales',tournamentData.semifinales]]){
    const idx=arr.findIndex(m=>m.id===id);
    if(idx!==-1) return {m:arr[idx],ronda,idx};
  }
  if(tournamentData.final?.id===id) return {m:tournamentData.final,ronda:'final',idx:0};
  if(tournamentData.tercerPuesto?.id===id) return {m:tournamentData.tercerPuesto,ronda:'tercerPuesto',idx:0};
  return {m:null,ronda:null,idx:-1};
}

// ─── MODALS ──────────────────────────────────────
function closeModal(){ document.getElementById('editModal').classList.remove('open'); }
function closeScoreModal(){ document.getElementById('scoreModal').classList.remove('open'); currentMatchId=null; }

function openModal(title,tabla,id,fieldsHtml){
  document.getElementById('modalTitle').textContent=title;
  document.getElementById('edit_id').value=id;
  document.getElementById('edit_tabla').value=tabla;
  document.getElementById('editFields').innerHTML=fieldsHtml;
  document.getElementById('editModal').classList.add('open');
}

function fg(label,id,type='text',val='',ph=''){
  return `<div class="form-group"><label>${label}</label><input type="${type}" id="${id}" value="${val||''}" placeholder="${ph}"></div>`;
}

async function editarParticipante(id){
  const data=await get(`participantes.php?id=${id}`);
  if(!data.success) return;
  const p=data.data;
  openModal('Editar selección','participantes',id,
    fg('Nombre','edit_nombre','text',p.nombre)+
    fg('Confederación','edit_confederacion','text',p.confederacion)+
    `<div class="form-group" style="grid-column:1/-1">${fg('URL Escudo','edit_escudo_url','url',p.escudo_url)}</div>`
  );
}

async function editarConvocado(id){
  const data=await get(`convocados.php?id=${id}`);
  if(!data.success) return;
  const j=data.data;
  const sData=await get('participantes.php');
  let opts='';
  if(sData.success) sData.data.forEach(s=>{ opts+=`<option value="${s.id}"${s.id==j.seleccion_id?' selected':''}>${s.nombre}</option>`; });
  openModal('Editar convocado','convocados',id,
    fg('Nombre','edit_nombre','text',j.nombre)+
    `<div class="form-group"><label>Selección</label><select id="edit_seleccion_id">${opts}</select></div>`+
    fg('Posición','edit_posicion','text',j.posicion)+
    fg('Dorsal','edit_dorsal','number',j.dorsal)+
    `<div class="form-group" style="grid-column:1/-1">${fg('URL Foto','edit_escudo_url','url',j.escudo_url)}</div>`
  );
}

async function editarGrupo(id){
  const data=await get('grupos.php');
  let enc=null;
  for(const g in data.data){ enc=data.data[g]?.find(x=>x.id==id); if(enc) break; }
  if(enc) openModal('Editar puntos','grupos',id,
    `<div class="form-group"><label>${enc.nombre}</label><input type="number" id="edit_puntos" value="${enc.puntos}"></div>`
  );
}

async function editarCampeon(id){
  const data=await get(`campeones.php?id=${id}`);
  if(!data.success) return;
  const c=data.data;
  openModal('Editar campeón','campeones',id,
    fg('Año','edit_anio','number',c.anio)+
    `<div class="form-group"><label>Selección</label><select id="edit_seleccion_id"></select></div>`+
    fg('URL','edit_escudo_url','url',c.escudo_url)
  );
  cargarSelect('edit_seleccion_id');
}

async function editarGoleador(id){
  const data=await get('goleadores.php');
  const g=data.data.find(x=>x.id==id);
  if(g) openModal('Editar goleador','goleadores',id,
    fg('Jugador','edit_jugador_nombre','text',g.jugador_nombre)+
    fg('Goles','edit_goles','number',g.goles)+
    fg('Año','edit_anio','number',g.anio)+
    fg('URL','edit_escudo_url','url',g.escudo_url)
  );
}

async function editarAsistente(id){
  const data=await get('asistentes.php');
  const a=data.data.find(x=>x.id==id);
  if(a) openModal('Editar asistente','asistentes',id,
    fg('Jugador','edit_jugador_nombre','text',a.jugador_nombre)+
    fg('Asistencias','edit_asistencias','number',a.asistencias)+
    fg('Año','edit_anio','number',a.anio)+
    fg('URL','edit_escudo_url','url',a.escudo_url)
  );
}

async function editarPartido(id){
  const data=await get('partidos.php');
  const p=data.data.find(x=>x.id==id);
  if(p) openModal('Editar partido','partidos',id,
    fg('Fecha','edit_fecha','date',p.fecha)+
    fg('Hora','edit_hora','time',p.hora)+
    fg('Fase','edit_fase','text',p.fase)
  );
}

document.getElementById('editForm').addEventListener('submit',async e=>{
  e.preventDefault();
  const tabla=document.getElementById('edit_tabla').value;
  const id=document.getElementById('edit_id').value;
  let body={id};
  const v=id=>{ const el=document.getElementById(id); return el?el.value:''; };
  if(tabla==='participantes') Object.assign(body,{nombre:v('edit_nombre'),confederacion:v('edit_confederacion'),escudo_url:v('edit_escudo_url')});
  else if(tabla==='convocados') Object.assign(body,{nombre:v('edit_nombre'),seleccion_id:v('edit_seleccion_id'),posicion:v('edit_posicion'),dorsal:v('edit_dorsal'),escudo_url:v('edit_escudo_url')});
  else if(tabla==='grupos') Object.assign(body,{puntos:v('edit_puntos')});
  else if(tabla==='campeones') Object.assign(body,{anio:v('edit_anio'),seleccion_id:v('edit_seleccion_id'),escudo_url:v('edit_escudo_url')});
  else if(tabla==='goleadores') Object.assign(body,{jugador_nombre:v('edit_jugador_nombre'),goles:v('edit_goles'),anio:v('edit_anio'),escudo_url:v('edit_escudo_url')});
  else if(tabla==='asistentes') Object.assign(body,{jugador_nombre:v('edit_jugador_nombre'),asistencias:v('edit_asistencias'),anio:v('edit_anio'),escudo_url:v('edit_escudo_url')});
  else if(tabla==='partidos') Object.assign(body,{fecha:v('edit_fecha'),hora:v('edit_hora'),fase:v('edit_fase')});
  const res=await put(`${tabla}.php`,body);
  alert(res.message);
  closeModal();
  cargarDatos(tabla);
  if(tabla==='grupos') resetTournament();
});

async function eliminar(tabla,id){
  if(!confirm('¿Eliminar este registro?')) return;
  const res=await del(`${tabla}.php?id=${id}`);
  alert(res.message);
  cargarDatos(tabla);
  if(tabla==='grupos') resetTournament();
}

function resetTournament(){
  tournamentData={dieciseisavos:[],octavos:[],cuartos:[],semifinales:[],final:null,tercerPuesto:null,campeon:null};
}

// ─── FORMULARIOS ADD ─────────────────────────────
document.getElementById('formParticipante')?.addEventListener('submit',async e=>{
  e.preventDefault();
  const res=await post('participantes.php',{nombre:val('part_nombre'),confederacion:val('part_confed'),escudo_url:val('part_escudo')});
  alert(res.message); cargarParticipantes(); e.target.reset();
});
document.getElementById('formJugador')?.addEventListener('submit',async e=>{
  e.preventDefault();
  const res=await post('convocados.php',{nombre:val('jug_nombre'),seleccion_id:val('jug_seleccion'),posicion:val('jug_posicion'),dorsal:val('jug_dorsal'),escudo_url:val('jug_escudo')});
  alert(res.message); cargarConvocados(); e.target.reset();
});
document.getElementById('formGrupo')?.addEventListener('submit',async e=>{
  e.preventDefault();
  const res=await post('grupos.php',{grupo_nombre:val('grupo_nombre'),seleccion_id:val('grupo_seleccion'),puntos:val('grupo_puntos')});
  alert(res.message); cargarGrupos(); resetTournament(); e.target.reset();
});
document.getElementById('formCampeon')?.addEventListener('submit',async e=>{
  e.preventDefault();
  const res=await post('campeones.php',{anio:val('camp_anio'),seleccion_id:val('camp_seleccion'),escudo_url:val('camp_escudo')});
  alert(res.message); cargarCampeones(); e.target.reset();
});
document.getElementById('formGoleador')?.addEventListener('submit',async e=>{
  e.preventDefault();
  const res=await post('goleadores.php',{jugador_nombre:val('gol_jugador'),seleccion_id:val('gol_seleccion'),goles:val('gol_goles'),anio:val('gol_anio'),escudo_url:val('gol_escudo')});
  alert(res.message); cargarGoleadores(); e.target.reset();
});
document.getElementById('formAsistente')?.addEventListener('submit',async e=>{
  e.preventDefault();
  const res=await post('asistentes.php',{jugador_nombre:val('asi_jugador'),seleccion_id:val('asi_seleccion'),asistencias:val('asi_asistencias'),anio:val('asi_anio'),escudo_url:val('asi_escudo')});
  alert(res.message); cargarAsistentes(); e.target.reset();
});
document.getElementById('formEstadio')?.addEventListener('submit',async e=>{
  e.preventDefault();
  const res=await post('estadios.php',{nombre:val('est_nombre'),ciudad:val('est_ciudad'),capacidad:val('est_capacidad')});
  alert(res.message); cargarEstadios(); e.target.reset();
});
document.getElementById('formPartido')?.addEventListener('submit',async e=>{
  e.preventDefault();
  const res=await post('partidos.php',{equipo_local_id:val('par_local'),equipo_visitante_id:val('par_visitante'),fecha:val('par_fecha'),hora:val('par_hora'),estadio_id:val('par_estadio'),fase:val('par_fase')});
  alert(res.message); cargarPartidos(); e.target.reset();
});

// ─── HTTP HELPERS ────────────────────────────────
const val = id => document.getElementById(id)?.value||'';
const get = async url => { try { const r=await fetch(API_BASE+url); return await r.json(); } catch { return {success:false,data:[]}; }};
const post= async(url,body)=>{ try { const r=await fetch(API_BASE+url,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(body)}); return await r.json(); } catch { return {success:false,message:'Error de red'}; }};
const put = async(url,body)=>{ try { const r=await fetch(API_BASE+url,{method:'PUT',headers:{'Content-Type':'application/json'},body:JSON.stringify(body)}); return await r.json(); } catch { return {success:false,message:'Error de red'}; }};
const del = async url=>{ try { const r=await fetch(API_BASE+url,{method:'DELETE'}); return await r.json(); } catch { return {success:false,message:'Error de red'}; }};

// ─── CLOSE ON BG CLICK ───────────────────────────
window.addEventListener('click',e=>{
  if(e.target===document.getElementById('editModal')) closeModal();
  if(e.target===document.getElementById('scoreModal')) closeScoreModal();
});

// ─── INIT ────────────────────────────────────────
cargarParticipantes();
</script>
</body>
</html>