const respostas = document.querySelectorAll(".resposta");

const resultado = document.getElementById("resultado");
const tituloResultado = document.getElementById("titulo-resultado");
const textoResultado = document.getElementById("texto-resultado");
const linkResultado = document.getElementById("link-resultado");

let pontuacao = {
    idiomas: 0,
    trabalho: 0,
    highschool: 0,
    hostfamily: 0
};


// Quando o usuário clicar em uma resposta
respostas.forEach(function (botao) {

    botao.addEventListener("click", function () {

        const tipo = botao.dataset.tipo;

        pontuacao[tipo]++;

        botao.classList.add("selecionado");

        // Desativa os botões da mesma pergunta
        const pergunta = botao.parentElement;

        const botoes = pergunta.querySelectorAll(".resposta");

        botoes.forEach(function (item) {
            item.disabled = true;
        });

        verificarResultado();

    });

});


// Verifica se todas as perguntas foram respondidas
function verificarResultado() {

    const perguntas = document.querySelectorAll(".pergunta");

    let respondidas = 0;

    perguntas.forEach(function (pergunta) {

        const botoes = pergunta.querySelectorAll(".resposta");

        const respondeu = Array.from(botoes).some(function (botao) {
            return botao.classList.contains("selecionado");
        });

        if (respondeu) {
            respondidas++;
        }

    });


    if (respondidas === perguntas.length) {

        mostrarResultado();

    }

}


// Descobre o maior resultado
function mostrarResultado() {

    let maior = 0;
    let perfil = "";

    for (const tipo in pontuacao) {

        if (pontuacao[tipo] > maior) {

            maior = pontuacao[tipo];
            perfil = tipo;

        }

    }


    resultado.style.display = "block";


    if (perfil === "idiomas") {

        tituloResultado.textContent =
            "Intercâmbio de Idiomas";

        textoResultado.textContent =
            "Você parece gostar de conhecer novas culturas e aprender idiomas. " +
            "Um intercâmbio de idiomas pode ser uma boa forma de desenvolver " +
            "suas habilidades linguísticas enquanto vive uma experiência internacional.";

        linkResultado.href = "idiomas.html";

    }


    else if (perfil === "trabalho") {

        tituloResultado.textContent =
            "Intercâmbio a Trabalho";

        textoResultado.textContent =
            "Você demonstra interesse em adquirir experiência profissional " +
            "e conhecer novas oportunidades. Um intercâmbio de trabalho pode " +
            "combinar com seus objetivos.";

        linkResultado.href = "trabalho.html";

    }


    else if (perfil === "highschool") {

        tituloResultado.textContent =
            "High School";

        textoResultado.textContent =
            "Você parece se interessar por estudos e experiências escolares. " +
            "Um programa de High School pode permitir que você estude no exterior " +
            "e conheça uma nova cultura.";

        linkResultado.href = "highschool.html";

    }


    else if (perfil === "hostfamily") {

        tituloResultado.textContent =
            "Host Family";

        textoResultado.textContent =
            "Você demonstra interesse em convivência e experiências culturais. " +
            "Uma Host Family pode proporcionar contato próximo com a cultura local.";

        linkResultado.href = "host-families.html";

    }

}