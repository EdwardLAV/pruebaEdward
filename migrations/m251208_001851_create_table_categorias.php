<?php

use yii\db\Migration;

class m251208_001851_create_table_categorias extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categorias', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(100)->notNull(),
            'estado' => $this->boolean()->defaultValue(true),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categorias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251208_001851_create_table_categorias cannot be reverted.\n";

        return false;
    }
    */
}
