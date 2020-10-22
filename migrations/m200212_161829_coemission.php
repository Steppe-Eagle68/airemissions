<?php

use yii\db\Migration;

/**
 * Class m200212_161829_coemission
 */
class m200212_161829_coemission extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            $this->createTable('coemissions',
                array(
                    'id' => 'pk',
                    'technology' => 'varchar(50) not null',
                    'fueltype' => 'varchar(50) not null',
                    'emission' => 'float(5,2) not null',
                ));
            //$this->createIndex('studens_id', 'studens', 'id');
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
            //$this->dropIndex('studens_id','fuels');
            $this->dropTable('coemissions');
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
        echo "m200212_161829_coemission cannot be reverted.\n";

        return false;
    }
    */
}
