<?php
session_start();

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if (empty($email) || empty($senha)) {
        $erro = "Preencha todos os campos.";
    } else {

        /*
         * Aqui futuramente podemos consultar o banco de dados
         * para verificar o e-mail e a senha do usuário.
         */

        $erro = "Login ainda não conectado ao banco de dados.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Interway</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <style>

        :root {
            --uni-midnight: #0a192f;
            --uni-navy: #102a4e;
            --uni-royal: #1d4ed8;
            --uni-cyan: #0ea5e9;
            --uni-cyan-hover: #38bdf8;
            --uni-ice: #f0f7ff;
            --uni-text-dark: #0f172a;
            --uni-text-muted: #64748b;
            --uni-border: #dbe5f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at top right,
                    #163e70,
                    var(--uni-midnight)
                );

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;
        }

        /* =========================
           CONTAINER
        ========================= */

        .login-container {

            width: 100%;
            max-width: 1000px;

            min-height: 600px;

            background: #ffffff;

            border-radius: 24px;

            overflow: hidden;

            display: grid;

            grid-template-columns: 1fr 1fr;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, .25);
        }

        /* =========================
           LADO ESQUERDO
        ========================= */

        .login-info {

            background:
                linear-gradient(
                    145deg,
                    var(--uni-midnight),
                    var(--uni-navy)
                );

            color: white;

            padding: 55px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }

        .logo {

            font-size: 1.8rem;

            font-weight: 800;

            color: white;

            margin-bottom: 50px;
        }

        .logo span {
            color: var(--uni-cyan);
        }

        .login-info h1 {

            font-size: 2.4rem;

            line-height: 1.2;

            margin-bottom: 20px;
        }

        .login-info p {

            color: #cbd5e1;

            line-height: 1.7;

            font-size: .95rem;

            max-width: 420px;
        }

        .benefits {

            margin-top: 35px;

            list-style: none;
        }

        .benefits li {

            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 15px;

            color: #e2e8f0;

            font-size: .9rem;
        }

        .benefits i {

            color: var(--uni-cyan);

            font-size: 1rem;
        }

        /* =========================
           LADO LOGIN
        ========================= */

        .login-form-container {

            padding: 55px 50px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }

        .login-title {

            text-align: center;

            margin-bottom: 30px;
        }

        .login-title h2 {

            color: var(--uni-midnight);

            font-size: 1.8rem;

            margin-bottom: 8px;
        }

        .login-title p {

            color: var(--uni-text-muted);

            font-size: .85rem;
        }

        /* =========================
           ERRO
        ========================= */

        .mensagem-erro {

            background: #fee2e2;

            color: #991b1b;

            border: 1px solid #fecaca;

            border-radius: 10px;

            padding: 12px;

            font-size: .82rem;

            text-align: center;

            margin-bottom: 20px;
        }

        /* =========================
           CAMPOS
        ========================= */

        .form-group {

            margin-bottom: 20px;
        }

        .form-group label {

            display: block;

            color: var(--uni-text-dark);

            font-size: .85rem;

            font-weight: 600;

            margin-bottom: 7px;
        }

        .input-wrapper {

            position: relative;
        }

        .input-wrapper i {

            position: absolute;

            left: 15px;

            top: 50%;

            transform: translateY(-50%);

            color: var(--uni-royal);
        }

        .input-wrapper input {

            width: 100%;

            padding: 13px 15px 13px 45px;

            border: 1px solid var(--uni-border);

            border-radius: 10px;

            outline: none;

            font-size: .9rem;

            transition: .3s;

            background: #f8fafc;
        }

        .input-wrapper input:focus {

            border-color: var(--uni-cyan);

            background: white;

            box-shadow:
                0 0 0 3px rgba(14, 165, 233, .1);
        }

        /* =========================
           OPÇÕES
        ========================= */

        .form-options {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

            font-size: .78rem;
        }

        .remember {

            display: flex;

            align-items: center;

            gap: 6px;

            color: var(--uni-text-muted);
        }

        .forgot-password {

            color: var(--uni-royal);

            text-decoration: none;

            font-weight: 600;
        }

        .forgot-password:hover {
            color: var(--uni-cyan);
        }

        /* =========================
           BOTÃO
        ========================= */

        .btn-login {

            width: 100%;

            border: none;

            padding: 13px;

            border-radius: 50px;

            background:
                linear-gradient(
                    135deg,
                    var(--uni-cyan),
                    var(--uni-royal)
                );

            color: white;

            font-size: .95rem;

            font-weight: 700;

            cursor: pointer;

            transition: .3s;
        }

        .btn-login:hover {

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(29, 78, 216, .25);
        }

        /* =========================
           CADASTRO
        ========================= */

        .register {

            text-align: center;

            margin-top: 25px;

            color: var(--uni-text-muted);

            font-size: .82rem;
        }

        .register a {

            color: var(--uni-royal);

            font-weight: 700;

            text-decoration: none;
        }

        .register a:hover {
            color: var(--uni-cyan);
        }

        /* =========================
           VOLTAR
        ========================= */

        .back-home {

            text-align: center;

            margin-top: 18px;
        }

        .back-home a {

            color: var(--uni-text-muted);

            text-decoration: none;

            font-size: .8rem;
        }

        .back-home a:hover {
            color: var(--uni-royal);
        }

        /* =========================
           RESPONSIVO
        ========================= */

        @media (max-width: 750px) {

            body {
                padding: 15px;
            }

            .login-container {
                grid-template-columns: 1fr;
            }

            .login-info {
                padding: 35px;
                text-align: center;
            }

            .logo {
                margin-bottom: 25px;
            }

            .login-info h1 {
                font-size: 1.8rem;
            }

            .benefits {
                display: none;
            }

            .login-form-container {
                padding: 40px 30px;
            }
        }

    </style>

