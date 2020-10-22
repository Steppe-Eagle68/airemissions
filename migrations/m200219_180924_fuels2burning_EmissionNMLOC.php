<?php

use yii\db\Migration;

/**
 * Class m200219_180924_fuels2burning_EmissionNMLOC
 */
class m200219_180924_fuels2burning_EmissionNMLOC extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            if(empty($this->getDb()->getSchema()->getTableSchema('fuel2burning')->getColumn('EmissionNMLOC'))) {
                $this->addColumn('fuel2burning',
                    'EmissionNMLOC',
                    'float(5,2) not null'
                );
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
            if(empty($this->getDb()->getSchema()->getTableSchema('fuel2burning')->getColumn('EmissionNMLOC'))) {
                $this->dropColumn('fuel2burning', 'EmissionNMLOC');
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
        echo "m200219_180924_fuels2burning_EmissionNMLOC cannot be reverted.\n";

        return false;
    }
    */
}
