<?php 
namespace Vinh\Curd\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{

	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('aht_blog_post')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('aht_blog_post')
			)
				->addColumn(
					'post_id',
					Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Post ID'
				)
				->addColumn(
					'name',
					Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Name'
				)
				->addColumn(
					'url_key',
					Table::TYPE_TEXT,
					255,
					[],
					'URL Key'
				)
				->addColumn(
					'image',
					Table::TYPE_TEXT,
					null,
					['nullable' => true, 'default' => null],
					'Image'
				)

				->addColumn(
					'content',
					Table::TYPE_TEXT,
					'64k',
					['nullable' => false],
					'Content'
				)
				->addColumn(
					'status',
					Table::TYPE_SMALLINT,
					null,
					['nullable' => false, 'default' => '1'],
					'Status'
				)
				->addColumn(
					'created_at',
					Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
					'Created At'
				)->addColumn(
					'updated_at',
					Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
					'Updated At'
				)
				->setComment('Blog Post Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('aht_blog_post'),
				$setup->getIdxName(
					$installer->getTable('aht_blog_post'),
					['name', 'url_key', 'image', 'content'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name', 'url_key', 'image', 'content'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}