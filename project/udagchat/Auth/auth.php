<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: ../users.php");
}
?>

<?php include_once "../header.php"; ?>
<?php include_once "../php/alerts.php"; ?>

<?php
if (isset($_GET['auth'])) {

  if ($_GET['auth'] == 'login') {

    require 'login.php';
  }

  if ($_GET['auth'] == 'signup') {

    require 'signup.php';
  }
}

?>





<footer class="p-4 shadow md:px-6 md:py-8">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="https://www.thunderdevelops.in/sendbox/" class="flex items-center mb-4 sm:mb-0">
            <img src="../php/images/sendbox_logo.svg" class="mr-3 h-8" alt="Logo" />
            <span class="self-center text-sm font-bold whitespace-nowrap items-center text-gray-900">Powered by Thunder Develops</span>
        </a>
        <ul class="flex flex-wrap items-center mb-6 text-sm  sm:mb-0 text-gray-500">
        <li>
                <a href="https://www.thunderdevelops.in/about-us.php" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="https://www.thunderdevelops.in/contact-us.php" class="mr-4 hover:underline md:mr-6 ">Contact</a>
            </li>
            <li>
                <a href="https://www.thunderdevelops.in/privacy-policy.php" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <!-- <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Terms of Services</a>
            </li> -->
        </ul>
    </div>
    <hr class="my-6  sm:mx-auto border-gray-700 lg:my-8" />
    <span class="block text-sm  sm:text-center text-gray-400">© 2023 <a href="https://www.thunderdevelops.in/sendbox/" class="hover:underline text-cyan-800 font-bold">SendBox</a>. All Rights Reserved.</span>
    <span class="block text-sm sm:text-center text-gray-400">
        Design & Developed by
        <a href="https://www.instagram.com/krishpanchani/" 
    target="_blank" title="Krish Panchani | Instagram" class="hover:underline text-gray-800 font-bold"> Krish Panchani </a> And Powerd by 
    <a href="https://www.thunderdevelops.in/" target="_blank" title="Thunder Develops | Official Website" class="hover:underline text-gray-800 font-bold">Thunder Develops. </a>
    </span>
</footer>

<!-- Blocker -->

<script>
  document.addEventListener('contextmenu', event => event.preventDefault());
  document.onkeydown = function (e) {
    if (event.keyCode == 123) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
      return false;
    }
  }
</script>

<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script>
  function nospaces(t){
  if(t.value.match(/\s/g)){
    t.value=t.value.replace(/\s/g,'');
  }
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<script src="../javascript/showPass.js"></script>
<script src="../javascript/login.js"></script>
</body>

</html>
