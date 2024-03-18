<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E.C.G</title>
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
                        <h1 class="mt-1 mb-5 pb-1 gradient-custom">E.C.G. TEST</h1>
                        <?php
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
      $url = "https://";
      }else{
      $url = "http://";
      }
      ?>
      <input type="hidden" id="url" value="<?=$url.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);?>"/>
                      </div>
      
                      <form  method="get">
      
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
                          <label class="form-label" for="PatientId" >&nbsp;&nbsp;Patient Id :&nbsp;&nbsp;</label>
                          <input type="number" id="PatientId" name="PatientId" class="form col-lg-3" required/>
                          </div>
                          <div class="container">
                          <label class="form-label" for="testname">Examination of the &nbsp;&nbsp;&nbsp;&nbsp;</label>
                          <input type="text" id="testname" name="testname" 
                          class="form col-lg-8" required value="<?php if (isset($_GET['test'])) echo $_GET['test'];?>"/>
                         
                          </div>
                          </div>
                          <div class="container text-center"> 
                            <h4 style="color:brown">E.C.G.</h4>             
                         </div>
                                
                          <div class="container">

                 <textarea name="e_c_g" id="e_c_g" style="margin-left:10%;" cols="120" rows="10"></textarea>
</div>
                        <div class="text-center container" style="margin-top:3%;">
                        <button class="btn btn-primary  gradient-custom-2 " name="save" onclick="save()" type="submit">Save</button>         
                            <button class="btn btn-success" onclick="update()"  type="submit">Update</button>
                            <button class="btn btn-danger" onclick="deleted()" type="submit">Delete</button>
                            <button class="btn btn-primary" onclick="exit()" type="submit">Exit</button>
                            <button class="btn btn-warning" onclick="print()" type="submit">Print</button>
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
      function display(){
      rid=document.getElementById("registrationid").value;
      sn=document.getElementById("slno").value;
            let p1=fetch(`${U}/getbiochemicalbyRegisSlno.php?registrationid=${rid}&slno=${sn}`);
            let p2 = p1.then(res =>res.json()).then(data => {
                console.log(data);
                document.getElementById("gender").value=data.records[0].gender;
                document.getElementById("age").value=data.records[0].age;
                document.getElementById("referdoctor").value=data.records[0].referdoctor;
                document.getElementById("e_c_g").value=data.records[0].e_c_g;
            });
    }
    display();
  function work(){
        //display();
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
        document.getElementById("e_c_g").value="";   
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
        k=document.getElementById("e_c_g").value;
       
        //let o={userid:a,name:b,class:c,address:d};  
        url=`${U}/insertECG.php?registrationid=${a}&slno=${b}&date=${d1}&receivedate=${d2}&reportdate=${d3}&patientname=${c}&gender=${f}&age=${g}&referdoctor=${h}&testname=${j}&E_C_G=${k}`;      
        //localStorage.setItem('records', JSON.stringify(st.records));
        alert(url)
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
         k=document.getElementById("e_c_g").value;
         
         url=`${U}/updateECG.php?registrationid=${a}&slno=${b}&date=${d1}&receivedate=${d2}&reportdate=${d3}&patientname=${c}&gender=${f}&age=${g}&referdoctor=${h}&testname=${j}&e_c_g=${k}`;      
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
        url=`${U}/deleteECG.php?registrationid=${a}&slno=${b}`;      
        let p1 = fetch(url); 
            let p2 = p1.then(data => {
            work();
        });
        //st.records.splice(i,1);
        //localStorage.setItem('records', JSON.stringify(st.records));
        work();
    }
</script>
<?php

?>
</body>
</html>