<?php

use yii\db\Migration;

/**
 * Class m200208_114113_fuels
 */
class m200208_114113_fuels extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            $this->createTable('fuels',
                array(
                    'id' => 'pk',
                    'name' => 'varchar(50) not null',
                    'carbon' => 'float(2,2) not null',
                    'hydrogen' => 'float(2,2) not null',
                    'sulfur' => 'float(2,2) not null',
                    'ash' => 'float(2,2) not null',
                    'nitrogen' => 'float(2,2) not null',
                    'methane' => 'float(2,2) not null',
                    'oxygen' => 'float(2,2) not null',
                    'lower_combustion_heat' => 'float(5,2) not null',
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
            $this->dropTable('fuels');
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
        echo "m200208_114113_fuels cannot be reverted.\n";

        return false;
    }
    */
}
