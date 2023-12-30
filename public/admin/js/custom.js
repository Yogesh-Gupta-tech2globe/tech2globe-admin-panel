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
                }
                else if (resp['status'] == 1) {
                    $("#portfolio-" + portfolio_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
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
    $(document).ready(function () {

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
        $('#title3').on('input', updateOutput);
        $('#description3').on('input', updateOutput);
        $('#serviceName1').on('input', updateOutput);
        $('#serviceDescription1').on('input', updateOutput);
        $('#title4').on('input', updateOutput);
        $('#box1heading').on('input', updateOutput);
        $('#box1content').on('input', updateOutput);
        $('#box2heading').on('input', updateOutput);
        $('#box2content').on('input', updateOutput);
        $('#box3heading').on('input', updateOutput);
        $('#box3content').on('input', updateOutput);
        $('#box4heading').on('input', updateOutput);
        $('#box4content').on('input', updateOutput);
        $('#box5heading').on('input', updateOutput);
        $('#box5content').on('input', updateOutput);
        $('#box6heading').on('input', updateOutput);
        $('#box6content').on('input', updateOutput);
        $('#title5').on('input', updateOutput);
        $('#title6').on('input', updateOutput);
        $('#clientMessage1').on('input', updateOutput);
        $('#clientName1').on('input', updateOutput);
        $('#clientPost1').on('input', updateOutput);
        $('#title8').on('input', updateOutput);
        $('#subtitle8').on('input', updateOutput);
        $('#field1').on('input', updateOutput);
        $('#field2').on('input', updateOutput);
        $('#field3').on('input', updateOutput);
        $('#title7').on('input', updateOutput);
        $('#inputField1').on('input', updateOutput);
        $('#inputField2').on('input', updateOutput);
        $('#inputField3').on('input', updateOutput);
        $('#inputField4').on('input', updateOutput);
        $('#inputField5').on('input', updateOutput);
        $('#inputField6').on('input', updateOutput);
        $('#content9').on('input', updateOutput);



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

        //Section 3
        const serviceIcon1 = $('#serviceIcon1');
        const outputServiceIcon1 = $('#outputServiceIcon1');

        serviceIcon1.on('change', function () {
            const file = serviceIcon1[0].files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    outputServiceIcon1.attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            } else {
                // Handle the case where no file is selected
                outputServiceIcon1.attr('src', '');
            }
        });

        //Section 5

        const image1 = $('#image1');
        const outputImage1 = $('#outputImage1');

        image1.on('change', function () {
            const file = image1[0].files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    outputImage1.attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            } else {
                // Handle the case where no file is selected
                outputImage1.attr('src', '');
            }
        });

        //Section 7

        const backgroundImage7 = $('#background_image7');
        const outputBackgroundImage7 = $('#our-contact');

        backgroundImage7.on('change', function () {
            const file = backgroundImage7[0].files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    outputBackgroundImage7.css('background-image', 'url(' + e.target.result + ')');
                };

                reader.readAsDataURL(file);
            } else {
                // Handle the case where no file is selected
                outputBackgroundImage7.css('background-image', '');
            }
        });

        //Section 8

        const backgroundImage8 = $('#background_image8');
        const outputBackgroundImage8 = $('.have-query-section');

        backgroundImage8.on('change', function () {
            const file = backgroundImage8[0].files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    outputBackgroundImage8.css('background-image', 'url(' + e.target.result + ')');
                };

                reader.readAsDataURL(file);
            } else {
                // Handle the case where no file is selected
                outputBackgroundImage8.css('background-image', '');
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
            const title3 = $('#title3').val();
            const description3 = $('#description3').val();
            const serviceName1 = $('#serviceName1').val();
            const serviceDescription1 = $('#serviceDescription1').val();
            const title4 = $('#title4').val();
            const box1heading = $('#box1heading').val();
            const box1content = $('#box1content').val();
            const box2heading = $('#box2heading').val();
            const box2content = $('#box2content').val();
            const box3heading = $('#box3heading').val();
            const box3content = $('#box3content').val();
            const box4heading = $('#box4heading').val();
            const box4content = $('#box4content').val();
            const box5heading = $('#box5heading').val();
            const box5content = $('#box5content').val();
            const box6heading = $('#box6heading').val();
            const box6content = $('#box6content').val();
            const title5 = $('#title5').val();
            const title6 = $('#title6').val();
            const clientMessage1 = $('#clientMessage1').val();
            const clientName1 = $('#clientName1').val();
            const clientPost1 = $('#clientPost1').val();
            const title8 = $('#title8').val();
            const subtitle8 = $('#subtitle8').val();
            const field1 = $('#field1').val();
            const field2 = $('#field2').val();
            const field3 = $('#field3').val();
            const title7 = $('#title7').val();
            const inputField1 = $('#inputField1').val();
            const inputField2 = $('#inputField2').val();
            const inputField3 = $('#inputField3').val();
            const inputField4 = $('#inputField4').val();
            const inputField5 = $('#inputField5').val();
            const inputField6 = $('#inputField6').val();
            const content9 = $('#content9').val();



            $('#outputMenu1').text(menu1);
            $('#outputMenu2').text(menu2);
            $('#outputMenu3').text(menu3);
            $('#outputMenu4').text(menu4);
            $('#outputTitle2').text(title2);
            $('#outputSub_title2').text(sub_title2);
            $('#outputButton1').text(button1);
            $('#outputButton2').text(button2);
            $('#outputTitle3').text(title3);
            $('#outputDescription3').text(description3);
            $('#outputServiceName1').text(serviceName1);
            $('#outputServiceDescription1').text(serviceDescription1);
            $('#outputTitle4').text(title4);
            $('#outputBox1heading').text(box1heading);
            $('#outputBox1content').text(box1content);
            $('#outputBox2heading').text(box2heading);
            $('#outputBox2content').text(box2content);
            $('#outputBox3heading').text(box3heading);
            $('#outputBox3content').text(box3content);
            $('#outputBox4heading').text(box4heading);
            $('#outputBox4content').text(box4content);
            $('#outputBox5heading').text(box5heading);
            $('#outputBox5content').text(box5content);
            $('#outputBox6heading').text(box6heading);
            $('#outputBox6content').text(box6content);
            $('#outputTitle5').text(title5);
            $('#outputTitle6').text(title6);
            $('#outputClientMessage1').text(clientMessage1);
            $('#outputClientName1').text(clientName1);
            $('#outputClientPost1').text(clientPost1);
            $('#outputTitle8').text(title8);
            $('#outputSubTitle8').text(subtitle8);
            $('#outputField1').attr("placeholder", field1);
            $('#outputField2').attr("placeholder", field2);
            $('#outputField3').attr("value", field3);
            $('#outputTitle7').text(title7);
            $('#outputInputField1').attr("placeholder", inputField1);
            $('#outputInputField2').attr("placeholder", inputField2);
            $('#outputInputField3').attr("placeholder", inputField3);
            $('#outputInputField4').attr("placeholder", inputField4);
            $('#outputInputField5').attr("placeholder", inputField5);
            $('#outputInputField6').text(inputField6);
            $('#outputContent9').text(content9);

        }
    });

    //Check Landing Page Url is correct or not
    $("#page_url").keyup(function () {
        var pageUrl = $("#page_url").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/check-page-url",
            data: { pageUrl: pageUrl },
            success: function (resp) {
                if (resp == false) {
                    $("#urlVerify").html("Current Page URL is already exist");
                }
                else if (resp == true) {
                    $("#urlVerify").html("Current Page URL is correct");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Dynamically Adding Services (Section 3)

    var clickCount = 1;
    $("#serviceAddButton").click(function () {
        clickCount++;
        var group = '<div class="card card-info card-outline" id="service' + clickCount + '"><div class="card-header d-flex justify-content-between"><a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapse' + clickCount + '"><h4 class="card-title">Service ' + clickCount + '</h4></a><a class="d-inline-block w-auto border-0 serviceRemoveButton" serviceId="' + clickCount + '" href="javascript:void(0)"><i class="fas fa-times"></i></a></div><div id="collapse' + clickCount + '" class="collapse" data-parent="#accordion"><div class="card-body"><div class="form-group"><label for="serviceName' + clickCount + '">Service Name ' + clickCount + '</label><input type="text" class="form-control" name="serviceName' + clickCount + '" id="serviceName' + clickCount + '" placeholder="Enter Service Name"></div><div class="form-group"><label for="serviceDescription' + clickCount + '">Service small description ' + clickCount + '</label><input type="text" class="form-control" name="serviceDescription' + clickCount + '" id="serviceDescription' + clickCount + '" placeholder="Enter Service Description"></div><div class="form-group"><label for="serviceIcon' + clickCount + '">Service Icon ' + clickCount + '</label><input type="file" class="form-control" name="serviceIcon' + clickCount + '" id="serviceIcon' + clickCount + '" placeholder="Enter Service Icon"></div></div></div></div>';
        var content = ' <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b" id="outputService' + clickCount + '"><div class="card" style="background-color: #FFFFFF; color: #000000;"><div class="heading-container"><figure class="icon w-25"><img class="w-100" src="" id="outputServiceIcon' + clickCount + '" alt=""></figure><div class="heading-4"><h4 class="text-dark text-center"><span id="outputServiceName' + clickCount + '" style="color: #000000;"></span></h4></div></div><div class="content-container text-center"><p class="text-dark"><span id="outputServiceDescription' + clickCount + '" style="color: #000000;"></span></p><a href="" class="sub-button">Read More</a></div></div></div>';

        $("#accordion").append(group);
        $("#outputServices").append(content);

        // Event listener for each input field
        $('#serviceName' + clickCount).on('input', function () {
            var text = $(this).val();
            $('#outputServiceName' + clickCount).text(text);
        });

        // Event listener for each input field
        $('#serviceDescription' + clickCount).on('input', function () {
            var data = $(this).val();
            $('#outputServiceDescription' + clickCount).text(data);
        });

        var newServiceIcon = $('#serviceIcon' + clickCount);
        var newOutputServiceIcon = $('#outputServiceIcon' + clickCount);

        // Event listener for each image input field
        newServiceIcon.on('change', function () {
            var file = newServiceIcon[0].files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    newOutputServiceIcon.attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            } else {
                newOutputServiceIcon.attr('src', '');
            }

        });
    });

    //Dynamically Removing Services (Section 3)
    $(document).on("click", ".serviceRemoveButton", function () {
        var serviceId = $(this).attr("serviceId");
        var layout_id = $(this).attr("layout_id");

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
                // Remove the dynamically generated content based on the serviceId
                $("#service" + serviceId).remove();

                // Remove the corresponding output content based on the serviceId
                $("#outputService" + serviceId).remove();

                Swal.fire(
                    'Deleted!',
                    'Your service has been deleted.',
                    'success'
                )

                // $.ajax({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     type: "post",
                //     url: "/admin/remove-landingPage-services",
                //     data: {layout_id:layout_id,serviceId:serviceId},
                //     success: function (resp) {
                //       if(resp['status']==1){
                //         Swal.fire(
                //             'Deleted!',
                //             'Your file has been deleted.',
                //             'success'
                //         )
                //       }else{
                //         Swal.fire(
                //             'Oops...',
                //             'Something Went Wrong.',
                //             'error'
                //         )
                //       }  
                //     },
                //     error:function(){
                //         alert("Error");
                //     }
                // });


            }
        })
    });


    //Dynamically Adding Images (Section 5)
    var clickId = 1;
    $("#imageAddButton").click(function () {
        clickId++;
        var imagesInput = '<div class="form-group"><label for="image1">Image' + clickId + '</label><input type="file" class="form-control" name="image' + clickId + '" id="image' + clickId + '"></div> ';
        var imagesOutput = ' <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6"><figure><img src="{{ url(`landing_page/images/aonHewit.png`) }}" alt="" height="80" width="auto" id="outputImage' + clickId + '"></figure></div>';

        $("#section5Form").append(imagesInput);
        $("#outputImages").append(imagesOutput);

        var newInputImage = $('#image' + clickId);
        var newOutputImage = $('#outputImage' + clickId);

        // Event listener for each image input field
        newInputImage.on('change', function () {
            var file = newInputImage[0].files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    newOutputImage.attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            } else {
                newOutputImage.attr('src', '');
            }

        });
    });

    //Dynamically Adding Testimonials (Section 6)

    var clickOut = 1;
    $("#testimonialAddButton").click(function () {
        clickOut++;
        var inputTestimonial = '<div class="card card-info card-outline"><a class="d-block w-100" data-toggle="collapse" href="#collapse' + clickOut + '"><div class="card-header"><h4 class="card-title w-100">Testimonial ' + clickOut + '</h4></div></a><div id="collapse' + clickOut + '" class="collapse" data-parent="#testimonial"><div class="card-body"><div class="form-group"><label for="clientMessage' + clickOut + '">Client Message ' + clickOut + '</label><input type="text" class="form-control" name="clientMessage' + clickOut + '" id="clientMessage' + clickOut + '" placeholder="Enter Client Message"></div><div class="row"><div class="col-md-6"><div class="form-group"><label for="clientName' + clickOut + '">Client Name ' + clickOut + '</label><input type="text" class="form-control" name="clientName' + clickOut + '" id="clientName' + clickOut + '" placeholder="Enter Client Name"></div></div><div class="col-md-6"><div class="form-group"><label for="clientPost' + clickOut + '">Client Post ' + clickOut + '</label><input type="text" class="form-control" name="clientPost' + clickOut + '" id="clientPost' + clickOut + '" placeholder="Enter Client Post"></div></div></div></div></div></div></div>';
        var outputTestimonial = '<div class="col-lg-4 col-md-6 col-sm-12 col-12"><div class="details h-auto"><p style="color: #000000;" id="outputClientMessage' + clickOut + '">Client Message ....</p></div><div class="description"><div class="name"><strong style="color: #000000;" id="outputClientName' + clickOut + '">- Client Name ...</strong></div><div class="designation my-2"><p id="outputClientPost' + clickOut + '">Clirnt Post ....</p></div></div></div>';

        $("#testimonial").append(inputTestimonial);
        $("#outputTestimonial").append(outputTestimonial);

        // Event listener for each input field
        $('#clientMessage' + clickOut).on('input', function () {
            var text = $(this).val();
            $('#outputClientMessage' + clickOut).text(text);
        });

        // Event listener for each input field
        $('#clientName' + clickOut).on('input', function () {
            var data = $(this).val();
            $('#outputClientName' + clickOut).text(data);
        });

        // Event listener for each input field
        $('#clientPost' + clickOut).on('input', function () {
            var data2 = $(this).val();
            $('#outputClientPost' + clickOut).text(data2);
        });

    });


    //Update Landing Page Theme Section status

    $(document).on("click", ".updateLandingPageSectionStatus", function () {
        var status = $(this).children("i").attr("status");
        var layout_id = $(this).attr("layout_id");
        var section_id = $(this).attr("section_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/update-landingPage-section-status",
            data: { status: status, section_id: section_id, layout_id: layout_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#landingPage-section-" + section_id).html("<i class='fas fa-toggle-off fa-lg' style='color: yellow' status='Inactive'>&nbsp;&nbsp;<span style='font-size: 16px;'>Section is Inactive</span></i>");
                }
                else if (resp['status'] == 1) {
                    $("#landingPage-section-" + section_id).html("<i class='fas fa-toggle-on fa-lg' style='color: #FFFFFF' status='Active'>&nbsp;&nbsp;<span style='font-size: 16px;'>Section is Active</span></i>");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    // Landing Page Theme End


    // Tech2Globe Website Header Start

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
                }
                else if (resp['status'] == 1) {
                    $("#mainMenu-" + mainMenu_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
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
                }
                else if (resp['status'] == 1) {
                    $("#subMenu-" + subMenu_id).html("<i class='fas fa-toggle-on' style='color: #007BFF' status='Active'></i>");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //Update sub Category on changing Category
    $(document).on("change", ".categoryId", function () {
    
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

     


});

