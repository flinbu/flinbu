<?php
/*
 * CUSTOM GLOBAL VARIABLES
 */
function flinbu_global_vars() {
    global $device;
    $device = get_device();
}
add_action( 'parse_query', 'flinbu_global_vars' );
?>
