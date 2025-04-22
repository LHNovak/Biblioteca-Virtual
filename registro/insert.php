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

    // Lida com o upload da imagem
    $diretorio = "../uploads/";
    $nomeArquivo = basename($_FILES["imagem"]["name"]);
    $caminhoImagem = $diretorio . $nomeArquivo;
    $uploadOk = 1;
    $tipoImagem = strtolower(pathinfo($caminhoImagem, PATHINFO_EXTENSION));

    // Verifica se é uma imagem real
    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
    if ($check === false) {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    // Permitir apenas alguns formatos
    if (!in_array($tipoImagem, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    // Faz o upload do arquivo
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoImagem)) {
            // Insere no banco de dados, incluindo o caminho da imagem
            $sql = "INSERT INTO livros (nome, autor, id_categoria, sinopse, imagem) VALUES ('$nome', '$autor', '$categoria', '$sinopse', '$caminhoImagem')";

            if (mysqli_query($link, $sql)) {
                echo "Livro cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o livro: $sql. " . mysqli_error($link);
            }
        } else {
            echo "Houve um erro ao enviar o arquivo da imagem.";
        }
    } else {
        echo "Desculpe, seu arquivo não pôde ser enviado.";
    }

    // Fecha a conexão
    mysqli_close($link);
?>