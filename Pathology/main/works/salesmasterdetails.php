<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Master Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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

        <h1 class="text-center" style="color:blue"> 💊 💉 👨‍⚕️ Pathology Sales   🏥 </h1> <hr/> <hr/>
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
                        <option val("">Select</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="CustomerName">Customer Name</label>
                    <input type="text" name="CustomerName" id="CustomerName" class="form-control"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Date">Date</label>
                    <input type="date" id="Date" name="Date" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="vrno">vrno</label>
                    <input type="text" name="vrno" id="vrno" class="form-control"/>
                </div>
            </div>

        </div>
        
        
        <div class="row">
            <div class="col-sm-3">
            <div class="form-group">
        <label for="doctorid"> 👨‍⚕️ 👩‍⚕️ Doctors 🧑‍⚕️  🩺 </label>
        <select id="doctorid">
<option val("">Select</OPTION>
<?php
include("library.php");
$a=new library();	
$m=$a->db;
$q="select * from doctors order by doctorid";
$r=$m->query($q);
while($c=$r->fetch_array(MYSQLI_NUM))
{
    echo "<option value='$c[0]'>$c[1]</option>";
}
?>
</select>
    </div>

    <div class="form-group">
        <label for="Code">Code</label>
        <input type="text" id="Code" class="form-control" onkeyup="GetTestDetails(event)"/>
    </div>

    <div class="form-group">
        <label for="Investigation">Investigation</label>
        <input type="text" id="Investigation" name="Investigation" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" id="price" name="price" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="qty">Quantity</label>
        <input type="text" id="qty" name="qty" class="form-control" onkeyup="GetTotal()"/>
    </div>
    
    <div class="form-group">
        <label for="total">Total</label>
        <input type="text" id="total"  name="total" class="form-control"/>
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
    
        
    let index=0;
    let st={records:[]};
    var U=$("#url").val();

    function goToReport(report,slno,dt,test,cn,Investigation){
        vrno=$("#vrno").val();
        cn=$("#CustomerName").val();
        doctor=$("#doctorid  option:selected").text();
       alert(doctor)
        
        report=report.trim();
       
        if(report=="BLOOD SUGAR TEST"){
            window.open(`reports/glucosetestresult.php?vrno=${vrno}`)
        }
        else if(report=="BioChemical"){
            window.open(`reports/bio-chemical-test.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}&CustomerName=${cn}&Investigation=${test}&doctor=${doctor}`)
        }
        else if(report=="E.C.G"){
            window.open(`reports/E.C.G.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}&CustomerName=${cn}&Investigation=${test}&doctor=${doctor}`)
        }
        else if(report=="Pregnancy"){
            window.open(`reports/PregnancyTest2.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}&CustomerName=${cn}&Investigation=${test}&doctor=${doctor}`)
        }
        else if(report=="Serological"){
            window.open(`reports/SerologicalReport2.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}&CustomerName=${cn}&Investigation=${test}&doctor=${doctor}`)
        }
        else if(report=="blood_group"){
            window.open(`reports/blood_group.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}&CustomerName=${cn}&Investigation=${test}&doctor=${doctor}`)
        }
        else if(report=="LIPID_PROFILE"){
            window.open(`reports/LIPID_PROFILE.php?vrno=${vrno}&slno=${slno}&date=${dt}&test=${test}&CustomerName=${cn}&Investigation=${test}&doctor=${doctor}`)
        }
        
    }

    function print(){
        var a=$('#vrno').val();
        window.location=`reports/salesreport.php?vrno=${a}`;
    }
    function Delete(){
        var a=$('#chkprofile').val();
        url=`${U}/deletesalestotal.php?vrno=${a}`;      
        
            $.get(url,{},function(data){
                data=JSON.parse(data)
           
            url=`${U}/deletesaleslineitems.php?vrno=${a}`;      
           
                $.get(url,{},function(data){
                    data=JSON.parse(data)
              
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
        b = a.val();
        url=`${U}/getsalestotalbyvrno.php?vrno=${b}`;      
            
                $.get(url,{},function(data){
                    data=JSON.parse(data)
                if (data.records.length>0){
                    $("#vrno").val(data.records[0].vrno);
                    $("#Date").val(formatDate2(new Date(data.records[0].Date)));
                    $("#CustomerName").val(data.records[0].CustomerName);
                    $("#doctorid").val(data.records[0].Doctorid);
                    $("#linetotal").val(data.records[0].Total);
                    $("#linediscount").val(data.records[0].Dicount);                    
                    $("#linenet").val(data.records[0].Net);
                    $("#linepaid").val(data.records[0].Paid);
                    $("#linedue").val(data.records[0].Due);
                    }
                    st.records=[];
                    url=`${U}/getsaleslineitemsbyvrno.php?vrno=${b}`;      
                    
                        $.get(url,{},function(data){
                           
                            data=JSON.parse(data)
                        
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
       
        if(a){
            url=`${U}/getvrnos.php`;      
            
                $.get(url,{},function(data){
                    data=JSON.parse(data)
               
                    $.each(data.records, function(i, d) {
                     
                    $('#chkprofile').append(`<option value="${d.vrno}">${d.vrno}</option>`);
                });
            }); 
        }else{
            location.reload();
        }
    }
    save=function(){
        var a=$('#chkprofile').val();
        url=`${U}/deletesalestotal.php?vrno=${a}`;   
          
        
            $.get(url,{},function(data){
                data=JSON.parse(data)
            url=`${U}/deletesaleslineitems.php?vrno=${a}`;      
         
                $.get(url,{},function(data){
                    data=JSON.parse(data)
                Insert();
            });     
        });
            
        
    }

    function Insert(){
        vrno=$("#vrno").val();
            dt=$("#Date").val();
            cn=$("#CustomerName").val();
            did=$("#doctorid").val();
            //alert(did)
            total=$("#linetotal").val();
            discount=$("#linediscount").val();
            net=$("#linenet").val();
            paid=$("#linepaid").val();
            due=$("#linedue").val();
            let i=1;
            
     
            $.each(st.records, function(i, d) {    
            url=`${U}/insertsaleslineitems.php?vrno=${vrno}&slno=${i++}&itemcode=${d.Code}&itemname=${d.Investigation}&qty=${d.qty}&price=${d.price}&total=${d.total}`;      
            
               
            $.get(url,{},function(data){data=JSON.parse(data)});
        });
        
        url=`${U}/insertsalestotal.php?vrno=${vrno}&CustomerName=${cn}&Doctorid=${did}&Date=${dt}&Total=${total}&Discount=${discount}&Net=${net}&Paid=${paid}&Due=${due}`;      
        console.log(url) ;
            
                $.get(url,{},function(data){
                    data=JSON.parse(data)
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
        $("#linenet").val(a-b);
        var c=$("#linepaid").val();
        $("#linedue").val(a-b-c);
    }
    GetTestDetails=function(){
        var a=$("#Code").val();
        $("#Investigation").val("");
        $("#price").val("");
        $("#total").val("");
        url=`${U}/gettestbycode.php?Code=${a}`;
        console.log(url)
       
            $.get(url,{},function(data){
                data=JSON.parse(data)
            console.log(JSON.stringify(data.records));
                
                if(data.records.length>0){
                $("#Investigation").val(data.records[0].investigation);
                $("#price").val(data.records[0].amount);
                $("#total").val(data.records[0].amount);
                $("#qty").val(1);
                b=$("#Investigation").val()//=data.records[0].investigation;
                c=$("#price").val()//=data.records[0].amount;
                d=$("#qty").val();
                f=$("#total").val()//=data.records[0].amount;
                
                }
            });
            if (event.keyCode == 13){
                let o={Code:a,Investigation:b,price:c,qty:d,total:f}; 
                st.records.push(o) ;
                
                console.log(JSON.stringify(o));
                
                display1();
            }
    }

    function start(){
        
            $.get(`${U}/getvrno.php`,{},function(data){
                data=JSON.parse(data)
            $("#vrno").val("AC-"+data.maxvr);
            });

            $("#Date").val(formatDate());

            function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
            }

            function formatDate(date = new Date()) {
            return [
                date.getFullYear(),
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
            ].join('-');
            }
            

    }
    start();

  function display1(){

let a="";   

let i=0;

 
    $.each(st.records, function(i, d1) {
       
    let j=0;
   

      
        $.ajax({type: "GET",url:`${U}/getgroupbyitemcode.php?Code=${d1?.Code}`,data:{},success:function(data2){
            data2=JSON.parse(data2)
            dt=$("#Date").val();
            a+=`<tr onclick="show?.('${d1?.Code}','${d1?.Investigation}','${d1.price}','${d1.qty}','${d1.total}','${i}')"><td>${i+1}</td><td>${d1.Code}</td><td>${d1.Investigation}</td><td>${data2.records[0].groupname}</td><td>${data2.records[0].details}</td><td>${d1.price}</td><td>${d1.qty}</td><td>${d1.total}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${i}',event)">Remove</button><button type='button' onclick="goToReport('${data2.records[0].details.trim()}','${i+1}','${dt}','${d1?.Investigation}')" class='btn btn-info'>Show</button></td></tr>`;

            i++;  
             
            if(i==st.records.length){
                $("#tb").html(a);

        Sum();
            }
        }
    }); 
   
   
   
         });   

        

}

    function Sum(){
        let s=0;   
        $.each(st.records, function(i, d) { 
                    s+=Number(d.total);
                                     
                });       
                $("#linetotal").val(s);
    }
    function display(){
            
                $.get(`${U}/gettests.php`,{},function(data){ 
                    data=JSON.parse(data) 
                st.records=data.records;
              
                $("#tot").html(data.total);
                let a="";   
                let i=0;    
                
                    $.each(st.records, function(i, d) { 
                    a+=`<tr onclick="show?.('${d?.Code}','${d?.Investigation}','${d.Amount}','${i}')"><td>${d.Code}</td><td>${d.Investigation}</td><td>${d.Amount}</td><td><button type="button"  class="btn btn-danger" onclick="remove('${d.Code}',event)">Remove</button></td></tr>`;
                    i++;//i=i+1;
                });       
                $("#tb").html(a);
                
        });        
    }
    

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
       
         
        url=`${U}/inserttests.php?Code=${a}&Investigation=${b}&Amount=${c}`;      
        
            $.get(url,{},function(data){
                data=JSON.parse(data)
            $("#action").html(data.total+" records Inserted");
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
    

//});
</script>
</body>
</html>