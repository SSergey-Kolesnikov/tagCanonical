<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var tagCanonical $tagCanonical */
$tagCanonical = $modx->getService('tagCanonical', 'tagCanonical', MODX_CORE_PATH . 'components/tagcanonical/model/');
$modx->lexicon->load('tagcanonical:default');

// handle request
$corePath = $modx->getOption('tagcanonical_core_path', null, $modx->getOption('core_path') . 'components/tagcanonical/');
$path = $modx->getOption('processorsPath', $tagCanonical->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);