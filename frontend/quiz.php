<?php

require_once "../backend/conexao.php";

$resultado = "";
$descricao = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $clima = $_POST["clima"] ?? "";
    $objetivo = $_POST["objetivo"] ?? "";
    $idioma = $_POST["idioma"] ?? "";
    $experiencia = $_POST["experiencia"] ?? "";
    $orcamento = $_POST["orcamento"] ?? "";

    $paises = [
        "Canada" => 0,
        "Irlanda" => 0,
        "Australia" => 0,
        "Inglaterra" => 0,
        "Estados Unidos" => 0,
        "Nova Zelandia" => 0
    ];

    // CLIMA
    if ($clima === "frio") {
        $paises["Canada"] += 3;
        $paises["Inglaterra"] += 2;
    }

    if ($clima === "ameno") {
        $paises["Irlanda"] += 3;
        $paises["Inglaterra"] += 3;
        $paises["Nova Zelandia"] += 2;
    }

    if ($clima === "quente") {
        $paises["Australia"] += 3;
        $paises["Estados Unidos"] += 2;
    }

    if ($clima === "variado") {
        $paises["Estados Unidos"] += 3;
        $paises["Nova Zelandia"] += 3;
    }

    // OBJETIVO
    if ($objetivo === "estudar") {
        $paises["Canada"] += 3;
        $paises["Inglaterra"] += 3;
        $paises["Australia"] += 2;
    }

    if ($objetivo === "trabalhar") {
        $paises["Australia"] += 3;
        $paises["Irlanda"] += 3;
        $paises["Canada"] += 2;
    }

    if ($objetivo === "idioma") {
        $paises["Irlanda"] += 3;
        $paises["Inglaterra"] += 3;
        $paises["Estados Unidos"] += 3;
    }

    if ($objetivo === "highschool") {
        $paises["Canada"] += 3;
        $paises["Estados Unidos"] += 3;
        $paises["Australia"] += 2;
    }

    if ($objetivo === "turismo") {
        $paises["Australia"] += 2;
        $paises["Nova Zelandia"] += 3;
        $paises["Estados Unidos"] += 3;
    }

    // IDIOMA
    if ($idioma === "ingles") {
        $paises["Canada"] += 2;
        $paises["Irlanda"] += 2;
        $paises["Australia"] += 2;
        $paises["Inglaterra"] += 3;
        $paises["Estados Unidos"] += 3;
        $paises["Nova Zelandia"] += 2;
    }

    if ($idioma === "quero-aprender") {
        $paises["Irlanda"] += 3;
        $paises["Canada"] += 3;
        $paises["Australia"] += 3;
    }

    // EXPERIÊNCIA
    if ($experiencia === "primeira") {
        $paises["Canada"] += 3;
        $paises["Irlanda"] += 3;
    }

    if ($experiencia === "aventura") {
        $paises["Australia"] += 3;
        $paises["Nova Zelandia"] += 3;
    }

    if ($experiencia === "academica") {
        $paises["Inglaterra"] += 3;
        $paises["Canada"] += 3;
        $paises["Estados Unidos"] += 2;
    }

    // ORÇAMENTO
    if ($orcamento === "baixo") {
        $paises["Irlanda"] += 3;
        $paises["Canada"] += 2;
    }

    if ($orcamento === "medio") {
        $paises["Canada"] += 3;
        $paises["Australia"] += 2;
        $paises["Irlanda"] += 2;
    }

    if ($orcamento === "alto") {
        $paises["Estados Unidos"] += 3;
        $paises["Inglaterra"] += 3;
        $paises["Australia"] += 3;
    }

    // DESCOBRE O PAÍS
    arsort($paises);

    $pais_escolhido = array_key_first($paises);

    switch ($pais_escolhido) {

        case "Canada":
            $resultado = "Canadá";
            $descricao = "O Canadá pode ser uma ótima opção para você!";
            break;

        case "Irlanda":
            $resultado = "Irlanda";
            $descricao = "A Irlanda pode combinar bastante com seu perfil!";
            break;

        case "Australia":
            $resultado = "Austrália";
            $descricao = "A Austrália pode ser seu destino ideal!";
            break;

        case "Inglaterra":
            $resultado = "Inglaterra";
            $descricao = "A Inglaterra pode ser uma excelente escolha!";
            break;

        case "Estados Unidos":
            $resultado = "Estados Unidos";
            $descricao = "Os Estados Unidos podem ser uma ótima opção para você!";
            break;

        case "Nova Zelandia":
            $resultado = "Nova Zelândia";
            $descricao = "A Nova Zelândia pode combinar com seu perfil!";
            break;
    }

    // SALVA NO BANCO
    $sql = "INSERT INTO resultados_quiz
            (clima, objetivo, idioma, experiencia, orcamento, pais_recomendado)
            VALUES
            (:clima, :objetivo, :idioma, :experiencia, :orcamento, :pais)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":clima" => $clima,
        ":objetivo" => $objetivo,
        ":idioma" => $idioma,
        ":experiencia" => $experiencia,
        ":orcamento" => $orcamento,
        ":pais" => $resultado
    ]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quiz | InterWay</title>

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

            background: #143d75;
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
            background: #7ea2d6;
            color: #143d75;
            transform: translateX(-4px);
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
        }

        /* =========================
           TÍTULO
        ========================= */

        .titulo {
            text-align: center;
            margin-bottom: 35px;
        }

        .titulo h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .titulo h1 span {
            color: #7ea2d6;
        }

        .titulo p {
            color: #556c8d;
            font-size: 1rem;
        }

        /* =========================
           FORMULÁRIO
        ========================= */

        .quiz-box {
            background: white;
            padding: 35px;
            border-radius: 20px;

            box-shadow: 0 8px 25px rgba(20, 61, 117, 0.15);
        }

        .pergunta {
            margin-bottom: 30px;
        }

        .pergunta h2 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #143d75;
        }

        /* =========================
           OPÇÕES
        ========================= */

        .opcao {
            display: block;
            margin-bottom: 10px;
        }

        .opcao input {
            display: none;
        }

        .opcao label {
            display: block;

            padding: 15px 18px;

            background: #f3f7fc;

            border: 2px solid #dce7f5;

            border-radius: 12px;

            cursor: pointer;

            transition: 0.3s;
        }

        .opcao label:hover {
            border-color: #7ea2d6;
            background: #eaf1fa;
        }

        .opcao input:checked + label {
            background: #7ea2d6;
            border-color: #143d75;
            color: #143d75;
            font-weight: bold;
        }

        /* =========================
           BOTÃO
        ========================= */

        .btn {
            width: 100%;

            padding: 15px;

            border: none;

            border-radius: 12px;

            background: #143d75;

            color: white;

            font-size: 1rem;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;
        }

        .btn:hover {
            background: #7ea2d6;
            color: #143d75;
            transform: translateY(-2px);
        }

        /* =========================
           RESULTADO
        ========================= */

        .resultado {
            margin-top: 30px;

            background: #143d75;

            color: white;

            padding: 35px;

            border-radius: 20px;

            text-align: center;

            box-shadow: 0 8px 25px rgba(20, 61, 117, 0.25);
        }

        .resultado h2 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .resultado h3 {
            font-size: 2.2rem;
            color: #7ea2d6;
            margin-bottom: 15px;
        }

        .resultado p {
            color: #eaf1fa;
            line-height: 1.7;
        }

        .novo-quiz {
            display: inline-block;

            margin-top: 20px;

            padding: 12px 25px;

            background: white;

            color: #143d75;

            text-decoration: none;

            border-radius: 10px;

            font-weight: bold;
        }

        .novo-quiz:hover {
            background: #7ea2d6;
        }

        /* =========================
           RESPONSIVIDADE
        ========================= */

        @media (max-width: 600px) {

            body {
                padding: 20px 10px;
            }

            .container {
                width: 100%;
            }

            .quiz-box {
                padding: 25px 20px;
            }

            .titulo h1 {
                font-size: 2rem;
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

    <a href="mais.php"
       class="voltar"
       title="Voltar">

        ←

    </a>


    <div class="container">

        <!-- =========================
             TÍTULO
        ========================= -->

        <div class="titulo">

            <h1>
                Qual é o seu destino
                <span>ideal?</span>
            </h1>

            <p>
                Responda algumas perguntas e descubra qual país
                combina mais com seu perfil de intercâmbio.
            </p>

        </div>


        <!-- =========================
             QUIZ
        ========================= -->

        <form method="POST" class="quiz-box">


            <!-- PERGUNTA 1 -->

            <div class="pergunta">

                <h2>
                    1. Qual clima você prefere?
                </h2>

                <div class="opcao">
                    <input
                        type="radio"
                        id="frio"
                        name="clima"
                        value="frio"
                        required
                    >

                    <label for="frio">
                        ❄️ Frio
                    </label>
                </div>

                <div class="opcao">
                    <input
                        type="radio"
                        id="ameno"
                        name="clima"
                        value="ameno"
                    >

                    <label for="ameno">
                        🌥️ Ameno
                    </label>
                </div>

                <div class="opcao">
                    <input
                        type="radio"
                        id="quente"
                        name="clima"
                        value="quente"
                    >

                    <label for="quente">
                        ☀️ Quente
                    </label>
                </div>

                <div class="opcao">
                    <input
                        type="radio"
                        id="variado"
                        name="clima"
                        value="variado"
                    >

                    <label for="variado">
                        🌎 Não tenho preferência
                    </label>
                </div>

            </div>


            <!-- PERGUNTA 2 -->

            <div class="pergunta">

                <h2>
                    2. Qual é o principal objetivo do seu intercâmbio?
                </h2>

                <div class="opcao">
                    <input
                        type="radio"
                        id="estudar"
                        name="objetivo"
                        value="estudar"
                        required
                    >

                    <label for="estudar">
                        🎓 Estudar
                    </label>
                </div>

                <div class="opcao">
                    <input
                        type="radio"
                        id="trabalhar"
                        name="objetivo"
                        value="trabalhar"
                    >

                    <label for="trabalhar">
                        💼 Trabalhar
                    </label>
                </div>

                <div class="opcao">
                    <input
                        type="radio"
                        id="idioma"
                        name="objetivo"
                        value="idioma"
                    >

                    <label for="idioma">
                        🗣️ Aprender um idioma
                    </label>
                </div>

                <div class="opcao">
                    <input
                        type="radio"
                        id="highschool"
                        name="objetivo"
                        value="highschool"
                    >

                    <label for="highschool">
                        🏫 Fazer High School
                    </label>
                </div>

                <div class="opcao">
                    <input
                        type="radio"
                        id="turismo"
                        name="objetivo"
                        value="turismo"
                    >

                    <label for="turismo">
                        ✈️ Conhecer outro país
                    </label>
                </div>

            </div>


            <!-- PERGUNTA 3 -->

            <div class="pergunta">

                <h2>
                    3. Qual idioma você gostaria de estudar?
                </h2>

                <div class="opcao">

                    <input
                        type="radio"
                        id="ingles"
                        name="idioma"
                        value="ingles"
                        required
                    >

                    <label for="ingles">
                        🇬🇧 Inglês
                    </label>

                </div>

                <div class="opcao">

                    <input
                        type="radio"
                        id="quero-aprender"
                        name="idioma"
                        value="quero-aprender"
                    >

                    <label for="quero-aprender">
                        🌎 Quero aprender um novo idioma
                    </label>

                </div>

            </div>


            <!-- PERGUNTA 4 -->

            <div class="pergunta">

                <h2>
                    4. Que tipo de experiência você procura?
                </h2>

                <div class="opcao">

                    <input
                        type="radio"
                        id="primeira"
                        name="experiencia"
                        value="primeira"
                        required
                    >

                    <label for="primeira">
                        🌱 Minha primeira experiência internacional
                    </label>

                </div>

                <div class="opcao">

                    <input
                        type="radio"
                        id="aventura"
                        name="experiencia"
                        value="aventura"
                    >

                    <label for="aventura">
                        🏔️ Aventura e novas experiências
                    </label>

                </div>

                <div class="opcao">

                    <input
                        type="radio"
                        id="academica"
                        name="experiencia"
                        value="academica"
                    >

                    <label for="academica">
                        📚 Foco acadêmico
                    </label>

                </div>

            </div>


            <!-- PERGUNTA 5 -->

            <div class="pergunta">

                <h2>
                    5. Como você considera seu orçamento?
                </h2>

                <div class="opcao">

                    <input
                        type="radio"
                        id="baixo"
                        name="orcamento"
                        value="baixo"
                        required
                    >

                    <label for="baixo">
                        💰 Quero economizar
                    </label>

                </div>

                <div class="opcao">

                    <input
                        type="radio"
                        id="medio"
                        name="orcamento"
                        value="medio"
                    >

                    <label for="medio">
                        💰💰 Orçamento intermediário
                    </label>

                </div>

                <div class="opcao">

                    <input
                        type="radio"
                        id="alto"
                        name="orcamento"
                        value="alto"
                    >

                    <label for="alto">
                        💰💰💰 Tenho maior flexibilidade
                    </label>

                </div>

            </div>


            <!-- BOTÃO -->

            <button
                type="submit"
                class="btn"
            >
                Descobrir meu destino
            </button>

        </form>


        <!-- =========================
             RESULTADO
        ========================= -->

        <?php if ($resultado !== ""): ?>

            <div class="resultado">

                <h2>
                    Seu destino recomendado é:
                </h2>

                <h3>
                    <?= htmlspecialchars($resultado) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($descricao) ?>
                </p>

                <a
                    href="quiz.php"
                    class="novo-quiz"
                >
                    Fazer o quiz novamente
                </a>

            </div>

        <?php endif; ?>

    </div>

</body>

</html>