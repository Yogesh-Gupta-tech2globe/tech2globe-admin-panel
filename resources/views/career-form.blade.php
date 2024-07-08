
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <style>
                .preloader-dot-loading {
                  display: block;
                  margin: 0px auto;
                  width: 100px;
              
                  .cssload-loading i {
                    width: 25px;
                    height: 25px;
                    display: inline-block;
                    border-radius: 50%;
                    background: #BB060A;
              
                    &:first-child {
                      opacity: 0;
                      animation: cssload-loading-ani2 0.58s linear infinite;
                      -o-animation: cssload-loading-ani2 0.58s linear infinite;
                      -ms-animation: cssload-loading-ani2 0.58s linear infinite;
                      -webkit-animation: cssload-loading-ani2 0.58s linear infinite;
                      -moz-animation: cssload-loading-ani2 0.58s linear infinite;
                      transform: translate(-19px);
                      -o-transform: translate(-19px);
                      -ms-transform: translate(-19px);
                      -webkit-transform: translate(-19px);
                      -moz-transform: translate(-19px);
                    }
              
                    &:nth-child(2),
                    &:nth-child(3) {
                      animation: cssload-loading-ani3 0.58s linear infinite;
                      -o-animation: cssload-loading-ani3 0.58s linear infinite;
                      -ms-animation: cssload-loading-ani3 0.58s linear infinite;
                      -webkit-animation: cssload-loading-ani3 0.58s linear infinite;
                      -moz-animation: cssload-loading-ani3 0.58s linear infinite;
                    }
              
                    &:last-child {
                      animation: cssload-loading-ani1 0.58s linear infinite;
                      -o-animation: cssload-loading-ani1 0.58s linear infinite;
                      -ms-animation: cssload-loading-ani1 0.58s linear infinite;
                      -webkit-animation: cssload-loading-ani1 0.58s linear infinite;
                      -moz-animation: cssload-loading-ani1 0.58s linear infinite;
                    }
                  }
                }
              
                @keyframes cssload-loading-ani1 {
                  100% {
                    transform: translate(39px);
                    opacity: 0;
                  }
                }
              
              
                @-o-keyframes cssload-loading-ani1 {
                  100% {
                    -o-transform: translate(39px);
                    opacity: 0;
                  }
                }
              
              
                @-ms-keyframes cssload-loading-ani1 {
                  100% {
                    -ms-transform: translate(39px);
                    opacity: 0;
                  }
                }
              
              
                @-webkit-keyframes cssload-loading-ani1 {
                  100% {
                    -webkit-transform: translate(39px);
                    opacity: 0;
                  }
                }
              
              
                @-moz-keyframes cssload-loading-ani1 {
                  100% {
                    -moz-transform: translate(39px);
                    opacity: 0;
                  }
                }
              
              
                @keyframes cssload-loading-ani2 {
                  100% {
                    transform: translate(19px);
                    opacity: 1;
                  }
                }
              
              
                @-o-keyframes cssload-loading-ani2 {
                  100% {
                    -o-transform: translate(19px);
                    opacity: 1;
                  }
                }
              
              
                @-ms-keyframes cssload-loading-ani2 {
                  100% {
                    -ms-transform: translate(19px);
                    opacity: 1;
                  }
                }
              
              
                @-webkit-keyframes cssload-loading-ani2 {
                  100% {
                    -webkit-transform: translate(19px);
                    opacity: 1;
                  }
                }
              
              
                @-moz-keyframes cssload-loading-ani2 {
                  100% {
                    -moz-transform: translate(19px);
                    opacity: 1;
                  }
                }
              
              
                @keyframes cssload-loading-ani3 {
                  100% {
                    transform: translate(19px);
                  }
                }
              
              
                @-o-keyframes cssload-loading-ani3 {
                  100% {
                    -o-transform: translate(19px);
                  }
                }
              
              
                @-ms-keyframes cssload-loading-ani3 {
                  100% {
                    -ms-transform: translate(19px);
                  }
                }
              
              
                @-webkit-keyframes cssload-loading-ani3 {
                  100% {
                    -webkit-transform: translate(19px);
                  }
                }
              
              
                @-moz-keyframes cssload-loading-ani3 {
                  100% {
                    -moz-transform: translate(19px);
                  }
                }
              </style>
            <style>
        .custom-file-upload {
            background: #f7f7f7;
            padding: 8px;
            border: 1px solid #e3e3e3;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        .wizard,
        .tabcontrol {
            display: block;
            width: 100%;
            overflow: hidden;
        }

        .wizard a,
        .tabcontrol a {
            outline: 0;
        }

        .wizard ul,
        .tabcontrol ul {
            list-style: none !important;
            padding: 0;
            margin: 0;
        }

        .wizard ul>li,
        .tabcontrol ul>li {
            display: block;
            padding: 0;
        }

        /* Accessibility */
        .wizard>.steps .current-info,
        .tabcontrol>.steps .current-info {
            position: absolute;
            left: -999em;
        }

        .wizard>.content>.title,
        .tabcontrol>.content>.title {
            position: absolute;
            left: -999em;
        }

        .wizard>.steps {
            position: relative;
            display: block;
            width: 100%;
        }

        .wizard.vertical>.steps {
            display: inline;
            float: left;
            width: 30%;
        }

        .wizard>.steps .number {
            font-size: 1.429em;
        }

        .wizard>.steps>ul>li {
            width: 25%;
        }

        .wizard>.steps>ul>li,
        .wizard>.actions>ul>li {
            float: left;
        }

        .wizard.vertical>.steps>ul>li {
            float: none;
            width: 100%;
        }

        .wizard>.steps a,
        .wizard>.steps a:hover,
        .wizard>.steps a:active {
            display: block;
            width: auto;
            margin: 0 0.5em 0.5em;
            padding: 1em 1em;
            text-decoration: none;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .wizard>.steps .disabled a,
        .wizard>.steps .disabled a:hover,
        .wizard>.steps .disabled a:active {
            background: #eee;
            color: #aaa;
            cursor: default;
        }

        .wizard>.steps .current a,
        .wizard>.steps .current a:hover,
        .wizard>.steps .current a:active {
            background: #2184be;
            color: #fff;
            cursor: default;
        }

        .wizard>.steps .done a,
        .wizard>.steps .done a:hover,
        .wizard>.steps .done a:active {
            background: #9dc8e2;
            color: #fff;
        }

        .wizard>.steps .error a,
        .wizard>.steps .error a:hover,
        .wizard>.steps .error a:active {
            background: #ff3111;
            color: #fff;
        }

        .wizard>.content {
            background: #eee;
            display: block;
            margin: 0.5em;
            min-height: 35em;
            overflow: hidden;
            position: relative;
            width: auto;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .wizard.vertical>.content {
            display: inline;
            float: left;
            margin: 0 2.5% 0.5em 2.5%;
            width: 65%;
        }

        .wizard>.content>.body {
            float: left;
            position: absolute;
            width: 95%;
            height: 95%;
            padding: 2.5%;
        }

        .wizard>.content>.body ul {
            list-style: disc !important;
        }

        .wizard>.content>.body ul>li {
            display: list-item;
        }

        .wizard>.content>.body>iframe {
            border: 0 none;
            width: 100%;
            height: 100%;
        }

        .wizard>.content>.body input {
            display: block;
            border: 1px solid #ccc;
        }

        .wizard>.content>.body input[type="checkbox"] {
            display: inline-block;
        }

        .wizard>.content>.body input.error {
            background: rgb(251, 227, 228);
            border: 1px solid #fbc2c4;
            color: #8a1f11;
        }

        .wizard>.content>.body label {
            display: inline-block;
            margin-bottom: 0.5em;
        }

        .wizard>.content>.body label.error {
            color: #8a1f11;
            display: inline-block;
            margin-left: 1.5em;
        }

        .wizard>.actions {
            position: relative;
            display: block;
            text-align: right;
            width: 100%;
        }

        .wizard.vertical>.actions {
            display: inline;
            float: right;
            margin: 0 2.5%;
            width: 95%;
        }

        .wizard>.actions>ul {
            display: inline-block;
            text-align: right;
        }

        .wizard>.actions>ul>li {
            margin: 0 0.5em;
        }

        .wizard.vertical>.actions>ul>li {
            margin: 0 0 0 1em;
        }

        .wizard>.actions a,
        .wizard>.actions a:hover,
        .wizard>.actions a:active {
            background: #2184be;
            color: #fff;
            display: block;
            padding: 0.5em 1em;
            text-decoration: none;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .wizard>.actions .disabled a,
        .wizard>.actions .disabled a:hover,
        .wizard>.actions .disabled a:active {
            background: #eee;
            color: #aaa;
        }

        .wizard>.loading {}

        .wizard>.loading .spinner {}

        /* Tabcontrol */

        .tabcontrol>.steps {
            position: relative;
            display: block;
            width: 100%;
        }

        .tabcontrol>.steps>ul {
            position: relative;
            margin: 6px 0 0 0;
            top: 1px;
            z-index: 1;
        }

        .tabcontrol>.steps>ul>li {
            float: left;
            margin: 5px 2px 0 0;
            padding: 1px;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .tabcontrol>.steps>ul>li:hover {
            background: #edecec;
            border: 1px solid #bbb;
            padding: 0;
        }

        .tabcontrol>.steps>ul>li.current {
            background: #fff;
            border: 1px solid #bbb;
            border-bottom: 0 none;
            padding: 0 0 1px 0;
            margin-top: 0;
        }

        .tabcontrol>.steps>ul>li>a {
            color: #5f5f5f;
            display: inline-block;
            border: 0 none;
            margin: 0;
            padding: 10px 30px;
            text-decoration: none;
        }

        .tabcontrol>.steps>ul>li>a:hover {
            text-decoration: none;
        }

        .tabcontrol>.steps>ul>li.current>a {
            padding: 15px 30px 10px 30px;
        }

        .tabcontrol>.content {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 35em;
            overflow: hidden;
            border-top: 1px solid #bbb;
            padding-top: 20px;
        }

        .tabcontrol>.content>.body {
            float: left;
            position: absolute;
            width: 95%;
            height: 95%;
            padding: 2.5%;
        }

        .tabcontrol>.content>.body ul {
            list-style: disc !important;
        }

        .tabcontrol>.content>.body ul>li {
            display: list-item;
        }

        .hidden {
            display: none !important;
            visibility: hidden;
        }

        .ir {
            background-color: transparent;
            border: 0;
            overflow: hidden;
            text-indent: -9999px;
        }

        .ir:before {
            content: "";
            display: block;
            width: 0;
            height: 150%;
        }

        .chromeframe {
            margin: 0.2em 0;
            background: #ccc;
            color: #000;
            padding: 0.2em 0;
        }

        ::-moz-selection {
            background: #b3d4fc;
            text-shadow: none;
        }

        ::selection {
            background: #b3d4fc;
            text-shadow: none;
        }

        .clearfix:before,
        .clearfix:after {
            content: " ";
            display: table;
        }

        .clearfix:after {
            clear: both;
        }

        .clearfix {
            *zoom: 1;
        }

        .invisible {
            visibility: hidden;
        }

        .visuallyhidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .visuallyhidden.focusable:active,
        .visuallyhidden.focusable:focus {
            clip: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            position: static;
            width: auto;
        }
    </style>



    <div class="banner-outer inner-banner banner-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <h1> Apply Job at Tech2Globe </h1>

                </div>
            </div>
        </div>
    </div> <!-- banner -->

    @include('include.breadcrumb-services')
    <!-- bread crum -->

    <section class="container" id="careerFormFrontend" style="margin-top: -60px;">
        <div class="row">
            <div class="col-xs-12">
                <div class="modal-body">

                    <div class="content career-page-wrapper">

                        <div id="wizard">
                            <form id="careerFormSubmit">
                                <div class="row">
                                    <section>
                                        <div class="row">
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>First name *</p>
                                                    <input name="fname" type="text" class="form-control" required />
                                                </div><!-- form group -->
                                            </div>

                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>Last name *</p>
                                                    <input name="lname" type="text" class="form-control" required />
                                                </div><!-- form group -->
                                            </div>

                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>Email *</p>
                                                    <input name="email" class="form-control" type="email" required />
                                                </div><!-- form group -->
                                            </div>

                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>Portfolio website</p>
                                                    <input name="website" type="link" placeholder="https://" class="form-control" />
                                                </div><!-- form group -->
                                            </div>
                                        </div><!-- row -->
                                    </section><!-- first section -->


                                    <section>
                                        <div class="row">
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>Vacancy you are applying for *</p>
                                                    <input type="text" class="form-control" value="{{$vacancy['title']}}" readonly>
                                                    <input type="hidden" value="{{$id}}" name="vacancy_id" id="vacancy_id">
                                                </div><!-- form group -->
                                            </div>

                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>Phone *</p>
                                                    <input name="phone" type="text" class="form-control" minlength="10" maxlength="13" required />
                                                </div><!-- form group -->
                                            </div>

                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>When can you join?</p>
                                                    <input name="StartDate" type="date" class="form-control datepicker" />
                                                </div><!-- form group -->
                                            </div>

                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>Last company you worked with</p>
                                                    <input name="organization" type="text" class="form-control" />
                                                </div><!-- form group -->
                                            </div>

                                        </div><!-- row -->
                                    </section><!-- second section -->

                                    <section>
                                        <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <p> Current CTC (PA.) *</p>
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <select class="form-select" name="cctcl" required>
                                                                <option value="">In Lakhs</option>
                                                                @for ($m = 0; $m < 21; $m++)
                                                                    <option value="{{$m}}">{{$m}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>

                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <select class="form-select" name="cctct" required>
                                                                <option value="">In Thousands</option>
                                                                @for ($o = 0; $o < 100; $o++)
                                                                    <option value="{{$o}}">{{$o}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div><!-- row -->
                                                </div><!-- form group -->
                                            </div>

                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <p>Expected CTC (PA.) *</p>
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <select class="form-select" name="ectcl" required>
                                                                <option value="">In Lakhs</option>
                                                                @for ($l = 0; $l < 26; $l++)
                                                                    <option value="{{$l}}">{{$l}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>

                                                        <div
                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <select class="form-select" name="ectct" required>
                                                                <option value="">In Thousands</option>
                                                                @for ($o = 0; $o < 100; $o++)
                                                                    <option value="{{$o}}">{{$o}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div><!-- row -->
                                                </div><!-- form group -->
                                            </div>
                                        </div>
                                    </section>


                                    <section>
                                        <div class="row">

                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>Upload Your Resume *</p>

                                                    <input name="file" type="file" accept=".jpg,.jpeg,.pdf,doc,docx,application/msword,.png" class="form-control" required />
                                                    <small class="text-danger">Upload file must be pdf, jpg, png, word, or doc and less than 3mb</small>
                                                </div><!-- form group -->
                                            </div>

                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <p>Notice Period</p>
                                                    <select class="form-select" name="np">
                                                        <option>In Days</option>
                                                        @for ($o1 = 6; $o1 < 91; $o1++)
                                                            <option value="{{$o1}}">{{$o1}} days</option>
                                                        @endfor
                                                    </select>
                                                </div><!-- form group -->
                                            </div>

                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <p>Reference / Comments / Questions</p>
                                                    <textarea name="comment" class="form-control"></textarea>
                                                </div><!-- form group -->
                                            </div>

                                        </div><!-- row -->
                                    </section><!-- third section -->



                                    <section>
                                        <div class="row">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <button class="btn btn-danger" type="submit">APPLY</button>
                                                </div><!-- form group -->
                                            </div>
                                        </div><!-- row -->
                                    </section><!-- fourth section -->

                                </div><!-- row -->
                            </form><!-- form -->
                        </div><!-- wizard -->
                    </div><!-- content / career-page-wrapper -->
                </div><!-- modal body -->
            </div><!-- col/12 -->
        </div><!-- row -->
    </section><!-- container -->

    <div class="preloader-dot-loading my-3" id="preloader" style="display: none;">
        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
    </div>
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection