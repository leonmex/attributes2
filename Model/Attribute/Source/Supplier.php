<?php

namespace Belvini\ProductAttributes\Model\Attribute\Source;

class Supplier extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $suppliers = $this->getAllTypeOfSuppliers();
            $options = [];
            foreach ($suppliers as $key=>$value) {
                $options[] = [
                    'label' => $value,
                    'value' => $key
                ];
            }
            $this->_options = $options;
        }
        return $this->_options;
    }

    /**
     * The type of Suppliers list
     * @return array
     */
    public function getAllTypeOfSuppliers()
    {
        return [
            '' => '--Select Supplier--',
            '1' => 'BELVINI.DE',
            '2' => 'Bodegas Muga',
            '3' => 'Ramón Bilbao',
        ];
    }
}
