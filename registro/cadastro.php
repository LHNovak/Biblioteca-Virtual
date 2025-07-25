<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="ISO-8859-1">
  <title>Registro de Livros</title>
</head>
<body>
  <div class="titulo">
    <h1>REGISTRO DE LIVROS</h1>
  </div>

  <div class="container">
    <!-- Caixa do formulário -->
    <div class="caixa">
      <form id="formCadastro" enctype="multipart/form-data">
        <table>
          <tr>
            <td>Nome do Livro:</td>
            <td>
              <input type="text" name="nome" id="nomeLivro" required>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>  
              <button type="button" id="buscarGoogleBooks" class="botao-buscar-api">
                <span id="textoBotao">Buscar dados do livro</span>
              </button>
            </td>   
          </tr>
          <tr>
            <td>Autor(a)</td>
            <td><input type="text" name="autor" required></td>
          </tr>
          <tr>
            <td>Categoria:</td>
            <td>
              <select name="categoria" required>
                <option value="" disabled selected>Selecione uma categoria</option>
                <option value="1">Infantil</option>
                <option value="2">Educativo</option>
                <option value="3">Ação/Aventura</option>
                <option value="4">Drama</option>
                <option value="5">Romance</option>
                <option value="6">Comédia</option>
                <option value="7">Suspense</option>
                <option value="8">Terror</option>
                <option value="9">Ficção</option>
                <option value="10">Outros</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Sinopse:</td>
            <td><textarea name="sinopse" rows="6"></textarea></td>
          </tr>
          <tr>
            <td>Imagem da Capa:</td>
            <td>
              <div class="file-box">
                <input type="file" name="imagem" id="imagemLivro" accept="image/*">
                <input type="hidden" name="imagem_url" id="imagem_url">
              </div>
            </td>
          </tr>
        </table>
        <div class="botoes-formulario">
          <a href="../index.php" class="btn-voltar">Voltar</a>
          <input type="submit" value="Registrar">
        </div>
      </form>
    </div>

    <!-- Coluna lateral com prévia da imagem -->
    <div class="imagem-preview">
      <label>Prévia da Capa:</label><br><br>
      <img id="preview" src="#" alt="Prévia da Capa" style="display: none;" />
    </div>
  </div>
  <?php require_once "config.php"; ?>
  <script> const apiKey = "<?php echo GOOGLE_BOOKS_API_KEY; ?>"; </script>
  <script src="script.js"></script>
</body>
</html>