<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <?php
// connect to database
$host='localhost';
$user='root';
$pass='';
$db="student";
$con=mysqli_connect($host,$user,$pass,$db);
$res=mysqli_query($con,"select *from student");
#button var
$id='';
$name='';
$address='';
if(isset($_POST['id'])){
    $id=$_POST['id'];
}
if(isset($_POST['namee'])){
     $name=$_POST['namee'];
}
if(isset($_POST['address'])){
    $address=$_POST['address'];
}
$sqls='';
if(isset($_POST['add'])){
    $sqls="insert into student(name,address) value('$name','$address')";
    mysqli_query($con,$sqls);
    header("location: home.php");
}
if(isset($_POST['del'])){
$sqls="delete from student where name='$name'";
mysqli_query($con,$sqls);
 header("location: home.php");
}
if(isset($_POST['delall'])){
    $sqls='TRUNCATE TABLE student';
    mysqli_query($con,$sqls);
     header("location: home.php");

}
if(isset($_POST['up'])){
    if($address==''){
$sqls="UPDATE student 
set name='$name'  where id=$id";
mysqli_query($con,$sqls);
}
 if ($name=='') {
    $sqls="UPDATE student 
set address='$address'  where id=$id";
mysqli_query($con,$sqls);
 }
else{
      $sqls="UPDATE student 
set address='$address',name='$name'  where id=$id";
mysqli_query($con,$sqls);  
}


  header("location: home.php");
}

