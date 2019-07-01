<?php

namespace Belvini\ProductAttributes\Model\Attribute\Backend;

class Manufacturer extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * @var Belvini\ProductAttributes\Model\Attribute\Manufacturer
     */
    private $manufacturersList;

    /**
     * Init
     * @param \Belvini\ProductAttributes\Model\Attribute\Manufacturer $productTypeList
     */
    public function __construct(\Belvini\ProductAttributes\Model\Attribute\Manufacturer $manufacturersList)
    {
        $this->manufacturersList = $manufacturersList;
    }

    /**
     * @param \Magento\Framework\DataObject $object
     *
     * @return $this
     */
    public function beforeSave($object)
    {
        $manufacturerCode = $object->getData($this->getAttribute()->getAttributeCode());

        if (!$this->checkAttributeValue($manufacturerCode)) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('Producer/Manufacturer: '.$manufacturerCode.' is not exist.')
            );
        }

        return parent::beforeSave($object);
    }

    /**
     * Check if the Manufacturer code exist
     * @return bool
     */
    public function checkAttributeValue($manufacturerCode)
    {
        $values = $this->productTypeList->getAllManufacturers();
        foreach ($values as $key=>$value) {
            if ($key == $manufacturerCode) {
                return true;
            }
        }
        return false;
    }
}
