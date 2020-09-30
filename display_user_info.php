<html lang="en">
<!--Corey Scott CIT 253 Assignment 5 9/27/2020 -->
<head>
    <title>CIT 253 - Corey Scott Assignment 5</title>
    <meta charset="UTF-8">

    <!--Bootstrap for styling-->
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<?php
    // error reporting

        error_reporting(E_ALL);

    // get string variables from form
    
    $name = $_POST['fullName'];
    $phone= $_POST['phone'];
    $email = $_POST['email'];
    $notes = $_POST['notes'];

    //string functions to manipulate input

    $nameCase =  trim(ucwords(strtolower($name)));

    // explode name and name variables for array elements

    $exp = explode(" ", $nameCase,2);
    $first = $exp[0];
    $last = $exp[1];

    //remove special characthers from phone number
    
    $newPhone = str_replace('(','',$phone);
    $newPhone = str_replace(')','',$newPhone);
    $newPhone = str_replace('-','',$newPhone);
    $newPhone = trim(str_replace(' ','',$newPhone));

     //look for @ sign in email

     $lookFor = '@';

     //username veriable   

     $username = strstr($email,$lookFor,true);

     // domain name variable

    $domain = strstr($email,$lookFor,false);
    $domain = substr($domain,1);

    //strip tags from notes

    $noteStrip = strip_tags($notes);

    //search and replace spaces with -

    $newNotes = str_replace(' ', '-',$noteStrip);

    //split notes into 30 charachters

    $finalNotes = str_split($newNotes,30);

    //convert newline tags into break tags
    
    $finalNotes = nl2br($finalNotes[0]);


    
    

?>

<body>
    <div class="container">
    <table class=" table table-dark table-bordered table-striped shadow p-3 mt-4 border">
        <thead class="thead-light text-left">
            <tr>
                <th class="display-4 font-weight-bold" colspan="2"> Your Information: </th>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <td class="text-right">First Name:</td>
                    <td class="text-center"><?php echo $first;?></td>
                </tr> 
                <tr>
                    <td class="text-right">Last Name:</td>
                    <td class="text-center"><?php echo $last; ?></td>
                </tr>
                <tr>
                    <td class="text-right">Telephone Number: </td>
                    <td class="text-center"><?php echo $newPhone?></td>
                </tr>    
                <tr>
                    <td class="text-right">User Name: </td>
                    <td class="text-center"><?php echo $username;?></td>
                </tr>
                <tr>
                    <td class="text-right">Domain: </td>
                    <td class="text-center"><?php echo $domain;?></td>
                </tr>
                <tr>
                    <td class="text-right">Notes: </td>
                    <td class="text-center"><?php echo $finalNotes;?></td>
                </tr>
                <tr>
            <td><input class="btn btn-light btn-lg " type="button" onclick="window.location.href='/school/CIT_253_Assignment5/user_input.html';" value="Return to Input Form" /> 
            <td></td>
        </tr>  

            </tbody> 


    </table>
    </div>


</body>


<html>