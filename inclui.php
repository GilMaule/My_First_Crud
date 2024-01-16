<?php
require_once 'inicia.php';
/**Coleta as informaçoes digitadas no formulario form_inclui.php */
$titulo_livro = isset ($_POST['titulo_livro']) ? $_POST['titulo_livro'] : null;

/**isset() é uma função que verifica se uma variável está definida e não é nula 
 * Se isset($_POST['titulo_livro']) for verdadeiro (ou seja, se o valor estiver definido em $_POST['titulo_livro']), 
 * então $titulo_livro recebe esse valor. Se for falso $titulo_livro recebe null. **/

$cod_isbn = isset ($_POST['cod_isbn']) ? $_POST['cod_isbn'] : null;
$autor_livro = isset ($_POST['autor_livro']) ? $_POST['autor_livro'] : null;
$nome_editora = isset ($_POST['nome_editora']) ? $_POST['nome_editora'] : null;
$qtd_paginas = isset ($_POST['qtd_paginas']) ? $_POST['qtd_paginas'] : null;

/**Verifica se o usuario preencheu todos os campos do formulario */
if (empty($titulo_livro) || empty($cod_isbn) || empty($autor_livro) || empty($nome_editora) || empty($qtd_paginas)){
    echo "É preciso preencher todos os campos do formulario de cadastro!";
    exit;
}

/**Insere as informaçoes na tabela de livros do banco de dados criado 'FirstCrud' (Criar banco de dados com o PHPMyAdmin, atraves do Xampp) */
$PDO = conecta_bd();
$sql = "INSERT INTO
livros (titulo_livro, cod_isbn, autor_livro, nome_editora, qtd_paginas)
VALUES(
:titulo_livro, :cod_isbn, :autor_livro, :nome_editora, :qtd_paginas)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':titulo_livro', $titulo_livro);
$stmt->bindParam(':cod_isbn', $cod_isbn);
$stmt->bindParam(':autor_livro', $autor_livro);
$stmt->bindParam(':nome_editora', $nome_editora);
$stmt->bindParam(':qtd_paginas', $qtd_paginas);
if ($stmt->execute()){
    header('Location: form_inclui.php');
}else{
    echo "Ocorreu um erro na inclusão do registro";
    print_r($stmt->errorInfo());
}
?>