<?php
/**
 * Template Name: Cadastro
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra-c:\Users\Spo\Desktop\astra-child\login.phpchild
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>
	<div id="primary" <?php astra_primary_class(); ?>>

   <?php include ('estilo.php') ?>
   <?php include ('scripts.php') ?>

    

<form class="formularioCadastro" action="" method="POST" onsubmit="return validarSenha();">

    <h2 class="tituloCadastro">Efetuar Cadastro</h2> </br>

        <div>
            <label for="nome">Nome:</label>
            <input name="nomeCadastro" id="nomeCadastro" class="nomeCadastro" type="text" placeholder="Digite seu Nome*" onblur="padronizar(this)">
        </div>

        <div>
            <label for="sobreNomeCadastro">Sobrenome:</label>
            <input name="sobreNomeCadastro" id="sobreNomeCadastro" class="sobreNomeCadastro" type="text" placeholder="Digite seu Sobrenome*" onblur="padronizar(this)">
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input name="emailCadastro" value="@mec.gov.br" id="emailCadastro" class="emailCadastro" type="email">
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input name="senhaCadastro" id="senhaCadastro" class="senhaCadastro" type="password" placeholder="Digite sua Senha*">
        </div>

        <div>
            <label for="confirmarSenha">Confirme sua senha:</label>
            <input name="confirmarSenha" id="confirmarSenha" class="senha" type="password" placeholder="Confirme sua Senha*">
        </div> </br>
        
        <div>    
            <span id="mensagemErro" style="color: red;"></span>
        </div>

        <div style="text-align: center;">
            <input class="cadastrar" type="submit" name="Cadastrar" value="Cadastrar">
        </div> </br>

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

get_footer();
