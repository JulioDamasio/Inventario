<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra-Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );
?>



<?php //Login-Entrar

//Conexão alternativa do bando de dados Atribuindo as variáveis
$hostname="localhost";  
$username="root";  
$password="";  
$db = "inventario";  

$mysqli = new mysqli($hostname, $username, $password, $db);
	

?>


<?php
//editar Patrimonio
$tabela_patrimonio = $wpdb->prefix . 'patrimonio';
$tabela_historico = $wpdb->prefix . 'historico';

// Verificar se o formulário foi enviado
if (!empty($_POST['salvarAlteracoes'])) {
    // Obtenha os valores dos campos do formulário
    $id = !empty($_POST['id']) ? sanitize_text_field($_POST['id']) : '';
    $patrimonioMec = !empty($_POST['patrimonioMec']) ? sanitize_text_field($_POST['patrimonioMec']) : '0';
    $patrimonioME = !empty($_POST['patrimonioME']) ? sanitize_text_field($_POST['patrimonioME']) : '0';
    $estadoFisico = !empty($_POST['estadoFisico']) ? sanitize_text_field($_POST['estadoFisico']) : 'NT';
    $situacao = !empty($_POST['situacao']) ? sanitize_text_field($_POST['situacao']) : 'NT';
    $sala = !empty($_POST['sala']) ? sanitize_text_field($_POST['sala']) : 'NT';
    $coordenacao = !empty($_POST['coordenacao']) ? sanitize_text_field($_POST['coordenacao']) : 'NT';
    $setor = !empty($_POST['setor']) ? sanitize_text_field($_POST['setor']) : 'NT';
    $nomeResponsavel = !empty($_POST['nomeResponsavel']) ? sanitize_text_field($_POST['nomeResponsavel']) : 'NT';
    $siapeResponsavel = !empty($_POST['siapeResponsavel']) ? sanitize_text_field($_POST['siapeResponsavel']) : '0';
    $nomeUsuario = !empty($_POST['nomeUsuario']) ? sanitize_text_field($_POST['nomeUsuario']) : 'NT';
    $siapeUsuario = !empty($_POST['siapeUsuario']) ? sanitize_text_field($_POST['siapeUsuario']) : '0';
    $anexo = !empty($_FILES['anexo']) ? ($_FILES['anexo']) : '';
    $observacao = !empty($_POST['observacao']) ? ($_POST['observacao']) : '';
    $descricao = !empty($_POST['descricao']) ? sanitize_text_field($_POST['descricao']) : '';

    // Obtenha os dados anteriores da linha
    $dadosAnteriores = $wpdb->get_row("SELECT * FROM $tabela_patrimonio WHERE id = '$id'", ARRAY_A);

    // Verificar se foram enviados arquivos
    if (!empty($_FILES['anexo']['name'][0])) {
        $anexos = $_FILES['anexo'];

        // Pasta para salvar os arquivos
        $pastaDestino = 'C:\xampp\htdocs\inventariospo\wp-content\themes\astra-child\arquivos\uploads';

        // Array para armazenar os caminhos dos arquivos
        $caminhosAnexos = array();

         // Verificar se já existem anexos na coluna 'anexo'
        if (!empty($dadosAnteriores['anexo'])) {
            $caminhosAnexos = explode(',', $dadosAnteriores['anexo']);
        }

        // Loop através dos arquivos enviados
        foreach ($anexos['name'] as $index => $name) {
            // Verifique se um arquivo foi enviado
            if (!empty($name)) {
                $tmpName = $anexos['tmp_name'][$index];
                $originalName = $name;

                // Gere um novo nome para o arquivo para evitar conflitos de nomes
                $novoNome = uniqid() . '_' . $originalName;

                // Caminho completo do arquivo na pasta de destino
                $caminhoCompletoAnexo = $pastaDestino . '\\' . $novoNome;

                // Mova o arquivo para a pasta de destino
                move_uploaded_file($tmpName, $caminhoCompletoAnexo);

                // Adicione o caminho do arquivo ao array
                $caminhosAnexos[] = $caminhoCompletoAnexo;
            }
        }

        // Concatene os caminhos dos arquivos em uma única string separada por vírgulas
        $caminhosAnexosString = implode(',', $caminhosAnexos);
    } else {
        // Se não houver novos anexos enviados, mantenha os anexos anteriores
        $caminhosAnexosString = $dadosAnteriores['anexo'];
    }

    // Atualizar o campo de anexo na tabela wp_patrimonio
    $wpdb->update($tabela_patrimonio, array('anexo' => $caminhosAnexosString), array('id' => $id));

        // Verifique se foi enviada uma imagem
        if (!empty($_FILES['imagem']['name'])) {
            $imagens = $_FILES['imagem'];

            // Pasta para salvar as imagens
            $pastaDestinoImagens = 'C:\xampp\htdocs\inventariospo\wp-content\themes\astra-child\imagens';

            // Array para armazenar os caminhos das imagens
            $caminhosImagens = array();

            // Extensões permitidas
            $extensoesPermitidas = array('jpg', 'jpeg', 'png');

            // Loop através das imagens enviadas
            foreach ($imagens['name'] as $index => $name) {
                // Verifique se um arquivo foi enviado
                if (!empty($name)) {
                    $tmpName = $imagens['tmp_name'][$index];
                    $originalName = $name;
                    $extensao = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

                    // Verifique se a extensão é permitida
                    if (in_array($extensao, $extensoesPermitidas)) {
                        // Gere um novo nome para a imagem para evitar conflitos de nomes
                        $novoNome = uniqid() . '_' . $originalName;

                        // Caminho completo da imagem na pasta de destino
                        $caminhoCompletoImagem = $pastaDestinoImagens . '\\' . $novoNome;

                        // Mova a imagem para a pasta de destino
                        move_uploaded_file($tmpName, $caminhoCompletoImagem);

                        // Adicione o caminho da imagem ao array
                        $caminhosImagens[] = $caminhoCompletoImagem;
                    }
                }
            }

            // Concatene os caminhos das imagens em uma única string separada por vírgulas
            $caminhosImagensString = implode(',', $caminhosImagens);
        } else {
            // Se não houver imagens, defina o caminho das imagens como vazio
            $caminhosImagensString = '';
        
    
            // Atualize o campo de imagem na tabela wp_patrimonio
            $wpdb->update($tabela_patrimonio, array('imagem' => $caminhosImagensString), array('id' => $id));
        }
        
    // Prepare os dados que serão atualizados na tabela wp_patrimonio
    $data = array(
        'id' => $id !== '' ? $id : null,
        'patrimonioMec' => $patrimonioMec !== '' ? $patrimonioMec : null,
        'patrimonioME' => $patrimonioME !== '' ? $patrimonioME : null,
        'estadoFisico' => $estadoFisico,
        'situacao' => $situacao,
        'sala' => $sala,
        'coordenacao' => $coordenacao,
        'setor' => $setor,
        'nomeResponsavel' => $nomeResponsavel,
        'siapeResponsavel' => $siapeResponsavel,
        'nomeUsuario' => $nomeUsuario,
        'siapeUsuario' => $siapeUsuario !== '' ? $siapeUsuario : null,
        'anexo' => $caminhosAnexosString,
        'observacao' => $observacao,
        'imagem' => $caminhosImagensString,
        'descricao' => $descricao,
        'alteracao' => 'S', // Value to be set in the "alteracao" column
    );

    // Atualizar ou inserir a observacao na tabela wp_patrimonio
    $wpdb->update($tabela_patrimonio, array('observacao' => $observacao), array('id' => $id));

    // Atualizar ou inserir a descricao na tabela wp_patrimonio
    $wpdb->update($tabela_patrimonio, array('descricao' => $descricao), array('id' => $id));

    // Prepare a cláusula WHERE para atualizar o registro correto na tabela wp_patrimonio
    $where = array('id' => $id);


    // Execute a consulta de atualização na tabela wp_patrimonio
    $result = $wpdb->update($tabela_patrimonio, $data, $where);

    // Inserir registro na tabela wp_historico
    $wpdb->insert($tabela_historico, array_merge($dadosAnteriores, array('data' => current_time('mysql'),'tipoOperacao' => 'Edição', 'observacao' => $observacao, 'descricao' => $descricao)));

    // Verificar se a consulta de atualização foi bem-sucedida
    if ($result !== false) {
        // Prepare os dados para inserção na tabela wp_historico
        $historicoData = array(
            'id_patrimonio' => $id, // ID do patrimônio editado
            'patrimonioMec' => $dadosAnteriores['patrimonioMec'],
            'patrimonioME' => $dadosAnteriores['patrimonioME'],
            'estadoFisico' => $dadosAnteriores['estadoFisico'],
            'situacao' => $dadosAnteriores['situacao'],
            'sala' => $dadosAnteriores['sala'],
            'coordenacao' => $dadosAnteriores['coordenacao'],
            'setor' => $dadosAnteriores['setor'],
            'nomeResponsavel' => $dadosAnteriores['nomeResponsavel'],
            'siapeResponsavel' => $dadosAnteriores['siapeResponsavel'],
            'nomeUsuario' => $dadosAnteriores['nomeUsuario'],
            'siapeUsuario' => $dadosAnteriores['siapeUsuario'],
            'anexo' => $caminhosAnexosString,
            'observacao' => $observacao,
            'descricao' => $descricao,
            'tipoOperacao' => 'Edição',
            'alteracao' => 'S', // Value to be set in the "alteracao" column
            'data' => current_time('mysql'), // Data atual
        );

        // Inserir registro na tabela wp_historico
        $wpdb->insert($tabela_historico, $historicoData);

        // Exibir mensagem de sucesso usando SweetAlert
        echo '<script>alert("Edição realizada com sucesso. Os dados foram atualizados.");</script>';
    } else {
        // Exibir mensagem de falha usando alert padrão do JavaScript
        echo '<script>alert("Edição não realizada. Ocorreu um erro ao atualizar os dados. Tente novamente.");</script>';
    }
}
?>

