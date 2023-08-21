<style>

    .headTable {
        font-size: 30px;
        font-style: italic;
    }

    table {
        width: 90%;
        border-collapse: collapse;
        border-color: black;
    }

    td {
        border-color: black;
    }

    th {
        text-align: center;
        height: 30;
        font-size: 14px; /* Tamanho de fonte menor */
        font-weight: normal; /* Remover negrito, se aplicável */
        padding: 8px; /* Ajustar o preenchimento conforme necessário */
        background-color: #f2f2f2;
        border-color: black;
    }

    .image-preview {
    width: 50px; /* Defina o tamanho desejado */
    height: 50px; /* Defina o tamanho desejado */
    background-size: cover;
    display: inline-block; /* Para garantir que o tamanho seja aplicado corretamente */
}

    .custom-file-input {
        display: flex;
        align-items: center;
    }

    .custom-file-input input[type="file"] {
        margin-right: 10px; /* Ajuste o valor conforme necessário */
    }
/* Estilo para o formulário */
.formulario {
    font-size: 14px; /* Ajuste o tamanho da fonte conforme necessário */
    max-width: 1200px; /* Ajuste a largura máxima do formulário conforme necessário */
    margin: 0 auto; /* Centralize o formulário na página */
    margin-bottom: 10px; /* Adicione uma margem na parte inferior do container */
    border: 1px solid;
    border-radius: 30px;
    margin-top: -60px;
    width: auto;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4); 
}

#formularioAtualizacao {
    margin-top: -60px;

}
  
/* Estilo para a container de colunas */
.column-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-bottom: 5px;
  padding: 5px; /* Adicione um espaçamento interno ao formulário */ 
}

/* Estilo para campos de patrimônio */
.patrimonio-field {
    display: inline-flex;
    align-items: center;
    flex-direction: row;
    margin-bottom: 10px;
}

/* Estilo para o label dentro do campo de patrimônio */
.patrimonio-field label {
    margin-bottom: 10px;
}

/* Estilo para cada coluna */
.column {
  flex-basis: calc(50% - 1px); /* Ajuste o espaço entre as colunas conforme necessário */
}


/* Estilo para o botão */
.addItem {
  margin-top: 20px; /* Ajuste o espaçamento entre o botão e os campos */
  margin: 0 auto; /* Centralize o botão horizontalmente */
}

/* Estilo para o botão de verificar */
#verificarPatrimonio , #verificarPatrimonioME {
    margin-left: 385px; /* Ajuste a margem à esquerda do botão conforme necessário */
    position: relative;
    top: -42px;
    margin-bottom: -100px; /* Ajuste a margem negativa para remover o espaço abaixo do botão */
}

    .id-field {
        width: 0;
        margin: 0;
        padding: 0;
    }

    #historicoContainer {
    transform: scale(0.97);
        transform-origin: top;
    }
    #listaPatrimonio {
        transform: scale(0.90);
    }


    .historico-tabela {
        width: 100%;
        border-collapse: collapse;
        border-color: black;
    }

    .historico-tabela td {
        border-color: black;
    }

    .historico-tabela th {
        text-align: center;
        height: 30px;
        font-size: 14px;
        font-weight: normal;
        padding: 8px;
        background-color: #f2f2f2;
        border-color: black;
    }

    .listaServidores {
        width: 100%;
        border-collapse: collapse;
        border-color: black;
    }

    .listaServidores td {
        border-color: black;
    }

    .listaServidores th {
        text-align: center;
        height: 30px;
        font-size: 14px;
        font-weight: normal;
        padding: 8px;
        background-color: #f2f2f2;
        border-color: black;
    }

    .data-cell {
        border-right: 1px solid #ddd;
    }

    .headTable {
        font-size: 30px;
        font-style: italic;
    }

    .icon-link + .icon-link {
        margin-left: 8px; /* Ajuste o valor de margem conforme necessário */
        text-align: left;
    }
    .icon-link {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .line {
        text-align: left;
    }


#editarPatrimonio {
  display: none;
  margin: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f5f5f5;
}

#tituloEditar {
    margin-top: 0, 10px;
    margin-bottom: 5px;
    text-align: center;
}


.field2 {
  flex-basis: calc(33.33% - 10px); /* Defina a largura desejada para cada campo */
  margin-bottom: 10px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  
  margin-bottom: 10px;
}

.text-center {
  text-align: center;
}

.field2 {
  width: calc(33.33% - 5px);
  margin: 3px 3px;
}

.field2 label {
  padding-left: 15px;
  font-size: 1.1em;
  display: block;
  width: 100%;
}

