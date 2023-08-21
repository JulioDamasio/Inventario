<?php
/**
 * Template Name: Consultas
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra-child
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once('wp-load.php');

// Verificar se a sessão não foi iniciada e iniciá-la
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Redirecionar para a página de login ou exibir uma mensagem de erro
    header("location: login.php");
    exit; // Certifique-se de sair após redirecionar
}

// Verificar se a variável de sessão 'edit_success' está definida
if (isset($_SESSION['edit_success']) && $_SESSION['edit_success']) {
    echo '<script>alert("Edição realizada com sucesso. Os dados foram atualizados.");</script>';

    // Defina a variável de sessão 'edit_success' como false para que o alerta não seja exibido novamente após o próximo carregamento da página
    $_SESSION['edit_success'] = false;
}

global $wpdb;

    $tabela_patrimonio = $wpdb ->prefix. 'patrimonio';

    $resultado = $wpdb->get_results("SELECT * FROM $tabela_patrimonio");
   

get_header(); ?>
<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

    <div id="primary" <?php astra_primary_class(); ?>>

  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="http://localhost:8080/inventariospo/wp-content/themes/astra-child/sheetjs/xlsx.mini.js"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    
  
    <?php include ('estilo.php'); ?>

        <div id="zoomContainer">
            <form class="formularioConsulta" action="" method="GET">

            <h2 class="titulo" style="text-align: center;">Consulta aos Patrimónios</h2>

            <div class="field">

                <label>Consultar por:</label>
                    <select id="consultaPor" name="consultaPor" class="consultaPor">
                        <option value=""> </option>
                    </select>
                </div> </br>

                <div class="field" id="inputContainer"></div> </br>

                <div class="consultar" style="text-align: center;">
                    <input class="botaoConsultar" type="submit" name="Consultar" id="consultarButton" value="Consultar">
                </div> </br>
            </form>
        </div>

        <div id="listaPatrimonio" class="listaPatrimonio hidden">

            <h2 class="titulo hidden">Patrimónios Cadastrados</h2>

            <table id="tabelaPatrimonio" class="hidden">
                <thead>
                    <tr class="headTable">
                        <th scope="col"><input type="checkbox" class="linhaCheckbox"></th>
                        <th style="display: none;" class="idLinha" scope="col">Id</th>
                        <th scope="col">Patrimônio MEC</th>
                        <th scope="col">Patrimônio ME</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Estado Fisico</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Sala</th>
                        <th scope="col">Coordenação</th>
                        <th scope="col">Setor</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Siape Responsável</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Siape Usuário</th>
                        <th scope="col">Anexo</th>
                        <th scope="col">Observação</th>
                        <th scope="col">Imagem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $key => $valor): ?>

                        <tr>
                            <td scope="row"><input type="checkbox" class="linhaCheckbox"></td>
                            <td style="display: none;" class="idLinha" data-id="<?php echo $valor->id; ?>" scope="row"><?php echo $valor->id;?></td>
                            <td scope="row"><?php echo $valor->patrimonioMec;?></td>
                            <td scope="row"><?php echo $valor->patrimonioME;?></td>
                            <td scope="row"><?php echo $valor->categoria;?></td>
                            <td scope="row"><?php echo $valor->tipo;?></td>
                            <td scope="row"><?php echo $valor->modelo;?></td>
                            <td scope="row"><?php echo $valor->marca;?></td>
                            <td scope="row"><?php echo $valor->estadoFisico;?></td>
                            <td scope="row"><?php echo $valor->situacao;?></td>
                            <td scope="row"><?php echo $valor->sala;?></td>
                            <td scope="row"><?php echo $valor->coordenacao;?></td>
                            <td scope="row"><?php echo $valor->setor;?></td>
                            <td scope="row"><?php echo $valor->nomeResponsavel;?></td>
                            <td scope="row"><?php echo $valor->siapeResponsavel;?></td>
                            <td scope="row"><?php echo $valor->nomeUsuario;?></td>
                            <td scope="row"><?php echo $valor->siapeUsuario;?></td>
                            <td scope="row">
                                <?php if (!empty($valor->anexo)): ?>
                                    <a href="http://localhost:8080/inventariospo/wp-content/themes/astra-child/download.php?path=<?php echo urlencode($valor->anexo); ?>" class="fa fa-download icon-link" title="Baixar"></a>
                                <?php else: ?>
                                    Não
                                <?php endif; ?>
                                </td>
                            <td scope="row">
                                    <?php if (!empty($valor->observacao)): ?>
                                        <a href="javascript:void(0);" onclick="openObservation('<?php echo esc_js($valor->observacao); ?>')">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    <?php else: ?>
                                        Não
                                    <?php endif; ?>
                                </td>
                                <td style="display: none;" scope="row">
                                    <?php echo $valor->observacao; ?>
                                    <input type="hidden" name="observacao" value="<?php echo $valor->observacao; ?>">
                                </td>
                                <td scope="row">
                                    <?php if (!empty($valor->imagem)): ?>
                                        <a href="<?php echo esc_url(home_url('/')) . 'wp-content/themes/astra-child/imagens/' . basename($valor->imagem); ?>" target="_blank">
                                            <i class="image-preview" style="background-image: url('<?php echo esc_url(home_url('/')) . 'wp-content/themes/astra-child/imagens/' . basename($valor->imagem); ?>');"></i>
                                        </a>
                                    <?php else: ?>
                                        Não
                                    <?php endif; ?> 
                                </td>
                                <td style="display: none;" scope="row">
                                    <?php echo $valor->alteracao; ?>
                                    <input type="hidden" name="alteracao[]" value="<?php echo $valor->alteracao; ?>">
                                </td>
                                <td style="display: none;" scope="row">
                                    <?php echo $valor->descricao; ?>
                                    <input type="hidden" name="descricao" value="<?php echo $valor->descricao; ?>">
                                </td>  
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <div id="historicoContainer">
               
            </div>

            <div id="botoes" class="botoes" style="text-align: center;">
                <button id="exportarPDF" name="exportarPDF" class="hidden">Exportar em PDF</button>
                <button id="exportarExcel" name="exportarExcel" class="hidden">Exportar em Excel</button>
                <button id="editar" name="editar" class="hidden">Editar</button>
                <button id="historico" name="historico" class="hidden">Histórico</button>
                <button id="deletar" name="deletar"  class="hidden">Deletar</button>
            </div>                    
    </div>

<div id="linhaSelecionadaContainer"></div>

<div id="zoomContainer2" class="zoomContainer">

        <form id="editarPatrimonio" class="editarPatrimonio" method="POST" enctype="multipart/form-data">
                    
            <h2 class="tituloEditar" style="text-align: center;">Editar Patrimônio</h2> </br>
                    <div class="row">
                        <div class="field2">
                            <label for="patrimonioMec" >Patrimônio Mec:</label>
                                <input type="Number"id="patrimonioMec" name="patrimonioMec"  placeholder="Digite o Patrimônio*">
                        </div>
                        <div class="field2">
                            <label for="patrimonioME">Patrimônio ME:</label>
                                <input type="Number" id="patrimonioME" name="patrimonioME"  placeholder="Digite o Patrimônio*">
                        </div>
                        <div class="field2">
                            <label for="estadoFisico">Estado Físico:</label>
                                <select id="estadoFisico" name="estadoFisico" type="text">
                                    <option value="">Selecione*</option>
                                </select>
                        </div>
                    </div>
                    <div class="row">
                    <div class="field2">
                            <label for="situacao">Situação:</label>
                                <select id="situacao" name="situacao" type="text">
                                    <option value="" >Selecione*</option>
                                </select>
                        </div>
                        <div class="field2">
                                <label for="sala">Sala:</label>
                                <select id="sala" name="sala" type="text">
                                    <option value="" >Selecione*</option>
                                </select>
                            </div>
                            <div class="field2">
                                <label for="coordenacao">Coordenação:</label>
                                <select id="coordenacao" name="coordenacao" type="text">
                                    <option value="" >Selecione*</option>
                                </select> 
                            </div>
                    </div>   

                    <div class="row">
                    <div class="field2">
                                <label for="setor">Setor:</label>
                                    <select id="setor" name="setor" type="text">
                                        <option value="" >Selecione*</option>
                                    </select>
                            </div>
                        <div class="field2">
                                <label for="nomeResponsavel">Agente Consignatário:</label>
                                <select id="nomeResponsavel" name="nomeResponsavel" onchange="preencherSiapeResponsavel()" require>
                                    <option value="">Selecione**</option>
                                    <?php foreach ($nome as $row) { ?>
                                        <option value="<?php echo $row['nome'] ?>" data-siape="<?php echo $row['siape'] ?>"><?php echo $row['nome'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="field2">
                                <label for="siapeResponsavel">SIAPE do Responsável:</label>
                                    <input type="number" id="siapeResponsavel" name="siapeResponsavel" readonly>
                            </div>
                    </div> 

                    <div class="row">
                    <div class="field2">
                                <label for="nomeUsuario">Nome do Usuário:</label>
                                <select id="nomeUsuario" name="nomeUsuario" aria-placeholder="Selecione o Usuário" onchange="preencherSiapeUsuario()">
                                    <option value="">Selecione</option>
                                    <?php foreach ($nome as $row) { ?>
                                        <option value="<?php echo $row['nome'] ?>" data-siape="<?php echo $row['siape'] ?>"><?php echo $row['nome'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="field2">
                                <label for="siapeUsuario">SIAPE do Usuário:</label>
                                    <input type="number" id="siapeUsuario" name="siapeUsuario" readonly>
                            </div>
                            
                            <div class="field2">
                                <div style="display: inline-block; vertical-align: top; margin-right: 10px;">
                                    <label for="anexo">Anexo:</label>
                                    <div class="custom-file-input">
                                        <input type="file" id="anexo" name="anexo[]" multiple="multiple" enctype="multipart/form-data">
                                        <label for="anexo" id="anexo-label">Escolher Arquivos</label>
                                    </div>
                                </div>
                                <div style="display: inline-block; vertical-align: top;">
                                    <label for="imagem">Imagem:</label>
                                    <div class="custom-file-input">
                                        <input type="file" id="imagem" name="imagem[]" multiple="multiple" enctype="multipart/form-data">
                                        <label for="imagem" id="imagem-label">Escolher Arquivo</label>
                                    </div>
                                </div>
                            </div>


                            <div class="field2 id-field">
                                <input type="hidden" name="id" id="id" value="<?php echo $valor->id; ?>">
                            </div>
                    </div>
                    
                    <div class="row">
                        <div class="textarea-container">
                            <div class="field">
                                <label>Observação:</label>
                                <textarea id="observacao" name="observacao" type="text" placeholder="Digite aqui a observação..." maxlength="" onkeyup="updateCount()"></textarea>
                                <div id="count">
                                    00 Caracteres
                                </div>
                            </div>
                        </div>

                        <div class="textarea-container">
                            <div class="field">
                                <label>Descrição:</label>
                                <textarea id="descricao" name="descricao" type="text" placeholder="Digite aqui a descrição..." maxlength="" onkeyup="updateCount2()"></textarea>
                                <div id="count2">
                                    00 Caracteres 
                                </div>
                            </div>
                        </div>
                    </div>

                        <div style="text-align: center;">
                            <input class="salvarAlteracoes" type="submit" name="salvarAlteracoes" id="salvarAlteracoes" value="Salvar Alterações">
                            <input class="cancelar" href="wp-content/themes/astra-child/consultas.php" type="submit" name="cancelar" id="cancelar" value="Cancelar"> 
                        </div></br>
                </form>    
</div>
        <?php include ('scriptsConsultas.php'); ?>

<?php
		astra_primary_content_top();

		astra_content_loop();

		astra_pagination();

		astra_primary_content_bottom();
		?>
	</div><!-- #primary -->
<?php
if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;

get_footer();


/*<?php
                            $descricao = 'Pertence a ' . (isset($valor->categoria) ? $valor->categoria . ', é um(a) ' : 'não tem Categoria - ')
                              . (isset($valor->tipo) ? $valor->tipo . ', ' : 'não tem Tipo - ')
                              . (isset($valor->Modelo) ? $valor->Modelo . ', da marca ' : 'não tem Modelo, ')
                              . (isset($valor->marca) ? $valor->marca . ', esta ' : 'não tem Marca, está ')
                              . (isset($valor->estadoFisico) ? $valor->estadoFisico . ' e ' : ', não tem Estado Físico e está')
                              . (isset($valor->situacao) ? $valor->situacao . ' ' : ', não tem Estado Físico e está');
                            echo $descricao;
                          ?>*/