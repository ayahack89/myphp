<?php 
/* Three step to set & get the session value;
Step 1: session_start();
Step 2: $_SESSION[name]=value; Set session name & value;
Step 3: echo $_SESSION[name]; Get session value;

If you want to delete a session;
Step 1: session_unset(); Remove all the session;
Step 2: session_destroy(); Destroy all sesston;
*/

session_start();

$_SESSION['AYANABHA'] = "411";

echo "Session is set.";

?>