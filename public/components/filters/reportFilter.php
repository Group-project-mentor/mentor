<link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/filterStyles.css' ?>" >

<details class="filter-details">
    <summary>Filters (Click to apply filters)</summary>
    <form id="filterForm">
        <div class="rc-resource-header">
            <div class="filter-container-hr">
                <h3>Role : </h3>
                <select class="filter-option-set" name="approvals" id="approvals">
                    <option value="ALL" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'ALL')?"selected":"" ?> >All</option>
                    <option value="H" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'P')?"selected":"" ?> >Host Teacher</option>
                    <option value="T" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'Y')?"selected":"" ?> >Co-Teachers</option>
                    <option value="S" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'N')?"selected":"" ?> >Students</option>
                </select>
            </div>
            <div class="filter-container-hr">
                <h3>Last Access : </h3>
                <select class="filter-option-set" name="ownedBy" id="ownedBy">
                    <option value="ALL" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'ALL')?"selected":"" ?> >All time</option>
                    <option value="T" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'ME')?"selected":"" ?> >Today</option>
                    <option value="LW" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'THEM')?"selected":"" ?>>Last week</option>
                    <option value="LM" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'THEM')?"selected":"" ?>>Last month</option>
                    <option value="L6M" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'THEM')?"selected":"" ?>>Last 6 months</option>
                </select>
            </div>
            <div class="filter-container-hr" >
                <button class="filter-btn" type="button" id="clearButton" style="background-color: #AA0000;padding:5px;border-radius:5px;font-size:small;color:white;border-color:transparent;">
                    <img src="<?php echo BASEURL?>assets/icons/icon-filter-white.png" alt="" style="width: 20px;margin-right: 5px;">
                    Clear Filter
                </button>
            </div>
        </div>
        <div class="rc-resource-header">
            <div class="filter-container-hr" >
            </div>
            <div class="filter-container-hr" >
                <button class="filter-btn" type="submit" id="filterButton">
                    <img src="<?php echo BASEURL?>assets/icons/icon-filter-white.png" alt="" style="width: 20px;margin-right: 5px;">
                    Filter
                </button>
            </div>
        </div>
    </form>
</details>
