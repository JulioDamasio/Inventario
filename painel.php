<?php
/**
 * Template Name: Painel
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
    wp_redirect(home_url('/login/')); // Redireciona para a página de login
    exit; // Certifique-se de sair após redirecionar
}



get_header(); ?>
<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>
	<div id="primary" <?php astra_primary_class(); ?>>
    <?php include ("estilo.php"); ?>

    <h2 class="tituloPainel" style="margin-top: -50px;">Bem-Vindo ao Inventário, <?php echo $_SESSION['nome'] . ' ' . $_SESSION['sobrenome']; ?>!</h2>

    <div class="botoesContainer">
        <div class="coluna">
            <div class="botoesPainel">
                <a href="http://localhost:8080/inventariospo/patrimonios/" target="_blank" class="botaoPainel">Servidores</a>
                <a href="http://localhost:8080/inventariospo/servidores/" target="_blank" class="botaoPainel">Patrimônio</a>
                <a href="http://localhost:8080/inventariospo/consultas/" target="_blank" class="botaoPainel">Consultas</a>
            </div>
        </div>
        <div class="coluna">
            <div class="botoesPainel">
                <a href="http://localhost:8080/phpmyadmin/index.php?route=/database/structure&db=inventario" target="_blank" class="botaoPainel">Banco de Dados</a>
                <a href="http://localhost:8080/inventariospo/wp-admin/" target="_blank" class="botaoPainel">Administrador</a>
                <a href="http://localhost:8080/inventariospo/wp-content/themes/astra-child/manual-inventario-spo.docx" download class="botaoPainel">Dicas e Instruções</a>
            </div>
        </div>
    </div>
    <?php include ("scripts.php"); ?>
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