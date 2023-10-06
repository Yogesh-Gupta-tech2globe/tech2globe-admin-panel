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

    //Confirm delete of Portfolio 
    // $(document).on("click",".confirmDelete",function(){
    //     var name = $(this).attr('name');
    //     if(confirm('Are you sure to delete this '+name+'?')){
    //         return true;
    //     }
    //     return false;
    // })

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
});