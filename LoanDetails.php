<?php
include 'server.php';
require('fpdf/fpdf.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-BURSARY | Loan Details</title>
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="static/bootstrap4/css/bootstrap.min.css">
    </head>
    <body class="body">
        <!--Navigation Bar section-->
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="#top"><span class="navTitle">E</span>-Bursary System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="studentDashboard.php" >Home</a>
                <a class="nav-item nav-link active" href="application.php">Application</a>
                <a class="nav-item nav-link active" href="loanStatus.php">Loan Status</a>
                <a class="nav-item nav-link active" href="studentComplaints.php">Complaints</a>
                <a class="nav-item nav-link active" href="studentDownloadPage.php">Downloads</a>
                <a class="nav-item nav-link active" href="logout.php">Logout</a>
              </div>
            </div>
          </nav><!--end of Navigation Bar section-->

          <table class="table loanDetails-table">
            <tr>
                <th>Date Processed</th>
                <th>Admission Number</th>
                <th>Amount</th>
                <th>Cheque Number</th>
                <th>Payment Status</th>
            </tr>
            <?php
               $regno = $_SESSION['username'];
echo $regno;
            $loanQuery="SELECT * FROM loandetails where regNumber='$regno'";  
               $loanstatusResult=mysqli_query($db,$loanQuery);
               if ($loanstatusResult->num_rows > 0){
                while($row = $loanstatusResult->fetch_assoc()) {
                  echo "<tr> <td>" . $row["date_processed"]. "</td>";
                  echo "<td>" . $row["regNumber"]. "</td>";
                  echo "<td>" . $row["amountAllocated"]. "</td>";
                  echo "<td>" . $row["chequeNumber"]. "</td>";
                  echo "<td>" . $row["paymentStatus"]. "</td> </tr>";
                } 
               }
            ?>
          </table>
          <div class="action-center">
              <!-- <button type="button" class="btn btn-primary print-btn">Print Report</button> -->
            <!-- <embed src="bursary-forms/somu bursary-2019.pdf" width="1000" height="300"> -->
       <form method='POST' action=''>
<input type='submit' class='btn btn-success' name='pdf_btn' value='View PDF'>
       </form>


<?php 
//include connection file
include_once('fpdf/fpdf.php');
 

$pdf_fetch_query="SELECT * FROM loandetails";
$pdf_fetch_result=mysqli_query($db,$pdf_fetch_query);


if(isset($_POST['pdf_btn'])){
   echo "working";
}

?>
          </div>
 
 <!--Footer section-->
 <footer translate="no" class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col">
          
            <h4 class="footer-menu">MENU</h4>
            <a href="studentDashboard.php" class="footer-menu">Home</a>
            <a href="application.php" class="footer-menu">Application</a>
            <a href="loanStatus.php" class="footer-menu">Loan Status</a>
            <a href="studentComplaints.php" class="footer-menu">Complaints</a>
            <a href="studentDownloadPage.php" class="footer-menu">Downloads</a>
        </div>
        <div class="col-6">
          <h4 class="footer-heading">MASENO UNIVERSITY</h4>
          <p>Maseno University is a public university based in the Maseno district of the city of Kisumu, Kenya, 
            situated along the Equator. It was fully fledged as a university in 2001, after being a constituent 
            college of Moi University for a decade. It is one of public universities in Kenya.</p>
        </div>
        <div class="col">
         <h3>Social Media</h3>
         <p>Maseno University social media handles include:</p>
         <a class="fa fa-twitter fa-2x" href="https://twitter.com/maseno_uni" target="_blank"></a>
         <a class="fa fa-facebook fa-2x" href="https://facebook.com/MasenoUniversity" target="_blank"></a>
         <a class="fa fa-instagram fa-2x" href="https://instagram.com/maseno_university_" target="_blank"></a>
        </div>
      </div>
      
    </div>
    <p class="copyright" style="text-align: center;">Maseno University &copy;<span id="currentYear">2021</span></p>
  </footer>
  <!--end footer-->


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>