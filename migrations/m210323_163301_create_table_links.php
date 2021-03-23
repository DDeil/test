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
                'url'            => $this->string(256),
                'redirect_limit' => $this->integer(),
                'life_time'      => $this->integer(),
                'count_redirect' => $this->integer(),
                'token'          => $this->string(8),
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
