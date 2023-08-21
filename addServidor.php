<?php
/**
 * Template name: Adicionar Servidor
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

    $tabela_nome = $wpdb ->prefix. 'servidores';

    $resultado = $wpdb->get_results("SELECT * FROM $tabela_nome ORDER BY nome ASC");


get_header()?>
<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include ("estilo.php"); ?>


    <form id="formularioAtualizacao" class="formulario" method="POST">
            <h2 class="titulo">Adicionar Colaborador</h2>
                    
            <div class="field">
                <label for="nome">Nome do Servidor:</label>
                <input type="text" id="nome" name="nome"  placeholder="Digite o nome*" required onblur="padronizar(this)">
            </div>
                    
            <div class="field">
                <label for="email">E-mail do Servidor:</label>
                <input type="email" id="email" name="email"  placeholder="Digite o E-mail*" required>
            </div>
            
            <div class="field">
                <label for="siape">SIAPE do Servidor:</label>
                <input type="number" id="siape"  name="siape"  placeholder="Digite o SIAPE*" required >             
            </div>

            <div style="text-align: center;">
                <input class="adicionarServidor" type="submit" name="addServidor" value="Adicionar" id="adicionarServidor">
                <input class="salvar hidden" type="submit" name="salvar" value="Salvar Alterações" id="salvarAlteracoes2">
                <button id="cancelar" class="hidden">Cancelar</button>
            </div> </br>        
    </form> 

    <div class="lista">
        <div class="listaServidores">
            <h2 class="titulo">Colaboradores Cadastrados</h2> </br>
            <table class="historico-tabela">
                <thead>
                    <tr class="headTable">
                        <th scope="col"></th>
                        <th scope="col" style="display: none;">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Siape</th>
                    </tr>
                </thead>
                <tbody>
    <?php foreach ($resultado as $key => $valor): ?>                 
                    <tr>
                        <td scope="row"><input type="checkbox" class="linhaCheckbox"></th>
                        <td scope="row" style=" display: none;"><?php echo $valor->id;?></td>
                        <td scope="row"><?php echo $valor->nome;?></td>
                        <td scope="row"><?php echo $valor->email;?></td>
                        <td scope="row"><?php echo $valor->siape;?></td>     
                    </tr>
    <?php endforeach ?>                    
                </tbody> 
            </table>

            <div class="pagination">
                <button class="page-prev custom-button" disabled>&lt;</button>
                    <span class="page-number"></span>
                <button class="page-next custom-button">&gt;</button>
            </div></br>


            <div style="text-align: center;">
                <input id="editar" class="hidden" type="submit" name="editar" value="Editar">
                <input id="deletar" class="hidden" type="submit" name="deletar" value="Deletar">
            </div>
              
        </div> 

        <?php include ("scriptsServidor.php"); ?>
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

endif ?>
        
<?php

get_footer()?>