if(isset($_POST['search'])  )  {
$res=mysqli_query($con,"SELECT * from student where name like ('%".$name."%')");
// header("location: home.php");
}
if(isset($_POST['e'])){
    $res=mysqli_query($con,"SELECT * from student");
  header("location: home.php");  
}




    ?>  
    <div id="mother">
          <form action="" method="post">
               <main>
                         <table id='tbody'>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                               
                            </tr>
                         
                     
                          <?php
                              while($row=mysqli_fetch_array($res)){
                                echo " <tr>";
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['address']."</td>";         
                                   echo "</tr>";
                              }
                              ?>   
                         </table>
                 </main>
                 <aside>
                    <div id="div">
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAsJCQcJCQcJCQkJCwkJCQkJCQsJCwsMCwsLDA0QDBEODQ4MEhkSJRodJR0ZHxwpKRYlNzU2GioyPi0pMBk7IRP/2wBDAQcICAsJCxULCxUsHRkdLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCz/wAARCADrAOgDASIAAhEBAxEB/8QAHAAAAQUBAQEAAAAAAAAAAAAAAAECBQYHBAMI/8QAQRAAAgEDAgMFBQUFBgYDAAAAAQIDAAQRBSESMUEGEyJRYTJxgZGhBxRCUrEjYsHR8BUkM3KCkkNjorLh8SWDk//EABsBAQADAQEBAQAAAAAAAAAAAAACAwQBBQYH/8QALREAAgIBAwMBCAEFAAAAAAAAAAECEQMEITEFEkFRBhMUIjJxsfChQmGBwdH/2gAMAwEAAhEDEQA/ANbooooAooooAooooAooooAooooAooooAooooAooooAori1HVNN0uD7xfXCxIchActJIw/DGi+Ims71f7SrtZCml2kUUQz+0ux3sz+vAh4B8zXLJKLfBqGR50ZFYeftG7X8WfvMOAdwbWHBHyzVn0L7R7Wf9hrfd20oBZLmBHMMgUE8LRrlg3QY2PpSzrg0aVRUPp3aLQtTKrZX0EkjKGETExy4JI9iQA525DP1qWDqa6QHUUUUAUUUUAUUUUAUUUUAUUUUAUlLSUAtJS0lALRRRQCUtJS0AUlLSUAtFFFAJUD2h7RQaLEkaKs1/OheCFieBEBx302DnhzsPM7dCV7Na1W30bT7m+lXjKARwRAgGe4fZIwT59fIAnpWNapqcrNdahfSd7dTuGfGweQDhCgDkqjZRUW6LIQ7mLql7c300l1f3QaSTYyTsEAGSeFFGwA6ACq7P3ZYhJlcfu4xU3puh6xrH95nXuIH3QkHiI/dB3qxRdkbWNSCpfIAJkbrjyArPLNGLN8cVLcoFvay3Uywx5LHcnGQoG+TiupbSGCYKMOVAGXP/AGnlVouLBNLEzRwrxMCucEkLjoc5quxjildWBBDExsR1/Ix5YP8AXrOOTv4OShQy5PFhV8LAcScQzkj1HWrJ2d7f6hppitNW767sl4UWXPFdWyjbYn219Cc+R6GvzBHDJyD54Mj2HFRJyJSj8zyz51ailxT5PpOzvre7hhngkWWGZFkikQ5V0YZBBrsBzWNdg9fktbk6NcP+wnLy2PFnKTe08Q9GGWHqD+atdt5Q6rvUjLJU6OmkpaShEWiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCkNLUJ2m1b+x9IvLpCBcMPu9mD1uJcgMP8AKMsf8tAlexQ+12rDU9Ya2R82eld5EmCOF7k7SybeXsj3H81QOg6aut6nLPMvFZ2JAVT7LSnff3bVGzXHcWs0gJMkmY0/MzFSST18vnWgdk7fT7PTLO0S5tnu3XvblY5FZu+fxMMjmRyrLlbrY9HGlBWT0VvGiKFUAKAAAOg8qcyYr3AAGKYedZe1Ee62Rl5ZxzqwYA5G+R+lUjUdJMDyFRgFeIe8HGa0RxjNQGrqhjIIG7FcnpxjIPzrkW4Mvg+5UZxcOVOTnLHxDydTiuGZA6K49ob565G39e6pDUVA7w+qt/A1wxniVl/o5Br0ou1ZTJU6COWaNre5hYpPBIkiMD7MqEMprdtB1OO/s7O6j2W4hSUDPskjxKfccj4VgiZDFfzjGP3huD+orSuwF6TZz2pbe2uSyDPKOYcf68VSM+VWrNUU5Ap1eFu/Eo91e9dM4UUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAh5Vlv2i6sJLy00uM+GxiNzc7f8AHmUcCnPku/8Ar9K1FiMb7DqfIda+e9av21HU9Sutx9+vZXUZ5Qq3hB9wAqMi7DG5WedksFzqmg21zwmAXMT3IY+BsZlYNnpyB91aDd6h2Pvs2xv7KOeEBY3hIjeLBwArAY+FQ3YbRY7g3GsXKhl4pLeyDDIyPDJL/AfGrBqXZ+Ca0u7S2YQRXEhmcIiKwkKNGSsnCTggnI9enXJOSbN0qToXTX1WOSON7pb20biCTZBkUdMnqOnM1Nl8VCaNpEunhEWQmPwjgzxKD1K5AI91depXPcFVjBZ32UD9TVDbDSbpHV94gcle9i4htwmRMj4ZzUTq8TNDIQNipHEBnhIOQ23kagri30JTLNOt8OBiZpbZJGSI9ePmB1PLpTrew0GeKaWx1O6kXGMxT4KEjIyhAPzFGrVskl2vZlT1HLNcDGG4XyPIjcionJD7dQalrlZ1vLiKVxKwD/tQAO9XhOGIG2fOok7SL/qH1rfj4I5ORi5My+Y4mHrjBxVu7GXHc6tPEPZnt2I/+tgw/U1UEYC5gLcuIZ922andHm+5anpVwdlM7W0hP5XJj/iKsfJmkrTN1sZMovuFSNQumPlVqZ6CumQWiiigCiiigEpaKKASilooApKWigEopaKASilooApKWkoCA7Xaj/ZmgavcKQJXhFpDnO8lyRFt6gFj8KwJnIzw8xE+PfWn/anfMsehaapOJZJ72UdDwARR/q1Zlbr3t5axnHDJNHGf9cir/Gq5G7TqlZtei20VjpemWyDCwWkCn1YqGZj7ySa62liyRxZbGQF3+dR93LcW0UUduqcTfsw8xIiiVRu7kdB/Xp1W1s0MQJk72VvG8jDZyfIDkPKvOtstcV9TOjPh4m8qiCFlu1dt8N16eVdd5qFnCnC8io3Lh/Fn3c6hIruJbi3kjdnV5cSc8BWOM71yTOwi2SWpaVBfWk1kBwW0zB5oUGI3YHPFhcEH1/nVUm7M3VvObiB0jdQVyiMBID0lJO/pV/OANuXSoXVroRo2WwMVNzaWwhbdGf3dvJFdxiQgyFJM45HIIqvyeGTfl4m/6amZrnvr64YnIjhlI8s8hULcHxnH5So+XDWzFxuSy8nkitJPGOgALHyG1STPwwRyHOVnWUeeVOdj8K4YSql5DsDxfEKPCvxOPl6V0SNi1t0PtFgT57A/zqyXJna2Ny0eZZEjdSCrqrqRyIYAgirIp8IqgdjLv7xpWmsTlo4/u7b9YSY/0Aq+xHKCpmJqh9LRRQ4JRS0UAUUUUAUUUUAUUUUAUUUUAUUUUAUlLSUBkP2q96NX0Ikfszp0iofNxM3F8sr86z0tJEyyr7cTLIv+ZCGH1Fa79pmny3EWhXixs0VvLcW87gjEffmNkyOe/Cd/51k9xwcbgY3Vgo/dJxUGbcL+WjaYJYNUsrK4UBobyGKfB5cMiBip/Q0lnbSwLLDbTFO7kLQQuf2XdbDgQHlg1V/s61MXOn3WlyNmbTpC8IJ3NtKxO3+Vsj4irfIxiYsY2I5hlGSrD8Q6g1glHsk0y2ErVEffsrH+/aY54H4BPCOIhv3cb1wfe9DjXiE6Iu282Y/Tm+31qYe9kChY5pcAuxaThZssCDguvF12qLbStNv3BvYjOqhVUTMWXwjhGFGF+nX1qEu0vXHzbEgt7xWazqwePh8Dqchl6EGqdrN+8wkOSFGcVZtVljS3js7VVVVQRgKAFRFGAABVF1yaK3iSBDxMfbbzPUVyCuVEoUlZCRyAGdid5GAJ/cGdq47h/EfP+JpGlIOB02x0zXmiSXEgVQT5n9a9OKpGebs94QZAp/Ah2Hm5FOkfidsHKqoCnzwMk0ySRUAhjPhXbI6nkT/Kmpy94x8wK7XkqfoaL2AuCI76DPhSaKVR5d4pU/oK1e2bKL7qxTsNOEv7mIkDvbdWXfmY3BwPma2SxbKL7hXUZJ/USFFFFdIBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBSUtJQFS7f3Dw9nZgqA/eLu3gLE+wBxSBh6+HFYfc4MyAdIgPrmtZ+0rUUS10/S0I7x5Dey8iVVQ0aD45Y/D1rJDl7lsAk+FECglmPIBQNyT099Q5Zsw7RPbQtTn0fWrO8gHEDKIJo84EkMxCsp+hHqBW4m4XJUjfy61jA7L9o7U219eWf3eAXtrEO8ljaQu0i+Hu4izZHUHGK2SaJZo2VgDueHzB9DWfUNWqJQ33POdrb2nCjbmRioybUrWENw+JhkKo5D3mo++stQjYtFKWT8r7kfGomRJwDx8QPoMVi5ZsjBeWOvtUYCRscTnJwKo17cTXFz3jnJBOB0AqzXEZCtseRqttbl5ZCc8Pj642UZP8B8a2YEkxk2VI5IopbiYRRLxO7YUDYZPXPlXfc9xYo1pCwebGLiUHwg/kT+NdkEMdsjMNgqPxMPadgOQPlUJJks5PPJNak+5mZqkMXJGfj9a6UU8IPovywKS2iyqk8mUYz6HeuoJhEGOcYPwVitdbKkdmg3P3PVbCUkBROsb5OwSTwH9a3XTZQVXf0r56GQyEdfDn1FbR2X1AXdhZS8WWMYSTf8aeFq4irKvJdRyFLTI24lFPqRQFFFFAJRS0UAlFLRQCUUtFAJRS0UAlFLRQCV5XE8VtBc3MpxFbwyTyHIGFjUudzt0qN1ftJ2d0Mf/JX8MUpGVt1zLctkZGIY8vg+ZAHrWbdrPtFg1Wwn03R7eeOG6Vorue9SNXMf5YUR2xnqT8uo7RJRbKnruuS6rf3d9MfFNIXCg5VEGAiDPkABU92L0de7fXrxljBWZbDvApComRLd+LPLdVONsE+VV/QuzsusSyTzu0Ok2nFJfXbq3CQg4mhiI5sRz8gc88A3PUTe6tpUcemWs9tpvfRw21tErIbmCDwIJBz4NgQD5ZNQdLYvbb+VcHXpD32u6h2gkVxHogtodPtvvHGzNdBu+S8jAOAwx8sDptZLaVpIVMgCyrlJlBBCTIeF1yNtjmjSLFLPT7O0OCYoQJNgAWIy4OAMgHb4V5T8NrqQTYJqUTzKOQFzBwo4A/eXhPwNZsytWdxSuTiesiLICGANcM1jEQcqMV3gmvCdm9nzIA95OOVYmjUmyuXtiCpWJCzkhVVFJYsxwAMedV640O4t0e4nAROJ4FVCGd5kcM6gjbC4APy92htDciTEcpgt0V1BkjRXV/EBNGAS/GMnDHHPkah9RgMASJYz3UbiUmMtiINkmI9cuCSD5HzetuLH2K2VPUdzooN2vCgXyGceZzvULMhAcjmMkfPFWfUYFSYfkBypxtwMCVOKhpIUdCV25qQcHxc6ugyyW6POzK4iHUEZ5bZ3rqwGLrsDFK4I5eFwD+tRts3dyAMSCQyseWDk4P8AX8alJAFKzHIEg7uUgbowGze7r9akyo5GjKsw9eJT5HqKu3Ya+Kvd2hYYytxGCd9zwvgfKqmeEkMwzkAMRyz0NdGmz/2ff2l6hPBDKO+UdYm8DkAb8t/hXLITVqje7STiRfcK66h9MmV0XByCAQfMdDUwDkCrDIFFLRQBRRRQBRRRQBRRRQBRRXjdXMFpbXV1O3BBbQS3EzYJ4Y4lLscDfkKAfJJHEkkkjqkcaNJI8jBURFGWZmOwA61k/av7Rp52l0/s7I0UALJNqIGJZehFqCMqv73M9MYy1f7Udt9U7R95axr900gScSW6n9rcBTlWumBwccwo2B8yoIqrbEY6gVJIujDywcvI7yOzPJIxZ3dizux5lmbcmmnmB5U8dKQjLN8KkWFy7Etd6hdzadPdXBsrfSrlIYeM93D39xGxKJ7OTg7+tadEkUSMqKBFDF3aINgEiXJHzrPvs4iAl12YryWwhDfGaRlH0NaC2O7A5d4yx+WzeNz/ALQ1UT5M83vR6LxK0SMRxlfEVGBhAM4HvIqD14st52ZkHMTTfOQLmpwEtIrE793uAeRdi38qh9aUG57NHbe9dR7grYqjJ9LLNPtkX74ZJgqBy6V4tHxMjEYAZTy22Oa9WwoLHAA3zXNJcHcKCPCGJIJwpPCDgeZ2HU9AelCi2XOVHVNuBwNh27w8eFJXxRrtxZHJieRO1ebQRIsMRUSO6SFVkckzMCqnvGO/XJPkD5VyA3MgkPBngTBWQkKiFgT3nDk5YhcgZJwFwMnLxFOv3hZLhnu5VzdzDC/doW9mCADIBP8A5Odq13ZlqiB7QaDZi2u7qCQRvb/47SHwTzswzHCvmOWB7vwkigNCyd4wIIJGQMEEDk6nltyNW/t3rEFrBBoVlg3aIv3pwSRZRsvhgTP4yPaOdgfNts8gubm2UIjgoOaOOJPgOfyNTUHVmrHN1Ujrm7qUAhFEiEhttmB8wRmvSG4bgMThmU4AJySMcsY326bVzNeyspJhgUkcxxHHzNcTPI5PiOPTYfSpKD8k5Sj4JPvxGSgIZDgYJBx7qejqwx6ZU+Y8qh+KReTsPTJxXvDckMAxyPrXJQZFSTNn7Hag1zp1srnMlv8A3ZyT7XABwt8Rir1EwZRWSdiLo4uos+ENFKPewKn9BWp2knEi+4V1cGSapnZRRRXSIUUUUAUUUUAUUUUAVRPtD7StpFhHpkVuss2t297btJITwQW+Fidgo5seLw77Yz6G9HkayH7WZIWvezkQb9vHa3skidVjllQIT7+Fse6uolFWzN8Y4l8mxStzX3CgnDZ/MPqKG6D3VMvHLyo6n4UAqABkZO2CRmumKyv7gjuLS5kB2ysTBf8AcwA+tdSb4ITnGCuTovP2dSba3ESMAwTc9yzK0eceQH61fTgyqvRYg3rmUlf0Vv8AdWZdmLbWNIv/ALxLCi200TQXKGZTIUO4ZFTIyDyyauj61iRpIrYZLE/tpCdggjUEJjkM9etd+Eyze0Tyc/VNJje80/tv+CdVvFcNsDxEDH/LQL+oNQWuPw6n2WtlGcXBYAfljiUk+7xVztq+pNxBZEjDFiRFGo9oknc5PXzrkklmmfvJpHkfGOKRizY22yenKrV03JJVJpHnP2iwYpd0IOX8f9LI8kLsF72Hj34Fd14VwCzSSAH2VAJPny67Pit0bhYhuEsXjDbSMWHCJJOQ4yPTwg8Ixvmt2cogu7OXbCTxlvLhJ4T9DVtmjaSR0Oe6Cs07lgoES8wWJ24uRPQZ86o1Wm+HaSd2bOm9ReujKTVNP9/2eDEGMGIKsEZbuNvDJIAczMPyr+H583GK72j7Q23Z+1ayt27zWZ17zhYhjaF9++uDy4+qr57nbY8PaTtxbwBrLQ3WWcELJfAAwRcBzw2qMN8HBDHbbYHmM1llkkd5JHeSWRmd3dizuzHJZmO+T1qmMPLPajC92JLJJI7u7M8kjM7s5LMzMclmJ3z515gZYAcutH1PWnjwKSetXlp5SsWZY1+PoPOncIAwOQ2psQzxSHmxOM/lpzGhw82A88Uzwc8705hmmEYyRXAXLsReEXzwk7vC3x4CGG3zrZ9OfKLv0FYD2TmEGt2BPKYyQfFlOK3jS28C+4VXVFWTknKKQchRQrCilooBKKWigEopaQ0BzXV9Y2a5urmGHIyolcBmHLKr7R+VYx2i06917XNU1L7zbxW80iJbLJ3kkqwQoIkHDGvAM4Jxx9fOtE7XQQtFBOYIDKA8HfyyOskagiULEoPCS3izkVTVwK36bTRyx7mzwOodUzaTI4QS+5AJ2VtyF7y+mYjBPdwog+HEzGu6Ls7ose7xSzH/AJ0zkf7U4R9KlAaXNelHT448I+dy9U1mXnI19tvwecNpY24HcW1vFjqkSA/PGfrXRknqTXnmlzV6SXB50pSm7k7Y+im5pa6QocDRmm0tCIp3B9RXX20eefsk11DJIuG0+W4CMQJIi3dOkgHMcRBwfL0rjqUki/tDsrrlljLLa3qIP3lX7yn1Fed1CNwUvRn0Ps/l7NQ4eq/Bi3esx5/OvRSPieZrnXcj510oDXln34oFJKchUH4iF/nT68h4pR5ICTjzO1Dp6bAADkBgfCmmnH3/ADpvxroGNXm3I05iRmhRxY8sgH51xs4SfZ6GWbV9JCD/AA7gTMd9kj8RNbxpZPCtZL2Kto/veoyFsyxrFCFx7KMzEn4kfStf0yMhV+FVlM3uTY5CigchRQgLRRRQBRRRQBXPd3MdpBJPIGKpwjC44mZiFAGdq6Kh+0N3Y2Ok6ndX2TbQ25Yqp4XeXIESIfzFuECgIfVb+LUIO6SJkkWSORTLwPGCMg5A9CcVWGWa1SeJ4l4ZSg7x0BOEbIMb9M9aXTdVuLiws7+ezdEmjZ27n9qAAxXi4R48HGRsal7W8sr2MvbyxTJkhuBlbhPky8wfeKYNbLC3Fq0ZNf0mOqSnGVNeSBozU3PY2smcII36PGMb+qjaoeaCe3bhkXYnCuN1b3GvcwazHn2WzPjdb0vPpN5br1QylBpmaXIrXZ5dD80uaZmlzSyNDs43o4jsfXem5/Sm5OKWEj1Ukkg1NaBKve3du/syxq+PRW4G+hqBDHIru02Xur60YnCu5hb3SAp+uKp1EO/HJGzQz9zqYT/v+djKbu1a0v8AULRs5tbqeD/85GUUnlVg7Z2v3btJqjcOFult7tccsyxgN9Qar2flXgrdH6fF2rFLYBpIxhc48Tni+HSmMSxVR+IgfDrXqSBtjfyrp0Ceud6YTSkH/wBc6YVB5k0A1iBnG5Ne8EeUL+RGD65ArmYAcjUvp1hcX7wWkORxAPM2R+yi4lDOAefPYfyqMjhZuwas8+syldmktkDeZBkYjPxFa/YLhF9wqm9n9JgsLeG2t1YRoSxLHLu7HJdyOp/rlV5tUKqPcKiUN27OuiiihwKKKKAKKKKAD1rHftS11p7y20KBj3VgBd3gGMPdSJmND/kU5/1+laV2l1aXRNE1XVIYUmltIo2jjlYrGWklSIFyN8DOSM74x12+cry+uL66vb24cSXN1NLczMBgNI5LHAHIdAK6kTgvJrGjiCPTNLSNuNFsrYBhjf8AZrnlXcsdqrtIkUaysBxuiqrsByDEDJqF0iGOz07ToYpC6i2icOTniMg7wkemScVJK/rvWCT3ZpSOzizSOI3RkcAqwwQeteQYY504scV2Lp2iE4qSplelxFcXFvnePhZSfxRvup/gfdSA156slxDqVvc8Dm2lgMLyAEqr8RYByOXpRxV9VpsvvMakz866jpVp88oxW3g9QaXNeXFTgdudaLPNaH5o8NMzSNk0sJHrxAdRShypDD2lIZfeNxXhuN6VW291A41ujj+0KJZJND1JB4bi2kgY+qkTL/3H5VQy2+K0XtIou+yySc3068Q+5CTGfow+VZoWPFj1r59x7JOPofpmky+9wxn6o9kBJ4vy7D3mvbZRv7XWmKOEYHtdT0FLjHqa4axCcnOKYc0/ck0xjQDMZIHmQPnWl9k7Ii070oP7xMXU9SigRj4bHFZ3aQSXN1bwRqWklkVFAGefM7dBzPuradAsmt7aygdg7QQxxM6ggMUGMgGoPkrmWPT7QKqnFTKqFArxtkCoK6K4VBRRRQCUUtFAJRS01s4291AZB9qusTS3lhocbkW8EK312FJAkmlLCNW9FAJH+b02zTCgch8cfxqydubxLztV2gkTdYrhLNfIfdYkgb6hqrOMnLb+/kKmi5bIu3ZS8V9Pnt2lZjb3B4EznuonUEcPXGeKrGkwI9rI8+tZrpd7/Z93HPhjGytHKqe0UbqOmx3/APdXCHVdKnIEd3Hx+TZjO/o+KwZsbUrRog00WBJj5/WvdZSahlnTw4cHbbfpXQJyN87CqE6JOJJllIIPIjBz19DXJ/Z9tK44eJFBy3dnAI91eP3jPLP/AJOwqShIjj4m5AGRgeoA5f151qwZJxdxdGLVYceSPbkimcj6XbE4jeUEHhYkqw49jjcdBu2+2QOZwGNpMg2ScE4yeNMYB5ZIJqQj8IPHjKZDkcyf8SQ/Fs/IU9WKhmIy27kdOI4AG/wFblqsq8nkz6ZpZf0EK+n3ycWBG4XAYo+ME8geLG/L51zyw3MQzJFIgzgMykAnyB5VYi0asxkcLDbKzyO3IEKXkkOfIfqaybVNTm1m+uL2YuISTHaQ8RCxW6nwLgdep9Sa0Q1s/KMsuh4pfRJr+S4Et1z8aUHHWqfFqd9BGsUUzCNfZDBXwPIFwTj417DWtSH/ABVP+aOP+ArWtXAxS6Hn8Nfv+C5BfvOma9ZHfvrN5EH7ygj+XyrL0wHDPkAKSduo2qywdotQgkL8MD8UUsRV0IGJEK58JHLn8KgHYmcnOwXnWDNKMpuUfJ9B07Bk0+FY8ngUSLgcOQPUHHzpeLPPY0wsfCTyOx9D50np/QPpVR6Q40xjvRxedNNDpNdnrLU7i6N3YLC0lg8T8M7lFkL8QMYYA7kZ+dbdpMR4UJXBKglc54T5ZFUbsXpxh022dlxJdu102efC2FT6AH41pdhCFVdqgyiTtkkgwop1AGBS1wiJRS0UAUUUUAVz3c6WtvcXMnsW0M1w+/4YkMh/SuioftOSvZztOQcEaPqWCPWBhQHzbLM0ryzyktJM7yv5s8jFz9TXmMndvgOg99H4z6AAemacedTLwGBTsgg5poooB6yTpgRTSpjfwuwA9wzVh0PVNWnka1eCW9RQC0qcKvAPORmwpHvINVytL0G3t4tK0ZY41UTwLcTY/wCJKycRZzzJ/l6VXOMWt0cc3Hc87ZhLdRxDIK8burAggKMZ3HLJ+lTTOAYxjYsXYZ/BEOMj58I+Nc0mwhb8Rzk9d8ivRQGZQd8wx5z6zEH9B8qqjFRVIrnJyds98kKqtjJxxe/22+tP4hlMnbPGx9E5fX9KYQOJfcx+oowP+pR8AvFUisr/AGv1P7ppLWqvw3WqMylRzW2DcUhPoThfn5VnsZHAnuqQ7SzTTa7q3euz91cPBEGOyRRjCoo8h/XOouP2R8auiti6KpHtkUnFTaBUiYpbNMJw6n8wKmikbl8RQDm3XApA2wopvU0OgedOiTvZYYs472WOPbcgOwXYUxq7tGVX1fRlYAqb+1yDyOHBocfBt2kWyII0UAKgVFA5BVHCAKt0CBUG1QGkKpC7VZFAAFVlAtFFFAFFFFAf/9k=" alt="logo of website" srcset="">
                         <h3> the control panel</h3>                               
                         <label for="id">ID</label>
                         <input type="text" name="id" id="id">
                         <br>
                         <label for="name">Student_name</label>
                         <input type="text" name='namee' id="name">
                        <label for="address">Student_address</label>
                        <br>
                         <input type="text" name="address" id="address">
                             <button id='add' name='add' >Add_student</button>
                              <button name='del'>Delete_student</button>
                                 <button name="up">update</button> 
                              <button name="delall">Delete_all</button>   
                               <input id="button" name="search" type="submit" value="search">
                               <button name="e">Exite from search mode</button>  
                    </div>
                 </aside>
          </form>
    </div>
    <script src="search.js"></script>
</body>
</html>