<?php
require_once "../backend/conexao.php";

/*
|--------------------------------------------------------------------------
| BUSCA DAS BOLSAS
|--------------------------------------------------------------------------
| Caso você ainda não tenha a tabela "bolsas", o código abaixo utiliza
| dados de exemplo. Depois podemos conectar diretamente ao MySQL.
*/

$bolsas = [
    [
        "id" => 1,
        "titulo" => "High School nos Estados Unidos",
        "pais" => "Estados Unidos",
        "tipo" => "Ensino Médio",
        "cobertura" => "Parcial",
        "descricao" => "Programa de intercâmbio para estudantes que desejam cursar parte do ensino médio nos Estados Unidos.",
        "beneficios" => [
            "Acomodação em família anfitriã",
            "Matrícula em escola americana",
            "Suporte durante o intercâmbio"
        ],
        "valor" => "Até 50% de bolsa"
    ],

    [
        "id" => 2,
        "titulo" => "High School no Canadá",
        "pais" => "Canadá",
        "tipo" => "Ensino Médio",
        "cobertura" => "Parcial",
        "descricao" => "Oportunidade para estudantes brasileiros estudarem em escolas canadenses e vivenciarem uma nova cultura.",
        "beneficios" => [
            "Estudo em escola canadense",
            "Possibilidade de acomodação",
            "Suporte ao estudante"
        ],
        "valor" => "Até 40% de bolsa"
    ],

    [
        "id" => 3,
        "titulo" => "High School na Irlanda",
        "pais" => "Irlanda",
        "tipo" => "Ensino Médio",
        "cobertura" => "Parcial",
        "descricao" => "Programa voltado para estudantes que desejam melhorar o inglês enquanto cursam o ensino médio na Irlanda.",
        "beneficios" => [
            "Escola internacional",
            "Experiência cultural",
            "Acompanhamento durante o programa"
        ],
        "valor" => "Até 30% de bolsa"
    ],

    [
        "id" => 4,
        "titulo" => "High School na Austrália",
        "pais" => "Austrália",
        "tipo" => "Ensino Médio",
        "cobertura" => "Parcial",
        "descricao" => "Estude em uma escola australiana e tenha uma experiência internacional durante o ensino médio.",
        "beneficios" => [
            "Escola australiana",
            "Experiência internacional",
            "Suporte ao intercambista"
        ],
        "valor" => "Até 35% de bolsa"
    ]
];


/*
|--------------------------------------------------------------------------
| FILTROS
|--------------------------------------------------------------------------
*/

$busca = trim($_GET["busca"] ?? "");
$pais_filtro = $_GET["pais"] ?? "";

$bolsas_filtradas = [];

foreach ($bolsas as $bolsa) {

    $corresponde_busca = true;
    $corresponde_pais = true;

    if (!empty($busca)) {

        $texto = strtolower(
            $bolsa["titulo"] . " " .
            $bolsa["pais"] . " " .
            $bolsa["descricao"]
        );

        $corresponde_busca = str_contains(
            $texto,
            strtolower($busca)
        );
    }

    if (!empty($pais_filtro)) {

        $corresponde_pais =
            $bolsa["pais"] === $pais_filtro;
    }

    if ($corresponde_busca && $corresponde_pais) {

        $bolsas_filtradas[] = $bolsa;
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

    <title>Bolsas High School | Interway</title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {

            font-family: "Poppins", sans-serif;

            background: #f4f8fc;

            color: #1e293b;

        }


        /* =========================
           HEADER
        ========================= */

        header {

            background:
                linear-gradient(
                    135deg,
                    #071a33,
                    #0b3d7a
                );

            color: white;

            padding: 18px 7%;

            display: flex;

            align-items: center;

            justify-content: space-between;

            position: sticky;

            top: 0;

            z-index: 100;

            box-shadow:
                0 4px 15px
                rgba(0, 0, 0, 0.15);

        }


        .logo {

            font-size: 27px;

            font-weight: 700;

        }


        .logo span {

            color: #5fc9ff;

        }


        nav {

            display: flex;

            gap: 28px;

            align-items: center;

        }


        nav a {

            color: white;

            text-decoration: none;

            font-size: 14px;

            transition: 0.3s;

        }


        nav a:hover {

            color: #5fc9ff;

        }


        .btn-login {

            background: #38bdf8;

            padding: 9px 18px;

            border-radius: 8px;

            font-weight: 600;

        }


        .btn-login:hover {

            color: white;

            background: #0ea5e9;

        }


        /* =========================
           HERO
        ========================= */

        .hero {

            background:

                radial-gradient(
                    circle at 80% 20%,
                    rgba(56, 189, 248, 0.25),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #0b3d7a,
                    #1261b3
                );

            color: white;

            padding: 70px 7%;

        }


        .hero-content {

            max-width: 1100px;

            margin: auto;

        }


        .tag {

            display: inline-block;

            background:
                rgba(255,255,255,0.15);

            border:
                1px solid
                rgba(255,255,255,0.25);

            padding: 7px 15px;

            border-radius: 30px;

            font-size: 13px;

            margin-bottom: 18px;

        }


        .hero h1 {

            font-size: 42px;

            max-width: 750px;

            line-height: 1.2;

            margin-bottom: 18px;

        }


        .hero p {

            max-width: 700px;

            color: #dbeafe;

            line-height: 1.8;

            font-size: 16px;

        }


        /* =========================
           FILTROS
        ========================= */

        .filtros-container {

            max-width: 1100px;

            margin: -30px auto 40px;

            padding: 0 20px;

            position: relative;

        }


        .filtros {

            background: white;

            padding: 22px;

            border-radius: 15px;

            box-shadow:
                0 8px 30px
                rgba(15, 23, 42, 0.10);

            display: grid;

            grid-template-columns:
                1fr 220px 150px;

            gap: 12px;

        }


        .filtros input,
        .filtros select {

            width: 100%;

            padding: 13px 15px;

            border: