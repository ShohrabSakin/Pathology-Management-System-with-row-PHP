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
            <div class="col-sm-4">
    <div class="form-group">
        <label for="groupcode">groupcode</label>
        <input type="text" id="groupcode" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">groupname</label>
        <input type="text" id="groupname" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">company</label>
        <input type="text" id="company" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">SHOW</label>
        <input type="text" id="SHOW" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">smalldept</label>
        <input type="text" id="smalldept" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="groupname">smallnamesl</label>
        <input type="text" id="smallnamesl" class="form-control"/>
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
<div class="col-sm-8">
<table class="table">
    <caption>Total Rows: <span id="tot"></span></caption>
    <thead>
        <th>groupcode</th>
        <th>groupname</th>
        <th>company</th>
        <th>SHOW</th>
        <th>smalldept</th>
        <th>smallnameSl</th>
        <th>action</th>


        
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
    var U=document.getElementById("url").value;
    function display(){
            //st.records = localStorage.getItem('records');
            let p1 = fetch(`${U}/getgroups.php`); 
            let p2 = p1.then(res =>res.json()).then(data => {
                console.log(data);
                st.records=data.records;
                //alert(data.total)
                document.getElementById("tot").innerHTML=data.total;
                let a="";   
                let i=0;    
                for(d of st.records){  
                    a+=`<tr onclick="show('${d?.groupcode}','${d?.groupname}','${d?.company}','${d?.SHOW}',
                    '${d?.smalldept}','${d?.smallnamesl}','${i}')"><td>${d.groupcode}</td><td>${d.groupname}</td><td>${d.company}</td><td>${d.SHOW}</td>
                    <td>${d.smalldept}</td><td>${d.smallnamesl}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.groupcode}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                }       
                document.getElementById("tb").innerHTML=a;
                
        });        
    }
    display();

    function show(a,b,c,d,f,g,i){
        document.getElementById("groupcode").value=a;
        document.getElementById("groupname").value=b;
        document.getElementById("company").value=c;
        document.getElementById("SHOW").value=d;
        document.getElementById("smalldept").value=f;
        document.getElementById("smallnamesl").value=g;

        index=i;
    }

    function work(){
        display();
        document.getElementById("groupcode").value="";
        document.getElementById("groupname").value="";
        document.getElementById("company").value="";
        document.getElementById("SHOW").value="";
        document.getElementById("smalldept").value="";
        document.getElementById("smallnamesl").value="";
    }

    function add(){
        a=document.getElementById("groupcode").value;
        b=document.getElementById("groupname").value;
        c=document.getElementById("company").value;
        d=document.getElementById("SHOW").value;
        f=document.getElementById("smalldept").value;
        g=document.getElementById("smallnamesl").value;
        
        //let o={userid:a,name:b,class:c,address:d};  
        url=`${U}/insertgroups.php?groupcode=${a}&groupname=${b}&company=${c}&SHOW=${d}&smalldept=${f}&smallnamesl=${g}`;  
        console.log(url)    ;
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
        a=document.getElementById("groupcode").value;
        b=document.getElementById("groupname").value;
        c=document.getElementById("company").value;
        d=document.getElementById("SHOW").value;
        f=document.getElementById("smalldept").value;
        g=document.getElementById("smallnamesl").value;
        url=`${U}/updategroups.php?groupcode=${a}&groupname=${b}&company=${c}&SHOW=${d}&smalldept=${f}&smallnamesl=${g}`;      
        let p1 = fetch(url); 
            let p2 = p1.then(data => {
            work();
        });
       
    }
    function remove(i,event){
        event.stopPropagation();
        a=i;
        url=`${U}/deletegroups.php?groupcode=${a}`;      
        let p1 = fetch(url); 
            let p2 = p1.then(data => {
            work();
        });
        //st.records.splice(i,1);
        //localStorage.setItem('records', JSON.stringify(st.records));
        work();
    }
    
</script>
</body>
</html>