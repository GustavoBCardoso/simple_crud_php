<?php

require_once 'Crud.php';

class Cliente extends Crud{
	
	protected $table = 'cliente';
	private $nome;
	private $tipopessoa;
    private $cpf_cnpj;
    private $telefone;
    private $endereco;
    private $bairro;  
    private $cidade;  
    private $uf; 

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setTipoPessoa($tipopessoa){
		$this->tipopessoa = $tipopessoa;
	}

	public function getTipoPessoa(){
		return $this->tipopessoa;
	}

	public function setCpfCnpj($cpf_cnpj){
		$this->cpf_cnpj = $cpf_cnpj;
	}

	public function getCpfCnpj(){
		return $this->cpf_cnpj;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setUf($uf){
		$this->uf = $uf;
	}

	public function getUf(){
		return $this->uf;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, tipopessoa, cpf_cnpj, telefone, endereco, bairro, cidade, uf) VALUES (:nome, :tipopessoa, :cpf_cnpj, :telefone, :endereco, :bairro, :cidade, :uf)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':tipopessoa', $this->tipopessoa);
		$stmt->bindParam(':cpf_cnpj', $this->cpf_cnpj);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':endereco', $this->endereco);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':uf', $this->uf);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, tipopessoa = :tipopessoa, cpf_cnpj = :cpf_cnpj, telefone = :telefone, endereco = :endereco, bairro = :bairro, cidade = :cidade, uf = :uf WHERE codigo = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':tipopessoa', $this->tipopessoa);
		$stmt->bindParam(':cpf_cnpj', $this->cpf_cnpj);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':endereco', $this->endereco);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':uf', $this->uf);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

	public function getSearch($search){

		//$sql  = "SELECT * FROM $this->table WHERE (LOWER(nome) LIKE LOWER(%':search'%)) OR (LOWER(tipopessoa) LIKE LOWER(%:search%)) OR (LOWER(cpf_cnpj) LIKE LOWER(%:search%)) OR (LOWER(telefone) LIKE LOWER(%:search%)) OR (LOWER(endereco) LIKE LOWER(%:search%)) OR (LOWER(bairro) LIKE LOWER(%:search%)) OR (LOWER(cidade) LIKE LOWER(%:search%)) OR (LOWER(uf) LIKE LOWER(%:search%))";
		$sql  = "SELECT * FROM $this->table WHERE (LOWER(nome) LIKE LOWER('%$search%')) OR (LOWER(tipopessoa) LIKE LOWER('%$search%')) OR (LOWER(cpf_cnpj) LIKE LOWER('%$search%')) OR (LOWER(telefone) LIKE LOWER('%$search%')) OR (LOWER(endereco) LIKE LOWER('%$search%')) OR (LOWER(bairro) LIKE LOWER('%$search%')) OR (LOWER(cidade) LIKE LOWER('%$search%')) OR (LOWER(uf) LIKE LOWER('%$search%'))";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':search', $search);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}