<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid text-center">
            <img src="/wp-content/themes/rightbrained/images/footer-logo.png" alt="Right Brained Logo" width="226" height="130" style="max-width:226px;max-height:130px;">
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>

