const openEditModal = (userid, username, useremail) => {
  $("#mymodal").modal("show");

  console.log(userid, username, useremail);

  document.getElementById("userid").value = userid;
  document.getElementById("username").value = username;
  document.getElementById("useremail").value = useremail;
};

$("#updateform").click(function () {
  var userid = $("#myid").data("id");

  $.ajax({});
});
