function hide_easy_svg_plugin() {
    ?>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const easySvgPluginRow = document.querySelector('#the-list tr[data-slug="easy-svg"]');
            if (easySvgPluginRow) {
                easySvgPluginRow.style.display = 'none';
            }
        });
    </script>
    <?php
}
add_action('admin_footer', 'hide_easy_svg_plugin');