<?php //deletar patrimonio

// Adicione um hook para lidar com a solicitação AJAX de exclusão
add_action('wp_ajax_deletar_patrimonio', 'deletar_patrimonio_callback');
add_action('wp_ajax_nopriv_deletar_patrimonio', 'deletar_patrimonio_callback');

// Função de callback para a solicitação AJAX de exclusão
function deletar_patrimonio_callback() {
    // Verifique se o usuário está logado e possui a capacidade de excluir patrimônios (se necessário)

    if (isset($_POST['id'])) {
        global $wpdb;

        $tabela_patrimonio = $wpdb->prefix . 'patrimonio';
        $tabela_historico = $wpdb->prefix . 'historico';

        // Obtenha o ID do patrimônio a ser deletado
        $patrimonio_id = $_POST['id'];

        // Obtenha os dados do patrimônio antes de excluí-lo
        $dados_patrimonio = $wpdb->get_row("SELECT * FROM $tabela_patrimonio WHERE id = '$patrimonio_id'", ARRAY_A);

        // Inserir registro na tabela wp_historico
        $wpdb->insert($tabela_historico, array_merge($dados_patrimonio, array('data' => current_time('mysql'),'tipoOperacao' => 'Exclusão')));

        // Verifique se os dados do patrimônio foram obtidos corretamente antes de prosseguir
        if ($dados_patrimonio) {
            // Prepare os dados para inserção na tabela wp_historico
            $historico_data = array(
                'id_patrimonio' => $dados_patrimonio['id'],
                'patrimonioMec' => $dados_patrimonio['patrimonioMec'],
                'patrimonioME' => $dados_patrimonio['patrimonioME'],
                'categoria' => $dados_patrimonio['categoria'],
                'tipo' => $dados_patrimonio['tipo'],
                'modelo' => $dados_patrimonio['modelo'],
                'marca' => $dados_patrimonio['marca'],
                'estadoFisico' => $dados_patrimonio['estadoFisico'],
                'situacao' => $dados_patrimonio['situacao'],
                'sala' => $dados_patrimonio['sala'],
                'coordenacao' => $dados_patrimonio['coordenacao'],
                'nomeResponsavel' => $dados_patrimonio['nomeResponsavel'],
                'siapeResponsavel' => $dados_patrimonio['siapeResponsavel'],
                'nomeUsuario' => $dados_patrimonio['nomeUsuario'],
                'siapeUsuario' => $dados_patrimonio['siapeUsuario'],
                'anexo' => $dados_patrimonio['anexo'],
                'observacao' => $dados_patrimonio['observacao'],
                'data' => current_time('mysql'),
                'tipoOperacao' => 'Exclusão', // Tipo de operação é "Deletado"
                'alteracao' => 'S', // Value to be set in the "alteracao" column
            );

            // Insira os dados do histórico na tabela wp_historico
            $wpdb->insert($tabela_historico, $historico_data);
        } else {
            // Se os dados do patrimônio não foram obtidos corretamente, envie uma resposta de erro
            wp_send_json(array('success' => false, 'message' => 'Não foi possível obter os dados do patrimônio. Tente novamente.'));
            return;
        }

        // Exclua o patrimônio com base no ID fornecido
        $result = $wpdb->delete($tabela_patrimonio, array('id' => $patrimonio_id));

        if ($result !== false) {
            // Se a exclusão for bem-sucedida, envie a resposta JSON de volta ao cliente
            wp_send_json(array('success' => true));
        } else {
            // Se ocorrer algum erro, envie uma resposta de erro
            wp_send_json(array('success' => false, 'message' => 'Não foi possível deletar o patrimônio. Tente novamente.'));
        }
    } else {
        // Se o ID do patrimônio não estiver presente, envie uma resposta de erro
        wp_send_json(array('success' => false, 'message' => 'Nenhum ID de patrimônio fornecido.'));
    }
}
?>


