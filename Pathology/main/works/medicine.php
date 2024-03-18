<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine</title>
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

<body style="background-color:lightyellow;font-weight:bold;" >

    <div class="container-fluid">
        
        <h1 class="text-center" style="color:blue;"> 💊 💉 🏥 🩺 Medicines Entries 👩‍⚕️ 📝 🗒️ 📑 </h1> <hr/> <hr/>

        <?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://"; 
}else{
    $url = "http://"; 
}
?>
<input type="hidden" id="url" value="<?=$url.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);?>"/>
        <div class="row">
            <div class="col-sm-2">
    <div class="form-group">
        <label for="itemcode">Item Code</label>
        <input type="text" id="itemcode" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="itemname">Item Name</label>
        <input type="text" id="itemname" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="geneticname">Genetic Name</label>
        <input type="text" id="geneticname" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" id="type" class="form-control"/>
    </div>
  
   
 
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
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Genetic Name</th>
        <th>Type</th>
        
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
            $.get(`${U}/getmedicine.php`,{},function(data){
data=JSON.parse(data)
                console.log(data);
                st.records=data.records;
                //alert(data.total)
               // document.getElementById("tot").innerHTML=data.total;
               $("#tot").html(data.total);
                let a="";   
                 
                //for(d of st.records){  
                    $.each(st.records, function(i, d) {
                    a+=`<tr onclick="show?.('${d?.itemcode}','${d?.itemname}','${d?.geneticname}','${d?.type}','${i}')"><td>${d.itemcode}</td><td>${d.itemname}</td><td>${d.geneticname}</td><td>${d.type}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.itemcode}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                } )      
               // document.getElementById("tb").innerHTML=a;
               $("#tb").html(a);
                
        });        
    }
    display();

    function show(a,b,c,d,i){
$("#itemcode").val(a);
$("#itemname").val(b);
$("#geneticname").val(c);
$("#type").val(d);

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
$("#itemcode").val("");
$("#itemname").val("");
$("#geneticname").val("");
$("#type").val("");


}
function add(){
a=$("#itemcode").val();
b=$("#itemname").val();
c=$("#geneticname").val();
d=$("#type").val();

        url=`${U}/insertmedicine.php?itemcode=${a}&itemname=${b}&geneticname=${c}&type=${d}`;   
        console.log(url);
        $.get(url,{},function(data){
           // alert(data);
data=JSON.parse(data)
$("#action").html(data.total+" records Inserted");
work();
});


}
function update(){
a=$("#itemcode").val();
b=$("#itemname").val();
c=$("#geneticname").val();
d=$("#type").val();

url=`${U}/updatemedicine.php?itemcode=${a}&itemname=${b}&geneticname=${c}&type=${d}`;
console.log(url);
$.get(url,{},function(data){
work();
});

}
function remove(i,event){
event.stopPropagation();
a=i;
url=`${U}/deletemedicine.php?itemcode=${a}`;
console.log(url);
$.get(url,{},function(data){
work();
});
}
  
</script>
     
</body>
</html>