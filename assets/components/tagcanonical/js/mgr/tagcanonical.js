var tagCanonical = function (config) {
    config = config || {};
    tagCanonical.superclass.constructor.call(this, config);
};
Ext.extend(tagCanonical, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('tagcanonical', tagCanonical);

tagCanonical = new tagCanonical();