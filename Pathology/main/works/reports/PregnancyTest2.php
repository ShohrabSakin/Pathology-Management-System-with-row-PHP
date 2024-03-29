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

<body style="font-weight:bold;color:blue">

    <section class="h-100 gradient-form" >
         <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100"> 
            <div class="col-xl-12">
               <div class="card rounded-3 text-black"> 
                <div class="row g-0">
                  <div class="col-lg-12"> 
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">

                        <img src="image/Pregnancy 2.JPG"   

                          style="width: 185px;" alt="logo">

                        <h1 class="mt-1 mb-5 pb-1 gradient-custom">Pregnancy Test</h1>

                        <?php

                          if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                          $url = "https://";
                          }else{
                          $url = "http://";
                          }
                       ?>

      <input type="hidden" id="url" value="<?=$url.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);?>"/>
                      </div>
      
                      <form method="get">
      
                        <div class="form-outline mb-4">

                          <label class="form-label" for="RegistrationID">Registration ID &nbsp;&nbsp;</label>
                          <input type="text" id="RegistrationID" name="RegistrationID" class="form col-lg-3" required  value="<?php if (isset($_GET['vrno'])) echo $_GET['vrno'];?>" /> 

                          <label class="form-label mb-2" for="SLNo">&nbsp;&nbsp;&nbsp;&nbsp;SL.No&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="number" id="SLNo" name="SLNo" class="form col-lg-2" required  value="<?php if (isset($_GET['slno'])) echo $_GET['slno'];?>" />

                          <label class="form-label" for="Date">&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="Date" name="Date" class="form col-lg-3" required value="<?php if (isset($_GET['date'])) echo $_GET['date'];?>" />

                        </div>
                       
                        <div class="form-outline mb-4">

                          

                          <label class="form-label" for="ReceiveDate">&nbsp;&nbsp;&nbsp;&nbsp;Recieve Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="ReceiveDate" name="ReceiveDate" class="form col-lg-2" required value="<?php if (isset($_GET['date'])) echo $_GET['date'];?>" />

                          <label class="form-label" for="ReportDate">&nbsp;&nbsp;&nbsp;&nbsp;Report Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="ReportDate" name="ReportDate" class="form col-lg-2" required value="<?php if (isset($_GET['date'])) echo $_GET['date'];?>" />

                        </div>


                        <div class="form-outline mb-4">

                          <label class="form-label" for="PatientName">Patient Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="PatientName" name="PatientName" class="form col-lg-5" required value="<?php if (isset($_GET['CustomerName'])) echo $_GET['CustomerName'];?>" />

                          <label class="form-label" for="Gender">&nbsp;&nbsp;&nbsp;&nbsp;Gender&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <select class="form-select-lg-2" name="Gender" id="Gender">
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Other">Other</option>

                          </select>
                          <!-- <input type="text" id="gender" name="gender" class="form" required /> -->
                          <label class="form-label" for="Age">&nbsp;&nbsp;&nbsp;&nbsp;Age</label>
                          <input type="number" id="Age" name="Age" class="form col-lg-2" required />
                        </div>

                        <div class="container">

                          <label class="form-label" for="RefDoctor">Ref by PROF/DR &nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="RefDoctor" name="RefDoctor" class="form col-lg-4" required   value="<?php if (isset($_GET['doctor'])) echo $_GET['doctor'];?>"/>
                          
                          </div>



                            <div class="container">
                             <label class="form-label" for="testname">Examination of the &nbsp;&nbsp;&nbsp;&nbsp;</label>
                             <input type="text" id="testname" name="testname" class="form col-lg-8" required value="<?php if (isset($_GET['test'])) echo $_GET['test'];?>" />
                         
                            </div>

                            <div class="container">
                            <h4 style="color:brown;text-align:center">Urine for pregnancy test</h4> <hr/>
                            <strong style="margin-left:5%;color:red">Name of test</strong>        
                                                <strong style="margin-left:50%;color:red">Result</strong>
                            <div class="container">
                              <label for="PregnanacyTest" style="margin-left:5%">Pregnancy Test</label>
                        </div>
                        <div class="container">
                              <textarea name="PregnanacyTest" id="PregnanacyTest" style="background:skyblue;border:none;" class="form-control"></textarea>
                            </div>



                          </div>

                                <div class="container">
                                  <p style="margin-left:80%; background: skyblue; width:18%; border-radius:5px;">
                                  <input type="checkbox" class="form" name="ReportShow" id="ReportShow" style="margin-left:2%;">
                                  <label for="checkbox" class="form" name="ReportShow" id="ReportShow">Report Show
                                 </p> <hr/>


                                 
                          </form>

                        <div class="text-center container" style="margin-top:3%;margin-left:-12%;">
                          <button class="btn btn-primary  gradient-custom-2 " name="save" onclick="save2()" type="button">Save</button>         
                            <button class="btn btn-success" onclick="update()"  type="button">Update</button>
                            <button class="btn btn-danger" onclick="deleted()" type="button">Delete</button>
                            <button class="btn btn-primary" onclick="exit()" type="button">Exit</button>
                            <button class="btn btn-warning" onclick="print()" type="button">Print</button>
                        </div>                         
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
let index=0;
    let st={records:[]};
    var U=document.getElementById("url").value;
    function save2(){
//alert(document.getElementById("SLNo").value)
  
        a=document.getElementById("RegistrationID").value;
        b=document.getElementById("SLNo").value;
        d1=document.getElementById("Date").value;
        d2=document.getElementById("ReceiveDate").value;
        d3=document.getElementById("ReportDate").value;
        c=document.getElementById("PatientName").value;
        f=document.getElementById("Gender").value;
        g=document.getElementById("Age").value;
        h=document.getElementById("RefDoctor").value;
        j=document.getElementById("testname").value;
        k=document.getElementById("PregnanacyTest").value;

        
        
        
        url=`${U}/InsertPregnancy.php?RegistrationID=${a}&SLNo=${b}&Date=${d1}&ReceiveDate=${d2}&ReportDate=${d3}&PatientName=${c}&Gender=${f}&Age=${g}&RefDoctor=${h}&TestName=${j}&PregnanacyTest=${k}`;      
       
        console.log(url);

        let p1 = fetch(url); 
        let p2 = p1.then(res =>res.json()).then(data => {
            
            work();
            print();
        });
            
    }

    function display(){
      rid=document.getElementById("RegistrationID").value;
      sn=document.getElementById("SLNo").value;
      //alert("OK")
      console.log(`${U}/getpregnancybyRegisSlno.php?registrationid=${rid}&slno=${sn}`);
            let p1=fetch(`${U}/getpregnancybyRegisSlno.php?registrationid=${rid}&slno=${sn}`);
            let p2 = p1.then(res =>res.json()).then(data => {
                
               
                document.getElementById("PregnanacyTest").value=data.records[0].Pregnancy_test;
                 
            });
    }
    display();
    function show(a,b,c,d,f,g,h,j,k,l,m,n,o,p,r1,r2,r3,r5,r6,r7,r8,r9,i){
      // document.getElementById("RegistrationID").value=a;
      //   document.getElementById("SLNo").value=b;
      //   document.getElementById("date").value=c;
      //   document.getElementById("receivedate").value=d;
      //   document.getElementById("reportdate").value=f;
      //   document.getElementById("patientname").value=g;
      //   document.getElementById("gender").value=h;
      //   document.getElementById("age").value=j;
      //   document.getElementById("referdoctor").value=k;
      //   document.getElementById("testname").value=l;
      //   document.getElementById("SERUM_BIRIRUBIN_TOTAL").value=m;
      //   document.getElementById("SERUM_ALK_PHOSPHATASE").value=n;
      //   document.getElementById("SERUM_SGOT_AST").value=o;
      //   document.getElementById("SERUM_SGPT_ALT").value=p;
      //   document.getElementById("SERUM_ACID_PHOSPHATASE").value=q;
      //   document.getElementById("SERUM_CHOLESTEROL").value=r1;
      //   document.getElementById("SERUM_TRYGLYCERIDE").value=r2;
      //   document.getElementById("SERUM_UREA").value=r3;
      //   document.getElementById("SERUM_URIC_ACID").value=r4;
      //   document.getElementById("SERUM_CAL_CIUM").value=r5;
      //   document.getElementById("SERUM_ALBUMIN").value=r6;
      //   document.getElementById("CPK_MB").value=r7;
      //   document.getElementById("HBA1C").value=r8;
      //   document.getElementById("SERUM_LDH").value=r9; 
      //   index=i;
    }

