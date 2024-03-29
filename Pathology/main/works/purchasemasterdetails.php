<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Master Details</title>
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
        <h1 class="text-center" style="color:blue;"> Pathology Reagents Purchase </h1> <hr/> <hr/>
        <?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
$url = "https://";
}else{
$url = "http://";
}
?>
<input type="hidden" id="url" value="<?=$url.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);?>"/>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="profile">Profile</label>
                    <input type="checkbox" id="profile" onchange="profileChange()"/>
                    <select id="chkprofile" onchange="selectChange()">
                        <option value="">Select</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="suppliername">Supplier Name</label>
                    <input type="text" id="suppliername" class="form-control"/>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="vrno">vrno</label>
                    <input type="text" id="vrno" class="form-control"/>
                </div>

            </div>

        </div>
        
        
        <div class="row">
            <div class="col-sm-3">
    <div class="form-group">
        <label for="Code">Code</label>
        <input type="text" id="Code" class="form-control" onkeyup="GetTestDetails(event)"/>
    </div>

    <div class="form-group">
        <label for="Investigation">Investigation</label>
        <input type="text" id="Investigation" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" id="price" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="qty">Quantity</label>
        <input type="text" id="qty" class="form-control" onkeyup="GetTotal()"/>
    </div>
    
    <div class="form-group">
        <label for="total">Total</label>
        <input type="text" id="total" class="form-control"/>
    </div> <br/>
    
    <div class="form-group">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="button" class="btn btn-info" onclick="update()">Update</button>            
          </div>
    </div>
    <div class="form-group">
        <div id="action"></div>
    </div>
</div>
<div class="col-sm-9">

<table class="table table-bordered" style="text-align:center;border: 5px solid blue;">

    <caption>Total Rows: <span id="tot"></span></caption>
    <thead>

        <th>SL NO.</th>

        <th>Test ID</th>

        <th>Investigation</th> 
        <th>Group</th>    
        <th>Report Group</th> 
        <th>Rate</th>

        <th>Quantity</th>

        <th>Total</th>
        <th>Action</th>

    </thead>

    <tbody id="tb">

    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align:right">Total</td>
            <td><input type="text" id="linetotal" class="form-control"/></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:right">Discount</td>
            <td><input type="text" id="linediscount" class="form-control" onkeyup="GetLine()"/></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:right">Net</td>
            <td><input type="text" id="linenet" class="form-control"/></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:right">Paid</td>
            <td><input type="text" id="linepaid" class="form-control" onkeyup="GetLine()"/></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:right">Due</td>
            <td><input type="text" id="linedue" class="form-control"/></td>
        </tr>
    </tfoot>
</table>
<div class="form-group">
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button type="button" class="btn btn-success" onclick="save()">Save</button>            
        <button type="button" class="btn btn-warning" onclick="Delete()">Delete</button>            
        <button type="button" class="btn btn-info" onclick="print()">Print</button>            
   </div>
