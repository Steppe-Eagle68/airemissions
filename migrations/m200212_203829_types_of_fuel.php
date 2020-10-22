<?php

use yii\db\Migration;

/**
 * Class m200212_203829_types_of_fuel
 */
class m200212_203829_types_of_fuel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            $this->createTable('fueltypes',
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
            $this->dropTable('fueltypes');
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
        echo "m200212_203829_types_of_fuel cannot be reverted.\n";

        return false;
    }
    */
}
