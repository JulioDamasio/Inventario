
<?php
/**
 * Template Name: Login
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (isset($_POST['user']) || isset($_POST['senha'])) {
    if (strlen($_POST['user']) == 0) {
        echo '<script>alert("Preencha seu Usuario");</script>';
    } else if (strlen($_POST['senha']) == 0) {
        echo '<script>alert("Preencha sua Senha");</script>';
    } else {
        $login = $_POST['user'];
        $senha = $_POST['senha']; 

        $stmt = $mysqli->prepare("SELECT * FROM wp_usuarios WHERE usuario = ? AND senha = ?");
        $stmt->bind_param("ss", $login, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Login bem-sucedido
            $usuario = $result->fetch_assoc();
        
            // Use as funções do WordPress para iniciar uma sessão
            if (!session_id()) {
                session_start();
            }
        
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['sobrenome'] = $usuario['sobrenome']; // Adicione esta linha para armazenar o sobrenome
        
            // Use a função wp_safe_redirect() para redirecionar corretamente no WordPress
            wp_safe_redirect(home_url('/painel/'));
            exit;
        } else {
            echo '<script>alert("Usuário ou Senha Incorretos!");</script>';
        }

        $stmt->close();
    }
}

get_header(); ?>
<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>
	<div id="primary" <?php astra_primary_class(); ?>>
    <?php include ("estilo.php"); ?>
    <?php include ("scripts.php"); ?>
    

        <form class="formularioLogin" action="" method="POST">

        <h1 class="tituloLogin">Inventário SPO</h1> </br>

        <div class="login">
            <label for="login">Login:</label> 
            <input value="Spo.admin" type="text" id="user" name="user"  placeholder="Digite o usuario" required>
        </div> 

        <div class="login">
            <label for="senha">Senha:</label> 
            <input type="password" id="senha" name="senha"  placeholder="Digite a Senha*" required>
        </div>
        
        <!--<div class="login" style="text-align: center;">
            <a href="http://localhost:8080/inventariospo/cadastro/">Cadastre-se</a> </br>
            <a href="http://localhost:8080/inventariospo/esqueceu-senha/" id="esqueciSenhaLink">Esqueci minha Senha</a>
        </div> -->

        <div>
            <button type="submit">Iniciar Sessão</button>
        </div>
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

