<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/tagCanonical/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/tagcanonical')) {
            $cache->deleteTree(
                $dev . 'assets/components/tagcanonical/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/tagcanonical/', $dev . 'assets/components/tagcanonical');
        }
        if (!is_link($dev . 'core/components/tagcanonical')) {
            $cache->deleteTree(
                $dev . 'core/components/tagcanonical/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/tagcanonical/', $dev . 'core/components/tagcanonical');
        }
    }
}

return true;