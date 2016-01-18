$(document).ready(function(){
  $("#user_form").validate({
    rules: {
      name: {required: true},
      address: {required: true},
      tel: {required: true},
      sex: {required: true},
      nickname: {required: true},
      work: {required: true},
      hobby: {required: true}
    }
  });
});
