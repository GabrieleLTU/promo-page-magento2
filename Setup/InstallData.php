<?php
namespace Visma\PromoPage\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
    protected $_pageFactory;

    public function __construct(EavSetupFactory $eavSetupFactory, \Magento\Cms\Model\PageFactory $pageFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->_pageFactory = $pageFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'show_in_promopage',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Show in promo page',
                'input' => 'select',
                'class' => '',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => 0,
                'group' => 'General',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );

//          REMOVE ATRIBUTE
//        $eavSetup->removeAttribute(
//            \Magento\Catalog\Model\Product::ENTITY,
//            'sample_attribute');

        $page = $this->_pageFactory->create();
        $page->setTitle('Promo page')
            ->setIdentifier('promo-page')
            ->setIsActive(true)
            ->setPageLayout('1column')
            ->setStores(array(0))
            ->setContent('This is content text.')
            ->save();


//        $cmsPage = [
//            'title' => 'TEST TITLE',
//            'identifier' => 'test-content-1',
//            'page_layout' => '1column',
//            'content' => 'test content 1',
//            'is_active' => 1,
//            'store_id' => [0],
//            'sort_order' => 22
//        ];
//        $this->pageFactory->create()->setData($cmsPage)->save();

    }

}