<?php

/**
 * Si le package n'a pas été téléchargé avec Composer, il faut "require" manuellement ce fichier.
 */

require_once __DIR__.'/../Contracts/Config/ConfigInterface.php';

require_once __DIR__.'/../Contracts/PaginationInterface.php';

require_once __DIR__.'/../Contracts/Http/Request/RequestInterface.php';

require_once __DIR__.'/../Config/SingletonConfig.php';

require_once __DIR__.'/../Exception/PaginationException.php';

require_once __DIR__.'/../Http/Request/Bags/ParameterBag.php';

require_once __DIR__.'/../Http/Request/Request.php';

require_once __DIR__.'/../Http/Request/Server.php';

require_once __DIR__.'/../Support/String/Str.php';

require_once __DIR__.'/../Config/Config.php';

require_once __DIR__.'/../Config/Lang.php';

require_once __DIR__.'/../Pagination.php';

require_once __DIR__.'/../RendererGenerator.php';

require_once __DIR__.'/../HtmlRenderer.php';
