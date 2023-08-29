<?php

interface BaseController
{
  //public function add() : void;
  public function get() : array;
}

class Course implements BaseController
{
  protected int $course_id;
  protected string $name;
  protected string $description;
  
  public static array $courses = [];

  public function __construct(int $course_id,string $name, string $description)
  {
    $this->course_id = $course_id;
    $this->name = $name;
    $this->description = $description;
  }

  public function add ($name) : void
  {
    array_push(static::$courses, [$this->course_id, $this->name, $this->description]);

  }

  public function static get() : array
  {
    return Course::$courses;
  }
}

class Student implements BaseController
{
  protected int $student_id;
  protected string $name;
  protected string $email;
  
  public function array $students = [];

  public function __construct(int $student_id,string $name, string $email)
  {
    $this->student_id = $student_id;
    $this->name = $name;
    $this->email = $email;
  }
  public function add(int $course_id)
  {
    foreach (Course::$courses as $value)
    {
      if ($value[0]== $course_id)
      {
        array_push(static::$students,$course_id);
        echo"Курс Добавлен!";
        break;
      }
    }
  }
  public function static get(): array
  {
    return static::$students;
  }
}

$couse = new Course(1, "web", "dev");
$couse->add();

$student = new Student(1, "Rinat", "void@gmail.com");
$student->add(1);

var_dump(Student::get());