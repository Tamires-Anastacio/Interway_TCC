<?php

require_once "../backend/conexao.php";

$mensagem_sucesso = "";
$mensagem_erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $mensagem = trim($_POST["mensagem"] ?? "");

    if (!empty($nome) && !empty($email) && !empty($mensagem)) {

        try {

            $sql = "INSERT INTO mensagens (nome, email, mensagem)
                    VALUES (:nome, :email, :mensagem)";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ":nome" => $nome,
                ":email" => $email,
                ":mensagem" => $mensagem
            ]);

            $mensagem_sucesso = "Mensagem enviada com sucesso!";

        } catch (PDOException $e) {

            $mensagem_erro = "Erro ao salvar a mensagem: " . $e->getMessage();

        }

    } else {

        $mensagem_erro = "Preencha todos os campos.";

    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Interway - Plataforma de Intercâmbio</title>

    <link rel="stylesheet" href="style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Outras fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Quicksand:wght@300..700&display=swap"
          rel="stylesheet">

    <style>

        :root {
            --banner-navy: #143d75;
            --banner-light-blue: #7ea2d6;
            --banner-light-bg: #eaf1fa;
            --banner-white: #ffffff;
            --card-text: #0b2244;
            --border-radius-banner: 20px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--banner-white);
            color: var(--card-text);
            line-height: 1.6;
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
            background-color: var(--banner-navy);
            border-bottom: 2px solid rgba(255, 255, 255, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 0;
        }

        .logo {
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--banner-white);
            text-decoration: none;
            letter-spacing: 1.5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo span {
            color: var(--banner-light-blue);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-menu a {
            color: var(--banner-white);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: var(--banner-light-blue);
        }

        .btn-nav {
            background: var(--banner-light-blue);
            color: var(--card-text) !important;
            padding: 0.5rem 1.4rem;
            border-radius: 50px;
            font-weight: 700 !important;
            transition: transform 0.2s, background 0.3s !important;
        }

        .btn-nav:hover {
            background: var(--banner-white) !important;
            transform: translateY(-2px);
        }

        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            background-color: var(--banner-navy);
            color: var(--banner-white);
            padding: 5rem 0 6rem 0;
            border-bottom: 3px dashed rgba(255, 255, 255, 0.2);
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            align-items: center;
            gap: 3rem;
        }

        .flight-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(126, 162, 214, 0.2);
            color: var(--banner-light-blue);
            border: 1px dashed var(--banner-light-blue);
            padding: 0.4rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
        }

        .hero-text h1 {
            font-size: 2.7rem;
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 1.2rem;
        }

        .hero-text p {
            color: #dce6f5;
            font-size: 1.05rem;
            margin-bottom: 2rem;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            display: inline-block;
            padding: 0.85rem 1.8rem;
            border-radius: var(--border-radius-banner);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-card-blue {
            background-color: var(--banner-light-blue);
            color: var(--banner-navy);
        }

        .btn-card-blue:hover {
            background-color: var(--banner-white);
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
        }

        .btn-outline {
            border: 2px solid var(--banner-white);
            color: var(--banner-white);
        }

        .btn-outline:hover {
            background-color: var(--banner-white);
            color: var(--banner-navy);
            transform: translateY(-3px);
        }

        .hero-airplane-box {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .flight-badge {
            background: var(--banner-light-blue);
            color: var(--card-text);
            padding: 1.8rem;
            border-radius: var(--border-radius-banner);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            border: 2px solid var(--banner-white);
            transition: transform 0.3s;
        }

        .flight-badge:hover {
            transform: translateY(-5px);
        }

        .flight-badge i {
            font-size: 2.2rem;
            color: var(--banner-navy);
            margin-bottom: 0.5rem;
        }

        .flight-badge h3 {
            font-size: 1.3rem;
            font-weight: 700;
        }

        /* =====================================================
           TÍTULOS
        ===================================================== */

        .section-title {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .section-title h2 {
            font-size: 2.2rem;
            color: var(--banner-navy);
            font-weight: 800;
        }

        .section-title h2 span {
            color: var(--banner-light-blue);
        }

        .section-title p {
            color: #556c8d;
            font-size: 1rem;
        }

        .section-title.light h2 {
            color: var(--banner-white);
        }

        .section-title.light p {
            color: #c7d8f0;
        }

        /* =====================================================
           CARDS
        ===================================================== */

        .features {
            padding: 5.5rem 0;
            background-color: var(--banner-light-bg);
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .card-banner {
            background-color: var(--banner-light-blue);
            color: var(--card-text);
            border-radius: var(--border-radius-banner);
            padding: 2.5rem 2rem;
            box-shadow: 0 6px 16px rgba(20, 61, 117, 0.12);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .card-banner:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(20, 61, 117, 0.2);
        }

        .card-header-icon {
            width: 55px;
            height: 55px;
            background-color: var(--banner-white);
            color: var(--banner-navy);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-banner h3 {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: var(--banner-navy);
        }

        .card-banner p {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .card-tag {
            display: inline-block;
            align-self: flex-start;
            background: var(--banner-navy);
            color: var(--banner-white);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
        }

        /* =====================================================
           DESENVOLVEDORES
        ===================================================== */

        .devs-section {
            padding: 5.5rem 0;
            background-color: var(--banner-white);
        }

        .devs-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
        }

        .dev-card {
            background: var(--banner-light-bg);
            border: 2px solid var(--banner-light-blue);
            border-radius: var(--border-radius-banner);
            padding: 1.8rem 1.5rem;
            text-align: center;
            width: 210px;
            transition: transform 0.3s;
        }

        .dev-card:hover {
            transform: translateY(-5px);
            background-color: var(--banner-light-blue);
        }

        .dev-avatar {
            width: 65px;
            height: 65px;
            margin: 0 auto 1rem auto;
            background: var(--banner-navy);
            color: var(--banner-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
        }

        .dev-card h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--banner-navy);
            margin-bottom: 0.2rem;
        }

        .dev-card span {
            font-size: 0.8rem;
            font-weight: 500;
            color: #556c8d;
            display: block;
            margin-bottom: 1rem;
        }

        .dev-socials a {
            color: var(--banner-navy);
            margin: 0 0.4rem;
            font-size: 1.1rem;
            transition: opacity 0.2s;
        }

        .dev-socials a:hover {
            opacity: 0.7;
        }

        /* =====================================================
           CONTATO
        ===================================================== */

        .contact-section {
            padding: 5.5rem 0;
            background: var(--banner-navy);
            color: var(--banner-white);
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 3rem;
        }

        .contact-info h3 {
            font-size: 1.6rem;
            margin-bottom: 0.8rem;
        }

        .contact-info p {
            color: #c7d8f0;
            margin-bottom: 2rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.2rem;
        }

        .info-item i {
            color: var(--banner-light-blue);
            font-size: 1.3rem;
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.07);
            padding: 2.2rem;
            border-radius: var(--border-radius-banner);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 0.4rem;
            color: var(--banner-white);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.85rem;
            border-radius: 10px;
            border: 1px solid var(--banner-light-blue);
            background: var(--banner-white);
            color: var(--card-text);
            font-family: inherit;
            outline: none;
        }

        .btn-block {
            width: 100%;
        }

        /* =====================================================
           MENSAGEM DO PHP
        ===================================================== */

        .mensagem-sucesso {
            background: #d1fae5;
            color: #065f46;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            background-color: #0b2244;
            padding: 2rem 0;
            color: #c7d8f0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .footer-brand h3 {
            color: var(--banner-white);
        }

        .footer-brand h3 span {
            color: var(--banner-light-blue);
        }

        .footer-brand p {
            font-size: 0.85rem;
        }

        .copyright {
            font-size: 0.85rem;
        }

        /* =====================================================
           RESPONSIVIDADE
        ===================================================== */

        @media (max-width: 868px) {

            .hero-content,
            .contact-wrapper {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                display: none;
            }

            .hero-text h1 {
                font-size: 2.1rem;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
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
            INTER<span>WAY</span>
        </a>

        <nav class="nav-menu">

            <a href="#inicio">Início</a>

            <a href="#solucoes">Pilares</a>

            <a href="#desenvolvedores">Equipe (3ºC)</a>

            <a href="#contato" class="btn-nav">Contato</a>

            <a href="mais.php" class="btn-nav">Mais</a>

        </nav>

    </div>

</header>


<!-- =====================================================
     HERO
===================================================== -->

<section class="hero" id="inicio">

    <div class="container hero-content">

        <div class="hero-text">

            <div class="flight-tag">

                <i class="fa-solid fa-route"></i>

                ETEC MCM • Centro Paula Souza

            </div>

            <h1>
                O caminho mais seguro e transparente para o seu intercâmbio
            </h1>

            <p>
                A Interway nasceu para solucionar os desafios de quem sonha
                em estudar fora: eliminamos custos ocultos, descomplicamos
                a burocracia e centralizamos tudo em um só lugar.
            </p>

            <div class="hero-buttons">

                <a href="#solucoes" class="btn btn-card-blue">
                    Conhecer a Plataforma
                </a>

                <a href="#contato" class="btn btn-outline">
                    Fale com a Equipe
                </a>

            </div>

        </div>


        <div class="hero-airplane-box">

            <div class="flight-badge">

                <i class="fa-solid fa-globe"></i>

                <h3>Conexão Global</h3>

                <p>
                    Informações confiáveis sem barreiras.
                </p>

            </div>


            <div class="flight-badge">

                <i class="fa-solid fa-plane-up"></i>

                <h3>Planejamento Seguro</h3>

                <p>
                    Suporte completo para a sua viagem.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     SOLUÇÕES
===================================================== -->

<section class="features" id="solucoes">

    <div class="container">

        <div class="section-title">

            <h2>
                Nossas <span>Soluções</span>
            </h2>

            <p>
                Desenvolvido para eliminar as principais dores
                do processo de intercâmbio.
            </p>

        </div>


        <div class="cards-grid">

            <div class="card-banner">

                <div class="card-header-icon">
                    <i class="fa-solid fa-magnifying-glass-location"></i>
                </div>

                <h3>Centralização de Dados</h3>

                <p>
                    Combate o excesso de informações dispersas e fontes
                    duvidosas, reunindo requisitos, cursos e agências
                    credenciadas com transparência.
                </p>

                <span class="card-tag">
                    Fim da Desinformação
                </span>

            </div>


            <div class="card-banner">

                <div class="card-header-icon">
                    <i class="fa-solid fa-passport"></i>
                </div>

                <h3>Desburocratização</h3>

                <p>
                    Guia prático para processos complexos de visto,
                    emissão de documentos e planejamento financeiro real,
                    sem taxas ou custos ocultos.
                </p>

                <span class="card-tag">
                    Processo Simplificado
                </span>

            </div>


            <div class="card-banner">

                <div class="card-header-icon">
                    <i class="fa-solid fa-shield-heart"></i>
                </div>

                <h3>Segurança & Apoio</h3>

                <p>
                    Ajuda o estudante a superar o medo da imigração
                    e a barreira do idioma, oferecendo suporte confiável
                    antes e durante o intercâmbio.
                </p>

                <span class="card-tag">
                    Escolha Confiável
                </span>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     DESENVOLVEDORES
===================================================== -->

<section class="devs-section" id="desenvolvedores">

    <div class="container">

        <div class="section-title">

            <h2>
                Equipe de <span>Desenvolvimento</span>
            </h2>

            <p>
                Alunos do 3º C — ETEC MCM / Centro Paula Souza
            </p>

        </div>


        <div class="devs-grid">

            <div class="dev-card">

                <div class="dev-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <h4>João Pedro</h4>

                <span>Desenvolvedor</span>

                <div class="dev-socials">

                    <a href="#">
                        <i class="fa-brands fa-github"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>

                </div>

            </div>


            <div class="dev-card">

                <div class="dev-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <h4>Lorenzo Muller</h4>

                <span>Desenvolvedor</span>

                <div class="dev-socials">

                    <a href="#">
                        <i class="fa-brands fa-github"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>

                </div>

            </div>


            <div class="dev-card">

                <div class="dev-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <h4>Matheus Colantuono</h4>

                <span>Desenvolvedor</span>

                <div class="dev-socials">

                    <a href="#">
                        <i class="fa-brands fa-github"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>

                </div>

            </div>


            <div class="dev-card">

                <div class="dev-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <h4>Sophia Gonçalves</h4>

                <span>Desenvolvedora</span>

                <div class="dev-socials">

                    <a href="#">
                        <i class="fa-brands fa-github"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>

                </div>

            </div>


            <div class="dev-card">

                <div class="dev-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <h4>Tamires Anastacio</h4>

                <span>Desenvolvedora</span>

                <div class="dev-socials">

                    <a href="#">
                        <i class="fa-brands fa-github"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     CONTATO
===================================================== -->

<section class="contact-section" id="contato">

    <div class="container">

        <div class="section-title light">

            <h2>
                Fale com a <span>Interway</span>
            </h2>

            <p>
                Tem dúvidas, sugestões ou interesse no projeto?
                Envie uma mensagem.
            </p>

        </div>


        <div class="contact-wrapper">


            <div class="contact-info">

                <h3>Projeto de TCC</h3>

                <p>
                    Projeto acadêmico focado em tecnologia e
                    acessibilidade ao intercâmbio internacional.
                </p>


                <div class="info-item">

                    <i class="fa-solid fa-school"></i>

                    <span>
                        ETEC MCM - Centro Paula Souza
                    </span>

                </div>


                <div class="info-item">

                    <i class="fa-solid fa-users"></i>

                    <span>
                        Turma: 3º C
                    </span>

                </div>


                <div class="info-item">

                    <i class="fa-solid fa-envelope"></i>

                    <span>
                        contato.interway@etec.sp.gov.br
                    </span>

                </div>

            </div>


            <form class="contact-form" method="POST" action="#contato">

                <?php if (!empty($mensagem_sucesso)): ?>

                    <div class="mensagem-sucesso">
                        <?= $mensagem_sucesso ?>
                    </div>

                <?php endif; ?>


                <div class="form-group">

                    <label for="nome">
                        Nome
                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        placeholder="Seu nome"
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
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="mensagem">
                        Mensagem
                    </label>

                    <textarea
                        id="mensagem"
                        name="mensagem"
                        rows="3"
                        placeholder="Sua dúvida ou proposta de parceria..."
                        required
                    ></textarea>

                </div>


                <button
                    type="submit"
                    class="btn btn-card-blue btn-block"
                >
                    Enviar Mensagem
                </button>

            </form>

        </div>

    </div>

</section>


<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="footer">

    <div class="container footer-content">

        <div class="footer-brand">

            <h3>
                INTER<span>WAY</span>
            </h3>

            <p>
                Centro Paula Souza • ETEC MCM • Turma 3ºC
            </p>

        </div>


        <p class="copyright">
            &copy; <?= date("Y") ?> Interway TCC.
            Todos os direitos reservados.
        </p>

    </div>

</footer>

</body>
</html>