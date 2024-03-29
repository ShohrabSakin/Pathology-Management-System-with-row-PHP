<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioChemical Test</title>
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
input{
  text-align:center;
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
                        <h1 class="mt-1 mb-5 pb-1 gradient-custom">BioChemical Test</h1>
                        <?php
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
      $url = "https://";
      }else{
      $url = "http://";
      }
      ?>
      <input type="hidden" id="url" value="<?=$url.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);?>"/>
                      </div>
                      <div id="tb">

                      <form method="get">
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="registrationid">Registration ID &nbsp;&nbsp;</label>
                          <input type="text" id="registrationid" name="registrationid" class="form col-lg-3" required  value="<?php if (isset($_GET['vrno'])) echo $_GET['vrno'];?>" /> 
                          <label class="form-label mb-2" for="slno">&nbsp;&nbsp;&nbsp;&nbsp;SL.No&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="number" id="slno" name="slno" class="form col-lg-2" required  value="<?php if (isset($_GET['slno'])) echo $_GET['slno'];?>" />
                          <label class="form-label" for="date">&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="date" name="date" class="form col-lg-3" required value="<?php if (isset($_GET['date'])) echo $_GET['date'];?>" />
                        </div>
                       
                        <div class="form-outline mb-4">
                          <label class="form-label mb-2" for="pidn">Reg Id No. :&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="pidn" name="pidn" class="form col-lg-3" required value="<?php if (isset($_GET['vrno'])) echo $_GET['vrno'];?>"/>
                          <label class="form-label" for="receivedate">&nbsp;&nbsp;&nbsp;&nbsp;Recieve Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="receivedate" name="receivedate" class="form col-lg-2" required value="<?php if (isset($_GET['date'])) echo $_GET['date'];?>" />
                          <label class="form-label" for="reportdate">&nbsp;&nbsp;&nbsp;&nbsp;Report Date&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="date" id="reportdate" name="reportdate" class="form col-lg-2" required value="<?php if (isset($_GET['date'])) echo $_GET['date'];?>" />
                        </div>
                        <div class="form-outline mb-4">
                          <label class="form-label" for="patientname">Patient Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="patientname" name="patientname" class="form col-lg-5" required value="<?php if (isset($_GET['CustomerName'])) echo $_GET['CustomerName'];?>"/>
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
                          <label class="form-label" for="testname">Examination of the &nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="testname" name="testname" 
                          class="form col-lg-8" required value="<?php if (isset($_GET['test'])) echo $_GET['test'];?>"/>
                         
                          </div>
                          </div>
                                <div class="container">
                                  <p style="margin-left:80%; background: skyblue; width:18%; border-radius:5px;">
                                  <input type="checkbox" class="form" name="ReportShow" id="ReportShow" style="margin-left:2%;">
                                  <label for="checkbox" class="form" name="ReportShow" id="ReportShow">Report Show
                                 </p>
                                 <center>
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
                                <td style="padding-left:2%">SERUM BIRIRUBIN(TOTAL)</td>
                          <td><input type="number" name="SERUM_BIRIRUBIN_TOTAL" id="SERUM_BIRIRUBIN_TOTAL"  style="background:skyblue;border:none;">
                          <p style="display:inline ; margin-left:1%">mg/dl</p>
</td>
                                    <td> Up to 1.0 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM ALK. PHOSPHATASE</td>
                                    <td><input type="number" name="SERUM_ALK_PHOSPHATASE" id="SERUM_ALK_PHOSPHATASE"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
</td>
                                    <td>89.270 U/L</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM S.G.O.T./A.S.T</td>
                                    <td> <input type="number" name="SERUM_SGOT_AST" id="SERUM_SGOT_AST"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
</td>
                                    <td>  Up to 40 U/L</td>
                                </tr>


                                <tr>
                                <td style="padding-left:2%">SERUM S.G.P.T./ALT</td>
                          <td><input type="number" name="SERUM_SGPT_ALT" id="SERUM_SGPT_ALT"  style="background:skyblue;border:none;">
                          <p style="display:inline ; margin-left:1%"> U/L</p>
