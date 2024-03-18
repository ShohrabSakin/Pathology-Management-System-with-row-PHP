<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serological Test</title>
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
                        <img src="image/serological test.JPG"

                          style="width: 185px;" alt="logo">

                        <h1 class="mt-1 mb-5 pb-1 gradient-custom">Serelogical Test</h1>

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
                          <input type="text" id="RefDoctor" name="RefDoctor" class="form col-lg-7" required  value="<?php if (isset($_GET['doctor'])) echo $_GET['doctor'];?>"/>
                          
                          </div>
                          <div class="container">
                          <label class="form-label" for="TestName">Test Name &nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="TestName" name="TestName" class="form col-lg-8" required value="<?php if (isset($_GET['test'])) echo $_GET['test'];?>" />
                         
                          </div>
                          </div>
                                <div class="container">
                                  <p style="margin-left:80%; background: skyblue; width:18%; border-radius:5px;">
                                  <input type="checkbox" class="form" name="ReportShow" id="ReportShow" style="margin-left:2%;">
                                  <label for="checkbox" class="form" name="ReportShow" id="ReportShow">Report Show
                                 </p> <hr/>
                                 <center>
                                 <table class="table table-borderless" >
                            <thead>
                                <tr>
                                    <th style="padding-left:4%;color:red">Name of test</th>
                                    <th style="padding-left:4%;color:red">Result</th>
                                    <th style="padding-left:1%;color:red">Normal value</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td style="padding-left:2%;color:blue">ASO TITRE</td>
                          <td><input type="number" name="ASO_TITRE" id="ASO_TITRE"  style="background:skyblue;border:none;">
                          <p style="display:inline ; margin-left:1%">mg/dl</p>
</td>
                                    <td> Up to 1.0 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">R.A Factor</td>
                                    <td><input type="number" name="RA_Factor" id="RA_Factor"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
</td>
                                    <td>89.270 U/L</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">HBs Ag-(Screenning)</td>
                                    <td> <input type="number" name="HBsAg_Screenning" id="HBsAg_Screenning"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
</td>
                                    <td>  Up to 40 U/L</td>
                                </tr>


                                <tr>
                                <td style="padding-left:2%;color:blue">HBs Ag-(Confirmatory)</td>
                          <td><input type="number" name="HBsAg_Confirmatory" id="HBsAg_Confirmatory"  style="background:skyblue;border:none;">
                          <p style="display:inline ; margin-left:1%"> U/L</p>
</td>
                                    <td> Up to 40 U/L</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">VDRL Test(Qualiitive)</td>
                                    <td><input type="number" name="VDRLTest_Qualiitive" id="VDRLTest_Qualiitive"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
</td>
                                    <td>Up to 40 U/L</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">VDRL Test(Quantative)</td>
                                    <td> <input type="number" name="VDRLTest_Quantative" id="VDRLTest_Quantative"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
                    </td>  <td> Up to 35 U/L</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">TPHA</td>
                                    <td> <input type="number" name="TPHA" id="TPHA"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">mg/dl</p>
                    </td>  <td> 80 to 200 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">HBATC</td>
                                    <td> <input type="number" name="HBATC" id="HBATC"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">mg/dl</p>
                    </td>  <td>89 to 200 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">CRP</td>
                                    <td> <input type="number" name="CRP" id="CRP"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">mg/dl</p>
                    </td>  <td>3.5 to 7.0 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">MICRO-Albumin (Urine)</td>
                                    <td> <input type="number" name="Micro_Albumin_Urine" id="Micro_Albumin_Urine"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">mg/dl</p>
                    </td>  <td>8.1 - 10.4 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">Vitamin B-12</td>
                                    <td> <input type="number" name="Vitamin_B_12" id="Vitamin_B_12"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">gm/dl</p>
                    </td>  <td>3.6 - 5.2 gm/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%;color:blue">BLOOD GROUP.RH(D) TYPE</td>
                                    <td> <input type="number" name="BloodGroup_RH_DTYPE" id="BloodGroup_RH_DTYPE"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
                    </td>  <td>Up to 25U/L</td>
                                </tr>


                               
                            </tbody>
                          </table>
                          </center>
                          </form> <hr/>

                        <div class="text-center container" style="margin-top:3%;margin-left:-12%;">
                          <button class="btn btn-primary  gradient-custom-2 " name="save" onclick="save()" type="submit">Save</button>         
                            <button class="btn btn-success" onclick="update()"  type="submit">Update</button>
                            <button class="btn btn-danger" onclick="deleted()" type="submit">Delete</button>
                            <button class="btn btn-primary" onclick="exit()" type="submit">Exit</button>
                            <button class="btn btn-warning" onclick="print()" type="submit">Print</button>
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
    
    function display(){
      rid=document.getElementById("RegistrationID").value;
      sn=document.getElementById("SLNo").value;
      console.log(`${U}/getserologicalbyRegisSlno.php?registrationid=${rid}&slno=${sn}`)
            let p1=fetch(`${U}/getserologicalbyRegisSlno.php?registrationid=${rid}&slno=${sn}`);
            let p2 = p1.then(res =>res.json()).then(data => {
                console.log(data);
                document.getElementById("Gender").value=data.records[0].gender;
                document.getElementById("Age").value=data.records[0].age;
                document.getElementById("RefDoctor").value=data.records[0].referdoctor;
                
                document.getElementById("ASO_TITRE").value=data.records[0].ASO_TITRE;
                document.getElementById("RA_Factor").value=data.records[0].R_A_Factor;
                document.getElementById("HBsAg_Screenning").value=data.records[0].HBs_Ag_Screenning;
                document.getElementById("HBsAg_Confirmatory").value=data.records[0].HBs_Ag_Confirmatory;
                document.getElementById("VDRLTest_Qualiitive").value=data.records[0].VDRL_TEST_Qualiitive;
                document.getElementById("VDRLTest_Quantative").value=data.records[0].VDRL_TEST_Quantative;
                document.getElementById("TPHA").value=data.records[0].TPHA;
                document.getElementById("HBATC").value=data.records[0].HbATC;
                document.getElementById("CRP").value=data.records[0].CRP;
                document.getElementById("Micro_Albumin_Urine").value=data.records[0].MICRO_Albumin_Urine;
                document.getElementById("Vitamin_B_12").value=data.records[0].Vitamin_B_12;
                document.getElementById("BloodGroup_RH_DTYPE").value=data.records[0].BLOOD_GROUP_RH_D_TYPE;
            });
    }
    display();
function work(){

        
        document.getElementById("RegistrationID").value="";
        document.getElementById("SLNo").value="";
        document.getElementById("Date").value="";
        document.getElementById("ReceiveDate").value="";
        document.getElementById("ReportDate").value="";
        document.getElementById("PatientName").value="";
        document.getElementById("Gender").value="";
        document.getElementById("Age").value="";
        document.getElementById("RefDoctor").value="";
        document.getElementById("TestName").value="";
        document.getElementById("ASO_TITRE").value="";
        document.getElementById("RA_Factor").value="";
        document.getElementById("HBsAg_Screenning").value="";
        document.getElementById("HBsAg_Confirmatory").value="";
        document.getElementById("VDRLTest_Qualiitive").value="";
        document.getElementById("VDRLTest_Quantative").value="";
        document.getElementById("TPHA").value="";
        document.getElementById("HBATC").value="";
        document.getElementById("CRP").value="";
        document.getElementById("Micro_Albumin_Urine").value="";
        document.getElementById("Vitamin_B_12").value="";
        document.getElementById("BloodGroup_RH_DTYPE").value="";
        
    }

function save(){
//alert("here")
  
        a=document.getElementById("RegistrationID").value;
        b=document.getElementById("SLNo").value;
        d1=document.getElementById("Date").value;
        d2=document.getElementById("ReceiveDate").value;
        d3=document.getElementById("ReportDate").value;
        c=document.getElementById("PatientName").value;
        f=document.getElementById("Gender").value;
        g=document.getElementById("Age").value;
        h=document.getElementById("RefDoctor").value;
        j=document.getElementById("TestName").value;
        k=document.getElementById("ASO_TITRE").value;
        l=document.getElementById("RA_Factor").value;
        m=document.getElementById("HBsAg_Screenning").value;
        n=document.getElementById("HBsAg_Confirmatory").value;
        p=document.getElementById("VDRLTest_Qualiitive").value;
        r1=document.getElementById("VDRLTest_Quantative").value;
        r2=document.getElementById("TPHA").value;
        r3=document.getElementById("HBATC").value;
        r4=document.getElementById("CRP").value;
        r5=document.getElementById("Micro_Albumin_Urine").value;
        r6=document.getElementById("Vitamin_B_12").value;
        r7=document.getElementById("BloodGroup_RH_DTYPE").value;
        
        
        url=`${U}/InsertSerological.php?RegistrationID=${a}&SLNo=${b}&Date=${d1}&ReceiveDate=${d2}&ReportDate=${d3}&PatientName=${c}&Gender=${f}&Age=${g}&RefDoctor=${h}&TestName=${j}&ASO_TITRE=${k}&RA_Factor=${l}&HBsAg_Screenning=${m}&HBsAg_Confirmatory=${n}&VDRLTest_Qualiitive=${p}&VDRLTest_Quantative=${r1}&TPHA=${r2}&HBATC=${r3}&CRP=${r4}&Micro_Albumin_Urine=${r5}&Vitamin_B_12=${r6}&BloodGroup_RH_DTYPE=${r7}`;      
       alert(url)
        console.log(url);

        let p1 = fetch(url); 
        let p2 = p1.then(res =>res.json()).then(data => {
            
            work();
            print();
        });
            
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
        j=document.getElementById("TestName").value;
        k=document.getElementById("ASO_TITRE").value;
        l=document.getElementById("RA_Factor").value;
        m=document.getElementById("HBsAg_Screenning").value;
        n=document.getElementById("HBsAg_Confirmatory").value;
        p=document.getElementById("VDRLTest_Qualiitive").value;
        r1=document.getElementById("VDRLTest_Quantative").value;
        r2=document.getElementById("TPHA").value;
        r3=document.getElementById("HBATC").value;
        r4=document.getElementById("CRP").value;
        r5=document.getElementById("Micro_Albumin_Urine").value;
        r6=document.getElementById("Vitamin_B_12").value;
        r7=document.getElementById("BloodGroup_RH_DTYPE").value;
        
        url=`${U}/UpdateSerological.php?RegistrationID=${a}&SLNo=${b}&Date=${d1}&ReceiveDate=${d2}&ReportDate=${d3}&PatientName=${c}&Gender=${f}&Age=${g}&RefDoctor=${h}&TestName=${j}&ASO_TITRE=${k}&RA_Factor=${l}&HBsAg_Screenning=${m}&HBsAg_Confirmatory=${n}&VDRLTest_Qualiitive=${p}&VDRLTest_Quantative=${r1}&TPHA=${r2}&HBATC=${r3}&CRP=${r4}&Micro_Albumin_Urine=${r5}&Vitamin_B_12=${r6}&BloodGroup_RH_DTYPE=${r7}`;      
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
        url=`${U}/DeleteSerological.php?RegistrationID=${a}&SLNo=${b}`;      
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