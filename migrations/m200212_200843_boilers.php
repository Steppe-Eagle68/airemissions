<?php

use yii\db\Migration;

/**
 * Class m200212_200843_boilers
 */
class m200212_200843_boilers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            $this->createTable('boilers',
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
            $this->dropTable('boilers');
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
        echo "m200212_200843_boilers cannot be reverted.\n";

        return false;
    }
    */
}