</td>
                                    <td> Up to 40 U/L</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM ACID PHOSPHATASE</td>
                                    <td><input type="number" name="SERUM_ACID_PHOSPHATASE" id="SERUM_ACID_PHOSPHATASE"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
</td>
                                    <td>Up to 40 U/L</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM CHOLESTEROL</td>
                                    <td> <input type="number" name="SERUM_CHOLESTEROL" id="SERUM_CHOLESTEROL"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
                    </td>  <td> Up to 35 U/L</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM TRYGLYCERIDE</td>
                                    <td> <input type="number" name="SERUM_TRYGLYCERIDE" id="SERUM_TRYGLYCERIDE"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">mg/dl</p>
                    </td>  <td> 80 to 200 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM UREA</td>
                                    <td> <input type="number" name="SERUM_UREA" id="SERUM_UREA"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">mg/dl</p>
                    </td>  <td>89 to 200 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM URIC ACID</td>
                                    <td> <input type="number" name="SERUM_URIC_ACID" id="SERUM_URIC_ACID"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">mg/dl</p>
                    </td>  <td>3.5 to 7.0 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM CAL CIUM</td>
                                    <td> <input type="number" name="SERUM_CAL_CIUM" id="SERUM_CAL_CIUM"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">mg/dl</p>
                    </td>  <td>8.1 - 10.4 mg/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM ALBUMIN</td>
                                    <td> <input type="number" name="SERUM_ALBUMIN" id="SERUM_ALBUMIN"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">gm/dl</p>
                    </td>  <td>3.6 - 5.2 gm/dl</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">CPK-MB</td>
                                    <td> <input type="number" name="CPK_MB" id="CPK_MB"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
                    </td>  <td>Up to 25U/L</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">HBA1C</td>
                                    <td> <input type="number" name="HBA1C" id="HBA1C"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">%</p>
                    </td>  <td><7.0%</td>
                                </tr>
                                <tr>
                                    <td style="padding-left:2%">SERUM LDH</td>
                                    <td> <input type="number" name="SERUM_LDH" id="SERUM_LDH"  style="background:skyblue;border:none;">
                                    <p style="display:inline ; margin-left:1%">U/L</p>
                    </td>  <td>Up to 220U/L</td>
                                </tr>
                            </tbody>
                          </table>
                          </center>
                          </form>
                          </div>

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
      rid=document.getElementById("registrationid").value;
      sn=document.getElementById("slno").value;
      console.log(`${U}/getbiochemicalbyRegisSlno.php?registrationid=${rid}&slno=${sn}`)
            let p1=fetch(`${U}/getbiochemicalbyRegisSlno.php?registrationid=${rid}&slno=${sn}`);
            let p2 = p1.then(res =>res.json()).then(data => {
                console.log(data);
                document.getElementById("gender").value=data.records[0].gender;
                document.getElementById("age").value=data.records[0].age;
                document.getElementById("referdoctor").value=data.records[0].referdoctor;
                document.getElementById("SERUM_BIRIRUBIN_TOTAL").value=data.records[0].SERUM_BIRIRUBIN_TOTAL;
                document.getElementById("SERUM_ALK_PHOSPHATASE").value=data.records[0].SERUM_ALK_PHOSPHATASE;
                document.getElementById("SERUM_SGOT_AST").value=data.records[0].SERUM_SGOT_AST;
                 document.getElementById("SERUM_SGPT_ALT").value=data.records[0].SERUM_SGPT_ALT;
                 document.getElementById("SERUM_ACID_PHOSPHATASE").value=data.records[0].SERUM_ACID_PHOSPHATASE;
                  document.getElementById("SERUM_CHOLESTEROL").value=data.records[0].SERUM_CHOLESTEROL;
                  document.getElementById("SERUM_TRYGLYCERIDE").value=data.records[0].SERUM_TRYGLYCERIDE;
                  document.getElementById("SERUM_UREA").value=data.records[0].SERUM_UREA;
                  document.getElementById("SERUM_URIC_ACID").value=data.records[0].SERUM_URIC_ACID;
                  document.getElementById("SERUM_CAL_CIUM").value=data.records[0].SERUM_CAL_CIUM;
                  document.getElementById("SERUM_ALBUMIN").value=data.records[0].SERUM_ALBUMIN;
                  document.getElementById("CPK_MB").value=data.records[0].CPK_MB;
                  document.getElementById("HBA1C").value=data.records[0].HBA1C;
                  document.getElementById("SERUM_LDH").value=data.records[0].SERUM_LDH; 
            });
    }
    display();
    function show(a,b,c,d,f,g,h,j,k,l,m,n,o,p,r1,r2,r3,r5,r6,r7,r8,r9,i){
      document.getElementById("registrationid").value=a;
        document.getElementById("slno").value=b;
        document.getElementById("date").value=c;
        document.getElementById("receivedate").value=d;
        document.getElementById("reportdate").value=f;
        document.getElementById("patientname").value=g;
        document.getElementById("gender").value=h;
        document.getElementById("age").value=j;
        document.getElementById("referdoctor").value=k;
        document.getElementById("testname").value=l;
        document.getElementById("SERUM_BIRIRUBIN_TOTAL").value=m;
        document.getElementById("SERUM_ALK_PHOSPHATASE").value=n;
        document.getElementById("SERUM_SGOT_AST").value=o;
        document.getElementById("SERUM_SGPT_ALT").value=p;
        document.getElementById("SERUM_ACID_PHOSPHATASE").value=q;
        document.getElementById("SERUM_CHOLESTEROL").value=r1;
        document.getElementById("SERUM_TRYGLYCERIDE").value=r2;
        document.getElementById("SERUM_UREA").value=r3;
        document.getElementById("SERUM_URIC_ACID").value=r4;
        document.getElementById("SERUM_CAL_CIUM").value=r5;
        document.getElementById("SERUM_ALBUMIN").value=r6;
        document.getElementById("CPK_MB").value=r7;
        document.getElementById("HBA1C").value=r8;
        document.getElementById("SERUM_LDH").value=r9; 
        index=i;
    }

