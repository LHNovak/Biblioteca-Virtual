// Puxa dados da API

const nomeInput = document.querySelector('input[name="nome"]');
const autorInput = document.querySelector('input[name="autor"]');
const sinopseInput = document.querySelector('textarea[name="sinopse"]');
const imagemInput = document.querySelector('input[name="imagem_url"]');
const imagemPreview = document.getElementById('preview');
const botaoBuscar = document.getElementById('buscarGoogleBooks');

botaoBuscar.addEventListener("click", async function () {

    const titulo = nomeInput.value.trim();
    const textoBotao = document.getElementById('textoBotao');

    if (!titulo) {
        alert("Digite o nome do livro antes de buscar.");
        return;
    }

    // Mostra carregando
    textoBotao.textContent = "Carregando...";
    botaoBuscar.disabled = true;

    try {
        const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=intitle:${encodeURIComponent(titulo)}&key=${apiKey}`);

        const data = await response.json();
        
        if (!data.items || data.items.length === 0) {
            alert("Livro não encontrado.");
            return;
        }
        
        const livro = data.items[0].volumeInfo;

        if (livro.title) {
            nomeInput.value = livro.title;
        }
        
        if (livro.authors) {
            autorInput.value = livro.authors;
        }

        if (livro.description) {
            sinopseInput.value = livro.description;
        }

        if (livro.imageLinks) {
            const imageUrl = livro.imageLinks.thumbnail;
        
            if (imageUrl) {
                let cleanUrl = imageUrl.replace("http:", "https:");

                // Tenta aumentar a resolução da imagem substituindo zoom=1 por zoom=3
                if (cleanUrl.includes("zoom=")) {
                    cleanUrl = cleanUrl.replace(/zoom=\d/, "zoom=3");
                }

                preview.src = cleanUrl;
                preview.style.display = "block";
                if (imagemInput) {
                    imagemInput.value = cleanUrl;
                }
            }
        }
        
    } catch (error) {
        console.error("Erro ao buscar livro:", error);
        alert("Erro ao buscar livro.");
    } finally {
        // Restaura o botão
        textoBotao.textContent = "Buscar dados do livro";
        botaoBuscar.disabled = false;
    }
});

//<!-- Preview da imagem -->
    
const input = document.getElementById('imagemLivro');
const preview = document.getElementById('preview');

input.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
    const reader = new FileReader();
    preview.style.display = "block";
    reader.addEventListener("load", function () {
        preview.setAttribute("src", this.result);
    });
    reader.readAsDataURL(file);
    } else {
    preview.style.display = "none";
    }
});

//<!-- Envio via AJAX -->
document.getElementById("formCadastro").addEventListener("submit", function(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    
    fetch("insert.php", {
    method: "POST",
    body: formData
    })
    .then(response => response.text())
    .then(data => {
    alert(data);
    if (data.toLowerCase().includes("sucesso")) {
        location.reload();
    }
    })
    .catch(error => {
    console.error("Erro ao cadastrar:", error);
    alert("Erro ao cadastrar o livro.");
    });
});