<?php
include 'C:\xampp\htdocs\Project\MyCode\HTML\header_user.php';
?>

<link href="http://localhost:8012/Project/MyCode/Stylesheets/introstyle.css" rel="stylesheet" />

<br>
<?php include 'connect_db.php'; ?>
<br><br>

<div class="new_control_form_now"><br>
    <a href="intro.php">
        <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:50px;" title="Back to Process Selection"> 
    </a>
    
    <form name="f_introLink5" method="post" >

    <center><br><br><br><br><br><br><br>

    <div class="intro_img">
        <img src="http://localhost:8012/Project/MyCode/images/intro8.png" height="350px" width="400px;">
    </div>

    <div class="intro_text">

        <table border="none" style="border:none;border-collapse:separate;border-spacing:1em;" >

            <tr>
                 <th style="border:none" height="40p;"><font color="red" align="center" family:"Arial Black" size="4">WHAT IS DONE WHILE CONTROL TESTING ?</th>
            </tr>

            <tr>
                 <td style="border:none" align='justify'>--As a tester of a control, you need to verify via sample checks or specific reports that the controls have taken place in the process as they should.</td>
            </tr>

            <tr>
                 <td style="border:none" align='justify'>--When you have reviewed your samples (“sample” can be set of reports, invoices, credit notes, approvals etc.) as described, you store your samples or sample specific information into your business own workspace dedicated for the purpose (you may need to define a space) and report your findings into Internal Controls –tool. You need to be able to tell later on which samples you actually tested.</td>
            </tr>

            <tr>
                 <td style="border:none" align='justify'><font color="red" align="center" family:"Arial Black">--Control can either “PASS” or “FAIL”. There is no partial passing or partial failure options.</font></td>
            </tr>

            <tr>
                 <td style="border:none" align='justify'><font color="red" align="center" family:"Arial Black">--If any of the attributes, conditions listed in the control evidence are not done as defined, the whole control fails.</font></td>
            </tr>

            <tr>
                 <td style="border:none" align='justify'>Example1: 15 rebate note samples are reviewed from a) performance calculation perspective (all customer purchases and payments need to meet the rebate policy and contractual conditions) and b) approval chain perspective (all predefined approvers in place). In 2 samples calculation does not match the true customer performance -> control is “FAIL”.</td>
            </tr>

            <tr>
                 <td style="border:none" align='justify'>Example2: Correct usage of product prices is verified by reviewing a comprehensive comparison report of a) prices used in all contracts signed during period X b) price list released to be used during period X. 4% of the prices found from the contracts are not as per price list -> control is “FAIL”.</td>
            </tr>

            <tr>
                 <td style="border:none" align='justify'>--When testing the controls and reporting failures, write detailed information to IC –tool why/what part of the control description has failed. By doing this we are able to see what areas of the controls require special follow up.</td>
            </tr>
            
        </table>

    </div>

</div>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>