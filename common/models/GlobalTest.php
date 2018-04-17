<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PHOSTESTGLOBALTEST".
 *
 * @property int $id
 * @property string $FACILITY
 * @property string $STATIONID
 * @property string $UUTNAME
 * @property string $PARTNUMBER
 * @property string $SERIALNUMBER
 * @property string $TECHNAME
 * @property string $TESTDATE
 * @property string $TIMESTART
 * @property string $TIMESTOP
 * @property int $UUTPLACE
 * @property string $TESTMODE
 * @property string $GLOBALRESULT
 * @property int $INDEXRANGE
 * @property string $VERSIONS
 */
class GlobalTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PHOSTESTGLOBALTEST';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FACILITY'], 'required'],
            [['TESTDATE', 'TIMESTART', 'TIMESTOP'], 'safe'],
            [['UUTPLACE', 'INDEXRANGE'], 'integer'],
            [['FACILITY', 'STATIONID'], 'string', 'max' => 20],
            [['UUTNAME'], 'string', 'max' => 50],
            [['PARTNUMBER', 'SERIALNUMBER', 'TECHNAME'], 'string', 'max' => 30],
            [['TESTMODE', 'GLOBALRESULT'], 'string', 'max' => 10],
            [['VERSIONS'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FACILITY' => 'Facility',
            'STATIONID' => 'Stationid',
            'UUTNAME' => 'Uutname',
            'PARTNUMBER' => 'Partnumber',
            'SERIALNUMBER' => 'Serialnumber',
            'TECHNAME' => 'Techname',
            'TESTDATE' => 'Testdate',
            'TIMESTART' => 'Timestart',
            'TIMESTOP' => 'Timestop',
            'UUTPLACE' => 'Uutplace',
            'TESTMODE' => 'Testmode',
            'GLOBALRESULT' => 'Globalresult',
            'INDEXRANGE' => 'Indexrange',
            'VERSIONS' => 'Versions',
        ];
    }
}
