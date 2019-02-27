<?php

class tagCanonicalItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'tagCanonicalItem';
    public $classKey = 'tagCanonicalItem';
    public $languageTopics = ['tagcanonical:manager'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('tagcanonical_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('tagcanonical_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'tagCanonicalItemCreateProcessor';