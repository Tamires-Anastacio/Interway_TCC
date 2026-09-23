// 1. FILTRAGEM POR PAÍSES (BOTÕES PILL)
const botoesFiltro = document.querySelectorAll(".pill-btn");
const cardsEscolas = document.querySelectorAll(".school-card");

botoesFiltro.forEach((btn) => {
  btn.addEventListener("click", () => {
    // Remove classe ativa de todos e adiciona no clicado
    botoesFiltro.forEach((b) => b.classList.remove("active"));
    btn.classList.add("active");

    const filtro = btn.getAttribute("data-filter");

    cardsEscolas.forEach((card) => {
      const paisDoCard = card.getAttribute("data-country");

      if (filtro === "all" || paisDoCard === filtro) {
        card.style.display = "flex";
      } else {
        card.style.display = "none";
      }
    });
  });
});

// 2. BUSCA EM TEMPO REAL (NOME, CIDADE OU CURSOS)
const inputBusca = document.getElementById("input-busca");

inputBusca.addEventListener("input", (e) => {
  const termo = e.target.value.toLowerCase();

  cardsEscolas.forEach((card) => {
    const nome = card.getAttribute("data-name").toLowerCase();
    const cidade = card.getAttribute("data-city").toLowerCase();
    const cursos = card.getAttribute("data-courses").toLowerCase();

    if (nome.includes(termo) || cidade.includes(termo) || cursos.includes(termo)) {
      card.style.display = "flex";
    } else {
      card.style.display = "none";
    }
  });
});

// 3. ABRIR E FECHAR O MODAL DE DETALHES
const modal = document.getElementById("modal-escola");
const modalTitulo = document.getElementById("modal-titulo");
const modalCidade = document.getElementById("modal-cidade");
const modalDescricao = document.getElementById("modal-descricao");
const modalCursos = document.getElementById("modal-cursos");
const modalAcomodacao = document.getElementById("modal-acomodacao");
const modalTrabalho = document.getElementById("modal-trabalho");

function abrirModal(card) {
  modalTitulo.innerText = card.getAttribute("data-name");
  modalCidade.innerHTML = `<i class="fa-solid fa-location-dot"></i> ${card.getAttribute("data-city")}`;
  modalDescricao.innerText = card.getAttribute("data-desc");
  modalCursos.innerText = card.getAttribute("data-courses");
  modalAcomodacao.innerText = card.getAttribute("data-housing");
  modalTrabalho.innerText = card.getAttribute("data-work");

  modal.style.display = "flex";
}

function fecharModal() {
  modal.style.display = "none";
}

// Fecha o modal ao clicar fora da caixa
window.addEventListener("click", (e) => {
  if (e.target === modal) {
    fecharModal();
  }
});