<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commission</title>
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

        <h1 class="text-center" style="color:blue;"> 👩‍⚕️ 🧑‍⚕️ 👨‍⚕️ 🏥  Doctors Commission per TESTS  💊 💉 </h1> <hr/> <hr/>
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
        <label for="department"> 🏥 🏨 Department</label>
        <select id="department" name="department">
    <option value="">Select</option>
        <?php
        include("library.php");
        $a=new library();	
        $m=$a->db;
        $q="select distinct details from tests order by details";
        $r=$m->query($q);
        while($r1=$r->fetch_array(MYSQLI_NUM)){
               echo "<option value='$r1[0]'>$r1[0]</option>"; 
        }
        ?>

        </select>
    </div>    <br/> <br/>


    <div class="form-group">
        <label for="percent">Percentage ( % )</label>
        <input type="text" id="percent" name="percent" class="form-control"/>

    </div>    <br/> <br/>
  
                
    
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
<div class="col-sm-6">

<table class="table table-bordered" style="text-align:center;border: 5px solid blue;">

    <caption>Total Rows: <span id="tot"></span></caption>
    <thead>
        <th>Department</th>
        <th>Percentage ( % )</th>
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
            $.get(`${U}/getCommission.php`,{},function(data){
           data=JSON.parse(data)
                console.log(data);
                st.records=data.records;
                //alert(data.total)
               // document.getElementById("tot").innerHTML=data.total;
               $("#tot").html(data.total);
                let a="";   
                 
                    $.each(st.records, function(i, d) {
                    a+=`<tr onclick="show?.('${d?.department}','${d?.percent}','${i}')"><td>${d.department}</td><td>${d.percent}</td>
                        <td><button type="button"  class="btn btn-danger" onclick="remove('${d.department}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                } )      
               $("#tb").html(a);
                
        });        
    }
    display();

    function show(a,b,i){
$("#department").val(a);
$("#percent").val(b);
        index=i;
    }

   function work(){
display();
$("#department").val("");
$("#percent").val("");
}
function add(){
a=$("#department").val();
b=$("#percent").val(); 
        url=`${U}/insertCommission.php?department=${a}&percent=${b}`;   
        console.log(url);
        $.get(url,{},function(data){
            alert(data);
data=JSON.parse(data)
$("#action").html(data.total+" records Inserted");
work();
});


}
function update(){
a=$("#department").val();
b=$("#percent").val();
url=`${U}/updateCommission.php?department=${a}&percent=${b}`;
$.get(url,{},function(data){
work();
});

}
function remove(i,event){
event.stopPropagation();
a=i;
url=`${U}/deleteCommission.php?department=${a}`;
$.get(url,{},function(data){
work();
});
}
  
</script>

</body>
</html>