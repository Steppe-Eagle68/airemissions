<?php

use yii\db\Migration;

/**
 * Class m200927_150212_catalyst
 */
class m200927_150212_catalysts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try{
            // https://www.sibran.ru/upload/iblock/261/26110dc37b8c824896e054a93c03a4e3.pdf
            /*
             * 12. Содержание токсичных веществ в дымовых газах, мг/м3:
                NOx
                СО
                SOx
                диоксины (в пересчете на 2,3,7,8-тетрахлордибензо-диоксин)
                800
                1 500
                1 000
                1.4 · 10−2
                50
                60
                5
                Нет
             */
            $this->createTable('catalysts',
                array(
                    'id' => 'pk',
                    'name' => 'varchar(50) not null',
                    'declineNitrogenDioxide' => 'float(3,2) not null',
                    'declineCarbonOxide' => 'float(3,2) not null',
                    'declineSulfurDioxide' => 'float(3,2) not null',
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
            //$this->dropIndex('studens_id','catalyst');
            $this->dropTable('catalysts');
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
        echo "m200927_150212_catalyst cannot be reverted.\n";

        return false;
    }
    */
}
