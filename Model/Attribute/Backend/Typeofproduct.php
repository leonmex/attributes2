<?php

namespace Belvini\ProductAttributes\Model\Attribute\Backend;

class Typeofproduct extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * @var Belvini\ProductAttributes\Model\Attribute\Typeofproduct
     */
    private $productTypeList;

    /**
     * Init
     * @param \Belvini\ProductAttributes\Model\Attribute\Typeofproduct $productTypeList
     */
    public function __construct(\Belvini\ProductAttributes\Model\Attribute\Typeofproduct $productTypeList)
    {
        $this->productTypeList = $productTypeList;
    }

    /**
     * @param \Magento\Framework\DataObject $object
     *
     * @return $this
     */
    public function beforeSave($object)
    {
        $productTypeCode = $object->getData($this->getAttribute()->getAttributeCode());

        if (!$this->checkAttributeValue($productTypeCode)) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('Set Type: '.$productTypeCode.' is not exist.')
            );
        }

        return parent::beforeSave($object);
    }

    /**
     * Check exist of the product type code
     * @return bool
     */
    public function checkAttributeValue($productTypeCode)
    {
        $values = $this->productTypeList->getAllTypeOfProducts();
        foreach ($values as $key=>$value) {
            if ($key == $productTypeCode) {
                return true;
            }
        }
        return false;
    }
}
