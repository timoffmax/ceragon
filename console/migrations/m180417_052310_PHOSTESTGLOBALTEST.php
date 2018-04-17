<?php

use yii\db\Migration;

/**
 * Class m180417_052310_PHOSTESTGLOBALTEST
 */
class m180417_052310_PHOSTESTGLOBALTEST extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Create table
        $this->execute('
            CREATE TABLE `PHOSTESTGLOBALTEST` (
              `id` int(11) NOT NULL,
              `FACILITY` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
              `STATIONID` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
              `UUTNAME` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
              `PARTNUMBER` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
              `SERIALNUMBER` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
              `TECHNAME` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
              `TESTDATE` date DEFAULT NULL,
              `TIMESTART` time DEFAULT NULL,
              `TIMESTOP` time DEFAULT NULL,
              `UUTPLACE` int(11) DEFAULT NULL,
              `TESTMODE` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
              `GLOBALRESULT` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
              `INDEXRANGE` int(11) DEFAULT NULL,
              `VERSIONS` varchar(100) CHARACTER SET utf8 DEFAULT NULL
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci DELAY_KEY_WRITE=1 ROW_FORMAT=FIXED;
        ');

        // Load data
        $sql = file_get_contents('console/migrations/PHOSTESTGLOBALTEST.sql');
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('PHOSTESTGLOBALTEST');
    }
}
