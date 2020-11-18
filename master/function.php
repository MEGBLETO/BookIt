<?php
     function emptyInputField($civilite, $nom, $prenom, $occupation, $email, $numero, $ville, $codepostale, $password1, $password2){
         $result;

         if(empty($civilite) || empty($nom) || empty($nom)|| empty($prenom)|| empty($occupation)|| empty($email)|| empty($numero)|| empty($ville)|| empty($codepostale)|| empty($password1)|| empty($password2)){
              
         $result = true;
     }
     else{
       $result = false;
     }
              return $result;
    }

     function invalidEmail($email){
         $result;

         if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              
         $result = true;
     }
     else{
       $result = false;
     }
              return $result;
    }


     function  passwordMatch($password1, $password2){
         $result;

         if($password1 !== $password2){
              
         $result = true;
     }
     else{
       $result = false;
     }
              return $result;
    }

    
//function verifiant si lutillisateur existe dans la base de donnee
   function emailExist($dbconn, $email){
      $result;
      
  
    pg_send_query($dbconn, "SELECT email FROM clients WHERE email= '{$email}';");



     $resultdata = pg_get_result($dbconn);
     $rows = pg_num_rows($resultdata);

     if($rows >= 1){
      $result= true;
              }
         else{
       $result =false;
      

         }

        return $result; 

}
      
      
      
    

    //creation de l'utillisateur
    function createUser($dbconn, $civilite, $nom, $prenom, $occupation, $email, $numero, $ville, $codepostale, $password1){

     
      $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
      
     $query= "INSERT INTO clients(civilite, nom, prenom, occupation, email, phone,ville ,code_postale, mot_de_passe1)  VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9)";
       

      pg_prepare($dbconn, "prepare1", $query) or die ("Cannot prepare statement\n"); 


      pg_execute($dbconn, "prepare1", array($civilite, $nom, $prenom, $occupation, $email, $numero, $ville, $codepostale, $hashedPassword))
    or die ("Cannot execute statement\n"); 

    
      header("location: login.php?error=inscriptioncomplete");
     
    }


/*MEs functions pour le formulaire de connection a la plateforme se trouve ici*/

function emptyInputFieldLogin($email ,$password){
  $result;

  if(empty($email)||empty($password)){
       
  $result = true;
}
else{
$result = false;
}
       return $result;
}



/*-------------------------------------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------------------*/

//function de login

function connectuser($dbconn, $email, $password){



  $resultdata = pg_query($dbconn, "SELECT * FROM clients WHERE email= '{$email}';") or die ("Could not connect to server\n");
  
 // $rows = pg_num_rows($resultdata);

  while($row = pg_fetch_row($resultdata)){
      $id = $row[0];
      $civilite = $row[1];
      $name= $row[2];
      $prenom= $row[3];
      $job = $row[4];
      $dbemail=$row[5];
      $phone = $row[6];
      $ville= $row[7];
      $codepostale =$row[8];
      $dbpassword = $row[9];


      //ici je verifie si le mot de passe que jai dans ma base coorespond a celui renseigner par l'utillisateur
      $checkpwd = password_verify($password, $dbpassword);


  if($checkpwd === false){
    header("location: login.php?error=motdepasseincorrect");
    exit();
  }

  else if($checkpwd === true){
    session_start();
  
    $_SESSION["id"] = $id;
    $_SESSION["civilite"] = $civilite;
    $_SESSION["usersirname"] = $name;
    $_SESSION["username"] = $prenom;
    $_SESSION["job"] = $job;
    $_SESSION["useremail"] = $dbemail;
    $_SESSION["telephone"] = $phone;
    $_SESSION["ville"] = $ville;
    $_SESSION["codepostale"] = $codepostale;
    $_SESSION["dbpassword"] = $dbpassword;

    header("location: profile.php?error=connectionreussie");
    exit();
  }
}
}


/* function pour modifier le profile utillisateur*/

function emptyInputFieldmodif($civilite, $nom, $prenom, $occupation, $numero, $ville, $codepostale){
  $result;

  if(empty($civilite) || empty($nom) || empty($prenom)|| empty($occupation) || empty($numero)|| empty($ville)|| empty($codepostale)){
       
  $result = true;
}
else{
$result = false;
}
       return $result;
}

function moduserdetails($dbconn, $civilite, $nom, $prenom, $occupation,  $numero, $ville, $codepostale){
 
  $email = $_SESSION["useremail"];
  if($email){
    $query= "UPDATE clients SET civilite=$1, nom=$2, prenom=$3 , occupation=$4, phone=$5, ville=$6 ,code_postale=$7 WHERE email='{$email}'";

  
    pg_prepare($dbconn, "prepare3", $query) or die ("Cannot prepare statement\n"); 
  
  
    pg_execute($dbconn, "prepare3", array($civilite, $nom, $prenom, $occupation,  $numero, $ville, $codepostale))
  or die ("Cannot execute statement\n"); 
  
        
  if (isset($_SESSION['useremail'])) {
 //entrain de supprimer certain variable de la session courrente
    unset($_SESSION["civilite"]);
    unset($_SESSION["usersirname"]);
    unset($_SESSION["username"]);
    unset($_SESSION["job"]);
    unset($_SESSION["telephone"]);
    unset($_SESSION["ville"]);
    unset($_SESSION["codepostale"]);

    //set les valeurs mise a jour dans la session courrente
    $_SESSION["civilite"] = $civilite;
    $_SESSION["usersirname"] = $nom;
    $_SESSION["username"] = $prenom;
    $_SESSION["job"] = $occupation;
    $_SESSION["ville"] = $ville;
    $_SESSION["codepostale"] = $codepostale;
    

    header("location: profile.php?error=modifsuccess");
   
  
  }
 
}
}

  
?>