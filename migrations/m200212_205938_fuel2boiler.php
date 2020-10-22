<?php

use yii\db\Migration;

/**
 * Class m200212_205938_fuel2boiler
 */
class m200212_205938_fuel2boiler extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            $this->createTable('fuel2boiler',
                array(
                    'id' => 'pk',
                    'id_fueltype' => 'integer not null',
                    'id_boiler' => 'integer not null',
                    'EmissionCO' => 'float(5,2) not null',
                    'EmissionNO' => 'float(5,2) not null',
                    'mechanical_shortage' => 'float(2,2) not null',
                ));
            // creates index for column `author_id`
            $this->createIndex(
                'idx-id_fueltype',
                'fuel2boiler',
                'id_fueltype'
            );
            // add foreign key for table `user`
            $this->addForeignKey(
                'fk-fueltypes',
                'fuel2boiler',
                'id_fueltype',
                'fueltypes',
                'id',
                'CASCADE'
            );
            // add foreign key for table `user`
            $this->addForeignKey(
                'fk-boilers',
                'fuel2boiler',
                'id_boiler',
                'boilers',
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
            // drops foreign key for table `user`
            $this->dropForeignKey(
                'fk-fueltypes',
                'fuel2boiler'
            );
// drops foreign key for table `user`
            $this->dropForeignKey(
                'fk-boilers',
                'fuel2boiler'
            );
            $this->dropIndex('idx-id_fueltype');
            $this->dropTable('fuel2boiler');
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
        echo "m200212_205938_fuel2boiler cannot be reverted.\n";

        return false;
    }
    */
}
