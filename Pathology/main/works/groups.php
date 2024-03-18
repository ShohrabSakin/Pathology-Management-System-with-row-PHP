<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groups</title>
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

        <h1 class="text-center" style="color:blue;"> 💊 💉 🏥  Groups Entry 📝 🗒️ 📑  </h1> <hr/> <hr/>
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
        <label for="groupcode">Group Code</label>
        <input type="text" id="groupcode" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">Group Name</label>
        <input type="text" id="groupname" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">Company</label>
        <input type="text" id="company" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">SHOW</label>
        <input type="text" id="SHOW" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">Small Dept.</label>
        <input type="text" id="smalldept" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">Small name Sl.</label>
        <input type="text" id="smallnamesl" class="form-control"/>
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
<table class="table table-bordered" style="text-align:center;border: 5px solid blue;">

    <caption>Total Rows: <span id="tot"></span></caption>
    <thead>
        <th>Group Code</th>
        <th>Group Name</th>
        <th>Company</th>
        <th>SHOW</th>
        <th>Small Dept.</th>
        <th>Small name Sl.</th>
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
            
            $.get(`${U}/getgroups.php`,{},function(data){
data=JSON.parse(data)
                console.log(data);
                st.records=data.records;
                
               $("#tot").html(data.total);
                let a="";   
              
                $.each(st.records, function(i, d) {
                    a+=`<tr onclick="show('${d?.groupcode}','${d?.groupname}','${d?.company}','${d?.SHOW}',
                    '${d?.smalldept}','${d?.smallnamesl}','${i}')"><td>${d.groupcode}</td><td>${d.groupname}</td><td>${d.company}</td><td>${d.SHOW}</td>
                    <td>${d.smalldept}</td><td>${d.smallnamesl}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.groupcode}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                })       
             
              $("#tb").html(a);
                
        });        
    }
    display();

    function show(a,b,c,d,f,g,i){
        $("#groupcode").val(a);
$("#groupname").val(b);
$("#company").val(c);
$("#SHOW").val(d);
$("#smalldept").val(f);
$("#smallnamesl").val(g);
index=i;

        index=i;
    }

    function work(){
        
display();
$("#groupcode").val("");
$("#groupname").val("");
$("#company").val("");
$("#SHOW").val("");
$("#smalldept").val("");
$("#smallnamesl").val("");

    }

   
function add(){
a=$("#groupcode").val();
b=$("#groupname").val();
c=$("#company").val();
d=$("#SHOW").val();
f=$("#smalldept").val();
g=$("#smallnamesl").val();
        
         
        url=`${U}/insertgroups.php?groupcode=${a}&groupname=${b}&company=${c}&SHOW=${d}&smalldept=${f}&smallnamesl=${g}`;  
        console.log(url)    ;
   
    url=`${U}/insertgroups.php?groupcode=${a}&groupname=${b}&company=${c}&SHOW=${d}&smalldept=${f}&smallnamesl=${g}`;
$.get(url,{},function(data){
$("#action").html(data.total+" records Inserted");
work();
});


}
function update(){
a=$("#groupcode").val();
b=$("#groupname").val();
c=$("#company").val();
d=$("#SHOW").val();
f=$("#smalldept").val();
g=$("#smallnamesl").val();
url=`${U}/updategroups.php?groupcode=${a}&groupname=${b}&company=${c}&SHOW=${d}&smalldept=${f}&smallnamesl=${g}`;
console.log(url);
$.get(url,{},function(data){
work();
});


}

function remove(i,event){
event.stopPropagation();
a=i;
url=`${U}/deletegroups.php?groupcode=${a}`;
$.get(url,{},function(data){
work();
});
work();
}
    
</script>
</body>
</html>