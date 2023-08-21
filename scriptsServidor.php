
<script> //Pagina addServidor

            //Função para padronização do nome, para receber a primeira letra de cada palavra em letra maiúscula 
            function padronizar(input) {
                const words = input.value.toLowerCase().split(' ');
                words.forEach((word, index) => {
                words[index] = word.charAt(0).toUpperCase() + word.slice(1);
                });
                input.value = words.join(' ');
            }
            
            $(document).ready(function() {
                var rowsPerPage = 5;
                var totalLinhas = <?php echo count($resultado); ?>;
                var totalPages = Math.ceil(totalLinhas / rowsPerPage);
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

                // Função para exibir as linhas corretas com base na página atual
                function showPage(page) {
                    var start = (page - 1) * rowsPerPage;
                    var end = Math.min(start + rowsPerPage, totalLinhas);

                    // Ocultar todas as linhas
                    $(".historico-tabela tbody tr").hide();

                    // Exibir apenas as linhas que correspondem à página atual
                    for (var i = start; i < end; i++) {
                        $(".historico-tabela tbody tr").eq(i).show();
                    }

                    // Atualizar o contador de páginas
                    $('.page-number').text((start + 1) + ' - ' + end + ' de ' + totalLinhas);
                }
            });

            $(document).ready(function() {
                // Função para verificar se alguma checkbox está marcada
                function verificarCheckboxMarcada() {
                    var checkboxMarcada = false;
                    $('.linhaCheckbox').each(function() {
                        if ($(this).prop('checked')) {
                            checkboxMarcada = true;
                            return false; // Interrompe o loop ao encontrar a primeira checkbox marcada
                        }
                    });
                    return checkboxMarcada;
                }

            // Evento de clique nas checkboxes
            $('.linhaCheckbox').on('click', function () {
                var botaoEditar = $('#editar');
                var botaoDeletar = $('#deletar');
                var botaoSalvarAlteracoes = $('#salvarAlteracoes2');

                // Verificar se alguma checkbox está marcada
                var checkboxMarcada = verificarCheckboxMarcada();

                // Exibir ou ocultar os botões de acordo com a checkbox marcada
                if (checkboxMarcada) {
                    botaoEditar.removeClass('hidden');
                    botaoDeletar.removeClass('hidden');
                    botaoSalvarAlteracoes.addClass('hidden'); // Certifique-se de que o botão "Salvar Alterações" comece oculto
                } else {
                    botaoEditar.addClass('hidden');
                    botaoDeletar.addClass('hidden');
                    botaoSalvarAlteracoes.addClass('hidden');
                }
            });

            // Evento de clique no botão "Editar"
            $('#editar').on('click', function () {
                // Obter a linha da tabela que está marcada
                var linhaMarcada = $('.linhaCheckbox:checked').closest('tr');

                // Verificar se uma linha está selecionada
                if (linhaMarcada) {
                    // Preencher os campos do formulário com os dados da linha selecionada
                    var nome = linhaMarcada.find('td:nth-child(3)').text();
                    var email = linhaMarcada.find('td:nth-child(4)').text();
                    var siape = linhaMarcada.find('td:nth-child(5)').text();

                    $('#nome').val(nome);
                    $('#email').val(email);
                    $('#siape').val(siape);

                    // Armazenar os valores antigos do nome e siape no botão "Salvar Alterações2"
                    $('#salvar').data('nomeAntigo', nome);
                    $('#salvar').data('siapeAntigo', siape);

                    // Exibir o botão "Salvar Alterações" no lugar do botão "Adicionar"
                    $('.adicionarServidor').addClass('hidden');
                    $('.salvar').removeClass('hidden');
                    $('#cancelar').removeClass('hidden');
                }
            });

            // Evento de clique no botão "Cancelar"
            $('#cancelar').on('click', function () {
                // Limpar os campos do formulário
                $('#nome').val('');
                $('#email').val('');
                $('#siape').val('');

                // Ocultar o botão "Salvar Alterações" e exibir o botão "Adicionar"
                $('.adicionarServidor').removeClass('hidden');
                $('.salvar').addClass('hidden');
                $('#cancelar').addClass('hidden');
            });

            $('#deletar').on('click', function () {
    // Obter as linhas da tabela que estão marcadas com a checkbox
    var linhasMarcadas = $('.linhaCheckbox:checked').closest('tr');

    // Verificar se alguma linha está marcada
    if (linhasMarcadas.length > 0) {
        // Exibir mensagem de confirmação
        var confirmacao = confirm('Você tem certeza que deseja excluir o Servidor e todos os seus dados?');

        // Se o usuário clicou em "OK" na mensagem de confirmação
        if (confirmacao) {
            // Obter os SIAPEs dos servidores marcados para deletar
            var servidoresParaDeletar = [];
            linhasMarcadas.each(function () {
                var siape = $(this).find('td:nth-child(5)').text();
                servidoresParaDeletar.push(siape);
            });

            // Enviar uma requisição AJAX para o servidor
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                method: 'POST',
                data: {
                    action: 'deletar_servidores',
                    siape_array: servidoresParaDeletar
                },
                success: function (response) {
                    // Exibir a mensagem de sucesso ou erro após a exclusão
                    if (response.success) {
                        alert(response.message);
                        // Recarregar a página para atualizar a tabela de servidores após a exclusão
                        location.reload();
                    } else {
                        alert('Erro: ' + response.message);
                    }
                },
                error: function () {
                    alert('Ocorreu um erro ao deletar os servidores.');
                }
            });
        }
    } else {
        alert('Nenhum servidor selecionado para deletar.');
    }
});
            
                //função editar servidor
                $(document).ready(function() {
                    $('#salvarAlteracoes2').on('click', function() {
                        var id = $('.linhaCheckbox:checked').closest('tr').find('td:nth-child(2)').text();
                        var nome = $('#nome').val();
                        var siape = $('#siape').val();

                        var dados = {
                        action: 'atualizar_dados', // Nome da ação que será tratada em functions.php
                        id: id,
                        nome: nome,
                        siape: siape,
                        };

                        $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'POST',
                        data: dados,
                        success: function(response) {
                            if (response === 'success') {
                            // Abrir a nova página
                            window.open('nova_pagina.html');

                            // Quando o usuário clicar em "OK", voltar para a página anterior
                            window.opener.location.reload();
                            } else {
                            alert('Dados atualizados com sucesso, por favor, atualize a página e confirme o envio do formulário, para a validação.');
                            }
                        },
                        error: function() {
                            alert('Erro ao se comunicar com o servidor.');
                        }
                        });

                        return false;
                    });
                    });
            })
</script>