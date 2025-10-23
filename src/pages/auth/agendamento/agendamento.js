document.addEventListener('DOMContentLoaded', () => {
    const containerDias = document.querySelector('.dias');
    const btnMostrarHorarios = document.getElementById('btnMostrarHorarios');
    const horariosSection = document.querySelector('.horarios');
    const listaHorarios = document.querySelector('.lista-horarios');
    const dataSelecionadaSpan = document.getElementById('dataSelecionada');
    const btnConfirmar = document.getElementById('btnConfirmar');
    const mensagemAgendamento = document.getElementById('mensagemAgendamento');
  
    let diaSelecionado = null;
    let horarioSelecionado = null;
  
    const horariosDisponiveis = [
      '08:00', '08:30', '09:00', '09:30', '10:00',
      '14:00', '14:30', '15:00', '15:30', '16:00'
    ];
  
    const today = new Date();
    const mesAtual = today.getMonth();
    const anoAtual = today.getFullYear();
    const totalDias = new Date(anoAtual, mesAtual + 1, 0).getDate();
    const primeiroDiaSemana = new Date(anoAtual, mesAtual, 1).getDay();
  
    // Adiciona placeholders para alinhar o primeiro dia do mês
    for (let i = 0; i < primeiroDiaSemana; i++) {
      const span = document.createElement('span');
      containerDias.appendChild(span);
    }
  
    // Gera os dias do mês
    for (let i = 1; i <= totalDias; i++) {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.textContent = i;
      btn.classList.add('dia');
  
      const diaSemana = new Date(anoAtual, mesAtual, i).getDay();
  
      if (diaSemana === 0 || diaSemana === 6) { // domingo ou sábado
        btn.classList.add('inativo');
        btn.disabled = true;
      }
  
      containerDias.appendChild(btn);
    }
  
    const dias = document.querySelectorAll('.dias .dia:not(.inativo)');
  
    function limparSelecaoDias() {
      dias.forEach(dia => dia.classList.remove('selecionado'));
    }
  
    dias.forEach(dia => {
      dia.addEventListener('click', () => {
        limparSelecaoDias();
        dia.classList.add('selecionado');
        diaSelecionado = dia.textContent;
        btnMostrarHorarios.disabled = false;
        btnMostrarHorarios.setAttribute('aria-disabled', 'false');
        mensagemAgendamento.hidden = true; // limpa mensagem ao mudar de dia
      });
    });
  
    btnMostrarHorarios.addEventListener('click', () => {
      if (!diaSelecionado) return;
  
      dataSelecionadaSpan.textContent = `dia ${diaSelecionado}`;
      horariosSection.hidden = false;
      listaHorarios.innerHTML = '';
      horarioSelecionado = null;
      btnConfirmar.disabled = true;
      mensagemAgendamento.hidden = true;
  
      horariosDisponiveis.forEach(horario => {
        const btn = document.createElement('button');
        btn.classList.add('btn-horario');
        btn.type = 'button';
        btn.textContent = horario;
  
        btn.addEventListener('click', () => {
          document.querySelectorAll('.btn-horario').forEach(b => b.classList.remove('selecionado'));
          btn.classList.add('selecionado');
          horarioSelecionado = horario;
          btnConfirmar.disabled = false;
          mensagemAgendamento.hidden = true; // limpa mensagem ao selecionar horário
        });
  
        listaHorarios.appendChild(btn);
      });
  
      horariosSection.scrollIntoView({ behavior: 'smooth' });
    });
  
    btnConfirmar.addEventListener('click', () => {
      if (!diaSelecionado || !horarioSelecionado) return;
  
      mensagemAgendamento.textContent = `✅ Consulta agendada para o dia ${diaSelecionado} às ${horarioSelecionado}!`;
      mensagemAgendamento.hidden = false;
  
      // opcional: desativa seleção após confirmar
      btnConfirmar.disabled = true;
      document.querySelectorAll('.btn-horario').forEach(b => b.disabled = true);
    });
  });
  