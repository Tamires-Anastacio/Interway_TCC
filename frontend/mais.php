<?php
// Página "Mais" da plataforma InterWay
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mais | InterWay</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eaf1fa;
            color: #143d75;
            min-height: 100vh;
            padding: 40px 20px;
        }

        /* =========================
           BOTÃO VOLTAR
        ========================= */

        .voltar {

            position: fixed;

            top: 25px;
            left: 25px;

            width: 50px;
            height: 50px;

            display: flex;
            align-items: center;
            justify-content: center;

            background-color: #143d75;
            color: white;

            border-radius: 50%;

            text-decoration: none;

            font-size: 25px;
            font-weight: bold;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);

            transition: 0.3s;

            z-index: 1000;
        }

        .voltar:hover {

            background-color: #7ea2d6;

            color: #143d75;

            transform: translateX(-4px);
        }

        /* =========================
           TÍTULO
        ========================= */

        h1 {

            text-align: center;

            margin: 20px 0 45px;

            font-size: 2.4rem;

            color: #143d75;
        }

        h1 span {
            color: #7ea2d6;
        }

        /* =========================
           CARDS
        ========================= */

        .opcoes {

            width: 90%;

            max-width: 1100px;

            margin: 0 auto;

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 25px;
        }

        .box-opcao {

            background-color: white;

            padding: 30px;

            min-height: 190px;

            border-radius: 20px;

            text-decoration: none;

            color: #143d75;

            box-shadow: 0 6px 16px rgba(20, 61, 117, 0.12);

            border: 2px solid transparent;

            transition: all 0.3s ease;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }

        .box-opcao:hover {

            transform: translateY(-8px);

            border-color: #7ea2d6;

            box-shadow: 0 12px 25px rgba(20, 61, 117, 0.2);
        }

        .box-opcao h2 {

            margin-bottom: 15px;

            font-size: 1.35rem;

            color: #143d75;
        }

        .box-opcao p {

            color: #556c8d;

            font-size: 0.95rem;

            line-height: 1.6;
        }

        /* =========================
           RESPONSIVIDADE
        ========================= */

        @media (max-width: 900px) {

            .opcoes {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 600px) {

            body {
                padding: 30px 15px;
            }

            h1 {

                font-size: 1.9rem;

                margin-top: 45px;
            }

            .opcoes {

                grid-template-columns: 1fr;

                width: 100%;
            }

            .voltar {

                top: 15px;

                left: 15px;

                width: 45px;

                height: 45px;

                font-size: 22px;
            }

        }

    </style>

</head>

<body>

    <!-- =========================
         BOTÃO VOLTAR
    ========================= -->

    <a href="index.php"
       class="voltar"
       title="Voltar ao menu">

        ←

    </a>


    <!-- =========================
         TÍTULO
    ========================= -->

    <h1>

        Explore nossas
        <span>opções</span>

    </h1>


    <!-- =========================
         OPÇÕES
    ========================= -->

    <div class="opcoes">


        <!-- Bolsas -->

        <a href="bolsas.php"
           class="box-opcao">

            <h2>
                Bolsas de Estudos
            </h2>

            <p>
                Encontre oportunidades de bolsas de estudos.
            </p>

        </a>


        <!-- Idiomas -->

        <a href="idiomas.php"
           class="box-opcao">

            <h2>
                Intercâmbio de Idiomas
            </h2>

            <p>
                Aprenda um novo idioma vivendo no exterior.
            </p>

        </a>


        <!-- Trabalho -->

        <a href="trabalho.php"
           class="box-opcao">

            <h2>
                Intercâmbio a Trabalho
            </h2>

            <p>
                Encontre oportunidades de trabalho no exterior.
            </p>

        </a>


        <!-- Host Families -->

        <a href="host-families.php"
           class="box-opcao">

            <h2>
                Host Families
            </h2>

            <p>
                Encontre famílias para sua experiência de intercâmbio.
            </p>

        </a>


        <!-- High School -->

        <a href="highschool.php"
           class="box-opcao">

            <h2>
                High School
            </h2>

            <p>
                Faça o ensino médio em outro país.
            </p>

        </a>


        <!-- Quiz -->

        <a href="quiz.php"
           class="box-opcao">

            <h2>
                Quiz
            </h2>

            <p>
                Descubra mais sobre seu perfil de intercâmbio.
            </p>

        </a>


        <!-- Chat -->

        <a href="chats.php"
           class="box-opcao">

            <h2>
                Chat
            </h2>

            <p>
                Tire suas dúvidas e se comunique com intercambistas.
            </p>

        </a>

        <a href="escolas.php"
           class="box-opcao">

            <h2>
                Escolas de idioma
            </h2>

            <p>
                Cursos de idiomas profissionalizantes.
            </p>

        </a>

        <a href="orcamento.php"
           class="box-opcao">

            <h2>
                Orçamento
            </h2>

            <p>
                Cursos de idiomas profissionalizantes.
            </p>

        </a>



    </div>

</body>

</html>