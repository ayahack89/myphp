<style>
     body {
          margin: 0px;
          padding: 0px;
     }

     :root {
          --b-color1: #334155;
          --b-color2: #475569;
          --b-color3: #64748b;
          --b-color4: #9ca3af;
          --b-color5: #e2e8f0;
     }

     .nav {
          display: flex;
          background-color: var(--b-color1);
          padding: 10px;


     }

     .nav .menu ul {
          display: flex;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

     }

     .nav .menu ul li {
          list-style-type: none;
          padding-left: 25px;

     }

     .nav .menu ul li a {
          text-decoration: none;
          color: white;
          font-size: 1.1rem;
     }

     .nav .logo {
          margin-right: 10%;
     }




     .nav .logo .logoText .bigtext {
          color: gainsboro;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          font-size: 2rem;
     }

     .nav .logo .logoText .smalltext {
          font-family: sans-serif;
          color: var(--b-color4);
          font-size: 1rem;
     }
</style>
<div class="nav">
     <div class="logo">

          <div class="logoText">
               <span class="bigtext">fsociety<br></span>
               <span class="smalltext"><i>"Your Hidden Society"</i></span>
          </div>
     </div>


     <div class="menu">

          <ul>
               <li><a href="topic_listing.php">Forum</a></li>
               <li><a href="../chats/chatroom.php">Live Chat</a></li>
               <li><a href="../profile.php">Profile</a></li>
               <li><a href="../members.php">Members</a></li>
               <li><a href="../rateus.php">Review</a></li>
               <li><a href="#">FAQ</a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="../logout.php">Logout</a></li>
               <li><a href="../index.php">Home</a></li>
          </ul>

     </div>
</div>