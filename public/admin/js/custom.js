$(document).ready(function () {
    //Check Admin password is correct or not
    $("#current_pwd").keyup(function () {
        var current_pwd = $("#current_pwd").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/check-current-password",
            data: { current_pwd: current_pwd },
            success: function (resp) {
                if (resp == "false") {
                    $("#verifyCurrentPwd").html("Current Password is Incorrect");
                }
                else if (resp == "true") {
                    $("#verifyCurrentPwd").html("Current Password is correct");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });


    //Update Users status

    $(document).on("click", ".updateUserStatus", function () {
        var status = $(this).children("i").attr("status");
        var user_id = $(this).attr("user_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-users-status",
            data: { status: status, user_id: user_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#user-" + user_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                }
                else if (resp['status'] == 1) {
                    $("#user-" + user_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                }
            },
            error: function () {
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
    $(document).on("click", ".confirmDelete", function () {

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

                window.location.href = "/admin/delete-" + record + "/" + recordid;
                
            }
        })
    })

    // Landing Page Theme Start

    // Use jQuery to select elements and attach event handlers for Landing Page theme
    // $(document).ready(function () {

    //     //Basic Details Page
    //     $('#page_name').on('input', slugify);

    //     function slugify() {

    //         var pageName = $('#page_name').val();
    //         var pageUrl = urlgen(pageName);

    //         function urlgen(text) {

    //             return text
    //                 .toLowerCase()
    //                 .replace(/ /g, '-')     // Replace spaces with hyphens
    //                 .replace(/[^\w-]+/g, ''); // Remove non-word characters except hyphens
    //         }

    //         $('#page_url').val(pageUrl);
    //     }



    //     $('#menu1').on('input', updateOutput);
    //     $('#menu2').on('input', updateOutput);
    //     $('#menu3').on('input', updateOutput);
    //     $('#menu4').on('input', updateOutput);
    //     $('#title2').on('input', updateOutput);
    //     $('#sub_title2').on('input', updateOutput);
    //     $('#button1').on('input', updateOutput);
    //     $('#button2').on('input', updateOutput);
    //     $('#title3').on('input', updateOutput);
    //     $('#description3').on('input', updateOutput);
    //     $('#serviceName1').on('input', updateOutput);
    //     $('#serviceDescription1').on('input', updateOutput);
    //     $('#title4').on('input', updateOutput);
    //     $('#box1heading').on('input', updateOutput);
    //     $('#box1content').on('input', updateOutput);
    //     $('#box2heading').on('input', updateOutput);
    //     $('#box2content').on('input', updateOutput);
    //     $('#box3heading').on('input', updateOutput);
    //     $('#box3content').on('input', updateOutput);
    //     $('#box4heading').on('input', updateOutput);
    //     $('#box4content').on('input', updateOutput);
    //     $('#box5heading').on('input', updateOutput);
    //     $('#box5content').on('input', updateOutput);
    //     $('#box6heading').on('input', updateOutput);
    //     $('#box6content').on('input', updateOutput);
    //     $('#title5').on('input', updateOutput);
    //     $('#title6').on('input', updateOutput);
    //     $('#clientMessage1').on('input', updateOutput);
    //     $('#clientName1').on('input', updateOutput);
    //     $('#clientPost1').on('input', updateOutput);
    //     $('#title8').on('input', updateOutput);
    //     $('#subtitle8').on('input', updateOutput);
    //     $('#field1').on('input', updateOutput);
    //     $('#field2').on('input', updateOutput);
    //     $('#field3').on('input', updateOutput);
    //     $('#title7').on('input', updateOutput);
    //     $('#inputField1').on('input', updateOutput);
    //     $('#inputField2').on('input', updateOutput);
    //     $('#inputField3').on('input', updateOutput);
    //     $('#inputField4').on('input', updateOutput);
    //     $('#inputField5').on('input', updateOutput);
    //     $('#inputField6').on('input', updateOutput);
    //     $('#content9').on('input', updateOutput);



    //     //Section 1 Images
    //     const imageUploadInput = $('#logo');
    //     const outputImage = $('#output-logo');

    //     imageUploadInput.on('change', function () {
    //         const file = imageUploadInput[0].files[0];

    //         if (file) {
    //             const reader = new FileReader();

    //             reader.onload = function (e) {
    //                 outputImage.attr('src', e.target.result);
    //             };

    //             reader.readAsDataURL(file);
    //         } else {
    //             // Handle the case where no file is selected
    //             outputImage.attr('src', '');
    //         }
    //     });

    //     //Section 2 Images

    //     const banner_image2 = $('#banner_image2');
    //     const outputBanner_image2 = $('#outputBanner_image2');

    //     banner_image2.on('change', function () {
    //         const file = banner_image2[0].files[0];

    //         if (file) {
    //             const reader = new FileReader();

    //             reader.onload = function (e) {
    //                 outputBanner_image2.attr('src', e.target.result);
    //             };

    //             reader.readAsDataURL(file);
    //         } else {
    //             // Handle the case where no file is selected
    //             outputBanner_image2.attr('src', '');
    //         }
    //     });

    //     const background_image2 = $('#background_image2');
    //     const outputBackground_image2 = $('#outputBackground_image2');

    //     background_image2.on('change', function () {
    //         const file = background_image2[0].files[0];

    //         if (file) {
    //             const reader = new FileReader();

    //             reader.onload = function (e) {
    //                 outputBackground_image2.attr('src', e.target.result);
    //             };

    //             reader.readAsDataURL(file);
    //         } else {
    //             // Handle the case where no file is selected
    //             outputBackground_image2.attr('src', '');
    //         }
    //     });

    //     //Section 3
    //     const serviceIcon1 = $('#serviceIcon1');
    //     const outputServiceIcon1 = $('#outputServiceIcon1');

    //     serviceIcon1.on('change', function () {
    //         const file = serviceIcon1[0].files[0];

    //         if (file) {
    //             const reader = new FileReader();

    //             reader.onload = function (e) {
    //                 outputServiceIcon1.attr('src', e.target.result);
    //             };

    //             reader.readAsDataURL(file);
    //         } else {
    //             // Handle the case where no file is selected
    //             outputServiceIcon1.attr('src', '');
    //         }
    //     });

    //     //Section 5

    //     const image1 = $('#image1');
    //     const outputImage1 = $('#outputImage1');

    //     image1.on('change', function () {
    //         const file = image1[0].files[0];

    //         if (file) {
    //             const reader = new FileReader();

    //             reader.onload = function (e) {
    //                 outputImage1.attr('src', e.target.result);
    //             };

    //             reader.readAsDataURL(file);
    //         } else {
    //             // Handle the case where no file is selected
    //             outputImage1.attr('src', '');
    //         }
    //     });

    //     //Section 7

    //     const backgroundImage7 = $('#background_image7');
    //     const outputBackgroundImage7 = $('#our-contact');

    //     backgroundImage7.on('change', function () {
    //         const file = backgroundImage7[0].files[0];

    //         if (file) {
    //             const reader = new FileReader();

    //             reader.onload = function (e) {
    //                 outputBackgroundImage7.css('background-image', 'url(' + e.target.result + ')');
    //             };

    //             reader.readAsDataURL(file);
    //         } else {
    //             // Handle the case where no file is selected
    //             outputBackgroundImage7.css('background-image', '');
    //         }
    //     });

    //     //Section 8

    //     const backgroundImage8 = $('#background_image8');
    //     const outputBackgroundImage8 = $('.have-query-section');

    //     backgroundImage8.on('change', function () {
    //         const file = backgroundImage8[0].files[0];

    //         if (file) {
    //             const reader = new FileReader();

    //             reader.onload = function (e) {
    //                 outputBackgroundImage8.css('background-image', 'url(' + e.target.result + ')');
    //             };

    //             reader.readAsDataURL(file);
    //         } else {
    //             // Handle the case where no file is selected
    //             outputBackgroundImage8.css('background-image', '');
    //         }
    //     });

    //     function updateOutput() {
    //         const menu1 = $('#menu1').val();
    //         const menu2 = $('#menu2').val();
    //         const menu3 = $('#menu3').val();
    //         const menu4 = $('#menu4').val();
    //         const title2 = $('#title2').val();
    //         const sub_title2 = $('#sub_title2').val();
    //         const button1 = $('#button1').val();
    //         const button2 = $('#button2').val();
    //         const title3 = $('#title3').val();
    //         const description3 = $('#description3').val();
    //         const serviceName1 = $('#serviceName1').val();
    //         const serviceDescription1 = $('#serviceDescription1').val();
    //         const title4 = $('#title4').val();
    //         const box1heading = $('#box1heading').val();
    //         const box1content = $('#box1content').val();
    //         const box2heading = $('#box2heading').val();
    //         const box2content = $('#box2content').val();
    //         const box3heading = $('#box3heading').val();
    //         const box3content = $('#box3content').val();
    //         const box4heading = $('#box4heading').val();
    //         const box4content = $('#box4content').val();
    //         const box5heading = $('#box5heading').val();
    //         const box5content = $('#box5content').val();
    //         const box6heading = $('#box6heading').val();
    //         const box6content = $('#box6content').val();
    //         const title5 = $('#title5').val();
    //         const title6 = $('#title6').val();
    //         const clientMessage1 = $('#clientMessage1').val();
    //         const clientName1 = $('#clientName1').val();
    //         const clientPost1 = $('#clientPost1').val();
    //         const title8 = $('#title8').val();
    //         const subtitle8 = $('#subtitle8').val();
    //         const field1 = $('#field1').val();
    //         const field2 = $('#field2').val();
    //         const field3 = $('#field3').val();
    //         const title7 = $('#title7').val();
    //         const inputField1 = $('#inputField1').val();
    //         const inputField2 = $('#inputField2').val();
    //         const inputField3 = $('#inputField3').val();
    //         const inputField4 = $('#inputField4').val();
    //         const inputField5 = $('#inputField5').val();
    //         const inputField6 = $('#inputField6').val();
    //         const content9 = $('#content9').val();



    //         $('#outputMenu1').text(menu1);
    //         $('#outputMenu2').text(menu2);
    //         $('#outputMenu3').text(menu3);
    //         $('#outputMenu4').text(menu4);
    //         $('#outputTitle2').text(title2);
    //         $('#outputSub_title2').text(sub_title2);
    //         $('#outputButton1').text(button1);
    //         $('#outputButton2').text(button2);
    //         $('#outputTitle3').text(title3);
    //         $('#outputDescription3').text(description3);
    //         $('#outputServiceName1').text(serviceName1);
    //         $('#outputServiceDescription1').text(serviceDescription1);
    //         $('#outputTitle4').text(title4);
    //         $('#outputBox1heading').text(box1heading);
    //         $('#outputBox1content').text(box1content);
    //         $('#outputBox2heading').text(box2heading);
    //         $('#outputBox2content').text(box2content);
    //         $('#outputBox3heading').text(box3heading);
    //         $('#outputBox3content').text(box3content);
    //         $('#outputBox4heading').text(box4heading);
    //         $('#outputBox4content').text(box4content);
    //         $('#outputBox5heading').text(box5heading);
    //         $('#outputBox5content').text(box5content);
    //         $('#outputBox6heading').text(box6heading);
    //         $('#outputBox6content').text(box6content);
    //         $('#outputTitle5').text(title5);
    //         $('#outputTitle6').text(title6);
    //         $('#outputClientMessage1').text(clientMessage1);
    //         $('#outputClientName1').text(clientName1);
    //         $('#outputClientPost1').text(clientPost1);
    //         $('#outputTitle8').text(title8);
    //         $('#outputSubTitle8').text(subtitle8);
    //         $('#outputField1').attr("placeholder", field1);
    //         $('#outputField2').attr("placeholder", field2);
    //         $('#outputField3').attr("value", field3);
    //         $('#outputTitle7').text(title7);
    //         $('#outputInputField1').attr("placeholder", inputField1);
    //         $('#outputInputField2').attr("placeholder", inputField2);
    //         $('#outputInputField3').attr("placeholder", inputField3);
    //         $('#outputInputField4').attr("placeholder", inputField4);
    //         $('#outputInputField5').attr("placeholder", inputField5);
    //         $('#outputInputField6').text(inputField6);
    //         $('#outputContent9').text(content9);

    //     }
    // });

    //Check Landing Page Url is correct or not
    // $("#page_url").keyup(function () {
    //     var pageUrl = $("#page_url").val();

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: "post",
    //         url: "/admin/check-page-url",
    //         data: { pageUrl: pageUrl },
    //         success: function (resp) {
    //             if (resp == false) {
    //                 $("#urlVerify").html("Current Page URL is already exist");
    //             }
    //             else if (resp == true) {
    //                 $("#urlVerify").html("Current Page URL is correct");
    //             }
    //         },
    //         error: function () {
    //             alert("Error");
    //         }
    //     });
    // });

    //Dynamically Adding Services (Section 3)

    // var clickCount = 1;
    // $("#serviceAddButton").click(function () {
    //     clickCount++;
    //     var group = '<div class="card card-info card-outline" id="service' + clickCount + '"><div class="card-header d-flex justify-content-between"><a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapse' + clickCount + '"><h4 class="card-title">Service ' + clickCount + '</h4></a><a class="d-inline-block w-auto border-0 serviceRemoveButton" serviceId="' + clickCount + '" href="javascript:void(0)"><i class="fas fa-times"></i></a></div><div id="collapse' + clickCount + '" class="collapse" data-parent="#accordion"><div class="card-body"><div class="form-group"><label for="serviceName' + clickCount + '">Service Name ' + clickCount + '</label><input type="text" class="form-control" name="serviceName' + clickCount + '" id="serviceName' + clickCount + '" placeholder="Enter Service Name"></div><div class="form-group"><label for="serviceDescription' + clickCount + '">Service small description ' + clickCount + '</label><input type="text" class="form-control" name="serviceDescription' + clickCount + '" id="serviceDescription' + clickCount + '" placeholder="Enter Service Description"></div><div class="form-group"><label for="serviceIcon' + clickCount + '">Service Icon ' + clickCount + '</label><input type="file" class="form-control" name="serviceIcon' + clickCount + '" id="serviceIcon' + clickCount + '" placeholder="Enter Service Icon"></div></div></div></div>';
    //     var content = ' <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b" id="outputService' + clickCount + '"><div class="card" style="background-color: #FFFFFF; color: #000000;"><div class="heading-container"><figure class="icon w-25"><img class="w-100" src="" id="outputServiceIcon' + clickCount + '" alt=""></figure><div class="heading-4"><h4 class="text-dark text-center"><span id="outputServiceName' + clickCount + '" style="color: #000000;"></span></h4></div></div><div class="content-container text-center"><p class="text-dark"><span id="outputServiceDescription' + clickCount + '" style="color: #000000;"></span></p><a href="" class="sub-button">Read More</a></div></div></div>';

    //     $("#accordion").append(group);
    //     $("#outputServices").append(content);

    //     // Event listener for each input field
    //     $('#serviceName' + clickCount).on('input', function () {
    //         var text = $(this).val();
    //         $('#outputServiceName' + clickCount).text(text);
    //     });

    //     // Event listener for each input field
    //     $('#serviceDescription' + clickCount).on('input', function () {
    //         var data = $(this).val();
    //         $('#outputServiceDescription' + clickCount).text(data);
    //     });

    //     var newServiceIcon = $('#serviceIcon' + clickCount);
    //     var newOutputServiceIcon = $('#outputServiceIcon' + clickCount);

    //     // Event listener for each image input field
    //     newServiceIcon.on('change', function () {
    //         var file = newServiceIcon[0].files[0];

    //         if (file) {
    //             var reader = new FileReader();

    //             reader.onload = function (e) {
    //                 newOutputServiceIcon.attr('src', e.target.result);
    //             };

    //             reader.readAsDataURL(file);
    //         } else {
    //             newOutputServiceIcon.attr('src', '');
    //         }

    //     });
    // });

    //Dynamically Removing Services (Section 3)
    // $(document).on("click", ".serviceRemoveButton", function () {
    //     var serviceId = $(this).attr("serviceId");
    //     var layout_id = $(this).attr("layout_id");

    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             // Remove the dynamically generated content based on the serviceId
    //             $("#service" + serviceId).remove();

    //             // Remove the corresponding output content based on the serviceId
    //             $("#outputService" + serviceId).remove();

    //             Swal.fire(
    //                 'Deleted!',
    //                 'Your service has been deleted.',
    //                 'success'
    //             )

    //             // $.ajax({
    //             //     headers: {
    //             //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             //     },
    //             //     type: "post",
    //             //     url: "/admin/remove-landingPage-services",
    //             //     data: {layout_id:layout_id,serviceId:serviceId},
    //             //     success: function (resp) {
    //             //       if(resp['status']==1){
    //             //         Swal.fire(
    //             //             'Deleted!',
    //             //             'Your file has been deleted.',
    //             //             'success'
    //             //         )
    //             //       }else{
    //             //         Swal.fire(
    //             //             'Oops...',
    //             //             'Something Went Wrong.',
    //             //             'error'
    //             //         )
    //             //       }  
    //             //     },
    //             //     error:function(){
    //             //         alert("Error");
    //             //     }
    //             // });


    //         }
    //     })
    // });


    //Dynamically Adding Images (Section 5)
    // var clickId = 1;
    // $("#imageAddButton").click(function () {
    //     clickId++;
    //     var imagesInput = '<div class="form-group"><label for="image1">Image' + clickId + '</label><input type="file" class="form-control" name="image' + clickId + '" id="image' + clickId + '"></div> ';
    //     var imagesOutput = ' <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6"><figure><img src="{{ url(`landing_page/images/aonHewit.png`) }}" alt="" height="80" width="auto" id="outputImage' + clickId + '"></figure></div>';

    //     $("#section5Form").append(imagesInput);
    //     $("#outputImages").append(imagesOutput);

    //     var newInputImage = $('#image' + clickId);
    //     var newOutputImage = $('#outputImage' + clickId);

    //     // Event listener for each image input field
    //     newInputImage.on('change', function () {
    //         var file = newInputImage[0].files[0];

    //         if (file) {
    //             var reader = new FileReader();

    //             reader.onload = function (e) {
    //                 newOutputImage.attr('src', e.target.result);
    //             };

    //             reader.readAsDataURL(file);
    //         } else {
    //             newOutputImage.attr('src', '');
    //         }

    //     });
    // });

    //Dynamically Adding Testimonials (Section 6)

    // var clickOut = 1;
    // $("#testimonialAddButton").click(function () {
    //     clickOut++;
    //     var inputTestimonial = '<div class="card card-info card-outline"><a class="d-block w-100" data-toggle="collapse" href="#collapse' + clickOut + '"><div class="card-header"><h4 class="card-title w-100">Testimonial ' + clickOut + '</h4></div></a><div id="collapse' + clickOut + '" class="collapse" data-parent="#testimonial"><div class="card-body"><div class="form-group"><label for="clientMessage' + clickOut + '">Client Message ' + clickOut + '</label><input type="text" class="form-control" name="clientMessage' + clickOut + '" id="clientMessage' + clickOut + '" placeholder="Enter Client Message"></div><div class="row"><div class="col-md-6"><div class="form-group"><label for="clientName' + clickOut + '">Client Name ' + clickOut + '</label><input type="text" class="form-control" name="clientName' + clickOut + '" id="clientName' + clickOut + '" placeholder="Enter Client Name"></div></div><div class="col-md-6"><div class="form-group"><label for="clientPost' + clickOut + '">Client Post ' + clickOut + '</label><input type="text" class="form-control" name="clientPost' + clickOut + '" id="clientPost' + clickOut + '" placeholder="Enter Client Post"></div></div></div></div></div></div></div>';
    //     var outputTestimonial = '<div class="col-lg-4 col-md-6 col-sm-12 col-12"><div class="details h-auto"><p style="color: #000000;" id="outputClientMessage' + clickOut + '">Client Message ....</p></div><div class="description"><div class="name"><strong style="color: #000000;" id="outputClientName' + clickOut + '">- Client Name ...</strong></div><div class="designation my-2"><p id="outputClientPost' + clickOut + '">Clirnt Post ....</p></div></div></div>';

    //     $("#testimonial").append(inputTestimonial);
    //     $("#outputTestimonial").append(outputTestimonial);

    //     // Event listener for each input field
    //     $('#clientMessage' + clickOut).on('input', function () {
    //         var text = $(this).val();
    //         $('#outputClientMessage' + clickOut).text(text);
    //     });

    //     // Event listener for each input field
    //     $('#clientName' + clickOut).on('input', function () {
    //         var data = $(this).val();
    //         $('#outputClientName' + clickOut).text(data);
    //     });

    //     // Event listener for each input field
    //     $('#clientPost' + clickOut).on('input', function () {
    //         var data2 = $(this).val();
    //         $('#outputClientPost' + clickOut).text(data2);
    //     });

    // });


    //Update Landing Page Theme Section status

    // $(document).on("click", ".updateLandingPageSectionStatus", function () {
    //     var status = $(this).children("i").attr("status");
    //     var layout_id = $(this).attr("layout_id");
    //     var section_id = $(this).attr("section_id");

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: "post",
    //         url: "/admin/update-landingPage-section-status",
    //         data: { status: status, section_id: section_id, layout_id: layout_id },
    //         success: function (resp) {
    //             if (resp['status'] == 0) {
    //                 $("#landingPage-section-" + section_id).html("<i class='fas fa-toggle-off fa-lg' style='color: yellow' status='Inactive'>&nbsp;&nbsp;<span style='font-size: 16px;'>Section is Inactive</span></i>");
    //             }
    //             else if (resp['status'] == 1) {
    //                 $("#landingPage-section-" + section_id).html("<i class='fas fa-toggle-on fa-lg' style='color: #FFFFFF' status='Active'>&nbsp;&nbsp;<span style='font-size: 16px;'>Section is Active</span></i>");
    //             }
    //         },
    //         error: function () {
    //             alert("Error");
    //         }
    //     });
    // });

    // Landing Page Theme End


    // Tech2Globe Website Header Start

    //Main Menu Addition

    // $("#pagelinkfield").hide();
    $("#create_new_url").hide();
    $("#use_existing_url").hide();

    $(".custom-control-input").change(function() {
        var status = $(this).val();
    
        if (status == 1) {
            $("#use_existing_url").hide();
            $("#selectedPageUrl").prop('required', false);
            $("#selectedPageUrl").val(null);
            $("#create_new_url").show();
            $("#linkfile").prop('required', true);
        } else {
            $("#create_new_url").hide();
            $("#linkfile").prop('required', false);
            $("#linkfile").val(null);
            $("#pagelinkfield input.pageUrl").val('');
            $("#use_existing_url").show();
            $("#selectedPageUrl").prop('required', true);
        }
    });

    $('.custom-control-input:checked').trigger('change');

    $("#linkfile").on('change', function() {
        var a = $("#linkfile").val();
        if (a != '') {
            $("#pagelinkfield").show();
            $("#pagelinkfield input.pageUrl").prop('required', true); // Set required attribute to the input inside #pagelinkfield
        } else {
            $("#pagelinkfield").hide();
            $("#pagelinkfield input.pageUrl").prop('required', false); // Remove required attribute from the input inside #pagelinkfield
        }
    });




    //Update Main Menu status
    $(document).on("click", ".updateMainMenuStatus", function () {
        var status = $(this).children("i").attr("status");
        var mainMenu_id = $(this).attr("mainMenu_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-mainMenu-status",
            data: { status: status, mainMenu_id: mainMenu_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#mainMenu-" + mainMenu_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Main menu Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#mainMenu-" + mainMenu_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Main Menu Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Update Sub Menu status
    $(document).on("click", ".updateSubMenuStatus", function () {
        var status = $(this).children("i").attr("status");
        var subMenu_id = $(this).attr("subMenu_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-subMenu-status",
            data: { status: status, subMenu_id: subMenu_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#subMenu-" + subMenu_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Submenu Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#subMenu-" + subMenu_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Submenu Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Update Page Category status
    $(document).on("click", ".updatePageCategoryStatus", function () {
        var status = $(this).children("i").attr("status");
        var pageCate_id = $(this).attr("pageCate_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-pageCate-status",
            data: { status: status, pageCate_id: pageCate_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#pageCate-" + pageCate_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Page Category Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#pageCate-" + pageCate_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Page Category Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Update All Page status
    $(document).on("click", ".updateAllPagesStatus", function () {
        var status = $(this).children("i").attr("status");
        var allPages_id = $(this).attr("allPages_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-allPages-status",
            data: { status: status, allPages_id: allPages_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#allPages-" + allPages_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Page Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#allPages-" + allPages_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Page Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Update sub Category on changing Category
    $(document).on("change", ".categoryId", function () {
    
        $('.pageCategoryId').html('<option>Select Page Category</option>');
        var category_id = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/tech2globe-layout",
            data: {category_id: category_id },
            success: function (subMenu) {

                $('.subCategoryId').html(subMenu);

            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Update Page Category on changing Subcategory
    $(document).on("change", ".subCategoryId", function () {
        
        var category_id = $(".categoryId").val();
        var subCategory_id = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/tech2globe-getPageCategory",
            data: {category_id: category_id,subCategory_id: subCategory_id },
            success: function (pageCategory) {

                $('.pageCategoryId').html(pageCategory);

            },
            error: function () {
                alert("Error");
            }
        });
    });

     //Creating Page Url
     $(document).on("input", ".pageName", function(){

        var pageName = $('.pageName').val();
        var pageUrl = urlgen(pageName);

         function urlgen(text) {

             return text
                 .toLowerCase()
                 .replace(/ /g, '-')     // Replace spaces with hyphens
                 .replace(/[^\w-]+/g, ''); // Remove non-word characters except hyphens
         }

        $('.pageUrl').val(pageUrl);
     });

     //Check Tech2globe Page Url is correct or not
    $(document).on("keyup", ".pageUrl", function () {
        var pageUrl = $(".pageUrl").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/check-all-pages-url",
            data: { pageUrl: pageUrl },
            success: function (resp) {
                if (resp == false) {
                    $(".urlVerify").html("Current Page URL is already exist");
                }
                else if (resp == true) {
                    $(".urlVerify").html("Current Page URL is correct");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Real Time changes in Text

    $('#socialLink1Text').on('input', updateHeaderOutput);
    $('#socialLink2Text').on('input', updateHeaderOutput);
    $('#innerPage1Text').on('input', updateHeaderOutput);
    $('#innerPage2Text').on('input', updateHeaderOutput);
    $('#innerPage3Text').on('input', updateHeaderOutput);
    $('#branchNumber1').on('input', updateHeaderOutput);



    function updateHeaderOutput() {
       
        const socialLink1Text = $('#socialLink1Text').val();
        const socialLink2Text = $('#socialLink2Text').val();
        const innerPage1Text = $('#innerPage1Text').val();
        const innerPage2Text = $('#innerPage2Text').val();
        const innerPage3Text = $('#innerPage3Text').val();
        const branchNumber1 = $('#branchNumber1').val();


       
        $('#outputSocialLink1Text').text(socialLink1Text);
        $('#outputSocialLink2Text').text(socialLink2Text);
        $('#outputInnerPage1Text').text(innerPage1Text);
        $('#outputInnerPage2Text').text(innerPage2Text);
        $('#outputInnerPage3Text').text(innerPage3Text);
        $('#outputBranchNumber1').text(branchNumber1);
    }

     //Real Time Changes in Images

     //Top Navbar

     const socialLink1Icon = $('#socialLink1Icon');
     const outputSocialLink1Icon = $('#outputSocialLink1Icon');

     socialLink1Icon.on('change', function () {
         const file = socialLink1Icon[0].files[0];

         if (file) {
             const reader = new FileReader();

             reader.onload = function (e) {
                outputSocialLink1Icon.attr('src', e.target.result);
             };

             reader.readAsDataURL(file);
         } else {
             // Handle the case where no file is selected
             outputSocialLink1Icon.attr('src', '');
         }
     });

     const socialLink2Icon = $('#socialLink2Icon');
     const outputSocialLink2Icon = $('#outputSocialLink2Icon');

     socialLink2Icon.on('change', function () {
         const file = socialLink2Icon[0].files[0];

         if (file) {
             const reader = new FileReader();

             reader.onload = function (e) {
                outputSocialLink2Icon.attr('src', e.target.result);
             };

             reader.readAsDataURL(file);
         } else {
             // Handle the case where no file is selected
             outputSocialLink2Icon.attr('src', '');
         }
     });

     //Middle Navbar

     const websiteLogo = $('#websiteLogo');
     const outputWebsiteLogo = $('#outputWebsiteLogo');

     websiteLogo.on('change', function () {
         const file = websiteLogo[0].files[0];

         if (file) {
             const reader = new FileReader();

             reader.onload = function (e) {
                outputWebsiteLogo.attr('src', e.target.result);
             };

             reader.readAsDataURL(file);
         } else {
             // Handle the case where no file is selected
             outputWebsiteLogo.attr('src', '');
         }
     });

     const countryFlag1 = $('#countryFlag1');
     const outputCountryFlag1 = $('#outputCountryFlag1');

     countryFlag1.on('change', function () {
         const file = countryFlag1[0].files[0];

         if (file) {
             const reader = new FileReader();

             reader.onload = function (e) {
                outputCountryFlag1.attr('src', e.target.result);
             };

             reader.readAsDataURL(file);
         } else {
             // Handle the case where no file is selected
             outputCountryFlag1.attr('src', '');
         }
     });


     //Middle Navbar Adding Branch Dynamically
     var branchCount = $("#branchAddButton").attr("branch_number");
    $("#branchAddButton").click(function () {
        
        branchCount++;
        var input = ' <div class="card card-info card-outline" id="branch' + branchCount + '"><div class="card-header d-flex justify-content-between"><a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapse' + branchCount + '"><h4 class="card-title"> Branch ' + branchCount + ' </h4></a><a class="d-inline-block w-auto border-0 branchRemoveButton" branchId="' + branchCount + '" href="javascript:void(0)"><i class="fas fa-times"></i></a></div><div id="collapse' + branchCount + '" class="collapse" data-parent="#companyBranch"><div class="card-body"><div class="row"><div class="col-md-4"><div class="form-group"><label for="countryFlag' + branchCount + '">Country Flag</label><input type="file" class="form-control" name="countryFlag' + branchCount + '" id="countryFlag' + branchCount + '"></div></div><div class="col-md-4"><div class="form-group"><label for="branchNumber' + branchCount + '">Branch Contact Number</label><input type="text" class="form-control" name="branchNumber' + branchCount + '" id="branchNumber' + branchCount + '" placeholder="Enter Branch Contact Number" value=""></div></div><div class="col-md-4"><div class="form-group"><label for="branchCountry' + branchCount + '">Branch Country</label><input type="text" class="form-control" name="branchCountry' + branchCount + '" id="branchCountry' + branchCount + '" placeholder="Enter Branch Country" value=""></div></div></div></div></div></div>';
        var output = ' <div class="col-md-3 col-sm-6 d-flex align-items-center" id="outputBranch' + branchCount + '"><div class="flag-icon"><img src="" id="outputCountryFlag' + branchCount + '" alt=""></div><div class="ms-3"><a href="tel:" id="outputBranchNumber' + branchCount + '"></a></div></div>';

        $("#companyBranch").append(input);
        $("#outptCompanyBranch").append(output);

        // Event listener for each input field
        $('#branchNumber' + branchCount).on('input', function () {
            var text = $(this).val();
            $('#outputBranchNumber' + branchCount).text(text);
        });

        var newCountryFlag = $('#countryFlag' + branchCount);
        var newOutputCountryFlag = $('#outputCountryFlag' + branchCount);

        // Event listener for each image input field
        newCountryFlag.on('change', function () {
            var file = newCountryFlag[0].files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    newOutputCountryFlag.attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            } else {
                newOutputCountryFlag.attr('src', '');
            }

        });
    });

    
    //Dynamically Removing Services (Section 3)
    $(document).on("click", ".branchRemoveButton", function () {
        var branchId = $(this).attr("branchId");

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
                // Remove the dynamically generated content based on the branchid
                $("#branch" + branchId).remove();

                // Remove the corresponding output content based on the branchid
                $("#outputBranch" + branchId).remove();

                Swal.fire(
                    'Deleted!',
                    'Your service has been deleted.',
                    'success'
                )


            }
        })
    });


    
    // Tech2Globe Website Footer Start

    //Update Footer Pages status
    $(document).on("click", ".updateFooterPagesStatus", function () {
        var status = $(this).children("i").attr("status");
        var footerPages_id = $(this).attr("footerPages_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-footerPages-status",
            data: { status: status, footerPages_id: footerPages_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#footerPages-" + footerPages_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                }
                else if (resp['status'] == 1) {
                    $("#footerPages-" + footerPages_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });


    //Extras Module
    //Contact And Social
    $('.updateContactdetails').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting traditionally
    
        var formData = $(this).serialize(); // Serialize the form data
    
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/admin/updateContactdetails',
            data: formData,
            success: function(response) {
                
                toastr.success(response);    
                    
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log any errors to the console
            }
        });
    });

    //Update Social Media Status
    $(document).on("click", ".updateSocialStatus", function () {
        var status = $(this).children("i").attr("status");
        var social_id = $(this).attr("social_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-social-status",
            data: { status: status, social_id: social_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#social-" + social_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Social Media Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#social-" + social_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Social Media Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });
    
    //Company Branch Management

    //Update Branch Status
    $(document).on("click", ".updateBranchStatus", function () {
        var status = $(this).children("i").attr("status");
        var branch_id = $(this).attr("branch_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-branch-status",
            data: { status: status, branch_id: branch_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#branch-" + branch_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Branch Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#branch-" + branch_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Branch Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Achievements

    //Update achievements Status
    $(document).on("click", ".updateAchievementsStatus", function () {
        var status = $(this).children("i").attr("status");
        var achievements_id = $(this).attr("achievements_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-achievements-status",
            data: { status: status, achievements_id: achievements_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#achievements-" + achievements_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Achievements Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#achievements-" + achievements_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Achievements Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });


    //Our Work Module

    //Portfolio Category
    $('.portfoliocategoryeditbtn').on('click', function(){
        let name = $(this).data('name');
        let id = $(this).data('id');
        $('#add-category').find('#categoryName').val(name);
        $('#add-category').find('#add-category-form').attr("action","add-edit-portfolio-category/"+id);
    });

    //Update Status Portfolio Category
    $(document).on("click", ".updatePortfolioCatStatus", function () {
        var status = $(this).children("i").attr("status");
        var portfolio_cat_id = $(this).attr("portfolio_cat_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-portfolio-cat-status",
            data: { status: status, portfolio_cat_id: portfolio_cat_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#portfolio-cat-" + portfolio_cat_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Portfolio Category Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#portfolio-cat-" + portfolio_cat_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Portfolio Category Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Portfolio Sub Category
    $('.portfoliosubcategoryeditbtn').on('click', function(){
        let catid = $(this).data('catid')
        let name = $(this).data('name');
        let id = $(this).data('id');

        $("#portfoliocatid option[value='" + catid + "']").prop("selected", true);
        $('#add-sub-category').find('#subcategoryName').val(name);
        $('#add-sub-category').find('#add-subcategory-form').attr("action","add-edit-portfolio-subcategory/"+id);
    });

    //Update Status Portfolio Sub Category
    $(document).on("click", ".updatePortfolioSubCatStatus", function () {
        var status = $(this).children("i").attr("status");
        var portfolio_subcat_id = $(this).attr("portfolio_subcat_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-portfolio-subcat-status",
            data: { status: status, portfolio_subcat_id: portfolio_subcat_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#portfolio-subcat-" + portfolio_subcat_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Portfolio Sub Category Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#portfolio-subcat-" + portfolio_subcat_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Portfolio Sub Category Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Get Subcategory according to category
    $('#portcat').change(function(){
        var catid = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/getSubcategory",
            data: {catid:catid},
            success: function (response) {
                $("#portsubcat").html(response);
            }
        });
    });

    //Update Portfolio status

    $(document).on("click", ".updatePortfolioStatus", function () {
        var status = $(this).children("i").attr("status");
        var portfolio_id = $(this).attr("portfolio_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-portfolio-status",
            data: { status: status, portfolio_id: portfolio_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#portfolio-" + portfolio_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Portfolio Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#portfolio-" + portfolio_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Portfolio Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Testimonial
    $("#testText").hide();
    $("#testVideo").hide();
    $("#testType").change(function (e) { 
        e.preventDefault();

        $("#editdata").remove();
        var type = $("#testType").val();

        if(type == "text"){
            $("#testUrl").prop('required', false);
            $("#testUrl").val(null);
            $("#testVideo").hide(); 
            $("#testText").show();
            $("#testRating").prop('required', true);
            $("#testComment").prop('required', true);
        }else if(type == "video"){
            $("#testRating").prop('required', false);
            $("#testComment").prop('required', false);
            $("#testRating").val(null);
            $("#testComment").val(null);
            $("#testText").hide();
            $("#testVideo").show();
            $("#testUrl").prop('required', true);
        }else{
            $("#testText").hide();
            $("#testVideo").hide();
        }
    });
    
    //Update Testimonial status

    $(document).on("click", ".updateTestimonialStatus", function () {
        var status = $(this).children("i").attr("status");
        var testimonial_id = $(this).attr("testimonial_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-testimonial-status",
            data: { status: status, testimonial_id: testimonial_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#testimonial-" + testimonial_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Testimonial Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#testimonial-" + testimonial_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Testimonial Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //FAQ
    // Update FAQ Status

    $(document).on("click", ".updateFaqStatus", function () {
        var status = $(this).children("i").attr("status");
        var faq_id = $(this).attr("faq_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-faq-status",
            data: { status: status, faq_id: faq_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#faq-" + faq_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('FAQ Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#faq-" + faq_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('FAQ Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    // Add FAq question Answer
    $(document).ready(function(){
        var i = 1;
        $("#addQA").click(function(e) { 
            e.preventDefault();
            i++;
            
            // Remove close button from the previously appended item, if it exists
            $(".qa-item .close-btn").remove();

            var content = '<div class="qa-item">' +
                            '<button type="button" class="close-btn">&times;</button>' +
                            '<div class="form-group">' +
                                '<label for="question">Q' + i + '. Question*</label>' +
                                '<input type="text" class="form-control" name="question[]" placeholder="Enter Question" required>' +
                            '</div>' +
                            '<div class="form-group">' +
                                '<label for="answer">A' + i + '. Answer*</label>' +
                                '<textarea class="form-control" name="answer[]" placeholder="Enter Answer" required></textarea>' +
                            '</div>' +
                        '</div>';

            // Append the content to the showQA container
            $("#showQA").append(content);

            // Add click event listener to the close button of the latest appended content
            $(".qa-item").last().find(".close-btn").click(function() {
                $(this).closest(".qa-item").remove();

                i--;
                
                // Add the close button to the new latest item, if it exists
                var lastItem = $(".qa-item").last();
                if (lastItem.length) {
                    lastItem.append('<button type="button" class="close-btn">&times;</button>');
                    lastItem.find(".close-btn").click(function() {
                        $(this).closest(".qa-item").remove();
                        // Repeat the logic to ensure close button is added to the new latest item
                        var newLastItem = $(".qa-item").last();
                        if (newLastItem.length) {
                            newLastItem.append('<button type="button" class="close-btn">&times;</button>');
                            newLastItem.find(".close-btn").click(function() {
                                $(this).closest(".qa-item").remove();
                            });
                        }
                    });
                }
            });
        });
       

    });

    //Case Study
    $(document).ready(function() {
        $('.sectionSubmit').submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();
            
            // Serialize the form data
            var formData = new FormData(this);
            
            // Send AJAX request
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "/admin/create-case-study-section",
                data: formData,
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Prevent jQuery from setting contentType
                success: function(response) {
                    toastr.success(response['message']);
                    $("#casestudyviewbtn").html('<a class="btn btn-primary" href="/casestudy/'+ response['link'] +'" target="_blank">Visit Page</a>');
                    window.location.replace("/admin/case-study");  
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    var a = JSON.parse(xhr.responseText);
                    console.log(a);
                    toastr.error(a.message);
                    console.error(xhr.responseText);
                }
            });
        });
    });

    // Case Study Section4 
    var clickOut = 1;
    $("#cardAddButton").click(function () {
        clickOut++;
        var inputCard = '<div class="card card-info card-outline"><a class="d-block w-100" data-toggle="collapse" href="#card'+ clickOut +'"><div class="card-header"><h4 class="card-title w-100">Card ' + clickOut + '</h4></div></a><div id="card' + clickOut + '" class="collapse show" data-parent="#section4card"><div class="card-body"><div class="form-group"><label for="cardheading">Heading</label><input type="text" class="form-control" name="cardHeading[]" placeholder="Enter Card Heading" required></div><div class="form-group"><label for="cardContent">Content</label><textarea class="form-control" name="cardContent[]" placeholder="Enter Card Content" required></textarea></div></div></div></div>';

        $("#section4card").append(inputCard);

    });


    // Case Study Category
    $('.casestudycategoryeditbtn').on('click', function(){
        let name = $(this).data('name');
        let id = $(this).data('id');
        $('#add-category').find('#categoryName').val(name);
        $('#add-category').find('#add-category-form').attr("action","add-edit-casestudy-category/"+id);
    });

    // Update Case Study Category Status
    $(document).on("click", ".updateCasestudyCatStatus", function () {
        var status = $(this).children("i").attr("status");
        var casestudy_id = $(this).attr("casestudy_cat_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-casestudycategory-status",
            data: { status: status, casestudy_id: casestudy_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#casestudy-cat-" + casestudy_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Case Study Category Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#casestudy-cat-" + casestudy_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Case Study Category Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    
    // Update Case Study Status
    $(document).on("click", ".updateCasestudyStatus", function () {
        var status = $(this).children("i").attr("status");
        var casestudy_id = $(this).attr("casestudy_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-casestudy-status",
            data: { status: status, casestudy_id: casestudy_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#casestudy-" + casestudy_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Case Study Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#casestudy-" + casestudy_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Case Study Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Blog
    // Update Case Study Category Status
    $(document).on("click", ".updateBlogStatus", function () {
        var status = $(this).children("i").attr("status");
        var blog_id = $(this).attr("blog_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-blog-status",
            data: { status: status, blog_id: blog_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#blog-" + blog_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Blog Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#blog-" + blog_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Blog Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });


    //Event
    //Event Category
    //Add edit modal button
    $('.eventcategoryeditbtn').on('click', function(){
        let name = $(this).data('name');
        let id = $(this).data('id');
        let image = $(this).data('image');
        var previousImage = `
            <label>Previous Image</label><br>
            <img src="/images/event/category/${image}" height="100px" width="150px">
            <input type="hidden" name="current_image" value="${image}"></input>
        `;
        
        $("#eventPreviousImage").html('');
        $('#add-eventCategory').find('#name').val(name);
        $("#eventPreviousImage").append(previousImage);
        $("#image").prop('required', false);
        $('#add-eventCategory').find('#add-eventCategory-form').attr("action","add-edit-eventCategory/"+id);
    });

    $('.eventcategoryaddbtn').on('click', function(){
        
        $("#eventPreviousImage").html('');
        $('#add-eventCategory').find('#name').val(null);
    });

    // Update Event Category Status
    $(document).on("click", ".updateEventCatStatus", function () {
        var status = $(this).children("i").attr("status");
        var eventCat_id = $(this).attr("eventCat_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-eventCat-status",
            data: { status: status, eventCat_id: eventCat_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#eventCat-" + eventCat_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Event Category Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#eventCat-" + eventCat_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Event Category Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    // Add Edit Event Form
    $("#eventForm").submit(function (e) { 
        e.preventDefault();

         // Serialize the form data
         var formData = new FormData(this);
         var eventID = $("#eventID").val();

        // Define the URL based on eventID
        var url = (eventID === "" || eventID === null) ? "/admin/add-edit-event" : "/admin/add-edit-event/" + encodeURIComponent(eventID);
            
         // Send AJAX request
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'POST',
             url: url,
             data: formData,
             processData: false,  // Prevent jQuery from processing the data
             contentType: false,  // Prevent jQuery from setting contentType
             success: function(response) {
                 toastr.success(response['message']);
                 window.location.replace("/admin/event");  
             },
             error: function(xhr, status, error) {
                 // Handle errors
                 var a = JSON.parse(xhr.responseText);
                 console.log(a);
                 toastr.error(a.message);
                 console.error(xhr.responseText);
             }
         });
        
    });

    $(".eventImageDeleteBtn").click(function (e) { 
        e.preventDefault();
        
        let eventId =  $(this).data('id');
        let imgNum =  $(this).data('imgnum'); 

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/delete-event-image",
            data: { eventId: eventId, imgNum: imgNum },
            success: function (resp) {
                if (resp = 200) {
                    toastr.success('Image removed Successfully.');
                    location.reload();    
                }else{
                    toastr.error(resp['error']);
                }
            },
            error: function (xhr, status, error) {
                 // Handle errors
                 var a = JSON.parse(xhr.responseText);
                 console.log(a);
                 toastr.error(a.message);
                 console.error(xhr.responseText);
            }
        });
    });

    // Update Event Status
    $(document).on("click", ".updateEventStatus", function () {
        var status = $(this).children("i").attr("status");
        var event_id = $(this).attr("event_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-event-status",
            data: { status: status, event_id: event_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#event-" + event_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Event Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#event-" + event_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Event Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    $(document).ready(function() {
        var table = $('#eventCategoryTable').DataTable({
            rowReorder: {
                selector: '.dragRow'
            }
        });
    
        table.on('row-reorder', function (e, diff, edit) {
            var data = [];
            for (var i = 0, ien = diff.length; i < ien; i++) {
                var rowData = table.row(diff[i].node).data();
                data.push({
                    id: rowData[3],
                    order_number: diff[i].newData
                });
            }
    
          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/eventOrderUpdate',
            type: 'POST',
            data: {
                order: JSON.stringify(data)
            },
            success: function(response) {
                toastr.success('Order updated successfully');    
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
          });
        });
    });

    //Job Module
    // Update Job Status
    $(document).on("click", ".updateJobStatus", function () {
        var status = $(this).children("i").attr("status");
        var job_id = $(this).attr("job_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-job-status",
            data: { status: status, job_id: job_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#job-" + job_id).html("<i class='fas fa-toggle-off' style='color: grey' status='Inactive'></i>");
                    toastr.success('Job Deactivated');    
                }
                else if (resp['status'] == 1) {
                    $("#job-" + job_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                    toastr.success('Job Activated');    
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Update Job Request Status
    $('.update-jobRequest-status').on('click', function(){
        let status = $(this).data('status');
        let id = $(this).data('id');
        
        $("#showjobstatus").val(status);

        // Optional: Add the selected attribute to the option
        $('#showjobstatus option').each(function() {
            if ($(this).val() == status) {
                $(this).attr('selected', true);
            } else {
                $(this).removeAttr('selected');
            }
        });

        $('#update-status').find('#update-jobRequest-status').attr("action","update-jobRequest-status/"+id);
    });

    //Location APIs
    var countrySettings = {
        "url": "https://api.countrystatecity.in/v1/countries",
        "method": "GET",
        "headers": {
            "X-CSCAPI-KEY": "emV4d082SGZGWml3N3RxOXRkT2FrMmp4eG5xd2d3cUdtOWlwWU1LNg=="
        },
    };
    
    $.ajax(countrySettings).done(function (response) {
        var oldCountry = $("#jobCountry").data('country');
        
        var country = "<option value=''>Select Country</option>";
        for(let i = 1; i < response.length; i++){
            var isselect = '';
            if(oldCountry != null && oldCountry == response[i]['name']){
                isselect = "selected";
            }else{
                isselect = '';
            }
            country += "<option value='"+ response[i]['iso2']+"|"+ response[i]['name'] +"'"+ isselect +">"+ response[i]['name'] +"</option>"; 
        }
        $("#jobCountry").html('');
        $("#jobCountry").html(country);
        if(oldCountry != null){
            $("#jobCountry").trigger('change');
        }
    });

    $("#jobCountry").change(function (e) { 
        e.preventDefault();

        var country = $("#jobCountry").val();
        var countryCode = country.split('|');
        
        $("#jobState").html('');
        $("#jobCity").html('<option value="">Select City</option>');
        $("#jobCity").prop('required', false);

        var stateSettings = {
            "url": "https://api.countrystatecity.in/v1/countries/"+ countryCode[0] +"/states",
            "method": "GET",
            "headers": {
                "X-CSCAPI-KEY": "emV4d082SGZGWml3N3RxOXRkT2FrMmp4eG5xd2d3cUdtOWlwWU1LNg=="
            },
        };
        
        $.ajax(stateSettings).done(function (response) {
            var oldState =  $("#jobState").data('state');
            if(response.length == 0){
                states = "<option value=''>Select State</option>";
                $("#jobState").prop('required', false);
            }else{
                states = "<option value=''>Select State</option>";
                $("#jobState").prop('required', true);
            }

            for(let i = 1; i < response.length; i++){
                var isselect = '';
                if(oldState != null && oldState == response[i]['name']){
                    isselect = "selected";
                }else{
                    isselect = '';
                }
                states += "<option value='"+ response[i]['iso2']+"|"+ response[i]['name'] +"' "+isselect+">"+ response[i]['name'] +"</option>"; 
            }
    
            $("#jobState").html(states);
            if(oldState != null){
                $("#jobState").trigger('change');
            }
        });
    });

    $("#jobState").change(function (e) { 
        e.preventDefault();

        var country = $("#jobCountry").val();
        var countryCode = country.split('|');
        var state = $(this).val();
        var stateCode = state.split('|');

        var citySettings = {
            "url": "https://api.countrystatecity.in/v1/countries/"+ countryCode[0] +"/states/"+ stateCode[0] +"/cities",
            "method": "GET",
            "headers": {
                "X-CSCAPI-KEY": "emV4d082SGZGWml3N3RxOXRkT2FrMmp4eG5xd2d3cUdtOWlwWU1LNg=="
            },
        };
        
        $.ajax(citySettings).done(function (response) {
            var oldCity = $("#jobCity").data('city');
            if(response.length == 0){
                cities = "<option value=''>Select City</option>";
                $("#jobCity").prop('required', false);
            }else{
                cities = "<option value=''>Select City</option>";
                $("#jobCity").prop('required', true);
            }

            for(let i = 1; i < response.length; i++){
                var isselect = '';
                if(oldCity != null && oldCity == response[i]['name']){
                    isselect = "selected";
                }else{
                    isselect = '';
                }
                cities += "<option value='"+ response[i]['name'] +"' "+isselect+">"+ response[i]['name'] +"</option>"; 
            }

            $("#jobCity").html('');
            $("#jobCity").html(cities);
        });
    });

    //Send mail of pending job requests
    $("#jobRequestSendMail").click(function (e) { 
        e.preventDefault();

        $("#jobApplicationTable").hide();
        $(".rocketloader").show();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/jobRequestSendPendingMail",
            success: function (response) {
                if(response['success']){
                    $(".rocketloader").hide();
                    $("#jobApplicationTable").show();
                    toastr.success(response['success']);    
                }else{
                    $(".rocketloader").hide();
                    $("#jobApplicationTable").show();
                    toastr.error(response['error']);    
                }
            }
        });
    });
    

    // $(function () {
    //     // Summernote
    //     $('.summernote').summernote()
    //     // CodeMirror
    //     CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
    //         mode: "htmlmixed",
    //         theme: "monokai"
    //     });
    // });
});

