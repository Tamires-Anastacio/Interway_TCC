<?php

/*
|--------------------------------------------------------------------------
| DADOS DOS DESTINOS
|--------------------------------------------------------------------------
| Futuramente esses dados podem vir diretamente do banco de dados.
*/

$destinos = [
    [
        "nome" => "Estados Unidos",
        "bandeira" => "🇺🇸",
        "descricao" => "Viva a experiência de estudar em uma escola americana e conhecer a cultura dos Estados Unidos.",
        "link" => "bolsas.php?pais=Estados Unidos"
    ],

    [
        "nome" => "Canadá",
        "bandeira" => "🇨🇦",
        "descricao" => "Estude em escolas canadenses e conheça um ambiente multicultural.",
        "link" => "bolsas.php?pais=Canadá"
    ],

    [
        "nome" => "Inglaterra",
        "bandeira" => "🇬🇧",
        "descricao" => "Aprimore seu inglês enquanto estuda e conhece a cultura britânica.",
        "link" => "bolsas.php?pais=Inglaterra"
    ],

    [
        "nome" => "Austrália",
        "bandeira" => "🇦🇺",
        "descricao" => "Estude na Austrália e tenha uma experiência escolar em um novo ambiente.",
        "link" => "bolsas.php?pais=Austrália"
    ],

    [
        "nome" => "Nova Zelândia",
        "bandeira" => "🇳🇿",
        "descricao" => "Conheça o sistema escolar neozelandês enquanto vive uma experiência internacional.",
        "link" => "bolsas.php?pais=Nova Zelândia"
    ],

    [
        "nome" => "Alemanha",
        "bandeira" => "🇩🇪",
        "descricao" => "Tenha contato com a língua e a cultura alemã durante seus estudos.",
        "link" => "bolsas.php?pais=Alemanha"
    ]
];


/*
|--------------------------------------------------------------------------
| ETAPAS
|--------------------------------------------------------------------------
*/

