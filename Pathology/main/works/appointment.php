<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
     integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

     <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<style>

    tr:hover{
        background-color: lightgreen;
    }

    thead{
        background-color: magenta;

    }
    
</style>


</head>

<body style="background-color:lightyellow;font-weight:bold;">

    <div class="container-fluid">

        <h1 class="text-center" style="color:blue;"> 👩‍⚕️ 🧑‍⚕️ 👨‍⚕️ 🏥   Doctors Appointment 📝 🗒️ 📒 </h1> <hr/> <hr/>
        <?php
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
        }else{
        $url = "http://";
        }
        ?>
        <input type="hidden" id="url" value="<?=$url.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);?>"/>
        <div class="row">
            <div class="col-sm-4">
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" id="date" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="doctorid">Doctor ID</label>
        <input type="number" id="doctorid" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="slno">SL. No</label>
        <input type="number" id="slno" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="patientname">Patient name</label>
        <input type="text" id="patientname" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" id="email" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="mobile">Mobile No.</label>
        <input type="number" id="mobile" class="form-control"/>
    </div> <br/>
    
    <div class="form-group">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="button" class="btn btn-info" onclick="add()">Add</button>
            <button type="button" class="btn btn-success" onclick="update()">Update</button>
          </div>
    </div>
    <div class="form-group">
        <div id="action"></div>
    </div>
</div>
<div class="col-sm-8">

<table class="table table-bordered"  style="text-align:center;border: 5px solid blue;">

    <caption>Total Rows: <span id="tot"></span></caption>

    <thead>
        <th>Date</th>
        <th>Doctor ID</th>
        <th>SL. No</th>
        <th>Patient name</th>
        <th>E-mail</th>
        <th>Mobile No.</th>
        <th>Action</th>


        
    </thead>
    <tbody id="tb">

    </tbody>
</table>
</div>
</div>
</div>
<script>
        let index=0;
    let st={records:[]};
    var U=$("#url").val();
    
    function display(){
            
            $.get(`${U}/getappointment.php`,{},function(data){
data=JSON.parse(data)
                console.log(data);
                st.records=data.records;
                
               $("#tot").html(data.total);
                let a="";   
              
                $.each(st.records, function(i, d) {
                    a+=`<tr onclick="show('${d?.date}','${d?.doctorid}','${d?.slno}','${d?.patientname}',
                    '${d?.email}','${d?.mobile}','${i}')"><td>${d.date}</td><td>${d.doctorid}</td><td>${d.slno}</td><td>${d.patientname}</td>
                    <td>${d.email}</td><td>${d.mobile}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.doctorid}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                })       
             
              $("#tb").html(a);
                
        });        
    }
    display();

    function show(a,b,c,d,f,g,i){
        $("#date").val(a);
$("#doctorid").val(b);
$("#slno").val(c);
$("#patientname").val(d);
$("#email").val(f);
$("#mobile").val(g);
index=i;

        index=i;
    }

    function work(){
        
display();
$("#date").val("");
$("#doctorid").val("");
$("#slno").val("");
$("#patientname").val("");
$("#email").val("");
$("#mobile").val("");

    }

   
function add(){
a=$("#date").val();
b=$("#doctorid").val();
c=$("#slno").val();
d=$("#patientname").val();
f=$("#email").val();
g=$("#mobile").val();
        
         
        url=`${U}/insertappointment.php?date=${a}&doctorid=${b}&slno=${c}&patientname=${d}&email=${f}&mobile=${g}`;  
        console.log(url)    ;
   
    url=`${U}/insertappointment.php?date=${a}&doctorid=${b}&slno=${c}&patientname=${d}&email=${f}&mobile=${g}`;
$.get(url,{},function(data){
$("#action").html(data.total+" records Inserted");
work();
});


}
function update(){
a=$("#date").val();
b=$("#doctorid").val();
c=$("#slno").val();
d=$("#patientname").val();
f=$("#email").val();
g=$("#mobile").val();
url=`${U}/updateappointment.php?date=${a}&doctorid=${b}&slno=${c}&patientname=${d}&email=${f}&mobile=${g}`;
console.log(url);
$.get(url,{},function(data){
work();
});


}

function remove(i,event){
event.stopPropagation();
a=i;
url=`${U}/deleteappointment.php?doctorid=${a}`;
$.get(url,{},function(data){
work();
});
work();
}
    
</script>
</body>
</html>