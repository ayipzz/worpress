<!-- Footer -->
    <footer>
        <div class="container footers">
        <div class="row">
            <?php dynamic_sidebar( 'footer-widget' ); ?>
            <?php dynamic_sidebar( 'footer-social-widget' ); ?>
        </div>
    </div>
    <div class="container">
        <div class="copy">
            <p>mino theme by <a href="">tonjo studio</a> &copy;  <?php echo date("Y"); ?></p>
        </div>
        
    </div>
    </footer>
    <?php wp_footer();?>
</body>
</html>