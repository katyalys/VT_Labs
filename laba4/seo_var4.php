<!DOCTYPE html>
<head>
    <meta charset="UTF-8" lang="ru">
    <title>Test</title>
</head>
<body>
<main>
    <form method="POST">
     <!--  <textarea name='way' placeholder="Way"></textarea><br>-->
        <input type="date" name='date1'><br>
        <input type="submit" name="enter" value="Найти"><br>
        <?php

        $date1 = $_POST['date1'];
        $dateVar = new SmartDate($date1); //создание объекта класса

        class SmartDate{

           public $date;
           function __construct($date){
               $this->date = $date; //инициализация даты
           }

           function WeekDay(){
               $weekendDay = false;

               //Get the day that this particular date falls on.
               $day = date("D", strtotime($this->date));

               //Check to see if it is equal to Sat or Sun.
                if($day == 'Sat' || $day == 'Sun'){
                    //Set our $weekendDay variable to TRUE.
                    $weekendDay = true;
                }

                //Output for testing purposes.
                if($weekendDay){
                    echo $this->date . ' falls on the weekend.';
                } else{
                    echo $this->date . ' falls on a weekday.';
                }
           }

            function LeapYear()
            {
                $leap = date('L', mktime(0, 0, 0, 1, 1, $this->date));
                echo $this->date . ' ' . ($leap ? 'is' : 'is not') . ' a leap year.';
            }

           function CompareDate() {
               date_default_timezone_set('Europe/Moscow');
               $date = date('y-m-d');
               //echo $date;

               $diff = abs(strtotime($this->date) - strtotime($date));
               //echo $diff;

               $years   = floor($diff / (365*60*60*24));
               $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
               $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

               printf("     %d years, %d months, %d days", $years, $months, $days/*, $hours, $minuts, $seconds*/);
           }
        }

        $dateVar->WeekDay();
        $dateVar->LeapYear();
        $dateVar->CompareDate();

        ?>
    </form>
</main>
</body>
</html>