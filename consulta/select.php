<?php
$link = mysqli_connect("localhost", "root", "", "biblioteca");

if ($link === false) {
    die("ERRO: Não foi possível conectar ao BD. " . mysqli_connect_error());
}

$consulta = mysqli_real_escape_string($link, $_REQUEST['consulta']);

$sql = 
"SELECT l.*, c.nome_categoria
 FROM livros AS l
 LEFT JOIN categoria AS c ON l.id_categoria = c.id
 WHERE l.nome LIKE '%$consulta%'
 ORDER BY l.nome";

$resultado = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Resultado da Consulta</title>
  <link rel="stylesheet" href="style.css">
  <script>
  function confirmarExclusao(id) {
    if (confirm("Tem certeza que deseja excluir este livro?")) {
      fetch('excluir.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'id=' + encodeURIComponent(id)
      })
      .then(response => response.text())
      .then(data => {
        alert(data); // Mostra mensagem de sucesso ou erro
        location.reload(); // Recarrega a página após a exclusão
      })
      .catch(error => {
        alert("Erro ao tentar excluir o livro.");
        console.error('Erro:', error);
      });
    }
  }
</script>

</head>
<body>

<div class="titulo">
    <h1>Consulta de Livros</h1>
  </div>

<?php
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo '<div class="resultado-container">';
        echo '<div class="livro-info">';

        if (!empty($row["imagem"])) {
            echo '<img class="livro-img" src="' . htmlspecialchars($row["imagem"]) . '" alt="Capa do Livro">';
        } else {
            echo '<img class="livro-img" src="https://via.placeholder.com/200x300?text=Sem+Imagem" alt="Sem imagem">';
        }

        echo '<div class="detalhes">';
        echo '<h2>' . htmlspecialchars($row["nome"]) . '</h2>';
        echo '<p><strong>Autor(a):</strong> ' . htmlspecialchars($row["autor"]) . '</p>';
        echo '<p><strong>Categoria:</strong> ' . htmlspecialchars($row["nome_categoria"]) . '</p>';
        echo '<p><strong>Sinopse:</strong></p>';
        echo '<div class="sinopse-box">' . nl2br(htmlspecialchars($row["sinopse"])) . '</div>';
        echo '<button class="excluir-botao" onclick="confirmarExclusao(' . $row["id"] . ')">Excluir Livro</button>';
        echo '</div></div>';
        echo '<div class="botao-voltar"><a href="../index.php">Voltar à Página Inicial</a></div>';
        echo '</div>';
    }
} else {
    echo '<div class="resultado-container">';
    echo '<h2 class = "mensagem">Não foi encontrado nenhum livro com o nome: ' . htmlspecialchars($consulta) . '</h2>';
    echo '<div class="botao-voltar"><a href="../registro/cadastro.php">Cadastrar Livro</a> | <a href="index.php">Página Inicial</a></div>';
    echo '</div>';
}

mysqli_close($link);
?>

</body>
</html>