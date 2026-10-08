<?php

session_start();

$plano = $_GET["plano"] ?? "InterWay Plus";

$planos_validos = [ "InterWay Plus", "InterWay Premium" ];

if (!inarray($plano, $planosvalidos, true)) { $plano = "InterWay Plus"; }

?>

<!DOCTYPE html> <html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0"

<title>Pagamento aprovado | InterWay</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"

<style>

/* ================================ RESET ================================= */

* { margin: 0; padding: 0; box-sizing: border-box; }

/* ================================ CONFIGURAÇÕES GERAIS ================================= */

body { font-family: "Poppins", sans-serif;

min-height: 100vh;

background: radial-gradient( circle at top left, #1d5ca8, transparent 35% ), linear-gradient( 135deg, #071a33, #0b2f5b );

display: flex;

align-items: center;

justify-content: center;

padding: 25px;

color: #143d75; }

/* ================================ CARD ================================= */

.sucesso-container {

width: 100%;

max-width: 650px;

background-color: white;

border-radius: 25px;

padding: 50px 45px;

text-align: center;

box-shadow: 0 20px 50px rgba(0, 0, 0, 0.30);

}

/* ================================ LOGO ================================= */

.logo {

font-size: 30px;

font-weight: 800;

color: #143d75;

margin-bottom: 30px;

}

.logo span {

color: #38bdf8;

}

/* ================================ ÍCONE DE SUCESSO ================================= */

.icone-sucesso {

width: 90px;

height: 90px;

margin: 0 auto 25px;

display: flex;

align-items: center;

justify-content: center;

background-color: #dcfce7;

color: #16a34a;

border-radius: 50%;

font-size: 45px;

font-weight: bold;

border: 5px solid #bbf7d0;

}

/* ================================ TÍTULO ================================= */

h1 {

color: #143d75;

font-size: 30px;

margin-bottom: 12px;

}

/* ================================ TEXTO ================================= */

.descricao {

color: #64748b;

font-size: 15px;

line-height: 1.7;

margin-bottom: 30px;

}

/* ================================ PLANO ================================= */

.plano-box {

background-color: #edf3fa;

border: 1px solid #cbdcf1;

border-radius: 15px;

padding: 20px;

margin-bottom: 30px;

}

.plano-box .label {

display: block;

color: #64748b;

font-size: 13px;

margin-bottom: 5px;

}

.plano-box strong {

color: #143d75;

font-size: 21px;

}

/* ================================ INFORMAÇÕES ================================= */

.informacoes {

display: grid;

grid-template-columns: repeat(2, 1fr);

gap: 15px;

margin-bottom: 30px;

}

.info {

background-color: #f8fafc;

border: 1px solid #e2e8f0;

border-radius: 12px;

padding: 15px;

}

.info span {

display: block;

color: #64748b;

font-size: 12px;

margin-bottom: 4px;

}

.info strong {

color: #143d75;

font-size: 14px;

}

/* ================================ BOTÕES ================================= */

.botoes {

display: flex;

flex-direction: column;

gap: 12px;

}

.botao {

display: block;

width: 100%;

padding: 14px;

border-radius: 50px;

text-decoration: none;

font-size: 15px;

font-weight: 700;

transition: 0.3s;

}

.botao-principal {

background-color: #143d75;

color: white;

}

.botao-principal:hover {

background-color: #7ea2d6;

color: #143d75;

transform: translateY(-2px);

}

.botao-secundario {

background-color: transparent;

color: #143d75;

border: 1px solid #cbd5e1;

}

.botao-secundario:hover {

background-color: #edf3fa;

}

/* ================================ RODAPÉ ================================= */

.rodape {

margin-top: 30px;

color: #94a3b8;

font-size: 12px;

}

/* ================================ RESPONSIVIDADE ================================= */

@media (max-width: 600px) {

.sucesso-container {

padding: 40px 25px;

}

h1 {

font-size: 25px;

}

.informacoes {

grid-template-columns: 1fr;

}

}

</style>

</head>

<body>

<main class="sucesso-container">

<!-- LOGO -->

<div class="logo">

Inter<span>Way</span>

</div>

<!-- ÍCONE -->

<div class="icone-sucesso">

✓

</div>

<!-- TÍTULO -->

<h1>

Pagamento aprovado!

</h1>

<p class="descricao">

Seu pagamento foi processado com sucesso. Seu plano InterWay já pode ser utilizado.

</p>

<!-- PLANO SELECIONADO -->

<div class="plano-box">

<span class="label">

Plano contratado

</span>

<strong>

<?= htmlspecialchars($plano) ?>

</strong>

</div>

<!-- INFORMAÇÕES -->

<div class="informacoes">

<div class="info">

<span>

Status

</span>

<strong>

✓ Pagamento aprovado

</strong>

</div>

<div class="info">

<span>

Data

</span>

<strong>

<?= date("d/m/Y") ?>

</strong>

</div>

</div>

<!-- BOTÕES -->

<div class="botoes">

<a href="index.php" class="botao botao-principal" >

Ir para o início

</a>

<a href="planos.php" class="botao botao-secundario" >

Ver meus planos

</a>

</div>

<!-- RODAPÉ -->

<p class="rodape">

Obrigado por escolher a InterWay. Boa viagem rumo ao seu futuro internacional! 🌎✈️

</p>

</main>

</body>

</html>