<script>
        document.addEventListener('DOMContentLoaded', function() {
        // Adicionar evento de clique no botão Enviar
        document.getElementById('esqueciSenhaForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Impede que o formulário seja enviado de forma tradicional
            enviarEmail(); // Função para enviar o e-mail usando AJAX
        });
    });

    function enviarEmail() {
        // Obter os dados do formulário
        var formData = new FormData(document.getElementById('esqueciSenhaForm'));

        // Criar uma requisição AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo esc_url(admin_url('admin-ajax.php')); ?>');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Definir a função que será chamada quando a requisição estiver completa
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                alert(response.message); // Exibe a mensagem de resposta do servidor
            }
        };

        // Enviar a requisição AJAX com os dados do formulário
        xhr.send(new URLSearchParams(formData));
    }
</script>

<script> //Página Cadastro

            //Função para validar a senha
            function validarSenha() {
                var senha = document.getElementById("senhaCadastro").value;
                var confirmarSenha = document.getElementById("confirmarSenha").value;
                var mensagemErro = document.getElementById("mensagemErro");

                if (senha !== confirmarSenha) {
                    mensagemErro.innerHTML = "As senhas não coincidem.";
                    return false;
                } else {
                    mensagemErro.innerHTML = "";
                    return true;
                }
            }

            //confirmar se o e-mail é o institucional (@mec.gov.br)
            function validarFormulario() {
                var emailInput = document.getElementById("emailCadastro");
                var emailValue = emailInput.value.trim();
                var errorMessage = document.getElementById("mensagemErro");

                if (!emailValue.endsWith("@mec.gov.br")) {
                    errorMessage.innerText = "Para realizar o cadastro, é necessário o e-mail institucional válido (@mec.gov.br).";
                    errorMessage.style.display = "block";
                    return false; // Impede o envio do formulário
                }

                errorMessage.style.display = "none";
                return true; // Permite o envio do formulário
            }
</script>


