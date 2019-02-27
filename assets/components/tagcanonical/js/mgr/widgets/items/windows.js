tagCanonical.window.CreateItem = function (config) {
    config = config || {}
    config.url = tagCanonical.config.connector_url

    Ext.applyIf(config, {
        title: _('tagcanonical_color_create'),
        width: 600,
        cls: 'tagcanonical_windows',
        baseParams: {
            action: 'mgr/item/create',
            resource_id: config.resource_id
        }
    })
    tagCanonical.window.CreateItem.superclass.constructor.call(this, config)
}
Ext.extend(tagCanonical.window.CreateItem, tagCanonical.window.Default, {

    getFields: function (config) {
        return [
            {xtype: 'hidden', name: 'id', id: config.id + '-id'},
            {
                xtype: 'textfield',
                fieldLabel: _('tagcanonical_item_name'),
                name: 'name',
                id: config.id + '-name',
                anchor: '99%',
                allowBlank: false,
            }, {
                xtype: 'textarea',
                fieldLabel: _('tagcanonical_item_description'),
                name: 'description',
                id: config.id + '-description',
                height: 150,
                anchor: '99%'
            }, {
                xtype: 'xcheckbox',
                boxLabel: _('tagcanonical_item_active'),
                name: 'active',
                id: config.id + '-active',
                checked: true,
            }
        ]


    }
})
Ext.reg('tagcanonical-item-window-create', tagCanonical.window.CreateItem)

tagCanonical.window.UpdateItem = function (config) {
    config = config || {}

    Ext.applyIf(config, {
        title: _('tagcanonical_item_update'),
        baseParams: {
            action: 'mgr/item/update',
            resource_id: config.resource_id
        },
    })
    tagCanonical.window.UpdateItem.superclass.constructor.call(this, config)

}
Ext.extend(tagCanonical.window.UpdateItem, tagCanonical.window.CreateItem)
Ext.reg('tagcanonical-item-window-update', tagCanonical.window.UpdateItem)