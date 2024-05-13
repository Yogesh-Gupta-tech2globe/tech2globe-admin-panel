
                @extends("layout.layout")
                @section("content")
                <?php $base_url = "http://localhost:8000"; ?>

                    <div class='case-study-banner-container'>
                        <div class='case-study-banner-overlay'></div>
                        <img src='{{ url("images/casestudy/bannerImage/15805.jpg") }}' alt='Banner' class='img-fluid'>
                        <h1 class='fs-1'>Yash</h1>
                    </div>

                    <main id="caseStudyContainer">
                        {{-- <section id="projectOverview" class="">
                            <h3>Project Overview</h3>
                            <div class="container my-3">
                                <p>Tech2Globe collaborated with Delivery Hero's Hungry House to address critical challenges associated
                                    with
                                    menu data entry, with the primary goal of optimizing operational efficiency and reducing costs.
                                    Delivery Hero's collaboration with Tech2Globe to optimize menu data entry operations has resulted in
                                    significant cost savings, improved efficiency, and enhanced customer satisfaction. By addressing key
                                    challenges through strategic outsourcing and implementing tailored solutions, Delivery Hero has
                                    achieved tangible benefits that positively impact business performance and future growth prospects.
                                </p>
                                <div class="row py-3 g-3">
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="card p-3 h-100">
                                            <h5 class="card-title m-0">Client's Problem</h5>
                                            <hr>
                                            <p>
                                                Delivery Hero required outsourcing of menu data entry for Hungry House due to high
                                                volume
                                                data,
                                                tight deadlines, and specific formatting requirements.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="card p-3 h-100">
                                            <h5 class="card-title m-0">Tech2Globe's Solution</h5>
                                            <hr>
                                            <p>
                                                Tech2Globe implemented comprehensive solutions, including in-depth training, feedback
                                                integration, sample approval process, dedicated team assignment, detailed reporting, and
                                                robust backup protocols.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="card p-3 h-100">
                                            <h5 class="card-title m-0">Key Milestones</h5>
                                            <hr>
                                            <ul>
                                                <li>Training Completion</li>
                                                <li>SampleApproval</li>
                                                <li>Backlog Clearance</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="row-cols-12">
                                            <div class="col">
                                                <div class="card h-100">
                                                    <div class="card-body d-flex align-items-center">
                                                        <div class="icon-col">
                                                            <i class="fa-solid fa-gauge-high fa-2x"></i>
                                                        </div>
                                                        <div class="text-col ms-3">
                                                            <h5 class="card-title">Client Satisfaction</h5>
                                                            <p class="card-text">9.5/10</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col my-3">
                                                <div class="card h-100">
                                                    <div class="card-body d-flex align-items-center">
                                                        <div class="icon-col">
                                                            <i class="fa-solid fa-calendar-days fa-2x"></i>
                                                        </div>
                                                        <div class="text-col ms-3">
                                                            <h5 class="card-title">Project Duration</h5>
                                                            <p class="card-text">75 Days</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col">
                                                <div class="card h-100">
                                                    <div class="card-body d-flex align-items-center">
                                                        <div class="icon-col">
                                                            <i class="fa-solid fa-bars fa-2x"></i>
                                                        </div>
                                                        <div class="text-col ms-3">
                                                            <h5 class="card-title">Menus Processed</h5>
                                                            <p class="card-text">1500 (new + existing)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                
                        </section>
                        <section id="lefImageRightText" class=" section-with-bg">
                            <h3>About {{$name}}</h3>
                            <div class="container my-3">
                                <div class="row gy-2">
                                    <div class="col-md-6 order-md-1 order-2">
                                        <h6 class="fw-bold title">
                                            {{$about_heading}}
                                        </h6>
                                        <p>
                                           {{$about_description}}
                                        </p>
                                    </div>
                                    <div class="col-md-6 order-md-2 order-1"><img src="{{ url("images/casestudy/aboutImage/".$about_image) }}" alt="About Us" class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </section> --}}
                        <section id="outlineCardsTopDescription" class="">
                            <h3>Delivery Hero's Requirement</h3>
                            <div class="container">
                                <p>Outsource menu data entry for Delivery Hero's Hungry House, handling high volume and adhering to
                                    strict formatting for seamless integration and timely completion. </p>
                                <div class="outline-cards-carousel owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="card h-100">
                                            <h6>Outsourcing Menu Data Entry</h6>
                                            <p>Delivery Hero sought to outsource the menu data entry work for its major chain, Hungry
                                                House.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card h-100">
                                            <h6>Seeking Enhanced Partner Solutions</h6>
                                            <p>Delivery Hero needed a partner capable of delivering prominent results and maximum
                                                solutions
                                                for menu entry operations. </p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card h-100">
                                            <h6>Managing High Volume Data</h6>
                                            <p>The project faced the challenge of handling a very high volume of menu data, requiring
                                                efficient and accurate manual entries. </p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card h-100">
                                            <h6>Meeting Stringent
                                                Deadline</h6>
                                            <p>Delivery Hero required the backlog of over 500 new menus and 1000 existing menus to be
                                                completed within defined deadlines to ensure operational continuity. </p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card h-100">
                                            <h6>Adhering to Customized Formatting</h6>
                                            <p>Delivery Hero needed the outsourcing partner to understand and adhere to the predefined
                                                formatting requirements for adding menus into Hungry House's customized backend system.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="rightImageLeftTextBottomParagraph" class=" section-with-bg">
                            <h3>Challenges Faced</h3>
                            <div class="container my-3">
                                <div class="row mb-3 gy-2">
                                    <div class="col-md-6">
                                        <img src="./images/case-study-images/challenges-faced.jpg" alt="Challenges Faced" class="img-fluid rounded">
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="fw-bold title">Delivery Hero faced significant challenges in outsourcing menu data entry for their major
                                            chain, Hungry House. These challenges included:</h5>
                                        <ol>
                                            <li class="fw-bold">High Volume Data Entry</li>
                                            <p>Managing a large volume of menu data required extensive manual entries, impacting
                                                turnaround time.</p>
                                            <li class="fw-bold">Tight Deadlines</li>
                                            <p>The project faced the challenge of completing over 500 new menus and 1000 existing menus
                                                within specified deadlines.</p>
                                            <li class="fw-bold">Complex Formatting Requirements</li>
                                            <p>Understanding and implementing the predefined formatting standards for menu entries in
                                                Hungry House's customized backend system posed a significant challenge.</p>
                                        </ol>
                                    </div>
                                </div>
                                <p>Despite encountering these significant challenges, Delivery Hero remained determined to identify a
                                    dependable outsourcing partner capable of effectively addressing these complexities and enhancing
                                    overall operational efficiency. This commitment underscored their focus on optimizing menu data
                                    management and streamlining processes within Hungry House's operations.</p>
                            </div>
                        </section>
                        <section id="nineGridLayout" class="">
                            <h3>Tech2Globe Solutions</h3>
                            <div class="container">
                                <p>Tech2Globe implemented comprehensive solutions to optimize menu data entry operations for Delivery
                                    Hero's
                                    Hungry House. We facilitated in-depth training sessions, integrated feedback for continuous
                                    improvement,
                                    ensured sample approval alignment, allocated a dedicated team, provided detailed reporting, and
                                    implemented robust backup protocols.</p>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12 grid-item">
                                        <div class="d-flex headings gap-2 mb-2">
                                            <i class="fa-solid fa-chalkboard-user"></i>
                                            <h4>Comprehensive Training</h4>
                                        </div>
                                        <p>Facilitated in-depth training sessions conducted by Hungry House experts to ensure the
                                            Tech2Globe team acquired the necessary skills and expertise for accurate and efficient menu
                                            entry operations, enhancing overall project readiness and performance.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 grid-item">
                                        <div class="d-flex headings gap-2 mb-2">
                                            <i class="fa-solid fa-comment"></i>
                                            <h4>Feedback Integration</h4>
                                        </div>
                                        <p>Actively gathered and integrated relevant feedback post-training to optimize team performance
                                            and align operational practices with client expectations, fostering continuous improvement
                                            and adherence to quality standards.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 grid-item">
                                        <div class="d-flex headings gap-2 mb-2">
                                            <i class="fa-regular fa-file-lines"></i>
                                            <h4>Sample Approval Process</h4>
                                        </div>
                                        <p>Prior to project initiation, shared menu entry samples with Hungry House for meticulous
                                            approval, ensuring alignment with specific formatting and quality criteria, and establishing
                                            a strong foundation for project success.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 grid-item">
                                        <div class="d-flex headings gap-2 mb-2">
                                            <i class="fa-solid fa-users"></i>
                                            <h4>Dedicated Team Assignment & Team Allocation</h4>
                                        </div>
                                        <p>Allocated a specialized and dedicated team comprising 15 skilled resources exclusively to the
                                            project, promoting enhanced productivity, collaboration, and efficiency in managing menu
                                            data entries within defined timelines.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 grid-item">
                                        <div class="d-flex headings gap-2 mb-2">
                                            <i class="fa-solid fa-chart-column"></i>
                                            <h4>Detailed Reporting</h4>
                                        </div>
                                        <p>Delivered regular, comprehensive reports to Delivery Hero, providing transparent insights
                                            into project progress, key milestones achieved, and performance metrics, fostering
                                            transparency and informed decision-making throughout the engagement.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 grid-item">
                                        <div class="d-flex headings gap-2 mb-2">
                                            <i class="fa-solid fa-shield-halved"></i>
                                            <h4>Backup Protocols</h4>
                                        </div>
                                        <p>Implemented robust backup protocols to safeguard data integrity and operational continuity,
                                            minimizing risks of downtime and data loss, thereby ensuring seamless and uninterrupted
                                            project execution while prioritizing data security and reliability.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 grid-item">
                                        <div class="d-flex headings gap-2 mb-2">
                                            <i class="fa-solid fa-medal"></i>
                                            <h4>Quality</h4>
                                        </div>
                                        <p>As their one of the major concern was the quality, so we have planned accordingly and give
                                            them a separate plan for the quality segmentation which has team of menu entry, cross
                                            checking of menus, internal quality analysis team.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 grid-item">
                                        <div class="d-flex headings gap-2 mb-2">
                                            <i class="fa-solid fa-sitemap"></i>
                                            <h4>Team Strength</h4>
                                        </div>
                                        <p>To ensure maximum productivity and completion of the project within the requirements, 15
                                            resources were assigned to work exclusively on the project.</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a id="showMoreBtn" class="mt-3 d-none">Show More</a>
                                </div>
                
                            </div>
                        </section>
                        <section id="iconCardsTopDescription" class=" section-with-bg">
                            <h3>Project Outcomes</h3>
                            <div class="container">
                                <p class="text-center">
                                    From menu data entry complexities to operational excellence and significant cost savings.
                                </p>
                                <div class="row mt-4 g-3">
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="card p-3 h-100">
                                            <i class="fa-solid fa-clock mb-4"></i>
                                            <p class="text-center">Tech2Globe Solutions successfully cleared a backlog of over 500 new
                                                menus and 1000
                                                existing menus within 75 days, enhancing operational efficiency and ensuring up-to-date
                                                menu offerings.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="card p-3 h-100">
                                            <i class="fa-solid fa-chart-column mb-4"></i>
                                            <p class="text-center">Improved quality and accuracy of menu data entry ensured seamless
                                                integration into Delivery Hero's systems, optimizing workflow and compliance with
                                                formatting standards.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="card p-3 h-100">
                                            <i class="fa-solid fa-thumbs-up mb-4"></i>
                                            <p class="text-center">Delivery Hero's confidence in Tech2Globe's capabilities grew, leading
                                                to expanded service offerings and a strengthened partnership.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <div class="card p-3 h-100">
                                            <i class="fa-solid fa-dollar-sign mb-4"></i>
                                            <p class="text-center">By outsourcing menu data entry, Delivery Hero achieved significant
                                                cost savings (up to 80%), allowing for resource reallocation towards core business
                                                functions like sales and customer service.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="blockqoute">
                            <div class="container">
                                <h3 class="text-center">Delivery Hero Operations Head Feedback for Tech2Globe Team</h3 class="text-center">
                                <div class="quote-wrapper">
                                    <div class="blockquote">
                                        <h2>When we decided to relocate our data entry service outside of Germany, we wanted to find the
                                            best partner in term of ongoing communication and ethic. It became quickly evident that
                                            Tech2Globe would be our partner of choice, what we didn't expect was to receive such a high
                                            quality of service days after days. Thanks to Tech2Globe we have reduced our data entry
                                            service levels by 10 time and freed up inhouse resources to handle real-time customer’s
                                            queries.</h2>
                                        <h4>&mdash;Mowgli Montier, Germany<br><em>Delivery Hero Operations Head</em></h4>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="paragraphLayout" class="section-with-bg">
                            <h3>Conclusion</h3>
                            <div class="container">
                                <div class="row">
                                    <div class="owl-carousel image-slider">
                                        <div class="item h-100">
                                            <a href="./images/case-study-images/1.jpg" class="glightbox d-flex align-items-center h-100 bg-white" data-gallery="gallery1"><img src="./images/case-study-images/1.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="item h-100">
                                            <a href="./images/case-study-images/2.jpg" class="glightbox d-flex align-items-center h-100 bg-white" data-gallery="gallery1"><img src="./images/case-study-images/2.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="item h-100">
                                            <a href="./images/case-study-images/3.jpg" class="glightbox d-flex align-items-center h-100 bg-white" data-gallery="gallery1"><img src="./images/case-study-images/3.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="item h-100">
                                            <a href="./images/case-study-images/4.jpg" class="glightbox d-flex align-items-center h-100 bg-white" data-gallery="gallery1"><img src="./images/case-study-images/4.jpg" class="img-fluid"></a>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    In conclusion, the partnership between Tech2Globe and Delivery Hero's Hungry House exemplifies the
                                    successful outsourcing of menu data entry operations to achieve significant efficiency gains and
                                    operational improvements. By implementing comprehensive solutions including thorough training,
                                    feedback
                                    integration, dedicated team allocation, detailed reporting, and robust backup protocols, Tech2Globe
                                    ensured the accurate and timely handling of menu entries.
                                </p>
                
                                <p>The project's success is evidenced by the efficient clearance of backlog within 75 days, resulting in
                                    positive client feedback and increased confidence in outsourcing capabilities. Moreover, the
                                    substantial
                                    cost savings of 80% in menu entry costs allowed Delivery Hero to reallocate resources and invest in
                                    core
                                    business growth areas.</p>
                
                                <p>This case study underscores the importance of strategic outsourcing partnerships and demonstrates how
                                    tailored solutions can lead to tangible business benefits. Tech2Globe's commitment to excellence and
                                    client satisfaction has contributed to improved operational efficiency and enhanced business
                                    outcomes
                                    for Delivery Hero's Hungry House.</p>
                            </div>
                        </section>
                        <section id="contactUs">
                            <h3>Contact Us</h3>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 p-3">
                                        <p>Have questions or want to learn more about our services? Feel free to reach out to us for
                                            more information or assistance.</p>
                                        <div class="links mb-3">
                                            <div class="mail-link">
                                                <i class="fa-solid fa-envelope"></i> <a href="mailto:info@tech2globe.com">info@tech2globe.com</a>
                                            </div>
                                            <div class="tel-link">
                                                <i class="fa-solid fa-square-phone"></i> <a href="tel:+91-9899675039">+91-9899675039</a>
                                            </div>
                                        </div>
                                        <p>We're here to help!</p>
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <div class="card">
                                            <form action="" class="needs-validation" novalidate>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
                                                    <div class="invalid-feedback">
                                                        Please enter your full name.
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email ID" required>
                                                    <div class="invalid-feedback">
                                                        Please enter a valid email address.
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <select class="form-select" id="country" name="country" required>
                                                        <option value="India">India</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select your country.
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
                                                    <div class="invalid-feedback">
                                                        Please enter a valid phone number.
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message" required></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter your message.
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-paper-plane"></i>
                                                    Send Message</button>
                                            </form>
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </main>
                
                @endsection
                