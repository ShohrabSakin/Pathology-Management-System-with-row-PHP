<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lipid Profile</title>
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
<?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
$url = "https://";
}else{
$url = "http://";
}
?>
<input type="hidden" id="url" value="<?=$url.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);?>"/>

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
                        <h1 class="mt-1 mb-5 pb-1 gradient-custom">Lipid Profile Test</h1>
                      </div>
      
                      <form  method="get">
      
                      <div class="form-outline mb-4">
                          <label class="form-label" for="registrationid">Registration ID &nbsp;&nbsp;</label>
                          <input type="text" id="registrationid" name="registrationid" class="form col-lg-3" required  value="<?php if (isset($_GET['vrno'])) echo $_GET['vrno'];?>" /> 
                          <label class="form-label mb-2" for="Slno">&nbsp;&nbsp;&nbsp;&nbsp;Slno&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="number" id="Slno" name="Slno" class="form col-lg-2" required  value="<?php if (isset($_GET['slno'])) echo $_GET['slno'];?>" />
                          <label class="form-label" for="date">&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="date" name="date" class="form col-lg-3" required value="<?php if (isset($_GET['date'])) echo $_GET['date'];?>" />
                        </div>
                       
                        <div class="form-outline mb-4">
                          
                        <label class="form-label" for="receivedate">&nbsp;&nbsp;&nbsp;&nbsp;Recieve Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="receivedate" name="receivedate" class="form col-lg-2" required value="<?php if (isset($_GET['date'])) echo $_GET['date'];?>" />
                          <label class="form-label" for="reportdate">&nbsp;&nbsp;&nbsp;&nbsp;Report Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="reportdate" name="reportdate" class="form col-lg-2" required value="<?php if (isset($_GET['date'])) echo $_GET['date'];?>" />
                        </div>
                        <div class="form-outline mb-4">
                          <label class="form-label" for="Patientname">Patient Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="Patientname" name="Patientname" class="form col-lg-5" required value="<?php if (isset($_GET['CustomerName'])) echo $_GET['CustomerName'];?>" />
                          <label class="form-label" for="gender">&nbsp;&nbsp;&nbsp;&nbsp;Gender&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <select class="form-select-lg-2" name="gender" id="gender">
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Other">Other</option>

                          </select>
                          <!-- <input type="text" id="gender" name="gender" class="form" required /> -->
                          <label class="form-label" for="age">&nbsp;&nbsp;&nbsp;&nbsp;Age</label>
                          <input type="number" id="age" name="age" class="form col-lg-2" required />
                        </div>
                        <div class="container">
                          <label class="form-label" for="referdoctor">Ref by PROF/DR &nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="referdoctor" name="referdoctor" class="form col-lg-4" required />
                          
                       
                          </div>
                          <div class="container">
                          <label class="form-label" for="testname">Testname &nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="testname" name="testname" class="form col-lg-5" required value="<?php if (isset($_GET['test'])) echo $_GET['test'];?>" />
                        </div>

                       </div>
                          <div class="container text-center"> 
                            <h4 style="color:brown">LIPID PROFILE</h4>             
                         </div>
                                
                          <div class="container">


                          <table class="table table-borderless" >
                            <thead>
                                <tr>
                                    <th style="padding-left:4%">Name of test</th>
                                    <th style="padding-left:4%">Result</th>
                                    <th style="padding-left:1%">Normal value</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding-left:2%"> SERUM_Cholesterol</td>
                          <td><input type="number" name="SERUM_Cholesterol" id="SERUM_Cholesterol"  style="background:skyblue;border:none;"></td>
                                    <td> Less than 200 mg/dL</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM_Triglycerides</td>
                                    <td><input type="number" name="SERUM_Triglycerides" id="SERUM_Triglycerides"  style="background:skyblue;border:none;"></td>
                                    <td> Less than 150 mg/dL</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">HDL_Cholesterol</td>
                                    <td> <input type="number" name="HDL_Cholesterol" id="HDL_Cholesterol"  style="background:skyblue;border:none;"></td>
                                    <td> Male<50mg/dl Female<63mgdl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">LDL_Cholesterol</td>
                                    <td> <input type="number" name="LDL_Cholesterol" id="LDL_Cholesterol"  style="background:skyblue;border:none;"></td>
                                    <td> Male>172mg/dl Female>167mg/dl</td>
                                </tr>
                            </tbody>
                          </table>
            

                        <div class="text-center container" style="margin-top:3%;">
                          <button class="btn btn-primary  gradient-custom-2 " name="save" onclick="save2()" type="button">Save</button>         
                            <button class="btn btn-success"  type="button" onclick="update()">Update</button>
                            <button class="btn btn-danger"  type="button" onclick="deleted()">Delete</button>
                            <button class="btn btn-primary"  type="button" onclick="exit()">Exit</button>
                            <button class="btn btn-warning"  type="button" onclick="print()">Print</button>
                        </div>
                        <div class="text-center container">
                        <button class="btn btn-primary  gradient-custom-2 " name="save"  type="submit">
                                  <label for="checkbox" class="form" name="ReportShow" id="ReportShow">BOTH VIEW (NAME & REPORT)
                                </button>         
                                <button class="btn btn-primary  gradient-custom-2 " name="save"  type="submit">
                                  <input type="checkbox" class="form" name="ReportShow" id="ReportShow">
                                  <label for="checkbox" class="form" name="ReportShow" id="ReportShow">NAME SHOW
                                </button> 
                        </div>


  
      
                      </form>
      
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
let index=0;
    let st={records:[]};
    var U=document.getElementById("url").value;

    function display(){
      rid=document.getElementById("registrationid").value;
      sn=document.getElementById("Slno").value;
      console.log(`${U}/getlipidprofilebyRegisSlno.php?registrationid=${rid}&slno=${sn}`)
            let p1=fetch(`${U}/getlipidprofilebyRegisSlno.php?registrationid=${rid}&slno=${sn}`);
            let p2 = p1.then(res =>res.json()).then(data => {
                console.log(data);
                document.getElementById("gender").value=data.records[0].gender;
                document.getElementById("age").value=data.records[0].age;
                document.getElementById("referdoctor").value=data.records[0].referdoctor;
                document.getElementById("SERUM_Cholesterol").value=data.records[0].SERUM_Cholesterol;
                document.getElementById("SERUM_Triglycerides").value=data.records[0].SERUM_Triglycerides;
                document.getElementById("HDL_Cholesterol").value=data.records[0].HDL_Cholesterol;
                document.getElementById("LDL_Cholesterol").value=data.records[0].LDL_Cholesterol;
                
            });
    }
    display();


