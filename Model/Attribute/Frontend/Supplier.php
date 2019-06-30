<?php

namespace Belvini\ProductAttributes\Model\Attribute\Frontend;

class Supplier extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{
    /**
     * @var \Belvini\ProductAttributes\Model\Attribute\Source\Supplier
     */
    private $supplierList;

    /**
     * Init
     * @param \Belvini\ProductAttributes\Model\Attribute\Source\Supplier $supplierList
     */
    public function __construct(\Belvini\ProductAttributes\Model\Attribute\Source\Supplier $supplierList)
    {
        $this->productTypeList = $supplierList;
    }

    public function getValue(\Magento\Framework\DataObject $object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());

        $supplierLabel = '';

        foreach ($this->productTypeList->getAllTypeOfSuppliers as $key => $supplier) {
            if ($value == $key) {
                $supplierTypeLabel = $supplier;
            }
        }

        return "<b>$supplierTypeLabel</b>";
    }
}
