<?php

use yii\db\Migration;

class m251208_002347_create_table_usuarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usuarios', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(100)->notNull(),
            'apellido' => $this->string(100)->notNull(),
            'edad' => $this->integer()->notNull(),
            'correo' => $this->string(150)->notNull()->unique(),
            'contrasena' => $this->string(255)->notNull(), // Hash SHA256
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
        $this->dropTable('usuarios');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251208_002347_create_table_usuarios cannot be reverted.\n";

        return false;
    }
    */
}
