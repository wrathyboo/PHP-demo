<?php 
include_once 'connect.php';
include_once 'my_functions.php';



?>



<?php include "header.php" ?>

<body>
<div class="profile container" style="margin-bottom: 70px;margin-top: 10px">
        <div class="col col-md-9 col-lg-7 col-xl-5">
            <div class="card bg-light" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="d-flex text-black">
                        <div class="flex-shrink-0">
                            <img src="img/icon/male-silhouette-question-mark-profile-anonymous-icon-incognito-sign-unknown-person-vector-illustration-isolated-white-113868090.jpg" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1">Name</h5>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;">Alise </br></p>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                <div>
                                    <p class="small text-muted mb-1">Games</p>
                                    <p class="mb-0"></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Country</p>
                                    <p class="mb-0"></br></p>
                                </div>
                                <div>
                                    <!-- 0 - Offline, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play -->
                                    <p class="small text-muted mb-1">Status</p>
                                    <p class="mb-0"></p>
                                </div>
                                <!-- <div>
                                    <p class="small text-muted mb-1">Friends</p>
                                    <p class="mb-0"> empty($friendlist) ? 'Private' : countFriendlist($friendlist) </p>
                                </div> -->
                            </div>
                            <div class="d-flex pt-1">
                                <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Message</button>
                                <a href="" target="_blank">
                                    <button type="button" class="btn btn-primary flex-grow-1">See Profile</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3 class="text-center bg-dark bg-gradient text-light">Your Library</h3>
</body>

<?php include "footer.php" ?>