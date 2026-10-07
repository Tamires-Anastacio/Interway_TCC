<?php
require_once "../backend/conexao.php";

$erro = "";
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";
    $confirmar_senha = $_POST["confirmar_senha"] ?? "";

    if (empty($nome) || empty($email) || empty($senha) || empty($confirmar_senha)) {

        $erro = "Preencha todos os campos.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $erro = "Digite um e-mail válido.";

    } elseif ($senha !== $confirmar_senha) {

        $erro = "As senhas não são iguais.";

    } elseif (strlen($senha) < 6) {

        $erro = "A senha deve ter pelo menos 6 caracteres.";

    } else {

        try {

            // Verifica se o e-mail já existe
            $sql = "SELECT id FROM usuarios WHERE email = :email LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ":email" => $email
            ]);

            if ($stmt->fetch()) {

                $erro = "Este e-mail já está cadastrado.";

            } else {

                // Criptografa a senha
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

                // Cadastra o usuário
                $sql = "INSERT INTO usuarios (nome, email, senha)
                        VALUES (:nome, :email, :senha)";

                $stmt = $pdo->prepare($sql);

                $stmt->execute([
                    ":nome" => $nome,
                    ":email" => $email,
                    ":senha" => $senha_hash
                ]);

                $sucesso = "Cadastro realizado com sucesso!";

                // Limpa os campos
                $nome = "";
                $email = "";
            }

        } catch (PDOException $e) {

            $erro = "Erro ao realizar o cadastro. Tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro | Interway</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            min-height: 100vh;

            background:
                radial-gradient(circle at top left, #1e4f91, transparent 35%),
                linear-gradient(135deg, #071a33, #0b2f5b);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            min-height: 600px;

            display: flex;

            background: #ffffff;

            border-radius: 25px;

            overflow: hidden;

            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.30);
        }

        /* LADO ESQUERDO */

        .lado-esquerdo {
            width: 45%;

            background:
                linear-gradient(
                    160deg,
                    #0b3d7a,
                    #1261b3
                );

            color: white;

            padding: 55px 45px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-size: 32px;
            font-weight: 700;

            margin-bottom: 35px;
        }

        .logo span {
            color: #5fc9ff;
        }

        .lado-esquerdo h1 {
            font-size: 34px;
            line-height: 1.2;

            margin-bottom: 20px;
        }

        .lado-esquerdo p {
            color: #d9edff;

            line-height: 1.7;

            margin-bottom: 30px;
        }

        .beneficios {
            list-style: none;
        }

        .beneficios li {
            margin-bottom: 15px;

            color: #ffffff;
        }

        .beneficios li::before {
            content: "✓";

            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 25px;
            height: 25px;

            margin-right: 10px;

            background: #38bdf8;

            border-radius: 50%;

            font-weight: bold;
        }

        /* LADO DIREITO */

        .lado-direito {
            width: 55%;

            padding: 50px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .titulo {
            margin-bottom: 30px;
        }

        .titulo h2 {
            color: #0b2f5b;

            font-size: 30px;

            margin-bottom: 8px;
        }

        .titulo p {
            color: #64748b;

            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            margin-bottom: 7px;

            color: #1e293b;

            font-size: 14px;

            font-weight: 600;
        }

        .form-group input {
            width: 100%;

            padding: 14px 16px;

            border: 1px solid #cbd5e1;

            border-radius: 10px;

            outline: none;

            font-family: "Poppins", sans-serif;

            font-size: 14px;

            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #1d4ed8;

            box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.12);
        }

        .botao {
            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 10px;

            background: linear-gradient(
                135deg,
                #1d4ed8,
                #0ea5e9
            );

            color: white;

            font-family: "Poppins", sans-serif;

            font-size: 15px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.3s;

            margin-top: 5px;
        }

        .botao:hover {
            transform: translateY(-2px);

            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.30);
        }

        .mensagem {
            padding: 12px 15px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 14px;

            text-align: center;
        }

        .erro {
            background: #fee2e2;

            color: #991b1b;

            border: 1px solid #fecaca;
        }

        .sucesso {
            background: #dcfce7;

            color: #166534;

            border: 1px solid #bbf7d0;
        }

        .login-link {
            text-align: center;

            margin-top: 25px;

            color: #64748b;

            font-size: 14px;
        }

        .login-link a {
            color: #1d4ed8;

            font-weight: 600;

            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .voltar {
            text-align: center;

            margin-top: 15px;
        }

        .voltar a {
            color: #64748b;

            font-size: 13px;

            text-decoration: none;
        }

        .voltar a:hover {
            color: #1d4ed8;
        }

        /* RESPONSIVO */

        @media (max-width: 800px) {

            .container {
                flex-direction: column;

                max-width: 550px;
            }

            .lado-esquerdo {
                width: 100%;

                padding: 35px;

                min-height: 300px;
            }

            .lado-esquerdo h1 {
                font-size: 27px;
            }

            .lado-direito {
                width: 100%;

                padding: 35px;
            }
        }

    </style>
</head>

<body>

<div class="container">

    <!-- LADO ESQUERDO -->

    <div class="lado-esquerdo">

        <div class="logo">
            Inter<span>way</span>
        </div>

        <h1>
            Comece sua jornada internacional!
        </h1>

        <p>
            Crie sua conta na Interway e encontre informações,
            oportunidades e experiências para tornar seu intercâmbio
            mais simples e seguro.
        </p>

        <ul class="beneficios">

            <li>Encontre oportunidades de intercâmbio</li>

            <li>Conheça bolsas de estudo</li>

            <li>Converse com outros intercambistas</li>

            <li>Tenha acesso à comunidade Interway</li>

        </ul>

    </div>


    <!-- LADO DIREITO -->

    <div class="lado-direito">

        <div class="titulo">

            <h2>Criar conta</h2>

            <p>
                Preencha os dados abaixo para se cadastrar.
            </p>

        </div>


        <?php if (!empty($erro)): ?>

            <div class="mensagem erro">
                <?= htmlspecialchars($erro) ?>
            </div>

        <?php endif; ?>


        <?php if (!empty($sucesso)): ?>

            <div class="mensagem sucesso">
                <?= htmlspecialchars($sucesso) ?>
            </div>

        <?php endif; ?>


        <form method="POST">

            <div class="form-group">

                <label for="nome">
                    Nome completo
                </label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    placeholder="Digite seu nome"
                    value="<?= htmlspecialchars($nome ?? '') ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label for="email">
                    E-mail
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="seuemail@exemplo.com"
                    value="<?= htmlspecialchars($email ?? '') ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label for="senha">
                    Senha
                </label>

                <input
                    type="password"
                    id="senha"
                    name="senha"
                    placeholder="Mínimo de 6 caracteres"
                    required
                >

            </div>


            <div class="form-group">

                <label for="confirmar_senha">
                    Confirmar senha
                </label>

                <input
                    type="password"
                    id="confirmar_senha"
                    name="confirmar_senha"
                    placeholder="Digite a senha novamente"
                    required
                >

            </div>


            <button type="submit" class="botao">
                Criar minha conta
            </button>

        </form>


        <div class="login-link">

            Já possui uma conta?

            <a href="login.php">
                Entrar
            </a>

        </div>


        <div class="voltar">

            <a href="index.php">
                ← Voltar para o início
            </a>

        </div>

    </div>

</div>

</body>
</html>