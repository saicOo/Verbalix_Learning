$(document).on("click", ".replay-comment", function() {
    console.log($(this).data('replay'));
    $('#input-replay').val($(this).data('replay'));
    $("#comment").focus();
});