function work(){

        
        // document.getElementById("RegistrationID").value="";
        // document.getElementById("SLNo").value="";
        // document.getElementById("Date").value="";
        // document.getElementById("ReceiveDate").value="";
        // document.getElementById("ReportDate").value="";
        // document.getElementById("PatientName").value="";
        // document.getElementById("Gender").value="";
        // document.getElementById("Age").value="";
        // document.getElementById("RefDoctor").value="";
        // document.getElementById("TestName").value="";
        // document.getElementById("PregnanacyTest").value="";

        
        
    }


    function update(){
       
      a=document.getElementById("RegistrationID").value;
        b=document.getElementById("SLNo").value;
        d1=document.getElementById("Date").value;
        d2=document.getElementById("ReceiveDate").value;
        d3=document.getElementById("ReportDate").value;
        c=document.getElementById("PatientName").value;
        f=document.getElementById("Gender").value;
        g=document.getElementById("Age").value;
        h=document.getElementById("RefDoctor").value;
        j=document.getElementById("testname").value;
        k=document.getElementById("PregnanacyTest").value;

        
        
        url=`${U}/UpdatePregnancy.php?RegistrationID=${a}&SLNo=${b}&Date=${d1}&ReceiveDate=${d2}&ReportDate=${d3}&PatientName=${c}&Gender=${f}&Age=${g}&RefDoctor=${h}&TestName=${j}&PregnanacyTest=${k}`;      
        console.log(url);
        let p1 = fetch(url); 
            let p2 = p1.then(data => {
              print();
        });
       
    }
    function deleted(i,event){
        
        a=i;
        a=document.getElementById("RegistrationID").value;
        b=document.getElementById("SLNo").value;
        url=`${U}/DeletePregnancy.php?RegistrationID=${a}&SLNo=${b}`;      
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
</body>
</html>