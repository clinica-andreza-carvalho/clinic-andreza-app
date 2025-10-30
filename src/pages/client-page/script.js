const modal = document.getElementById("modalCancelamento");
const btnsCancelar = document.querySelectorAll(".btn-cancelar");
const btnFechar = document.getElementById("fecharModal");
const btnConfirmar = document.getElementById("confirmarCancelamento");
let agendamentoSelecionado = null;

// Exibir modal apenas ao clicar em "Cancelar"
btnsCancelar.forEach(btn => {
  btn.addEventListener("click", () => {
    agendamentoSelecionado = btn.closest("li"); // guarda o item
    modal.classList.add("ativo");
  });
});

// Fechar modal
btnFechar.addEventListener("click", () => {
  modal.classList.remove("ativo");
  agendamentoSelecionado = null;
});

// Confirmar cancelamento
btnConfirmar.addEventListener("click", () => {
  if (agendamentoSelecionado) {
    agendamentoSelecionado.remove();
  }
  modal.classList.remove("ativo");
  alert("Agendamento cancelado com sucesso!");
});

// Fechar ao clicar fora do modal
modal.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.classList.remove("ativo");
  }
});
