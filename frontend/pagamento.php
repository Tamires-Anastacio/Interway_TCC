<?php

session_start();

/*
|--------------------------------------------------------------------------
| PLANOS DISPONÍVEIS
|--------------------------------------------------------------------------
*/

$planos = [
    "explorador" => [
        "nome" => "Explorador",
        "preco" => 0.00,
        "descricao" => "Para quem está começando a pesquisar sobre intercâmbio."
    ],

    "plus" => [
        "nome" => "InterWay Plus",
        "preco" => 19.90,
        "descricao" => "Para estudantes que querem mais recursos para planejar o intercâmbio."
    ],

    "premium" => [
        "nome" => "InterWay Premium",
        "preco" => 39.90,
        "descricao" => "Para quem quer uma experiência completa no planejamento do intercâmbio."
    ]
];


/*
|--------------------------------------------------------------------------
| RECEBE O PLANO
|--------------------------------------------------------------------------
*/

$planoSelecionado = $_GET["plano"] ?? $_POST["plano"] ?? "premium";

if (!array_key_exists($planoSelecionado, $planos)) {
    $planoSelecionado = "premium";
}

$plano = $planos[$planoSelecionado];

$mensagem = "";
$erro = "";


/*
|--------------------------------------------------------------------------
| PROCESSAMENTO DO FORMULÁRIO
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $numero = trim($_POST["numero"] ?? "");
    $validade = trim($_POST["validade"] ?? "");
    $cvv = trim($_POST["cvv"] ?? "");

    if (
        empty($nome) ||
        empty($email) ||
        empty($numero) ||
        empty($validade) ||
        empty($cvv)
    ) {

        $erro = "Preencha todos os campos.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $erro = "Digite um e-mail válido.";

    } elseif ($plano["preco"] == 0) {

        $mensagem = "Plano Explorador ativado com sucesso!";

    } else {

        /*
        |--------------------------------------------------------------------------
        | PAGAMENTO SIMULADO
        |--------------------------------------------------------------------------
        |
        | Aqui futuramente você poderá integrar:
        |
        | - Mercado Pago
        | - Stripe
        | - PagSeguro
        | - Outro gateway
        |
        */

        $mensagem = "Pagamento do plano " . $plano["nome"] . " enviado para processamento!";

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
        Pagamento | InterWay
    </title>


    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =====================================================
           BODY
        ===================================================== */

        body {

            font-family: "Poppins", sans-serif;

            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    #071a33,
                    #143d75
                );

            color: #143d75;

            padding: 40px 20px;

        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .container {

            width: 100%;

            max-width: 1050px;

            margin: 0 auto;

            display: grid;

            grid-template-columns: 0.9fr 1.1fr;

            background-color: white;

            border-radius: 25px;

            overflow: hidden;

            box-shadow:
                0 20px 50px
                rgba(0, 0, 0, 0.30);

        }


        /* =====================================================
           LADO ESQUERDO
        ===================================================== */

        .resumo {

            background:
                linear-gradient(
                    160deg,
                    #0b3d7a,
                    #1261b3
                );

            color: white;

            padding: 50px;

            display: flex;

            flex-direction: column;

            justify-content: center;

        }


        .logo {

            font-size: 30px;

            font-weight: 800;

            margin-bottom: 50px;

        }


        .logo span {

            color: #7ea2d6;

        }


        .resumo h1 {

            font-size: 32px;

            line-height: 1.2;

            margin-bottom: 15px;

        }


        .resumo > p {

            color: #dce6f5;

            line-height: 1.7;

            margin-bottom: 35px;

        }


        /* =====================================================
           CARD DO PLANO
        ===================================================== */

        .plano-card {

            background:
                rgba(255, 255, 255, 0.10);

            border:
                1px solid
                rgba(255, 255, 255, 0.20);

            border-radius: 18px;

            padding: 25px;

        }


        .plano-card h2 {

            font-size: 22px;

            margin-bottom: 8px;

        }


        .plano-card p {

            color: #dce6f5;

            font-size: 14px;

            line-height: 1.6;

        }


        .preco {

            margin-top: 25px;

        }


        .preco strong {

            font-size: 38px;

        }


        .preco span {

            color: #dce6f5;

            font-size: 14px;

        }


        .beneficios {

            list-style: none;

            margin-top: 30px;

        }


        .beneficios li {

            margin-bottom: 12px;

            font-size: 14px;

            color: #f0f6ff;

        }


        .beneficios li::before {

            content: "✓";

            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: 22px;

            height: 22px;

            background-color: #7ea2d6;

            color: #143d75;

            border-radius: 50%;

            margin-right: 8px;

            font-weight: bold;

        }


        /* =====================================================
           LADO DIREITO
        ===================================================== */

        .pagamento {

            padding: 50px;

        }


        .titulo {

            margin-bottom: 30px;

        }


        .titulo h2 {

            font-size: 28px;

            color: #143d75;

            margin-bottom: 5px;

        }


        .titulo p {

            color: #64748b;

            font-size: 14px;

        }


        /* =====================================================
           MENSAGENS
        ===================================================== */

        .mensagem,
        .erro {

            padding: 14px;

            border-radius: 10px;

            margin-bottom: 20px;

            text-align: center;

            font-size: 14px;

        }


        .mensagem {

            background-color: #dcfce7;

            color: #166534;

            border: 1px solid #bbf7d0;

        }


        .erro {

            background-color: #fee2e2;

            color: #991b1b;

            border: 1px solid #fecaca;

        }


        /* =====================================================
           FORMULÁRIO
        ===================================================== */

        .grupo {

            margin-bottom: 18px;

        }


        .grupo label {

            display: block;

            margin-bottom: 7px;

            color: #1e293b;

            font-size: 14px;

            font-weight: 600;

        }


        .grupo input {

            width: 100%;

            padding: 13px 15px;

            border:
                1px solid
                #cbd5e1;

            border-radius: 10px;

            outline: none;

            font-family:
                "Poppins",
                sans-serif;

            font-size: 14px;

            transition: 0.3s;

        }


        .grupo input:focus {

            border-color: #1d4ed8;

            box-shadow:
                0 0 0 3px
                rgba(29, 78, 216, 0.10);

        }


        .linha {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;

        }


        /* =====================================================
           CARTÃO
        ===================================================== */

        .cartao-info {

            background-color: #f8fafc;

            padding: 15px;

            border-radius: 10px;

            margin-bottom: 20px;

            color: #64748b;

            font-size: 12px;

        }


        /* =====================================================
           BOTÃO
        ===================================================== */

        .botao {

            width: 100%;

            padding: 15px;

            border: none;

            border-radius: 50px;

            background:
                linear-gradient(
                    135deg,
                    #1d4ed8,
                    #0ea5e9
                );

            color: white;

            font-family:
                "Poppins",
                sans-serif;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.3s;

            margin-top: 5px;

        }


        .botao:hover {

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px
                rgba(14, 165, 233, 0.30);

        }


        /* =====================================================
           VOLTAR
        ===================================================== */

        .voltar {

            display: block;

            text-align: center;

            margin-top: 20px;

            color: #64748b;

            text-decoration: none;

            font-size: 13px;

        }


        .voltar:hover {

            color: #1d4ed8;

        }


        /* =====================================================
           SEGURANÇA
        ===================================================== */

        .seguranca {

            text-align: center;

            margin-top: 25px;

            color: #94a3b8;

            font-size: 12px;

        }


        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media (max-width: 800px) {

            .container {

                grid-template-columns: 1fr;

            }


            .resumo {

                padding: 35px;

            }


            .logo {

                margin-bottom: 30px;

            }


            .pagamento {

                padding: 35px;

            }

        }


        @media (max-width: 500px) {

            body {

                padding: 15px;

            }


            .resumo,
            .pagamento {

                padding: 25px;

            }


            .resumo h1 {

                font-size: 27px;

            }


            .linha {

                grid-template-columns: 1fr;

                gap: 0;

            }

        }

    </style>

