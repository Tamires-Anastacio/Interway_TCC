<?php

/*
|--------------------------------------------------------------------------
| ESCOLAS PARCEIRAS
|--------------------------------------------------------------------------
| Futuramente estes dados podem ser buscados do banco de dados MySQL.
|--------------------------------------------------------------------------
*/

$escolas = [

    [
        "id" => 1,
        "pais" => "canada",
        "pais_nome" => "Canadá",
        "bandeira" => "🇨🇦",
        "nome" => "ILAC Academy",
        "cidade" => "Toronto & Vancouver",
        "imagem" => "https://images.unsplash.com/photo-1517935703635-27190760b798?q=80&w=700&auto=format&fit=crop",

        "descricao" => "Reconhecida internacionalmente com campi modernos e forte suporte para entrada em universidades canadenses.",

        "descricao_completa" => "Uma das escolas de idiomas mais premiadas do mundo. Famosa pelos seus programas de Pathway universitário e cursos intensivos de inglês para todas as idades.",

        "cursos" => "Inglês Geral, Preparatório IELTS, Pathway Universitário",

        "acomodacao" => "Casa de Família (Homestay) e Residência Estudantil",

        "trabalho" => "Permite Trabalho no College Técnico",

        "recursos" => [
            "🎓 Pathway Universitário",
            "🏠 Acomodação Inclusa",
            "📜 Credenciada Languages Canada"
        ]
    ],

    [
        "id" => 2,
        "pais" => "irlanda",
        "pais_nome" => "Irlanda",
        "bandeira" => "🇮🇪",
        "nome" => "Atlas Language School",
        "cidade" => "Dublin",
        "imagem" => "https://images.unsplash.com/photo-1549918864-48ac978761a4?q=80&w=700&auto=format&fit=crop",

        "descricao" => "Destaque europeu para quem busca conciliar estudo e trabalho remunerado na Irlanda com visto facilitado.",

        "descricao_completa" => "Localizada no coração de Dublin em um lindo prédio histórico à beira do canal. Excelente infraestrutura, com biblioteca, café e suporte integral para obtenção de visto Stamp 2.",

        "cursos" => "General English, Inglês para Negócios, Preparatório Cambridge",

        "acomodacao" => "Residência Estudantil e Casas de Família selecionadas",

        "trabalho" => "Permitido trabalhar 20h/semana durante o período de aulas",

        "recursos" => [
            "💼 Programa Estudo & Trabalho",
            "👥 Mix de Nacionalidades",
            "🏆 Membro EAQUALS e MEI"
        ]
    ],

    [
        "id" => 3,
        "pais" => "uk",
        "pais_nome" => "Reino Unido",
        "bandeira" => "🇬🇧",
        "nome" => "EC London",
        "cidade" => "Londres",
        "imagem" => "https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?q=80&w=700&auto=format&fit=crop",

        "descricao" => "Imersão britânica clássica com infraestrutura de alta tecnologia e atividades culturais diárias pela cidade.",

        "descricao_completa" => "Com filiais próximas a pontos icônicos da capital britânica, a EC oferece tecnologia de ponta em sala de aula, foco na fluência oral e turmas segmentadas inclusive para maiores de 30 anos.",

        "cursos" => "Inglês Geral, Inglês 30+, Inglês Acadêmico",

        "acomodacao" => "Residências no centro de Londres e Homestay",

        "trabalho" => "Apenas cursos de curta/longa duração acadêmica",

        "recursos" => [
            "💻 Salas Interativas",
            "📅 Excursões Culturais",
            "📜 Acreditada pelo British Council"
        ]
    ],

    [
        "id" => 4,
        "pais" => "australia",
        "pais_nome" => "Austrália",
        "bandeira" => "🇦🇺",
        "nome" => "Lexis English",
        "cidade" => "Sydney & Brisbane",
        "imagem" => "https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?q=80&w=700&auto=format&fit=crop",

        "descricao" => "Perfeita para combinar estudos com trabalho na costa australiana, com orientação para currículos locais.",

        "descricao_completa" => "Para quem sonha com intercâmbio de praia, sol e qualidade de vida. A Lexis oferece suporte de carreira para empregos locais e cursos técnicos vocacionais (VET).",

        "cursos" => "General English, Cursos VET (Business / Marketing)",

        "acomodacao" => "Apartamentos compartilhados e Homestay",

        "trabalho" => "Visto de estudante com possibilidade de trabalho conforme regras vigentes",

        "recursos" => [
            "☀️ Estilo de Vida Praiano",
            "💼 Suporte para Currículo Australiano",
            "✔️ Reconhecida pelo NEAS"
        ]
    ],

    [
        "id" => 5,
        "pais" => "usa",
        "pais_nome" => "Estados Unidos",
        "bandeira" => "🇺🇸",
        "nome" => "Kaplan Manhattan",
        "cidade" => "Nova York",
        "imagem" => "https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?q=80&w=700&auto=format&fit=crop",

        "descricao" => "Viva no centro do mundo enquanto desenvolve seu inglês com método pedagógico certificado globalmente.",

        "descricao_completa" => "Localizada a passos do Central Park em Manhattan. A Kaplan possui metodologia exclusiva K+ com materiais digitais e livros próprios para acelerar a fluência.",

        "cursos" => "Inglês Intensivo, Férias Estudantis, Preparatório TOEFL",

        "acomodacao" => "Residências Estudantis em Manhattan e Brooklyn",

        "trabalho" => "Intercâmbio estritamente acadêmico conforme as condições do visto aplicável",

        "recursos" => [
            "📖 Metodologia Própria K+",
            "🏙️ Próxima ao Central Park",
            "📜 Credenciada ACCET"
        ]
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

    <title>Escolas Parceiras - Interway</title>


    <!-- GOOGLE FONT -->

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <!-- FONT AWESOME -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >


    <style>

        /* ========================================================
           PALETA INTERWAY
        ======================================================== */

        :root {

            --banner-navy: #143d75;

            --banner-navy-dark: #0b2244;

            --banner-light-blue: #7ea2d6;

            --banner-bg-soft: #edf3fa;

            --banner-white: #ffffff;

            --text-dark: #0f2547;

            --text-muted: #5e7390;

            --border-radius-banner: 20px;

        }


        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

            font-family:
                'Poppins',
                sans-serif;

        }


        body {

            background-color:
                var(--banner-bg-soft);

            color:
                var(--text-dark);

        }


        .container {

            width: 90%;

            max-width: 1200px;

            margin: 0 auto;

        }


        /* ========================================================
           HEADER
        ======================================================== */

        .header {

            background-color:
                var(--banner-navy);

            padding: 1.1rem 0;

            position: sticky;

            top: 0;

            z-index: 100;

            box-shadow:
                0 4px 12px
                rgba(0, 0, 0, 0.15);

        }


        .navbar {

            display: flex;

            justify-content: space-between;

            align-items: center;

        }


        .logo {

            font-size: 1.6rem;

            font-weight: 800;

            color:
                var(--banner-white);

            text-decoration: none;

            letter-spacing: 1.2px;

        }


        .logo span {

            color:
                var(--banner-light-blue);
        }