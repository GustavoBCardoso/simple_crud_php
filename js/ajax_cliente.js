var table;
$(document).ready(function () {
    listaClientes();
    
});

function listaClientes(){
    search = document.getElementById('search').value;
    table = $.ajax({
        url: 'libs/dynamics_cliente.php',
        data: { 'modulo': 'listar', 'search': search },
        type: 'POST',
        success: function(output){
            dados = JSON.parse(output);
            var row = "";
            $.each(dados, function (index, value) {
                id = value['codigo'];
                bts = "<button type='button' class='btn btn-sm btn-primary' id='bt_editar' onclick='clienteModalEditar("+id+");'>Editar</button> <button type='button' class='btn btn-sm btn-danger' id='bt_excluir' onclick='clienteExcluir("+id+");'>Excluir</button>";
                row += `<tr> 
                    <td>`+value['nome']+`</td>
                    <td>`+value['cpf_cnpj']+`</td>
                    <td>`+value['telefone']+`</td>
                    <td>`+value['cidade']+`</td>
                    <td>`+value['uf']+`</td>
                    <td>`+bts+`</td>
                <tr>`;
            });
            $("#rows_clientes").html(row);
        }
    });
}

function clienteCadastrar() {
    nome = document.getElementById('nome_cliente').value;
    tipopessoa = document.getElementById('tipopessoa').value;
    cpf_cnpj = document.getElementById('cpf_cnpj').value;
    telefone = document.getElementById('telefone').value;
    endereco = document.getElementById('endereco').value;
    bairro = document.getElementById('bairro').value;
    cidade = document.getElementById('cidade').value;
    uf = document.getElementById('uf').value;

    $.ajax({
        url: 'libs/dynamics_cliente.php',
        data: {'modulo': 'cadastrar', 'nome': nome, 'tipopessoa': tipopessoa, 'cpf_cnpj': cpf_cnpj, 'telefone': telefone, 'endereco': endereco, 'bairro':bairro, 'cidade': cidade, 'uf': uf },
        type: 'POST',
        success: function(){
            listaClientes();
            $("#cadastroModal").modal("hide");
        }
    });
}

function clienteModalEditar(id){
    $.ajax({
        url: 'libs/dynamics_cliente.php',
        data: {'modulo': 'e_buscar', 'id': id},
        type: 'POST',
        success: function(output){
            dados = JSON.parse(output);
            document.getElementById('e_id').value = dados['e_id'];
            document.getElementById('e_nome').value = dados['e_nome'];
            document.getElementById('e_tipopessoa').value = dados['e_tipopessoa'];
            document.getElementById('e_cpf_cnpj').value = dados['e_cpf_cnpj'];
            document.getElementById('e_telefone').value = dados['e_telefone'];
            document.getElementById('e_endereco').value = dados['e_endereco'];
            document.getElementById('e_bairro').value = dados['e_bairro'];
            document.getElementById('e_cidade').value = dados['e_cidade'];
            document.getElementById('e_uf').value = dados['e_uf'];
            $("#editaModal").modal();
        }
    })
}

function clienteEditar(){
    id = document.getElementById('e_id').value;
    nome = document.getElementById('e_nome').value;
    tipopessoa = document.getElementById('e_tipopessoa').value;
    cpf_cnpj = document.getElementById('e_cpf_cnpj').value;
    telefone = document.getElementById('e_telefone').value;
    endereco = document.getElementById('e_endereco').value;
    bairro = document.getElementById('e_bairro').value;
    cidade = document.getElementById('e_cidade').value;
    uf = document.getElementById('e_uf').value;
    $.ajax({
        url: 'libs/dynamics_cliente.php',
        data: {'modulo': 'editar', 'id':id, 'nome': nome, 'tipopessoa': tipopessoa, 'cpf_cnpj': cpf_cnpj, 'telefone': telefone, 'endereco': endereco, 'bairro':bairro, 'cidade': cidade, 'uf': uf },
        type: 'POST',
        success: function(){
            listaClientes();
            $("#editaModal").modal("hide");
        }
    })
}

function clienteExcluir(id){
    $.ajax({
        url: 'libs/dynamics_cliente.php',
        data: {'modulo': 'excluir', 'id':id },
        type: 'POST',
        success: function(){
            listaClientes();
        }
    })
}


