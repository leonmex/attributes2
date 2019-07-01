<?php

namespace Belvini\ProductAttributes\Model\Attribute\Backend;

class Supplier extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * @var Belvini\ProductAttributes\Model\Attribute\Supplier
     */
    private $supplierList;

    /**
     * Init
     * @param \Belvini\ProductAttributes\Model\Attribute\Source\Supplier $Supplier
     */
    public function __construct(\Belvini\ProductAttributes\Model\Attribute\Source\Supplier $supplierList)
    {
        $this->supplierList = $supplierList;
    }

    /**
     * @param \Magento\Framework\DataObject $object
     *
     * @return $this
     */
    public function beforeSave($object)
    {
        $supplierCode = $object->getData($this->getAttribute()->getAttributeCode());

        if (!$this->checkAttributeValue($supplierCode)) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('Supplier: '.$supplierCode.' is not exist.')
            );
        }

        return parent::beforeSave($object);
    }

    /**
     * Check if the Supplier code exist
     * @return bool
     */
    public function checkAttributeValue($supplierCode)
    {
        $values = $this->supplierList->getAllTypeOfSuppliers();
        foreach ($values as $key=>$value) {
            if ($key == $supplierCode) {
                return true;
            }
        }
        return false;
    }
}
