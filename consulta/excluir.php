<?php
$link = mysqli_connect("localhost", "root", "", "biblioteca");

if ($link === false) {
    die("ERRO: Não foi possível conectar ao BD. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $verifica = mysqli_query($link, "SELECT * FROM livros WHERE id = $id");
    if (mysqli_num_rows($verifica) > 0) {
        $sql = "DELETE FROM livros WHERE id = $id";
        if (mysqli_query($link, $sql)) {
            echo "Livro excluído com sucesso!";
        } else {
            echo "Erro ao excluir o livro: " . mysqli_error($link);
        }
    } else {
        echo "Livro não encontrado ou já foi excluído.";
    }
} else {
    echo "Requisição inválida.";
}

mysqli_close($link);
?>