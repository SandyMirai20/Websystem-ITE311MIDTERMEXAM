<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGradesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'student_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'course_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'grade_value' => ['type' => 'VARCHAR', 'constraint' => 10],
            'semester'    => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'year'        => ['type' => 'VARCHAR', 'constraint' => 9, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('student_id', 'students', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('course_id', 'courses', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('grades', true);
    }

    public function down()
    {
        $this->forge->dropTable('grades', true);
    }
}
