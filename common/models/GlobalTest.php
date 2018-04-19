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
            'STATIONID' => 'Station ID',
            'UUTNAME' => 'UUT Name',
            'PARTNUMBER' => 'Part Number',
            'SERIALNUMBER' => 'S/Number',
            'TECHNAME' => 'Techname',
            'TESTDATE' => 'Test Date',
            'TIMESTART' => 'Test Start',
            'TIMESTOP' => 'Timestop',
            'UUTPLACE' => 'Place',
            'TESTMODE' => 'Testmode',
            'GLOBALRESULT' => 'Result',
            'INDEXRANGE' => 'Indexrange',
            'VERSIONS' => 'Versions',
        ];
    }

    /**
     * Return distinct values of the field as array
     *
     * @param string $fieldName
     * @return array|null
     */
    public static function getDistinctValues(string $fieldName, array $conditions = [], bool $filterEmpty = false): ?array
    {
        if ($filterEmpty) {
            // Don't include empty conditions and don't filter by current field
            $conditions = array_filter($conditions, function ($value, $key) use ($fieldName) {
                return !empty($value) && $key !== $fieldName;
            }, ARRAY_FILTER_USE_BOTH);
        }

        // Get values
        $values = self::find()
            ->select($fieldName)
            ->distinct()
            ->where($conditions)
            ->column()
        ;

        // Copy values to keys
        if (!empty($values)) {
            $values = array_combine($values, $values);
        }

        return $values;
    }
}
