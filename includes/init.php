<?php

namespace HAMWORKS\Snippet_Injection;

require dirname(__FILE__) .'/classes/Customizer.php';
require dirname(__FILE__) .'/classes/Injector.php';

add_action( 'plugins_loaded', function () {
	new Customizer();
	new Injector();
});
