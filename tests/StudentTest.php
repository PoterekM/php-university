<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Student.php";

    $server = 'mysql:host=localhost:8889;dbname=university_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class TaskTest extends PHPUnit_Framework_TestCase
    {

        function testGetName()
        {
            //Arrange
            $name = "Bobby";
            $date = "08-23-2017";
            $test_student = new Student($name, $date);

            //Act
            $result = $test_student->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testSetName()
        {
            $name = "Suzie";
            $date = "3434";
            $test_student = new Student($name, $date);
            $new_name = "Johnny";

            $test_student->setName($new_name);
            $result = $test_student->getName();

            $this->assertEquals($new_name, $result);
        }

        function testGetDate()
        {
            $name = "Lucy";
            $date = "7-10-2017";
            $test_student = new Student($name, $date);

            $result = $test_student->getDate();

            $this->assertEquals($date, $result);
        }

        function testSetDate()
        {
            $name = "Lolli";
            $date = "3434";
            $test_student = new Student($name, $date);
            $new_date = "Jo Boi Day";

            $test_student->setDate($new_date);
            $result = $test_student->getDate();

            $this->assertEquals($new_date, $result);
        }

        function testGetId()
        {
            $name = "Lolli";
            $date = "3434";
            $test_student = new Student($name, $date);
            $test_student->save();

            $result = $test_student->getId();

            $this->assertTrue(is_numeric($result));
        }

        function testSave()
        {
            $name = "Lolli";
            $date = "3434";
            $test_student = new Student($name, $date);
            $test_student->save();

            $executed = $test_student->save();

            $this->assertTrue($executed, "Student not successfully saved to database");
        }
    }
?>