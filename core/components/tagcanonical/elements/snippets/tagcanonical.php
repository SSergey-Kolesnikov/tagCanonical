<?php
/**
 * @var array $scriptProperties
 */

$delimiter = (!empty($scriptProperties['delimiter'])) ? $scriptProperties['delimiter'] : ',';
$removeParameters = (!empty($scriptProperties['removeParameters'])) ? true : false;
$snippetParameters = (!empty($scriptProperties['get'])) ? explode($delimiter, $scriptProperties['get']) : array();

$resourceId = $modx->resource->get('id');
$context = $modx->resource->get('context_key');

$tvParameters = ($tvId = (int) $modx->getOption('tagcanonical_tv')) ? ($modx->resource->getTVValue($tvId)) ? explode($delimiter, $modx->resource->getTVValue($tvId)) : array() : array();
$getParameters = array_unique(array_merge($snippetParameters, $tvParameters));
$urlParameters = ($removeParameters || !$getParameters) ? array() : $modx->request->getParameters();

if (count($urlParameters) && count($getParameters)) {
    foreach ($urlParameters as $parameter => $parameterValue) {
        if (!is_int(array_search($parameter, $getParameters)))
            unset($urlParameters[$parameter]);
    }
}
ksort($urlParameters, SORT_STRING);

$urlCorrectMode = htmlspecialchars_decode($modx->makeUrl($resourceId, $context, $urlParameters, 'full'));

return '<link rel="canonical" href="'.$urlCorrectMode.'" />';