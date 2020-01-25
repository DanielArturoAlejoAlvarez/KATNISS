$(function() {
    deleteOBJ("category");
    viewOBJ("category","maintenance/categories");
       
    deleteOBJ("product");
    viewOBJ("product","maintenance/products");

    //deleteOBJ("sale");
    //viewOBJ("sale","sales");
    viewOBJDetailSale(); //data id
    deleteOBJ("user");
    viewOBJUser();
    
    deleteOBJ("client");
    viewOBJClient();
    viewOBJProduct();

    changeOBJVoucher();
    btnCheckClientOnSale();
    productOBJAutocomplete();
    addDetailProductToTableSale();
    
    removeDetailProductToTableSale();
    addQuantitysFromProductToTableSale();
    //sumTotalFromProductsBySubtotalsIGVAndTotal();
    tableSaleAndDetailsFromPrinterApply();
    buttonsDataTablesFromTableReportsToSale();
  });

var base_url = "http://127.0.0.1/CISALE/";

function deleteOBJ(obj) {    
    $(`.btn-remove-${obj}`).on("click",function(e) {
      e.preventDefault();
      //get the route of category a delete
      var route = $(this).attr("href");
      $.ajax({
        url: route,
        type: 'POST',
        success: function(resp) {
          //alert(resp);
          window.location.href = base_url + resp;
        }
      });
    });
}

function viewOBJ(obj,folder) {    
    $(`.btn-view-${obj}`).on("click",function() {
        //get the value of every category id
        var id = $(this).val();        
        $.ajax({
          url: base_url + folder + "/show/" + id,
          type: 'POST',
          success: function(resp) {
            //alert(resp);
            $("#modal-default .modal-body").html(resp);
          }
        });
    });
}

function viewOBJClient() {
  $('.view-client').on("click", function() {
    var client = $(this).val();
    //console.log(client);
    var infoclient = client.split("*");
    //console.log(infoclient);
    var html = "";
    html += "<h3><strong>CLIENT TYPE: </strong>"+infoclient[1]+"</h3>";
    html += "<h3><strong>DOC. TYPE: </strong>"+infoclient[2]+"</h3>";
    html += "<h3><strong>DOC. NUMBER: </strong>"+infoclient[3]+"</h3>";
    html += "<h3><strong>FULLNAME: </strong>"+infoclient[4]+"</h3>";
    html += "<h3><strong>PHONE: </strong>"+infoclient[5]+"</h3>";
    html += "<h3><strong>ADDRESS: </strong>"+infoclient[6]+"</h3>";
    $("#modal-default .modal-body").html(html);

  });
}


function viewOBJProduct() {
  $(".view-product").on("click", function() {
    var product = $(this).val();
    var infoproduct = product.split("*");
    var html = "";
    html += "<div class='row'><div class='col-md-6'>";
    html += "<h3><strong>CATEGORY: </strong>"+infoproduct[1]+"</h3>";
    html += "<h3><strong>SERIAL: </strong>"+infoproduct[2]+"</h3>";
    html += "<h3><strong>NAME: </strong>"+infoproduct[3]+"</h3>";
    html += "<h3><strong>PRICE: </strong>"+infoproduct[4]+"</h3>";
    html += "<h3><strong>STOCK: </strong>"+infoproduct[5]+"</h3>";
    html += "</div>";
    html += "<div class='col-md-6'>";
    html += "<h3><strong>IMAGE: </strong><img class='img-responsive' src='"+infoproduct[6]+"'></h3>";
    html += "</div></div>";
    $("#modal-default .modal-body").html(html);
  });
}


/////////////////////////////CHANGE DATA///////////////////////////////////
function changeOBJVoucher() {
  $("#vouchers").on("change", function() {
    var option = $(this).val();
    if (option != "") {
      var infovoucher = option.split("*");
      $("#idvoucher").val(infovoucher[0]);
      $("#igv").val(infovoucher[2]);
      $("#serial").val(infovoucher[3]);
      $("#number").val(generateNumber(infovoucher[1]));      
    }else {
      $("#idvoucher").val(null);
      $("#igv").val(null);
      $("#serial").val(null);
      $("#number").val(null);
    }  
    sumTotalFromProductsBySubtotalsIGVAndTotal();  
  });
}

function generateNumber(num) {
  if(num >= 99999 && num < 999999) {
    return Number(num) + 1;
  }
  if(num >= 9999 && num < 99999) {
    return "0" + (Number(num) + 1);
  }
  if(num >= 999 && num < 9999) {
    return "00" + (Number(num) + 1);
  }
  if(num >= 99 && num < 999) {
    return "000" + (Number(num) + 1);
  }
  if(num >= 9 && num < 99) {
    return "0000" + (Number(num) + 1);
  }
  if(num < 9) {
    return "00000" + (Number(num) + 1);
  }
}

