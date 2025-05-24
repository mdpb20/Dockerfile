<?php
/**
 * Must-use plugin to clear the core update lock
 */
// Solo ejecútalo una vez
if ( get_option('core_updater.lock') ) {
  delete_option('core_updater.lock');
}
