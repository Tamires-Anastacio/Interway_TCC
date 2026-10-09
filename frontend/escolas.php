<?php

/*
|--------------------------------------------------------------------------
| ESCOLAS PARCEIRAS
|--------------------------------------------------------------------------
| Futuramente estes dados podem ser buscados de um banco MySQL.
|--------------------------------------------------------------------------
*/

$escolas = [

    [
        "id" => 1,
        "pais" => "canada",
        "pais_nome" => "Canadá",
        "bandeira" => "🇨🇦",
        "nome" => "ILAC Academy",
        "cidade" => "Toronto & Vancouver",
        "imagem" => "https://images.unsplash.com/photo-1517935703635-27190760b798?q=80&w=700&auto=format&fit=crop",
        "descricao" => "Reconhecida internacionalmente com campi modernos e forte suporte para entrada em universidades canadenses.",
        "descricao_completa" => "Uma das escolas de idiomas mais premiadas do mundo. Famosa pelos seus programas de Pathway universitário e cursos intensivos de inglês para todas as idades.",
        "cursos" => "Inglês Geral, Preparatório IELTS, Pathway Universitário",
        "acomodacao" => "Casa de Família (Homestay) e Residência Estudantil",
        "trabalho" => "Permite trabalho no College Técnico",
        "recursos" => [
            "🎓 Pathway Universitário",
            "🏠 Acomodação Inclusa",
            "📜 Credenciada Languages Canada"
        ]
    ],

    [
        "id" => 2,
        "pais" => "irlanda",
        "pais_nome" => "Irlanda",
        "bandeira" => "🇮🇪",
        "nome" => "Atlas Language School",
        "cidade" => "Dublin",
        "imagem" => "https://images.unsplash.com/photo-1549918864-48ac978761a4?q=80&w=700&auto=format&fit=crop",
        "descricao" => "Destaque europeu para quem busca conciliar estudo e trabalho remunerado na Irlanda.",
        "descricao_completa" => "Localizada no coração de Dublin em um lindo prédio histórico à beira do canal. Possui excelente infraestrutura e suporte aos estudantes.",
        "cursos" => "General English, Inglês para Negócios, Preparatório Cambridge",
        "acomodacao" => "Residência Estudantil e Casas de Família selecionadas",
        "trabalho" => "Permitido trabalhar conforme as regras do visto aplicável",
        "recursos" => [
            "💼 Programa Estudo & Trabalho",
            "👥 Mix de Nacionalidades",
            "🏆 Membro EAQUALS e MEI"
        ]
    ],

    [
        "id" => 3,
        "pais" => "uk",
        "pais_nome" => "Reino Unido",
        "bandeira" => "",
        "nome" => "C London",
        "cidade" => "Londres",
        "imagem" => "https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?q=80&w=700&auto=format&fit=crop",
        "descricao" => "Imersão britânica clássica com infraestrutura de alta tecnologia e atividades culturais.",
        "descricao_completa" => "A EC oferece tecnologia de ponta em sala de aula, foco na fluência oral e atividades culturais para estudantes.",
        "cursos" => "Inglês Geral, Inglês 30+, Inglês Acadêmico",
        "acomodacao" => "Residências no centro de Londres e Homestay",
        "trabalho" => "Conforme as condições do curso e do visto aplicável",
        "recursos" => [
            "💻 Salas Interativas",
            "📅 Excursões Culturais",
            "📜 Acreditada pelo British Council"
        ]
    ],

    [
        "id" => 4,
        "pais" => "australia",
        "pais_nome" => "Austrália",
        "bandeira" => "",
        "nome" => "Lexis English",
        "cidade" => "Sydney & Brisbane",
        "imagem" => "https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?q=80&w=700&auto=format&fit=crop",
        "descricao" => "Perfeita para combinar estudos com trabalho na costa australiana.",
        "descricao_completa" => "A Lexis oferece suporte de carreira para empregos locais e cursos técnicos vocacionais, além de programas de inglês.",
        "cursos" => "General English, Cursos VET (Business / Marketing)",
        "acomodacao" => "Apartamentos compartilhados e Homestay",
        "trabalho" => "Possibilidade de trabalho conforme as regras vigentes do visto",
        "recursos" => [
            "☀️ Estilo de Vida Praiano",
            "💼 Suporte para Currículo Australiano",
            "✔️ Reconhecida pelo NEAS"
        ]
    ],

    [
        "id" => 5,
        "pais" => "usa",
        "pais_nome" => "Estados Unidos",
        "bandeira" => " ",
        "nome" => "Kaplan Manhattan",
        "cidade" => "Nova York",
        "imagem" => "https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?q=80&w=700&auto=format&fit=crop",
        "descricao" => "Viva no centro de Nova York enquanto desenvolve seu inglês.",
        "descricao_completa" => "Localizada próxima ao Central Park em Manhattan. A Kaplan possui metodologia própria e materiais digitais para auxiliar no aprendizado.",
        "cursos" => "Inglês Intensivo, Férias Estudantis, Preparatório TOEFL",
        "acomodacao" => "Residências Estudantis em Manhattan e Brooklyn",
        "trabalho" => "Conforme as condições do visto aplicável",
        "recursos" => [
            "📖 Metodologia Própria K+",
            "🏙️ Próxima ao Central Park",
            "📜 Credenciada ACCET"
        ]
    ]

];

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Escolas Parceiras - InterWay</title>

    <!-- GOOGLE FONT -->

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- FONT AWESOME -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <style>

        :root {

            --navy: #143d75;

            --navy-dark: #0b2244;

            --light-blue: #7ea2d6;

            --background: #edf3fa;

            --white: #ffffff;

            --text-dark: #0f2547;

            --text-muted: #5e7390;

            --border: #dce6f5;

            --radius: 20px;

        }

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

            font-family: "Poppins", sans-serif;

        }

        body {

            background-color: var(--background);

            color: var(--text-dark);

        }

        .container {

            width: 90%;

            max-width: 1200px;

            margin: 0 auto;

        }

        /* =====================================================
           HEADER
        ===================================================== */

        .header {

            background-color: var(--navy);

            padding: 18px 0;

            position: sticky;

            top: 0;

            z-index: 1000;

            box-shadow:
                0 4px 12px
                rgba(0, 0, 0, 0.15);

        }

        .navbar {

            display: flex;

            justify-content: space-between;

            align-items: center;

        }

        .logo {

            color: var(--white);

            text-decoration: none;

            font-size: 1.6rem;

            font-weight: 800;

            letter-spacing: 1px;

        }

        .logo span {

            color: var(--light-blue);

        }

        .nav-menu {

            display: flex;

            align-items: center;

            gap: 25px;

        }

        .nav-menu a {

            color: var(--white);

            text-decoration: none;

            font-size: 0.95rem;

            font-weight: 500;

            transition: 0.3s;

        }

        .nav-menu a:hover,

        .nav-menu a.active {

            color: var(--light-blue);

        }

        .btn-nav {

            background-color: var(--light-blue);

            color: var(--navy) !important;

            padding: 8px 18px;

            border-radius: 50px;

            font-weight: 700 !important;

        }

        /* =====================================================
           HERO
        ===================================================== */

        .hero {

            background-color: var(--navy);

            color: var(--white);

            text-align: center;

            padding: 65px 20px 100px;

        }

        .tag {

            display: inline-block;

            padding: 7px 18px;

            border-radius: 50px;

            background-color:
                rgba(126, 162, 214, 0.2);

            border: 1px dashed var(--light-blue);

            color: var(--light-blue);

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 18px;

        }

        .hero h1 {

            font-size: 42px;

            margin-bottom: 15px;

        }

        .hero p {

            max-width: 700px;

            margin: 0 auto;

            color: #dce6f5;

            line-height: 1.7;

        }

        /* =====================================================
           CONTEÚDO
        ===================================================== */

        .main-content {

            margin-top: -55px;

            margin-bottom: 70px;

            position: relative;

            z-index: 10;

        }

        /* =====================================================
           FILTROS
        ===================================================== */

        .filters {

            background-color: var(--white);

            padding: 25px;

            border-radius: var(--radius);

            box-shadow:
                0 8px 25px
                rgba(20, 61, 117, 0.12);

            margin-bottom: 35px;

            border: 2px solid var(--light-blue);

        }

        .search-box {

            display: flex;

            align-items: center;

            gap: 10px;

            background-color: var(--background);

            padding: 12px 18px;

            border-radius: 50px;

            border: 1px solid #c9d8ee;

            margin-bottom: 18px;

        }

        .search-box i {

            color: var(--navy);

        }

        .search-box input {

            width: 100%;

            border: none;

            outline: none;

            background: transparent;

            font-size: 15px;

        }

        .filter-buttons {

            display: flex;

            flex-wrap: wrap;

            gap: 10px;

        }

        .filter-btn {

            border: 1px solid #c4d7f2;

            background-color: var(--background);

            color: var(--navy);

            padding: 8px 17px;

            border-radius: 50px;

            cursor: pointer;

            font-weight: 600;

            transition: 0.3s;

        }

        .filter-btn:hover,

        .filter-btn.active {

            background-color: var(--navy);

            color: var(--white);

            border-color: var(--navy);

        }

        /* =====================================================
           GRID
        ===================================================== */

        .schools-grid {

            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(320px, 1fr));

            gap: 25px;

        }

        .school-card {

            background-color: var(--white);

            border-radius: var(--radius);

            overflow: hidden;

            border: 1px solid var(--border);

            box-shadow:
                0 6px 18px
                rgba(20, 61, 117, 0.08);

            display: flex;

            flex-direction: column;

            transition: 0.3s;

        }

        .school-card:hover {

            transform: translateY(-7px);

            box-shadow:
                0 12px 25px
                rgba(20, 61, 117, 0.18);

        }

        .school-image {

            width: 100%;

            height: 190px;

            position: relative;

            overflow: hidden;

        }

        .school-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            transition: 0.4s;

        }

        .school-card:hover .school-image img {

            transform: scale(1.05);

        }

        .country {

            position: absolute;

            top: 12px;

            right: 12px;

            background-color:
                rgba(20, 61, 117, 0.9);

            color: var(--white);

            padding: 5px 12px;

            border-radius: 50px;

            font-size: 12px;

            font-weight: 700;

        }

        .school-body {

            padding: 25px;

            display: flex;

            flex-direction: column;

            flex: 1;

        }

        .school-body h2 {

            color: var(--navy);

            font-size: 21px;

            margin-bottom: 5px;

        }

        .location {

            color: var(--light-blue);

            font-size: 13px;

            font-weight: 600;

        }

        .description {

            color: var(--text-muted);

            font-size: 14px;

            line-height: 1.6;

            margin: 15px 0;

        }

        .features {

            list-style: none;

            margin-bottom: 20px;

            flex-grow: 1;

        }

        .features li {

            color: var(--navy);

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 8px;

        }

        .details-btn {

            width: 100%;

            padding: 12px;

            border: none;

            border-radius: 50px;

            background-color: var(--light-blue);

            color: var(--navy);

            font-weight: 700;

            cursor: pointer;

            transition: 0.3s;

        }

        .details-btn:hover {

            background-color: var(--navy);

            color: var(--white);

        }

        /* =====================================================
           MODAL
        ===================================================== */

        .modal {

            display: none;

            position: fixed;

            inset: 0;

            background-color:
                rgba(11, 34, 68, 0.75);

            z-index: 2000;

            align-items: center;

            justify-content: center;

            padding: 20px;

        }

        .modal.active {

            display: flex;

        }

        .modal-content {

            width: 100%;

            max-width: 600px;

            background-color: var(--white);

            border-radius: var(--radius);

            padding: 35px;

            position: relative;

            animation: aparecer 0.25s ease;

        }

        @keyframes aparecer {

            from {

                opacity: 0;

                transform: scale(0.9);

            }

            to {

                opacity: 1;

                transform: scale(1);

            }

        }

        .close-modal {

            position: absolute;

            top: 12px;

            right: 18px;

            background: none;

            border: none;

            font-size: 30px;

            color: var(--navy);

            cursor: pointer;

        }

        .modal-content h2 {

            color: var(--navy);

            margin-bottom: 5px;

        }

        .modal-location {

            color: var(--light-blue);

            font-weight: 600;

            font-size: 14px;

        }

        .modal-description {

            margin: 20px 0;

            color: var(--text-muted);

            line-height: 1.7;

        }

        .modal-info {

            background-color: var(--background);

            padding: 18px;

            border-radius: 12px;

        }

        .modal-info div {

            margin-bottom: 14px;

            color: var(--text-muted);

            font-size: 14px;

        }

        .modal-info div:last-child {

            margin-bottom: 0;

        }

        .modal-info strong {

            display: block;

            color: var(--navy);

            margin-bottom: 3px;

        }

        .modal-contact {

            display: block;

            text-align: center;

            margin-top: 20px;

            background-color: var(--navy);

            color: var(--white);

            text-decoration: none;

            padding: 12px;

            border-radius: 50px;

            font-weight: 700;

            transition: 0.3s;

        }

        .modal-contact:hover {

            background-color: var(--light-blue);

            color: var(--navy);

        }

        /* =====================================================
           FOOTER
        ===================================================== */

        footer {

            background-color: var(--navy-dark);

            color: #c7d8f0;

            text-align: center;

            padding: 30px 20px;

        }

        footer strong {

            color: var(--white);

        }

        footer span {

            color: var(--light-blue);

        }

        /* =====================================================
           RESPONSIVIDADE
        ===================================================== */

        @media (max-width: 800px) {

            .navbar {

                flex-direction: column;

                gap: 15px;

            }

            .nav-menu {

                flex-wrap: wrap;

                justify-content: center;

                gap: 12px;

            }

            .hero h1 {

                font-size: 32px;

            }

        }

        @media (max-width: 500px) {

            .container {

                width: 92%;

            }

            .hero {

                padding: 50px 15px 90px;

            }

            .hero h1 {

                font-size: 27px;

            }

            .schools-grid {

                grid-template-columns: 1fr;

            }

            .modal-content {

                padding: 25px 20px;

            }

        }

    </style>

