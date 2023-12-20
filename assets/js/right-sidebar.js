      /* Service Provider */
        $(document).on('click','#showData',function(e){
            
        var filter1 = $(this).val();
        
        var filter2val = $('#filter2.active').val();
        var pageid = $('#pageid').val();
        if(filter1 == 'Worldwide') {
            $('.lbl-1').removeClass('active'); 
            $('.lbl-2').removeClass('active'); 
            $('.lbl-3').removeClass('active');
            $('.lbl-4').addClass('active');
            $(this).addClass('active');
            
          }
          
          
          if(filter1 == 'Local') {
            $('.lbl-1').addClass('active'); 
            $('.lbl-2').removeClass('active'); 
            $('.lbl-3').removeClass('active');
             $('.lbl-4').removeClass('active');
            $('.btnn1').removeClass('active');
            $(this).addClass('active');
            
          }
          
          if(filter1 == 'Overseas') {
            $('.lbl-2').addClass('active'); 
            $('.lbl-1').removeClass('active'); 
            $('.lbl-3').removeClass('active'); 
             $('.lbl-4').removeClass('active');
             $('.btnn2').removeClass('active');
            $(this).addClass('active');
          }
          
          if(filter1 == 'Near me') {
            $('.lbl-4').removeClass('active');
            $('.lbl-3').addClass('active');
            $('.lbl-2').removeClass('active'); 
            $('.lbl-1').removeClass('active'); 
            
            $('.btnn3').removeClass('active');
            $(this).addClass('active');
          }
          
      $.ajax({    
        type: "GET",
        url: 'admin/inc/process.php?filter1='+filter1+'&filter2='+filter2val+'&pageid='+pageid,         
        dataType: "html",                  
        success: function(data){                    
            $("#searchdata").html(data); 
            $("#servicedata").hide(); 
             $("#jobdata").hide(); 
         }
    });
      
});

   
 /* Service Provider */

   $(document).on('click','#filter2',function(e){
        var filter2val = $(this).val();
        var filter1 = $('#showData.active').val();
        var pageid = $('#pageid').val();


             if(filter2val == 'new') {
            $('.sort1').addClass('active'); 
            $('.sort2').removeClass('active'); 
            $('.sort3').removeClass('active'); 
             $('.sort4').removeClass('active');
             
            $(this).addClass('active');
          }
          
          if(filter2val == 'high') {
            $('.sort2').addClass('active'); 
            $('.sort1').removeClass('active'); 
            $('.sort3').removeClass('active');
             $('.sort4').removeClass('active');
             $('.btnn5').removeClass('active');
            $(this).addClass('active');
          }
          
          if(filter2val == 'low') {
            $('.sort3').addClass('active');
            $('.sort2').removeClass('active'); 
            $('.sort1').removeClass('active'); 
            $('.sort4').removeClass('active'); 
            $('.btnn6').removeClass('active');
            $(this).addClass('active');
          }
          
           if(filter2val == 'expiring') {
            $('.sort4').addClass('active');
            $('.sort2').removeClass('active'); 
            $('.sort1').removeClass('active'); 
            $('.sort3').removeClass('active'); 
            $('.btnn7').removeClass('active');
            $(this).addClass('active');
          }
           

        // var filter1 = $('#showData').val();
        // alert(filter2val);
        // alert(filter1);
      $.ajax({    
        type: "GET",
       url: 'admin/inc/process.php?filter1='+filter1+'&filter2='+filter2val+'&pageid='+pageid,
        // data: 'filter1='+filter1+'&filter2='+filter2val,            
        dataType: "html",                  
        success: function(data){                    
            $("#searchdata").html(data); 
            $("#servicedata").hide();
             $("#jobdata").hide(); 
         }
    });
      
 });

 /* Job Marketplace */
  $(document).on('click','#JObfilter2',function(e){
        var filter2val = $(this).val();
    
    $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?filter3="+filter2val,             
        dataType: "html",                  
        success: function(data){                    
            $("#searchjobdata").html(data); 
            $("#jobdata").hide(); 
         }
    });
    
    
});
 
 



//  /* Keyword Search for Service Provider */
// function showResult(str) {
//   if (str.length==0) {
//     document.getElementById("livesearch").innerHTML="";
//     document.getElementById("livesearch").style.border="0px";
//      return;
//   }
//   var xmlhttp=new XMLHttpRequest();
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("livesearch").innerHTML=this.responseText; 
//       document.getElementById("livesearch").style.border="1px solid red;";
//      $("#servicedata").hide(); 
//     }else {
//           $("#servicedata").show();
//     }
//   }
//   xmlhttp.open("GET","admin/inc/process.php?searchservice="+str,true);
//   xmlhttp.send();
// }


// /*  Keyword Search for service provider */

// function showJobResult(str) {
//   if (str.length==0) {
//      document.getElementById("livejobsearch").innerHTML=""; 
//     return;
//   }
//   var xmlhttp=new XMLHttpRequest();
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("livejobsearch").innerHTML=this.responseText;
//       document.getElementById("livesearch").style.border="1px solid red";
//       $("#jobdata").hide(); 
//     } else {
        
//          $("#jobdata").show();
//     }
//   }
//   xmlhttp.open("GET","admin/inc/process.php?searchjob="+str,true);
//   xmlhttp.send();
// }

 
// // <!------------active------------>
 
 
//     $(document).on('click','li-rt a' , function(){
//         $(this).addClass('active').siblings().removeClass('active')
//     })
 
// //   <!------------active------------>

// // Add active class to the current button (highlight it)
// var header = document.getElementById("log");
// var btns = header.getElementsByClassName("btnn");
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("active");
//   current[0].className = current[0].className.replace(" active", "");
//   this.className += " active";
//   });
// }
 