# 📚 Biblioteca Virtual

Um pequeno projeto/site feito com propósito de **estudo**, funcionando como um **catálogo pessoal de livros**.

## 🚀 Tecnologias Utilizadas
- **HTML5**
- **CSS3**
- **JavaScript**
- **PHP**
- **APIs** (Google Books API)
- **AJAX**
- **MySQL** (Banco de dados)

---

## 🛠 Funcionalidades
- 📖 **Cadastro de livros** com:
  - Nome
  - Autor
  - Categoria
  - Sinopse
  - Imagem (URL ou upload)

- 🔍 **Busca automática pela API do Google Books**:
  - O usuário digita o nome do livro
  - A API retorna informações como título, autor, descrição e capa (se disponível)
  - Os dados podem ser salvos diretamente no banco de dados

- 🔎 **Pesquisa de livros cadastrados** por texto
- ❌ **Exclusão de livros** do catálogo

---

## 🗄 Fluxo de Funcionamento
1. O usuário preenche o formulário ou busca informações via API do Google Books.
2. Os dados são enviados via **AJAX** para o backend em **PHP**.
3. As informações são armazenadas no **MySQL**.
4. O usuário pode visualizar, pesquisar e excluir livros cadastrados.