</head>

<body>

    <!-- =====================================================
         HEADER
    ===================================================== -->

    <header class="header">

        <div class="container navbar">

            <a href="index.php" class="logo">

                <i class="fa-solid fa-plane-departure"></i>

                INTER<span>WAY</span>

            </a>

            <nav class="nav-menu">

                <a href="index.php">
                    Início
                </a>

                <a href="comunidade.php">
                    Comunidade
                </a>

                <a href="escolas.php" class="active">
                    Escolas
                </a>

                <a href="planos.php">
                    Planos
                </a>

                <a
                    href="index.php#contato"
                    class="btn-nav"
                >
                    Fale Conosco
                </a>

            </nav>

        </div>

    </header>


    <!-- =====================================================
         HERO
    ===================================================== -->

    <section class="hero">

        <div class="container">

            <span class="tag">

                <i class="fa-solid fa-shield-halved"></i>

                Instituições verificadas

            </span>

            <h1>
                Escolas Parceiras
            </h1>

            <p>

                Encontre instituições de ensino e escolas
                parceiras para realizar sua experiência
                internacional.

            </p>

        </div>

    </section>


    <!-- =====================================================
         CONTEÚDO PRINCIPAL
    ===================================================== -->

    <main class="container main-content">


        <!-- FILTROS -->

        <section class="filters">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    id="busca"
                    placeholder="Buscar escola, cidade ou país..."
                >

            </div>


            <div class="filter-buttons">

                <button
                    class="filter-btn active"
                    data-filter="todos"
                >
                    Todos
                </button>

                <button
                    class="filter-btn"
                    data-filter="canada"
                >
                    🇨🇦 Canadá
                </button>

                <button
                    class="filter-btn"
                    data-filter="irlanda"
                >
                    🇮🇪 Irlanda
                </button>

                <button
                    class="filter-btn"
                    data-filter="uk"
                >
                    🇬🇧 Reino Unido
                </button>

                <button
                    class="filter-btn"
                    data-filter="australia"
                >
                    🇦🇺 Austrália
                </button>

                <button
                    class="filter-btn"
                    data-filter="usa"
                >
                    🇺🇸 Estados Unidos
                </button>

            </div>

        </section>


        <!-- =================================================
             ESCOLAS
        ================================================= -->

        <section class="schools-grid" id="schoolsGrid">

            <?php foreach ($escolas as $escola): ?>

                <article
                    class="school-card"
                    data-country="<?= htmlspecialchars($escola["pais"]) ?>"
                    data-search="<?= htmlspecialchars(
                        strtolower(
                            $escola["nome"]
                            . " "
                            . $escola["cidade"]
                            . " "
                            . $escola["pais_nome"]
                        )
                    ) ?>"
                >

                    <!-- IMAGEM -->

                    <div class="school-image">

                        <img
                            src="<?= htmlspecialchars($escola["imagem"]) ?>"
                            alt="<?= htmlspecialchars($escola["nome"]) ?>"
                        >

                        <span class="country">

                            <?= $escola["bandeira"] ?>

                            <?= htmlspecialchars($escola["pais_nome"]) ?>

                        </span>

                    </div>


                    <!-- CORPO -->

                    <div class="school-body">

                        <h2>
                            <?= htmlspecialchars($escola["nome"]) ?>
                        </h2>

                        <span class="location">

                            <i class="fa-solid fa-location-dot"></i>

                            <?= htmlspecialchars($escola["cidade"]) ?>

                        </span>


                        <p class="description">

                            <?= htmlspecialchars($escola["descricao"]) ?>

                        </p>


                        <!-- RECURSOS -->

                        <ul class="features">

                            <?php foreach ($escola["recursos"] as $recurso): ?>

                                <li>
                                    <?= htmlspecialchars($recurso) ?>
                                </li>

                            <?php endforeach; ?>

                        </ul>


                        <!-- BOTÃO -->

                        <button
                            type="button"
                            class="details-btn"
                            onclick="abrirModal(<?= $escola['id'] ?>)"
                        >

                            Ver detalhes

                        </button>

                    </div>

                </article>

            <?php endforeach; ?>

        </section>

    </main>


    <!-- =====================================================
         MODAL
    ===================================================== -->

    <div
        class="modal"
        id="modal"
    >

        <div class="modal-content">

            <button
                class="close-modal"
                onclick="fecharModal()"
            >
                &times;
            </button>


            <h2 id="modalNome">
                Escola
            </h2>


            <span
                class="modal-location"
                id="modalCidade"
            >
                Localização
            </span>


            <p
                class="modal-description"
                id="modalDescricao"
            >
                Descrição
            </p>


            <div class="modal-info">

                <div>

                    <strong>
                        <i class="fa-solid fa-book"></i>
                        Cursos
                    </strong>

                    <span id="modalCursos">
                        -
                    </span>

                </div>


                <div>

                    <strong>
                        <i class="fa-solid fa-house"></i>
                        Acomodação
                    </strong>

                    <span id="modalAcomodacao">
                        -
                    </span>

                </div>


                <div>

                    <strong>
                        <i class="fa-solid fa-briefcase"></i>
                        Trabalho
                    </strong>

                    <span id="modalTrabalho">
                        -
                    </span>

                </div>

            </div>


            <a
                href="index.php#contato"
                class="modal-contact"
            >

                Solicitar informações

            </a>

        </div>

    </div>


    <!-- =====================================================
         FOOTER
    ===================================================== -->

    <footer>

        <p>

            <strong>
                INTER<span>WAY</span>
            </strong>

            — Conectando você ao mundo.

        </p>

        <p>

            &copy;

            <?= date("Y") ?>

            InterWay.

            Todos os direitos reservados.

        </p>

    </footer>


    <!-- =====================================================
         JAVASCRIPT
    ===================================================== -->

    <script>

        /*
        |--------------------------------------------------------------------------
        | DADOS DAS ESCOLAS
        |--------------------------------------------------------------------------
        | O PHP transforma o array em JSON para o JavaScript.
        |--------------------------------------------------------------------------
        */

        const escolas = <?= json_encode(
            $escolas,
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        ) ?>;


        /*
        |--------------------------------------------------------------------------
        | ELEMENTOS
        |--------------------------------------------------------------------------
        */

        const modal = document.getElementById("modal");

        const busca = document.getElementById("busca");

        const cards = document.querySelectorAll(".school-card");

        const botoesFiltro =
            document.querySelectorAll(".filter-btn");


        /*
        |--------------------------------------------------------------------------
        | ABRIR MODAL
        |--------------------------------------------------------------------------
        */

        function abrirModal(id) {

            const escola = escolas.find(
                item => item.id === id
            );

            if (!escola) {

                return;

            }


            document.getElementById(
                "modalNome"
            ).textContent = escola.nome;


            document.getElementById(
                "modalCidade"
            ).textContent =
                escola.bandeira
                + " "
                + escola.cidade
                + " - "
                + escola.pais_nome;


            document.getElementById(
                "modalDescricao"
            ).textContent =
                escola.descricao_completa;


            document.getElementById(
                "modalCursos"
            ).textContent =
                escola.cursos;


            document.getElementById(
                "modalAcomodacao"
            ).textContent =
                escola.acomodacao;


            document.getElementById(
                "modalTrabalho"
            ).textContent =
                escola.trabalho;


            modal.classList.add("active");

        }


        /*
        |--------------------------------------------------------------------------
        | FECHAR MODAL
        |--------------------------------------------------------------------------
        */

        function fecharModal() {

            modal.classList.remove("active");

        }


        /*
        |--------------------------------------------------------------------------
        | FECHAR AO CLICAR FORA
        |--------------------------------------------------------------------------
        */

        modal.addEventListener(
            "click",
            function(event) {

                if (event.target === modal) {

                    fecharModal();

                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | FECHAR COM ESC
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            "keydown",
            function(event) {

                if (event.key === "Escape") {

                    fecharModal();

                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | FILTROS
        |--------------------------------------------------------------------------
        */

        let filtroAtual = "todos";


        botoesFiltro.forEach(
            botao => {

                botao.addEventListener(
                    "click",
                    function() {

                        botoesFiltro.forEach(
                            item =>
                                item.classList.remove("active")
                        );


                        this.classList.add("active");


                        filtroAtual =
                            this.dataset.filter;


                        filtrarEscolas();

                    }
                );

            }
        );


        /*
        |--------------------------------------------------------------------------
        | BUSCA + FILTRO
        |--------------------------------------------------------------------------
        */

        busca.addEventListener(
            "input",
            filtrarEscolas
        );


        function filtrarEscolas() {

            const texto =
                busca.value
                    .toLowerCase()
                    .trim();


            cards.forEach(
                card => {

                    const pais =
                        card.dataset.country;


                    const dados =
                        card.dataset.search;


                    const correspondePais =
                        filtroAtual === "todos"
                        ||
                        pais === filtroAtual;


                    const correspondeBusca =
                        dados.includes(texto);


                    if (
                        correspondePais
                        &&
                        correspondeBusca
                    ) {

                        card.style.display = "flex";

                    } else {

                        card.style.display = "none";

                    }

                }
            );

        }

    </script>

</body>

</html>
