<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<body style="background-color:lightyellow;">

    <div class="container-fluid">

        <h1 class="text-center" style="color:blue;">  🧑‍⚕️ 👩‍⚕️ 🩺 Doctors Entry 📝 🗒️  </h1> <hr/> <hr/>
        <?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://"; 
}else{
    $url = "http://"; 
}
?>
<input type="hidden" id="url" value="<?=$url.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);?>"/>
        <div class="row">
            <div class="col-sm-2" style="font-weight:bold;">
    <div class="form-group">
        <label for="doctorid">Doctor ID</label>
        <input type="text" id="doctorid" name="doctorid" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="doctorname">Doctor Name</label>
        <input type="text" id="doctorname"  name="doctorname" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="qualification">Qualification</label>
        <input type="text" id="qualification" name="qualification" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="institution">Institution</label>
        <input type="text" id="institution" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="designation">Designation</label>
        <input type="text" id="designation" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="fee">Fee</label>
        <input type="text" id="fee" class="form-control"/>

    </div> <br/> <br/>
    
    <div class="form-group">
        <input type="file" id="file" name="file" />
        <input type="hidden" id="picture" />
        <input type="button" class="button" value="Upload" id="but_upload">
        <hr/>
        <div style="margin-top: 40px;" >
        
        <!-- Image -->
        <img src="" class="prevel img-fluid" id="imgprev" width="300" style="display: none;" >
        
        <!-- Non-image -->
        <a href="#" target="_blank" class="prevel" id="fileprev" style="display: none;">View File</a>
        </div>
        </div>
                
    
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
<div class="col-sm-10">
<table class="table table-bordered" style="text-align:center;border: 5px solid blue;">
    <caption>Total Rows: <span id="tot"></span></caption>
    <thead>
        <th>Doctor ID</th>
        <th>Doctor Name</th>
        <th>Qualification</th>
        <th>Institution</th>
         <th>Designation</th>
        <th>Fee</th>
       <th>Picture</th>
        <th>Action</th>
        
    </thead>
    <tbody id="tb">

    </tbody>
</table>
</div>
</div>
</div>
<script>
    //here index and st are global variables. 
    //because they can be used from any where in script
    let index=0;
    let st={records:[]};
    //var U=document.getElementById("url").value;
    var U=$("#url").val();
    function display(){
            //st.records = localStorage.getItem('records');
              //let p1=fetch(`${U}/Gettests.php`);
           // let p2 = p1.then(res =>res.json()).then(data => {
            $.get(`${U}/getdoctors.php`,{},function(data){
data=JSON.parse(data)
                console.log(data);
                st.records=data.records;
                //alert(data.total)
               // document.getElementById("tot").innerHTML=data.total;
               $("#tot").html(data.total);
                let a="";   
                 
                //for(d of st.records){  
                    $.each(st.records, function(i, d) {
                    a+=`<tr onclick="show?.('${d?.doctorid}','${d?.doctorname}','${d?.qualification}','${d?.institution}','${d?.designation}','${d.fee}','${d.picture}','${i}')"><td>${d.doctorid}</td><td>${d.doctorname}</td><td>${d.qualification}</td><td>${d.institution}</td><td>${d.designation}</td><td>${d.fee}</td><td><img src="upload/${d.picture}" class="img-fluid"/></td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.Code}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                } )      
               // document.getElementById("tb").innerHTML=a;
               $("#tb").html(a);
                
        });        
    }
    display();

    function show(a,b,c,d,f,g,h,i){
$("#doctorid").val(a);
$("#doctorname").val(b);
$("#qualification").val(c);
$("#institution").val(d);
$("#designation").val(f);
$("#fee").val(g);

$("#picture").val(h);
$("#imgprev").css("display",'block');
$("#imgprev").attr("src","upload/"+k);
        index=i;
    }

    // function work(){
    //     display();
    //     document.getElementById("Code").value="";
    //     document.getElementById("TestCode").value="";
    //     document.getElementById("Type").value="";
    //     document.getElementById("GroupCode").value="";
    //     document.getElementById("Investigation").value="";
    //     document.getElementById("Details").value="";
    //     document.getElementById("Amount").value="";
    
   // }
   function work(){
display();
$("#doctorid").val("");
$("#doctorname").val("");
$("#qualification").val("");
$("#institution").val("");
$("#designation").val("");
$("#fee").val("");
$("#Amount").val("");

}
function add(){
a=$("#doctorid").val();
b=$("#doctorname").val();
c=$("#qualification").val();
d=$("#institution").val();
f=$("#designation").val();
g=$("#fee").val();

h=$("#picture").val(); 
        url=`${U}/insertdoctors.php?doctorid=${a}&doctorname=${b}&qualification=${c}&institution=${d}&designation=${f}&fee=${g}&picture=${h}`;   
        console.log(url);
        $.get(url,{},function(data){
            alert(data);
data=JSON.parse(data)
$("#action").html(data.total+" records Inserted");
work();
});


}
function update(){
a=$("#doctorid").val();
b=$("#doctorname").val();
c=$("#qualification").val();
d=$("#institution").val();
f=$("#designation").val();
g=$("#Details").val();

h=$("#picture").val();
url=`${U}/updatedoctors.php?doctorid=${a}&doctorname=${b}&qualification=${c}&institution=${d}&designation=${f}&fee=${g}&picture=${h}`;
$.get(url,{},function(data){
work();
});

}
function remove(i,event){
event.stopPropagation();
a=i;
url=`${U}/deletedoctors.php?Code=${a}`;
$.get(url,{},function(data){
work();
});
}
  
</script>



<script> 
    $(document).ready(function(){

$("#but_upload").click(function(){

     var fd = new FormData();

     var files = $('#file')[0].files;

     // Check file selected or not
     if(files.length > 0 ){

          fd.append('file',files[0]);

          $.ajax({
               url:'upload.php',
               type:'post',
               data:fd,
               dataType: 'json',
               contentType: false,
               processData: false,
               success:function(response){
                    if(response.status == 1){
                        alert(JSON.stringify(response.name))
                         var extension = response.extension;
                         var path = response.path;
                         $("#picture").val(response.name);
                         $('.prevel').hide();
                         if(extension == 'pdf' || extension == 'docx'){
                               $("#fileprev").attr("href",path);
                               $("#fileprev").show();
                         }else{
                               $("#imgprev").attr("src",path);
                               $("#imgprev").show();
                         }

                    }else{
                         alert('File not uploaded');
                    }
               }
          });
     }else{
          alert("Please select a file.");
     }
});
});
</script>
</body>
</html>