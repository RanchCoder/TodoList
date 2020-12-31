$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "load_previousData.php",
  }).done((data) => {
    $(".result").append(data);
  });

  $("form").submit(function (e) {
    var formData = {
      nameOfTodo: $("input[name=addItem]").val(),
    };
    $.ajax({
      type: "POST",
      url: "addData.php",
      data: formData,
      datatype: "json",
      encoded: true,
    }).done((data) => {
      console.log(data);
      alert(data);
      $("input[name=addItem]").val("");
      location.reload();
    });
    e.preventDefault();
  });

  $(document).on("click", ".checker", function () {
    //do stuff
    if ($(this).prop("checked") == true) {
      var formdata = {
        id: $(this).data("id"),
      };
      $.ajax({
        type: "POST",
        url: "changeStatus.php",
        data: formdata,
        datatype: "json",
        encoded: true,
      }).done((data) => {
        alert(data);
        location.reload();
      });
    }
  });

  $(document).on("click", ".delete-box", function () {
    alert($(this).data("id"));
    var formdata = {
      id:$(this).data("id"),
    };
    $.ajax({
      type: "POST",
      url: "deleteItem.php",
      data: formdata,
      datatype: "json",
      encoded: true,
    }).done((data) => {
      alert(data);
      location.reload();
    });
  });
});
