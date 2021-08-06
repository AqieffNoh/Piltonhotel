<?php
    require "header.php";
    $date_now = date('d-m-y');
?>

<main>

<style>
        input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.regis {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  text-align: center;
}

button {
  background-color: #04AA6D;
  color: black;
  border-radius: 10px;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}
    </style>
    <section>
    <div class="regis">
        <h1>Request as a seller</h1>
        <form class="s_regis_form" action="includes/s_regis.inc.php" method="POST">
            <label for="name">Full Name: </label><br>
            <input type="text" name="name" placeholder="Fullname : Felix Ho" required><br>
            <label for="birthd">Date of Birth: </label><br>
            <input style="width: 50%;" type="date" name="birthd" placeholder="Date of birth: 12/02/2000" required><br>
            <label for="email">Email Address: </label><br>
            <input style="width: 50%;" type="email" name="email" placeholder="E-mail : Felix@example.com" required><br>
            <label for="phone">Phone Number: </label><br>
            <input type="text" name="phone" placeholder="Phone number: 01122772391" required><br>
            <label for="desc">Description: </label><br>
            <textarea style="width: 50%;" rows = "3" cols = "100" name = "desc" placeholder="Tell us why you which to become a seller or what are you going to sell..." required></textarea><br>
            <label for="r_date">Request date: </label><br>
            <input type="text" id="r_date" name="r_date" style="width: 10%;" value=<?php echo $date_now?> readonly>
        <br>
        <h>*Please note that your information will be sent to the Pilton admin to verify, Please fill in carefully.</h>
        <h>You will receive an E-mail once your seller account is verified. Stay tuned</h>
        <br>
        <button type="submit" name="s_regis_submit">Send Request</button>
        <br>
        <?php 
            if(isset($_GET["error"])){
                if($_GET["error"] == "failed") {
                    echo "<P>Your request failed to send, please try again.</P>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<P>Your request have beeen sent successfully!</P>";
                }
            }
        ?>

        </form>
        </div>
    </section>
</main>




<?php
    require "footer.php";
?>

