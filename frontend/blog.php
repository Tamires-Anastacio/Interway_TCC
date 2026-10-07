<?php

$host = "localhost";
$banco = "interway_bd";
$usuario = "root";
$senha = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8",
        $usuario,
        $senha
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Erro ao conectar com o banco de dados: " . $e->getMessage());

}
?>


<?php

require_once "../backend/conexao.php";

$mensagem = "";
$erro = "";


/* =========================================================
   PUBLICAR POSTAGEM
========================================================= */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $autor = trim($_POST["autor"] ?? "");
    $destino = trim($_POST["destino"] ?? "");
    $legenda = trim($_POST["legenda"] ?? "");

    $foto = null;


    /* VERIFICA OS CAMPOS */

    if ($autor === "" || $destino === "" || $legenda === "") {

        $erro = "Preencha todos os campos.";

    } else {


        /* =================================================
           UPLOAD DA FOTO
        ================================================= */

        if (
            isset($_FILES["foto"]) &&
            $_FILES["foto"]["error"] === UPLOAD_ERR_OK
        ) {

            $pasta = "uploads/";


            /* Cria a pasta caso não exista */

            if (!is_dir($pasta)) {

                mkdir($pasta, 0777, true);

            }


            /* Extensão da imagem */

            $extensao = strtolower(
                pathinfo(
                    $_FILES["foto"]["name"],
                    PATHINFO_EXTENSION
                )
            );


            /* Extensões permitidas */

            $extensoesPermitidas = [
                "jpg",
                "jpeg",
                "png",
                "gif",
                "webp"
            ];


            if (!in_array($extensao, $extensoesPermitidas)) {

                $erro = "Formato de imagem não permitido.";

            } else {


                /* Nome único para a imagem */

                $nomeImagem = uniqid("foto_", true) . "." . $extensao;

                $caminhoImagem = $pasta . $nomeImagem;


                /* Move a imagem para uploads */

                if (
                    move_uploaded_file(
                        $_FILES["foto"]["tmp_name"],
                        $caminhoImagem
                    )
                ) {

                    $foto = $caminhoImagem;

                } else {

                    $erro = "Não foi possível salvar a imagem.";

                }

            }

        } else {

            $erro = "Selecione uma foto.";

        }


        /* =================================================
           SALVAR NO BANCO
        ================================================= */

        if ($erro === "") {

            try {

                $sql = "INSERT INTO publicacoes
                        (autor, destino, legenda, foto)
                        VALUES
                        (:autor, :destino, :legenda, :foto)";

                $stmt = $pdo->prepare($sql);

                $stmt->execute([
                    ":autor" => $autor,
                    ":destino" => $destino,
                    ":legenda" => $legenda,
                    ":foto" => $foto
                ]);


                /*
                 * Redireciona para evitar que o formulário
                 * seja enviado novamente ao atualizar a página.
                 */

                header("Location: blog.php?sucesso=1");
                exit;


            } catch (PDOException $e) {

                $erro = "Erro ao salvar a publicação: " . $e->getMessage();

            }

        }

    }

}


/* =========================================================
   MENSAGEM DE SUCESSO
========================================================= */

if (isset($_GET["sucesso"])) {

    $mensagem = "Publicação realizada com sucesso! ✈️";

}


/* =========================================================
   BUSCAR PUBLICAÇÕES
========================================================= */

$sql = "SELECT *
        FROM publicacoes
        ORDER BY data_publicacao DESC";

$stmt = $pdo->query($sql);

$publicacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        Comunidade Interway - Relatos e Fotos
    </title>


    <!-- Google Fonts -->

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >


    <style>

        :root {

            --banner-navy: #143d75;

            --banner-navy-dark: #0b2244;

            --banner-light-blue: #7ea2d6;

            --banner-bg-soft: #f0f4fa;

            --banner-white: #ffffff;

            --text-dark: #0f2547;

            --text-muted: #5e7390;

            --border-radius-banner: 18px;

        }


        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

            font-family: 'Poppins', sans-serif;

        }


        body {

            background-color: var(--banner-bg-soft);

            color: var(--text-dark);

        }


        .container {

            width: 90%;

            max-width: 860px;

            margin: 0 auto;

        }


        /* =========================
           MENU
        ========================= */

        .header {

            background-color: var(--banner-navy);

            padding: 1rem 0;

            position: sticky;

            top: 0;

            z-index: 100;

            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.15);

        }


        .navbar {

            display: flex;

            justify-content: space-between;

            align-items: center;

        }


        .logo {

            font-size: 1.5rem;

            font-weight: 800;

            color: white;

            text-decoration: none;

            letter-spacing: 1px;

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

            color: white;

            text-decoration: none;

            font-weight: 500;

            transition: 0.3s;

        }


        .nav-menu a:hover,

        .nav-menu a.active {

            color: var(--banner-light-blue);

        }


        .btn-nav {

            background-color: var(--banner-light-blue);

            color: var(--banner-navy) !important;

            padding: 0.5rem 1.2rem;

            border-radius: 50px;

            font-weight: 700 !important;

        }


        /* =========================
           BANNER
        ========================= */

        .blog-banner {

            background: var(--banner-navy);

            color: white;

            text-align: center;

            padding: 3.5rem 1rem 4rem;

            border-bottom:
                3px dashed rgba(255,255,255,0.2);

        }


        .flight-badge {

            display: inline-block;

            background:
                rgba(126,162,214,0.2);

            color:
                var(--banner-light-blue);

            border:
                1px dashed var(--banner-light-blue);

            padding:
                0.3rem 1rem;

            border-radius: 50px;

            font-size: 0.85rem;

            font-weight: 600;

            margin-bottom: 0.8rem;

        }


        .blog-banner h1 {

            font-size: 2.2rem;

            font-weight: 800;

            margin-bottom: 0.5rem;

        }


        .blog-banner p {

            color: #c7d8f0;

            font-size: 1rem;

        }


        /* =========================
           CONTEÚDO
        ========================= */

        .blog-layout {

            margin-top: -2rem;

            margin-bottom: 4rem;

        }


        /* =========================
           FORMULÁRIO
        ========================= */

        .post-creator-card {

            background: white;

            border-radius:
                var(--border-radius-banner);

            padding: 2rem;

            box-shadow:
                0 10px 25px
                rgba(20,61,117,0.1);

            border:
                2px solid var(--banner-light-blue);

            margin-bottom: 3rem;

        }


        .creator-header {

            display: flex;

            align-items: center;

            gap: 0.8rem;

            margin-bottom: 1.5rem;

            color: var(--banner-navy);

        }


        .creator-header i {

            font-size: 1.5rem;

            color: var(--banner-light-blue);

        }


        .form-row {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 1rem;

        }


        .form-group {

            margin-bottom: 1.2rem;

        }


        .form-group label {

            display: block;

            font-size: 0.85rem;

            font-weight: 600;

            color: var(--banner-navy);

            margin-bottom: 0.3rem;

        }


        .form-group input,

        .form-group textarea {

            width: 100%;

            padding: 0.75rem 1rem;

            border:
                1px solid #c9d8ee;

            border-radius: 10px;

            font-size: 0.9rem;

            outline: none;

        }


        .form-group input:focus,

        .form-group textarea:focus {

            border-color:
                var(--banner-navy);

        }


        .preview-box {

            margin-top: 0.8rem;

            max-height: 250px;

            overflow: hidden;

            border-radius: 12px;

            border:
                2px dashed var(--banner-light-blue);

        }


        .preview-box img {

            width: 100%;

            max-height: 250px;

            object-fit: cover;

            display: block;

        }


        .btn-postar {

            background-color:
                var(--banner-navy);

            color: white;

            border: none;

            padding: 0.85rem 1.8rem;

            border-radius: 50px;

            font-weight: 700;

            cursor: pointer;

            width: 100%;

            font-size: 1rem;

            transition: 0.3s;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 0.6rem;

        }


        .btn-postar:hover {

            background-color:
                var(--banner-light-blue);

            color:
                var(--banner-navy);

        }


        /* =========================
           MENSAGENS
        ========================= */

        .mensagem {

            background: #dff5e5;

            color: #176b35;

            border:
                1px solid #a8dfb7;

            padding: 12px;

            border-radius: 10px;

            margin-bottom: 20px;

            text-align: center;

            font-weight: 600;

        }


        .erro {

            background: #ffe5e5;

            color: #a52626;

            border:
                1px solid #f0aaaa;

            padding: 12px;

            border-radius: 10px;

            margin-bottom: 20px;

            text-align: center;

            font-weight: 600;

        }


        /* =========================
           FEED
        ========================= */

        .feed-title {

            font-size: 1.6rem;

            font-weight: 800;

            color: var(--banner-navy);

            margin-bottom: 1.5rem;

        }


        .feed-list {

            display: flex;

            flex-direction: column;

            gap: 2rem;

        }


        .post-card {

            background: white;

            border-radius:
                var(--border-radius-banner);

            box-shadow:
                0 6px 18px
                rgba(20,61,117,0.08);

            border:
                1px solid #dce6f5;

            overflow: hidden;

        }


        .post-header {

            display: flex;

            align-items: center;

            padding:
                1.2rem 1.5rem;

            gap: 1rem;

        }


        .author-avatar {

            width: 45px;

            height: 45px;

            background:
                var(--banner-light-blue);

            color:
                var(--banner-navy);

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 1.2rem;

        }


        .author-info h4 {

            font-size: 1rem;

            font-weight: 700;

            color:
                var(--banner-navy);

        }


        .destination-tag {

            font-size: 0.8rem;

            color:
                var(--banner-navy);

            font-weight: 600;

            background:
                var(--banner-bg-soft);

            padding:
                0.2rem 0.6rem;

            border-radius: 20px;

        }


        .post-time {

            margin-left: auto;

            font-size: 0.8rem;

            color:
                var(--text-muted);

        }


        .post-image-box {

            width: 100%;

            max-height: 480px;

            overflow: hidden;

            background: black;

        }


        .post-image-box img {

            width: 100%;

            max-height: 480px;

            object-fit: cover;

            display: block;

        }


        .post-content {

            padding:
                1.2rem 1.5rem;

            font-size: 0.95rem;

            line-height: 1.6;

        }


        /* =========================
           REAÇÕES
        ========================= */

        .reactions-bar {

            display: flex;

            gap: 0.8rem;

            padding:
                0.8rem 1.5rem 1.2rem;

            border-top:
                1px solid #f0f4fa;

        }


        .reaction-btn {

            background:
                var(--banner-bg-soft);

            border:
                1px solid #d4e2f5;

            border-radius: 50px;

            padding:
                0.4rem 1rem;

            cursor: pointer;

            display: inline-flex;

            align-items: center;

            gap: 0.4rem;

            font-weight: 600;

            font-size: 0.85rem;

            color:
                var(--banner-navy);

            transition: 0.2s;

        }


        .reaction-btn:hover {

            background:
                var(--banner-light-blue);

            color: white;

        }


        .reaction-btn.active {

            background:
                var(--banner-navy);

            color: white;

        }


        /* =========================
           SEM PUBLICAÇÕES
        ========================= */

        .sem-postagens {

            background: white;

            padding: 2rem;

            border-radius: 18px;

            text-align: center;

            color: var(--text-muted);

        }


        /* =========================
           FOOTER
        ========================= */

        .footer {

            background:
                var(--banner-navy-dark);

            color: #c7d8f0;

            text-align: center;

            padding: 2rem 0;

        }


        .footer h3 {

            color: white;

            margin-bottom: 0.3rem;

        }


        .footer span {

            color:
                var(--banner-light-blue);

        }


        /* =========================
           RESPONSIVO
        ========================= */

        @media (max-width: 600px) {

            .form-row {

                grid-template-columns: 1fr;

            }


            .navbar {

                flex-direction: column;

                gap: 1rem;

            }


            .nav-menu {

                gap: 0.7rem;

                flex-wrap: wrap;

                justify-content: center;

            }


            .reactions-bar {

                flex-wrap: wrap;

            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     MENU
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

            <a href="blog.php" class="active">
                Comunidade
            </a>

            <a href="#criar-post" class="btn-nav">

                <i class="fa-solid fa-plus"></i>

                Nova Postagem

            </a>

        </nav>

    </div>

</header>



<!-- =====================================================
     BANNER
===================================================== -->

<section class="blog-banner">

    <div class="container">

        <span class="flight-badge">

            <i class="fa-solid fa-compass"></i>

            Diário de Bordo

        </span>


        <h1>
            Experiências pelo Mundo
        </h1>


        <p>
            Acompanhe histórias reais, fotos inspiradoras
            e compartilhe o seu momento de intercâmbio.
        </p>

    </div>

</section>



<!-- =====================================================
     CONTEÚDO
===================================================== -->

<main class="container blog-layout">


<!-- =====================================================
     FORMULÁRIO
===================================================== -->

<section
    class="post-creator-card"
    id="criar-post"
>

    <div class="creator-header">

        <i class="fa-solid fa-camera-retro"></i>

        <h3>
            Compartilhe seu Momento
        </h3>

    </div>


    <?php if ($mensagem !== ""): ?>

        <div class="mensagem">

            <?php
            echo htmlspecialchars($mensagem);
            ?>

        </div>

    <?php endif; ?>


    <?php if ($erro !== ""): ?>

        <div class="erro">

            <?php
            echo htmlspecialchars($erro);
            ?>

        </div>

    <?php endif; ?>


    <form
        method="POST"
        enctype="multipart/form-data"
    >


        <div class="form-row">


            <div class="form-group">

                <label for="autor">
                    Seu Nome
                </label>


                <input
                    type="text"
                    id="autor"
                    name="autor"
                    placeholder="Ex: Sophia Gonçalves"
                    required
                >

            </div>



            <div class="form-group">

                <label for="destino">
                    Destino (País / Cidade)
                </label>


                <input
                    type="text"
                    id="destino"
                    name="destino"
                    placeholder="Ex: Toronto, Canadá"
                    required
                >

            </div>


        </div>



        <div class="form-group">

            <label for="legenda">
                Conte como foi a experiência
            </label>


            <textarea
                id="legenda"
                name="legenda"
                rows="3"
                placeholder="O que você viveu nessa foto? Dicas, sensações..."
                required
            ></textarea>

        </div>



        <div class="form-group">

            <label for="foto-input">
                Foto da viagem
            </label>


            <input
                type="file"
                id="foto-input"
                name="foto"
                accept="image/*"
                required
            >


            <div
                id="preview-container"
                class="preview-box"
                style="display:none;"
            >

                <img
                    id="img-preview"
                    src=""
                    alt="Prévia da foto"
                >

            </div>

        </div>



        <button
            type="submit"
            class="btn-postar"
        >

            <i class="fa-solid fa-paper-plane"></i>

            Publicar Relato

        </button>


    </form>

</section>



<!-- =====================================================
     FEED
===================================================== -->

<section class="feed-section">

    <h2 class="feed-title">

        Últimas Publicações

    </h2>


    <div class="feed-list">


        <?php if (count($publicacoes) > 0): ?>


            <?php foreach ($publicacoes as $publicacao): ?>


                <article class="post-card">


                    <!-- CABEÇALHO -->

                    <header class="post-header">


                        <div class="author-avatar">

                            <i class="fa-solid fa-user"></i>

                        </div>


                        <div class="author-info">


                            <h4>

                                <?php

                                echo htmlspecialchars(
                                    $publicacao["autor"]
                                );

                                ?>

                            </h4>


                            <span class="destination-tag">

                                <i class="fa-solid fa-location-dot"></i>

                                <?php

                                echo htmlspecialchars(
                                    $publicacao["destino"]
                                );

                                ?>

                            </span>


                        </div>


                        <span class="post-time">

                            <?php

                            echo date(
                                "d/m/Y H:i",
                                strtotime(
                                    $publicacao["data_publicacao"]
                                )
                            );

                            ?>

                        </span>


                    </header>



                    <!-- FOTO -->

                    <?php if (!empty($publicacao["foto"])): ?>

                        <div class="post-image-box">

                            <img
                                src="<?php
                                echo htmlspecialchars(
                                    $publicacao["foto"]
                                );
                                ?>"
                                alt="Foto da viagem"
                            >

                        </div>

                    <?php endif; ?>



                    <!-- TEXTO -->

                    <div class="post-content">

                        <p>

                            <?php

                            echo nl2br(
                                htmlspecialchars(
                                    $publicacao["legenda"]
                                )
                            );

                            ?>

                        </p>

                    </div>



                    <!-- REAÇÕES -->

                    <footer class="reactions-bar">


                        <button
                            type="button"
                            class="reaction-btn"
                            onclick="reagir(this)"
                        >

                            <span>
                                ❤️
                            </span>

                            <span>
                                Amei
                            </span>

                            <span class="count">
                                0
                            </span>

                        </button>



                        <button
                            type="button"
                            class="reaction-btn"
                            onclick="reagir(this)"
                        >

                            <span>
                                ✈️
                            </span>

                            <span>
                                Quero ir
                            </span>

                            <span class="count">
                                0
                            </span>

                        </button>



                        <button
                            type="button"
                            class="reaction-btn"
                            onclick="reagir(this)"
                        >

                            <span>
                                👏
                            </span>

                            <span>
                                Inspirador
                            </span>

                            <span class="count">
                                0
                            </span>

                        </button>


                    </footer>


                </article>


            <?php endforeach; ?>


        <?php else: ?>


            <div class="sem-postagens">

                <i
                    class="fa-solid fa-camera"
                    style="font-size: 2rem; margin-bottom: 10px;"
                ></i>


                <p>

                    Ainda não existem publicações.

                </p>


                <p>

                    Seja o primeiro a compartilhar
                    sua experiência! ✈️

                </p>

            </div>


        <?php endif; ?>


    </div>

</section>


</main>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="footer">

    <div class="container">

        <h3>

            INTER<span>WAY</span>

        </h3>


        <p>

            &copy; 2026 Interway TCC -
            Comunidade de Intercâmbio

        </p>

    </div>

</footer>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>


/* =====================================================
   PRÉ-VISUALIZAÇÃO DA FOTO
===================================================== */

const fotoInput =
    document.getElementById("foto-input");

const previewContainer =
    document.getElementById("preview-container");

const imgPreview =
    document.getElementById("img-preview");


fotoInput.addEventListener(
    "change",
    function () {

        const arquivo = this.files[0];


        if (arquivo) {

            const leitor = new FileReader();


            leitor.onload = function (evento) {

                imgPreview.src =
                    evento.target.result;

                previewContainer.style.display =
                    "block";

            };


            leitor.readAsDataURL(arquivo);


        } else {

            previewContainer.style.display =
                "none";

        }

    }
);



/* =====================================================
   REAÇÕES
===================================================== */

function reagir(botao) {

    const contador =
        botao.querySelector(".count");


    let quantidade =
        parseInt(contador.textContent);


    if (botao.classList.contains("active")) {

        quantidade--;

        botao.classList.remove("active");


    } else {

        quantidade++;

        botao.classList.add("active");

    }


    contador.textContent =
        quantidade;

}

</script>


</body>

</html>
```

