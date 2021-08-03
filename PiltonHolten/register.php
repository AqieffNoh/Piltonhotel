<?php
    require "header.php";
?>

<main>
    <section>
        <h1>Request as a seller</h1>
        <form class="s_regis_form" action="includes/s_regis.inc.php" method="POST">
            <label for="name">Full Name: </label>
            <input type="text" name="name" placeholder="Fullname" required>
            <label for="birthd">Date of Birth: </label>
            <input type="date" name="birthd" placeholder="Date of birth" required>
            <label for="email">Email Address: </label>
            <input type="text" name="email" placeholder="E-mail" required><br>
            <label for="phone">Phone Number: </label>
            <input type="text" name="phone" placeholder="Phone number" required>
            <label for="desc">Description: </label>
            <textarea  rows = "3" cols = "100" name = "desc" placeholder="Tell us why you which to become a seller or what are you going to sell..." required></textarea><br>
            <label for="r_date">Request date: </label><br>
            <label for="r_date">pick today </label>
            <input type="date" id="r_date" name="r_date">
        <br>
        <h>Please note that your information will be sent to the Pilton admin to verify, Please fill in carefully.</h>
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
    </section>
</main>




<?php
    require "footer.php";
?>

