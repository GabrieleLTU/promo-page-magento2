<?php
namespace Visma\PromoPage\Block;

class PromoPage extends \Magento\Framework\View\Element\Template
{
    protected $_productCollectionFactory;
    private $pageFactory;
    private $scopeConfig;
    const CHOOSE_SHOW = 1;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = [],
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Cms\Model\PageFactory $pageFactory
    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->pageFactory = $pageFactory;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('show_in_promopage',self::CHOOSE_SHOW);
        $products_per_page = $this->scopeConfig->getValue('promopage/products_list/display_page_number', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $collection->setPageSize($products_per_page);
        return $collection;
    }

    public function getPromoTitle()
    {
        $title = $this->scopeConfig->getValue('promopage/general/display_promo_title', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $title;
    }

    public function getCmsPageContent($identifier)
    {
        if ($identifier) {
            $content = $this->pageFactory->create();
            $content->load($identifier, 'identifier');
        }
        return $content->getContent();
    }

    public function getCmsPageContentHeading($identifier)
    {
        if ($identifier) {
            $content = $this->pageFactory->create();
            $content->load($identifier, 'identifier');
        }
        return $content->getContentHeading();
    }

}