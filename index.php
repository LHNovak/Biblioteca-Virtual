<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
</head>
<body>

  <div class="titulo">
    <h1>Biblioteca Virtual</h1>
  </div>

  <div class="caixa">

    <form action="consulta/select.php" method="post" class="consulta-form">
      <label for="consulta">Nome do Livro:</label>
      <input type="text" id="consulta" name="consulta" placeholder="Digite o título...">
      <input type="submit" value="Consultar">
    </form>
    
  </div>
  
  <div class="registro">
    <a href="registro/cadastro.php" class="registro-botao">Registrar Novo Livro</a>
  </div>
  
</body>