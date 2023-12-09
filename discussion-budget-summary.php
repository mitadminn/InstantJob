<?php 
    $page = 'Summary';
    include('inc/header.php'); 
    $serviceid = $_GET['id'];
    $signle_service = $obj->GetServiceById($serviceid);
    $userid = $signle_service['user_id'];
    $postuser = $obj->GetUserById($userid);
     
    ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<style>
    form#cart p {font-size: 12px;float: right;  margin: 5px 0 0 10px;}
    form#cart div {margin: 10px 0 0 0;}
    .create-payment-plan{padding:15px;}
</style>
<div class="col-sm-12 instant-main" style="background:#e5e5e5;">
<div class="row">
<div class="middle_container" id="myTabContent">
     <div class="head-mid">
            <h2>Summary</h2>
        </div>
     <div class="mid-pro">
        <div class="profsnl-servc">
            <div class="big-img-pro">
                <b style="color: #ff0000;"> </b>
                <img class="pro-big-img" src="admin/assets/img/services/<?=$signle_service['photos'];?>" alt=""> 
            </div>
        </div>
    </div>
    <div class="bg-white p-3">
            <h3 class="p-2">Summary</h3>
    <div class="">
        <div class="">
            <div class="summary-table-left">
                <div class="d-flex" style="justify-content: space-between;">
                   
                        <div class="third-sec-profsnl">
                    <div class="hd-para">
                        <div>
                            <h6><?=$signle_service['topic'];?> </h6>
                        </div>
                        <div>
                            <p>  <?php echo substr($signle_service['description'], 0,150);?>...</p>
                        </div>
                    </div>
                </div>
                        <div >
                            <p class="">RM<?=$_GET['price'];?></p>
                        </div>
                   
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="d-flex">
                        <form id='cart'></form>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="d-flex">
                        <form id='cart'></form>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="d-flex">
                        <form id='cart'></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<hr style="margin:0;">-->
    <div class="summary-table-left align-center d-flex justify-content-between">
 
         <div class="summary-table-right">
 
                            <output id='total' form='cart'><?=$_GET['price'];?></output>
                        </div>
    </div>
     </div>
    <div class="last_title">
        <div class="last_title create-payment-plan">
           <a href="summary-payment?serviceid=<?=$signle_service['id'];?>&price=<?=$_GET['price'];?>" >
                    <button type="button" class="rounded btn-success btn-sucs btnm-frst w-100">Create Payment Plan</button>
                    </a>
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