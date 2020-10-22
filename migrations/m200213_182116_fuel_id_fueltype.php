<?php

use yii\db\Migration;

/**
 * Class m200213_182116_fuel_id_fueltype
 */
class m200213_182116_fuel_id_fueltype extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            if(empty($this->getDb()->getSchema()->getTableSchema('fuels')->getColumn('id_fueltype'))) {
                $this->addColumn('fuels',
                    'id_fueltype',
                        'integer not null');
            }
//            $this->addForeignKey(
//                'fk-fuel2types',
//                'fuels',
//                'id_fueltype',
//                'fueltypes',
//                'id',
//                'CASCADE'
//            );

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
//            $this->dropForeignKey(
//                'fk-fuel2types',
//                'fuels'
//            );
            if(empty($this->getDb()->getSchema()->getTableSchema('fuels')->getColumn('id_fueltype'))) {
                $this->dropColumn('fuels', 'id_fueltype');
            }
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
        echo "m200213_182116_fuel_id_fueltype cannot be reverted.\n";

        return false;
    }
    */
}
