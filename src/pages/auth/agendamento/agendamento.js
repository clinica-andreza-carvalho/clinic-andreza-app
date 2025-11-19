document.addEventListener('DOMContentLoaded', () => {
  const dias = document.querySelectorAll('.dias .dia:not(.inativo)');
  const btnMostrarHorarios = document.getElementById('btnMostrarHorarios');
  const horariosSection = document.querySelector('.horarios');
  const listaHorarios = document.querySelector('.lista-horarios');
  const dataSelecionadaSpan = document.getElementById('dataSelecionada');
  const btnConfirmar = document.getElementById('btnConfirmar');

  let diaSelecionado = null;
  let horarioSelecionado = null;

  // Exemplo de horários disponíveis (pode ser substituído por dados do backend)
  const horariosDisponiveis = [
    '08:00', '09:00', '10:00',
    '14:00', '15:00', '16:00',
  ];

  // Função para limpar seleção de dias
  function limparSelecaoDias() {
    dias.forEach(dia => dia.classList.remove('selecionado'));
  }

  // Selecionar um dia
  dias.forEach(dia => {
    dia.addEventListener('click', () => {
      limparSelecaoDias();
      dia.classList.add('selecionado');
      diaSelecionado = dia.textContent;

      // Habilita botão para mostrar horários
      btnMostrarHorarios.disabled = false;
      btnMostrarHorarios.setAttribute('aria-disabled', 'false');
    });
  });

  // Mostrar horários ao clicar no botão
  btnMostrarHorarios.addEventListener('click', (e) => {
    e.preventDefault();
    if (!diaSelecionado) return;

    // Atualiza texto da data selecionada
    dataSelecionadaSpan.textContent = `dia ${diaSelecionado}`;

    // Mostrar seção de horários
    horariosSection.hidden = false;

    // Limpa lista e seleção anterior
    listaHorarios.innerHTML = '';
    horarioSelecionado = null;
    btnConfirmar.disabled = true;

    // Cria botões para cada horário
    horariosDisponiveis.forEach(horario => {
      const btn = document.createElement('button');
      btn.classList.add('btn-horario');
      btn.textContent = horario;
      btn.setAttribute('type', 'button');

      btn.addEventListener('click', () => {
        // Deselecionar todos
        document.querySelectorAll('.btn-horario').forEach(b => b.classList.remove('selecionado'));
        // Selecionar este
        btn.classList.add('selecionado');
        horarioSelecionado = horario;
        btnConfirmar.disabled = false;
      });

      listaHorarios.appendChild(btn);
    });

    // Scroll para a área de horários
    horariosSection.scrollIntoView({ behavior: 'smooth' });
  });

  // Confirmar agendamento
  btnConfirmar.addEventListener('click', () => {
    if (!diaSelecionado || !horarioSelecionado) return;

    alert(`Consulta agendada para o dia ${diaSelecionado} às ${horarioSelecionado}!`);
    // Aqui você pode adicionar código para enviar o agendamento para o backend
  });
})