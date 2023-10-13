$(document).ready(function(){
    //Check Admin password is correct or not
    $("#current_pwd").keyup(function () { 
        var current_pwd = $("#current_pwd").val();
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/check-current-password",
            data: {current_pwd:current_pwd},
            success:function (resp) {
                if(resp == "false"){
                    $("#verifyCurrentPwd").html("Current Password is Incorrect");
                }
                else if(resp == "true"){
                    $("#verifyCurrentPwd").html("Current Password is correct");
                }
            },
            error:function(){
                alert("Error");
            }
        });
    });

    //Update Portfolio status

    $(document).on("click",".updatePortfolioStatus", function(){
        var status = $(this).children("i").attr("status");
        var portfolio_id = $(this).attr("portfolio_id");
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-portfolio-status",
            data: {status:status,portfolio_id:portfolio_id},
            success:function (resp) {
                if(resp['status']==0){
                    $("#portfolio-"+portfolio_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                }
                else if(resp['status']==1){
                    $("#portfolio-"+portfolio_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                }
            },
            error:function(){
                alert("Error");
            }
        });
    });

    //Update Users status

    $(document).on("click",".updateUserStatus", function(){
        var status = $(this).children("i").attr("status");
        var user_id = $(this).attr("user_id");
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-users-status",
            data: {status:status,user_id:user_id},
            success:function (resp) {
                if(resp['status']==0){
                    $("#user-"+user_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                }
                else if(resp['status']==1){
                    $("#user-"+user_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                }
            },
            error:function(){
                alert("Error");
            }
        });
    });

    //Confirm delete of Portfolio 
    // $(document).on("click",".confirmDelete",function(){
    //     var name = $(this).attr('name');
    //     if(confirm('Are you sure to delete this '+name+'?')){
    //         return true;
    //     }
    //     return false;
    // })

    //Confirm delete with sweetalert for all modules
    $(document).on("click",".confirmDelete",function(){
        
        var record = $(this).attr('record');
        var recordid = $(this).attr('recordid');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
              window.location.href = "/admin/delete-"+record+"/"+recordid;
            }
          })
    })

    // Use jQuery to select elements and attach event handlers for Landing Page theme
    $(document).ready(function() {

        //Basic Details Page
        $('#page_name').on('input', slugify);

        function slugify() {

            var pageName = $('#page_name').val();
            var pageUrl = urlgen(pageName);
            
            function urlgen(text) {
            
                return text
                    .toLowerCase()
                    .replace(/ /g, '-')     // Replace spaces with hyphens
                    .replace(/[^\w-]+/g, ''); // Remove non-word characters except hyphens
            }

            $('#page_url').val(pageUrl);
        }



        $('#menu1').on('input', updateOutput);
        $('#menu2').on('input', updateOutput);
        $('#menu3').on('input', updateOutput);
        $('#menu4').on('input', updateOutput);
        $('#title2').on('input', updateOutput);
        $('#sub_title2').on('input', updateOutput);
        $('#button1').on('input', updateOutput);
        $('#button2').on('input', updateOutput);


            

        

        //Section 1 Images
        const imageUploadInput = $('#logo');
        const outputImage = $('#output-logo');

        imageUploadInput.on('change', function () {
        const file = imageUploadInput[0].files[0];
                
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        outputImage.attr('src', e.target.result);
                    };

                    reader.readAsDataURL(file);
                } else {
                    // Handle the case where no file is selected
                    outputImage.attr('src', '');
                }
        });

        //Section 2 Images

        const banner_image2 = $('#banner_image2');
        const outputBanner_image2 = $('#outputBanner_image2');

        banner_image2.on('change', function () {
        const file = banner_image2[0].files[0];
                
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        outputBanner_image2.attr('src', e.target.result);
                    };

                    reader.readAsDataURL(file);
                } else {
                    // Handle the case where no file is selected
                    outputBanner_image2.attr('src', '');
                }
        });

        const background_image2 = $('#background_image2');
        const outputBackground_image2 = $('#outputBackground_image2');

        background_image2.on('change', function () {
        const file = background_image2[0].files[0];
                
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        outputBackground_image2.attr('src', e.target.result);
                    };

                    reader.readAsDataURL(file);
                } else {
                    // Handle the case where no file is selected
                    outputBackground_image2.attr('src', '');
                }
        });

        function updateOutput() {
            const menu1 = $('#menu1').val();
            const menu2 = $('#menu2').val();
            const menu3 = $('#menu3').val();
            const menu4 = $('#menu4').val();
            const title2 = $('#title2').val();
            const sub_title2 = $('#sub_title2').val();
            const button1 = $('#button1').val();
            const button2 = $('#button2').val();

            $('#outputMenu1').text(menu1);
            $('#outputMenu2').text(menu2);
            $('#outputMenu3').text(menu3);
            $('#outputMenu4').text(menu4);
            $('#outputTitle2').text(title2);
            $('#outputSub_title2').text(sub_title2);
            $('#outputButton1').text(button1);
            $('#outputButton2').text(button2);

        }
    });

    //Check Admin password is correct or not
    $("#page_url").keyup(function () { 
        var pageUrl = $("#page_url").val();
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/check-page-url",
            data: {pageUrl:pageUrl},
            success:function (resp) {
                if(resp == false){
                    $("#urlVerify").html("Current Page URL is already exist");
                }
                else if(resp == true){
                    $("#urlVerify").html("Current Page URL is correct");
                }
            },
            error:function(){
                alert("Error");
            }
        });
    });



});

    