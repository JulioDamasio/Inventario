<script> //pagina Consultas

                const consultas = [
                    {consultaPor: "Patrimonio MEC"},{consultaPor: "Patrimonio ME"},{consultaPor: "Categoria"},{consultaPor: "Tipo"},{consultaPor: "Modelo"},{consultaPor: "Marcas"},{consultaPor: "Estado Físico"},{consultaPor: "Situação"},{consultaPor: "Sala"},{consultaPor: "Coordenação"},{consultaPor: "Setor"},{consultaPor: "Nome do Responsável"},{consultaPor: "Siape Responsável"},{consultaPor: "Nome do Usuário"},{consultaPor: "Siape Usuário"},{consultaPor: "Anexo"},{consultaPor: "Observação"},
                ];

                //array Categorias
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

                    CPU: ["Intel Core i3 8GB","Intel Core i3 16GB","Intel Core i5 8GB","Intel Core i5 16GB","Intel Core i7 8GB","Intel Core i7 16GB"," Tipo 01 Intel Core i7 8GB"," Tipo 02 Intel Core i7 16GB","WorkStation T710 Xeon 64GB","WorkStation Z820 Xeon 64 GB","AMD Ryzen 7 16 GB"],

                    Longarina: ["De 2 lugares, cor preta, em tecido","De 3 lugares, cor preta, em tecido"],

                    Mesa: ["Auxiliar quadrado, branco gelo em MDF","Auxiliar Semi-Circular, branco gelo em MDF","Computador","De centro","Em L, branco gelo em MDF","Impressora","Para Telefone","Redonda","Retangular 3 gavetas","Retangular 6 gavetas","Retangular Oval","Reunião Retangular",],

                    Monitor: ["19'","19.5'","20'","23'","23.8'","24'","46'","55'"],

                    Notebook: ["Core i3","Core i5","Core i7","Core i9"],

                    Scanner: ["FI-7260"],

                    Quadro: ["Magnetico","Portiço","Obra de Arte","Quadro de chaves"],

                    Sofá: ["Sofá de espera, 1 lugar, preto, em courino","Sofá de espera, 2 lugar, preto, em courino","Sofá de espera, 3 lugar, preto, em courino","Poltrona de 1 lugar em tecido","Poltrona de 3 lugares em tecido","Sofá de espera de 2 lugares em tecido","Sofá de espera de 3 lugares em tecido"],

                    Refrigerador: ["Bebedouro","Geladeira Duplex Frost-Free","Máquina de gelo","Frigobar"],

                    TV: ["70","55","52","42","29","19"],
                };
                 
                //Select marcas
                const marcas =[
                    {marca: "AOC"},{marca: "Carrier"},{marca: "Christie"},{marca: "Consul"},{marca: "Daten"},{marca: "Dell"},{marca: "Eletrolux"},{marca: "Elgin"},{marca: "Epson"},{marca: "Ericson"},{marca: "Fujitsu"},{marca: "HP"},{marca: "Infoway"},{marca: "Intelbrás"},{marca: "Itautec"},{marca: "Komeco"},{marca: "Lenovo"},{marca: "LG"},{marca: "Logitech"},{marca: "Olivetti"},{marca: "Outro"},{marca: "Philco"},{marca: "Polycom"},{marca: "Phillips"},{marca: "Positivo"},{marca: "Samsung"},{marca: "Sanyo"},,{marca: "Sharp"},{marca: "Seagate"},{marca: "Sony"},{marca: "Yamaha"},
                ];

                //Select Estado Físico
                const estado = [
                    {estado: "Novo"},{estado: "Bom"},{estado: "Regular"},{estado: "Danificado"}
                ];

                //Select Situação
                const situacao = [
                    {situacao: "Alocado"},{situacao: "Removido"},
                ];

                //Select Sala
                const salas = [
                    {sala: "100"},{sala: "100-A"},{sala: "100-B"},{sala: "100-C"},{sala:"101"},{sala:"101-A"},{sala:"101-B"},{sala:"108"},{sala:"109"},{sala:"114"},{sala:"114-A"},{sala:"115"},{sala:"117"},{sala:"117-A"},{sala:"118"},{sala:"118-A"},{sala:"123"},{sala:"123-A"},{sala:"123-B"},{sala:"124"},{sala:"124-A"},{sala:"127"},{sala:"130"},{sala:"130-A"},{sala:"130-B"},{sala:"133"},{sala:"133-A"},{sala:"139"},{sala:"139-A"},{sala:"139-B"},{sala:"149"},{sala:"149-A"},{sala:"Copa"},{sala:"Recepção"},{sala:"Corredor"},{sala:"Sala de Reunião"},{sala:"WC-M"},{sala:"WC-F"}
                ];

                //Select Coordenação
                const coordenacoes = [
                    {coordenacao: "GAB"},{coordenacao: "COGA"},{coordenacao: "CGP"},{coordenacao: "CGP/COAV"},{coordenacao: "CGP/CPMO"},{coordenacao: "CGSO"},{coordenacao: "CGSO/CDOR"},{coordenacao: "CGSO/CGAO"},{coordenacao: "CGO"},{coordenacao: "CGO/CPRO"},{coordenacao: "CGO/CEAO"},{coordenacao: "CGF"},{coordenacao: "CGF/CCON"},{coordenacao: "CGF/CPAF"},
                ];

                //Select Setor
                const setores = [
                    {setor: "SPO"},{setor: "STIC"},{setor: "CGRL"},
                ]; 

                function renderizarOpcoes(array, selectId, valueProp, labelProp) {
                var select = document.getElementById(selectId);

                // Limpar as opções existentes
                select.innerHTML = '';

                // Criar a opção "Selecione"
                var optionSelecione = document.createElement('option');
                optionSelecione.value = '';
                optionSelecione.textContent = 'Selecione*';
                select.appendChild(optionSelecione);

                // Adicionar as opções do array
                array.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item[valueProp];
                    option.textContent = labelProp ? item[labelProp] : item[valueProp];
                    select.appendChild(option);
                });
                }
                renderizarOpcoes(estado, 'estadoFisico', 'estado');
                renderizarOpcoes(situacao, 'situacao', 'situacao');
                renderizarOpcoes(salas, 'sala', 'sala');
                renderizarOpcoes(coordenacoes, 'coordenacao', 'coordenacao');
                renderizarOpcoes(setores, 'setor', 'setor');

                // Função para padronizar o nome, convertendo a primeira letra de cada palavra em letra maiúscula
                function padronizarNome(nome) {
                const words = nome.toLowerCase().split(' ');
                const nomePadronizado = words.map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
                return nomePadronizado;
                }

                $(document).ready(function() {
                    const consultaPorSelect = $("#consultaPor");
                    const inputContainer = $("#inputContainer");

                    consultas.forEach((consulta) => {
                        let option = $("<option>");
                        option.val(consulta.consultaPor);
                        option.text(consulta.consultaPor);
                        consultaPorSelect.append(option);
                    });

                    $('#consultaPor').on('change', function() {
                        const selectedOption = $(this).val();
                        renderizarInputs(selectedOption);
                    });

                    function renderizarInputs(selectedOption) {
                switch (selectedOption) {

                    case "Patrimonio MEC":
                        
                        const containerPatrimonioMec = $("<div>").addClass("input-container");
                        const labelMEC = $("<label>").text("Digite o patrimônio MEC:").addClass("input-label");
                        const inputMEC = $("<input>").attr({
                            type: "number",
                            placeholder: "Digite o Número:",
                            id: "inputMEC",
                            class: "inputMEC"
                        });

                        const removeButtonMEC = $("<span>").addClass("remove-button").text("-");
                        removeButtonMEC.on("click", function() {
                            labelMEC.remove();
                            inputMEC.remove();
                            removeButtonMEC.remove();
                        });

                        containerPatrimonioMec.append(inputMEC, removeButtonMEC);
                        $('#inputContainer').append(labelMEC, containerPatrimonioMec);
                    
                    break;

                    case "Patrimonio ME":
                        
                        const containerPatrimonioMe = $("<div>").addClass("input-container");
                        const labelME = $("<label>").text("Digite o patrimônio ME:").addClass("input-label");
                        const inputME = $("<input>").attr({
                            type: "number",
                            placeholder: "Digite o Número:",
                            id: "inputME",
                            class: "inputME"
                        });

                        const removeButtonME = $("<span>").addClass("remove-button").text("-");
                        removeButtonME.on("click", function() {
                            labelME.remove();
                            inputME.remove();
                            removeButtonME.remove();
                        });

                        containerPatrimonioMe.append(inputME, removeButtonME);
                        $('#inputContainer').append(labelME, containerPatrimonioMe);
                    break;

                    case "Categoria":
                    
                        if ($('#categoriaSelect').length === 0) {
                        const labelCategoria = $("<label>").text("Selecione a categoria:").addClass("input-label");
                        const selectCategoria = $("<select>").attr("id", "categoriaSelect").addClass("input-field");
                        const emptyOptionCategoria = $("<option>").val("").text("");
                        
                        selectCategoria.append(emptyOptionCategoria);
                        Object.keys(tipos).forEach((categoria) => {
                            const option = $("<option>").val(categoria).text(categoria);
                            selectCategoria.append(option);
                        });

                        const removeButtonCategoria = $("<span>").addClass("remove-button").text("-");
                        removeButtonCategoria.on("click", function() {
                            labelCategoria.remove();
                            selectCategoria.remove();
                            removeButtonCategoria.remove();
                        });

                        const containerCategoria = $("<div>").addClass("input-container");
                        containerCategoria.append(labelCategoria, selectCategoria, removeButtonCategoria);
                        $('#inputContainer').append(containerCategoria);
                    }
                    break;

                    case "Tipo":

                        if ($('#tipoSelect'). length === 0) {
                            const selectedCategoria = $('#categoriaSelect').val(); // Obtém a opção selecionada no select de categoria
                        
                            const labelTipo = $("<label>").text("Selecione o tipo:").addClass("input-label");
                            const selectTipo = $("<select>").attr("id", "tipoSelect").addClass("input-field");
                            const emptyOptionTipo = $("<option>").val("").text("");
                            selectTipo.append(emptyOptionTipo);

                            if (selectedCategoria) {
                                const tiposCategoria = tipos[selectedCategoria]; // Obtém os tipos da categoria selecionada
                                tiposCategoria.forEach((tipo) => {
                                    const option = $("<option>").val(tipo).text(tipo);
                                    selectTipo.append(option);
                                });
                            } else {
                                Object.keys(tipos).forEach((categoria) => {
                                    tipos[categoria].forEach((tipo) => {
                                        const option = $("<option>").val(tipo).text(tipo);
                                        selectTipo.append(option);
                                    });
                                });
                            }

                            const removeButtonTipo = $("<span>").addClass("remove-button").text("-");
                            removeButtonTipo.on("click", function() {
                                labelTipo.remove();
                                selectTipo.remove();
                                removeButtonTipo.remove();
                            });

                            const containerTipo = $("<div>").addClass("input-container");
                            containerTipo.append(labelTipo, selectTipo, removeButtonTipo);
                            $('#inputContainer').append(containerTipo);
                        }
                    break;

                    case "Modelo":

                    if ($('#modeloSelect').length === 0) {
                        const selectedTipo = $('#tipoSelect').val(); // Obtém a opção selecionada no select de tipo

                        const labelModelo = $("<label>").text("Selecione o modelo:").addClass("input-label");
                        const selectModelo = $("<select>").attr("id", "modeloSelect").addClass("input-field");
                        const emptyOptionModelo = $("<option>").val("").text("");
                        selectModelo.append(emptyOptionModelo);

                        if (selectedTipo) {
                            const modelosTipo = modelos[selectedTipo]; // Obtém os modelos do tipo selecionado
                            modelosTipo.forEach((modelo) => {
                                const option = $("<option>").val(modelo).text(modelo);
                                selectModelo.append(option);
                            });
                        } else {
                            Object.values(modelos).forEach((modelosTipo) => {
                                modelosTipo.forEach((modelo) => {
                                    const option = $("<option>").val(modelo).text(modelo);
                                    selectModelo.append(option);
                                });
                            });
                        }

                        const removeButtonModelo = $("<span>").addClass("remove-button").text("-");
                        removeButtonModelo.on("click", function() {
                            labelModelo.remove();
                            selectModelo.remove();
                            removeButtonModelo.remove();
                        });

                        const containerModelo = $("<div>").addClass("input-container");
                        containerModelo.append(labelModelo, selectModelo, removeButtonModelo);
                        $('#inputContainer').append(containerModelo);
                    }
                    break;


                    case "Marcas":

                        const labelMarca = $("<label>").text("Selecione a marca:");
                        const selectMarca = $("<select>").attr("id", "marcaSelect");
                        const emptyOptionMarca = $("<option>").val("").text("");

                        selectMarca.append(emptyOptionMarca);
                        marcas.forEach((marca) => {
                            const option = $("<option>").val(marca.marca).text(marca.marca);
                            selectMarca.append(option);
                        });

                        const removeButtonMarca = $("<span>").addClass("remove-button").text("-");
                        removeButtonMarca.on("click", function() {
                            labelMarca.remove();
                            selectMarca.remove();
                            removeButtonMarca.remove();
                        });

                        const containerMarca = $("<div>").addClass("input-container");
                        containerMarca.append(labelMarca, selectMarca, removeButtonMarca);
                        $('#inputContainer').append(containerMarca);

                    break;

                    case "Estado Físico":
                        const labelEstado = $("<label>").text("Selecione o estado físico:");
                        const selectEstado = $("<select>").attr("id", "estadoSelect");
                        const emptyOptionEstado = $("<option>").val("").text("");

                        selectEstado.append(emptyOptionEstado);
                        estado.forEach((opcao) => {
                            const option = $("<option>").val(opcao.estado).text(opcao.estado);
                            selectEstado.append(option);
                        });

                        const removeButtonEstado = $("<span>").addClass("remove-button").text("-");
                        removeButtonEstado.on("click", function () {
                            labelEstado.remove();
                            selectEstado.remove();
                            removeButtonEstado.remove();
                        });

                        const containerEstado = $("<div>").addClass("input-container");
                        containerEstado.append(labelEstado, selectEstado, removeButtonEstado);
                        $('#inputContainer').append(containerEstado);

                    break;

                    case "Situação":

                        const labelSituacao = $("<label>").text("Selecione a situação:");
                        const selectSituacao = $("<select>").attr("id", "situacaoSelect");
                        const emptyOptionSituacao = $("<option>").val("").text("");
                        selectSituacao.append(emptyOptionSituacao);

                        situacao.forEach((opcao) => {
                        const option = $("<option>").val(opcao.situacao).text(opcao.situacao);
                        selectSituacao.append(option);
                        });
                        
                        const removeButtonSituacao = $("<span>").addClass("remove-button").text("-");
                        removeButtonSituacao.on("click", function() {
                            labelSituacao.remove();
                            selectSituacao.remove();
                            removeButtonSituacao.remove();
                        });

                        const containerSituacao = $("<div>").addClass("input-container");
                        containerSituacao.append(labelSituacao, selectSituacao, removeButtonSituacao);
                        $('#inputContainer').append(containerSituacao);

                    break;

                    case "Sala":
                    
                        const labelSala = $("<label>").text("Selecione a sala:");
                        const selectSala = $("<select>").attr("id", "salaSelect");
                        const emptyOptionSala = $("<option>").val("").text("");
                        selectSala.append(emptyOptionSala);

                        salas.forEach((opcao) => {
                            const option = $("<option>")
                                .val(opcao.sala)
                                .text(opcao.sala);
                            selectSala.append(option);
                        });

                        const removeButtonSala = $("<span>").addClass("remove-button").text("-");
                        removeButtonSala.on("click", function() {
                            labelSala.remove();
                            selectSala.remove();
                            removeButtonSala.remove();
                        });

                        const containerSala = $("<div>").addClass("input-container");
                        containerSala.append(labelSala, selectSala, removeButtonSala);
                        $('#inputContainer').append(containerSala);

                    break;

                    case "Coordenação":

                        const labelCoordenacao = $("<label>").text("Selecione a coordenação:");
                        const selectCoordenacao = $("<select>").attr("id", "coordenacaoSelect");
                        const emptyOptionCoordenacao = $("<option>").val("").text("");
                        selectCoordenacao.append(emptyOptionCoordenacao);

                        coordenacoes.forEach((opcao) => {
                        const option = $("<option>")
                            .val(opcao.coordenacao)
                            .text(opcao.coordenacao);
                        selectCoordenacao.append(option);
                        });

                        const removeButtonCoordenacao = $("<span>").addClass("remove-button").text("-");
                        removeButtonCoordenacao.on("click", function() {
                            labelCoordenacao.remove();
                            selectCoordenacao.remove();
                            removeButtonCoordenacao.remove();
                        });

                        const containerCoordenacao = $("<div>").addClass("input-container");
                        containerCoordenacao.append(labelCoordenacao, selectCoordenacao, removeButtonCoordenacao);
                        $('#inputContainer').append(containerCoordenacao);

                    break;

                    case "Setor":

                        const labelSetor = $("<label>").text("Selecione o setor:");
                        const selectSetor = $("<select>").attr("id", "setorSelect");
                        const emptyOptionSetor = $("<option>").val("").text("");

                        selectSetor.append(emptyOptionSetor);
                        setores.forEach((opcao) => {
                        const option = $("<option>").val(opcao.setor).text(opcao.setor);
                        selectSetor.append(option);
                        });

                        const removeButtonSetor = $("<span>").addClass("remove-button").text("-");
                        removeButtonSetor.on("click", function() {
                            labelSetor.remove();
                            selectSetor.remove();
                            removeButtonSetor.remove();
                        });

                        const containerSetor = $("<div>").addClass("input-container");
                        containerSetor.append(labelSetor, selectSetor, removeButtonSetor);
                        $('#inputContainer').append(containerSetor);

                    break;

                    case "Nome do Responsável":

                        const containerNomeResponsavel = $("<div>").addClass("input-container");
                        const labelResponsavel = $("<label>").text("Digite o Nome do Responsável:").addClass("input-label");
                        const inputResponsavel = $("<input>").attr({
                            type: "text",
                            placeholder: "Digite o Nome do Responsável:",
                            id: "inputNomeResponsavel",
                            class: "inputNomeResponsavel"
                        });

                        const removeButtonNomeResponsavel = $("<span>").addClass("remove-button").text("-");
                        removeButtonNomeResponsavel.on("click", function() {
                            inputNomeResponsavel.remove();
                            labelResponsavel.remove();
                            removeButtonNomeResponsavel.remove();
                        });

                        containerNomeResponsavel.append(labelResponsavel, inputResponsavel, removeButtonNomeResponsavel);
                        $('#inputContainer').append(containerNomeResponsavel);

                        // Evento de mudança do campo de nome do responsável
                        inputContainer.on("input", "#inputNomeResponsavel", function() {
                        const nomeResponsavel = $(this).val();
                        const nomePadronizado = padronizarNome(nomeResponsavel);
                        $(this).val(nomePadronizado);
                        });
                        
                    break;

                    case "Siape Responsável":
                        
                        const containerSiapeResponsavel = $("<div>").addClass("input-container");
                        const labelSiapeResponsavel = $("<label>").text("Digite o Siape do Responsável:");
                        const inputSiapeResponsavel = $("<input>").attr({
                            type: "number",
                            id: "siapeResponsavel",
                            placeholder: "Digite o número do Siape",
                            class: "siapeResponsavel",
                        });

                        const removeButtonSiapeResponsavel = $("<span>").addClass("remove-button").text("-");
                        removeButtonSiapeResponsavel.on("click", function() {
                            labelSiapeResponsavel.remove();
                            inputSiapeResponsavel.remove();
                            removeButtonSiapeResponsavel.remove();
                        });

                        containerSiapeResponsavel.append(labelSiapeResponsavel, inputSiapeResponsavel, removeButtonSiapeResponsavel);
                        $('#inputContainer').append(containerSiapeResponsavel);
                    break;

                    case "Nome do Usuário":

                        const containerNomeUsuario = $("<div>").addClass("input-container");
                        const labelUsuario = $("<label>").text("Digite o nome do usuário:");
                        const inputUsuario = $("<input>").attr({
                            type: "text",
                            id: "inputUsuario",
                            placeholder: "Digite o nome do usuário",
                            class: "nomeUsuario",
                        });

                        const removeButtonNomeUsuario = $("<span>").addClass("remove-button").text("-");
                        removeButtonNomeUsuario.on("click", function() {
                            inputUsuario.remove();
                            labelUsuario.remove();
                            removeButtonNomeUsuario.remove();
                        });

                        containerNomeUsuario.append(labelUsuario, inputUsuario, removeButtonNomeUsuario);
                        $('#inputContainer').append(containerNomeUsuario);

                        // Evento de mudança do campo de nome do usuário
                        inputContainer.on("input", "#inputUsuario", function() {
                            const nomeUsuario = $(this).val();
                            const nomePadronizado = padronizarNome(nomeUsuario);
                            $(this).val(nomePadronizado);
                        });

                    break;

                    case "Siape Usuário":

                        const containerSiapeUsuario = $("<div>").addClass("input-container");
                        const labelSiapeUsuario = $("<label>").text("Digite o número do Siape do Usuário:");
                        const inputSiapeUsuario = $("<input>").attr({
                            type: "number",
                            id: "inputSiapeUsuario",
                            placeholder: "Digite o número do Siape",
                            class: "siapeUsuario",
                        });

                        const removeButtonSiapeUsuario = $("<span>").addClass("remove-button").text("-");
                        removeButtonSiapeUsuario.on("click", function() {
                            labelSiapeUsuario.remove();
                            inputSiapeUsuario.remove();
                            removeButtonSiapeUsuario.remove();
                        });


                        containerSiapeUsuario.append(labelSiapeUsuario, inputSiapeUsuario, removeButtonSiapeUsuario);
                        $('#inputContainer').append(containerSiapeUsuario);
                    break;

                    case "Anexo":
                        
                    break;

                    case "Observação":

                    break;

                    default:
                        $('#inputContainer').empty(); // Limpar o campo de input se nenhuma opção for selecionada
                    break;
                    }
                }
                    // Exibir os elementos relacionados à opção selecionada
                    $('#inputContainer').children().show();
            });

            $(document).ready(function() {
            // Oculta a tabela e o título da tabela no início
            $('#tabelaPatrimonio').addClass('hidden');
            $('.titulo.hidden').addClass('hidden');
            $('#mensagemNenhumObjeto').addClass('hidden');

            // Evento de alteração no select "consultaPor"
            $('#consultaPor').on('change', function(event) {
                event.preventDefault();
                var opcaoSelecionada = $(this).val();

                if (opcaoSelecionada === '') {
                    // Limpar todos os parâmetros de busca
                    $('input[type="text"]').val('');
                    $('select').prop('selectedIndex', 0);

                    // Chamar a função para filtrar a tabela novamente
                    filtrarTabela();

                    // Ocultar a tabela e esvaziar seu conteúdo
                    $('.listaPatrimonio').addClass('hidden');
                    $('#tabelaPatrimonio tbody').empty();

                    // Ocultar o cabeçalho da tabela e os botões de paginação
                    $('#tabelaPatrimonio').addClass('hidden');
                    $('.titulo.hidden').addClass('hidden');
                    $('.pagination').remove();

                    // Atualizar a página para limpar os parâmetros de pesquisa
                    window.location.reload();
                } else {
                    // Caso contrário, exibir a seção completa
                    $('.listaPatrimonio').removeClass('hidden');
                }
            });

            // Declarar a variável linhasEncontradas fora do escopo da função filtrarTabela()
            var linhasEncontradas = null;

            // Evento de clique no botão "Consultar"
            $('#consultarButton').on('click', function(event) {
                event.preventDefault(); // Previne o comportamento padrão do evento de clique

                // Oculta a tabela e o título
                $('#tabelaPatrimonio').addClass('hidden');
                $('.titulo.hidden').addClass('hidden');

                // Verifica se algum parâmetro de consulta foi selecionado
                var parametroSelecionado = $('#consultaPor').val();
                if (!parametroSelecionado) {
                    // Exibe a mensagem de aviso
                    Swal.fire({
                        title: 'Por favor, selecione um parâmetro de consulta através do seletor "Consulta Por"',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                    return; // Sai da função sem prosseguir com a filtragem
                }

                // Chama a função para realizar a filtragem
                filtrarTabela();

                // Verifica se existem linhas encontradas (desconsiderando o título e o cabeçalho)
                linhasEncontradas = $('#tabelaPatrimonio tbody tr').not('.titulo');
                linhasEncontradas = linhasEncontradas.filter(function() {
                    return $(this).css('display') !== 'none';
                });

                // Exibe a tabela filtrada ou mostra o alerta personalizado se nenhum resultado for encontrado
                if (linhasEncontradas.length > 0) {
                    adicionarPaginacao(linhasEncontradas.length);
                    $('#tabelaPatrimonio').removeClass('hidden');
                    $('.titulo.hidden').removeClass('hidden');
                } else {
                    // Alerta personalizado com o SweetAlert
                    Swal.fire({
                        title: 'Nenhum objeto encontrado',
                        text: 'Não foram encontrados objetos referentes a essa consulta.',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                }
            });

            function adicionarPaginacao(totalLinhas) {
                var rowsPerPage = 5;
                var totalPages = Math.ceil(totalLinhas / rowsPerPage);

                // Remover a paginação existente, se houver
                $('.pagination').remove();

                // Criar a estrutura HTML para a paginação
                var paginationHTML = '<div class="pagination">' +
                    '<button class="page-prev custom-button" disabled>&lt;</button>' +
                    '<span class="page-number"></span>' +
                    '<button class="page-next custom-button">&gt;</button>' +
                    '</div>';

                // Adicionar a paginação abaixo da tabela
                $('#tabelaPatrimonio').after(paginationHTML);

                // Função para exibir as linhas corretas com base na página atual
                function showPage(page) {
                    var start = (page - 1) * rowsPerPage;
                    var end = Math.min(start + rowsPerPage, totalLinhas);

                    // Ocultar todas as linhas
                    $("#tabelaPatrimonio tbody tr").hide();

                    // Exibir apenas as linhas que correspondem aos critérios de filtragem
                    linhasEncontradas.slice(start, end).show();

                    // Atualizar o contador de páginas
                    if (end - start === 1) {
                        $('.page-number').text(end + ' de ' + totalLinhas);
                    } else {
                        $('.page-number').text((start + 1) + ' - ' + end + ' de ' + totalLinhas);
                    }
                }

                // Variáveis para controle da paginação
                var currentPage = 1;

                // Exibir a primeira página e habilitar/desabilitar botões de navegação
                showPage(currentPage);
                $(".page-prev").prop("disabled", true);
                if (totalPages === 1) {
                    $(".page-next").prop("disabled", true);
                }

                // Evento de clique no botão "Próxima página"
                $(".page-next").on("click", function() {
                    currentPage++;
                    showPage(currentPage);
                    $(".page-prev").prop("disabled", false);
                    if (currentPage === totalPages) {
                        $(this).prop("disabled", true);
                    }
                });

                // Evento de clique no botão "Página anterior"
                $(".page-prev").on("click", function() {
                    currentPage--;
                    showPage(currentPage);
                    $(".page-next").prop("disabled", false);
                    if (currentPage === 1) {
                        $(this).prop("disabled", true);
                    }
                });

                // Ocultar o cabeçalho da tabela e os botões de paginação
                $('#tabelaPatrimonio').addClass('hidden');
                $('.titulo.hidden').addClass('hidden');
            }
        });

        

        // Função para filtrar a tabela
        function filtrarTabela() {
            // Obter as opções selecionadas nos campos de seleção
            var categoriaSelecionada = $('#categoriaSelect').val();
            var modeloSelecionado = $('#modeloSelect').val();
            var tipoSelecionado = $('#tipoSelect').val();
            var marcaSelecionada = $('#marcaSelect').val();
            var estadoSelecionado = $('#estadoSelect').val();
            var situacaoSelecionada = $('#situacaoSelect').val();
            var salaSelecionada = $('#salaSelect').val();
            var coordenacaoSelecionada = $('#coordenacaoSelect').val();
            var setorSelecionado = $('#setorSelect').val();
            
            // Obter os valores digitados nos campos de entrada
            var patrimonioMEC = $('#inputMEC').val();
            var patrimonioME = $('#inputME').val();
            var siapeResponsavel = $('#siapeResponsavel').val();
            var siapeUsuario = $('#inputSiapeUsuario').val();
            var nomeResponsavel = $('#inputNomeResponsavel').val();
            var nomeUsuario = $('#inputUsuario').val();


            // Percorrer as linhas da tabela
            $('#tabelaPatrimonio tbody tr').each(function() {
            var linha = $(this);
            var patrimonioMecValue = linha.find('td:nth-child(3)').text();
            var patrimonioMeValue = linha.find('td:nth-child(4)').text();
            var descricaoCategoria = linha.find('td:nth-child(5)').text();
            var descricaoModelo = linha.find('td:nth-child(7)').text();
            var descricaoTipo = linha.find('td:nth-child(6)').text();
            var descricaoMarca = linha.find('td:nth-child(8)').text();
            var descricaoEstado = linha.find('td:nth-child(9)').text();
            var descricaoSituacao = linha.find('td:nth-child(10)').text();
            var descricaoSala = linha.find('td:nth-child(11)').text();
            var descricaoCoordenacao = linha.find('td:nth-child(12)').text();
            var descricaoSetor = linha.find('td:nth-child(13)').text();
            var siapeResponsavelValue = linha.find('td:nth-child(15)').text();
            var siapeUsuarioValue = linha.find('td:nth-child(17)').text();
            var responsavelValue = linha.find('td:nth-child(14)').text();
            var usuarioValue = linha.find('td:nth-child(16)').text();

            // Verificar se algum parâmetro de filtragem foi selecionado ou digitado
            var filtroSelecionado =
                categoriaSelecionada ||
                modeloSelecionado ||
                tipoSelecionado ||
                marcaSelecionada ||
                estadoSelecionado ||
                situacaoSelecionada ||
                salaSelecionada ||
                coordenacaoSelecionada ||
                setorSelecionado ||
                patrimonioMEC ||
                patrimonioME ||
                siapeResponsavel ||
                siapeUsuario ||
                nomeResponsavel ||
                nomeUsuario;

            if (filtroSelecionado) {
                // Verificar as condições selecionadas nos campos de seleção e ocultar as linhas que não correspondem
                var linhaDeveSerOcultada =
                (categoriaSelecionada && !descricaoCategoria.includes(categoriaSelecionada)) ||
                (modeloSelecionado && !descricaoModelo.includes(modeloSelecionado)) ||
                (tipoSelecionado && !descricaoTipo.includes(tipoSelecionado)) ||
                (marcaSelecionada && !descricaoMarca.includes(marcaSelecionada)) ||
                (estadoSelecionado && !descricaoEstado.includes(estadoSelecionado)) ||
                (situacaoSelecionada && !descricaoSituacao.includes(situacaoSelecionada)) ||
                (salaSelecionada && !descricaoSala.includes(salaSelecionada)) ||
                (coordenacaoSelecionada && !descricaoCoordenacao.includes(coordenacaoSelecionada)) ||
                (setorSelecionado && !descricaoSetor.includes(setorSelecionado)) ||
                (patrimonioMEC && patrimonioMecValue !== patrimonioMEC) ||
                (patrimonioME && patrimonioMeValue !== patrimonioME) ||
                (siapeResponsavel && siapeResponsavelValue !== siapeResponsavel) ||
                (siapeUsuario && siapeUsuarioValue !== siapeUsuario) ||
                (nomeResponsavel && !responsavelValue.toLowerCase().includes(nomeResponsavel.toLowerCase())) ||
                (nomeUsuario && !usuarioValue.toLowerCase().includes(nomeUsuario.toLowerCase()));

                if (linhaDeveSerOcultada) {
                    linha.hide();
                    } else {
                        linha.show();
                        linhasEncontradas = true;
                    }
                } else {
                    linha.show(); // Se nenhum filtro estiver selecionado, exibe todas as linhas
                    linhasEncontradas = true;
                }
            });
        }



        $(document).ready(function() {
        // Manipulador de evento para a checkbox do cabeçalho
        $("#tabelaPatrimonio thead .linhaCheckbox").change(function() {
            var isChecked = $(this).prop("checked");

            // Marcar/desmarcar todas as checkboxes das linhas
            $("#tabelaPatrimonio tbody .linhaCheckbox").prop("checked", isChecked);

            // Mostrar/ocultar os botões de acordo com o estado da checkbox do cabeçalho
            if (isChecked) {
                $("#exportarPDF, #exportarExcel, #editar, #historico, #deletar").removeClass("hidden");
            } else {
                $("#exportarPDF, #exportarExcel, #editar, #historico, #deletar").addClass("hidden");
            }
        });

        // Manipulador de evento para as checkboxes das linhas
        $("#tabelaPatrimonio tbody .linhaCheckbox").change(function() {
            // Verificar se pelo menos uma checkbox das linhas está marcada
            var isAnyChecked = $("#tabelaPatrimonio tbody .linhaCheckbox:checked").length > 0;

            // Mostrar/ocultar os botões de acordo com o estado das checkboxes das linhas
            if (isAnyChecked) {
                $("#exportarPDF, #exportarExcel, #editar, #historico, #deletar").removeClass("hidden");
            } else {
                $("#exportarPDF, #exportarExcel, #editar, #historico, #deletar").addClass("hidden");
            }
        });

        // Manipulador de evento para a checkbox do cabeçalho da tabela Histórico
        $("#historicoTabela thead .linhaCheckbox").change(function() {
            // Se a checkbox do cabeçalho da tabela Histórico foi marcada ou desmarcada
            var isChecked = $(this).prop("checked");

            // Marcar/desmarcar todas as checkboxes das linhas da tabela Histórico
            $("#historicoTabela tbody .linhaCheckbox").prop("checked", isChecked);
        });


        // Função para atualizar a classe das linhas selecionadas no histórico
        function atualizarSelecaoHistorico() {
            $('.historico-tabela .linhaCheckbox').each(function() {
                var linha = $(this).closest("tr");
                if ($(this).prop('checked')) {
                    linha.addClass('selected');
                } else {
                    linha.removeClass('selected');
                }
            });
        }

        // Mapeamento das colunas que devem ser exibidas no PDF
        var colunasExibidas = {
            2: "Patrimônio MEC",
            3: "Patrimônio ME",
            4: "Categoria",
            5: "Tipo",
            6: "Modelo",
            7: "Marca",
            8: "Estado Fisico",
            9: "Situação",
            10: "Sala",
            11: "Coordenação",
            12: "Setor",
            13: "Responsável",
            14: "Siape Responsável",
            15: "Usuário",
            16: "Siape Usuário",
            17: "Anexo",
            18: "Observação",
        };


        // Função para exportar em PDF
        function exportarPDF(linhasSelecionadas) {
            // Cria uma tabela temporária para incluir todas as linhas selecionadas
        var tabelaTemporaria = $("<table></table>");

        // Adiciona o cabeçalho na tabela temporária
        var cabecalho = $("#tabelaPatrimonio thead tr").clone();
        cabecalho.append('<th>Data Alteração</th>'); // Adiciona a coluna de data com a borda à direita
        tabelaTemporaria.append(cabecalho);

        // Percorre todas as linhas selecionadas e adiciona na tabela temporária
        $(linhasSelecionadas).each(function() {
            var linha = $(this).clone();
            var linhaSelecionada = this;

            // Mapear os valores corretamente de acordo com as colunas exibidas
            linha.find('td').each(function(index, td) {
                var valorColuna = $(td).text();
                var colunaExibida = colunasExibidas[index];

                if (colunaExibida) {
                    // Criar nova célula na tabela temporária
                    linhaSelecionada.append('<td>' + valorColuna + '</td>');
                }
            });

            tabelaTemporaria.append(linhaSelecionada);
        });

            // Remove a coluna das checkboxes na tabela temporária
            tabelaTemporaria.find("th:first-child, td:first-child").remove();

            // Cria uma nova janela do navegador com o conteúdo da tabela temporária
            var janelaNova = window.open('', '_blank');
            janelaNova.document.write('<html><head>');
            janelaNova.document.write('<style>');
            janelaNova.document.write('body { zoom: 97%; }'); // Reduz a proporção do documento em 3%
            janelaNova.document.write('table { width: 80%; margin: 10px auto; border-collapse: collapse; }');
            janelaNova.document.write('th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }');
            janelaNova.document.write('th:first-child, td:first-child { border-left: 1px solid #ddd; }');
            janelaNova.document.write('th:last-child, td:last-child { border-right: 1px solid #ddd; }');
            janelaNova.document.write('.headTable { background-color: #f2f2f2; }');
            janelaNova.document.write('tbody tr:nth-child(even) { background-color: #f9f9f9; }');
            janelaNova.document.write('tbody tr:nth-child(odd) { background-color: #ffffff; }');
            janelaNova.document.write('.titulo { text-align: center; }');
            janelaNova.document.write('h2 { color: white; background-color: rgba(0, 0, 0, 0.5); padding: 10px; text-align: center; }');
            janelaNova.document.write('</style>');
            janelaNova.document.write('<title>Relatório</title></head><body>');
            janelaNova.document.write('<h2>Patrimônios Cadastrados</h2>');
            janelaNova.document.write(tabelaTemporaria.prop('outerHTML'));
            janelaNova.document.write('</body></html>');
            janelaNova.document.close();
        }

        $("#exportarPDF").click(function() {
            var linhasSelecionadasPatrimonio = [];
            var linhasSelecionadasHistorico = [];

            // Verificar todas as linhas de Patrimônio (incluindo as que estão com display: none)
            $("#tabelaPatrimonio tbody tr").each(function() {
                var linha = $(this);
                var checkbox = linha.find('.linhaCheckbox');

                // Verificar se a linha está selecionada
                if (checkbox.prop('checked')) {
                    var dataAlteracao = linha.find('.data-alteracao').text();
                    var valoresColunas = [];

                    // Utilizamos slice para remover a primeira coluna (coluna do checkbox)
                    linha.find('td').slice(2).each(function() {
                        valoresColunas.push($(this).text());
                    });

                    linhasSelecionadasPatrimonio.push({
                        dataAlteracao: dataAlteracao,
                        valoresColunas: valoresColunas
                    });
                }
            });

          

            // Verificar todas as linhas do Histórico (incluindo as que estão com display: none)
            $("#historicoTabela tbody tr").each(function() {
                var linha = $(this);
                var checkbox = linha.find('.linhaCheckbox');

                // Verificar se a linha está selecionada
                if (checkbox.prop('checked')) {
                    var dataAlteracao = linha.find('.data-alteracao').text();
                    var valoresColunas = [];

                    // Utilizamos slice para remover a primeira coluna (coluna do checkbox)
                    linha.find('td').slice(1).each(function() {
                        valoresColunas.push($(this).text());
                    });

                    linhasSelecionadasHistorico.push({
                        dataAlteracao: dataAlteracao,
                        valoresColunas: valoresColunas
                    });
                }
            });

            if (linhasSelecionadasPatrimonio.length > 0 || linhasSelecionadasHistorico.length > 0) {
                // Armazenar as linhas selecionadas no LocalStorage (opcional, pode ser removido)
                localStorage.setItem('linhasSelecionadasPatrimonio', JSON.stringify(linhasSelecionadasPatrimonio));
                localStorage.setItem('linhasSelecionadasHistorico', JSON.stringify(linhasSelecionadasHistorico));

                // Exportar para PDF
                var linhasSelecionadas = [];

                // Adicionar as linhas selecionadas de Patrimônio
                linhasSelecionadasPatrimonio.forEach(function(linhaSelecionada) {
                    var linha = $('<tr></tr>');
                    linha.append('<td>' + linhaSelecionada.dataAlteracao + '</td>');

                    // Iterar pelas colunas, exceto a coluna "Descrição"
                    linhaSelecionada.valoresColunas.slice(0, 17).forEach(function(valorColuna) {
                        linha.append('<td>' + valorColuna + '</td>');
                    });

                    // Adicionar uma célula vazia para a coluna "Observação"
                    linha.append('<td></td>');

                    linhasSelecionadas.push(linha);
                });

                // Adicionar as linhas selecionadas de Histórico
                linhasSelecionadasHistorico.forEach(function(linhaSelecionada) {
                    var linha = $('<tr></tr>');
                    linha.append('<td>' + linhaSelecionada.dataAlteracao + '</td>');

                    // Iterar pelas colunas, exceto a coluna "Descrição"
                    linhaSelecionada.valoresColunas.slice(0, 19).forEach(function(valorColuna) {
                        linha.append('<td>' + valorColuna + '</td>');
                    });

                    // Adicionar uma célula vazia para a coluna "Observação"
                    linha.append('<td></td>');

                    linhasSelecionadas.push(linha);
                });

                exportarPDF(linhasSelecionadas);
            } else {
                // Mostrar mensagem de aviso ao usuário
                Swal.fire({
                    title: 'Nenhuma linha selecionada',
                    text: 'Selecione pelo menos uma linha para exportar.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    }
                });
            }
        });

            // Função para exportar em PDF
            function exportarPDF(linhasSelecionadas) {
                // Cria uma tabela temporária para incluir todas as linhas selecionadas
                var tabelaTemporaria = $("<table></table>");

                // Adiciona o cabeçalho na tabela temporária
                var cabecalho = $("#tabelaPatrimonio thead tr").clone();
                cabecalho.append('<th>Alteração</th>'); // Adiciona a coluna de data com a borda à direita
                tabelaTemporaria.append(cabecalho);

                // Percorre todas as linhas selecionadas e adiciona na tabela temporária
                $(linhasSelecionadas).each(function() {
                    var linha = $(this).clone();
                    tabelaTemporaria.append(linha);
                });

                // Remove a coluna das checkboxes na tabela temporária
                tabelaTemporaria.find("th:first-child, td:first-child").remove();

                // Cria uma nova janela do navegador com o conteúdo da tabela temporária
                var janelaNova = window.open('', '_blank');
                janelaNova.document.write('<html><head>');
                janelaNova.document.write('<style>');
                janelaNova.document.write('body { zoom: 97%; }'); // Reduz a proporção do documento em 3%
                janelaNova.document.write('table { width: 80%; margin: 10px auto; border-collapse: collapse; }');
                janelaNova.document.write('th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }');
                janelaNova.document.write('th:first-child, td:first-child { border-left: 1px solid #ddd; }');
                janelaNova.document.write('th:last-child, td:last-child { border-right: 1px solid #ddd; }');
                janelaNova.document.write('.headTable { background-color: #f2f2f2; }');
                janelaNova.document.write('tbody tr:nth-child(even) { background-color: #f9f9f9; }');
                janelaNova.document.write('tbody tr:nth-child(odd) { background-color: #ffffff; }');
                janelaNova.document.write('.titulo { text-align: center; }');
                janelaNova.document.write('h2 { color: white; background-color: rgba(0, 0, 0, 0.5); padding: 10px; text-align: center; }');
                janelaNova.document.write('</style>');
                janelaNova.document.write('<title>Relatório</title></head><body>');
                janelaNova.document.write('<h2>Patrimônios Cadastrados</h2>');
                janelaNova.document.write(tabelaTemporaria.prop('outerHTML'));
                janelaNova.document.write('</body></html>');
                janelaNova.document.close();

                // Aguarda um tempo para garantir que o conteúdo seja carregado corretamente
                setTimeout(function() {
                    // Imprime ou salva em PDF
                    janelaNova.print();

                    // Fecha a nova janela após a impressão ou o salvamento em PDF
                    janelaNova.close();
                }, 1000);
            }
        });

        $(document).ready(function() {
            $(".fancybox").fancybox();
        });

        // Função para exportar os dados em Excel
        function exportarExcel(data) {
            var workbook = XLSX.utils.book_new();

            // Função para converter um array de objetos em uma matriz
            function arrayDeObjetosParaMatriz(arr) {
                var matriz = [];
                if (arr && arr.length > 0) {
                    matriz.push(Object.keys(arr[0])); // Adiciona o cabeçalho (nomes das colunas)
                    for (var i = 0; i < arr.length; i++) {
                        var linha = [];
                        for (var key in arr[i]) {
                            linha.push(arr[i][key]); // Adiciona os valores da linha
                        }
                        matriz.push(linha);
                    }
                }
                return matriz;
            }

            // Cria a worksheet com os dados do patrimônio
            var worksheetPatrimonio = XLSX.utils.aoa_to_sheet(arrayDeObjetosParaMatriz(data.patrimonio));

            // Cria a worksheet com os dados do histórico
            var worksheetHistorico = XLSX.utils.aoa_to_sheet(arrayDeObjetosParaMatriz(data.historico));

            // Adiciona as worksheets ao workbook
            XLSX.utils.book_append_sheet(workbook, worksheetPatrimonio, "Patrimônio");
            XLSX.utils.book_append_sheet(workbook, worksheetHistorico, "Histórico");

            // Gera o arquivo Excel
            var dataBlob = workbook2blob(workbook);
            saveAs(dataBlob, "dados.xlsx");
        }

        // Função para converter o workbook para blob
        function workbook2blob(workbook) {
            var wopts = { bookType: "xlsx", bookSST: false, type: "binary" };
            var wbout = XLSX.write(workbook, wopts);

            // Convert o workbook para Blob
            var buf = new ArrayBuffer(wbout.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < wbout.length; i++) {
                view[i] = wbout.charCodeAt(i) & 0xff;
            }
            return new Blob([buf], { type: "application/octet-stream" });
        }
        
        function obterIdsLinhasMarcadas() {
            var ids = [];
            $(".linhaCheckbox:checked").each(function() {
                var id = $(this).closest("tr").find(".idLinha").data("id");
                if (id !== undefined) { // Certifique-se de que o ID não seja undefined
                    ids.push(id);
                }
            });
            console.log(ids);
            return ids;
        }

        $("#exportarExcel").click(function() {
            var idsMarcados = obterIdsLinhasMarcadas();

            // Verifica se a checkbox do cabeçalho está marcada
            var cabecalhoCheckbox = $("#tabelaPatrimonio thead .linhaCheckbox");
            if (cabecalhoCheckbox.prop("checked")) {
                // Marca todas as checkboxes das linhas
                $(".linhaCheckbox").prop("checked", true);

                // Obtém os IDs de todas as linhas e exclui o cabeçalho
                var todosIds = $(".linhaCheckbox:checked")
                    .map(function() {
                        return $(this).closest("tr").find(".idLinha").data("id");
                    })
                    .get();
                idsMarcados = todosIds.slice(1); // Ignora o cabeçalho
            }

            // Fazer a requisição para buscar os dados no banco de dados
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'exportar_excel',
                    idsPatrimonio: idsMarcados,
                    idsHistorico: idsMarcados
                },
                dataType: 'json',
                success: function(data) {
                    exportarExcel(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        
        var linhaSelecionada = null;

        // Função para selecionar a linha da tabela
        function selecionarLinha(linha) {
        // Remover a classe de todas as linhas da tabela
        var linhas = document.querySelectorAll('table tbody tr');
        linhas.forEach(function(linha) {
            linha.classList.remove('linha-selecionada');
        });

        // Adicionar a classe à linha selecionada
        linha.classList.add('linha-selecionada');

        // Armazenar a linha selecionada
        linhaSelecionada = linha;
        }

        // Adicionar um evento de clique a todas as linhas da tabela
        var linhasTabela = document.querySelectorAll('table tbody tr');
        linhasTabela.forEach(function(linha) {
        linha.addEventListener('click', function() {
            selecionarLinha(linha);
        });
        });

        var editarButton = document.getElementById('editar');
        var linhaSelecionadaContainer = document.getElementById('linhaSelecionadaContainer');
        var cabecalhoTabela = document.querySelector('table thead tr');
        var checkboxCabecalho = document.querySelector('table thead tr th input');

        editarButton.addEventListener('click', function() {
        // Verificar se uma linha está selecionada
        if (linhaSelecionada) {
            // Verificar se mais de uma linha está selecionada, incluindo o cabeçalho
            var linhasSelecionadas = document.querySelectorAll('.linhaCheckbox:checked');
            if (linhasSelecionadas.length > 1 || (linhasSelecionadas.length === 1 && checkboxCabecalho.checked)) {
            // Exibir o alerta utilizando o Swal.fire informando que apenas uma linha pode ser editada
            Swal.fire({
                title: 'Aviso',
                text: 'Por favor, selecione apenas uma linha para editar.',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                confirmButton: 'btn btn-primary'
                }
            });
            return; // Sai da função sem prosseguir com a edição
            }

            // Ocultar o container de zoom
            var zoomContainer = document.getElementById('zoomContainer');
            zoomContainer.style.display = 'none';
            
            // Exibir o formulário de edição
            var editarPatrimonioForm = document.getElementById('editarPatrimonio');
            editarPatrimonioForm.style.display = 'block';

            // Clonar a linha selecionada e adicionar acima do container
            var linhaSelecionadaClone = linhaSelecionada.cloneNode(true);
            linhaSelecionadaContainer.innerHTML = '';
            linhaSelecionadaContainer.appendChild(cabecalhoTabela.cloneNode(true));
            linhaSelecionadaContainer.appendChild(linhaSelecionadaClone);

            // Adicionar a classe zoomContainer à linha clonada e ao cabeçalho clonado
            linhaSelecionadaClone.classList.add('zoomContainer');
            cabecalhoTabela.classList.add('zoomContainer');

            // Preencher os campos do formulário com os dados da linha selecionada
            document.getElementById('id').value = linhaSelecionada.cells[1].textContent;
            document.getElementById('patrimonioMec').value = linhaSelecionada.cells[2].textContent;
            document.getElementById('patrimonioME').value = linhaSelecionada.cells[3].textContent;
            document.getElementById('estadoFisico').value = linhaSelecionada.cells[8].textContent;
            document.getElementById('situacao').value = linhaSelecionada.cells[9].textContent;
            document.getElementById('sala').value = linhaSelecionada.cells[10].textContent;
            document.getElementById('coordenacao').value = linhaSelecionada.cells[11].textContent;
            document.getElementById('setor').value = linhaSelecionada.cells[12].textContent;
            document.getElementById('nomeResponsavel').value = linhaSelecionada.cells[13].textContent;
            document.getElementById('siapeResponsavel').value = linhaSelecionada.cells[14].textContent;
            document.getElementById('nomeUsuario').value = linhaSelecionada.cells[15].textContent;
            document.getElementById('siapeUsuario').value = linhaSelecionada.cells[16].textContent;
            document.getElementById('observacao').value = linhaSelecionada.cells[19].textContent.trim();
            document.getElementById('descricao').value = linhaSelecionada.cells[21].textContent.trim();

            // Ocultar a tabela de patrimônio
            var tabelaPatrimonio = document.getElementById('tabelaPatrimonio');
            tabelaPatrimonio.style.display = 'none';
            // Ocultar o título
            var titulo = document.querySelector('.titulo');
            titulo.classList.add('hidden');

            // Ocultar os botões
            var botoes = document.getElementById('botoes');
            botoes.classList.add('hidden');

            // Ocultar os botões de paginação da tabela de patrimônio
            var pagination = document.querySelector('.pagination');
            pagination.style.display = 'none';

        }
        });


        // Função para exibir o ícone de carregamento e alterar o texto do botão
        function exibirCarregamento() {
            var botao = $('#historico');
            botao.attr('disabled', true);
            botao.html('<i class="fa fa-spinner fa-spin"></i> Consultando...');
        }

        // Função para remover o ícone de carregamento e restaurar o texto do botão
        function removerCarregamento() {
            var botao = $('#historico');
            botao.attr('disabled', false);
            botao.html('Histórico');
        }

        $(document).ready(function() {
            var linhaId = null; // ID da linha selecionada

            // Manipulador de evento para a checkbox do cabeçalho da tabela Histórico
            $(document).on('change', '#historicoTabela thead .linhaCheckbox', function() {
                // Se a checkbox do cabeçalho da tabela Histórico foi marcada ou desmarcada
                var isChecked = $(this).prop("checked");

                // Marcar/desmarcar todas as checkboxes das linhas da tabela Histórico
                $("#historicoTabela tbody .linhaCheckbox").prop("checked", isChecked);
            });

            $('#tabelaPatrimonio').on('click', '.linhaCheckbox', function() {
                var linha = $(this).closest('tr');
                linha.toggleClass('selected');
            });

            $('#historico').on('click', function() {
                var linhaSelecionada = $('#tabelaPatrimonio').find('tr.selected');

                // Verifica se há uma linha selecionada
                if (linhaSelecionada.length > 0) {
                    linhaId = linhaSelecionada.find('.idLinha').text();
                    console.log('ID da linha:', linhaId);

                    exibirHistorico();
                } else {
                    alert('Nenhuma linha selecionada.');
                }
            });

            function exibirHistorico() {
                exibirCarregamento();

                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'POST',
                    data: {
                        action: 'exibir_historico',
                        linha_id: linhaId
                    },
                    success: function(response) {
                        removerCarregamento();
                        if (response.success) {
                            $('#historicoContainer').html(response.data);
                            moverLinhaSelecionadaParaTopo();
                        } else {
                            console.log('Erro ao buscar o histórico:', response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        removerCarregamento();
                        console.log('Erro ao buscar o histórico:', error);
                    }
                });
            }

            // Função para mover a linha selecionada para o topo da página
            function moverLinhaSelecionadaParaTopo() {
                var tabelaPatrimonio = $('#tabelaPatrimonio');
                var linhaSelecionada = tabelaPatrimonio.find('tr.selected');

                if (linhaSelecionada.length > 0) {
                    linhaSelecionada.prependTo(tabelaPatrimonio.find('tbody'));
                }
            }
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

                function openObservation(observacao) {
                    var newWindow = window.open('', '_blank');
                    newWindow.document.write('<html><body><pre>' + observacao + '</pre></body></html>');
                    newWindow.document.close();
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

        //abrir o arquivo da observação diretamente no word
        function openDocxInWord(event) {
            event.preventDefault();
            const url = event.target.href;
            fetch(url)
                .then(response => response.blob())
                .then(blob => {
                    var file = new File([blob], 'document.docx', { type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' });
                    var url = URL.createObjectURL(file);
                    window.location.href = url;
                })
                .catch(error => console.error('Erro ao abrir o arquivo.', error));
        }

        $(document).ready(function() {
        // Manipulador de evento de clique para o botão de deletar
        $("#deletar").on("click", function() {
            // Verifique se alguma linha está marcada (checkbox selecionada)
            if ($(".linhaCheckbox:checked").length > 0) {
                // Exiba o alerta de confirmação
                if (confirm("Tem certeza que deseja deletar o patrimônio selecionado? Esta ação é irreversível.")) {
                    // Obtenha o ID do patrimônio a ser deletado
                    var patrimonioId = $(".linhaCheckbox:checked").closest("tr").find(".idLinha").data("id");
                    
                    // Envie a solicitação AJAX para o ponto de extremidade correto
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        method: "POST",
                        data: { action: 'deletar_patrimonio', id: patrimonioId },
                        success: function(response) {
                            alert("Resposta do servidor: " + JSON.stringify(response)); // Adicione esta linha para verificar a resposta do servidor
                            if (response.success) {
                                // Se a exclusão for bem-sucedida, redirecione para a página de consultas
                                window.location.href = "http://localhost:8080/inventariospo/consultas/";
                            } else {
                                // Se ocorrer algum erro, exiba uma mensagem de erro
                                alert("Não foi possível deletar o patrimônio. Tente novamente.");
                            }
                        },
                        error: function() {
                            // Exiba uma mensagem de erro caso ocorra algum problema com a exclusão
                            alert("Não foi possível deletar o patrimônio. Tente novamente.");
                        }
                    });
                }
            } else {
                // Se nenhuma linha estiver marcada, exiba uma mensagem de aviso
                alert("Nenhuma linha selecionada para deletar.");
            }
        });
    });
</script>