function work(){
        //display();
        document.getElementById("registrationid").value="";
        document.getElementById("Slno").value="";
        document.getElementById("date").value="";
        document.getElementById("receivedate").value="";
        document.getElementById("reportdate").value="";
        document.getElementById("Patientname").value="";
        document.getElementById("gender").value="";
        document.getElementById("age").value="";
        document.getElementById("referdoctor").value="";
        document.getElementById("testname").value="";
        document.getElementById("SERUM_Cholesterol").value="";
        document.getElementById("SERUM_Triglycerides").value="";
        document.getElementById("HDL_Cholesterol").value="";
        document.getElementById("LDL_Cholesterol").value="";
      
    }
function save2(){
  //alert("here")
        a=document.getElementById("registrationid").value;
        b=document.getElementById("Slno").value;
        d1=document.getElementById("date").value;
        d2=document.getElementById("receivedate").value;
        d3=document.getElementById("reportdate").value;
        c=document.getElementById("Patientname").value;
        f=document.getElementById("gender").value;
        g=document.getElementById("age").value;
        h=document.getElementById("referdoctor").value;
        j=document.getElementById("testname").value;
       k=document.getElementById("SERUM_Cholesterol").value;
        l=document.getElementById("SERUM_Triglycerides").value;
        m=document.getElementById("HDL_Cholesterol").value;
        n=document.getElementById("LDL_Cholesterol").value;
        //let o={userid:a,name:b,class:c,address:d};  
        url=`${U}/insertlipidprofile.php?registrationid=${a}&Slno=${b}&date=${d1}&receivedate=${d2}&reportdate=${d3}&Patientname=${c}&gender=${f}&age=${g}&referdoctor=${h}&testname=${j}&SERUM_Cholesterol=${k}&SERUM_Triglycerides=${l}&HDL_Cholesterol=${m}&LDL_Cholesterol=${n}`;      
        //localStorage.setItem('records', JSON.stringify(st.records));
        console.log(url);

        let p1 = fetch(url); 
        let p2 = p1.then(res =>res.json()).then(data => {
            //st.records.push(o);
            work();
        });
            
    }
    function update(){
       
      a=document.getElementById("registrationid").value;
        b=document.getElementById("Slno").value;
        d1=document.getElementById("date").value;
        d2=document.getElementById("receivedate").value;
        d3=document.getElementById("reportdate").value;
        c=document.getElementById("Patientname").value;
        f=document.getElementById("gender").value;
        g=document.getElementById("age").value;
        h=document.getElementById("referdoctor").value;
        j=document.getElementById("testname").value;
        k=document.getElementById("SERUM_Cholesterol").value;
        l=document.getElementById("SERUM_Triglycerides").value;
        m=document.getElementById("HDL_Cholesterol").value;
        n=document.getElementById("LDL_Cholesterol").value;
        
        url=`${U}/updatelipidprofile.php?registrationid=${a}&Slno=${b}&date=${d1}&receivedate=${d2}&reportdate=${d3}&patientname=${c}&gender=${f}&age=${g}&referdoctor=${h}&testname=${j}&SERUM_Cholesterol=${k}&SERUM_Triglycerides=${l}&HDL_Cholesterol=${m}&LDL_Cholesterol=${n}`;      
        console.log(url);
        let p1 = fetch(url); 
            let p2 = p1.then(data => {
              print();
        });
       
    }
    function deleted(i,event){
        //event.stopPropagation();
        a=i;
        a=document.getElementById("registrationid").value;
        b=document.getElementById("Slno").value;
        url=`${U}/deletelipidprofile.php?registrationid=${a}&Slno=${b}`;
        console.log(url);      
        let p1 = fetch(url); 
            let p2 = p1.then(data => {
            work();
        });
        //st.records.splice(i,1);
        //localStorage.setItem('records', JSON.stringify(st.records));
        work();
    }
    function start(){

          

    }
    start();
</script>
<?php

?>


</script>
<?php

?>
</body>
</html>