<?php

// Função para buscar o histórico com base no ID da linha
add_action('wp_ajax_exibir_historico', 'exibir_historico');
add_action('wp_ajax_nopriv_exibir_historico', 'exibir_historico');

function exibir_historico() {
    
    global $wpdb;
    $tabela_historico = $wpdb->prefix . 'historico'; 

      // Verifique se o ID da linha foi fornecido
    if (isset($_POST['linha_id'])) {
        $idLinha = sanitize_text_field($_POST['linha_id']);

        // Consulta SQL para obter apenas as linhas com o ID correspondente
        $query = $wpdb->prepare(
            "SELECT patrimonioMec, patrimonioME, categoria, tipo, modelo, marca, estadoFisico, situacao, sala, coordenacao, setor, nomeResponsavel, siapeResponsavel, nomeUsuario, siapeUsuario, anexo, observacao, data FROM $tabela_historico WHERE id = %d",
            $idLinha
        );
        $resultado2 = $wpdb->get_results($query, ARRAY_A);

        // Construa o HTML para exibir o histórico
        $html = '<div style="text-align: center;" "class="historico-container"></br>';
        $html .= '<h3>Histórico de Movimentações</h3></br>';
        $html .= '<table id="historicoTabela" class="historico-tabela">';
        $html .= '<thead><tr>';
        $html .= '<th><input type="checkbox" class="linhaCheckbox"</th>';
        $html .= '<th>Patrimônio MEC</th>';
        $html .= '<th>Patrimônio ME</th>';
        $html .= '<th>Categoria</th>';
        $html .= '<th>Tipo</th>';
        $html .= '<th>Modelo</th>';
        $html .= '<th>Marca</th>';
        $html .= '<th>Estado Físico</th>';
        $html .= '<th>Situação</th>';
        $html .= '<th>Sala</th>';
        $html .= '<th>Coordenação</th>';
        $html .= '<th>Setor</th>';
        $html .= '<th>Nome Responsável</th>';
        $html .= '<th>Siape Responsável</th>';
        $html .= '<th>Nome Usuário</th>';
        $html .= '<th>Siape Usuário</th>';
        $html .= '<th>Anexo</th>';
        $html .= '<th>Observação</th>';
        $html .= '<th>Data Alteração</th>';
        $html .= '</tr></thead>';
        $html .= '<tbody>';

        foreach ($resultado2 as $valor) {
            $html .= '<tr>';
            $html .= '<td><input type="checkbox" class="linhaCheckbox"</td>';
            $html .= '<td class="line">' . $valor['patrimonioMec'] . '</td>';
            $html .= '<td class="line">' . $valor['patrimonioME'] . '</td>';
            $html .= '<td class="line">' . $valor['categoria'] . '</td>';
            $html .= '<td class="line">' . $valor['tipo'] . '</td>';
            $html .= '<td class="line">' . $valor['modelo'] . '</td>';
            $html .= '<td class="line">' . $valor['marca'] . '</td>';
            $html .= '<td class="line">' . $valor['estadoFisico'] . '</td>';
            $html .= '<td class="line">' . $valor['situacao'] . '</td>';
            $html .= '<td class="line">' . $valor['sala'] . '</td>';
            $html .= '<td class="line">' . $valor['coordenacao'] . '</td>';
            $html .= '<td class="line">' . $valor['setor'] . '</td>';
            $html .= '<td class="line">' . $valor['nomeResponsavel'] . '</td>';
            $html .= '<td class="line">' . $valor['siapeResponsavel'] . '</td>';
            $html .= '<td class="line">' . $valor['nomeUsuario'] . '</td>';
            $html .= '<td class="line">' . $valor['siapeUsuario'] . '</td>';
            $html .= '<td class="line">';
            if (!empty($valor['anexo'])) {
                $html .= '<a href="http://localhost:8080/inventariospo/wp-content/themes/astra-child/download.php?path=' . urlencode($valor['anexo']) . '" class="fa fa-download icon-link" title="Baixar"></a>';
            } else {
                $html .= 'Não';
            }
            $html .= '</td>';
            $html .= '<td class="line">';
            if (!empty($valor['observacao'])) {
                $html .= 'sim';
            } else {
                $html .= 'Não';
            }
            $html .= '<td class="line">' . $valor['data'] . '</td>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';
        $html .= '<p>Total de ' . count($resultado2) . ' movimentações referentes à pesquisa</p>';
        $html .= '</div>';

        // Retorna o histórico como resposta da requisição AJAX
        wp_send_json_success($html);
    }

    wp_die();
}

?>


<?php
/*
// Inclua o arquivo do PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera o e-mail digitado pelo usuário
    $email = $_POST["emailCadastro"];
    // Saída para depuração - verifique se o email foi recebido corretamente
    echo "E-mail recebido: " . $email . "<br>";

    // Verifica se o e-mail foi preenchido corretamente
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // E-mail inválido, exibir alerta de erro
        echo json_encode(array("message" => "Por favor, insira um e-mail válido."));
    } else {
        //Conexão alternativa do banco de dados - Atribuindo as variáveis
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $db = "inventario";

        $mysqli = new mysqli($hostname, $username, $password, $db);

        // Verifica se a conexão foi bem sucedida
        if ($mysqli->connect_error) {
            die(json_encode(array("message" => "Erro na conexão com o banco de dados: " . $mysqli->connect_error)));
        }

        // Usar prepared statements para evitar ataques de injeção de SQL
        $stmt = $mysqli->prepare("SELECT * FROM wp_usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // O e-mail existe no banco de dados

            // Gerar um link único para redefinir a senha
            $token = md5(uniqid(rand(), true));

            // Salvar o token no banco de dados associado ao usuário
            $stmt = $mysqli->prepare("SELECT * FROM wp_usuarios WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // Fechar a conexão com o banco de dados
            $stmt->close();
            $mysqli->close();

            // Configurar o PHPMailer
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; // Servidor SMTP do Outlook da Microsoft
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = ''; // Seu e-mail corporativo do Outlook
            $mail->Password = ''; // Sua senha do e-mail corporativo do Outlook

            // Configurar o remetente e destinatário
            $mail->setFrom('juliodamasio@mec.gov.br', 'Julio Damasio'); // Substitua pelo seu e-mail corporativo e nome
            $mail->addAddress($email); // E-mail do destinatário

            // Obter a URL da página de redefinição de senha
            
           
            $redefinirSenhaURL = get_permalink(get_page_by_path('redefinir-senha'));

            // Configurar o assunto e o corpo do e-mail com o link para a página de redefinição de senha
            $mail->Subject = 'Redefinir Senha - Inventário SPO';
            $mail->Body = "Você solicitou a redefinição de senha. Clique no link abaixo para redefinir sua senha:
            $redefinirSenhaURL?token=$token";

            // Exemplo de resposta do servidor em JSON
            if ($mail->send()) {
                echo json_encode(array("message" => "Um link para redefinir sua senha foi enviado para o e-mail fornecido."));
            } else {
                echo json_encode(array("message" => "Erro ao enviar o e-mail. Por favor, tente novamente mais tarde."));
            }
        } else {
            // O e-mail não existe no banco de dados, exibir alerta de erro
            echo json_encode(array("message" => "O e-mail fornecido não está cadastrado."));
        }
    }
}*/
?>


<?php //Cadastro Usuário 
/*
//Conexão com o banco via variável Global do Wordpress
$tabela_cadastro = $wpdb->prefix. 'usuarios';

//verificar Botão de Adicionar e Campos Obrigatórios
if(!empty($_POST['Cadastrar'])){
    if(!empty($_POST['sobreNomeCadastro']) && !empty($_POST['nomeCadastro']) && !empty($_POST['emailCadastro']) && !empty($_POST['senhaCadastro'])){
        
        //Método post para inserção de dados
        $nome = sanitize_text_field($_POST['nomeCadastro']);
        $sobrenome = sanitize_text_field($_POST['sobreNomeCadastro']);
        $email = sanitize_email($_POST['emailCadastro']);
        $senha = sanitize_text_field($_POST['senhaCadastro']);
        
        // Criptografar a senha usando password_hash
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $data = date('Y-m-d H:m:s');

        // Verificar se o email já está cadastrado
        $email_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $tabela_cadastro WHERE email = %s", $email));

        if ($email_exists) {
            echo '<script>alert("O email já está cadastrado. Por favor, utilize um email diferente.");</script>';
        } else {
            // Comando de inserção via variável Global do Wordpress 
            if ($wpdb->insert($tabela_cadastro, array(
                'nome' => $nome,
                'sobrenome' => $sobrenome,
                'email' => $email,
                'senha' => $senhaCriptografada,
                'datacadastro' => $data,
            ))) {
                echo '<script>alert("Usuário cadastrado com sucesso!"); window.location.href = "http://localhost:8080/inventariospo/";</script>';
                // Limpar campos do formulário
                $_POST['nomeCadastro'] = '';
                $_POST['sobreNomeCadastro'] = '';
                $_POST['emailCadastro'] = '';
                $_POST['senhaCadastro'] = '';
            } else {
                echo '<script>alert("Erro ao cadastrar o usuário. Tente novamente.");</script>';
            }
        }
    }
}
*/
?>


<?php //addServidor

	//Conexão com o banco via variável Global do Wordpress
	$tabela_nome = $wpdb->prefix. 'servidores';	

	//verirficar Botão de Adicionar e Campos Obrigatórios
	if(!empty($_POST['addServidor'])){
		if(!empty($_POST['nome']) AND !empty($_POST['email']) AND !empty($_POST['siape'])){
			
			//Método post para inserção de dados
			$nome = sanitize_text_field($_POST['nome']);
			$email = sanitize_text_field($_POST['email']);
			$siape = sanitize_text_field($_POST['siape']);

			//Conexão com o banco via variável Global do Wordpress
			global $wpdb;

			//Comando de inserção via variável Global do Wordpress 
			$wpdb->insert($tabela_nome, array(
				'nome' => $nome,
				'email' => $email,
				'siape' => $siape,

			));

			//validação de adição
			if($tabela_nome){
				echo 'Servidor adicionado com sucesso';
				header('Location: ' . $_SERVER['REQUEST_URI']);
				exit;
			}else{
				echo 'Erro ao inserir os dados, tente novamente';
			}
			
		}else{
			echo 'Todos os campos são obrigatórios';
		} 
	}
?>

<?php
$tabela_patrimonio = $wpdb->prefix . 'patrimonio';

require_once __DIR__ . '/vendor/autoload.php';

if (!empty($_POST['addItem'])) {
    if (!empty($_POST['siapeResponsavel'])) {

        // Obtenha os valores dos campos do formulário
        $patrimonioMec = !empty($_POST['patrimonioMec']) ? sanitize_text_field($_POST['patrimonioMec']) : '0';
        $patrimonioME = !empty($_POST['patrimonioME']) ? sanitize_text_field($_POST['patrimonioME']) : '0';
        $categoria = !empty($_POST['categoria']) ? sanitize_text_field($_POST['categoria']) : 'NT';
        $tipo = !empty($_POST['tipo']) ? sanitize_text_field($_POST['tipo']) : 'NT';
        $modelo = !empty($_POST['modelo']) ? sanitize_text_field($_POST['modelo']) : 'NT';
        $marca = !empty($_POST['marca']) ? sanitize_text_field($_POST['marca']) : 'NT';
        $estadoFisico = !empty($_POST['estadoFisico']) ? sanitize_text_field($_POST['estadoFisico']) : 'NT';
        $situacao = !empty($_POST['situacao']) ? sanitize_text_field($_POST['situacao']) : 'NT';
        $sala = !empty($_POST['sala']) ? sanitize_text_field($_POST['sala']) : '0';
        $coordenacao = !empty($_POST['coordenacao']) ? sanitize_text_field($_POST['coordenacao']) : 'NT';
        $setor = !empty($_POST['setor']) ? sanitize_text_field($_POST['setor']) : 'NT';
        $nomeResponsavel = !empty($_POST['nomeResponsavel']) ? sanitize_text_field($_POST['nomeResponsavel']) : 'NT';
        $siapeResponsavel = !empty($_POST['siapeResponsavel']) ? sanitize_text_field($_POST['siapeResponsavel']) : '0';
        $nomeUsuario = !empty($_POST['nomeUsuario']) ? sanitize_text_field($_POST['nomeUsuario']) : 'NT';
        $siapeUsuario = !empty($_POST['siapeUsuario']) ? sanitize_text_field($_POST['siapeUsuario']) : '0';
        $observacao = !empty($_POST['observacao']) ? sanitize_text_field($_POST['observacao']) : '';
        $descricao = !empty($_POST['descricao']) ? sanitize_text_field($_POST['descricao']) : '';
        
        // Verifique se foram enviados arquivos
        if (!empty($_FILES['anexo']['name'][0])) {
            $anexos = $_FILES['anexo'];

            // Pasta para salvar os arquivos
            $pastaDestino = 'C:\xampp\htdocs\inventariospo\wp-content\themes\astra-child\arquivos\uploads';

            // Array para armazenar os caminhos dos arquivos
            $caminhosAnexos = array();

            // Loop através dos arquivos enviados
            foreach ($anexos['name'] as $index => $name) {
                // Verifique se um arquivo foi enviado
                if (!empty($name)) {
                    $tmpName = $anexos['tmp_name'][$index];
                    $originalName = $name;

                    // Gere um novo nome para o arquivo para evitar conflitos de nomes
                    $novoNome = uniqid() . '_' . $originalName;

                    // Caminho completo do arquivo na pasta de destino
                    $caminhoCompletoAnexo = $pastaDestino . '\\' . $novoNome;

                    // Mova o arquivo para a pasta de destino
                    move_uploaded_file($tmpName, $caminhoCompletoAnexo);

                    // Adicione o caminho do arquivo ao array
                    $caminhosAnexos[] = $caminhoCompletoAnexo;
                }
            }

            // Concatene os caminhos dos arquivos em uma única string separada por vírgulas
            $caminhosAnexosString = implode(',', $caminhosAnexos);
        } else {
            // Se não houver anexos, defina o caminho dos anexos como vazio
            $caminhosAnexosString = '';
        }
      // Verifique se foi enviada uma imagem
        if (!empty($_FILES['imagem']['name'])) {
            $imagens = $_FILES['imagem'];

            // Pasta para salvar as imagens
            $pastaDestinoImagens = 'C:\xampp\htdocs\inventariospo\wp-content\themes\astra-child\imagens';

            // Array para armazenar os caminhos das imagens
            $caminhosImagens = array();

            // Extensões permitidas
            $extensoesPermitidas = array('jpg', 'jpeg', 'png');

            // Loop através das imagens enviadas
            foreach ($imagens['name'] as $index => $name) {
                // Verifique se um arquivo foi enviado
                if (!empty($name)) {
                    $tmpName = $imagens['tmp_name'][$index];
                    $originalName = $name;
                    $extensao = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

                    // Verifique se a extensão é permitida
                    if (in_array($extensao, $extensoesPermitidas)) {
                        // Gere um novo nome para a imagem para evitar conflitos de nomes
                        $novoNome = uniqid() . '_' . $originalName;

                        // Caminho completo da imagem na pasta de destino
                        $caminhoCompletoImagem = $pastaDestinoImagens . '\\' . $novoNome;

                        // Mova a imagem para a pasta de destino
                        move_uploaded_file($tmpName, $caminhoCompletoImagem);

                        // Adicione o caminho da imagem ao array
                        $caminhosImagens[] = $caminhoCompletoImagem;
                    }
                }
            }

            // Concatene os caminhos das imagens em uma única string separada por vírgulas
            $caminhosImagensString = implode(',', $caminhosImagens);
        } else {
            // Se não houver imagens, defina o caminho das imagens como vazio
            $caminhosImagensString = '';
        }

        // Prepare o comando SQL para inserir os caminhos dos arquivos na tabela
        $sql = $wpdb->prepare(
            "UPDATE $tabela_patrimonio SET anexo = %s, observacao = %s WHERE patrimonioMec = %s",
            $caminhosAnexosString,
            $patrimonioMec,
            $caminhosImagensString,
        );

        // Execute o comando SQL
        $wpdb->query($sql);

        // Insira o conteúdo do arquivo no banco de dados
        $result = $wpdb->insert($tabela_patrimonio, array(
            'patrimonioMec' => $patrimonioMec !== '' ? $patrimonioMec : null,
            'patrimonioME' => $patrimonioME !== '' ? $patrimonioME : null,
            'categoria' => $categoria,
            'tipo' => $tipo,
            'modelo' => $modelo,
            'marca' => $marca,
            'estadoFisico' => $estadoFisico,
            'situacao' => $situacao,
            'sala' => $sala,
            'coordenacao' => $coordenacao,
            'setor' => $setor,
            'nomeResponsavel' => $nomeResponsavel,
            'siapeResponsavel' => $siapeResponsavel,
            'nomeUsuario' => $nomeUsuario,
            'siapeUsuario' => $siapeUsuario !== '' ? $siapeUsuario : null,
            'anexo' => $caminhosAnexosString,
            'observacao' => $observacao,
            'imagem' => $caminhosImagensString,
            'alteracao' => 'N', // Valor inicial da coluna "alteração"
            'descricao' => $descricao,
        ));

        // Verifique se a inserção foi bem-sucedida
        if ($result !== false) {
            echo '<script>alert("Patrimônio adicionado com sucesso"); window.location.href = "'.$_SERVER['REQUEST_URI'].'";</script>';
            exit;
        } else {
            echo '<script>alert("Não foi possível efetuar a adição, verifique os dados e tente novamente");</script>';
        }
    }
}
?>


<?php // deletar servidor

// Add the AJAX URL to the JavaScript
add_action('wp_enqueue_scripts', 'add_ajax_url_to_js');
function add_ajax_url_to_js()
{
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);

    // Define the AJAX URL
    wp_localize_script('custom-js', 'custom_js_vars', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}

// Função para deletar os servidores no banco de dados
add_action('wp_ajax_deletar_servidores', 'deletar_servidores');
add_action('wp_ajax_nopriv_deletar_servidores', 'deletar_servidores');

function deletar_servidores()
{
    // Verifique se o array não está vazio para evitar erros
    if (!empty($_POST['siape_array'])) {
        //Conexão com o banco via variável Global do Wordpress
        global $wpdb;

        // Obter os SIAPEs dos servidores para deletar
        $siape_array = $_POST['siape_array'];

        // Construa o formato de placeholders (?, ?, ?) para a cláusula IN do SQL
        $placeholders = array_fill(0, count($siape_array), '%s');
        $placeholders = implode(', ', $placeholders);

        // Prepara os SIAPEs para serem inseridos no SQL de forma segura
        $siape_args = array_map('sanitize_text_field', $siape_array);

        // Comando para deletar os dados referentes aos servidores da tabela servidores
        $deletar_servidores = $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->prefix}servidores WHERE siape IN ($placeholders)",
                $siape_args
            )
        );

        // Placeholder para os siape da consulta
        $siape_placeholder = implode(', ', array_fill(0, count($siape_array), '%s'));

        // Atualizar os dados correspondentes na tabela wp_patrimonio
        if ($deletar_servidores) {
            // Percorrer as linhas da tabela wp_patrimonio
            $atualizar_patrimonio = $wpdb->query(
                $wpdb->prepare(
                    "UPDATE {$wpdb->prefix}patrimonio
                    SET nomeResponsavel = NULL, nomeUsuario = NULL,
                    siapeResponsavel = NULL, siapeUsuario = NULL
                    WHERE nomeResponsavel IN (SELECT DISTINCT nome FROM {$wpdb->prefix}servidores WHERE siape IN ($siape_placeholder))
                    OR nomeUsuario IN (SELECT DISTINCT nome FROM {$wpdb->prefix}servidores WHERE siape IN ($siape_placeholder))
                    OR siapeResponsavel IN ($siape_placeholder)
                    OR siapeUsuario IN ($siape_placeholder)",
                    ...$siape_args, ...$siape_args, ...$siape_args, ...$siape_args
                )
            );

            if ($atualizar_patrimonio !== false) {
                $response = array(
                    'success' => true,
                    'message' => 'Servidores removidos dos registros de servidores e patrimônio com sucesso.'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Ocorreu um erro ao remover servidores dos registros de patrimônio.'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'Ocorreu um erro ao deletar os servidores.'
            );
        }
    
        // Return the response as JSON
        wp_send_json($response);
    }
}
?>



