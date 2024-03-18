<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C/O</title>
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

        <h1 class="text-center" style="color:blue;">C/O Charts</h1> <hr/> <hr/>
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
        <label for="id">ID</label>
        <input type="text" id="id" name="id" class="form-control"/>
    </div> <br/>


    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name"  name="name" class="form-control"/>
    </div> <br/>


    <div class="form-group">
        <label for="show_value">Value</label>
        <input type="text" id="show_value"  name="show_value" class="form-control"/>
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
<div class="col-sm-10">
<table class="table table-bordered" style="text-align:center;border: 5px solid blue;">

    <caption>Total Rows: <span id="tot"></span></caption>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Value</th>
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
            $.get(`${U}/getC_O.php`,{},function(data){
data=JSON.parse(data)
                console.log(data);
                st.records=data.records;
                //alert(data.total)
               // document.getElementById("tot").innerHTML=data.total;
               $("#tot").html(data.total);
                let a="";   
                 
                //for(d of st.records){  
                    $.each(st.records, function(i, d) {
                    a+=`<tr onclick="show?.('${d?.id}','${d?.name}','${d?.show_value}','${i}')"><td>${d.id}</td><td>${d.name}</td><td>${d.show_value}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.id}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                } )      
               // document.getElementById("tb").innerHTML=a;
               $("#tb").html(a);
                
        });        
    }
    display();

    function show(a,b,c,i){
$("#id").val(a);
$("#name").val(b);
$("#show_value").val(c);
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
$("#id").val("");


}
function add(){
a=$("#id").val();
b=$("#name").val();
c=$("#show_value").val();


        url=`${U}/insertC_O.php?id=${a}&name=${b}&show_value=${c}`;   
        console.log(url);
        $.get(url,{},function(data){
           // alert(data);
data=JSON.parse(data)
$("#action").html(data.total+" records Inserted");
work();
});


}
function update(){
a=$("#id").val();
b=$("#name").val();
c=$("#show_value").val();


url=`${U}/updateC_O.php?id=${a}&name=${b}&show_value=${c}`;
$.get(url,{},function(data){
work();
});

}
function remove(i,event){
event.stopPropagation();
a=i;
url=`${U}/deleteC_O.php?id=${a}`;
$.get(url,{},function(data){
work();
});
}
  
</script>
      
</body>
</html>