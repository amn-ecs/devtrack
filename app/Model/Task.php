<?php
/**
 *
 * Task model for the DevTrack system
 * Stores the Tasks for a project in the system
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     DevTrack Development Team 2012
 * @link          http://github.com/chrisbulmer/devtrack
 * @package       DevTrack.Model
 * @since         DevTrack v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * @property Project $Project
 * @property Owner $Owner
 * @property TaskType $TaskType
 * @property TaskStatus $TaskStatus
 * @property TaskPriority $TaskPriority
 * @property Assignee $Assignee
 * @property Milestone $Milestone
 * @property TaskComment $TaskComment
 */
App::uses('AppModel', 'Model');

class Task extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'subject';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'project_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'owner_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'task_type_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'task_status_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'task_priority_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'subject' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
    );

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'project_id',
        ),
        'Owner' => array(
            'className' => 'User',
            'foreignKey' => 'owner_id',
        ),
        'TaskType' => array(
            'className' => 'TaskType',
            'foreignKey' => 'task_type_id',
        ),
        'TaskStatus' => array(
            'className' => 'TaskStatus',
            'foreignKey' => 'task_status_id',
        ),
        'TaskPriority' => array(
            'className' => 'TaskPriority',
            'foreignKey' => 'task_priority_id',
        ),
        'Assignee' => array(
            'className' => 'User',
            'foreignKey' => 'assignee_id',
        ),
        'Milestone' => array(
            'className' => 'Milestone',
            'foreignKey' => 'milestone_id',
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'TaskComment' => array(
            'className' => 'TaskComment',
            'foreignKey' => 'task_id',
            'dependent' => true,
        )
    );

    public $virtualFields = array(
        'fake_id' => 'SELECT COUNT(id) + 100 FROM tasks as Taskes WHERE Taskes.project_id = Task.project_id AND Taskes.id < Task.id'
    );

}
