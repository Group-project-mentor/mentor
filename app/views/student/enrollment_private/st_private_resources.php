<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-classroom inside</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Teacher/resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_homepage.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . "st_private_mode/st_myclasses/" . $_SESSION['class_id'] . '/' . $_SESSION['class_name'] ?> ">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                    <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>
            <hr style="color: green; height:7px; background-color:green;">
            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2><?php echo "Hello " . $_SESSION['name'] . "!" ?></h2>
                    <h3><?php echo "This is Your " 
                    . ucfirst($_SESSION['class_name']) . 
                    " Class Resources Page. You Can Refer All Resources In Here"  ?></h3>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>Private Resources</h1>
                    </div>

                    <!-- Grade choosing interface -->
                    <div class="container-box" style="margin:auto; padding-top:150px; width:auto; height: 100px;">
                        <table>
                            <tr>
                                <td><button><a href="<?php echo BASEURL  . 'st_private_resources/index_videos/' . $_SESSION['class_id']  ?> ">Videos</a></button></td>
                                <td><button><a href="<?php echo BASEURL  . 'st_private_resources/index_documents/' . $_SESSION['class_id']  ?>">Documents</a></button></td>
                                <td><button><a href="<?php echo BASEURL  . 'st_private_resources/index_past_papers/' . $_SESSION['class_id']   ?>">Past Papers</a></button></td>
                                <td><button><a href="<?php echo BASEURL  . 'st_private_resources/index_quizzes/' . $_SESSION['class_id']  ?>">Quizzes</a></button></td>
                                <td><button><a href="<?php echo BASEURL  . 'st_private_resources/index_others/' . $_SESSION['class_id']    ?>">Other Resources</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                    <hr style="color: green; height:7px; background-color:green;">
            </section>
        </div>
    </section>
</body>

</html>