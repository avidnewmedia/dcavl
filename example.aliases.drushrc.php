<?php

  // Alias for the local environment.
  $aliases['_local'] = array (
    'uri' => 'http://example.lndo.site',
    'root' => '/private/var/www/example.com/www/web',
  );

  // Aliases to pantheon multidev environments.
  //
  // Overwrite these aliases with ones downloaded
  //from the Pantheon Dashboard
  $aliases['dev'] = array();

  $aliases['test'] = array();

  $aliases['live'] = array();
  
  // Alias live as master.
  $aliases['master'] = $aliases['live'];
