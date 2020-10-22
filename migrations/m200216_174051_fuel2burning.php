<?php

use yii\db\Migration;

/**
 * Class m200216_174051_fuel2burning
 */
class m200216_174051_fuel2burning extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            $this->createTable('fuel2burning',
                array(
                    'id' => 'pk',
                    'id_fueltype' => 'integer not null',
                    'id_burningtype' => 'integer not null',
                    'EmissionCO' => 'float(5,2) not null',
                    'EmissionNO' => 'float(5,2) not null',
                    'mechanical_shortage' => 'float(2,2) not null',
                ));
            // creates index for column `author_id`
            $this->createIndex(
                'idx-id_fueltype',
                'fuel2burning',
                'id_fueltype'
            );
            // add foreign key for table `user`
            $this->addForeignKey(
                'fk-fueltypes-burning',
                'fuel2burning',
                'id_fueltype',
                'fueltypes',
                'id',
                'CASCADE'
            );
            // add foreign key for table `user`
            $this->addForeignKey(
                'fk-burning',
                'fuel2burning',
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

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200216_174051_fuel2burning cannot be reverted.\n";

        return false;
    }
    */
}
