<?php

namespace Belvini\ProductAttributes\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Eav setup factory
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     * @param CategorySetupFactory $categorySetupFactory
     */
    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'Set_Product',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Set Product',
                'input' => 'select',
                'source' => 'Belvini\ProductAttributes\Model\Attribute\Source\Typeofproduct',
                'frontend' => 'Belvini\ProductAttributes\Model\Attribute\Frontend\Typeofproduct',
                'backend' => 'Belvini\ProductAttributes\Model\Attribute\Backend\Typeofproduct',
                'required' => true,
                'sort_order' => 50,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'Products_Id_bv',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Products Id bv',
                'input' => 'text',
                'validate_rules' => '{"max_text_length":64}',
                'required' => true,
                'sort_order' => 51,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'Article_number_supplier',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Article Number Supplier',
                'input' => 'text',
                'validate_rules' => '{"max_text_length":64}',
                'required' => true,
                'sort_order' => 52,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'supplier',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Supplier',
                'input' => 'select',
                'source' => 'Belvini\ProductAttributes\Model\Attribute\Source\Supplier',
                'frontend' => 'Belvini\ProductAttributes\Model\Attribute\Frontend\Supplier',
                'backend' => 'Belvini\ProductAttributes\Model\Attribute\Backend\Supplier',
                'required' => true,
                'sort_order' => 53,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'producer',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Producer',
                'input' => 'select',
                'source' => 'Belvini\ProductAttributes\Model\Attribute\Source\Manufacturer',
                'frontend' => 'Belvini\ProductAttributes\Model\Attribute\Frontend\Manufacturer',
                'backend' => 'Belvini\ProductAttributes\Model\Attribute\Backend\Manufacturer',
                'required' => true,
                'sort_order' => 54,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'Products_vpe_value',
            [
                'group' => 'General',
                'type' => 'decimal',
                'label' => 'Amount vpe',
                'input' => 'text',
                'required' => true,
                'sort_order' => 55,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'input_renderer' => \Magento\Msrp\Block\Adminhtml\Product\Helper\Form\Type::class,
                'frontend_input_renderer' => \Magento\Msrp\Block\Adminhtml\Product\Helper\Form\Type::class,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );
    }
}
