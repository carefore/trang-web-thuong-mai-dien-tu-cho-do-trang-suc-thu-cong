$(document).ready(function(){
  $('#jewelryForm').submit(function(e){
    e.preventDefault();
    
    // Lấy thông tin từ Form
    let formData = new FormData(this);

    // Gửi thông tin đến PHP sử dụng AJAX
    $.ajax({
      url: 'save_product.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response){
        alert('Sản phẩm đã được lưu vào cơ sở dữ liệu!');
        // Có thể thực hiện các hành động khác sau khi lưu thông tin
      },
      error: function(){
        alert('Có lỗi xảy ra, vui lòng thử lại sau.');
      }
    });
  });
});