function work(){
        display();
        document.getElementById("registrationid").value="";
        document.getElementById("slno").value="";
        document.getElementById("date").value="";
        document.getElementById("receivedate").value="";
        document.getElementById("reportdate").value="";
        document.getElementById("patientname").value="";
        document.getElementById("gender").value="";
        document.getElementById("age").value="";
        document.getElementById("referdoctor").value="";
        document.getElementById("testname").value="";
        document.getElementById("SERUM_BIRIRUBIN_TOTAL").value="";
        document.getElementById("SERUM_ALK_PHOSPHATASE").value="";
        document.getElementById("SERUM_SGOT_AST").value="";
        document.getElementById("SERUM_SGPT_ALT").value="";
        document.getElementById("SERUM_ACID_PHOSPHATASE").value="";
        document.getElementById("SERUM_CHOLESTEROL").value="";
        document.getElementById("SERUM_TRYGLYCERIDE").value="";
        document.getElementById("SERUM_UREA").value="";
        document.getElementById("SERUM_URIC_ACID").value="";
        document.getElementById("SERUM_CAL_CIUM").value="";
        document.getElementById("SERUM_ALBUMIN").value="";
        document.getElementById("CPK_MB").value="";
        document.getElementById("HBA1C").value="";
        document.getElementById("SERUM_LDH").value=""; 
    }
