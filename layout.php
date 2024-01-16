<!DOCTYPE html>
<html lang="en">
    <head>
    
        <?php

        wp_head();
    // ob_start();
    // wp_head();
    // $wp_head_content = ob_get_clean();
    // // Uncomment the line below for debugging
    // // echo $wp_head_content;
    
    // // Use a more specific regex pattern
    // $output = preg_replace('/<title/', '<title inertia', $wp_head_content);
    // //$output = preg_replace('/<meta\b(.*?)>/', '<meta inertia $1>', $wp_head_content);

    // echo $output;
?>

    </head>
    <body class="overflow-y-scroll">
        <?php bb_inject_inertia(); ?>
        <?php wp_footer(); ?>
    </body>
</html>
