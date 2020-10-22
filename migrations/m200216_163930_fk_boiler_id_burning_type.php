<?php

use yii\db\Migration;

/**
 * Class m200216_163930_fk_boiler_id_burning_type
 */
class m200216_163930_fk_boiler_id_burning_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            $this->addForeignKey(
                'fk-boiler-id-burningtypes',
                'boilers',
                'id_burningtype',
                'burningtypes',
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
                'fk-boiler-id-burningtypes',
                'boilers'
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
        echo "m200216_163930_fk_boiler_id_burning_type cannot be reverted.\n";

        return false;
    }
    */
}