$etapas = [
    [
        "titulo" => "1. Escolha o país",
        "descricao" => "Escolha o destino onde você gostaria de realizar seu High School."
    ],

    [
        "titulo" => "2. Escolha o programa",
        "descricao" => "Compare as opções de escolas e programas disponíveis para estudantes."
    ],

    [
        "titulo" => "3. Prepare sua viagem",
        "descricao" => "Organize sua documentação e prepare-se para viver sua experiência internacional."
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

    <title>High School | InterWay</title>


    <style>

        /* =========================
           CONFIGURAÇÕES GERAIS
        ========================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;

            background-color: #eaf1fa;

            color: #143d75;

            line-height: 1.6;
        }


        /* =========================
           BOTÃO VOLTAR
        ========================= */

        .voltar {

            position: fixed;

            top: 20px;
            left: 20px;

            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;
            justify-content: center;

            background-color: #143d75;

            color: white;

            border-radius: 50%;

            text-decoration: none;

            font-size: 25px;

            font-weight: bold;

            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.2);

            transition: 0.3s;

            z-index: 1000;
        }

        .voltar:hover {

            background-color: #7ea2d6;

            color: #143d75;

            transform: translateX(-4px);
        }


        /* =========================
           CABEÇALHO
        ========================= */

        header {

            background-color: #143d75;

            min-height: 75px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 7%;

            box-shadow:
                0 3px 10px rgba(0, 0, 0, 0.15);
        }

        header > a {

            color: white;

            text-decoration: none;

            font-size: 1.7rem;

            font-weight: bold;

            margin-left: 55px;
        }

        nav {

            display: flex;

            gap: 25px;
        }

        nav a {

            color: white;

            text-decoration: none;

            font-weight: bold;

            transition: 0.3s;
        }

        nav a:hover {

            color: #7ea2d6;
        }


        /* =========================
           INTRODUÇÃO
        ========================= */

        .introducao {

            text-align: center;

            padding: 80px 20px 60px;

            background-color: #143d75;

            color: white;
        }

        .introducao h1 {

            font-size: 3rem;

            margin-bottom: 20px;
        }

        .introducao p {

            max-width: 800px;

            margin: 0 auto;

            font-size: 1.1rem;

            color: #dce6f5;
        }


        /* =========================
           SOBRE HIGH SCHOOL
        ========================= */

        .sobre-highschool {

            max-width: 900px;

            margin: 50px auto;

            padding: 35px;

            text-align: center;

            background-color: white;

            border-radius: 20px;

            box-shadow:
                0 6px 16px
                rgba(20, 61, 117, 0.12);
        }

        .sobre-highschool h2 {

            color: #143d75;

            margin-bottom: 15px;

            font-size: 1.8rem;
        }

        .sobre-highschool p {

            color: #556c8d;

            line-height: 1.8;
        }


        /* =========================
           DESTINOS
        ========================= */

        .destinos-highschool {

            max-width: 1100px;

            margin: 0 auto;

            padding: 30px 20px 60px;
        }

        .destinos-highschool h2 {

            text-align: center;

            margin-bottom: 35px;

            font-size: 2rem;

            color: #143d75;
        }

        .cards-highschool {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;
        }


        /* =========================
           CARDS
        ========================= */

        .card-highschool {

            background-color: white;

            padding: 30px;

            border-radius: 20px;

            box-shadow:
                0 6px 16px
                rgba(20, 61, 117, 0.12);

            border: 2px solid transparent;

            transition: all 0.3s ease;
        }

        .card-highschool:hover {

            transform:
                translateY(-7px);

            border-color: #7ea2d6;

            box-shadow:
                0 12px 25px
                rgba(20, 61, 117, 0.2);
        }

        .card-highschool h3 {

            color: #143d75;

            font-size: 1.3rem;

            margin-bottom: 15px;
        }

        .card-highschool p {

            color: #556c8d;

            line-height: 1.6;
        }

        .card-highschool a {

            display: inline-block;

            margin-top: 20px;

            padding: 10px 18px;

            background-color: #143d75;

            color: white;

            text-decoration: none;

            border-radius: 50px;

            font-weight: bold;

            transition: 0.3s;
        }

        .card-highschool a:hover {

            background-color: #7ea2d6;

            color: #143d75;
        }


        /* =========================
           COMO FUNCIONA
        ========================= */

        .informacoes {

            background-color: #143d75;

            color: white;

            padding: 70px 20px;
        }

        .informacoes h2 {

            text-align: center;

            font-size: 2rem;

            margin-bottom: 40px;
        }

        .etapas {

            max-width: 1100px;

            margin: 0 auto;

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;
        }

        .etapas > div {

            background-color:
                rgba(255, 255, 255, 0.08);

            padding: 30px;

            border-radius: 20px;

            border:
                1px solid
                rgba(255, 255, 255, 0.15);
        }

        .etapas h3 {

            color: #7ea2d6;

            margin-bottom: 15px;
        }

        .etapas p {

            color: #dce6f5;
        }


        /* =========================
           BOTÃO FINAL
        ========================= */

        .final {

            text-align: center;

            padding: 40px 20px;
        }

        .final a {

            display: inline-block;

            padding: 12px 25px;

            background-color: #143d75;

            color: white;

            text-decoration: none;

            border-radius: 50px;

            font-weight: bold;

            transition: 0.3s;
        }

        .final a:hover {

            background-color: #7ea2d6;

            color: #143d75;
        }


        /* =========================
           RESPONSIVIDADE
        ========================= */

        @media (max-width: 900px) {

            .cards-highschool {

                grid-template-columns:
                    repeat(2, 1fr);
            }

            .etapas {

                grid-template-columns: 1fr;
            }
        }


        @media (max-width: 600px) {

            header {

                flex-direction: column;

                padding: 20px;

                gap: 15px;
            }

            header > a {

                margin-left: 0;
            }

            nav {

                gap: 15px;
            }

            .introducao {

                padding:
                    60px 20px 50px;
            }

            .introducao h1 {

                font-size: 2.2rem;
            }

            .cards-highschool {

                grid-template-columns: 1fr;
            }

            .sobre-highschool {

                margin:
                    30px 15px;

                padding: 25px;
            }

            .voltar {

                width: 43px;
                height: 43px;

                top: 15px;
                left: 15px;

                font-size: 22px;
            }
        }

    </style>

</head>


<body>


<!-- =========================
     SETA PARA VOLTAR AO MENU
========================= -->

<a
    href="index.php"
    class="voltar"
    title="Voltar ao menu"
>
    ←
</a>


<!-- =========================
     CABEÇALHO
========================= -->

<header>

    <a href="index.php">
        InterWay
    </a>

    <nav>

        <a href="index.php">
            Início
        </a>

        <a href="mais.php">
            Mais
        </a>

    </nav>

</header>


<main>


    <!-- =========================
         INTRODUÇÃO
    ========================= -->

    <section class="introducao">

        <h1>
            High School no Exterior
        </h1>

        <p>
            Estude em uma escola de outro país,
            conheça uma nova cultura e viva uma
            experiência internacional durante
            o ensino médio.
        </p>

    </section>


    <!-- =========================
         SOBRE
    ========================= -->

    <section class="sobre-highschool">

        <h2>
            O que é um High School?
        </h2>

        <p>
            O intercâmbio de High School permite
            que estudantes realizem parte do ensino
            médio em outro país. Durante a experiência,
            o estudante pode frequentar uma escola local,
            conhecer novos costumes e desenvolver suas
            habilidades em outro idioma.
        </p>

    </section>


    <!-- =========================
         DESTINOS
    ========================= -->

    <section class="destinos-highschool">

        <h2>
            Escolha seu destino
        </h2>


        <div class="cards-highschool">


            <?php foreach ($destinos as $destino): ?>

                <div class="card-highschool">

                    <h3>

                        <?= htmlspecialchars(
                            $destino["bandeira"]
                        ) ?>

                        <?= htmlspecialchars(
                            $destino["nome"]
                        ) ?>

                    </h3>


                    <p>

                        <?= htmlspecialchars(
                            $destino["descricao"]
                        ) ?>

                    </p>


                    <a
                        href="<?= htmlspecialchars(
                            $destino["link"]
                        ) ?>"
                    >
                        Ver oportunidades
                    </a>

                </div>

            <?php endforeach; ?>


        </div>

    </section>


    <!-- =========================
         COMO FUNCIONA
    ========================= -->

    <section class="informacoes">

        <h2>
            Como funciona?
        </h2>


        <div class="etapas">


            <?php foreach ($etapas as $etapa): ?>

                <div>

                    <h3>

                        <?= htmlspecialchars(
                            $etapa["titulo"]
                        ) ?>

                    </h3>


                    <p>

                        <?= htmlspecialchars(
                            $etapa["descricao"]
                        ) ?>

                    </p>

                </div>

            <?php endforeach; ?>


        </div>

    </section>


    <!-- =========================
         VOLTAR PARA MAIS
    ========================= -->

    <div class="final">

        <a href="mais.php">

            ← Voltar para Mais

        </a>

    </div>


</main>


</body>

</html>