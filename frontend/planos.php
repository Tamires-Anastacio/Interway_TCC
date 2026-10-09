<?php

session_start();

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $plano = $_POST["plano"] ?? "";

    $planos_validos = [
        "Explorador",
        "InterWay Plus",
        "InterWay Premium"
    ];

    if (in_array($plano, $planos_validos, true)) {

        $mensagem = "Você selecionou o plano " . $plano . ".";

    } else {

        $mensagem = "Plano inválido.";
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

    <title>Planos | InterWay</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        /* ========================================
           RESET
        ======================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* ========================================
           CONFIGURAÇÕES GERAIS
        ======================================== */

        body {
            font-family: "Poppins", sans-serif;
            background-color: #edf3fa;
            color: #143d75;
            min-height: 100vh;
        }


        /* ========================================
           CABEÇALHO
        ======================================== */

        header {
            background-color: #143d75;

            padding: 18px 7%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }


        /* LOGO */

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


        /* MENU */

        nav {
            display: flex;

            align-items: center;

            gap: 25px;
        }

        nav a {
            color: white;

            text-decoration: none;

            font-size: 0.95rem;

            font-weight: 500;

            transition: 0.3s;
        }

        nav a:hover {
            color: #7ea2d6;
        }


        /* BOTÃO DO MENU */

        .btn-contato-nav {
            background-color: #7ea2d6;

            color: #143d75 !important;

            padding: 8px 18px;

            border-radius: 30px;

            font-weight: 700 !important;
        }


        /* ========================================
           HERO
        ======================================== */

        .hero {
            background-color: #143d75;

            color: white;

            text-align: center;

            padding: 70px 20px 100px;
        }


        /* TAG */

        .tag {
            display: inline-block;

            padding: 7px 18px;

            border-radius: 50px;

            background-color: rgba(126, 162, 214, 0.2);

            border: 1px solid #7ea2d6;

            color: #dce6f5;

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 18px;
        }


        /* TÍTULO */

        .hero h1 {
            font-size: 42px;

            margin-bottom: 15px;
        }


        /* TEXTO */

        .hero p {
            max-width: 700px;

            margin: 0 auto;

            color: #dce6f5;

            line-height: 1.7;
        }


        /* ========================================
           MENSAGEM
        ======================================== */

        .mensagem {
            width: 90%;

            max-width: 800px;

            margin: 30px auto;

            padding: 15px 20px;

            background-color: #dcfce7;

            color: #166534;

            border: 1px solid #bbf7d0;

            border-radius: 12px;

            text-align: center;

            font-size: 14px;
        }


        /* ========================================
           CONTAINER DOS PLANOS
        ======================================== */

        .planos-container {
            width: 90%;

            max-width: 1150px;

            margin: -60px auto 70px;

            position: relative;
        }


        /* GRID */

        .planos {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 25px;

            align-items: stretch;
        }


        /* ========================================
           CARD DO PLANO
        ======================================== */

        .plano {
            background-color: white;

            border-radius: 22px;

            padding: 35px 30px;

            box-shadow:
                0 10px 30px rgba(20, 61, 117, 0.12);

            border: 2px solid transparent;

            display: flex;

            flex-direction: column;

            transition: 0.3s;
        }

        .plano:hover {
            transform: translateY(-8px);

            box-shadow:
                0 18px 35px rgba(20, 61, 117, 0.18);
        }


        /* ========================================
           PLANO DESTAQUE
        ======================================== */

        .plano.destaque {
            border-color: #7ea2d6;

            transform: scale(1.03);

            position: relative;
        }

        .plano.destaque:hover {
            transform: scale(1.03) translateY(-8px);
        }


        /* ========================================
           SELO
        ======================================== */

        .recomendado {
            position: absolute;

            top: -15px;

            left: 50%;

            transform: translateX(-50%);

            background-color: #143d75;

            color: white;

            padding: 6px 18px;

            border-radius: 50px;

            font-size: 12px;

            font-weight: 700;

            white-space: nowrap;
        }


        /* ========================================
           TÍTULO DO PLANO
        ======================================== */

        .plano h2 {
            color: #143d75;

            font-size: 23px;

            margin-bottom: 8px;
        }


        /* DESCRIÇÃO */

        .descricao {
            color: #667b96;

            font-size: 14px;

            min-height: 50px;
        }


        /* ========================================
           PREÇO
        ======================================== */

        .preco {
            margin: 25px 0;

            color: #143d75;
        }

        .preco strong {
            font-size: 34px;
        }

        .preco span {
            color: #71839b;

            font-size: 13px;
        }


        /* ========================================
           LINHA
        ======================================== */

        .linha {
            height: 1px;

            background-color: #e3eaf3;

            margin-bottom: 20px;
        }


        /* ========================================
           BENEFÍCIOS
        ======================================== */

        .beneficios {
            list-style: none;

            margin-bottom: 30px;

            flex-grow: 1;
        }

        .beneficios li {
            margin-bottom: 13px;

            color: #506783;

            font-size: 14px;
        }

        .beneficios li::before {
            content: "✓";

            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: 22px;

            height: 22px;

            margin-right: 9px;

            background-color: #e5eef9;

            color: #143d75;

            border-radius: 50%;

            font-weight: 700;
        }


        /* ========================================
           BOTÃO DOS PLANOS
        ======================================== */

        .botao-plano {
            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 50px;

            background-color: #143d75;

            color: white;

            font-family: "Poppins", sans-serif;

            font-weight: 700;

            cursor: pointer;

            transition: 0.3s;
        }

        .botao-plano:hover {
            background-color: #7ea2d6;

            color: #143d75;
        }


        /* BOTÃO DO PLANO DESTAQUE */

        .destaque .botao-plano {
            background-color: #7ea2d6;

            color: #143d75;
        }

        .destaque .botao-plano:hover {
            background-color: #143d75;

            color: white;
        }


        /* ========================================
           COMPARAÇÃO
        ======================================== */

        .comparacao {
            background-color: white;

            padding: 70px 20px;
        }

        .comparacao h2 {
            text-align: center;

            color: #143d75;

            margin-bottom: 35px;

            font-size: 28px;
        }


        /* CONTAINER DA TABELA */

        .tabela-container {
            width: 90%;

            max-width: 1000px;

            margin: 0 auto;

            overflow-x: auto;
        }


        /* TABELA */

        table {
            width: 100%;

            border-collapse: collapse;

            background-color: white;
        }


        /* CABEÇALHO */

        th {
            background-color: #143d75;

            color: white;

            padding: 15px;

            text-align: center;
        }


        /* CÉLULAS */

        td {
            padding: 15px;

            text-align: center;

            border-bottom: 1px solid #e4eaf2;

            color: #526984;
        }

        td:first-child {
            text-align: left;

            font-weight: 600;

            color: #143d75;
        }


        /* SIM */

        .sim {
            color: #16a34a;

            font-weight: bold;

            font-size: 18px;
        }


        /* NÃO */

        .nao {
            color: #94a3b8;

            font-size: 18px;
        }


        /* ========================================
           CTA
        ======================================== */

        .cta {
            text-align: center;

            padding: 70px 20px;

            background-color: #edf3fa;
        }

        .cta h2 {
            color: #143d75;

            margin-bottom: 12px;

            font-size: 30px;
        }

        .cta p {
            color: #627791;

            margin-bottom: 25px;
        }


        /* BOTÃO */

        .btn-contato {
            display: inline-block;

            padding: 13px 28px;

            border-radius: 50px;

            background-color: #143d75;

            color: white;

            text-decoration: none;

            font-weight: 700;

            transition: 0.3s;
        }

        .btn-contato:hover {
            background-color: #7ea2d6;

            color: #143d75;
        }


        /* ========================================
           RODAPÉ
        ======================================== */

        footer {
            background-color: #0b2244;

            color: #c7d8f0;

            padding: 30px 7%;

            text-align: center;
        }

        footer strong {
            color: white;
        }

        footer span {
            color: #7ea2d6;
        }


        /* ========================================
           RESPONSIVIDADE
        ======================================== */

        @media (max-width: 900px) {

            .planos {
                grid-template-columns: 1fr;

                max-width: 500px;

                margin: 0 auto;
            }

            .plano.destaque {
                transform: none;
            }

            .plano.destaque:hover {
                transform: translateY(-8px);
            }
        }


        @media (max-width: 600px) {

            header {
                flex-direction: column;

                gap: 15px;
            }

            nav {
                gap: 12px;

                flex-wrap: wrap;

                justify-content: center;
            }

            .hero {
                padding: 55px 20px 90px;
            }

            .hero h1 {
                font-size: 31px;
            }

            .planos-container {
                margin-top: -50px;
            }
        }

    </style>

</head>

<body>


    <!-- ========================================
         HEADER
    ======================================== -->

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
                class="btn-contato-nav"
            >
                Fale Conosco
            </a>

        </nav>

    </header>


    <!-- ========================================
         HERO
    ======================================== -->

    <section class="hero">

        <span class="tag">
            ✈️ ESCOLHA SUA EXPERIÊNCIA
        </span>

        <h1>
            Planos InterWay
        </h1>

        <p>
            Escolha o plano que mais combina com seus objetivos
            e tenha acesso a recursos para tornar sua experiência
            internacional mais simples, segura e completa.
        </p>

    </section>


    <!-- ========================================
         MENSAGEM DO PHP
    ======================================== -->

    <?php if (!empty($mensagem)): ?>

        <div class="mensagem">

            <?= htmlspecialchars($mensagem) ?>

        </div>

    <?php endif; ?>


    <!-- ========================================
         PLANOS
    ======================================== -->

    <main class="planos-container">

        <section class="planos">


            <!-- ==================================
                 PLANO EXPLORADOR
            ================================== -->

            <article class="plano">

                <h2>
                    Explorador
                </h2>

                <p class="descricao">
                    Para quem está começando a pesquisar
                    sobre intercâmbio.
                </p>

                <div class="preco">

                    <strong>
                        Grátis
                    </strong>

                </div>

                <div class="linha"></div>

                <ul class="beneficios">

                    <li>
                        Acesso à comunidade
                    </li>

                    <li>
                        Pesquisar escolas parceiras
                    </li>

                    <li>
                        Ver oportunidades de intercâmbio
                    </li>

                    <li>
                        Conteúdos educativos
                    </li>

                </ul>

                <form method="POST">

                    <input
                        type="hidden"
                        name="plano"
                        value="Explorador"
                    >

                    <button
                        type="submit"
                        class="botao-plano"
                    >
                        Começar grátis
                    </button>

                </form>

            </article>


            <!-- ==================================
                 PLANO PLUS
            ================================== -->

            <article class="plano destaque">

                <span class="recomendado">
                    MAIS ESCOLHIDO
                </span>

                <h2>
                    InterWay Plus
                </h2>

                <p class="descricao">
                    Para estudantes que querem mais recursos
                    para planejar o intercâmbio.
                </p>

                <div class="preco">

                    <strong>
                        R$ 19,90
                    </strong>

                    <span>
                        /mês
                    </span>

                </div>

                <div class="linha"></div>

                <ul class="beneficios">

                    <li>
                        Tudo do plano Explorador
                    </li>

                    <li>
                        Favoritar escolas
                    </li>

                    <li>
                        Comparar oportunidades
                    </li>

                    <li>
                        Acesso a conteúdos exclusivos
                    </li>

                    <li>
                        Perfil personalizado
                    </li>

                    <li>
                        Suporte prioritário
                    </li>

                </ul>

                <form method="POST">
                    

                    <input
                        type="hidden"
                        name="plano"
                        value="InterWay Plus"
                    >

                    <button
                        type="submit"
                        class="botao-plano"
                    >
                     <a href="pagamento.php?plano=plus" class="botao-plano">
                        Escolher Plus
                    </a>

                        
                    </button>

                </form>

            </article>


            <!-- ==================================
                 PLANO PREMIUM
            ================================== -->

            <article class="plano">

                <h2>
                    InterWay Premium
                </h2>

                <p class="descricao">
                    Para quem quer uma experiência completa
                    no planejamento do intercâmbio.
                </p>

                <div class="preco">

                    <strong>
                        R$ 39,90
                    </strong>

                    <span>
                        /mês
                    </span>

                </div>

                <div class="linha"></div>

                <ul class="beneficios">

                    <li>
                        Tudo do plano Plus
                    </li>

                    <li>
                        Consultoria personalizada
                    </li>

                    <li>
                        Análise de perfil
                    </li>

                    <li>
                        Orientação para documentação
                    </li>

                    <li>
                        Prioridade em oportunidades
                    </li>

                    <li>
                        Atendimento exclusivo
                    </li>

                </ul>

                <form method="POST">

                    <input
                        type="hidden"
                        name="plano"
                        value="InterWay Premium"
                    >
                    
                   <a href="pagamento.php?plano=plus" class="botao-plano">
                        Escolher Plus
                    </a>

                </form>

            </article>

        </section>

    </main>


    <!-- ========================================
         COMPARAÇÃO DOS PLANOS
    ======================================== -->

    <section class="comparacao">

        <h2>
            Compare os planos
        </h2>

        <div class="tabela-container">

            <table>

                <thead>

                    <tr>

                        <th>
                            Recursos
                        </th>

                        <th>
                            Explorador
                        </th>

                        <th>
                            Plus
                        </th>

                        <th>
                            Premium
                        </th>

                    </tr>

                </thead>

                <tbody>


                    <tr>

                        <td>
                            Comunidade InterWay
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                    </tr>


                    <tr>

                        <td>
                            Escolas parceiras
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                    </tr>


                    <tr>

                        <td>
                            Favoritar escolas
                        </td>

                        <td class="nao">
                            —
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                    </tr>


                    <tr>

                        <td>
                            Comparar oportunidades
                        </td>

                        <td class="nao">
                            —
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                    </tr>


                    <tr>

                        <td>
                            Conteúdos exclusivos
                        </td>

                        <td class="nao">
                            —
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                    </tr>


                    <tr>

                        <td>
                            Consultoria personalizada
                        </td>

                        <td class="nao">
                            —
                        </td>

                        <td class="nao">
                            —
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                    </tr>


                    <tr>

                        <td>
                            Suporte prioritário
                        </td>

                        <td class="nao">
                            —
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                        <td class="sim">
                            ✓
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </section>


    <!-- ========================================
         CTA
    ======================================== -->

    <section class="cta">

        <h2>
            Ainda está em dúvida?
        </h2>

        <p>
            Nossa equipe pode ajudar você a escolher
            o plano ideal para sua jornada internacional.
        </p>

        <a
            href="index.php#contato"
            class="btn-contato"
        >
            Falar com a InterWay
        </a>

    </section>


    <!-- ========================================
         FOOTER
    ======================================== -->

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