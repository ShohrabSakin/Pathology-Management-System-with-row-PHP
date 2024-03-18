<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O/E</title>
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

        <h1 class="text-center" style="color:blue;">  O/E Items </h1> <hr/> <hr/>
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
        <label for="id">ID</label>
        <input type="number" id="id" class="form-control"/>
    </div> <br/>


    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control"/>
    </div> <br/>


    <div class="form-group">
        <label for="value">Value</label>
        <input type="number" id="value" class="form-control"/>
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
        let index=0;
    let st={records:[]};
    var U=$("#url").val();
    
    function display(){
            
            $.get(`${U}/geto_e.php`,{},function(data){
data=JSON.parse(data)
                console.log(data);
                st.records=data.records;
                
               $("#tot").html(data.total);
                let a="";   
              
                $.each(st.records, function(i, d) {
                    a+=`<tr onclick="show('${d?.id}','${d?.name}','${d?.value}','${i}')"><td>${d.id}</td><td>${d.name}</td><td>${d.value}</td>
                    <td><button type="button"  class="btn btn-danger" onclick="remove('${d.id}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                })       
             
              $("#tb").html(a);
                
        });        
    }
    display();

    function show(a,b,c,i){
        $("#id").val(a);
$("#name").val(b);
$("#value").val(c);

index=i;

        index=i;
    }

    function work(){
        
display();
$("#id").val("");
$("#name").val("");
$("#value").val("");


    }

   
function add(){
a=$("#id").val();
b=$("#name").val();
c=$("#value").val();

        
         
        url=`${U}/inserto_e.php?id=${a}&name=${b}&value=${c}`;  
        console.log(url)    ;
   
    url=`${U}/inserto_e.php?id=${a}&name=${b}&value=${c}`;
$.get(url,{},function(data){
$("#action").html(data.total+" records Inserted");
work();
});


}
function update(){
a=$("#id").val();
b=$("#name").val();
c=$("#value").val();

url=`${U}/updateo_e.php?id=${a}&name=${b}&value=${c}`;
console.log(url);
$.get(url,{},function(data){
work();
});


}

function remove(i,event){
event.stopPropagation();
a=i;
url=`${U}/deleteo_e.php?id=${a}`;
$.get(url,{},function(data){
work();
});
work();
}
    
</script>
</body>
</html>