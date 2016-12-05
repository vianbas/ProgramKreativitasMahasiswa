<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models\group;

use Yii;
use yii\base\Model;
use common\models\Account;
use frontend\models\Members;
use backend\models\Auth_assignment;
use common\models\group\Group;
use common\models\assignment\StudentsAssignment;
use common\models\assignment\SupervisiorAssignment;

class GroupRegistration extends Model{

    /**
     * @inheritdoc
     */
    public $group_name;
    public $year;
    public $description;
    public $supervisior;

    public function rules() {
        return [
            [['group_name', 'year', 'description'], 'required'],
            [['supervisior'], 'integer'],
            
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'group_name' => 'Nama Group',
            'year' => 'Year',
            'description' => 'Description',
            'supervisior' => 'Supervisior',
        ];
    }

    public function register() {
        if ($this->validate()) { //rules harus dijalankan
            $group = new Group();
            $group->group_name = $this->group_name;
            $group->year = $this->year;
            $group->Description = $this->description;
            
            if($group->save()){
                    $dosenassignment = new SupervisiorAssignment();
                    $dosenassignment->id_group = $group->id;
                    $dosenassignment->id_supervisior = $this->supervisior;
                    
                    if($dosenassignment->save()){
                       return true;                                        
                    }

            }
//            $member->generateAuthKey();
            return null;
        }
    }
}
?>


