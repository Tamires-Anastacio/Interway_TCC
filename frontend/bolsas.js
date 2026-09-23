// 1. FILTRAGEM POR CATEGORIA DE BOLSA
const chipsFiltro = document.querySelectorAll(".chip");
const cardsBolsas = document.querySelectorAll(".scholarship-card");

chipsFiltro.forEach((chip) => {
  chip.addEventListener("click", () => {
    chipsFiltro.forEach((c) => c.classList.remove("active"));
    chip.classList.add("active");

    const tipoFiltro = chip.getAttribute("data-type");

    cardsBolsas.forEach((card) => {
      const tiposDoCard = card.getAttribute("data-type");

      if (tipoFiltro === "all" || tiposDoCard.includes(tipoFiltro)) {
        card.style.display = "flex";
      } else {
        card.style.display = "none";
      }
    });
  });
});

// 2. BUSCA EM TEMPO REAL POR TEXTO
const inputBusca = document.getElementById("busca-bolsa");

inputBusca.addEventListener("input", (e) => {
  const termo = e.target.value.toLowerCase();

  cardsBolsas.forEach((card) => {
    const nome = card.getAttribute("data-nome").toLowerCase();
    const uni = card.getAttribute("data-uni").toLowerCase();
    const pais = card.getAttribute("data-pais").toLowerCase();

    if (nome.includes(termo) || uni.includes(termo) || pais.includes(termo)) {
      card.style.display = "flex";
    } else {
      card.style.display = "none";
    }
  });
});

// 3. ABRIR E FECHAR MODAL COM REQUISITOS
const modalBolsa = document.getElementById("modal-bolsa");
const modalNome = document.getElementById("modal-nome-bolsa");
const modalSub = document.getElementById("modal-sub-info");
const modalValor = document.getElementById("modal-valor-bolsa");
const modalRequisitos = document.getElementById("modal-requisitos-bolsa");
const modalPrazo = document.getElementById("modal-prazo-bolsa");

function abrirModalBolsa(card) {
  modalNome.innerText = card.getAttribute("data-nome");
  modalSub.innerText = `${card.getAttribute("data-uni")} • ${card.getAttribute("data-pais")} (${card.getAttribute("data-nivel")})`;
  modalValor.innerText = card.getAttribute("data-valor");
  modalRequisitos.innerText = card.getAttribute("data-requisitos");
  modalPrazo.innerText = card.getAttribute("data-prazo");

  modalBolsa.style.display = "flex";
}

function fecharModalBolsa() {
  modalBolsa.style.display = "none";
}

window.addEventListener("click", (e) => {
  if (e.target === modalBolsa) {
    fecharModalBolsa();
  }
});