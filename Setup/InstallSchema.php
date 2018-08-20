<?php
//
//namespace Visma\PromoPage\Setup;
//
//class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
//{
//
//    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
//    {
//        $installer = $setup;
//        $installer->startSetup();
//        if (!$installer->tableExists('visma_promopage')) {
//            $table = $installer->getConnection()->newTable(
//                $installer->getTable('visma_promopage')
//            )
//                ->addColumn(
//                    'post_id',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//                    null,
//                    [
//                        'identity' => true,
//                        'nullable' => false,
//                        'primary'  => true,
//                        'unsigned' => true,
//                    ],
//                    'DataExample ID'
//                )
//                ->addColumn(
//                    'name',//                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                    255,
//                    ['nullable => false'],
//                    'DataExample Name'
//                )
//                ->addColumn(
//                    'url_key',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                    255,
//                    [],
//                    'DataExample URL Key'
//                )
//                ->addColumn(
//                    'post_content',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                    '64k',
//                    [],
//                    'DataExample DataExample Content'
//                )
//                ->addColumn(
//                    'tags',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                    255,
//                    [],
//                    'DataExample Tags'
//                )
//                ->addColumn(
//                    'status',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//                    1,
//                    [],
//                    'DataExample Status'
//                )
//                ->addColumn(
//                    'featured_image',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                    255,
//                    [],
//                    'DataExample Featured Image'
//                )
//                ->addColumn(
//                    'created_at',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//                    null,
//                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
//                    'Created At'
//                )->addColumn(
//                    'updated_at',
//                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//                    null,
//                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
//                    'Updated At')
//                ->setComment('DataExample Table');
//            $installer->getConnection()->createTable($table);
//
//            $installer->getConnection()->addIndex(
//                $installer->getTable('visma_promopage'),
//                $setup->getIdxName(
//                    $installer->getTable('visma_promopage'),
//                    ['name', 'url_key', 'post_content', 'tags', 'featured_image'],
//                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//                ),
//                ['name', 'url_key', 'post_content', 'tags', 'featured_image'],
//                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//            );
//        }
//        $installer->endSetup();
//    }
//}