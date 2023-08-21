<?php
/**
 * Template name: Adicionar Patrimônio
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

global $wpdb;


get_header()?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php include("estilo.php"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <form id="adicionarPatrimonio" class="formulario" method="POST" enctype="multipart/form-data" >
            <h2 class="titulo"> Adicionar Patrimônio</h2>
                <div class="column-container">
                <div class="column">
                <div class="field">
                        <label for="temPatrimonio">Tem Patrimônio MEC?</label>
                            <select id="temPatrimonio" name="temPatrimonio" type="text" require>
                                <option value="" selected disabled >Selecione*</option>
                            </select>
                    </div>
                    
                    <div class="field">
                        <label for="patrimonioMec" style="display: none;">Patrimônio Mec:</label>
                            <input type="Number" style="display: none;" id="patrimonioMec" name="patrimonioMec"  placeholder="Digite o Patrimônio*">
                                <div class="verificarButton">
                                    <button id="verificarPatrimonio" class="verirficarPatrimonio" name="verificarPatrimonio" style="display: none;" >Verificar</button>
                                </div> 
                    </div>

                    <div class="field">
                        <label for="temPatrimonioME">Tem Patrimônio ME?</label>
                            <select id="temPatrimonioME" name="temPatrimonioME" type="text" require>
                                <option value="" selected disabled >Selecione*</option>
                            </select>
                    </div>

                    <div class="field">
                        <label for="patrimonioME" style="display: none;">Patrimônio ME:</label>
                            <input type="Number" style="display: none;" id="patrimonioME" name="patrimonioME"  placeholder="Digite o Patrimônio*">
                            <div class="verificarButton">
                                <button id="verificarPatrimonioME" class="verificarPatrimonioME" name="verificarPatrimonioME" style="display: none;">Verificar</button>
                            </div>    
                    </div>
                    
                    <div class="field">
                        <label for="categoria">Categoria:</label>
                            <select id="categoria" name="categoria" type="text" required>
                                <option value="" >Selecione*</option>
                            </select>
                    </div>

                    <div class="field">
                        <label for="tipo">Tipo:</label>
                            <select id="tipo" name="tipo" type="text" style="display: none;">
                                <option value="" >Selecione*</option>
                            </select>
                    </div>

                    <div class="field">
                        <label for="modelo">Modelo:</label>
                            <select id="modelo" name="modelo" type="text" style="display: none;">
                                <option value="" >Selecione*</option>
                            </select>
                    </div>

                    <div class="field">
                        <label for="marca">Marca:</label>
                            <select id="marca" name="marca" type="text">
                                <option value="">Selecione</option>
                            </select>
                    </div>
                    <div class="field">
                            <label for="estadoFisico">Estado Físico:</label>
                                <select id="estadoFisico" name="estadoFisico" type="text" required>
                                    <option value="">Selecione*</option>
                                </select>
                        </div>

                        <div class="field">
                            <label for="situacao">Situação:</label>
                                <select id="situacao" name="situacao" type="text" required>
                                    <option value="" >Selecione*</option>
                                </select>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="field">
                                    <label for="anexo">Anexo:</label>
                                    <div class="custom-file-input">
                                        <input type="file" id="anexo" name="anexo[]" multiple="multiple" enctype="multipart/form-data">
                                        <label for="anexo" id="anexo-label">Escolher Arquivos</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="field">
                                    <label for="imagem">Imagem:</label>
                                    <div class="custom-file-input">
                                        <input type="file" id="imagem" name="imagem[]" multiple="multiple" enctype="multipart/form-data">
                                        <label for="imagem" id="imagem-label">Escolher Arquivo</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                <div class="column">
                    
                        <div class="field">
                            <label for="sala">Sala:</label>
                            <select id="sala" name="sala" type="text" required>
                                <option value="" >Selecione*</option>
                            </select>
                        </div>

                        <div class="field">
                            <label for="coordenacao">Coordenação:</label>
                            <select id="coordenacao" name="coordenacao" type="text" required>
                                <option value="" >Selecione*</option>
                            </select> 
                        </div>

                        <div class="field">
                            <label for="setor">Setor:</label>
                                <select id="setor" name="setor" type="text" required>
                                    <option value="" >Selecione*</option>
                                </select>
                        </div>

                        <div class="field">
                            <label for="nomeResponsavel">Agente Consignatário:</label>
                            <select id="nomeResponsavel" name="nomeResponsavel" onchange="preencherSiapeResponsavel()" require>
                                <option value="">Selecione**</option>
                                <?php foreach ($nome as $row) { ?>
                                    <option value="<?php echo $row['nome'] ?>" data-siape="<?php echo $row['siape'] ?>"><?php echo $row['nome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <div class="field">
                            <label for="siapeResponsavel">SIAPE do Responsável:</label>
                                <input type="number" id="siapeResponsavel" name="siapeResponsavel" readonly>
                        </div>

                        <div class="field">
                            <label for="nomeUsuario">Nome do Usuário:</label>
                            <select id="nomeUsuario" name="nomeUsuario" aria-placeholder="Selecione o Usuário" onchange="preencherSiapeUsuario()">
                                <option value="">Selecione</option>
                                <?php foreach ($nome as $row) { ?>
                                    <option value="<?php echo $row['nome'] ?>" data-siape="<?php echo $row['siape'] ?>"><?php echo $row['nome'] ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="field">
                            <label for="siapeUsuario">SIAPE do Usuário:</label>
                                <input type="number" id="siapeUsuario" name="siapeUsuario" readonly>
                        </div>
                    </div>
                </div>    
                
                <div class="textos">
                    <div class="textarea-container">
                        <div class="field">
                            <label>Observação:</label>
                            <textarea id="observacao" name="observacao" type="text" placeholder="Digite aqui a observação..." maxlength="500" onkeyup="updateCount()"></textarea>
                            <div id="count">
                                00 Caracteres
                            </div>
                        </div>
                    </div>

                    <div class="textarea-container">
                        <div class="field">
                            <label>Descrição:</label>
                            <textarea id="descricao" name="descricao" type="text" placeholder="Digite aqui a descrição..." maxlength="500" onkeyup="updateCount2()"></textarea>
                            <div id="count2">
                                00 Caracteres
                            </div>
                        </div>
                    </div>
                </div>

                <div style="text-align: center;">
                    <input class="addItem " type="submit" name="addItem" id="addItem" value="Adicionar">
                </div></br>   
            </div>

               

                <?php include ("scripts.php"); ?>      
        </form>    
 
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

get_footer(); ?>
