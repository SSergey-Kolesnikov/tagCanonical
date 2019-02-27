<?php

class tagCanonicalItemEnableProcessor extends modObjectProcessor
{
    public $objectType = 'tagCanonicalItem';
    public $classKey = 'tagCanonicalItem';
    public $languageTopics = ['tagcanonical:manager'];
    //public $permission = 'save';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('tagcanonical_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var tagCanonicalItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('tagcanonical_item_err_nf'));
            }

            $object->set('active', true);
            $object->save();
        }

        return $this->success();
    }

}

return 'tagCanonicalItemEnableProcessor';
