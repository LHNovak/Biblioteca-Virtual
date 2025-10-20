# 📚 Biblioteca Virtual  

[![Status](https://img.shields.io/badge/status-em%20desenvolvimento-yellow?style=for-the-badge)](#)
[![License](https://img.shields.io/badge/license-MIT-green?style=for-the-badge)](LICENSE)
[![Made with](https://img.shields.io/badge/Made%20with-PHP-blue?style=for-the-badge&logo=php)](#)
[![Google Books API](https://img.shields.io/badge/API-Google%20Books-red?style=for-the-badge&logo=google)](#)

---

## 🧩 Sobre o Projeto

A **Biblioteca Virtual** é um projeto web criado com o propósito de **estudo** e prática de integração entre **frontend e backend**, utilizando a **API do Google Books**.

Ela funciona como um **catálogo pessoal de livros**, permitindo que o usuário cadastre, visualize, pesquise e exclua obras de forma simples e intuitiva.  

---

## 🚀 Tecnologias Utilizadas

| Camada | Tecnologias |
|:--|:--|
| **Frontend** | HTML5, CSS3, JavaScript, AJAX |
| **Backend** | PHP |
| **Banco de Dados** | MySQL |
| **Integrações** | Google Books API |

---

## ⚙️ Funcionalidades

✅ **Cadastrar livros** com informações como:
- Nome  
- Autor  
- Categoria  
- Sinopse  
- Imagem da capa (upload ou via URL da API)

🔍 **Buscar informações automaticamente pela API do Google Books**  
- O usuário digita o nome do livro  
- A API retorna os dados automaticamente (título, autor, sinopse e capa)  

💾 **Salvar no banco de dados**  
🗑 **Excluir livros cadastrados**  
📖 **Pesquisar livros existentes**  

---

## 🔄 Fluxo de Funcionamento

1. O usuário digita o nome de um livro.  
2. O sistema consulta a **Google Books API** e preenche os campos automaticamente.  
3. O usuário confirma o cadastro.  
4. As informações são armazenadas no **MySQL** via **PHP + AJAX**.  
5. O catálogo pode ser pesquisado e gerenciado diretamente na interface.

---

## 💻 Como Rodar o Projeto Localmente

1. **Clone o repositório**
   ```bash
   git clone https://github.com/SEU_USUARIO/biblioteca-virtual.git
   cd biblioteca-virtual

---   

2. **Configure o ambiente local**
   - Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html), [WAMP](https://www.wampserver.com/en/) ou outro servidor PHP local.
   - Copie os arquivos do projeto para a pasta:
     ```
     C:\xampp\htdocs\biblioteca-virtual
     ```
   - Inicie o **Apache** e o **MySQL** no painel de controle do XAMPP.

---

3. **Configure o banco de dados**
   - Acesse o [phpMyAdmin](http://localhost/phpmyadmin)
   - Crie um banco de dados chamado `biblioteca`
   - Importe o arquivo SQL do projeto (se existir):
     ```
     biblioteca.sql
     ```
   - Verifique se a tabela `livros` possui os seguintes campos:
     ```sql
     id INT AUTO_INCREMENT PRIMARY KEY,
     nome VARCHAR(255),
     autor VARCHAR(255),
     id_categoria INT,
     sinopse TEXT,
     imagem VARCHAR(500)
     ```

---

4. **Adicione sua chave da API do Google Books**
   - Crie um arquivo `config.php` na raiz do projeto:
     ```php
     <?php
     define('GOOGLE_BOOKS_API_KEY', 'sua_api_key_aqui');
     ?>
     ```
   - Garanta que o arquivo `config.php` **não seja enviado para o GitHub**.  
     Adicione-o no seu `.gitignore`:
     ```
     config.php
     ```

---

5. **Execute o projeto**
   - Após configurar o ambiente e o banco de dados, abra o navegador e acesse:
     ```
     http://localhost/biblioteca-virtual
     ```

---

## 🖼️ Demonstração

### 📋 Tela Inicial
![Tela-Inicial.png](https://i.postimg.cc/yNb60wx5/Tela-Inicial.png)

### 📚 Catálogo de Livros
![Tela-Consulta.png](https://i.postimg.cc/qvKGfTV8/Tela-Consulta.png)

### 📚 Registro de Livros
![Tela-Cadastro.png](https://i.postimg.cc/WpKrsH7n/Tela-Cadastro.png)

---

## 🧠 Aprendizados e Conceitos Praticados
- Integração com **APIs REST**
- Manipulação de **DOM e eventos** com JavaScript
- Envio e recebimento de dados com **AJAX**
- Estrutura e manipulação de **banco de dados MySQL**
- Comunicação entre **frontend e backend**
- Boas práticas de **organização de código e segurança básica**

---

## 📄 Licença
Este projeto está licenciado sob a licença **MIT**.  
Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

⭐ **Se gostou do projeto, deixe uma estrela no repositório e contribua com melhorias!**
