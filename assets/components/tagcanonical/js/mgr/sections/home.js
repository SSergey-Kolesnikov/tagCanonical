tagCanonical.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'tagcanonical-panel-home',
            renderTo: 'tagcanonical-panel-home-div'
        }]
    });
    tagCanonical.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(tagCanonical.page.Home, MODx.Component);
Ext.reg('tagcanonical-page-home', tagCanonical.page.Home);