function hide_elementor_loader_script() {
    ?>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const loader = document.getElementById("elementor-panel-state-loading");
            if (loader) {
                loader.style.display = "none";
            }
        });
    </script>
    <?php
}
add_action('elementor/editor/after_enqueue_scripts', 'hide_elementor_loader_script');


https://chatgpt.com/c/671e9429-1660-800e-bac6-59636866d948