function save(){
  alert("here")
        a=document.getElementById("registrationid").value;
        b=document.getElementById("slno").value;
        d1=document.getElementById("date").value;
        d2=document.getElementById("receivedate").value;
        d3=document.getElementById("reportdate").value;
        c=document.getElementById("patientname").value;
        f=document.getElementById("gender").value;
        g=document.getElementById("age").value;
        h=document.getElementById("referdoctor").value;
        j=document.getElementById("testname").value;
        k=document.getElementById("SERUM_BIRIRUBIN_TOTAL").value;
        l=document.getElementById("SERUM_ALK_PHOSPHATASE").value;
        m=document.getElementById("SERUM_SGOT_AST").value;
        n=document.getElementById("SERUM_SGPT_ALT").value;
        p=document.getElementById("SERUM_ACID_PHOSPHATASE").value;
        r1=document.getElementById("SERUM_CHOLESTEROL").value;
        r2=document.getElementById("SERUM_TRYGLYCERIDE").value;
        r3=document.getElementById("SERUM_UREA").value;
        r4=document.getElementById("SERUM_URIC_ACID").value;
        r5=document.getElementById("SERUM_CAL_CIUM").value;
        r6=document.getElementById("SERUM_ALBUMIN").value;
        r7=document.getElementById("CPK_MB").value;
        r8=document.getElementById("HBA1C").value;
        r9=document.getElementById("SERUM_LDH").value;
        //let o={userid:a,name:b,class:c,address:d};  
        url=`${U}/insertbiochemical.php?registrationid=${a}&slno=${b}&date=${d1}&receivedate=${d2}&reportdate=${d3}&patientname=${c}&gender=${f}&age=${g}&referdoctor=${h}&testname=${j}&SERUM_BIRIRUBIN_TOTAL=${k}&SERUM_ALK_PHOSPHATASE=${l}&SERUM_SGOT_AST=${m}&SERUM_SGPT_ALT=${n}&SERUM_ACID_PHOSPHATASE=${p}&SERUM_CHOLESTEROL=${r1}&SERUM_TRYGLYCERIDE=${r2}&SERUM_UREA=${r3}&SERUM_URIC_ACID=${r4}&SERUM_CAL_CIUM=${r5}&SERUM_ALBUMIN=${r6}&CPK_MB=${r7}&HBA1C=${r8}&SERUM_LDH=${r9}`;      
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
        b=document.getElementById("slno").value;
        d1=document.getElementById("date").value;
        d2=document.getElementById("receivedate").value;
        d3=document.getElementById("reportdate").value;
        c=document.getElementById("patientname").value;
        f=document.getElementById("gender").value;
        g=document.getElementById("age").value;
        h=document.getElementById("referdoctor").value;
        j=document.getElementById("testname").value;
        k=document.getElementById("SERUM_BIRIRUBIN_TOTAL").value;
        l=document.getElementById("SERUM_ALK_PHOSPHATASE").value;
        m=document.getElementById("SERUM_SGOT_AST").value;
        n=document.getElementById("SERUM_SGPT_ALT").value;
        p=document.getElementById("SERUM_ACID_PHOSPHATASE").value;
        r1=document.getElementById("SERUM_CHOLESTEROL").value;
        r2=document.getElementById("SERUM_TRYGLYCERIDE").value;
        r3=document.getElementById("SERUM_UREA").value;
        r4=document.getElementById("SERUM_URIC_ACID").value;
        r5=document.getElementById("SERUM_CAL_CIUM").value;
        r6=document.getElementById("SERUM_ALBUMIN").value;
        r7=document.getElementById("CPK_MB").value;
        r8=document.getElementById("HBA1C").value;
        r9=document.getElementById("SERUM_LDH").value;
        
        url=`${U}/updatebiochemical.php?registrationid=${a}&slno=${b}&date=${d1}&receivedate=${d2}&reportdate=${d3}&patientname=${c}&gender=${f}&age=${g}&referdoctor=${h}&testname=${j}&SERUM_BIRIRUBIN_TOTAL=${k}&SERUM_ALK_PHOSPHATASE=${l}&SERUM_SGOT_AST=${m}&SERUM_SGPT_ALT=${n}&SERUM_ACID_PHOSPHATASE=${p}&SERUM_CHOLESTEROL=${r1}&SERUM_TRYGLYCERIDE=${r2}&SERUM_UREA=${r3}&SERUM_URIC_ACID=${r4}&SERUM_CAL_CIUM=${r5}&SERUM_ALBUMIN=${r6}&CPK_MB=${r7}&HBA1C=${r8}&SERUM_LDH=${r9}`;      
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
        b=document.getElementById("slno").value;
        url=`${U}/deletebiochemical.php?registrationid=${a}&slno=${b}`;      
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