.field2 select {
  padding-left: 15px;
  font-size: 1.1em;
  display: block;
  width: 80%;
  border-radius: 15px;
  border: 1px solid #ccc;
}
.input-field2 {
        margin-right: 5px;
    }

    #zoomContainer {
    transform: scale(0.98);
    transform-origin: top;
    }

    #linhaSelecionadaContainer {
    transform: scale(0.98);
    transform-origin: top;
    margin-top: 10px;
    position: sticky;
    background-color: #fff;
    border-color: black;
    border: 1px solid #ccc;
    }

    /* Diminui o tamanho do formulário */
    .formularioConsulta {
        max-width: 50%; /* Ajuste o valor conforme necessário */
        margin: 0 auto;
    }

    /* Diminui o tamanho da tabela */
    #tabelaPatrimonio {
        max-width: 97%; /* Ajuste o valor conforme necessário */
        margin: 20px auto;
    }
    

    .pagination {
        display: flex;
        align-items: center;
        justify-content: center;
        
    }

    .page-prev-btn,
    .page-next-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        margin: 0 10px;
        background-color: transparent;
        border: none;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .page-number {
        margin: 0 5px;
    }

    .page-prev-btn:hover,
    .page-next-btn:hover {
        transform: scale(1.1);
    }
    
    .formularioLogin {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 350px;
        margin: 40px auto 0;
        padding: 20px;
        border: 1px solid ;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .tituloLogin {
        text-align: center;
        margin-bottom: 20px;
    }

    .login {
        margin-bottom: 15px;
        margin-top: 0px;
    }

    .login label {
        display: block;
        margin-bottom: 2px;
    }

    .login input[type="email"],
    .login input[type="password"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        margin-top: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transform: scale(1.1);
        color: #fff;
    }
    
    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    .botoes {
        margin-top: 10px;
    }

    .hidden {
        display: none;
    }

    .input-container {
        
        position: relative;
    }

    .input-label {
        float: left;
        margin-right: 5px;
    }

    .input-field {
        margin-right: 5px;
    }
    
    .remove-button {
        position: absolute;
        top: 65%;
        right: 50px; /* Ajuste a posição horizontal do botão */
        transform: translateY(-50%);
        color: red;
        font-weight: bold;
        font-size: 18px;
        cursor: pointer;
        border-radius: 90%;
        padding: 2px;
        border: 1px solid #ccc;
    }
    
    
    .remove-button span {
        margin-top: 20px; /* Adiciona margem superior de 4 pixels para o texto */
    }

    .formularioCadastro {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 700px;
        margin: 30px auto 0;
        padding: 30px;
        border: 1px solid ;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .formularioCadastro input[name="sobreNomeCadastro"],
    .formularioCadastro input[name="nomeCadastro"],
    .formularioCadastro input[name="emailCadastro"],
    .formularioCadastro input[name="senhaCadastro"],
    .formularioCadastro input[name="confirmarSenha"] {
        width: 100%;
        padding: 25px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
        height: 30px;
        line-height: 20px;
        border-radius: 15px;
        outline: none;    
        padding-left: 15px 15px;
        height: 25px;  
    }

    .formularioConsulta {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 500px;
        margin: 0px auto 0;
        padding: 0px;
        border: 1px solid ;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .tituloCadastro {
        text-align: center;
        margin-bottom: 0px;
    }


    .tituloPainel {
            text-align: center;
            margin: 20px 0;
        }

        .botoesContainer {
            display: flex;
            justify-content: center;
            margin: 30px auto;
            width: 80%;
        }

        .coluna {
            width: 50%;
            padding: 0 20px;
        }

        .botoesPainel {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            border-radius: 30px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
        }

        .botaoPainel {
            display: block;
            width: 80%;
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            background-color: #337ab7;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .botaoPainel:hover {
            transform: scale(1.05);
        color: #fff;
    }

    .titulo {
        margin-top: 5px;
        text-align: center;
    }
    .lista {
        border-radius: 50px;
        border-color: black;
    }
    
    .listaServidores {
        margin-bottom: 20px;
    }

    .botaoPatrimonio:hover {
        transform: scale(1.1);
        color: #fff;
    }

    .botaoServidor:hover {
        transform: scale(1.1);
        color: #fff;
    }

    .botaoConsultar:hover {
        transform: scale(1.1);
        color: #fff;
    }
    
      
    .field{
        width: 80%;
        margin: 15px 15px;
    }
    .field label {
        padding-left: 15px 15px;
        font-size: 1.1em;
        display: block;
        width: 100%;
    }
    .field select {
        padding-left: 15px 15px;
        font-size: 1.1em;
        display: block;
        width: 80%;
        border-radius: 15px;
        border: 1px solid #ccc;

    }

    
       
    input[type=text],
    input[type=email],
    textarea{
        width: 80%;
        padding-left: 15px 15px;
        height: 45px;
        line-height: 50px;
        border-radius: 15px;
        border: 1px solid #ccc;
        outline: none;    
    }    
    input[type=number],
    textarea{
        width: 80%;
        padding-left: 10px;
        height: 45px;
        line-height: 30px;
        border-radius: 15px;
        border: 1px solid #ccc;
        outline: none;    
    }
    input[type=submit],
    textarea{
        text-align: center;
    }

    .custom-file-input {
        display: inline-block;
        position: relative;
        cursor: pointer;
        
    
        border: 1px solid #ccc;
        padding: 5px 10px;
        border-radius: 5px;
        overflow: hidden;
        font-size: 14px;
        line-height: 1.5;
        background-color: #f9f9f9;
        color: #333;
        transition: background-color 0.3s, border-color 0.3s;
    }

.custom-file-input input[type="file"] {
    
   
position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    cursor: pointer;
}

.custom-file-input label {
    
   
display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding: 0 5px;
    text-align: center;
}

.custom-file-input:hover {
    background-color: #e5e5e5;
    border-color: #999;
}

.custom-file-input {
    /* ... estilos anteriores ... */
    position: relative;
}


#file-count {
    font-size: 12px;
    color: #888;
    margin-left: 10px;
}
#observacao, #descricao {
    width: 100%; /* Defina a largura para 100% */
    max-width: 100%; /* Remova a propriedade max-width */
    line-height: normal; /* Remova a propriedade line-height */
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 1px 1px 1px #999;
    resize: vertical; /* Adicione essa propriedade para permitir redimensionamento vertical */
}
    label, textarea { /*caixa de mensagem*/
        display: block;
    }

    /* Estilo para a container de colunas */
.textos {
  display: flex;
  justify-content: space-between;
  margin-bottom: 5px;
}

/* Estilo para cada textarea */
.textarea-container {
  flex-basis: calc(50% - 10px); /* Ajuste o espaço entre as colunas conforme necessário */
}

/* Estilo para o contador de caracteres */
#count {
  margin-top: 5px;
}

    textarea {
        margin: 1px 1px;
        width: 118%;
        height: 100px
    }
</style>