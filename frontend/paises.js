// 1. FILTRAGEM POR CATEGORIAS (TRABALHO, INGLÊS, ACESSÍVEL)
const botoesFiltro = document.querySelectorAll(".filter-btn");
const cardsPaises = document.querySelectorAll(".country-card");

botoesFiltro.forEach((btn) => {
  btn.addEventListener("click", () => {
    botoesFiltro.forEach((b) => b.classList.remove("active"));
    btn.classList.add("active");

    const filtro = btn.getAttribute("data-filter");

    cardsPaises.forEach((card) => {
      const tags = card.getAttribute("data-tags") || "";

      if (filtro === "all" || tags.includes(filtro)) {
        card.style.display = "flex";
      } else {
        card.style.display = "none";
      }
    });
  });
});

// 2. MODAL DE SEGURANÇA E DICAS DO PAÍS
const modalPais = document.getElementById("modal-pais");
const modalNome = document.getElementById("modal-nome-pais");
const modalSeguranca = document.getElementById("modal-seguranca-texto");
const modalTrabalho = document.getElementById("modal-trabalho-texto");
const modalEmergencia = document.getElementById("modal-emergencia-texto");
const modalDica = document.getElementById("modal-dica-texto");

function abrirModalSeguranca(card) {
  modalNome.innerText = card.getAttribute("data-nome");
  modalSeguranca.innerText = card.getAttribute("data-seguranca");
  modalTrabalho.innerText = card.getAttribute("data-trabalho");
  modalEmergencia.innerText = card.getAttribute("data-emergencia");
  modalDica.innerText = card.getAttribute("data-dica");

  modalPais.style.display = "flex";
}

function fecharModalPais() {
  modalPais.style.display = "none";
}

// Fechar ao clicar fora da janela
window.addEventListener("click", (e) => {
  if (e.target === modalPais) {
    fecharModalPais();
  }
});