<?php //editar servidor

$tabela_patrimonio = $wpdb->prefix . 'patrimonio';
$tabela_servidores = $wpdb->prefix . 'servidores';

add_action('wp_ajax_atualizar_dados', 'atualizar_dados_callback');
add_action('wp_ajax_nopriv_atualizar_dados', 'atualizar_dados_callback'); // Necessário se o usuário não estiver logado

function atualizar_dados_callback() {
    if (isset($_POST['id'], $_POST['nome'], $_POST['siape'])) {

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $siape = $_POST['siape'];

        global $wpdb;

        // Atualiza a tabela wp_servidores
        $wpdb->update(
            $wpdb->prefix . 'servidores',
            array('nome' => $nome, 'siape' => $siape),
            array('id' => $id)
        );

        // Atualiza a tabela wp_patrimonio onde nomeResponsavel ou siapeResponsavel ou nomeUsuario ou siapeUsuario sejam iguais ao nome ou siape antigo
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE {$wpdb->prefix}patrimonio
                SET nomeResponsavel = %s, siapeResponsavel = %s,
                nomeUsuario = %s, siapeUsuario = %s
                WHERE nomeResponsavel = %s OR siapeResponsavel = %s OR nomeUsuario = %s OR siapeUsuario = %s",
                $nome, $siape, $nome, $siape, $nome, $siape, $nome, $siape
            )
        );

       // Verifica se houve algum erro nas atualizações
       $erro = $wpdb->last_error;

       if (!empty($erro)) {
           echo 'error';
       } else {
           echo 'success';
       }
   } else {
       echo 'error';
   }

   wp_die(); // Importante para encerrar o script corretamente
}
?>


