<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tests</title>
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
        <h1 class="text-center" style="color:blue;"> 💊 💉 🏥  TESTS Entry 📝 🗒️ 📑  </h1> <hr/> <hr/>
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
        <label for="Code">Code</label>
        <input type="text" id="Code" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="TestCode">Test Code</label>
        <input type="text" id="TestCode" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="Type">Type</label>
        <input type="text" id="Type" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="GroupCode">Group Code</label>
        <input type="text" id="GroupCode" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="Investigation">Investigation</label>
        <input type="text" id="Investigation" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="Details">Details</label>
        <input type="text" id="Details" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="Amount">Amount</label>
        <input type="number" id="Amount" class="form-control"/>
    </div> <br/>

    <div class="form-group">
        <input type="file" id="file" name="file" /> 
        <input type="hidden" id="picture" /> 
        <input type="button" class="button" value="Upload" id="but_upload">
        <hr/>
        <div style="margin-top: 40px;" >
        
  
        <img src="" class="prevel img-fluid" id="imgprev" width="300" style="display: none;" >
        
   
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
        <th>Code</th>
        <th>Test Code</th>
        <th>Type</th>
        <th>Group Code</th>
         <th>Investigation</th>
        <th>Details</th>
        <th>Amount</th>
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
    
    let index=0;
    let st={records:[]};
   
    var U=$("#url").val();
    function display(){
            
            $.get(`${U}/gettests.php`,{},function(data){
data=JSON.parse(data)
                console.log(data);
                st.records=data.records;
               
               $("#tot").html(data.total);
                let a="";   
                 
                
                    $.each(st.records, function(i, d) {
                    a+=`<tr onclick="show?.('${d?.Code}','${d?.TestCode}','${d?.Type}','${d?.GroupCode}','${d?.Investigation}','${d.Details}','${d.Amount}','${d.picture}','${i}')"><td>${d.Code}</td><td>${d.TestCode}</td><td>${d.Type}</td><td>${d.GroupCode}</td><td>${d.Investigation}</td><td>${d.Details}</td> <td>${d.Amount}</td><td><img src="upload/${d.picture}" class="img-fluid"/></td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.Code}',event)">Remove</button></td></tr>`;
                    i++; 
                } )      
               
               $("#tb").html(a);
                
        });        
    }
    display();

    function show(a,b,c,d,f,g,h,k,i){
$("#Code").val(a);
$("#TestCode").val(b);
$("#Type").val(c);
$("#GroupCode").val(d);
$("#Investigation").val(f);
$("#Details").val(g);
$("#Amount").val(h);
$("#picture").val(k);
$("#imgprev").css("display",'block');
$("#imgprev").attr("src","upload/"+k);
        index=i;
    }

   
   function work(){
display();
$("#Code").val("");
$("#TestCode").val("");
$("#Type").val("");
$("#GroupCode").val("");
$("#Investigation").val("");
$("#Details").val("");
$("#Amount").val("");
$("#picture").val("");

}
function add(){
a=$("#Code").val();
b=$("#TestCode").val();
c=$("#Type").val();
d=$("#GroupCode").val();
f=$("#Investigation").val();
g=$("#Details").val();
h=$("#Amount").val();
k=$("#picture").val(); 
        url=`${U}/inserttests.php?Code=${a}&TestCode=${b}&Type=${c}&GroupCode=${d}&Investigation=${f}&Details=${g}&Amount=${h}&picture=${k}`;   
        console.log(url);
        $.get(url,{},function(data){
            alert(data);
data=JSON.parse(data)
$("#action").html(data.total+" records Inserted");
work();
});


}
function update(){
a=$("#Code").val();
b=$("#TestCode").val();
c=$("#Type").val();
d=$("#GroupCode").val();
f=$("#Investigation").val();
g=$("#Details").val();
h=$("#Amount").val();
k=$("#picture").val();
url=`${U}/updatetests.php?Code=${a}&TestCode=${b}&Type=${c}&GroupCode=${d}&Investigation=${f}&Details=${g}&Amount=${h}&picture=${k}`;
$.get(url,{},function(data){
work();
});

}
function remove(i,event){
event.stopPropagation();
a=i;
url=`${U}/deletetests.php?Code=${a}`;
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