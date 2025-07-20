<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST['btn_sub']))
{
	$name = $_POST['txt_name'];
	$email = $_POST['txt_email'];
	$cardnumber = $_POST['txt_cardnumber'];
	$card = $_POST['sel_cardtype'];
	$question = $_POST['sel_question'];
	$answer = $_POST['txt_answer'];
	$password = $_POST['txt_password'];
	$confirmpassword = $_POST['txt_conformpassword'];
	
	if($password == $confirmpassword)
	{
		$insQry = "insert into tbl_user(user_name, user_email, user_cardnumber, card_id, user_question, user_answer, user_password) values('$name', '$email', '$cardnumber', '$card', '$question', '$answer', '$password')";
		if($Con->query($insQry))
		{
            ?>
                <script>
                    alert("Account Created Successfully");
                    window.location="Login.php";
                </script>
            <?php
            
		}
	}
	else
	{
		?>
                <script>
                    alert("You are entering the wrong password !");
                    window.location="Usersignup.php";
                </script>
            <?php
            
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>e-Ration Hub</title>
<style>
    body {
        font-family: 'Lato', sans-serif;
        background: linear-gradient(to right, #84fab0, #8fd3f4);
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
    }

    .registration-form {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin: 2rem;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        color: #333;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
        color: #333;
    }

    .form-group select {
        appearance: none;
        background-color: #fff;
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #218838;
    }

    .form-group .error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
        display: none;
    }
</style>
</head>
<body>
<br>
<div class="registration-form">
    <form id="registrationForm" method="post" action="">
        <h1>User Registration</h1>

        <div class="form-group">
            <label for="txt_name">Name</label>
            <input required type="text" name="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/>
            <div class="error" id="nameError">Please enter your name</div>
        </div>

        <div class="form-group">
            <label for="txt_email">Email</label>
            <input type="email" required name="txt_email" />
            <div class="error" id="emailError">Please enter a valid email</div>
        </div>

        <div class="form-group">
            <label for="txt_cardnumber">Card Number</label>
            <td><input type="text" required name="txt_cardnumber" pattern="[0-9]{1}[0-9]{9}" 
            title="Card number with 0-9 and remaing 9 digit with 0-9"/></td>
            <div class="error" id="cardError">Please enter your card number</div>
        </div>

        <div class="form-group">
            <label for="sel_cardtype">Card Type</label>
            <select name="sel_cardtype" id="sel_cardtype" required>
                <option value="">---Select Card---</option>
                <?php 
                $selQry = "select * from tbl_card";
                $result = $Con->query($selQry);
                while($data = $result->fetch_assoc())
                {
                    echo "<option value='".$data['card_id']."'>".$data['card_name']."</option>";
                }
                ?>
            </select>
            <div class="error" id="cardTypeError">Please select a card type</div>
        </div>

        <div class="form-group">
            <label for="sel_question">Security Question</label>
            <select name="sel_question" id="sel_question" required>
                <option value="">---Select Question---</option>
                <option value="Enter Your Vehicle Number">Enter Your Vehicle Number</option>
                <option value="Enter a Car Name">Enter a Car Name</option>
                <option value="Mobile Brands">Mobile Brand's</option>
            </select>
            <div class="error" id="questionError">Please select a security question</div>
        </div>

        <div class="form-group">
            <label for="txt_answer">Answer</label>
            <input type="text" name="txt_answer" id="txt_answer" required>
            <div class="error" id="answerError">Please provide an answer</div>
        </div>

        <div class="form-group">
            <label for="txt_password">Password</label>
            <input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_password" />
            <div class="error" id="passwordError">Password must be at least 8 characters</div>
        </div>

        <div class="form-group">
            <label for="txt_conformpassword">Confirm Password</label>
            <input type="password" name="txt_conformpassword" id="txt_conformpassword" required>
            <div class="error" id="confirmPasswordError">Passwords do not match</div>
        </div>

        <div class="form-group">
            <button type="submit" name="btn_sub" id="btn_sub" class="btn-submit">Submit</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        let isValid = true;

        // Name validation
        const name = document.getElementById('txt_name').value;
        if (name === '') {
            document.getElementById('nameError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('nameError').style.display = 'none';
        }

        // Email validation
        const email = document.getElementById('txt_email').value;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            document.getElementById('emailError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('emailError').style.display = 'none';
        }

        // Card number validation
        const cardNumber = document.getElementById('txt_cardnumber').value;
        if (cardNumber === '') {
            document.getElementById('cardError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('cardError').style.display = 'none';
        }

        // Card type validation
        const cardType = document.getElementById('sel_cardtype').value;
        if (cardType === '') {
            document.getElementById('cardTypeError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('cardTypeError').style.display = 'none';
        }

        // Question validation
        const question = document.getElementById('sel_question').value;
        if (question === '') {
            document.getElementById('questionError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('questionError').style.display = 'none';
        }

        // Answer validation
        const answer = document.getElementById('txt_answer').value;
        if (answer === '') {
            document.getElementById('answerError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('answerError').style.display = 'none';
        }

        // Password validation
        const password = document.getElementById('txt_password').value;
        if (password.length < 6) {
            document.getElementById('passwordError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('passwordError').style.display = 'none';
        }

        // Confirm password validation
        const confirmPassword = document.getElementById('txt_conformpassword').value;
        if (password !== confirmPassword) {
            document.getElementById('confirmPasswordError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('confirmPasswordError').style.display = 'none';
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
</script>

</body>
</html>
