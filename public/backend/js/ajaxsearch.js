function remove_li(count_li){
  $(".li_att_list_"+count_li).remove();
}
window.onload = function () {
  $('#color_picker').change(function(){
      $('#name_color_picker').val(this.value); 
      $('#attribute_color').val(this.value); 
  });
  var count_li = 0;
  $('#get_list_arrtibute').click(function(){
    var list_attribute = '';
    $('.li_att_list').each(function(){
      // var att_name = $(this).find('span');
      // att_name.each(function(){// id of ul
        list_attribute += $(this).find('span').text();
        list_attribute += ',';
      // })
    });
    // console.log(list_attribute);
    $('.div_list_attr').append('<input type="hidden" name="list_attribute" value="'+list_attribute+'">'); 
    // return false;
  });
  $('#add_attribute').click(function(){
    var att_name = $("#att_pro").val();
    count_li += 1;
    var html ='';
    html += '<li class="li_att_list li_att_list_'+count_li+'"><span>'+att_name;
    html += '</span><a href="#" style="    margin-left: 5px;color: red;font-weight: bold;" ';
    html += 'onclick="remove_li('+count_li+')">x</a></li>';
    $('.list_attribute').append(html); 
    window.parent.$(".div_list_attr").css("display", "block");
    $("#att_pro").val('');
  });
  $('#search_product').keyup(function(){
    var key_word = $(this).val();
    if(key_word != '') {
      var _token = $('input[name="_token"]').val(); 
      $.ajax({
        url: url_web+'/admin-searchproduct',
        method:"POST",
        data:{key_word:key_word, _token:_token},
        success:function(data){ 
          $('.result_search').fadeIn();  
          $('.result_search').html(data); 
        }
      });
    }
  });
  $(document).on('click', 'li', function(){  
    $('.result_search').val($(this).text());  
    $('.result_search').fadeOut();  
  });
  $('#search_product_cart').keyup(function(){
  var key_word = $(this).val();
  if(key_word != '') {
    var _token = $('input[name="_token"]').val(); 
    $.ajax({
      url: url_web+'/admin-cartsearchproduct',
      method:"POST",
      data:{key_word:key_word, _token:_token},
      success:function(data){ 
        $('.result_search_cart').fadeIn();  
        $('.result_search_cart').html(data); 
      }
    });
   }
  });
  $(document).on('click', 'li', function(){  
    $('.result_search_cart').val($(this).text());  
    $('.result_search_cart').fadeOut();  
  });
  $('#btn_addtocart').click(function(){
    var id_product = jQuery('.select_product_cart').val();
    if(id_product != '') {
      var _token = $('input[name="_token"]').val();
      if ($("tr").hasClass("check_exist_"+id_product)) {
        var old_qty = $("th.qty_pro_cart_"+id_product).text();
        var new_qty = parseInt(old_qty) + 1;
        $("th.qty_pro_cart_"+id_product).html(new_qty);
            var total_price_cart = total_price();
            $('.total_price_cart').html('<strong>'+total_price_cart+'</strong>');
            list_product();
      } else {
        $.ajax({
          url: url_web+'/admin-cartaddproduct',
          method:"POST",
          data:{id_product:id_product, _token:_token},
          success:function(data){ 
            window.parent.$(".div_tbl_cart").css("display", "block");
            window.parent.$("#btn_input_profile").css("display", "block");
            $('.cart_table').append(data);
            var total_price_cart = total_price();
            $('.total_price_cart').html('<strong>'+total_price_cart+'</strong>');
            list_product();
          }
        });
      }
    }
  });
  $('#btn_input_profile').click(function(){
    window.parent.$("#btn_makeorder").css("display", "block");
    window.parent.$(".cart_profile").toggle();
  });
  function list_product(){
      var list_id_pro = '';
      var list_qty_pro = '';
      var html = '';
      // alert('asdsdad');
    $("tr.check_exist_pro").each(function(){
      var id_product = (parseInt)($(this).find(".id_pro").text());
      // console.log(price_pro);
      var qty_pro = (parseInt)($(this).find(".qty_pro").text());
      list_id_pro += id_product+',';
      list_qty_pro += qty_pro+',';
    });
    var total_price_cart = total_price();
    html += '<input type="hidden" value="'+list_id_pro+'" name="list_id_pro">';
    html += '<input type="hidden" value="'+list_qty_pro+'" name="list_qty_pro">';
    html += '<input type="hidden" value="'+total_price_cart+'" name="total_price_cart">';
    // console.log(html);
    $('.infor_before_submit').html(html);
  }

  $('#search_customer').keyup(function(){
    var key_word = $(this).val();
    if(key_word != '') {
      var _token = $('input[name="_token"]').val(); 
      $.ajax({
        url: url_web+'/admin-cartcustomer',
        method:"POST",
        data:{key_word:key_word, _token:_token},
        success:function(data){ 
          $('.result_search_customer').html(data);
          window.parent.$(".result_search_customer").css("display", "block");
          window.parent.$(".div_search_cus").css("display", "block");
        }
      });
    }
  });
}
function delete_product(id_product){
  $("tr").remove(".check_exist_"+id_product);
  var total_price_cart = total_price();
  $('.total_price_cart').html(total_price_cart);
}
function total_price(){
  var total_price = 0;
  $("tr.check_exist_pro").each(function(){
    var price_pro = (parseFloat)($(this).find(".price_pro > p").text());
    // console.log(price_pro);
    qty_pro = (parseFloat)($(this).find(".qty_pro").text());
    total_price_pro = price_pro * qty_pro;
    total_price += total_price_pro;
  });
  return total_price.toFixed(2);
}
function add_cart(id_product)
{
  document.getElementById("btn_addtocart").style.display = "block";
  // console.log(idproduct);
  if (id_product == '0') {
    document.getElementById("btn_addtocart").style.display = "none";
  }
}
function select_cus(id_customer)
{
  var _token = $('input[name="_token"]').val(); 
  $.ajax({
    url: url_web+'/admin-cart_selectcustomer',
    method:"POST",
    data:{id_customer:id_customer, _token:_token},
    success:function(data){ 
      window.parent.$(".result_search_customer").css("display", "none");
      data = JSON.parse(data);
      $('input[name="id_customer"]').val(data[0]['id']); 
      $('input[name="cart_name"]').val(data[0]['name']); 
      $('input[name="cart_email"]').val(data[0]['email']); 
      $('input[name="cart_phone"]').val(data[0]['phone']); 
      $('input[name="cart_address"]').val(data[0]['address']); 
    }
  });
}