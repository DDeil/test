<?php

use yii\db\Migration;

/**
 * Class m210323_163301_create_table_links
 */
class m210323_163301_create_table_links extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'links',
            [
                'id'             => $this->primaryKey(),
                'url'            => $this->string(256)->notNull(),
                'redirect_limit' => $this->integer()->notNull(),
                'life_time'      => $this->integer()->notNull(),
                'count_redirect' => $this->integer()->defaultValue(0),
                'token'          => $this->string(8)->notNull(),
                'created_at'     => $this->dateTime()->notNull(),
            ]
        );

        $this->createIndex('links-token', 'links', 'token', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('links');
    }
}
