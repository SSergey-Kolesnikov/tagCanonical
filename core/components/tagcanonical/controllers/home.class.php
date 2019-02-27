<?php

/**
 * The home manager controller for tagCanonical.
 *
 */
class tagCanonicalHomeManagerController extends modExtraManagerController
{
    /** @var tagCanonical $tagCanonical */
    public $tagCanonical;


    /**
     *
     */
    public function initialize()
    {
        $this->tagCanonical = $this->modx->getService('tagCanonical', 'tagCanonical', MODX_CORE_PATH . 'components/tagcanonical/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['tagcanonical:manager','tagcanonical:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('tagcanonical');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->tagCanonical->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->tagCanonical->config['jsUrl'] . 'mgr/tagcanonical.js');
        $this->addJavascript($this->tagCanonical->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->tagCanonical->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->tagCanonical->config['jsUrl'] . 'mgr/misc/default.grid.js');
        $this->addJavascript($this->tagCanonical->config['jsUrl'] . 'mgr/misc/default.window.js');
        $this->addJavascript($this->tagCanonical->config['jsUrl'] . 'mgr/widgets/items/grid.js');
        $this->addJavascript($this->tagCanonical->config['jsUrl'] . 'mgr/widgets/items/windows.js');
        $this->addJavascript($this->tagCanonical->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->tagCanonical->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        tagCanonical.config = ' . json_encode($this->tagCanonical->config) . ';
        tagCanonical.config.connector_url = "' . $this->tagCanonical->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "tagcanonical-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="tagcanonical-panel-home-div"></div>';

        return '';
    }
}