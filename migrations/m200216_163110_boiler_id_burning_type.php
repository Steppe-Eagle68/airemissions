<?php

use yii\db\Migration;

/**
 * Class m200216_163110_boiler_id_burning_type
 */
class m200216_163110_boiler_id_burning_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            if(empty($this->getDb()->getSchema()->getTableSchema('boilers')->getColumn('id_burningtype'))) {
                $this->addColumn('boilers',
                    'id_burningtype',
                    'integer not null DEFAULT 1'
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
            if(empty($this->getDb()->getSchema()->getTableSchema('boilers')->getColumn('id_burningtype'))) {
                $this->dropColumn('boilers', 'id_burningtype');
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
        echo "m200216_163110_boiler_id_burning_type cannot be reverted.\n";

        return false;
    }
    */
}