function btnCheckClientOnSale() {
  $('.btn-check').on("click", function() {
    var client = $(this).val();
    $infoclientsale = client.split("*");
    $("#idclient").val($infoclientsale[0]);
    $("#client").val($infoclientsale[1]);
    $("#exampleModal2").modal("hide");
  });
}

function productOBJAutocomplete() {
  $("#product").autocomplete({
    source: function(request,response) {
      $.ajax({
        url: base_url + "movements/sales/getProducts" ,
        type: 'POST',
        dataType: 'json',
        data: {value: request.term},
        success: function(data) {
          response(data)
        }
      });
    },
    minLength: 2,
    select: function(event,ui) {
      var data  = ui.item.id + "*" + ui.item.code + "*" + ui.item.label + "*" + ui.item.price + "*" + ui.item.stock;
      $("#btnAddSale").val(data);
    },
  });
}

function addDetailProductToTableSale() {
  $("#btnAddSale").on("click", function() {
    var data = $(this).val();

    if (data != '') {
      var infoproductsale = data.split("*");
      var html = '';
      html += "<tr>";
      html += "<td><input type='hidden' name='idproducts[]' value='"+infoproductsale[0]+"'>"+infoproductsale[1]+"</td>";
      html += "<td>"+infoproductsale[2]+"</td>";
      html += "<td><input type='hidden' name='prices[]' value='"+infoproductsale[3]+"'><strong>"+infoproductsale[3]+"</strong></td>";
      html += "<td>"+infoproductsale[4]+"</td>";
      html += "<td><input class='qtys' type='text' name='qtys[]' value='1'></td>";
      html += "<td><input type='hidden' name='amounts[]' value='"+infoproductsale[3]+"'><p style='font-weight: bold'>"+infoproductsale[3]+"</p></td>";
      html += "<td><button type='button' class='btn btn-sm btn-danger remove-item'><i class='fa fa-times' aria-hidden='true'></i></button></td>";
      html += "</tr>";

      $("#table-sale tbody").append(html);
      
      sumTotalFromProductsBySubtotalsIGVAndTotal();
      $("#btnAddSale").val(null);
      $("#product").val(null);

    }else {
      alert("Please add one product!")
    }
  });
}

function removeDetailProductToTableSale() {
  $(document).on("click", ".remove-item", function() {
    $(this).closest("tr").remove();
    sumTotalFromProductsBySubtotalsIGVAndTotal();
  });
}

function addQuantitysFromProductToTableSale() {
  $(document).on("keyup", "#table-sale input.qtys", function() {
    var qty = $(this).val();
    console.log(qty)
    var price = $(this).closest("tr").find("td:eq(2)").text();
    
    console.log(price)
    var amount = qty*price;
    console.log(amount)
    $(this).closest("tr").find("td:eq(5)").children("p").text(amount);
    $(this).closest("tr").find("td:eq(5)").children("input").val(amount);
    sumTotalFromProductsBySubtotalsIGVAndTotal();
  });
}

function sumTotalFromProductsBySubtotalsIGVAndTotal() {
  subtotal = 0;
  
  $("#table-sale tbody tr").each(function() {
    subtotal = subtotal + Number($(this).find("td:eq(5)").text());
  });

  $("input[name=subtotal]").val(subtotal);

  tax = $("#igv").val();

  igv = subtotal*(tax/100);
 
  $("input[name=nigv]").val(igv);

  discount = $("input[name=discount]").val();

  total = subtotal + igv - discount;
  $("input[name=total]").val(total);
}

function viewOBJDetailSale() {    
  $(document).on("click",".view-details",function() {
      //get the value of every category id
      var value_id = $(this).val();        
      $.ajax({
        url: base_url + "movements/sales/show",
        type: 'POST',
        dataType: "html",
        data: {id: value_id},
        success: function(data) {
          //alert(resp);
          $("#modal-default .modal-body").html(data);
        }
      });
  });
}

function viewOBJUser() {
  $(document).on('click','.view-user',function() {
    var value_id = $(this).val();
    $.ajax({
      url: base_url + "administration/users/show",
      type: 'POST',
      dataType: 'html',
      data: {iduser: value_id},
      success: function(data) {
        $("#modal-default .modal-body").html(data);
      }
    });
  });
}

function tableSaleAndDetailsFromPrinterApply() {
  $(document).on("click", ".view-printer", function() {
    $("#modal-default .modal-body").print({
      globalStyles: true,
      title: "VOUCHER OF SALE"
    });
  });
}


function buttonsDataTablesFromTableReportsToSale() {
  $('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        //'copy', 'csv', 'excel', 'pdf', 'print'
        {
          extend: "excelHtml5",
          title: "Sale List",
          exportOptions: {
            columns: [0,1,2,3,4,5,6,7,8]
          }
        },
        {
          extend: "pdfHtml5",
          title: "Sale List",
          exportOptions: {
            columns: [0,1,2,3,4,5,6,7,8]
          }
        }
    ]
  });
}


