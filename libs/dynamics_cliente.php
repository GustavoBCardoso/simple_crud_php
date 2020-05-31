<?php
require_once '../class/Cliente.php';
$cliente = new Cliente();

$modulo = $_POST['modulo'];

if($modulo == "cadastrar"){
    $nome = $_POST['nome'];
    $tipopessoa = $_POST['tipopessoa'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    $cliente->setNome($nome);
	$cliente->setTipoPessoa($tipopessoa);
	$cliente->setCpfCnpj($cpf_cnpj);
	$cliente->setTelefone($telefone);
	$cliente->setEndereco($endereco);
	$cliente->setBairro($bairro);
	$cliente->setCidade($cidade);
    $cliente->setUf($uf);
    
    $cliente->insert();
}

if($modulo == "editar"){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tipopessoa = $_POST['tipopessoa'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    $cliente->setNome($nome);
	$cliente->setTipoPessoa($tipopessoa);
	$cliente->setCpfCnpj($cpf_cnpj);
	$cliente->setTelefone($telefone);
	$cliente->setEndereco($endereco);
	$cliente->setBairro($bairro);
	$cliente->setCidade($cidade);
    $cliente->setUf($uf);
    
    $cliente->update($id);
}

if($modulo == "e_buscar"){
    $id = $_POST['id'];
    $dados = $cliente->find($id);

    $dados_cliente['e_id'] = $dados->codigo;
    $dados_cliente['e_nome'] = $dados->nome;
	$dados_cliente['e_tipopessoa'] = $dados->tipopessoa;
    $dados_cliente['e_cpf_cnpj'] = $dados->cpf_cnpj;
    $dados_cliente['e_telefone'] = $dados->telefone;
    $dados_cliente['e_endereco'] = $dados->endereco;
    $dados_cliente['e_bairro'] = $dados->bairro;
    $dados_cliente['e_cidade'] = $dados->cidade;
    $dados_cliente['e_uf'] = $dados->uf;

    echo json_encode($dados_cliente);
}

if($modulo == "excluir"){
    $id = $_POST['id'];
    $cliente->delete($id);
}

if($modulo == "listar"){
    $search = $_POST['search'];
    $result = $cliente->getSearch($search);
    echo json_encode($result);
}