<?php //addPatrimonio

	// Adicionar novo endpoint para consulta de patrimônioMEC
	add_action('wp_ajax_verificar_patrimonio', 'verificar_patrimonio');
	add_action('wp_ajax_nopriv_verificar_patrimonio', 'verificar_patrimonio');

	function verificar_patrimonio() {
		// Verificar se o patrimônio já está cadastrado na tabela wp_patrimonio
		if (isset($_GET['patrimonio'])) {
			$patrimonio = sanitize_text_field($_GET['patrimonio']);
			$patrimonio_existe = false;

			// Consulta na tabela wp_patrimonio para verificar se o patrimônio já está cadastrado
			global $wpdb;
			$tabela_patrimonio = $wpdb->prefix . 'patrimonio';
			$resultado = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $tabela_patrimonio WHERE patrimonioMec = %s", $patrimonio));

			if ($resultado > 0) {
				$patrimonio_existe = true;
			}

			// Retorna a resposta em formato JSON
			echo json_encode(array('exists' => $patrimonio_existe));
		}

		wp_die();
	}

	// Adicionar novo endpoint para consulta de patrimônio ME
	add_action('wp_ajax_verificar_patrimonio_me', 'verificar_patrimonio_me');
	add_action('wp_ajax_nopriv_verificar_patrimonio_me', 'verificar_patrimonio_me');

	function verificar_patrimonio_me() {
		// Verificar se o patrimônio ME já está cadastrado na tabela wp_patrimonio_me
		if (isset($_GET['patrimonioME'])) {
			$patrimonioME = sanitize_text_field($_GET['patrimonioME']);
			$patrimonio_me_existe = false;

			// Consulta na tabela wp_patrimonio_me para verificar se o patrimônio ME já está cadastrado
			global $wpdb;
			$tabela_patrimonio_me = $wpdb->prefix . 'patrimonio_me';
			$resultado = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $tabela_patrimonio_me WHERE patrimonioME = %s", $patrimonioME));

			if ($resultado > 0) {
				$patrimonio_me_existe = true;
			}

			// Retorna a resposta em formato JSON
			echo json_encode(array('exists' => $patrimonio_me_existe));
		}

		wp_die();
	}
