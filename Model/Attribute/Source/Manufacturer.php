<?php

namespace Belvini\ProductAttributes\Model\Attribute\Source;

class Manufacturer extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $typeOfManufacturers = $this->getAllManufacturers();
            $options = [];
            foreach ($typeOfManufacturers as $key=>$value) {
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
     * The type of producers list
     * @return array
     */
    public function getAllManufacturers()
    {
        return [
            '' => '--Select Producer--',
            '1' => 'Weingut Spreitzer',
            '2' => 'Sektmanufaktur Schloss VAUX AG',
            '3' => 'Weingut Markus Schneider Am hohen Weg',
        ];
    }
}
