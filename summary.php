<?php 
include('auth.php'); 
 $page = 'Summary';
    include('inc/header.php'); 
    // $serviceid = $_GET['id'];
     
    
       $replacedString = $_GET['type'];
        if($replacedString == 'service') { 
            $serviceid =  $_GET['id'];
            $post_data = $obj->GetServiceById($serviceid);
            $type = $post_data['post_type'];
            $post_id = $post_data['id'];
            
         }elseif($replacedString == 'job'){ 
              $jobid = $_GET['id'];
             $post_data = $obj->GetJobById($jobid);
             $type = $post_data['post_type'];
             $post_id = $post_data['id'];
         }else{}
         

    $userid = $post_data['user_id'];
    $postuser = $obj->GetUserById($userid);
    
        $proposaldata = $obj->UpdateProposalDataStatus($post_id,$type);

     
    ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main" >
<div class="row">
<div class="middle_container" id="myTabContent">
      <div class="head-mid">
              <h2></h2>
            </div>
    <div class="d-flex hidn-objct sticky msg-header">
        <div class="backbtn"> 
            <a href="professional-service?id=<?=$post_data['id'];?>">
                <svg class="dropbtn" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>arrow-left</title>
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                </svg>
            </a>
        </div>
        <div class="prof-heigh-wid">
            <div class="manage-as-lo"><?=$post_data['topic'];?></div>
        </div>
        <div class="rightsidemenu">
            <div>
                <svg class="dropbtn" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="mid-pro">
        <div class="profsnl-servc">
            <div class="big-img-pro">
                <b style="color: #ff0000;"></b>
                <img class="pro-big-img" src="admin/assets/img/services/<?=$post_data['photos'];?>" alt=""> 
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3 style="padding:10px 10px;">Summary</h3>
        </div>
    
         <div class="">
        <div class="">
            <div class="summary-table-left">
               <div class="d-flex" style="justify-content: space-between;">
                   
                        <div class="third-sec-profsnl">
                    <div class="hd-para">
                        <div>
                            <h6><?=$post_data['topic'];?> </h6>
                        </div>
                        <div>
                            <p>  <?php //echo substr($post_data['description'], 0,50);?></p>
                        </div>
                    </div>
                </div>
                        <div>
                            <p class="">RM<?=$_GET['price'];?></p>
                        </div>
                   
                </div>

            </div>
        </div>
    </div>
        <hr style="margin-top:10;">
        <div class="summary-table-left align-center " style="display: flex;justify-content: space-between; align-items:center;">
            <div>
                <p>Service Fee or(up to RM1,000 max)</p>
                <p>6% SST</p>
                <label class="total_cost">
                <b>Total:</b> 
                </label>
            </div>
            <div class="summary-table-right">
               <p>RM<?=$servicetax = $_GET['price']*10/100;?></p>
                <p>RM<?=$ssttax = $_GET['price']*6/100;?></p>
                <output id='total' form='cart'><?=$servicetax + $_GET['price']+ $ssttax;?></output>
            </div>
        </div>
        <div class="last_title">
             <div class="last_title" style="padding: 15px;">
               <a href="summary-payment?id=<?=$post_data['id'];?>&price=<?=$_GET['price'];?>&type=<?=$_GET['type'];?>&dis_id=<?=$_GET['dis_id'];?>" >
                        <button type="button" class="rounded btn-success btn-sucs btnm-frst w-100">Create Payment Plan</button>
                        </a>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?> 
<!----------------SUMMARY SCRIPT---------------------->
<script>
    var cart = document.forms.cart;
    var x = cart.elements;
    cart.addEventListener('click', updateBill, false);
    
    
     var basket = [{
       name: "",
      price: 100
    }, {
       name: "",
      price: 100
    }, {
       name: "",
      price: 100
    }];
    
    for (let j = 0; j < basket.length; j++) {
      var details = `
      <div id="item-${j}">
        <legend>${basket[j].name}</legend>
        <button class="btn_plus_minus" id="dec-${j}" type="button">-</button>
        <output id="qty-${j}">1</output>
        <button class="btn_plus_minus" id="inc-${j}" type="button">+</button>
        <output id="bas-${j}">${basket[j].price}</output>
       <p class="output_RM"> RM <output id="prc-${j}" class="prc">${basket[j].price}</output></p>
    </div>
    `;
      cart.insertAdjacentHTML('beforeend', details);
    }
    
    function updateBill(e) {
      if (e.target.type === 'button') {
        var ID = e.target.parentElement.id;
        var idx = ID.split('-').pop();
        var dir = e.target.id.split('-').shift();
        var qty = x.namedItem(`qty-${idx}`);
        var bas = x.namedItem(`bas-${idx}`);
        var prc = x.namedItem(`prc-${idx}`);
        var sum = x.total;
        var quantity = parseInt(qty.value, 10);
        var base = parseFloat(bas.value).toFixed(2);
        var price = parseFloat(prc.value).toFixed(2);
        var total = parseFloat(sum.value).toFixed(2);
        if (dir === "inc") {
          quantity++;
          qty.value = quantity;
          prc.value = quantity * base;
        } else {
          quantity--;
          if (quantity <= 0) {
            quantity = 0;
          }
          qty.value = quantity;
          prc.value = quantity * base;
        }
      }
      var prices = Array.from(document.querySelectorAll('.prc'));
    
      var numbers = prices.map(function(dig, idx) {
        return parseFloat(dig.value);
      });
      var grandTotal = numbers.reduce(function(acc, cur) {
        return acc + cur;
      }, 0);
    
      x.total.value = grandTotal.toFixed(2);
    }
</script>
<!----------------SUMMARY SCRIPT---------------------->