</head>


<body>


<div class="container">


    <!-- =====================================================
         RESUMO DO PLANO
    ===================================================== -->

    <section class="resumo">


        <div class="logo">

            Inter<span>Way</span>

        </div>


        <h1>

            Finalize sua assinatura

        </h1>


        <p>

            Você está a um passo de ter acesso aos recursos
            do seu plano InterWay.

        </p>


        <div class="plano-card">


            <h2>

                <?= htmlspecialchars($plano["nome"]) ?>

            </h2>


            <p>

                <?= htmlspecialchars($plano["descricao"]) ?>

            </p>


            <div class="preco">

                <?php if ($plano["preco"] == 0): ?>

                    <strong>
                        Grátis
                    </strong>

                <?php else: ?>

                    <strong>
                        R$ <?= number_format(
                            $plano["preco"],
                            2,
                            ",",
                            "."
                        ) ?>
                    </strong>

                    <span>
                        /mês
                    </span>

                <?php endif; ?>

            </div>


            <ul class="beneficios">

                <li>
                    Acesso à comunidade InterWay
                </li>

                <li>
                    Escolas parceiras
                </li>

                <li>
                    Oportunidades de intercâmbio
                </li>

                <?php if ($planoSelecionado !== "explorador"): ?>

                    <li>
                        Recursos exclusivos do plano
                    </li>

                <?php endif; ?>

                <?php if ($planoSelecionado === "premium"): ?>

                    <li>
                        Consultoria personalizada
                    </li>

                    <li>
                        Atendimento exclusivo
                    </li>

                <?php endif; ?>

            </ul>


        </div>


    </section>


    <!-- =====================================================
         PAGAMENTO
    ===================================================== -->

    <section class="pagamento">


        <div class="titulo">

            <h2>
                Pagamento
            </h2>

            <p>
                Preencha seus dados para continuar.
            </p>

        </div>


        <?php if (!empty($erro)): ?>

            <div class="erro">

                <?= htmlspecialchars($erro) ?>

            </div>

        <?php endif; ?>


        <?php if (!empty($mensagem)): ?>

            <div class="mensagem">

                <?= htmlspecialchars($mensagem) ?>

            </div>

        <?php endif; ?>


        <?php if ($plano["preco"] > 0): ?>


            <div class="cartao-info">

                🔒 Seus dados de pagamento são tratados
                de forma segura.

            </div>


            <form
                method="POST"
                action="pagamento.php?plano=<?= urlencode($planoSelecionado) ?>"
            >


                <input
                    type="hidden"
                    name="plano"
                    value="<?= htmlspecialchars($planoSelecionado) ?>"
                >


                <div class="grupo">

                    <label for="nome">

                        Nome completo

                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        placeholder="Digite seu nome completo"
                        required
                    >

                </div>


                <div class="grupo">

                    <label for="email">

                        E-mail

                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="seuemail@exemplo.com"
                        required
                    >

                </div>


                <div class="grupo">

                    <label for="numero">

                        Número do cartão

                    </label>

                    <input
                        type="text"
                        id="numero"
                        name="numero"
                        placeholder="0000 0000 0000 0000"
                        maxlength="19"
                        required
                    >

                </div>


                <div class="linha">


                    <div class="grupo">

                        <label for="validade">

                            Validade

                        </label>

                        <input
                            type="text"
                            id="validade"
                            name="validade"
                            placeholder="MM/AA"
                            maxlength="5"
                            required
                        >

                    </div>


                    <div class="grupo">

                        <label for="cvv">

                            CVV

                        </label>

                        <input
                            type="password"
                            id="cvv"
                            name="cvv"
                            placeholder="123"
                            maxlength="4"
                            required
                        >

                    </div>


                </div>


                <button
                    type="submit"
                    class="botao"
                >

                    Pagar R$
                    <?= number_format(
                        $plano["preco"],
                        2,
                        ",",
                        "."
                    ) ?>

                </button>


            </form>


        <?php else: ?>


            <div class="cartao-info">

                O plano Explorador é gratuito.
                Não é necessário informar cartão de crédito.

            </div>


            <form method="POST">


                <input
                    type="hidden"
                    name="plano"
                    value="explorador"
                >


                <div class="grupo">

                    <label for="nome">

                        Nome completo

                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        placeholder="Digite seu nome completo"
                        required
                    >

                </div>


                <div class="grupo">

                    <label for="email">

                        E-mail

                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="seuemail@exemplo.com"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="botao"
                >

                    Ativar plano grátis

                </button>


            </form>


        <?php endif; ?>


        <a
            href="planos.php"
            class="voltar"
        >

            ← Voltar para os planos

        </a>


        <div class="seguranca">

            🔒 Pagamento seguro • InterWay

        </div>


    </section>


</div>


</body>

</html>

Como ligar essa página aos botões

No seu planos.php, troque os botões pelos links correspondentes:

<a href="pagamento.php?plano=explorador" class="botao-plano">
    Começar grátis
</a>

<a href="pagamento.php?plano=plus" class="botao-plano">
    Escolher Plus
</a>

<a href="pagamento.php?plano=premium" class="botao-plano">
    Escolher Premium
</a>

