<?php

interface CourseInterface {
    public function getCourseTitle();
    public function getCourseDuration();
    public function getCourseDescription();
}

class Course implements CourseInterface {
    protected $title;
    protected $duration;
    protected $description;

    public function __construct($title, $duration, $description) {
        $this->title = $title;
        $this->duration = $duration;
        $this->description = $description;
    }

    public function getCourseTitle() {
        return $this->title;
    }

    public function getCourseDuration() {
        return $this->duration;
    }

    public function getCourseDescription() {
        return $this->description;
    }
}

class ProgrammingCourse extends Course {
    private $programmingLanguage;

    public function __construct($title, $duration, $description, $programmingLanguage) {
        parent::__construct($title, $duration, $description);
        $this->programmingLanguage = $programmingLanguage;
    }

    public function getProgrammingLanguage() {
        return $this->programmingLanguage;
    }
}

class MathCourse extends Course {
    private $mathArea;

    public function __construct($title, $duration, $description, $mathArea) {
        parent::__construct($title, $duration, $description);
        $this->mathArea = $mathArea;
    }

    public function getMathArea() {
        return $this->mathArea;
    }
}
class LanguageCourse extends Course {
  private $language;

  public function __construct($title, $duration, $description, $language) {
      parent::__construct($title, $duration, $description);
      $this->language = $language;
  }

  public function getLanguage() {
      return $this->language;
  }
}

class Student {
  private $name;
  private $age;
  private $courses = [];

  public function __construct($name, $age) {
      $this->name = $name;
      $this->age = $age;
  }

  public function addCourse($course) {
      $this->courses[] = $course;
  }

  public function getCourses() {
      return $this->courses;
  }

  public function getName() {
      return $this->name;
  }

  public function getAge() {
      return $this->age;
  }
}

class StudentManager {
  public static function enrollStudent($student, $course) {
      $student->addCourse($course);
  }

  public static function withdrawStudent($student, $course) {
      $key = array_search($course, $student->getCourses(), true);
      if ($key !== false) {
          unset($student->getCourses()[$key]);
      }
  }

  public static function getStudentsByCourse($course, $students) {
      $enrolledStudents = [];
      foreach ($students as $student) {
          foreach ($student->getCourses() as $enrolledCourse) {
              if ($enrolledCourse === $course) {
                  $enrolledStudents[] = $student;
              }
          }
      }
      return $enrolledStudents;
  }
}


$pythonCourse = new ProgrammingCourse("Python программирования ", 8, "Python учеба - с 1 сентября до 31 декабря", "Python");
$mathCourse = new MathCourse("Математика", 10, "Подготовка по ЕНТ -  с 1 сентября до 31 декабря", "Calculus");
$frenchCourse = new LanguageCourse("Французкий язык", 6, "Учеба по Французскому языку -  с 1 сентября до 31 декабря", "French");


$student1 = new Student("Rinat", 20);
$student2 = new Student("Bob", 22);
$student3 = new Student("Sergey", 19);


StudentManager::enrollStudent($student1, $pythonCourse);
StudentManager::enrollStudent($student1, $frenchCourse);
StudentManager::enrollStudent($student2, $mathCourse);
StudentManager::enrollStudent($student3, $pythonCourse);


$enrolledStudents = StudentManager::getStudentsByCourse($pythonCourse, [$student1, $student2, $student3]);
foreach ($enrolledStudents as $student) {
    echo "Студент  " . $student->getName() . " зачислен в " . $pythonCourse->getCourseTitle() . "<br>";
}


$students = [$student1, $student2, $student3];
foreach ($students as $student) {
    echo "Студент: ". $student->getName() . ", Age: " . $student->getAge() . ", Courses: ";
    $courses = $student->getCourses();
    $courseTitles = array_map(function($course) {
        return $course->getCourseTitle();
    }, $courses);
    echo implode(",", $courseTitles) . "<br>";
}
?>