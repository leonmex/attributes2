<?php

namespace Belvini\ProductAttributes\Model\Attribute\Frontend;

class Typeofproduct extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{
    /**
     * @var \Belvini\ProductAttributes\Model\Attribute\Source\Typeofproduct
     */
    private $productTypeList;

    /**
     * Init
     * @param \Belvini\ProductAttributes\Model\Attribute\Source\Typeofproduct $productTypeList
     */
    public function __construct(\Belvini\ProductAttributes\Model\Attribute\Source\Typeofproduct $productTypeList)
    {
        $this->productTypeList = $productTypeList;
    }

    public function getValue(\Magento\Framework\DataObject $object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());

        $productTypeLabel = '';

        foreach ($this->productTypeList->getAllTypeOfProducts as $key => $typeOfProduc) {
            if ($value == $key) {
                $productTypeLabel = $typeOfProduc;
            }
        }

        return "<b>$productTypeLabel</b>";
    }
}
