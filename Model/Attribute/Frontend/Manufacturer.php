<?php

namespace Belvini\ProductAttributes\Model\Attribute\Frontend;

class Manufacturer extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{
    /**
     * @var \Belvini\ProductAttributes\Model\Attribute\Source\Manufacturer
     */
    private $manufacturerList;

    /**
     * Init
     * @param \Belvini\ProductAttributes\Model\Attribute\Source\Manufacturer $productTypeList
     */
    public function __construct(\Belvini\ProductAttributes\Model\Attribute\Source\Manufacturer $manufacturerList)
    {
        $this->manufacturerList = $manufacturerList;
    }

    public function getValue(\Magento\Framework\DataObject $object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());

        $manufacturerLabel = '';

        foreach ($this->productTypeList->getAllManufacturers as $key => $manufacturer) {
            if ($value == $key) {
                $manufacturerLabel = manufacturer;
            }
        }

        return "<b>$manufacturerLabel</b>";
    }
}
