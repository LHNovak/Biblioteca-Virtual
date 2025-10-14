<?php
    // Conexão com o banco de dados
    $link = mysqli_connect("localhost", "root", "", "biblioteca");

    if ($link === false) {
        die("ERRO: Não foi possível conectar ao BD. " . mysqli_connect_error());
    }

    // Pega os dados do formulário
    $nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
    $autor = mysqli_real_escape_string($link, $_REQUEST['autor']);
    $categoria = mysqli_real_escape_string($link, $_REQUEST['categoria']);
    $sinopse = mysqli_real_escape_string($link, $_REQUEST['sinopse']);
    $imagemUrl = mysqli_real_escape_string($link, $_REQUEST['imagem_url']);
    $nomeArquivo = basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;

    // Lida com o upload da imagem
    if ($nomeArquivo == ""){
        $caminhoImagem = $imagemUrl;
    } else {
        $diretorio = "../uploads/";
        $caminhoImagem = $diretorio . $nomeArquivo;
        $tipoImagem = strtolower(pathinfo($caminhoImagem, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoImagem);
    }
    // Faz o upload do arquivo
    if ($uploadOk == 1) {
            // Insere no banco de dados, incluindo o caminho da imagem
        $sql = "INSERT INTO livros (nome, autor, id_categoria, sinopse, imagem) VALUES ('$nome', '$autor', '$categoria', '$sinopse', '$caminhoImagem')";

        if (mysqli_query($link, $sql)) {
            echo "Livro cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o livro: $sql. " . mysqli_error($link);
        }
        
    } else {
        echo "Desculpe, seu arquivo não pôde ser enviado.";
    }

    // Fecha a conexão
    mysqli_close($link);
?>