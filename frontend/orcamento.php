<?php

session_start();

/*
|--------------------------------------------------------------------------
| ORÇAMENTO INTERWAY
|--------------------------------------------------------------------------
| Página para calcular uma estimativa de viagem/intercâmbio.
|--------------------------------------------------------------------------
*/

$orcamento = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $destino = $_POST["destino"] ?? "";
    $duracao = (int) ($_POST["duracao"] ?? 0);
    $hospedagem = $_POST["hospedagem"] ?? "";
    $curso = $_POST["curso"] ?? "";
    $passagem = $_POST["passagem"] ?? "";
    $seguro = $_POST["seguro"] ?? "";
    $transfer = $_POST["transfer"] ?? "";

    /*
    |--------------------------------------------------------------------------
    | VALORES ESTIMADOS
    |--------------------------------------------------------------------------
    */

    $precosHospedagem = [
        "homestay" => 2500,
        "residencia" => 3500,
        "hotel" => 5000
    ];

    $precosCurso = [
        "ingles" => 1800,
        "highschool" => 4500,
        "tecnico" => 3200,
        "universitario" => 5000
    ];

    $precosPassagem = [
        "economica" => 3500,
        "executiva" => 8500
    ];

    $precosSeguro = [
        "basico" => 300,
        "completo" => 650
    ];

    $precoTransfer = [
        "sim" => 350,
        "nao" => 0
    ];

    /*
    |--------------------------------------------------------------------------
    | VALIDAÇÃO
    |--------------------------------------------------------------------------
    */

    if (
        isset($precosHospedagem[$hospedagem]) &&
        isset($precosCurso[$curso]) &&
        isset($precosPassagem[$passagem]) &&
        isset($precosSeguro[$seguro]) &&
        isset($precoTransfer[$transfer]) &&
        $duracao > 0
    ) {

        /*
        |--------------------------------------------------------------------------
        | CÁLCULO
        |--------------------------------------------------------------------------
        */

        $valorHospedagem =
            $precosHospedagem[$hospedagem] * $duracao;

        $valorCurso =
            $precosCurso[$curso] * $duracao;

        $valorPassagem =
            $precosPassagem[$passagem];

        $valorSeguro =
            $precosSeguro[$seguro];

        $valorTransfer =
            $precoTransfer[$transfer];

        $total =
            $valorHospedagem +
            $valorCurso +
            $valorPassagem +
            $valorSeguro +
            $valorTransfer;

        $orcamento = [
            "destino" => $destino,
            "duracao" => $duracao,
            "hospedagem" => $valorHospedagem,
            "curso" => $valorCurso,
            "passagem" => $valorPassagem,
            "seguro" => $valorSeguro,
            "transfer" => $valorTransfer,
            "total" => $total
        ];
    }
}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Orçamento de Viagem | InterWay
    </title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {

            font-family: "Poppins", sans-serif;

            background-color: #edf3fa;

            color: #143d75;

            min-height: 100vh;
        }

        /* =====================================================
           HEADER
        ===================================================== */

        header {

            background-color: #143d75;

            padding: 18px 7%;

            display: flex;

            align-items: center;

            justify-content: space-between;

            box-shadow:
                0 4px 15px
                rgba(0, 0, 0, 0.15);
        }

        .logo {

            color: white;

            text-decoration: none;

            font-size: 1.7rem;

            font-weight: 800;

            letter-spacing: 1px;
        }

        .logo span {

            color: #7ea2d6;
        }

        nav {

            display: flex;

            gap: 25px;

            align-items: center;
        }

        nav a {

            color: white;

            text-decoration: none;

            font-size: 14px;

            font-weight: 500;

            transition: 0.3s;
        }

        nav a:hover {

            color: #7ea2d6;
        }

        .btn-nav {

            background-color: #7ea2d6;

            color: #143d75 !important;

            padding: 9px 18px;

            border-radius: 30px;

            font-weight: 700 !important;
        }

        /* =====================================================
           HERO
        ===================================================== */

        .hero {

            background-color: #143d75;

            color: white;

            text-align: center;

            padding: 65px 20px 100px;
        }

        .tag {

            display: inline-block;

            background-color:
                rgba(126, 162, 214, 0.2);

            border: 1px solid #7ea2d6;

            color: #dce6f5;

            padding: 7px 18px;

            border-radius: 50px;

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
           CONTAINER
        ===================================================== */

        .orcamento-container {

            width: 90%;

            max-width: 1100px;

            margin: -55px auto 70px;

            position: relative;
        }

        .orcamento-grid {

            display: grid;

            grid-template-columns: 1.4fr 0.8fr;

            gap: 25px;

            align-items: start;
        }

        /* =====================================================
           FORMULÁRIO
        ===================================================== */

        .formulario {

            background-color: white;

            padding: 35px;

            border-radius: 22px;

            box-shadow:
                0 10px 30px
                rgba(20, 61, 117, 0.12);
        }

        .formulario h2 {

            color: #143d75;

            margin-bottom: 8px;

            font-size: 25px;
        }

        .formulario > p {

            color: #667b96;

            font-size: 14px;

            margin-bottom: 25px;
        }

        .campo {

            margin-bottom: 20px;
        }

        .campo label {

            display: block;

            margin-bottom: 7px;

            color: #143d75;

            font-weight: 600;

            font-size: 14px;
        }

        .campo input,
        .campo select {

            width: 100%;

            padding: 13px 15px;

            border: 1px solid #d5e0ee;

            border-radius: 12px;

            background-color: #f8fbff;

            color: #143d75;

            font-family: "Poppins", sans-serif;

            outline: none;

            transition: 0.3s;
        }

        .campo input:focus,
        .campo select:focus {

            border-color: #7ea2d6;

            box-shadow:
                0 0 0 3px
                rgba(126, 162, 214, 0.15);
        }

        .duas-colunas {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;
        }

        .botao-calcular {

            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 50px;

            background-color: #143d75;

            color: white;

            font-family: "Poppins", sans-serif;

            font-weight: 700;

            font-size: 15px;

            cursor: pointer;

            transition: 0.3s;

            margin-top: 10px;
        }

        .botao-calcular:hover {

            background-color: #7ea2d6;

            color: #143d75;

            transform: translateY(-2px);
        }

        /* =====================================================
           RESULTADO
        ===================================================== */

        .resultado {

            background-color: #143d75;

            color: white;

            padding: 30px;

            border-radius: 22px;

            box-shadow:
                0 10px 30px
                rgba(20, 61, 117, 0.18);

            position: sticky;

            top: 100px;
        }

        .resultado h2 {

            font-size: 24px;

            margin-bottom: 8px;
        }

        .resultado-subtitulo {

            color: #c7d8f0;

            font-size: 13px;

            margin-bottom: 25px;
        }

        .resultado-vazio {

            text-align: center;

            padding: 35px 10px;

            color: #c7d8f0;

            font-size: 14px;

            line-height: 1.7;
        }

        .resultado-vazio .icone {

            font-size: 45px;

            margin-bottom: 15px;
        }

        .destino {

            background-color:
                rgba(255,255,255,0.08);

            padding: 15px;

            border-radius: 14px;

            margin-bottom: 18px;
        }

        .destino small {

            color: #7ea2d6;

            display: block;

            margin-bottom: 4px;
        }

        .destino strong {

            font-size: 18px;
        }

        .item-resultado {

            display: flex;

            justify-content: space-between;

            gap: 15px;

            padding: 12px 0;

            border-bottom:
                1px solid
                rgba(255,255,255,0.1);

            font-size: 13px;

            color: #dce6f5;
        }

        .item-resultado strong {

            color: white;

            white-space: nowrap;
        }

        .total {

            margin-top: 20px;

            padding-top: 20px;

            border-top:
                2px solid
                rgba(255,255,255,0.15);

            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        .total span {

            color: #c7d8f0;

            font-size: 14px;
        }

        .total strong {

            color: #7ea2d6;

            font-size: 26px;
        }

        .aviso {

            margin-top: 20px;

            padding: 12px;

            background-color:
                rgba(255,255,255,0.08);

            border-radius: 10px;

            color: #c7d8f0;

            font-size: 11px;

            line-height: 1.6;
        }

        /* =====================================================
           CTA
        ===================================================== */

        .cta {

            background-color: white;

            text-align: center;

            padding: 60px 20px;
        }

        .cta h2 {

            color: #143d75;

            margin-bottom: 10px;
        }

        .cta p {

            color: #667b96;

            margin-bottom: 22px;
        }

        .btn-contato {

            display: inline-block;

            background-color: #143d75;

            color: white;

            text-decoration: none;

            padding: 13px 28px;

            border-radius: 50px;

            font-weight: 700;

            transition: 0.3s;
        }

        .btn-contato:hover {

            background-color: #7ea2d6;

            color: #143d75;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        footer {

            background-color: #0b2244;

            color: #c7d8f0;

            text-align: center;

            padding: 30px 20px;

            font-size: 13px;
        }

        footer strong {

            color: white;
        }

        footer span {

            color: #7ea2d6;
        }

        /* =====================================================
           RESPONSIVIDADE
        ===================================================== */

        @media (max-width: 850px) {

            .orcamento-grid {

                grid-template-columns: 1fr;
            }

            .resultado {

                position: static;
            }
        }

        @media (max-width: 600px) {

            header {

                flex-direction: column;

                gap: 15px;

                padding: 18px 20px;
            }

            nav {

                flex-wrap: wrap;

                justify-content: center;

                gap: 12px;
            }

            .hero {

                padding: 50px 20px 90px;
            }

            .hero h1 {

                font-size: 31px;
            }

            .orcamento-container {

                width: 94%;
            }

            .formulario {

                padding: 25px 20px;
            }

            .duas-colunas {

                grid-template-columns: 1fr;
            }
        }

    </style>

</head>

<body>

    <!-- =====================================================
         HEADER
    ===================================================== -->

    <header>

        <a href="index.php" class="logo">
            Inter<span>Way</span>
        </a>

        <nav>

            <a href="index.php">
                Início
            </a>

            <a href="comunidade.php">
                Comunidade
            </a>

            <a href="escolas.php">
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

    </header>


    <!-- =====================================================
         HERO
    ===================================================== -->

    <section class="hero">

        <span class="tag">
            ✈️ PLANEJE SUA EXPERIÊNCIA
        </span>

        <h1>
            Monte seu orçamento
        </h1>

        <p>
            Escolha seu destino, hospedagem, curso e outros serviços.
            A InterWay calcula uma estimativa para você começar a
            planejar sua experiência internacional.
        </p>

    </section>


    <!-- =====================================================
         CONTEÚDO
    ===================================================== -->

    <main class="orcamento-container">

        <div class="orcamento-grid">

            <!-- =================================================
                 FORMULÁRIO
            ================================================= -->

            <section class="formulario">

                <h2>
                    Monte sua viagem
                </h2>

                <p>
                    Preencha os campos abaixo para gerar uma
                    estimativa personalizada.
                </p>

                <form
                    method="POST"
                    action=""
                >

                    <!-- DESTINO -->

                    <div class="campo">

                        <label for="destino">
                            Destino
                        </label>

                        <select
                            name="destino"
                            id="destino"
                            required
                        >

                            <option value="">
                                Selecione o destino
                            </option>

                            <option value="Canadá">
                                 Canadá
                            </option>

                            <option value="Irlanda">
                                 Irlanda
                            </option>

                            <option value="Reino Unido">
                                 Reino Unido
                            </option>

                            <option value="Austrália">
                                 Austrália
                            </option>

                            <option value="Estados Unidos">
                                 Estados Unidos
                            </option>

                        </select>

                    </div>


                    <!-- DURAÇÃO -->

                    <div class="campo">

                        <label for="duracao">
                            Duração da viagem
                        </label>

                        <select
                            name="duracao"
                            id="duracao"
                            required
                        >

                            <option value="">
                                Selecione a duração
                            </option>

                            <option value="1">
                                1 mês
                            </option>

                            <option value="3">
                                3 meses
                            </option>

                            <option value="6">
                                6 meses
                            </option>

                            <option value="12">
                                12 meses
                            </option>

                        </select>

                    </div>


                    <!-- HOSPEDAGEM -->

                    <div class="campo">

                        <label for="hospedagem">
                            Hospedagem
                        </label>

                        <select
                            name="hospedagem"
                            id="hospedagem"
                            required
                        >

                            <option value="">
                                Escolha a hospedagem
                            </option>

                            <option value="homestay">
                                🏠 Homestay
                            </option>

                            <option value="residencia">
                                🏢 Residência estudantil
                            </option>

                            <option value="hotel">
                                🏨 Hotel
                            </option>

                        </select>

                    </div>


                    <!-- CURSO -->

                    <div class="campo">

                        <label for="curso">
                            Tipo de curso
                        </label>

                        <select
                            name="curso"
                            id="curso"
                            required
                        >

                            <option value="">
                                Escolha o curso
                            </option>

                            <option value="ingles">
                                📚 Inglês
                            </option>

                            <option value="highschool">
                                🎓 High School
                            </option>

                            <option value="tecnico">
                                💼 Curso Técnico
                            </option>

                            <option value="universitario">
                                🏛️ Universitário
                            </option>

                        </select>

                    </div>


                    <!-- PASSAGEM E SEGURO -->

                    <div class="duas-colunas">

                        <div class="campo">

                            <label for="passagem">
                                Passagem
                            </label>

                            <select
                                name="passagem"
                                id="passagem"
                                required
                            >

                                <option value="">
                                    Selecione
                                </option>

                                <option value="economica">
                                    ✈️ Econômica
                                </option>

                                <option value="executiva">
                                    ✈️ Executiva
                                </option>

                            </select>

                        </div>


                        <div class="campo">

                            <label for="seguro">
                                Seguro viagem
                            </label>

                            <select
                                name="seguro"
                                id="seguro"
                                required
                            >

                                <option value="">
                                    Selecione
                                </option>

                                <option value="basico">
                                    🛡️ Básico
                                </option>

                                <option value="completo">
                                    🛡️ Completo
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- TRANSFER -->

                    <div class="campo">

                        <label for="transfer">
                            Transfer do aeroporto
                        </label>

                        <select
                            name="transfer"
                            id="transfer"
                            required
                        >

                            <option value="">
                                Selecione
                            </option>

                            <option value="sim">
                                🚐 Sim
                            </option>

                            <option value="nao">
                                Não
                            </option>

                        </select>

                    </div>


                    <button
                        type="submit"
                        class="botao-calcular"
                    >

                        Calcular orçamento

                    </button>

                </form>

            </section>


            <!-- =================================================
                 RESULTADO
            ================================================= -->

            <aside class="resultado">

                <h2>
                    Seu orçamento
                </h2>

                <p class="resultado-subtitulo">
                    Estimativa inicial da sua viagem.
                </p>


                <?php if ($orcamento === null): ?>

                    <div class="resultado-vazio">

                        <div class="icone">
                            ✈️
                        </div>

                        <p>
                            Preencha o formulário ao lado
                            para visualizar uma estimativa
                            do seu intercâmbio.
                        </p>

                    </div>

                <?php else: ?>

                    <div class="destino">

                        <small>
                            DESTINO
                        </small>

                        <strong>
                            <?= htmlspecialchars($orcamento["destino"]) ?>
                        </strong>

                        <br>

                        <small>
                            <?= $orcamento["duracao"] ?> mês(es)
                        </small>

                    </div>


                    <div class="item-resultado">

                        <span>
                            🏠 Hospedagem
                        </span>

                        <strong>
                            R$
                            <?= number_format(
                                $orcamento["hospedagem"],
                                2,
                                ",",
                                "."
                            ) ?>
                        </strong>

                    </div>


                    <div class="item-resultado">

                        <span>
                            📚 Curso
                        </span>

                        <strong>
                            R$
                            <?= number_format(
                                $orcamento["curso"],
                                2,
                                ",",
                                "."
                            ) ?>
                        </strong>

                    </div>


                    <div class="item-resultado">

                        <span>
                            ✈️ Passagem
                        </span>

                        <strong>
                            R$
                            <?= number_format(
                                $orcamento["passagem"],
                                2,
                                ",",
                                "."
                            ) ?>
                        </strong>

                    </div>


                    <div class="item-resultado">

                        <span>
                            🛡️ Seguro
                        </span>

                        <strong>
                            R$
                            <?= number_format(
                                $orcamento["seguro"],
                                2,
                                ",",
                                "."
                            ) ?>
                        </strong>

                    </div>


                    <div class="item-resultado">

                        <span>
                            🚐 Transfer
                        </span>

                        <strong>
                            R$
                            <?= number_format(
                                $orcamento["transfer"],
                                2,
                                ",",
                                "."
                            ) ?>
                        </strong>

                    </div>


                    <div class="total">

                        <span>
                            TOTAL ESTIMADO
                        </span>

                        <strong>

                            R$
                            <?= number_format(
                                $orcamento["total"],
                                2,
                                ",",
                                "."
                            ) ?>

                        </strong>

                    </div>


                    <div class="aviso">

                        ⚠️ Este valor é apenas uma
                        estimativa. Os preços reais podem
                        variar de acordo com período,
                        disponibilidade, câmbio, instituição
                        e condições do serviço.

                    </div>

                <?php endif; ?>

            </aside>

        </div>

    </main>


    <!-- =====================================================
         CTA
    ===================================================== -->

    <section class="cta">

        <h2>
            Quer um orçamento personalizado?
        </h2>

        <p>
            Fale com a equipe InterWay e receba ajuda
            para organizar sua experiência internacional.
        </p>

        <a
            href="index.php#contato"
            class="btn-contato"
        >
            Falar com a InterWay
        </a>

    </section>


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

</body>

</html>