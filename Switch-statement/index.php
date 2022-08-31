<!-- <?php

// $role = 'admin';
// $message = '';

// switch ($role) {
// 	case 'admin':
// 		$message = 'Welcome, admin!';
// 		break;
// 	case 'editor':
// 		$message = 'Welcome! You have some pending articles to edit';
// 		break;
// 	case 'author':
// 		$message = 'Welcome! Do you want to publish the draft article?';
// 		break;
// 	case 'subscriber':
// 		$message = 'Welcome! Check out some new articles.';
// 		break;
// 	default:
// 		$message = 'You are not authorized to access this page';
// }

// echo $message;
 ?> -->


<!-- <form action=" " method="get">
<label>
 Enter a number between 1 - 26
</label>
<input type="text" name="number">
<input type="submit" name="submit">
</form>
<?php
// // if the form has been submitted
// if(isset($_GET['submit'])) {
//   $number = (int) $_GET['number'];
//   switch($number) {
//     case 1:
//         echo "A";
//         break;
//     case 2:
//         echo "B";
//         break;
//     case 3:
//         echo "C";
//         break;
//     case 4:
//         echo "D";
//         break;
//     case 5:
//         echo "E";
//         break;
//     case 6:
//         echo "F";
//         break;
//     case 7:
//         echo "G";
//         break;
//     case 8:
//         echo "H";
//         break;
//     case 9:
//         echo "I";
//         break;
// 	case 10:
// 	        echo "J";
// 	        break;
// 	case 11:
// 	        echo "K";
// 	        break;
// 	case 12:
// 	        echo "L";
// 	        break;
// 	case 13:
// 	        echo "M";
// 	        break;
// 	case 14:
// 	        echo "N";
// 	        break;
// 	case 15:
// 	        echo "O";
// 	       break;
// 	case 16:
// 	        echo "P";
// 	        break;
// 	case 17:
// 	        echo "Q";
// 	        break;
// 	case 18:
// 	        echo "R";
// 	        break;
// 	case 19:
// 	        echo "S";
// 	        break;
// 	case 20:
// 	        echo "T";
// 	        break;
// 	case 21:
// 	        echo "U";
// 	        break;
// 	case 22:
// 	        echo "V";
// 	        break;
// 	case 23:
// 	        echo "W";
// 	        break;
// 	case 24:
// 	        echo "X";
// 	        break;
// 	case 25:
// 	        echo "Y";
// 	        break;
// 	case 26:
// 	        echo "Z";
// 	        break;
// 	    default:
// 	        echo 'wrong number';
// 	  }
// 	}
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Switch-Case Statement</title>
</head>
<body>
<form action="#" method="post">
<label>
 Enter Day Name:
</label>
<input type="text" name="today">
<input type="submit" name="submit">
</form>

 <?php
if(isset($_POST['submit'])) {
$today = (string) $_POST['today'];
switch($today){
    case "Mon":
        echo "Today is Monday. Clean your house.";
        break;
    case "Tue":
        echo "Today is Tuesday. Buy some food.";
        break;
    case "Wed":
        echo "Today is Wednesday. Visit a doctor.";
        break;
    case "Thu":
        echo "Today is Thursday. Repair your car.";
        break;
    case "Fri":
        echo "Today is Friday. Party tonight.";
        break;
    case "Sat":
        echo "Today is Saturday. Its movie time.";
        break;
    case "Sun":
        echo "Today is Sunday. Do some rest.";
        break;
    default:
        echo "No information available for that day.";
        break;
	}	
}
?>

</body>
</html>