<script> //Pagina addPatrimônio    

                //Select Patrimônio MEC
                const pergunta = [
                    {temPatrimonio: "Não"},{temPatrimonio: "Sim"},
                ];
                pergunta.forEach((lista) => {
                    let o = document.createElement("option");
                    o.text = lista.temPatrimonio;
                    o.value = lista.temPatrimonio;
                    temPatrimonio.appendChild(o);
                });
                

                //Input Patrimônio Mec
                $(document).ready(function() {
                    $('#patrimonioMec').hide();
                    $('label[for="patrimonioMEC"]').hide();
                    $('#verificarPatrimonio').hide();
                    });
                    
                    //Função para Renderizar input patrimonio Mec a partir do Select Tem patrimonio Mec
                    $('#temPatrimonio').change(function() {
                    if ($('#temPatrimonio').val() === 'Sim') {
                            $('#patrimonioMec').show();
                            $('label[for="patrimonioMEC"]').show();
                            $('#verificarPatrimonio').show();
                    } else {
                        $('#patrimonioMec').hide();
                        $('label[for="patrimonioMEC"]').hide();
                        $('#verificarPatrimonio').hide();
                    }
                });
                
                //Confirmação de Patrimônio MEC
                    $('#verificarPatrimonio').click(function(event) {
                        event.preventDefault();

                        const patrimonio = $('#patrimonioMec').val();

                        if (patrimonio === '') {
                            alert('Digite um número de Patrimônio MEC.');
                        } else {
                            verificarPatrimonio(patrimonio);
                        }
                    });

                // Função para verificar se o patrimônio já está cadastrado
                function verificarPatrimonioExistente(patrimonio, callback) {
                    // Requisição Ajax para chamar o endpoint de verificação de patrimônio
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        method: 'GET',
                        data: {
                            action: 'verificar_patrimonio',
                            patrimonio: patrimonio
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            callback(data.exists);
                        },
                        error: function() {
                            alert('Ocorreu um erro na verificação do patrimônio.');
                        }
                    });
                }

                // Função para exibir o ícone de carregamento
                function exibirCarregamento() {
                    var botao = $('#verificarPatrimonio');
                    botao.attr('disabled', true);
                    botao.html('<i class="fa fa-spinner fa-spin"></i> Verificando...');
                }

                // Função para remover o ícone de carregamento
                function removerCarregamento() {
                    var botao = $('#verificarPatrimonio');
                    botao.attr('disabled', false);
                    botao.html('Verificar');
                }


                // Função para verificar a existência do patrimônio e exibir a mensagem de confirmação
                function verificarPatrimonio(patrimonio) {
                exibirCarregamento();

                verificarPatrimonioExistente(patrimonio, function(existe) {
                    removerCarregamento();

                    if (existe) {
                    alert('Patrimônio já cadastrado.');
                    } else {
                    exibirMensagemConfirmacao(patrimonio)
                        .then((confirmacao) => {
                        if (confirmacao) {
                            confirmarPatrimonio(patrimonio);
                        } else {
                            patrimonioInput.value = '';
                            patrimonioInput.focus();
                        }
                        });
                    }
                });
                }

                // Função para exibir a mensagem de confirmação
                function exibirMensagemConfirmacao(patrimonio) {
                return new Promise((resolve) => {
                    const confirmacao = confirm(`Patrimônio MEC ${patrimonio} não consta no sistema, deseja cadastrá-lo?`);
                    resolve(confirmacao);
                });
                }

                // Confirmação do Patrimônio Mec caso seja diferente (!=) de vazio
                const temPatrimonioSelect = document.getElementById('temPatrimonio');
                const patrimonioField = document.getElementById('patrimonioField');
                const patrimonioInput = document.getElementById('patrimonioMec');
                const inserirButton = document.getElementById('verificarPatrimonio');

                function confirmarPatrimonio(patrimonio) {
                const confirmacao = confirm(`Você confirma o número de Patrimônio MEC ${patrimonio}?`);

                if (confirmacao) {
                    // Continuar o formulário
                } else {
                    exibirMensagemConfirmacao(patrimonio)
                    .then((confirmacao) => {
                        if (confirmacao) {
                        confirmarPatrimonio(patrimonio);
                        } else {
                        patrimonioInput.value = '';
                        patrimonioInput.focus();
                        }
                    });
                }
                }

                // Verificar se o Input "Patrimônio MEC" está vazio na hora da adição de patrimônio no botão "Adicionar" caso o select "temPatrimonio" seja marcado como "Sim"
                $('#addPatrimonio').click(function(event) {
                    const temPatrimonio = $('#temPatrimonio').val();
                    const patrimonio = $('#patrimonioMec');

                    if (temPatrimonio === 'Sim' && patrimonio.val() === '') {
                        event.preventDefault();
                        alert('Clique no botão "Verificar" ao lado do Campo "Patrimônio MEC" para Verificar o patrimônio.');
                    } else if (temPatrimonio === 'Não') {
                        patrimonio.val(''); // Define o valor como vazio
                    }
                });

                //Select Patrimônio ME
                const pergunta2 = [
                    {temPatrimonioME: "Não"},{temPatrimonioME: "Sim"},
                ];
                pergunta2.forEach((lista) => {
                    let o = document.createElement("option");
                    o.text = lista.temPatrimonioME;
                    o.value = lista.temPatrimonioME;
                    temPatrimonioME.appendChild(o);
                });
                
                //input patrimônio ME
                $(document).ready(function() {
                    $('#patrimonioME').hide();
                    $('label[for="patrimonioME"]').hide();
                    $('#verificarPatrimonioME').hide();
                    
                    //Função para renderizar o input Patrimonio Me através do select Tem Patrimônio ME
                    $('#temPatrimonioME').change(function() {
                        if ($('#temPatrimonioME').val() === 'Sim') {
                                $('#patrimonioME').show();
                                $('label[for="patrimonioME"]').show();
                                $('#verificarPatrimonioME').show();
                        } else {
                            $('#patrimonioME').hide();
                            $('label[for="patrimonioME"]').hide();
                            $('#verificarPatrimonioME').hide();
                        }
                    });
                });
                
                function mostrarCampoPatrimonioME() {
                    var temPatrimonioMESelect = document.getElementById('temPatrimonioME');
                    var patrimonioMEField = document.getElementById('patrimonioMEField');
                    var patrimonioMEInput = document.getElementById('patrimonioME');
                    var verificarPatrimonioMEButton = document.getElementById('verificarPatrimonioME');

                    if (temPatrimonioMESelect.value === 'sim') {
                        patrimonioMEField.style.display = 'block';
                        patrimonioMEInput.required = true;
                        verificarPatrimonioMEButton.style.display = 'inline-block';
                    } else {
                        patrimonioMEField.style.display = 'none';
                        patrimonioMEInput.required = false;
                        verificarPatrimonioMEButton.style.display = 'none';
                    }
                }

                // Confirmação de Patrimônio ME
                $('#verificarPatrimonioME').click(function(event) {
                    event.preventDefault();

                    const patrimonioME = $('#patrimonioME').val();

                    if (patrimonioME === '') {
                        alert('Digite um número de patrimônio ME.');
                    } else {
                        verificarPatrimonioME(patrimonioME);
                    }
                });

                // Função para verificar se o patrimônio ME já está cadastrado
                function verificarPatrimonioMEExistente(patrimonioME, callback) {
                    // Requisição Ajax para chamar o endpoint de verificação de patrimônio ME
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        method: 'GET',
                        data: {
                            action: 'verificar_patrimonio_me',
                            patrimonioME: patrimonioME
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            callback(data.exists);
                        },
                        error: function() {
                            alert('Ocorreu um erro na verificação do patrimônio ME.');
                        }
                    });
                }

                // Função para exibir o ícone de carregamento
                function exibirCarregamentoME() {
                    var botao = $('#verificarPatrimonioME');
                    botao.attr('disabled', true);
                    botao.html('<i class="fa fa-spinner fa-spin"></i> Verificando...');
                }

                // Função para remover o ícone de carregamento
                function removerCarregamentoME() {
                    var botao = $('#verificarPatrimonioME');
                    botao.attr('disabled', false);
                    botao.html('Verificar');
                }

                // Função para verificar a existência do patrimônio ME e exibir a mensagem de confirmação
                function verificarPatrimonioME(patrimonioME) {
                    exibirCarregamentoME();

                    verificarPatrimonioMEExistente(patrimonioME, function(existe) {
                        removerCarregamentoME();

                        if (existe) {
                            alert('Patrimônio ME já cadastrado.');
                        } else {
                            exibirMensagemConfirmacaoME(patrimonioME)
                                .then((confirmacao) => {
                                    if (confirmacao) {
                                        confirmarPatrimonioME(patrimonioME);
                                    } else {
                                        patrimonioMEInput.value = '';
                                        patrimonioMEInput.focus();
                                    }
                                });
                        }
                    });
                }

                // Função para exibir a mensagem de confirmação
                function exibirMensagemConfirmacaoME(patrimonioME) {
                    return new Promise((resolve) => {
                        const confirmacao = confirm(`Patrimônio ME ${patrimonioME} não consta no sistema, deseja cadastrá-lo?`);
                        resolve(confirmacao);
                    });
                }

                // Função para confirmar o patrimônio ME
                function confirmarPatrimonioME(patrimonioME) {
                    const confirmacao = confirm(`Você confirma o número de patrimônio ME ${patrimonioME}?`);

                    if (confirmacao) {
                        // Continuar o formulário
                    } else {
                        exibirMensagemConfirmacaoME(patrimonioME)
                            .then((confirmacao) => {
                                if (confirmacao) {
                                    confirmarPatrimonioME(patrimonioME);
                                } else {
                                    patrimonioMEInput.value = '';
                                    patrimonioMEInput.focus();
                                }
                            });
                    }
                }
                
                // Verificar se o Input "Patrimônio ME" está vazio na hora da adição no botão "Adicionar" caso o select "temPatrimonioME" seja marcado como "Sim"
                $('#addPatrimonio').click(function(event) {
                    const temPatrimonioME = $('#temPatrimonioME').val();
                    const patrimonioME = $('#patrimonioME');

                    if (temPatrimonioME === 'Sim' && patrimonioME.val() === '') {
                        event.preventDefault();
                        alert('Clique no botão "Verificar" ao lado do Campo "Patrimônio ME" para digitar o patrimônio.');
                    } else if (temPatrimonioME === 'Não') {
                        patrimonioME.val(''); // Define o valor como vazio
                    }
                });
            
                //Select Categorias
                const categoria = document.getElementById('categoria');
                const tipo = document.getElementById('tipo');
                const modelo = document.getElementById('modelo');
                const result = document.getElementById('result');
                
                //Array Categorias
                const categorias = [

                    {categoria: "Eletro"},{categoria: "Móveis"},{categoria: "Telefonia"},{categoria: "Tecnologia"}
                ];

                //Array tipos
                const tipos = {

                    Eletro:["Ar-Condicionado","Cafeteira","Calculadora","Climatizador","Gravadora de DVD de Mesa","Liquidificador","Microondas","Plastificadora","Refrigerador","TV","Umidificador","Video Cassete"],

                    Móveis:["Armário","Cabideiro","Cadeira","Carrinho","Escada","Estante","Fragmentadora","Gaveteiro Volante","Guilhotina","Longarina","Mesa","Perfuradora","Plastificadora","Quadro","Rack","Sofá","Suporte","tela de Projeção"],

                    Tecnologia:["CPU","Driver Externo","Hd Externo","Home Theater","Leitor de Código de Barras","Monitor","Mouse","Notebook","Projetor","Scanner","Switch","Tablet","Teclado","Tela de Retroprojetor","Trenton Sistem","Video Wall"],

                    Telefonia:["Analogico","Celular","Digital","Voip",],
                };

                 //Array modelo
                 const modelos = {

                    'Ar-Condicionado' : ["18000 BTU","24000 BTU","36000 BTU","Ros 24 FC3LX"],

                    Armário: ["Alto","Baixo","Cofre","Copa"],

                    Cadeira: ["Espaldar alto, com braço, revestido em tecido, cor preta","Espaldar médio, com braço, revestido em tecido, cor preta","Espaldar baixo, com braço, revestido em tecido, cor azul","Espaldar baixo, sem braço, revestido em tecido, cor azul","Cadeira giratória com braço, cor marrom","Cadeira fixa"],

                    CPU: ["Intel Core i3 8GB","Intel Core i3 16GB","Intel Core i5 8GB","Intel Core i5 16GB","Intel Core i7 8GB","Intel Core i7 16GB"," Intel Core i7 8GB","Intel Core i7 16GB","WorkStation T710 Xeon 64GB","WorkStation Z820 Xeon 64 GB","AMD Ryzen 7 16 GB","AMD Ryzen 7 32 GB", "AMD Ryzen 9 16 GB","AMD Ryzen 9 32 GB"],

                    Longarina: ["De 2 lugares, cor preta, em tecido","De 3 lugares, cor preta, em tecido"],

                    Mesa: ["Auxiliar quadrado, branco gelo em MDF","Auxiliar Semi-Circular, branco gelo em MDF","Computador","De centro","Em L, branco gelo em MDF","Impressora","Para Telefone","Redonda","Retangular 3 gavetas","Retangular 6 gavetas","Retangular Oval","Reunião Retangular",],

                    Monitor: ["19'","19.5'","20'","23'","23.8'","24'","46'","55'"],

                    Notebook: ["AMD Ryzen 7","AMD Ryzen 9","Core i3","Core i5","Core i7","Core i9",],

                    Scanner: ["FI-7260"],

                    Quadro: ["Magnetico","Portiço","Obra de Arte","Quadro de chaves"],

                    Sofá: ["Sofá de espera, 1 lugar, preto, em courino","Sofá de espera, 2 lugar, preto, em courino","Sofá de espera, 3 lugar, preto, em courino","Poltrona de 1 lugar em tecido","Poltrona de 3 lugares em tecido","Sofá de espera de 2 lugares em tecido","Sofá de espera de 3 lugares em tecido"],

                    Refrigerador: ["Bebedouro","Geladeira Duplex Frost-Free","Máquina de gelo","Frigobar"],

                    TV: ["70","55","52","42","29","19"],
                    };
                
                // Função para renderizar os modelos selecionados
                function renderizarModelosSelecionados(modelosSelecionados) {
                const modeloSelect = $('#modelo');
                modeloSelect.empty();

                    if (modelosSelecionados && modelosSelecionados.length > 0) {
                        modelosSelecionados.forEach(function(modelo) {
                        const option = $('<option>', {
                            value: modelo,
                            text: modelo
                        });
                        modeloSelect.append(option);
                        });
                        modeloSelect.show();
                        $('label[for="modelo"]').show();
                    } else {
                        modeloSelect.hide();
                        $('label[for="modelo"]').hide();
                    }
                    }

                    $(document).ready(function() {
                    // Percorrer opções do array categorias e renderizar no select
                    categorias.forEach(function(opcoes) {
                        const option = $('<option>', {
                        value: opcoes.categoria,
                        text: opcoes.categoria
                        });
                        $('#categoria').append(option);
                    });

                    // Ocultar inicialmente os selects tipo e modelo
                    $('#tipo').hide();
                    $('label[for="tipo"]').hide();
                    $('#modelo').hide();
                    $('label[for="modelo"]').hide();

                    // Evento de mudança no select categoria
                    $('#categoria').change(function() {
                        if ($('#categoria').val() !== 'Selecione*') {
                        $('#tipo').show();
                        $('label[for="tipo"]').show();
                    } else {
                        $('#tipo').hide();
                        $('label[for="tipo"]').hide();
                        $('#modelo').hide();
                        $('label[for="modelo"]').hide();
                        }
                    });

                    // Evento de mudança no select tipo
                    $('#tipo').change(function() {
                        if ($('#tipo').val() !== '') {
                        const tipoSelecionado = $('#tipo').val();
                        const modelosSelecionados = modelos[tipoSelecionado];
                        renderizarModelosSelecionados(modelosSelecionados);
                    } else {
                        $('#modelo').hide();
                        $('label[for="modelo"]').hide();
                        }
                    });

                   // Função para invocar o select Tipo
                    categoria.onchange = function() {
                    tipo.innerHTML = ""; // Limpa o select sempre que houver uma mudança
                    modelo.innerHTML = ""; // Limpa o select sempre que houver uma mudança

                    const placeholderTipo = document.createElement("option");
                    placeholderTipo.text = "Selecione*";
                    placeholderTipo.value = "";
                    tipo.appendChild(placeholderTipo);

                    // Adicionar evento de mudança no select Tipo
                    tipo.addEventListener('change', function() {
                        if (this.value === "") {
                        this.selectedIndex = -1;  // Limpar a seleção
                        }
                    });

                    const categoriaSelecionada = event.target.value;

                    // Renderizar o Label do select tipo de acordo com a categoria escolhida
                    if (categoriaSelecionada !== '' && categoriaSelecionada !== 'Selecione*') {
                        $('#tipo').show();
                        $('label[for="tipo"]').show();


                        switch (categoriaSelecionada) {
                        case "Eletro":
                            $('label[for="tipo"]').text("Escolha o Eletro:").show();
                            break;
                        case "Móveis":
                            $('label[for="tipo"]').text("Escolha o Móvel:").show();
                            break;
                        case "Tecnologia":
                            $('label[for="tipo"]').text("Escolha o Aparelho:").show();
                            break;
                        case "Telefonia":
                            $('label[for="tipo"]').text("Escolha o Modelo:").show();
                            break;
                        default:
                            $('label[for="tipo"]').text("Tipo").show();
                            break;
                        }

                        const categoriaSelecionadas = tipos[categoriaSelecionada];

                        // Percorrer Opções do array tipos e renderizar no select tipo
                        categoriaSelecionadas.forEach((opcao) => {
                        let o = document.createElement("option");
                        o.text = opcao;
                        o.value = opcao;
                        tipo.appendChild(o);
                        });

                        // Verifica se o tipo selecionado é a primeira opção (placeholder)
                        if (tipo.selectedIndex === 0) {
                        $('#modelo').hide();
                        $('label[for="modelo"]').hide();
                    } else {
                        $('#modelo').show();
                        $('label[for="modelo"]').show();
                        }
                    } else {
                        $('#tipo').hide();
                        $('label[for="tipo"]').hide();
                        $('#modelo').hide();
                        $('label[for="modelo"]').hide();
                    }
                }
                    // Função para invocar o select modelo
                    $('#tipo').change(function() {
                        const modeloSelect = $('#modelo');
                        modeloSelect.empty();
                        const tipoSelecionado = $('#tipo').val();
                        const modelosSelecionados = modelos[tipoSelecionado];

                        const placeholderOption = $('<option>', {
                            text: 'Selecione*',
                            value: '',
                            selected: true,
                            disabled: true,
                            hidden: true
                        });
                        modeloSelect.append(placeholderOption);

                        if (tipoSelecionado !== '' && tipoSelecionado !== 'Selecione*') {
                        $('#tipo').show();
                        $('label[for="tipo"]').show();

                        if (modelosSelecionados && modelosSelecionados.length > 0) {
                            modelosSelecionados.forEach(function(opcao) {
                            const option = $('<option>', {
                                value: opcao,
                                text: opcao
                            });
                            modeloSelect.append(option);
                            });
                            modeloSelect.show();
                            $('label[for="modelo"]').show();
                        } else {
                            modeloSelect.hide();
                            $('label[for="modelo"]').hide();
                        }

                        $('#result').text(tipoSelecionado);
                        } else {
                            $('#tipo').hide();
                            $('label[for="tipo"]').hide();
                            modeloSelect.hide();
                            $('label[for="modelo"]').hide();
                        }

                        if (!modelosSelecionados || modelosSelecionados.length === 0) {
                            modeloSelect.hide();
                            $('label[for="modelo"]').hide();
                        }
                    });
                });
                //Select Marca
                
                //Select marcas
                const marcas =[
                    {marca: "AOC"},{marca: "Carrier"},{marca: "Christie"},{marca: "Consul"},{marca: "Daten"},{marca: "Dell"},{marca: "Eletrolux"},{marca: "Elgin"},{marca: "Epson"},{marca: "Ericson"},{marca: "Fujitsu"},{marca: "HP"},{marca: "Infoway"},{marca: "Intelbrás"},{marca: "Itautec"},{marca: "Komeco"},{marca: "Lenovo"},{marca: "LG"},{marca: "Logitech"},{marca: "Olivetti"},{marca: "Outro"},{marca: "Philco"},{marca: "Polycom"},{marca: "Phillips"},{marca: "Positivo"},{marca: "Samsung"},{marca: "Sanyo"},,{marca: "Sharp"},{marca: "Seagate"},{marca: "Sony"},{marca: "Yamaha"},
                ];

                marcas.forEach((lista) => {
                    let o = document.createElement("option");
                    o.text = lista.marca;
                    marca.appendChild(o);
                });
               
                //Select Estado Físico
                const estado = [
                    {estado: "Novo"},{estado: "Bom"},{estado: "Regular"},{estado: "Danificado"}
                ];
                estado.forEach((lista) => {
                    let o = document.createElement("option");
                    o.text = lista.estado;
                    estadoFisico.appendChild(o);
                });
                

                //Select Situação
                const situação = [
                    {situacao: "Alocado"},{situacao: "Removido"},
                ];
                situação.forEach((lista) => {
                    let o = document.createElement("option");
                    o.text = lista.situacao;
                    situacao.appendChild(o);
                });
                

                //Select Sala
                const salas = [
                    {sala: "100"},{sala: "100-A"},{sala: "100-B"},{sala: "100-C"},{sala:"101"},{sala:"101-A"},{sala:"101-B"},{sala:"108"},{sala:"109"},{sala:"114"},{sala:"114-A"},{sala:"115"},{sala:"117"},{sala:"117-A"},{sala:"118"},{sala:"118-A"},{sala:"123"},{sala:"123-A"},{sala:"123-B"},{sala:"124"},{sala:"124-A"},{sala:"127"},{sala:"130"},{sala:"130-A"},{sala:"130-B"},{sala:"133"},{sala:"133-A"},{sala:"139"},{sala:"139-A"},{sala:"139-B"},{sala:"149"},{sala:"149-A"},{sala:"Copa"},{sala:"Recepção"},{sala:"Corredor"},{sala:"Sala de Reunião"},{sala:"WC-M"},{sala:"WC-F"}
                ];
                salas.forEach((lista) => {
                    let o = document.createElement("option");
                    o.text = lista.sala;
                    sala.appendChild(o);
                });
                
                
                //Select Coordenação
                const coordenacoes = [
                    {coordenacao: "GAB/SPO"},{coordenacao: "COGA/GAB"},{coordenacao: "CGP/SPO"},{coordenacao: "CPRE/CGP"},{coordenacao: "CPMO/CGP"},{coordenacao: "CGSO/SPO"},{coordenacao: "CAEP/CGSO"},{coordenacao: "CTED/CGSO"},{coordenacao: "CGO/SPO"},{coordenacao: "CDOR/CGO"},{coordenacao: "CPRO/CGO"},{coordenacao: "CGF/SPO"},{coordenacao: "CCON/CGF"},{coordenacao: "CPAF/CGF"},
                ];
                coordenacoes.forEach((lista) => {
                    let o = document.createElement("option");
                    o.text = lista.coordenacao;
                    coordenacao.appendChild(o);
                });
                
                //Select Setor
                const setores = [
                    {setor: "SPO"},{setor: "STIC"},{setor: "CGRL"},
                ]; 
                setores.forEach((lista) => {
                    let o = document.createElement("option");
                    o.text = lista.setor;
                    setor.appendChild(o);
                });
                

                function preencherSiapeResponsavel() {
                    var selectNomeResponsavel = document.getElementById('nomeResponsavel');
                    var inputSiapeResponsavel = document.getElementById('siapeResponsavel');

                    var selectedOptionResponsavel = selectNomeResponsavel.options[selectNomeResponsavel.selectedIndex];

                    var siapeResponsavel = selectedOptionResponsavel.getAttribute('data-siape');

                    inputSiapeResponsavel.value = siapeResponsavel;

                    // Limpar o campo siapeResponsavel se nenhuma opção válida for selecionada
                    if (siapeResponsavel === "") {
                        inputSiapeResponsavel.value = "";
                    }
                }

                function preencherSiapeUsuario() {
                    var selectNomeUsuario = document.getElementById('nomeUsuario');
                    var inputSiapeUsuario = document.getElementById('siapeUsuario');

                    var selectedOptionUsuario = selectNomeUsuario.options[selectNomeUsuario.selectedIndex];

                    var siapeUsuario = selectedOptionUsuario.getAttribute('data-siape');

                    inputSiapeUsuario.value = siapeUsuario;

                    // Limpar o campo siapeUsuario se nenhuma opção válida for selecionada
                    if (siapeUsuario === "") {
                        inputSiapeUsuario.value = "";
                    }
                }

                // Contador de caracteres do campo observação
                function updateCount() {
                    var textarea = document.getElementById("observacao");
                    var count = document.getElementById("count");
                    var currentLength = textarea.value.length;
                    count.innerHTML = currentLength + " caracteres";
                }

                // Contador de caracteres do campo descrição
                function updateCount2() {
                    var textarea = document.getElementById("descricao");
                    var count2 = document.getElementById("count2");
                    var currentLength = textarea.value.length;
                    count2.innerHTML = currentLength + " caracteres";
                }

                $(document).ready(function() {
                    $('#anexo').on('change', function() {
                        var fileInput = $(this)[0];
                        var fileCount = fileInput.files.length;
                        var fileLabel = $('#anexo-label');
                        var fileCountSpan = $('#file-count');

                        if (fileCount === 1) {
                            fileCountSpan.text('1 arquivo selecionado');
                        } else {
                            fileCountSpan.text(fileCount + ' arquivos selecionados');
                        }
                    });
                });

                $("#addPatrimonio").on("click", function (event) {
                    event.preventDefault();
                    console.log("Botão 'Adicionar' clicado!");
                })

                document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('addItem').addEventListener('click', function () {
                // Get the form data
                const form = document.getElementById('adicionarPatrimonio');
                const formData = new FormData(form);

                // Create a new XMLHttpRequest object
                const xhr = new XMLHttpRequest();

                // Configure the AJAX request
                xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);

                // Set up the event handler to process the AJAX response
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle the successful response from the server (optional)
                        console.log('Patrimônio adicionado com sucesso');
                        window.location.href = window.location.href; // Refresh the page after successful insertion (optional)
                    } else {
                        // Handle any errors or failure in the response (optional)
                        console.log('Não foi possível efetuar a adição, verifique os dados e tente novamente');
                    }
                    }
                };

                // Send the AJAX request with the form data
                xhr.send(formData);
                });
            });

</script>                