?>

<?php // exportar as tabelas em excel 
/// Função para buscar os dados no banco de dados e retornar em formato JSON
add_action('wp_ajax_exportar_excel', 'exportar_excel_callback');
add_action('wp_ajax_nopriv_exportar_excel', 'exportar_excel_callback'); // Permite que usuários não logados também usem o endpoint

function exportar_excel_callback() {
    // Verifica se os IDs das linhas foram fornecidos no $_POST
    if (isset($_POST['idsPatrimonio']) && isset($_POST['idsHistorico'])) {

    // Registra os IDs no log de erro do servidor
    error_log('IDs do Patrimônio: ' . implode(',', $_POST['idsPatrimonio']));
    error_log('IDs do Histórico: ' . implode(',', $_POST['idsHistorico']));


    global $wpdb;
    $tabela_patrimonio = $wpdb->prefix . 'patrimonio';
    $tabela_historico = $wpdb->prefix . 'historico';

    // Verifique se os IDs das linhas foram fornecidos
   
        $idsPatrimonio = $_POST['idsPatrimonio'];
        $idsHistorico = $_POST['idsHistorico'];

        

        // Consulta SQL para obter os dados do Patrimônio
        if (!empty($idsPatrimonio)) {
            $sqlPatrimonio = "SELECT * FROM $tabela_patrimonio WHERE id IN (" . implode(',', $idsPatrimonio) . ")";
            $resultPatrimonio = $wpdb->get_results($sqlPatrimonio, ARRAY_A);
        }

        // Consulta SQL para obter os dados do Histórico
        if (!empty($idsHistorico)) {
            $sqlHistorico = "SELECT * FROM $tabela_historico WHERE id IN (" . implode(',', $idsHistorico) . ")";
            $resultHistorico = $wpdb->get_results($sqlHistorico, ARRAY_A);
        }

        // Gera o arquivo Excel
        $data = array();
        if (!empty($resultPatrimonio)) {
            $data['patrimonio'] = $resultPatrimonio;
        }
        if (!empty($resultHistorico)) {
            $data['historico'] = $resultHistorico;
        }

        // Retorna os dados em formato JSON
        wp_send_json($data);
    } else {
        // Caso os parâmetros não sejam fornecidos, retorne uma resposta de erro
        wp_send_json_error('Parâmetros inválidos.');
    }
}

