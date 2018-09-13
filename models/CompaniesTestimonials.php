<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_companies_testimonials".
 *
 * @property int $company_id
 * @property int $testimonial_id
 */
class CompaniesTestimonials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_testimonials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'testimonial_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'testimonial_id' => 'Testimonial ID',
        ];
    }
}
