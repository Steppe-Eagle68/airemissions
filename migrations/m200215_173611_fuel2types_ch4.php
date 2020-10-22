<?php

use yii\db\Migration;

/**
 * Class m200215_173611_fuel2types_ch4
 */
class m200215_173611_fuel2types_ch4 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            if(empty($this->getDb()->getSchema()->getTableSchema('fueltypes')->getColumn('EmissionCH4'))) {
                $this->addColumn('fueltypes',
                    'EmissionCH4',
                    'float(2,2) not null');
            }
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
            if(empty($this->getDb()->getSchema()->getTableSchema('fueltypes')->getColumn('EmissionCH4'))) {
                $this->dropColumn('fueltypes', 'EmissionCH4');
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
        echo "m200215_173611_fuel2types_ch4 cannot be reverted.\n";

        return false;
    }
    */
}