</head>

<body>

    <div class="login-container">

        <!-- LADO ESQUERDO -->

        <section class="login-info">

            <div class="logo">

                <i class="fa-solid fa-graduation-cap"></i>

                INTER<span>WAY</span>

            </div>

            <h1>
                Bem-vindo de volta!
            </h1>

            <p>
                Entre na sua conta para acessar a comunidade,
                bolsas de estudo, escolas e ferramentas para
                planejar seu intercâmbio.
            </p>

            <ul class="benefits">

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Acesse a comunidade de intercambistas
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Consulte oportunidades de bolsas
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Converse com o assistente de IA
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Organize sua jornada internacional
                </li>

            </ul>

        </section>


        <!-- FORMULÁRIO -->

        <section class="login-form-container">

            <div class="login-title">

                <h2>
                    Entrar
                </h2>

                <p>
                    Acesse sua conta Interway
                </p>

            </div>


            <?php if (!empty($erro)): ?>

                <div class="mensagem-erro">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <?= htmlspecialchars($erro) ?>

                </div>

            <?php endif; ?>


            <form method="POST" action="login.php">

                <div class="form-group">

                    <label for="email">
                        E-mail
                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-envelope"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="seuemail@email.com"
                            required
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label for="senha">
                        Senha
                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock"></i>

                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                            required
                        >

                    </div>

                </div>


                <div class="form-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="lembrar"
                        >

                        Lembrar de mim

                    </label>

                    <a href="#" class="forgot-password">
                        Esqueci minha senha
                    </a>

                </div>


                <button type="submit" class="btn-login">

                    <i class="fa-solid fa-right-to-bracket"></i>

                    Entrar na conta

                </button>

            </form>


            <div class="register">

                Ainda não possui uma conta?

                <a href="cadastro.php">
                    Criar conta
                </a>

            </div>


            <div class="back-home">

                <a href="index.php">

                    <i class="fa-solid fa-arrow-left"></i>

                    Voltar para o início

                </a>

            </div>

        </section>

    </div>

</body>

</html>