?>




<?php
//Conexão alternativa do bando de dados Atribuindo as variáveis
$hostname="localhost";  
$username="root";  
$password="";  
$db = "inventario";  

$mysql = new mysqli($hostname, $username, $password, $db);

// nova conexão para busca e preenchimento dos selects
$conexao = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);

	//Consulta SQL na Tabela Servidores Selecionando todos os dados da tabela por ordem do nome em ordem alfabética 
	$sqlnome = "SELECT * FROM wp_servidores GROUP BY nome ORDER BY nome ASC";
	
	//Retorno da coluna nome como array onde cada linha é um índice
	$resnome = $conexao->prepare($sqlnome);
	$resnome->execute();
	$nome = $resnome->fetchAll();

	//Retorno da coluna siape como array onde cada linha é um índice
	$ressiape = $conexao->prepare($sqlnome);
	$ressiape->execute();
	$siape = $ressiape->fetchAll();

    // Consulta SQL na Tabela Servidores, selecionando todos os dados da tabela por ordem do nome em ordem alfabética
    $sqlnome = "SELECT * FROM wp_servidores GROUP BY nome ORDER BY nome ASC";

    // Retorno da coluna nome e siape como um único array associativo onde o nome é a chave e o siape é o valor
    $resnome = $conexao->prepare($sqlnome);
    $resnome->execute();
    $servidores = $resnome->fetchAll(PDO::FETCH_ASSOC);

?>
