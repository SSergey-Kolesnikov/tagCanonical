tagCanonical.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'tagcanonical-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('tagcanonical') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('tagcanonical_items'),
                layout: 'anchor',
                items: [{
                    html: _('tagcanonical_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'tagcanonical-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    tagCanonical.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(tagCanonical.panel.Home, MODx.Panel);
Ext.reg('tagcanonical-panel-home', tagCanonical.panel.Home);
