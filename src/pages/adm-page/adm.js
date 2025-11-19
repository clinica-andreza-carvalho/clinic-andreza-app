// --- Controle de páginas ---
function showPage(pageId) {
    document.querySelectorAll(".page").forEach(p => p.classList.remove("active"));
    document.getElementById(pageId).classList.add("active");
  
    if (pageId === "produtos") renderProdutos();
  }
  
  // --- LocalStorage ---
  function getProdutos() {
    return JSON.parse(localStorage.getItem("produtos") || "[]");
  }
  
  function saveProdutos(produtos) {
    localStorage.setItem("produtos", JSON.stringify(produtos));
  }
  
  // --- Renderizar lista de produtos ---
  function renderProdutos() {
    const produtosGrid = document.getElementById("produtosGrid");
    const produtos = getProdutos();
  
    produtosGrid.innerHTML = produtos.map((p, i) => `
      <div class="produto" onclick="openProduto(${i})">
        <img src="${p.imagem || 'https://via.placeholder.com/150'}" alt="">
        <p>${p.nome}</p>
      </div>
    `).join("");
  
    produtosGrid.innerHTML += `
      <div class="produto add" onclick="novoProduto()">
        <span>+</span>
        <p>Adicionar Produto</p>
      </div>
    `;
  }
  
  // --- Abrir produto existente ---
  let produtoAtual = null;
  
  function openProduto(index) {
    produtoAtual = index;
    const p = getProdutos()[index];
  
    document.getElementById("formTitle").textContent = "Editar Produto";
    document.getElementById("nomeProduto").value = p.nome;
    document.getElementById("descricaoProduto").value = p.descricao;
    document.getElementById("marcaProduto").value = p.marca;
    document.getElementById("precoProduto").value = p.preco;
    document.getElementById("precoPromocionalProduto").value = p.precoPromo;
    document.getElementById("tagsProduto").value = p.tags;
    document.getElementById("imgProduto").src = p.imagem || "https://via.placeholder.com/300";
  
    showPage("detalhes-produto");
  }
  
  // --- Novo produto ---
  function novoProduto() {
    produtoAtual = null;
    document.getElementById("formTitle").textContent = "Adicionar Produto";
  
    document.getElementById("nomeProduto").value = "";
    document.getElementById("descricaoProduto").value = "";
    document.getElementById("marcaProduto").value = "";
    document.getElementById("precoProduto").value = "";
    document.getElementById("precoPromocionalProduto").value = "";
    document.getElementById("tagsProduto").value = "";
    document.getElementById("imgProduto").src = "https://via.placeholder.com/300";
  
    showPage("detalhes-produto");
  }
  
  // --- Atualizar ou criar produto ---
  function updateProduto() {
    const produtos = getProdutos();
  
    const novoProduto = {
      nome: document.getElementById("nomeProduto").value,
      descricao: document.getElementById("descricaoProduto").value,
      marca: document.getElementById("marcaProduto").value,
      preco: document.getElementById("precoProduto").value,
      precoPromo: document.getElementById("precoPromocionalProduto").value,
      tags: document.getElementById("tagsProduto").value,
      imagem: document.getElementById("imgProduto").src
    };
  
    if (produtoAtual === null) {
      produtos.push(novoProduto);
    } else {
      produtos[produtoAtual] = novoProduto;
    }
  
    saveProdutos(produtos);
    showPage("produtos");
  }
  
  // --- Deletar produto ---
  function deleteProduto() {
    if (produtoAtual === null) return;
    const produtos = getProdutos();
    produtos.splice(produtoAtual, 1);
    saveProdutos(produtos);
    showPage("produtos");
  }
  
  // --- Upload de imagem ---
  document.getElementById("uploadInput").addEventListener("change", function (e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (evt) {
      document.getElementById("imgProduto").src = evt.target.result;
    };
    reader.readAsDataURL(file);
  });
  
  // Inicializa lista ao carregar
  window.onload = renderProdutos;
  