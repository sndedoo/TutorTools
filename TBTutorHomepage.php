<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
    <meta author="Thomas Beamon">
    <meta descriptions="This page is the landing page when a tutor or student logs into the system">
</head>

<body>
    <?php include('navTutor.php');?>
    <div class="container-fluid">
        
        <h1 id="homepageTitle">Welcome Tutor!</h1>

        <!--carousel-->
        <div id="carousel1" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel1" data-slide-to="1"></li>
                <li data-target="#carousel1" data-slide-to="2"></li>
                <li data-target="#carousel1" data-slide-to="3"></li>
                <li data-target="#carousel1" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="Image\tutoringImage1.jpg">
                </div>
                <div class="item">
                    <img src="Image\tutoringImage2.jpg">
                </div>
                <div class="item">
                    <img src="Image\tutoringImage3.jpg">
                </div>
                <div class="item">
                    <img src="Image\tutoringImage1.jpg">
                </div>
                <div class="item">
                    <img src="Image\tutoringImage1.jpg">
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <nav class = "allQuestions">Click to view Commonly asked questions about TutorTools
            <ul class="CommonQuestions">
                <li>
                    <h2>What is TutorTools?
                        <ul class= "question">
                            <p>

                                The purpose of TutorTools is to give students access to tutoring resources in a more
                                convenient
                                and
                                user
                                friendly format.
                                Our goal is to create a website that students can use in order to find a tutor for a
                                specific
                                class
                                that
                                they need help in.
                                TutorTools gives both students and tutors an option to schedule/modify meetings, view
                                each
                                other's
                                profiles,
                                notify web designers of issues,
                                and view meeting history of previous meetings. Students are able to rate tutor sessions
                                and
                                these
                                metrics
                                will be calculated and displayed on Tutor
                                profiles for tutors and students to reference.
                            </p>
                        </ul>
                    </h2>
                </li>
                <li>
                    <h2>How to make a profile?
                        <ul class = "question">
                            <p>
                                Start by clicking the tab at the top of this page that says "Edit/Build My Profile" from
                                there
                                you
                                should be
                                able to make edits/enter information about yourself.
                                Make sure to save your edits!
                            </p>
                        </ul>
                    </h2>
                </li>
                <li>
                    <h2>How to view my profile?
                        <ul class = "question">
                            <p>
                                Start by clicking the tab at the top of this page that says "View My Profile" and the
                                most
                                recent
                                profile
                                information should be displayed.
                            </p>
                        </ul>
                    </h2>
                </li>
                <li>
                    <h2>How to sign up for a meeting as a Student?
                        <ul class = "question">
                            <p>
                                Start by clicking the tab at the top of this page labeled "New Service Request" by
                                clicking this
                                you
                                will be
                                directed to a module where you select which field of
                                study you are (Business, Engineering, Agriculture, ect...). You will be brought to a
                                page where
                                you
                                can search for the specific class you are looking for
                                in the search bar. Upon clicking submit, a table will be generated with various tutors
                                that
                                teach
                                the
                                course. By clicking the "View Profile" button you will be brought to
                                the tutors profile where you will see available timeslots for you to sign up. By
                                clicking "Add
                                meeting" your
                                schedule as well as the tutor's schedule will be updated with the meeting information. A
                                confirmation email
                                will be sent to the tutor to ensure
                                that they see the newly scheduled meeting.
                            </p>
                        </ul>
                    </h2>
                </li>
                <li>
                    <h2>How to Cancel/Modify a meeting?
                        <ul class = "question">
                            <p>
                                Both tutors and students are able to cancel meetings and submit meeting modification
                                requests.
                                To
                                start go
                                to the tab "View my Schedule" on the top of this page.
                                This will bring you to view your schedule with the meeting notes such as Time, date, and
                                location by
                                clicking on the "Cancel meeting" button the meeting will be immediately
                                taken off both the tutor and student schedule, and an email will be sent to the
                                non-cancelling
                                party
                                to
                                notify them of the meeting cancellation. By clicking on the
                                "Modify Meeting" button the student or tutor should be shown a pop-up window which
                                allows them
                                to
                                submit
                                changes related to date, time, or meeting location. The proposed
                                changes will be sent via email to the non-modifying party for them to either accept or
                                deny the
                                change
                                request. If accepted the schedules will be both updated, if denied
                                the user that requested the meeting modification will be alerted that their request for
                                change
                                was
                                denied
                                and they need to make another modificaiton proposal.
                            </p>
                        </ul>
                    </h2>
                </li>
            </ul>
        </nav>
        <div class="Copyright">Copyright of TutorTools &copy;</div>
    </div>

    
</body>

</html>