</div>
</div>
</div>
</div>
<script>
    //here index and st are global variables. 
    //because they can be used from any where in script
    let index=0;

    let st={records:[]};
    var U=$("#url").val();
    //var U=$("#url").val();

    function goToReport(report,slno,dt,test){
        vrno=$("#vrno").val();
        var U=$("#url").val();
        sn=$("#SupplerName").val();
        //vrno=$("#vrno").val();
        console.log(report)
        if(report=="blood_group"){
            window.open(`reports/blood_group.php?vrno=${vrno}`)
        }
        else if(report=="BioChemical"){
            window.open(`reports/bio-chemical-test.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}`)
        }
        else if(report=="E.C.G"){
            window.open(`reports/E.C.G.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}`)
        }
        else if(report=="LIPID_PROFILE"){
            window.open(`reports/LIPID_PROFILE.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}`)
        }
        else if(report=="PREGNANCY TEST"){
            window.open(`reports/Pregnancy_test.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}`)
        }  
        else if(report=="HBSAG (SCREENING)"){
            window.open(`reports/serologicalreport.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}`)
        }
    }

    function print(){
        //var a=document.querySelector('#vrno').val();
        var a=$('#vrno').val();
        window.location=`reports/purchasereport.php?vrno=${a}`;
    }
    function Delete(){
       // var a=document.querySelector('#chkprofile').val();
var a=$('#chkprofile').val();
        url=`${U}/deletepurchasetotal.php?vrno=${a}`;      
        // let p1 = fetch(url); 
        // let p2 = p1.then(res =>res.json()).then(data => {
            $.get(url,{},function(data){
data=JSON.parse(data)

            //alert(JSON.stringify(data));
            //alert(a)
            url=`${U}/deletepurchaselineitems.php?vrno=${a}`;      
            //let p3 = fetch(url); 
           // let p4 = p3.then(res =>res.json()).then(data => {
            $.get(url,{},function(data){
data=JSON.parse(data)

                //alert(JSON.stringify(data));
                location.reload();    
            });     
        });
    }
    function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
            }

    function formatDate2(date) {
                
            return [
                date.getFullYear(),
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
            ].join('-');
            }

    function selectChange(){
        var a = $('#chkprofile');
        //var a = document.querySelector('#chkprofile');
        b = a.val();
        url=`${U}/getpurchasetotalbyvrno.php?vrno=${b}`;    
        console.log(url)  
            //let p1 = fetch(url); 
            //let p2 = p1.then(res =>res.json()).then(data => {
                $.get(url,{},function(data){
data=JSON.parse(data)

                    if (data.records.length>0){
                    // $("#vrno").val()=data.records[0].vrno;
                    // $("#date").val()=formatdate2(new Date(data.records[0].date));
                    // $("#suppliername").val()=data.records[0].CustomerName;
                    // $("#linetotal").val()=data.records[0].Total;
                    // $("#linediscount").val()=data.records[0].discount;                    
                    // $("#linenet").val()=data.records[0].net;
                    // $("#linepaid").val()=data.records[0].paid;
                    // $("#linedue").val()=data.records[0].due;
                    $("#vrno").val(data.records[0].vrno);
$("#date").val(formatDate2(new Date(data.records[0].date)));
$("#suppliername").val(data.records[0].suppliername);
$("#linetotal").val(data.records[0].Total);
$("#linediscount").val(data.records[0].discount);
$("#linenet").val(data.records[0].net);
$("#linepaid").val(data.records[0].paid);
$("#linedue").val(data.records[0].due);

                    }
                    st.records=[];
                    url=`${U}/getpurcheselineitemsbyvrno.php?vrno=${b}`;      
                   // let p3 = fetch(url); 
                   // let p4 = p3.then(res =>res.json()).then(data => { 
                    $.get(url,{},function(data){
data=JSON.parse(data)
                       // for(d of data.records){ 
                        $.each(data.records, function(i, d) { 
                            let o={Code:d.itemcode,Investigation:d.itemname,price:d.price,qty:d.qty,total:d.total}; 
                            st.records.push(o) ; 
                        });
                        display1();
                           
                    });

            });
    }
    function profileChange(){
        var a=$("#profile").is(":checked");
       // var a=$("#profile").checked;
        if(a){
            url=`${U}/getpurchasevrnos.php`; 
            console.log(url)     
            //localStorage.setItem('records', JSON.stringify(st.records));
            //let p1 = fetch(url); 
           // let p2 = p1.then(res =>res.json()).then(data => { 
            $.get(url,{},function(data){
data=JSON.parse(data)
                //for(d of data.records){ 
                    $.each(data.records, function(i, d) { 
                   // var select = document.querySelector('#chkprofile'); 
                   // var option = new Option(d.vrno, d.vrno);
                    //select.add(option, undefined);
                    $('#chkprofile').append(`<option value="${d.vrno}">${d.vrno}</option>`);
                });
            });
        }else{
            location.reload();
        }
    }
    save=function(){
        //var a=document.querySelector('#chkprofile').val();
        var a=$('#chkprofile').val();
        url=`${U}/deletepurchasetotal.php?vrno=${a}`;
       // alert(url)      
        //let p1 = fetch(url); 
       // let p2 = p1.then(res =>res.json()).then(data => {
                  $.get(url,{},function(data){
data=JSON.parse(data)
            url=`${U}/deletepurchaselineitems.php?vrno=${a}`;  
           // alert(url)       
           // let p3 = fetch(url); 
           // let p4 = p3.then(res =>res.json()).then(data => {
            $.get(url,{},function(data){
data=JSON.parse(data)

                //alert('here')
                Insert();
            });     
        });
            
        
    }

    function Insert(){
        // vrno=$("#vrno").val();
        //     dt=$("#date").val();
        //     cn=$("#suppliername").val();
        //     total=$("#linetotal").val();
        //     discount=$("#linediscount").val();
        //     net=$("#linenet").val();
        //     paid=$("#linepaid").val();
        //     due=$("#linedue").val();
        vrno=$("#vrno").val();
        dt=$("#date").val();
sn=$("#suppliername").val();
total=$("#linetotal").val();
discount=$("#linediscount").val();
net=$("#linenet").val();
paid=$("#linepaid").val();
due=$("#linedue").val();

            let i=1;
            
       // for(d of st.records){  
        $.each(st.records, function(i, d) {            
            url=`${U}/insertpurchaselineitems.php?vrno=${vrno}&itemcode=${d.Code}&itemname=${d.Investigation}&qty=${d.qty}&price=${d.price}&total=${d.total}`;      
            //alert(url)
            //localStorage.setItem('records', JSON.stringify(st.records));
            //let p1 = fetch(url); 
            //let p2 = p1.then(res =>res.json()).then(data => { });  
            $.get(url,{},function(data){data=JSON.parse(data)});
        }); 
        
        
        url=`${U}/insertpurchasetotal.php?vrno=${vrno}&suppliername=${sn}&date=${dt}&total=${total}&discount=${discount}&net=${net}&paid=${paid}&due=${due}`;      
        console.log(url);
            //localStorage.setItem('records', JSON.stringify(st.records));
           // let p1 = fetch(url); 
            //let p2 = p1.then(res =>res.json()).then(data => { }
               

$.get(url,{},function(data){
    data=JSON.parse(data);
    print();
});
    }
    
    function GetTotal(){
        var a=$("#price").val();
        var b=$("#qty").val();
        $("#total").val(a*b);
    }
    function GetLine(){
        var a=$("#linetotal").val();
        var b=$("#linediscount").val();
        $("#linenet").val(a-b) ;
        var c=$("#linepaid").val();
        $("#linedue").val(a-b-c);
    }
    GetTestDetails=function(){
        var a=$("#Code").val();
        $("#Investigation").val("");
        $("#price").val("");
        $("#total").val("");
        
        console.log(`${U}/gettestbycode.php?Code=${a}`)
        let p1 = fetch(`${U}/gettestbycode.php?Code=${a}`); 
            let p2 = p1.then(res =>res.json()).then(data => {
                console.log(JSON.stringify(data.records));
                //alert(data.records.length)
                if(data.records.length>0){
                $("#Investigation").val(data.records[0].investigation);
                $("#price").val(data.records[0].amount);
                $("#total").val(data.records[0].amount);
                b=$("#Investigation").val()//=data.records[0].investigation;
                c=$("#price").val()//=data.records[0].amount;
                $("#qty").val(1);
                d=1;
                f=$("#total").val()//=data.records[0].amount;
                
                }
            });
            if (event.keyCode == 13){
                let o={Code:a,Investigation:b,price:c,qty:d,total:f}; 
                st.records.push(o) ;
                
                console.log(JSON.stringify(o));
                //alert(JSON.stringify(st.records));
                display1();
            }
    }

    function start(){
        let p1 = fetch(`${U}/getpurchasevrno.php`);
         console.log(`${U}/getpurchasevrno.php`);
            let p2 = p1.then(res =>res.json()).then(data => {
                $("#vrno").val("AC-"+data.maxvr);
            });

            $("#date").val(formatdate());

            function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
            }

            function formatdate(date = new Date()) {
            return [
                date.getFullYear(),
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
            ].join('-');
            }
            

    }
    start();
    // function display1(){
    //     let a="";   
    //     let i=0;
    //     for(d of st.records){  
    //                 a+=`<tr onclick="show?.('${d?.Code}','${d?.Investigation}','${d.price}','${d.qty}','${d.total}','${i}')"><td>${i+1}</td><td>${d.Code}</td><td>${d.Investigation}</td><td>${d.price}</td><td>${d.qty}</td><td>${d.total}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${i}',event)">Remove</button></td></tr>`;
    //                 i++;//i=i+1;
    //             }       
    //             $("#tb").innerHTML=a;
    //             Sum();
    // }
    async function display1(){

let a="";   

let i=0;

//for(d1 of st.records){  
    $.each(st.records, function(i, d1) {
    let j=0;
    let p3 = fetch(`${U}/getgroupbyitemcode.php?Code=${d1?.Code}`); 
    console.log(`${U}/getgroupbyitemcode.php?Code=${d1?.Code}`);
    let p4 = p3.then(res2 =>res2.json()).then(data2 => {

        //alert(d1)
        $.ajax({type: "GET",url:`${U}/getgroupbyitemcode.php?Code=${d1?.Code}`,data:{},success:function(data2){
data2=JSON.parse(data2)
dt=$("#date").val();

        
           // dt=$("#date").val();
            a+=`<tr onclick="show?.('${d1?.Code}','${d1?.Investigation}','${d1.price}','${d1.qty}','${d1.total}','${i}')"><td>${i+1}</td><td>${d1.Code}</td><td>${d1.Investigation}</td><td>${data2.records[0].groupname}</td><td>${data2.records[0].details}</td><td>${d1.price}</td><td>${d1.qty}</td><td>${d1.total}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${i}',event)">Remove</button></td></tr>`;

            i++;  //i=i+1;
            
            if(i==st.records.length){
                //$("#tb").innerHTML=a;
                $("#tb").html(a);

        Sum();
            }
        }
            });

    });   

//await new Promise(r=> setTimeout(r,1000));
        }); 

        

}

    function Sum(){
        let s=0;
        $.each(st.records, function(i, d) {
         

      //  for(d of st.records){  
                    s+=Number(d.total);
                                     
                });      
                $("#linetotal").val(s);
    }
    function display(){
            //st.records = localStorage.getItem('records');
           // let p1 = fetch("${U}/gettests.php"); 
            //let p2 = p1.then(res =>res.json()).then(data => {
                $.get(`${U}/gettests.php`,{},function(data){
data=JSON.parse(data)

                
                st.records=data.records;
                //alert(data.total)
                $("#tot").html(data.total);
                let a="";   
                let i=0;    
                for(d of st.records){  
                    a+=`<tr onclick="show?.('${d?.Code}','${d?.Investigation}','${d.Amount}','${i}')"><td>${d.Code}</td><td>${d.Investigation}</td><td>${d.Amount}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.Code}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                }       
                $("#tb").html(a);
                
        });        
    }
    //display();

    function show(a,b,c,d,f,i){
        $("#Code").val(a);
        $("#Investigation").val(b);
        $("#price").val(c);
        $("#qty").val(d);
        $("#total").val(f);
        index=i;
        
    }

    function work(){
        display();
        $("#Code").val("");
        $("#Investigation").val("");
        $("#Amount").val("");
        
    }

    function add(){
        a=$("#Code").val();
        b=$("#Investigation").val();
        c=$("#Amount").val();
       
        //let o={userid:a,name:b,class:c,address:d};  
        url=`${U}/inserttests.php?Code=${a}&Investigation=${b}&Amount=${c}`;      
        //localStorage.setItem('records', JSON.stringify(st.records));
       // let p1 = fetch(url); 
       // let p2 = p1.then(res =>res.json()).then(data => {
            //st.records.push(o);
            $.get(url,{},function(data){
                data=JSON.parse(data)
            $("#action").innerHTML=data.total+" records Inserted";
            work();
        });
            
    }
    
    function update(){
        
        st.records[index].Code=$("#Code").val();
        st.records[index].Investigation=$("#Investigation").val();
        st.records[index].price=$("#price").val();
        st.records[index].qty=$("#qty").val();
        st.records[index].total=$("#total").val();
        display1();
        
        
       
    }
    function remove(i,event){        
        st.records.splice(i,1);
        display1();
    }
    
</script>
</body>
</html>