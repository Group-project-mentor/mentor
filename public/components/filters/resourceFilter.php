<link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/filterStyles.css' ?>" >

<details class="filter-details">
    <summary>Filters (Click to apply filters)</summary>
    <form id="filterForm">
        <div class="rc-resource-header">
            <div class="filter-container-hr">
                <h3>Approval : </h3>
                <select class="filter-option-set" name="approvals" id="approvals">
                    <option value="ALL" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'ALL')?"selected":"" ?> >All</option>
                    <option value="P" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'P')?"selected":"" ?> >Pending</option>
                    <option value="Y" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'Y')?"selected":"" ?> >Approved</option>
                    <option value="N" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'N')?"selected":"" ?> >Rejected</option>
                </select>
            </div>
            <div class="filter-container-hr">
                <h3>Owned by : </h3>
                <select class="filter-option-set" name="ownedBy" id="ownedBy">
                    <option value="ALL" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'ALL')?"selected":"" ?> >Owned by Anyone</option>
                    <option value="ME" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'ME')?"selected":"" ?> >Owned by Me</option>
                    <option value="THEM" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'THEM')?"selected":"" ?>>Owned by Others</option>
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

