<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">CRUD on Single Page Application(SPA)</h1>
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
        <label for="TestCode">TextCode</label>
        <input type="text" id="TestCode" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="Type">Type</label>
        <input type="text" id="Type" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="GroupCode">GroupCode</label>
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
<table class="table">
    <caption>Total Rows: <span id="tot"></span></caption>
    <thead>
        <th>Code</th>
        <th>TestCode</th>
        <th>Type</th>
        <th>GroupCode</th>
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
    //here index and st are global variables. 
    //because they can be used from any where in script
    let index=0;
    let st={records:[]};
    var U=document.getElementById("url").value;
    function display(){
            //st.records = localStorage.getItem('records');
              let p1=fetch(`${U}/Gettests.php`);
            let p2 = p1.then(res =>res.json()).then(data => {
                console.log(data);
                st.records=data.records;
                //alert(data.total)
                document.getElementById("tot").innerHTML=data.total;
                let a="";   
                let i=0;    
                for(d of st.records){  
                    a+=`<tr onclick="show?.('${d?.Code}','${d?.TestCode}','${d?.Type}','${d?.GroupCode}','${d?.Investigation}','${d.Details}','${d.Amount}','${d.picture}','${i}')"><td>${d.Code}</td><td>${d.TestCode}</td><td>${d.Type}</td><td>${d.GroupCode}</td><td>${d.Investigation}</td><td>${d.Details}</td> <td>${d.Amount}</td><td><img src="upload/${d.picture}" class="img-fluid"/></td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.Code}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                }       
                document.getElementById("tb").innerHTML=a;
                
        });        
    }
    display();

    function show(a,b,c,d,f,g,h,k,i){
        document.getElementById("Code").value=a;
        document.getElementById("TestCode").value=b;
        document.getElementById("Type").value=c;
        document.getElementById("GroupCode").value=d;
        document.getElementById("Investigation").value=f;
        document.getElementById("Details").value=g;
        document.getElementById("Amount").value=h;
        document.getElementById("picture").value=k;
document.getElementById("imgprev").src="upload/"+d;
document.getElementById("imgprev").style.display = 'block';;
//document.getElementById("Action").value=l;
        index=i;
    }

    function work(){
        display();
        document.getElementById("Code").value="";
        document.getElementById("TestCode").value="";
        document.getElementById("Type").value="";
        document.getElementById("GroupCode").value="";
        document.getElementById("Investigation").value="";
        document.getElementById("Details").value="";
        document.getElementById("Amount").value="";
       
        
        
    }

    function add(){
        a=document.getElementById("Code").value;
       b=document.getElementById("TestCode").value;
        c=document.getElementById("Type").value;
        d=document.getElementById("GroupCode").value;
        f=document.getElementById("Investigation").value;
        g=document.getElementById("Details").value;
        h=document.getElementById("Amount").value;
       
       // l=document.getElementById("Action").value;
       
        //let o={userid:a,name:b,class:c,address:d};  
        url=`${U}/inserttests.php?Code=${a}&TestCode=${b}&Type=${c}&GroupCode=${d}&Investigation=${f}&Details=${g}&Amount=${h}`;   
        console.log(url);
        //localStorage.setItem('records', JSON.stringify(st.records));
        let p1 = fetch(url); 
        let p2 = p1.then(res =>res.json()).then(data => {
            //st.records.push(o);
            document.getElementById("action").innerHTML=data.total+" records Inserted";
            work();
        });
            
    }
    
    function update(){
        // st.records[index].id=document.getElementById("id").value;
        // st.records[index].name=document.getElementById("name").value;
        // st.records[index].class=document.getElementById("class").value;
        // st.records[index].adress=document.getElementById("address").value;
        //localStorage.setItem('records', JSON.stringify(st.records));
        a=document.getElementById("Code").value;
        b=document.getElementById("TestCode").value;
        c=document.getElementById("Type").value;
        d=document.getElementById("GroupCode").value;
        f=document.getElementById("Investigation").value;
        g=document.getElementById("Details").value;
        h=document.getElementById("Amount").value;
        k=document.getElementById("picture").value;
        //l=document.getElementById("Action").value;
       
        
        url=`${U}/updatetests.php?Code=${a}&TestCode=${b}&Type=${c}&GroupCode=${d}&Investigation=${f}&Details=${g}&Amount=${h}&picture=${k}`;      
        let p1 = fetch(url); 
            let p2 = p1.then(data => {
            work();
        });
       
    }
    function remove(i,event){
        event.stopPropagation();
        a=i;
        url=`${U}/deletetests.php?Code=${a}`;      
        let p1 = fetch(url); 
            let p2 = p1.then(data => {
            work();
        });
        //st.records.splice(i,1);
        //localStorage.setItem('records', JSON.stringify(st.records));
        work();
    }
    
</script>
<script
src="https://code.jquery.com/jquery-1.12.4.min.js"
integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
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