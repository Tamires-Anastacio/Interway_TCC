<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Comunidade - Interway</title>

    <link rel="stylesheet" href="comunidade.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <style>

        :root {
            --uni-midnight: #0a192f;
            --uni-navy: #102a4e;
            --uni-royal: #1d4ed8;
            --uni-cyan: #0ea5e9;
            --uni-cyan-hover: #38bdf8;
            --uni-ice: #f0f7ff;
            --uni-card-bg: #ffffff;
            --uni-text-dark: #0f172a;
            --uni-text-muted: #475569;
            --uni-border: #e2e8f0;
            --radius-academic: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--uni-ice);
            color: var(--uni-text-dark);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        /* =========================
           MENU
        ========================= */

        .header {
            background: var(--uni-midnight);
            padding: 1.1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 2px solid rgba(14, 165, 233, .3);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            text-decoration: none;
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .logo span {
            color: var(--uni-cyan);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: .95rem;
            font-weight: 500;
            transition: .3s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--uni-cyan);
        }

        .btn-nav {
            background: linear-gradient(
                135deg,
                var(--uni-cyan),
                var(--uni-royal)
            );

            padding: .45rem 1.3rem;
            border-radius: 50px;
            color: white !important;
            font-weight: 600 !important;
        }

        /* =========================
           HERO
        ========================= */

        .community-hero {
            background: radial-gradient(
                circle at top right,
                #102a4e,
                var(--uni-midnight)
            );

            color: white;
            text-align: center;
            padding: 5rem 1rem 6rem;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;

            padding: .4rem 1.2rem;
            border-radius: 50px;

            color: var(--uni-cyan);
            border: 1px solid var(--uni-cyan);
            background: rgba(14,165,233,.15);

            font-size: .85rem;
            font-weight: 600;

            margin-bottom: 1.2rem;
        }

        .community-hero h1 {
            font-size: 2.7rem;
            font-weight: 800;
            margin-bottom: .8rem;
        }

        .community-hero p {
            max-width: 700px;
            margin: auto;
            color: #cbd5e1;
            font-size: 1.05rem;
        }

        /* =========================
           CARDS
        ========================= */

        .access-section {
            margin-top: -3rem;
            margin-bottom: 5rem;
        }

        .access-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .access-card {
            background: white;
            border: 1px solid var(--uni-border);
            border-radius: var(--radius-academic);

            padding: 2.5rem;

            box-shadow: 0 10px 30px rgba(10,25,47,.08);

            transition: .3s;

            position: relative;
            overflow: hidden;
        }

        .access-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;

            width: 100%;
            height: 5px;

            background: linear-gradient(
                90deg,
                var(--uni-cyan),
                var(--uni-royal)
            );
        }

        .access-card:hover {
            transform: translateY(-8px);

            box-shadow:
                0 20px 40px rgba(10,25,47,.14);

            border-color: var(--uni-cyan);
        }

        .icon-box {
            width: 70px;
            height: 70px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 18px;

            background: var(--uni-ice);

            color: var(--uni-royal);

            font-size: 2rem;

            margin-bottom: 1.5rem;
        }

        .ia-card .icon-box {
            color: var(--uni-cyan);
        }

        .access-card h2 {
            color: var(--uni-midnight);
            font-size: 1.5rem;
            margin-bottom: .8rem;
        }

        .access-card p {
            color: var(--uni-text-muted);
            line-height: 1.6;
            font-size: .92rem;
            margin-bottom: 1.5rem;
        }

        /* =========================
           LISTA
        ========================= */

        .feature-list {
            list-style: none;
            margin-bottom: 2rem;
        }

        .feature-list li {
            display: flex;
            align-items: center;

            gap: .7rem;

            margin-bottom: .7rem;

            font-size: .88rem;
            color: var(--uni-text-muted);
        }

        .feature-list i {
            color: var(--uni-cyan);
        }

        /* =========================
           BOTÕES
        ========================= */

        .access-button {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: .6rem;

            width: 100%;

            padding: .85rem;

            border-radius: 50px;

            text-decoration: none;

            font-weight: 700;

            color: white;

            background: linear-gradient(
                135deg,
                var(--uni-midnight),
                var(--uni-royal)
            );

            transition: .3s;
        }

        .access-button:hover {
            transform: translateY(-2px);

            background: linear-gradient(
                135deg,
                var(--uni-cyan),
                var(--uni-royal)
            );
        }

        .ia-button {
            background: linear-gradient(
                135deg,
                var(--uni-cyan),
                var(--uni-royal)
            );
        }

        /* =========================
           DESTAQUE
        ========================= */

        .community-info {
            background: white;

            border: 1px solid var(--uni-border);

            border-radius: var(--radius-academic);

            padding: 2rem;

            margin-top: 2rem;

            text-align: center;
        }

        .community-info h2 {
            color: var(--uni-midnight);
            margin-bottom: .6rem;
        }

        .community-info p {
            color: var(--uni-text-muted);
            font-size: .9rem;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: var(--uni-midnight);
            color: #94a3b8;

            padding: 2.5rem 0;

            border-top: 1px solid rgba(255,255,255,.08);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;

            flex-wrap: wrap;

            gap: 1rem;
        }

        .footer-brand h3 {
            color: white;
        }

        .footer-brand span {
            color: var(--uni-cyan);
        }

        /* =========================
           RESPONSIVO
        ========================= */

        @media (max-width: 800px) {

            .access-grid {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                gap: .7rem;
            }

            .nav-menu a {
                font-size: .8rem;
            }

            .community-hero h1 {
                font-size: 2rem;
            }
        }

    </style>


    <!-- MENU -->

    <header class="header">

        <div class="container navbar">

            <a href="index.php" class="logo">

                <i class="fa-solid fa-graduation-cap"></i>

                INTER<span>WAY</span>

            </a>

            <nav class="nav-menu">

                <a href="index.php">
                    Início
                </a>

                <a href="escolas.php">
                    Escolas
                </a>

                <a href="bolsas.php">
                    Bolsas
                </a>

                <a href="comunidade.php" class="active">
                    Comunidade
                </a>

                <a href="index.php#contato" class="btn-nav">
                    Orientação
                </a>

            </nav>

        </div>

    </header>


    <!-- HERO -->

    <section class="community-hero">

        <div class="container">

            <div class="hero-badge">

                <i class="fa-solid fa-users"></i>

                Comunidade Interway

            </div>

            <h1>
                Conecte-se com outros intercambistas
            </h1>

            <p>
                Compartilhe experiências, tire dúvidas e conte com
                ferramentas inteligentes para ajudar na sua jornada
                internacional.
            </p>

        </div>

    </section>


    <!-- ACESSOS -->

    <main class="container access-section">

        <div class="access-grid">


            <!-- CHAT DA COMUNIDADE -->

            <article class="access-card">

                <div class="icon-box">

                    <i class="fa-solid fa-comments"></i>

                </div>

                <h2>
                    Chat da Comunidade
                </h2>

                <p>
                    Converse com outros estudantes e intercambistas,
                    compartilhe experiências e encontre pessoas que
                    estão planejando viajar para os mesmos destinos.
                </p>

                <ul class="feature-list">

                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        Converse com outros intercambistas
                    </li>

                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        Compartilhe experiências
                    </li>

                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        Tire dúvidas sobre destinos
                    </li>

                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        Conheça estudantes de outros países
                    </li>

                </ul>

                <a href="planos.php" class="access-button">

                    <i class="fa-solid fa-arrow-right"></i>

                    Entrar no Chat

                </a>

            </article>


            <!-- INTELIGÊNCIA ARTIFICIAL -->

            <article class="access-card ia-card">

                <div class="icon-box">

                    <i class="fa-solid fa-robot"></i>

                </div>

                <h2>
                    Assistente de Inteligência Artificial
                </h2>

                <p>
                    Conte com um assistente virtual para encontrar
                    informações e receber orientações sobre intercâmbio,
                    destinos, bolsas e planejamento da sua viagem.
                </p>

                <ul class="feature-list">

                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        Tire dúvidas sobre intercâmbio
                    </li>

                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        Conheça opções de destinos
                    </li>

                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        Receba orientações para sua jornada
                    </li>

                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        Pesquise informações de forma rápida
                    </li>

                </ul>

                <a href="login.php" class="access-button ia-button">

                    <i class="fa-solid fa-wand-magic-sparkles"></i>

                    Acessar Assistente IA

                </a>

            </article>

        </div>


        <!-- INFORMAÇÃO -->

        <section class="community-info">

            <h2>
                <i class="fa-solid fa-earth-americas"></i>
                Uma comunidade para sua jornada
            </h2>

            <p>
                No Interway, você pode encontrar pessoas, informações
                e ferramentas para tornar seu intercâmbio mais simples,
                seguro e organizado.
            </p>

        </section>

    </main>


    <!-- FOOTER -->

    <footer class="footer">

        <div class="container footer-content">

            <div class="footer-brand">

                <h3>
                    INTER<span>WAY</span>
                </h3>

                <p>
                    Conectando sonhos a oportunidades globais.
                </p>

            </div>

            <p>
                &copy; <?= date("Y") ?> Interway.
                Todos os direitos reservados.
            </p>

        </div>

    </footer>

</body>

</html>