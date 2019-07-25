$(document).ready(function () {
    // Show filter stuffs
    // $.fn.display = function () {
    //     console.log("Filter button is work!");
    //   }
      $('#filter_btn').click(function () {
            // $('#filter_btn').display();
            $('.filter').css("display","block");
        });
    // Show nav-bar
    // $.fn.display_grid = function(){
    //     console.log("Display none grid!");
    // }
    $("#grid").click(function () {
        // $("#grid").display_grid();
        $(".nav-bar").css("margin-left","0px");
        $(".nav-bar").css("transition","all 0.5s");
      });
    // Close nav-bar
    // $.fn.display_close = function(){
    //     console.log("Display close icon!");
    // }
    $("#close").click(function () {
        // $("#close").display_close();
        $(".nav-bar").css("margin-left","-250px");
        $(".nav-bar").css("transition","all 0.5s");
      });
    $("#setting").click(function(){
        $("#setting_items").css("display","block");
        $("#setting_items").css("transition","all 0.5s");
    });
    // Hide reigster btn
    $("#register_btn").click(function(){
      $("#register_btn").css("display","none");
    });
});