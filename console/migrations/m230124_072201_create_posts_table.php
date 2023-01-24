<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts}}`.
 */
class m230124_072201_create_posts_table extends Migration
{
    private const TABLE_NAME = 'posts';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('Заголовок'),
            'content' => $this->text()->notNull()->comment('Контент'),
            'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата и время создания'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активен'),
            'edited' => $this->boolean()->notNull()->defaultValue(false)->comment('Был отредактирован после создания'),
        ]);

        echo "Table 'posts' has created successful.\n";
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
