<?php

use yii\db\Migration;

/**
 * Class m200213_184445_fk_fuel2types
 */
class m200213_184445_fk_fuel2types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            $this->addForeignKey(
                'fk-fuel2types',
                'fuels',
                'id_fueltype',
                'fueltypes',
                'id',
                'CASCADE'
            );
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
            $this->dropForeignKey(
                'fk-fuel2types',
                'fuels'
            );
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
        echo "m200213_184445_fk_fuel2types cannot be reverted.\n";

        return false;
    }
    */
}
