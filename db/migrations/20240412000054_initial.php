<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

final class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $address = $this->table('address', array('id'=>'address_id'));
        $address->addColumn('street', 'string')
                ->addColumn('city', 'string')
                ->addColumn('state', 'string')
                ->addColumn('zip', 'string')
                ->create();
        $professor = $this->table('professor', array('id'=>false, 'primary_key'=>array('ssn')));
        $professor ->addColumn('ssn', 'string')
                ->addColumn('name', 'string')
                ->addColumn('sex', 'boolean')
                ->addColumn('title', 'string')
                ->addColumn('salary', 'decimal', array('precision'=>9, 'scale'=>2))
                ->addColumn('telephone_area', 'string')
                ->addColumn('telephone_num', 'string')
                ->addColumn('address_id', 'integer', array('signed'=>false))
                ->addForeignKey('address_id', 'address', 'address_id', array('delete'=> 'CASCADE', 'update'=>'NO_ACTION'))
                ->create();
        $college_degrees = $this->table('college_degrees', array('id'=>'degree_id'));
        $college_degrees -> addColumn('degree_title', 'string')
                        -> addColumn('school', 'string')
                        -> addColumn('professor_id', 'string')
                        -> addForeignKey('professor_id', 'professor', 'ssn', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                        ->create();
        $department = $this->table('department', array('id'=>'dept_id'));
        $department -> addColumn('name', 'string')
                    -> addColumn('telephone_area', 'string')
                    -> addColumn('telephone_num', 'string')
                    -> addColumn('office_location', 'string')
                    -> addColumn('chairperson_ssn', 'string')
                    -> addForeignKey('chairperson_ssn', 'professor', 'ssn', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                    -> create();
        $course = $this->table('course', array('id'=> 'course_num'));
        $course -> addColumn('title', 'string')
                -> addColumn('textbook', 'string')
                -> addColumn('units', 'integer', array('limit'=> MysqlAdapter::INT_TINY))
                -> addColumn('dept_id', 'integer', array('signed'=>false))
                -> addForeignKey('dept_id', 'department', 'dept_id', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                -> create();
        $course_prereq = $this->table('course_prereq');
        $course_prereq -> addColumn('course_id', 'integer', array('signed'=>false))
                        -> addForeignKey('course_id', 'course', 'course_num', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                        -> addColumn('course_prereq_id', 'integer', array('signed'=>false))
                        -> addForeignKey('course_prereq_id', 'course', 'course_num', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                        ->create();
        $section = $this->table('section');
        $section ->addColumn('section_num', 'integer')
                -> addColumn('course_num', 'integer', array('signed'=>false))
                -> addIndex(array('section_num', 'course_num'), array('unique'=>true))
                -> addForeignKey('course_num', 'course', 'course_num', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                -> addColumn('professor_ssn', 'string')
                -> addForeignKey('professor_ssn', 'professor', 'ssn', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                -> addColumn('classroom', 'string')
                -> addColumn('num_seats', 'integer')
                -> addColumn('begin_time', 'string')
                -> addColumn('end_time', 'string')
                ->create();
        $section_meeting_days = $this->table('section_meeting_days');
        $section_meeting_days -> addColumn('section_num_id', 'integer', array('signed'=>false))
                        -> addForeignKey('section_num_id', 'section', 'id', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                        -> addColumn('day', 'string')
                        -> create();
        $student = $this->table('student', array('id'=>false, 'primary_key'=>array('campus_id')));
        $student -> addColumn('campus_id', 'string')
                -> addColumn('first_name', 'string')
                -> addColumn('last_name', 'string')
                -> addColumn('telephone_area', 'string')
                -> addColumn('telephone_num', 'string')
                -> addColumn('address_id', 'integer', array('signed'=>false))
                -> addForeignKey('address_id', 'address', 'address_id', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                -> addColumn('major_dept_num', 'integer', array('signed'=>false))
                -> addForeignKey('major_dept_num', 'department', 'dept_id', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                -> create();
        $student_minor = $this->table('student_minor', array('id'=>false, 'primary_key'=>array('student_id','dept_num')));
        $student_minor -> addColumn('student_id', 'string')
                    -> addForeignKey('student_id', 'student', 'campus_id', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                    -> addColumn('dept_num', 'integer', array('signed'=>false))
                    -> addForeignKey('dept_num', 'department', 'dept_id', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                    -> create();
        $enrollment = $this->table('enrollement', array('id'=>false, 'primary_key'=>array('student_id','section_num')));
        $enrollment -> addColumn('student_id', 'string')
                    -> addForeignKey('student_id', 'student', 'campus_id', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                    -> addColumn('section_num', 'integer', array('signed'=>false))
                    -> addForeignKey('section_num', 'section', 'id', array('delete'=>'CASCADE', 'update'=>'NO_ACTION'))
                    -> addColumn('grade', 'string')
                    -> create();
    }
}
