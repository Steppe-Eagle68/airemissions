<?php

use yii\db\Migration;

/**
 * Class m200216_160838_burning_type
 */
class m200216_160838_burning_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            $this->createTable('burningtypes',
                array(
                    'id' => 'pk',
                    'name' => 'varchar(255) not null',
                ));
        }catch(Exception $ex){
            echo $ex;
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        try{
            $this->dropTable('burningtypes');
        }catch(Exception $ex){
            echo $ex;
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200216_160838_burning_type cannot be reverted.\n";

        return false;
    }
    */
}
