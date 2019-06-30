<?php

namespace Belvini\ProductAttributes\Model\Attribute\Source;

class Typeofproduct extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $typeofproducts = $this->getAllTypeOfProducts();
            $options = [];
            foreach ($typeofproducts as $key=>$value) {
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
     * The type of products list
     * @return array
     */
    public function getAllTypeOfProducts()
    {
        return [
            '' => '--Select Set Type--',
            '1' => 'Wine',
            '2' => 'Tool',
            '3' => 'Food',
        ];
    }
}
