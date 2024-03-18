<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregnancy Test</title>
  <link rel="stylesheet" href="image/bootstrap.min">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .gradient-custom-2 {
background: #fccb90;

background: -webkit-linear-gradient(to right, #7BC1B7, #0B8FAC);

background: linear-gradient(to right, #7BC1B7, #0B8FAC); 
}
.gradient-custom {
color: #fccb90;

}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
.container{
  margin-bottom: 2%;
}
    </style>
</head>
<body>
    <section class="h-100 gradient-form" >
         <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100"> 
            <div class="col-xl-12">
               <div class="card rounded-3 text-black"> 
                <div class="row g-0">
                  <div class="col-lg-12"> 
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="image/Borcelle logo.png"
                          style="width: 185px;" alt="logo">
                        <h1 class="mt-1 mb-5 pb-1 gradient-custom">Pregnancy Test</h1>
                      </div>
      
                      <form action="Pregnancy_result.php" method="post">
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="spid">Select Patient ID &nbsp;&nbsp;</label>
                          <input type="text" id="spid" name="spid" class="form col-lg-3" required /> 
                          <label class="form-label mb-2" for="slno">&nbsp;&nbsp;&nbsp;&nbsp;SL.No&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="number" id="slno" name="slno" class="form col-lg-2" required />
                          <label class="form-label" for="date">&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="date" name="date" class="form col-lg-3" required />
                        </div>
                       
                        <div class="form-outline mb-4">
                          <label class="form-label mb-2" for="pidn">Patient Id No.&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="pidn" name="pidn" class="form col-lg-3" required/>
                          <label class="form-label" for="receivedate">&nbsp;&nbsp;&nbsp;&nbsp;Recieve Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="receivedate" name="receivedate" class="form col-lg-2" required />
                          <label class="form-label" for="reportdate">&nbsp;&nbsp;&nbsp;&nbsp;Report Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="reportdate" name="reportdate" class="form col-lg-2" required />
                        </div>
                        <div class="form-outline mb-4">
                          <label class="form-label" for="pname">Patient Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="pname" name="pname" class="form col-lg-5" required />
                          <label class="form-label" for="gender">&nbsp;&nbsp;&nbsp;&nbsp;Gender&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <select class="form-select-lg-2">
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Other">Other</option>

                          </select>
                          <!-- <input type="text" id="gender" name="gender" class="form" required /> -->
                          <label class="form-label" for="age">&nbsp;&nbsp;&nbsp;&nbsp;Age</label>
                          <input type="number" id="age" name="age" class="form col-lg-2" required />
                        </div>
                        <div class="container">
                          <label class="form-label" for="RefbyDR">Ref by PROF/DR &nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="RefbyDR" name="RefbyDR" class="form col-lg-4" required />
                          <label class="form-label" for="PatientId">&nbsp;&nbsp;Patient Id :&nbsp;&nbsp;</label>
                          <input type="number" id="PatientId" name="PatientId" class="form col-lg-3" required/>
                          </div>
                          <div class="container">
                            <h4 style="color:brown">Urine for pregnancy test</h4>
                            <strong style="margin-left:5%;">Name of test</strong>        
                                                <strong style="margin-left:50%;">Result</strong>
                            <div class="container">
                              <label for="result" style="margin-left:5%">Pregnancy Test</label>
                              <input type="number" name="result" id="result" style="background:skyblue;margin-left:43%;border:none;">
                            </div>

                          </div>
                                <div class="container">
                                  <p style="margin-left:80%; background: skyblue; width:18%; border-radius:5px;">
                                  <input type="checkbox" class="form" name="ReportShow" id="ReportShow" style="margin-left:2%;">
                                  <label for="checkbox" class="form" name="ReportShow" id="ReportShow">Report Show
                                 </p>
                                </div>
                        <div class="text-center container" style="margin:25px">
                          <button class="btn btn-primary  gradient-custom-2 " name="save"  type="submit">Save</button>         
                            <button class="btn btn-success"  type="submit">Update</button>
                            <button class="btn btn-danger"  type="submit">Delete</button>
                            <button class="btn btn-primary"  type="submit">Exit</button>
                            <button class="btn btn-warning"  type="submit">Print</button>




                        </div>
  
      
                      </form>
      
                    </div>
                  </div>
                  

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php

?>
<script>
    function start(){

            document.getElementById("date").value=formatDate();

            function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
            }

            function formatDate(date = new Date()) {
            return [
                date.getFullYear(),
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
            ].join('-');
            }

    }
    start();
</script>
<?php
 if( isset($_POST['submit'])  ){
    $n=$_POST['t1'];
    $u=$_POST['t2'];
    $p=$_POST['t2'];
    
    $m=new mysqli("localhost","root","","project");
    $q="insert into users where username='$u' and password='$p'";
 }
?>
</body>
</html>